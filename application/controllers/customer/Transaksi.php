<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('id_user') == '') {
            $this->session->set_flashdata('flashhh', '<div class="alert alert-primary alert-dismissible fade show" role="alert"> Login dulu biar Jongjons
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>

        </div> ');
            redirect('auth/login');
        }
        // $owner= $this-
        $user = $this->session->userdata('id_user');
        $data['transaksi'] = $this->db->query(" SELECT *, tr.kategori as tr_kategori, tr.harga as tr_harga, kos.harga as kos_harga FROM transaksi tr, tbl_kos kos, tb_user user WHERE tr.id_kos=kos.id_kos AND tr.id_user=user.id_user AND user.id_user='$user' ORDER BY id_booking DESC")->result();
      
      
        // $data['transaksi'] = $this->db->query(" SELECT * FROM transaksi tr, tbl_kos kos, tb_user user WHERE tr.id_kos=kos.id_kos AND tr.id_user=user.id_user ORDER BY id_booking DESC")->result();
        $data['jk'] = $this->session->userdata('jk');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['id_user'] = $this->session->userdata('id_user');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));
        $this->load->view('navbar_user', $data);
        $this->load->view('customer/data_transaksi', $data);
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
				'tempat'			=> $data_tempat
			);

		    $query = $this->db->query("SELECT COUNT(t.id_kos) AS count
                           FROM transaksi t
                           JOIN tb_user u ON t.id_user = u.id_user
                           WHERE u.is_active = 1
                           AND t.id_kos = " . $this->db->escape($data2['id_kos']));

			$data_sewa['sewa'] = $query->row()->count;

            $this->load->view('navbar_user');
			$this->load->view('user/detail_kos', $data2, $data_sewa);
			$this->load->view('user/footer');
		} else {
			redirect(404);
		}
	}

    public function pembayaran($id)
    {
        $user = $this->session->userdata('id_user');
        $data['transaksi'] = $this->db->query(" SELECT *, tr.kategori as tr_kategori, kos.kategori as kos_kategori FROM transaksi tr, tbl_kos kos, tb_user user WHERE tr.id_kos=kos.id_kos  AND tr.id_user=user.id_user AND tr.id_booking='$id' ORDER BY id_booking DESC")->result();

        if ($user == $data['transaksi'][0]->id_user) {

            // Kode untuk update is_active menjadi 1
            $id_user = $user; // Menggunakan nilai $user sebagai id_user
            $this->db->set('is_active', 1);
            $this->db->where('id_user', $id_user);
            $this->db->update('tb_user'); // Ganti 'nama_tabel' dengan nama tabel yang sesuai

            $this->load->view('navbar_user', $data);
            $this->load->view('customer/pembayaran', $data);
        } else {
            redirect('404');
        }
    }
    public function pembayaran_aksi()
    {
        $id_booking =  $this->input->post('id_booking');
        $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];

        if ($bukti_pembayaran)
            $config['upload_path'] = 'file/kos_image';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '100000000';
        $config['min_size'] = '0';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('bukti_pembayaran')) {
            var_dump($this->upload->display_errors());
            $bukti_pembayaran =  $this->upload->data('file_name');
            $this->db->set('bukti_pembayaran', $bukti_pembayaran);

        } else {
            echo "Gagal upload";
        }
        $data   =   array('bukti_pembayaran' => $bukti_pembayaran);
        $where  =   array('id_booking' => $id_booking);

        $this->load->model('Kpr_model');
        $this->Kpr_model->update_data('transaksi', $data, $where);
        $this->session->set_flashdata('flash', ' <div class="alert alert-info alert-dismissible fade show" role="alert"> Transaksi Telah di update Mohon tunggu konfirmasi
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

            <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>

        </div> ');
        redirect('customer/transaksi');
    }

    public function print_invoice($id)
    {
        $user = $this->session->userdata('id_user');
        $data['transaksi'] = $this->db->query("SELECT *, tr.kategori as tr_kategori, kos.kategori as kos_kategori  FROM transaksi tr, tbl_kos kos, tb_user user WHERE tr.id_kos=kos.id_kos AND tr.id_user=user.id_user AND tr.id_booking='$id'")->result();

        if ($user == $data['transaksi'][0]->id_user) {
            $this->load->view('customer/cetak_invoice', $data);
        } else {
            redirect('404');
        }
    }

    public function batal_transaksi($id)
    {
        $where = array('id_booking' => $id);
        $this->load->model('Kpr_model');
        $data = $this->Kpr_model->get_where($where, 'transaksi')->row();

        $where2 = array('id_kos'  => $data->id_kos);
        $data2 = array('status'     => '1');

        $id_user = $user; // Menggunakan nilai $user sebagai id_user
        $this->db->set('is_active', 1);
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user'); // Ganti 'nama_tabel' dengan nama tabel yang sesuai


        $this->load->model('Kpr_model');
        $this->Kpr_model->update_data('tbl_kos', $data2, $where2);
        $this->Kpr_model->hapus_kos($where, 'transaksi');
        $this->session->set_flashdata('flash', ' <div class="alert alert-info alert-dismissible fade show" role="alert"> Transaksi Telah di Batalkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

        <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>

    </div> ');
        redirect('customer/transaksi');
    }
}
