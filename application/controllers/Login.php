<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		$sudah_login = $this->session->userdata('sudah_login');
		$data['id_role'] = $this->session->userdata('id_role');
		$data['email'] = $this->session->userdata('email');

		if (empty($sudah_login)) {
			$this->load->view('navbar_user', $data);
			$this->load->view('login_form');
		} else {
			$id_role = $this->session->userdata('id_role');
			if ($id_role == '1') {
				header('location:' . base_url() . 'admin/index');
			} else if ($id_role == '2') {
				header('location:' . base_url());
			} else if ($id_role == '3') {
				header('location:' . base_url() . 'owner');
			} else if ($id_role == '4') {
				header('location:' . base_url() . 'admin');
			}
		}
	}

	public function proses_login()
	{
		$this->load->library('form_validation');
		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);
		$enkripsi_pass = hash('md5', $password);
		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
		$data_from_db = $this->Login_model->cek_user($email, $enkripsi_pass); // mengambil data dari fungsi cek_user
		$hitung_datadb = count($data_from_db);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean'); // melakukan validasi form login
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');


		if ($user) {

			if ($this->form_validation->run() == FALSE) { // jika validasi terjadi kesalahan maka akan kembali ke halaman awal
				$this->load->view('navbar_user');
				$this->load->view('login_form'); // ^ dengan menampilkan error
			} else {
				if ($hitung_datadb > 0) {
					$session_data = array(
						'id_user'		=> $data_from_db[0]->id_user,
						'username'		=> $data_from_db[0]->username,
						'fullname'		=> $data_from_db[0]->fullname,
						'jk'			=> $data_from_db[0]->jk,
						'email'			=> $data_from_db[0]->email,
						'no_hp'			=> $data_from_db[0]->no_hp,
						'alamat'		=> $data_from_db[0]->alamat,
						'id_role'		=> $data_from_db[0]->id_role,
						'sudah_login' 	=> TRUE
					); // data yang di gunakan untuk session yang di ambil dari database di atas

					$this->session->set_userdata($session_data); // set data-data session

					if ($this->session->userdata('id_role') == '1') {
						redirect(base_url('admin'));
						//redirect('C_Front/login_administrator');
					} elseif ($this->session->userdata('id_role') == '2') {
						redirect(base_url());
						//redirect('C_Front/login_hima');
					} elseif ($this->session->userdata('id_role') == '3') {
						redirect(base_url('owner'));
						//redirect('C_Front/login_hima');
					} elseif ($this->session->userdata('id_role') == '4') {
						redirect(base_url('admin'));
						//redirect('C_Front/login_hima');
					}
				} else {
					$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
					Kata sandi yang anda masukan Salah </div>');
					redirect(base_url('Login'));
				}
			}
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
			Email yang anda masukan tidak terdaftar</div>');
			redirect(base_url('Login'));
		}
	}

	public function kirim_token_reset()
	{
		if (isset($_POST['email'])) {
			$email = $this->input->get_post('email', TRUE);
			$jmlEmail = $this->db->get_where('tb_user', ['email' => $email])->num_rows();
			$dataEmail = $this->db->get_where('tb_user', ['email' => $email])->row_array();
			$expFormat = mktime(date("H"), date("i") + 30, date("s"), date("m"), date("d"), date("Y"));
			$expDate = date("Y-m-d H:i:s", $expFormat);
			$token = random_str(32);

			if ($jmlEmail == '1') {
				$dataDB = array(
					'email' => $email,
					'token' => $token,
					'expDate' => $expDate
				);
				$dataView = array(
					'nama_penerima' => explode(' ', trim(ucwords($dataEmail['fullname'])))[0],
					'username' => $dataEmail['username'],
					'token' => $token
				);
				$dataEmail = array(
					'email_penerima' => $email,
					'subject' => 'Permintaan ulang kata sandi',
					'template' => 'emails/template_reset_pass',
					'isi' => $dataView
				);
				if (kirim_email($dataEmail)) {
					$this->db->replace('password_reset', $dataDB);
					$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">Permintaan berhasil dikirim, Silahkan cek email anda. Jika tidak ada email masuk tunggulah selama 1 menit. Jika masih tidak masuk silahkan lakukan permintaan ulang.</div>');
					redirect(base_url('Login'));
				} else {
					$this->session->set_flashdata('notif', '<div class="alert alert-warning" role="alert">Permintaan gagal dikirim, ulangi kembali!</div>');
					redirect(base_url('Login'));
				}
			} else {
				$this->session->set_flashdata('notif', '<div class="alert alert-warning" role="alert">Email yang anda masukan tidak terdaftar</div>');
				redirect(base_url('Login'));
			}
		}
	}

	public function proses_reset_pass()
	{
		$token = $this->input->get('token');
		$jmlData = $this->db->get_where('password_reset', ['token' => $token])->num_rows();
		$getData = $this->db->get_where('password_reset', ['token' => $token])->row_array();
		$curDate = date("Y-m-d H:i:s");

		if ($jmlData == 1) {
			if ($getData['expDate'] >= $curDate) {
				$dataReset = array(
					'token' => $token,
					'temp' => $getData
				);
				$this->session->set_userdata('dataReset', $dataReset);
				$this->load->view('navbar_user');
				$this->load->view('view_reset_password', ['form' => TRUE]);
			} else {
				$this->session->set_flashdata('notif', '<div class="alert alert-warning" role="alert">Link telah kadaluarsa. Silahkan melakukan permintaan ulang kata sandi baru.</div>');
				$this->load->view('navbar_user');
				$this->load->view('view_reset_password', ['form' => FALSE]);
			}
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-warning" role="alert">Tidak ada catatan permintaan ulang kata sandi. Silahkan melakukan permintaan ulang kata sandi baru.</div>');
			$this->load->view('navbar_user');
			$this->load->view('view_reset_password', ['form' => FALSE]);
		}
	}

	public function post_reset_pass()
	{
		$password = $this->input->post('password');
		$enkripsi_pass = hash('md5', $password);
		$dataReset = $this->session->userdata('dataReset');

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
			'min_length' => 'Password terlalu pendek, min 6 karakter.'
		]);
		$this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'required|trim|matches[password]', [
			'matches' => 'Password dan konfirmasi password tidak sama!',
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('form_error', $this->form_validation->error_array());
			redirect('reset_password?token=' . $dataReset['token']);
		} else {
			$data = array(
				'password' => $enkripsi_pass
			);
			$this->db->where('email', $dataReset['temp']['email']);
			$result = $this->db->update('tb_user', $data);
			if ($result) {
				$this->db->delete('password_reset', array('email' => $dataReset['temp']['email']));
				$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">Password berhasil diubah. Silahkan melakukan login.</div>');
				redirect('login');
			} else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">Password gagal diubah. Silahkan ulangi kembali.</div>');
				redirect('login');
			}
		};
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user'); // menghancurkan session
		$this->session->unset_userdata('username'); // menghancurkan session
		$this->session->unset_userdata('fullname'); // menghancurkan session
		$this->session->unset_userdata('jk'); // menghancurkan session
		$this->session->unset_userdata('email'); // menghancurkan session
		$this->session->unset_userdata('no_hp'); // menghancurkan session
		$this->session->unset_userdata('alamat'); // menghancurkan session
		$this->session->unset_userdata('id_role'); // menghancurkan session
		$this->session->unset_userdata('sudah_login'); // menghancurkan session

		$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
		Anda berhasil Keluar</div>');
		redirect(base_url('Login'));
	}
	public function blocked()
	{
		$this->load->view('admin/blocked');
	}
}
