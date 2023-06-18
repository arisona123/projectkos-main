<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_Back_User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Login_model');
		$this->load->model('User_model');
		$this->load->library('pagination');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		$jumlahkos = $this->User_model->getJumlahKos()->num_rows();
		$jumlahuser = $this->User_model->getJumlahUser()->num_rows();
		$jumlahsewa = $this->User_model->getJumlahSewa()->num_rows();
		$jumlahrequest = $this->User_model->getJumlahRequest()->num_rows();

		$data2 = array(
			'jumlahkos' => $jumlahkos,
			'jumlahuser' => $jumlahuser,
			'jumlahsewa' => $jumlahsewa,
			'jumlahrequest' => $jumlahrequest
		);

		$this->load->view('navbar_user');
		$this->load->view('user/header_user', $data2);
		$this->load->view('user/footer');
	}

	public function dashboard()
	{
		$sudah_login = $this->session->userdata('sudah_login');
		$data['jk'] = $this->session->userdata('jk');
		$data['id_role'] = $this->session->userdata('id_role');
		$data['username'] = $this->session->userdata('username');
		$data['email'] = $this->session->userdata('email');
		$data['fullname'] = strtoupper($this->session->userdata('fullname'));

		if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
			redirect(base_url('Login'));
		} else {
			$this->load->view('header_user', $data);
			$this->load->view('navbar_user');
			$this->load->view('footer');
			//   $this->load->view('index');
		}
	}

	public function data_user($id)
	{
		$this->load->helper('text');
		$data['sql'] = $this->User_model->info_user($id);

		$sudah_login = $this->session->userdata('sudah_login');
		$user = $this->session->userdata('id_user');
		$data['jk'] = $this->session->userdata('jk');
		$data['id_role'] = $this->session->userdata('id_role');
		$data['username'] = $this->session->userdata('username');
		$data['email'] = $this->session->userdata('email');
		$data['id_user'] = $this->session->userdata('id_user');
		$data['fullname'] = strtoupper($this->session->userdata('fullname'));

		if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
			redirect(base_url('Login'));
		} else {
			if ($id == $user) {
				$this->load->view('navbar_user', $data);
				$this->load->view('view_profile', $data);
				$this->load->view('user/footer');
			} else {
				redirect('404');
			}
		}
	}

	function edit_user($id)
	{
		$user = $this->session->userdata('id_user');
		$sudah_login = $this->session->userdata('sudah_login');
		$data['id_role'] = $this->session->userdata('id_role');
		$data['jk'] = $this->session->userdata('jk');
		$data['username'] = $this->session->userdata('username');
		$data['email'] = $this->session->userdata('email');
		$data['fullname'] = strtoupper($this->session->userdata('fullname'));
		$where = array('id_user' => $id);
		$data['user'] = $this->User_model->edit_data_user($where, 'tb_user')->result();

		if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
			redirect(base_url('Login'));
		} else {
			if ($id == $user) {
				$this->load->view('navbar_user', $data);
				$this->load->view('v_edit_user_pengguna');
			} else {
				redirect('404');
			}
		}
	}
	public function v_edit_password($id)
	{
		$user = $this->session->userdata('id_user');
		$sudah_login = $this->session->userdata('sudah_login');
		$data['id_role'] = $this->session->userdata('id_role');
		$data['jk'] = $this->session->userdata('jk');
		$data['username'] = $this->session->userdata('username');
		$data['email'] = $this->session->userdata('email');
		$data['fullname'] = strtoupper($this->session->userdata('fullname'));
		$where = array('id_user' => $id);
		$data['user'] = $this->User_model->edit_data_user($where, 'tb_user')->result();

		if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
			redirect(base_url('Login'));
		} else {
			if ($id == $user) {
				$this->load->view('navbar_user', $data);
				$this->load->view('v_edit_password');
				$this->load->view('user/footer');
			} else {
				redirect('404');
			}
		}
	}

	function edit_password()
	{
		$this->load->library('form_validation');
		$user = $this->session->userdata('id_user');
		$sudah_login = $this->session->userdata('sudah_login');

		$id = $this->input->post('id_user');
		$where = array('id_user' => $id);
		$data['user'] = $this->User_model->edit_data_user($where, 'tb_user')->result();

		if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
			redirect(base_url('Login'));
		} else {
			if ($id == $user) {
				$this->form_validation->set_rules('current_password', 'Password', 'required|trim', [
					'required' => 'Password saat ini Harus di isi.'
				]);
				$this->form_validation->set_rules('new_password', 'Password', 'required|trim|min_length[6]|matches[new_password_confirm]', [
					'required' => 'Password baru Harus di isi.',
					'matches' => 'Password yang anda masukan tidak sama!',
					'min_length' => 'password terlalu pendek!'
				]);
				$this->form_validation->set_rules('new_password_confirm', 'Password', 'required|trim|min_length[6]|matches[new_password]', [
					'required' => 'Ulangi Password Harus di isi.',
					'matches' => 'Password yang anda masukan tidak sama!',
					'min_length' => 'password terlalu pendek!'
				]);

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('navbar_user', $data);
					$this->load->view('v_edit_password');
				} else {
					$current_password = md5($this->input->post('current_password'));
					$new_password = $this->input->post('new_password');

					if ($current_password == $data['user']['password']) {
						if ($current_password == $new_password) {
							$password_hass = md5($new_password);
							$this->db->set('password', $password_hass);
							$this->db->where('id_user', $this->session->userdata('id_user'));
							$this->db->update('tb_user');

							$this->session->set_flashdata('message', 'Password berhasi di Ubah');
							redirect(base_url('profil/') . $id);
						} else {
							$this->session->set_flashdata('message', 'Password tidak boleh sama dengan password saat ini!');
							redirect(base_url('password/edit/') . $id);
						}
					} else {
						$this->session->set_flashdata('message', 'Salah memasukan password saat ini!');
						redirect(base_url('password/edit/') . $id);
					}
				}
			} else {
				redirect('404');
			}
		}
	}

	function edit_foto($id)
	{
		$user = $this->session->userdata('id_user');
		$sudah_login = $this->session->userdata('sudah_login');
		$data['id_role'] = $this->session->userdata('id_role');
		$data['jk'] = $this->session->userdata('jk');
		$data['username'] = $this->session->userdata('username');
		$data['email'] = $this->session->userdata('email');
		$data['fullname'] = strtoupper($this->session->userdata('fullname'));
		$where = array('id_user' => $id);
		$data['user'] = $this->User_model->edit_data_user($where, 'tb_user')->result();

		if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
			redirect(base_url('Login'));
		} else {
			if ($id == $user) {
				$this->load->view('navbar_user', $data);
				$this->load->view('edit_foto');
			} else {
				redirect('404');
			}
		}
	}

	function proses_foto()
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $this->input->post('id_user');
		//  cek gambar 
		if ($_FILES['foto']['name'] != "") {
			$config['upload_path'] = './assets/images/profile/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto')) {
				print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
				exit();
			} else {
				$jk = $data['user']['jk'];
				$old_foto = $data['user']['foto'];
				if ($jk == 'Pria') {
					if ($old_foto != 'pria.png') {
						unlink(FCPATH . 'assets/images/profile/' . $old_foto);
					};
				} else {
					if ($old_foto != 'wanita.png') {
						unlink(FCPATH . 'assets/images/profile/' . $old_foto);
					};
				}
				$image = $this->upload->data();
				if ($image['file_name']) {
					$data['file1'] = $image['file_name'];
				}
				$new_foto = $data['file1'];
			}
		}

		$data = array(
			'foto' => $new_foto,
		);

		$where = array(
			'id_user' => $id
		);

		$this->User_model->update_data_user($where, $data, 'tb_user');
		$this->session->set_flashdata('message', 'Foto Profil Anda Berhasil di ubah');
		redirect(base_url('profil/') . $id);
	}

	function proses_update_user()
	{
		$username 	= $this->input->post('username');
		// $password 	= $this->input->post('password');
		$fullname 	= $this->input->post('fullname');
		$jk 		= $this->input->post('jk');
		$email 		= $this->input->post('email');
		$no_hp 		= $this->input->post('no_hp');
		$alamat 	= $this->input->post('alamat');
		$id_role 	= $this->input->post('id_role');
		$id 		= $this->input->post('id_user');

		$data = array(
			'username' 	=> $username,
			// 'password' 	=> md5($password),
			'fullname' 	=> $fullname,
			'jk' 		=> $jk,
			'email' 	=> $email,
			'no_hp' 	=> $no_hp,
			'alamat' 	=> $alamat,
			'id_role' 	=> $id_role
		);

		$where = array(
			'id_user' => $id
		);

		$this->User_model->update_data_user($where, $data, 'tb_user');
		redirect('profil/' . $this->session->userdata('id_user'));
	}

	function username_check_blank($str)
	{
		$pattern = '/ /';
		$result = preg_match($pattern, $str);

		if ($result) {
			$this->form_validation->set_message('username_check_blank', '%s tidak boleh menggunakan spasi.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function proses_daftar_user()
	{
		//trim berfungsi ketika spasi diawal dan diakhir tidak masuk ke database

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]|callback_username_check_blank', [
			'is_unique' => 'This username has already taken',
			'required' => 'The username field is required.'
		]);
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
			'is_unique' => 'This email has already registered',
			'required' => 'The Email field is required.'
		]);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
			'required' => 'The Gender field is required.'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password_confirm]', [
			'matches' => 'The password dont match!',
			'min_length' => 'The password too sort!'
		]);
		$this->form_validation->set_rules('password_confirm', 'Password', 'required|trim|matches[password]');
		$this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim|numeric|is_unique[tb_user.no_hp]', [
			'is_unique' => 'This phone Number has already taken',
			'required' => 'The Phone Number field is required.'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
			'required' => 'The Address field is required.'
		]);
		$this->form_validation->set_rules('id_role', 'Role', 'required|trim', [
			'required' => 'The Role field is required.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('navbar_user');
			$this->load->view('v_daftar_user');
		} else {
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');
			$fullname 	= $this->input->post('fullname');
			$jk 		= $this->input->post('jk');
			$email 		= $this->input->post('email');
			$no_hp 		= $this->input->post('no_hp');
			$alamat 	= $this->input->post('alamat');
			$id_role 	= $this->input->post('id_role');

			if ($jk == 1) {
				$image = 'pria.png';
			} else {
				$image = 'wanita.png';
			}

			$data = array(
				'username'	=> $username,
				'password'	=> md5($password),
				'fullname'	=> $fullname,
				'foto' 		=> $image,
				'jk'		=> $jk,
				'email'		=> $email,
				'no_hp' 	=> $no_hp,
				'alamat' 	=> $alamat,
				'id_role' 	=> $id_role,
			);
			$this->User_model->input_data_user($data, 'tb_user');
			$this->session->set_flashdata('suksesdaftar', '<div class="alert alert-success" role="alert">
			Selamat! Akun anda telah dibuat! Silahkan masuk!
		  </div>');
			redirect('Login');
		}
	}

	public function semua_kos($page = 0)
	{
		//config
		$config['base_url'] = site_url('semua-kos');
		$config['total_rows'] = $this->User_model->countAllkos();
		$config['per_page'] = 6;
		$data['sql'] = $this->User_model->info_beberapa_kos($config['per_page'], $page);
			//Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

	
		//inisial
		$this->pagination->initialize($config);
		$this->load->view('navbar_user', $data);
		$this->load->view('user/search', $data);
		$this->load->view('user/footer');
	}

	public function view_konten_kos($slug = '')
	{
		$data_tempat = $this->User_model->getTempat("where slug = '$slug'")->result_array();
		$this->load->helper('text');
		date_default_timezone_set('Asia/Jakarta');
		$data_kos = $this->User_model->getKos("where slug = '$slug'")->result_array();
		
		if (!empty($data_kos)) {
			$data2 = array(
				'nama'				=> strip_tags($data_kos[0]['nama']),
				'id_kos'			=> $data_kos[0]['id_kos'], //baru
				'id_user'			=> $data_kos[0]['id_user'],
				'sisa_kamar'		=> $data_kos[0]['sisa_kamar'],
				'alamat'			=> $data_kos[0]['alamat'],
				'slug'				=> $data_kos[0]['slug'],
				'date'				=> $data_kos[0]['date'],
				'time'				=> $data_kos[0]['time'],
				'kota'				=> $data_kos[0]['kota'],
				'harga'				=> $data_kos[0]['harga'],
				'diskon'			=> $data_kos[0]['diskon'],
				'foto'				=> $data_kos[0]['foto'],
				'kategori'			=> $data_kos[0]['kategori'],
				'no_hp'				=> $data_kos[0]['no_hp'],
				'fullname'			=> $data_kos[0]['fullname'],
				'tipe'				=> $data_kos[0]['tipe'],
				'fasilitas'			=> $data_kos[0]['fasilitas'],
				'fasilitas_umum'	=> $data_kos[0]['fasilitas_umum'],
				'fasilitas_kamar_mandi'	=> $data_kos[0]['fasilitas_kamar_mandi'],
				'fasilitas_parkir'	=> $data_kos[0]['fasilitas_parkir'],
				'peraturan_kamar'	=> $data_kos[0]['peraturan_kamar'],
				'spesifikasi_kamar'	=> $data_kos[0]['spesifikasi_kamar'],
				'image_header'		=> $data_kos[0]['image_header'],
				'tempat'			=> $data_tempat,
			);
			$query = $this->db->query("SELECT COUNT(t.id_kos) AS count
                           FROM transaksi t
                           JOIN tb_user u ON t.id_user = u.id_user
                           WHERE u.is_active = 1
                           AND t.id_kos = " . $this->db->escape($data2['id_kos']));

			$data2['sewa'] = $query->row()->count;
			$data2['total_kamar'] = $data2['sisa_kamar'] - $data2['sewa'];
			

			$this->load->view('navbar_user');
			$this->load->view('user/detail_kos', $data2);
			$this->load->view('user/footer');
		} else {
			redirect(404);
		}
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['sql'] = $this->User_model->get_keyword($keyword); 
		$this->load->view('navbar_user', $data);
		$this->load->view('user/search', $data);
		$this->load->view('user/footer');
	}

	public function filter()
	{
		$kota = $this->input->get('kota');
		$tipe = $this->input->get('tipe');
		if (empty($kota) && empty($tipe)) {
			redirect(base_url('semua-kos'));
			exit();
		} else {
			$data['sql'] = $this->User_model->filter($kota, $tipe)->result();
		}
		$this->load->view('navbar_user', $data);
		$this->load->view('user/search', $data);
		$this->load->view('user/footer');
	}

	public function about_us()
	{
		$jumlahkos = $this->User_model->getJumlahKos()->num_rows();
		$jumlahuser = $this->User_model->getJumlahUser()->num_rows();
		$jumlahsewa = $this->User_model->getJumlahSewa()->num_rows();
		$jumlahrequest = $this->User_model->getJumlahRequest()->num_rows();

		$data2 = array(
			'jumlahkos' => $jumlahkos,
			'jumlahuser' => $jumlahuser,
			'jumlahsewa' => $jumlahsewa,
			'jumlahrequest' => $jumlahrequest
		);

		$this->load->view('navbar_user');
		$this->load->view('user/about_us', $data2);
		$this->load->view('user/footer');
	}

	public function services()
	{
		$this->load->view('navbar_user');
		$this->load->view('user/services');
		$this->load->view('user/footer');
	}

	public function contact()
	{
		$this->load->view('navbar_user');
		$this->load->view('user/contact');
		$this->load->view('user/footer');
	}
}
