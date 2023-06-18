<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Login_model');
        $this->load->model('User_model');
        $this->load->model('Model_request');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('security');
    }

    public function index()
    {
        $this->load->helper('text');
        $this->load->library('pagination');

        if ($this->session->userdata('id_role') == 1) {
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Data Kos';
            $data['kos'] = $this->User_model->get_listkos();

            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar', $data);
            $this->load->view('template_admin/topbar', $data);
            $this->load->view('owner/view_kos_owner', $data);
            $this->load->view('template_admin/footer', $data);
        } elseif ($this->session->userdata('id_role') == 3) {
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Data Kos';
            $data['kos'] = $this->User_model->list_Kos_owner();
            $data['request'] = $this->db->get_where('tb_request', ['id_user_request' => $this->session->userdata('id_user')])->row_array();

            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar', $data);
            $this->load->view('template_admin/topbar', $data);
            $this->load->view('owner/view_kos_owner', $data);
            $this->load->view('template_admin/footer', $data);
        } elseif ($this->session->userdata('id_role') == 4) {
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Data Kos';
            $data['kos'] = $this->User_model->get_listkos();

            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar', $data);
            $this->load->view('template_admin/topbar', $data);
            $this->load->view('owner/view_kos_owner', $data);
            $this->load->view('template_admin/footer', $data);
        } else {
            redirect(404);
        }
    }

    public function tambah_kos()
    {
        if ($this->session->userdata('id_role') != 3) {
            $this->session->set_flashdata('message', 'akun tidak memiliki akses untuk menambah data');
            redirect(base_url('Owner'));
        };
        $data['request'] = $this->db->get_where('tb_request', ['id_user_request' => $this->session->userdata('id_user')])->row_array();
        if (empty($data['request'])) {
            $this->session->set_flashdata('message', 'Anda harus melakuakn request pemilik terlebih dahulu!!');
            redirect(base_url('Owner'));
        } else {
            if ($data['request']['is_active'] == 0) {
                $this->session->set_flashdata('message', 'Menunggu request pemilik di aktivasi');
                redirect(base_url('Owner'));
            };
        };


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 1e302f2c037212164357f3df68be4409"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_res = json_decode($response, true);
            $data['datakota'] = $array_res["rajaongkir"]["results"];
        }

        $data['title'] = 'Tambah data kos';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data2 = array(
            //'id_user'	=> '',
            'id_kos'            => '',
            'status'            => '',
            'slug'              => '',
            'nama'              => '',
            'image_header'      => '',
            'tipe'              => '',
            'fasilitas'         => '',
            'deskripsi'         => '',
            'alamat'            => '',
            'kota'              => '',
            'harga'             => '',
            'kategori'          => '',
            'sisa_kamar'        => '',
            'peraturan'         => '',
            'stat'              => 'new',
        );

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('view_tambah_kos_admin', $data2);
        $this->load->view('template_admin/footer', $data);
    }

    public function post_kos()
    {
        if ($_POST) {
            date_default_timezone_set('Asia/Jakarta');
            $this->load->helper('url');
            $this->load->library('Image_lib');
            $this->load->library('upload');

            $id_user                 = $this->session->userdata('id_user');
            $id_kos                  = $this->input->post('id_kos');
            $nama                    = $this->input->post('nama');
            $tipe                    = $this->input->post('tipe');
            $fasilitas               = $this->input->post('fasilitas');
            $fasilitas_umum          = $this->input->post('fasilitas_umum');
            $fasilitas_kamar_mandi   = $this->input->post('fasilitas_kamar_mandi');
            $fasilitas_parkir        = $this->input->post('fasilitas_parkir');
            $alamat                  = $this->input->post('alamat');
            $kota                    = $this->input->post('kota');
            $harga                   = $this->input->post('harga');
            $kategori                = $this->input->post('kategori');
            $sisa_kamar              = $this->input->post('sisa_kamar');
            $peraturan_kamar         = $this->input->post('peraturan_kamar');
            $spesifikasi_kamar       = $this->input->post('spesifikasi_kamar');
            $spek_kmr_pnjng          = $this->input->post('panjang_kmr');
            $spek_kmr_lebar          = $this->input->post('lebar_kmr');
            $spek_kmr_listrik        = $this->input->post('listrik');
            $spesifikasi_kamar       = $spek_kmr_pnjng . "x" . $spek_kmr_lebar . " Meter;" . $spek_kmr_listrik;
            $status                  = $this->input->post('status');
            $stat                    = $this->input->post('stat');

            $slug        = url_title($nama, 'dash', TRUE);
            $date       = date('Y-m-d H:i:s');
            $time       = date('H:i:s');


            if ($stat == 'new') {

                if ($_FILES['image_header']['name'] != "") {
                    $config['upload_path'] = 'file/kos_image';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = '2048';
                    $config['remove_spaces'] = true;
                    $config['overwrite'] = false;
                    $config['encrypt_name'] = true;
                    $config['max_width']  = '';
                    $config['max_height']  = '';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('image_header')) {
                        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
                        exit();
                    } else {
                        $image = $this->upload->data();

                        if ($image['file_name']) {
                            $data['file1'] = $image['file_name'];
                        }
                        $image_header = $data['file1'];
                    }
                }

                $data = array(
                    'date'                  => $date,
                    'time'                  => $time,
                    'image_header'          => $image_header,
                    'status'                => $status,
                    'slug'                  => $slug,
                    'nama'                  => $nama,
                    'tipe'                  => $tipe,
                    'fasilitas'             => json_encode($fasilitas),
                    'fasilitas_umum'        => json_encode($fasilitas_umum),
                    'fasilitas_kamar_mandi' => json_encode($fasilitas_kamar_mandi),
                    'fasilitas_parkir'      => json_encode($fasilitas_parkir),
                    'alamat'                => $alamat,
                    'kota'                  => $kota,
                    'harga'                 => $harga,
                    'kategori'              => json_encode($kategori),
                    'sisa_kamar'            => $sisa_kamar,
                    'peraturan_kamar'       => json_encode($peraturan_kamar),
                    'spesifikasi_kamar'     => $spesifikasi_kamar,
                    'id_user'               => $id_user
                );
                $this->User_model->insertdata('tbl_kos', $data);
                $this->session->set_flashdata('message', 'Data Kos anda berhasil di tambahkan');
                redirect(base_url('Owner'));
            } else {
                $this->db->where('id_kos', $id_kos);
                $query  = $this->db->get('tbl_kos');
                $row  = $query->row();

                unlink("./file/kos_image/$row->image_header");

                if ($_FILES['image_header']['name'] != "") {
                    $config['upload_path'] = 'file/kos_image';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = '2048';
                    $config['remove_spaces'] = true;
                    $config['overwrite'] = false;
                    $config['encrypt_name'] = true;
                    $config['max_width']  = '';
                    $config['max_height']  = '';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('image_header')) {
                        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
                        exit();
                    } else {
                        $image = $this->upload->data();
                        if ($image['file_name']) {
                            $data['file1'] = $image['file_name'];
                        }
                        $image_header = $data['file1'];
                    }
                }

                $data = array(
                    'date'                  => $date,
                    'time'                  => $time,
                    'image_header'          => $image_header,
                    'status'                => $status,
                    'id_user'               => $id_user,
                    'slug'                  => $slug,
                    'nama'                  => $nama,
                    'tipe'                  => $tipe,
                    'fasilitas'             => json_encode($fasilitas),
                    'fasilitas_umum'        => json_encode($fasilitas_umum),
                    'fasilitas_kamar_mandi' => json_encode($fasilitas_kamar_mandi),
                    'fasilitas_parkir'      => json_encode($fasilitas_parkir),
                    'alamat'                => $alamat,
                    'kota'                  => $kota,
                    'harga'                 => $harga,
                    'kategori'              => json_encode($kategori),
                    'sisa_kamar'            => $sisa_kamar,
                    'peraturan_kamar'       => json_encode($peraturan_kamar),
                    'spesifikasi_kamar'     => $spesifikasi_kamar,
                );

                $this->User_model->updatedata('tbl_kos', $data, array('id_kos' => $id_kos));
                $this->session->set_flashdata('message', 'Data kos anda berhasil di tambahkan');
                redirect(base_url('Owner'));
            }
        } else {
            redirect(404);
        }
    }

    public function post_tempat()
    {
        $kategoriTempat = $this->input->post('kategoriTempat');
        $namaTempat     = $this->input->post('namaTempat');
        $id_kos         = $this->input->post('id_kos');

        $data = [
            'kategoriTempat'     => $kategoriTempat,
            'namaTempat'         => $namaTempat,
            'id_kos'             => $id_kos
        ];
        $this->User_model->insertdata('tbl_tempat', $data, array('id_kos' => $id_kos));
        $this->session->set_flashdata('message', 'Data tempat anda berhasil ditambah');
        redirect(base_url('owner/tambah_tempat/') . $id_kos);
    }

    function proses_update_kos()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        // $image_header = $this->input->post('image_header');
        $tipe                   = $this->input->post('tipe');
        $fasilitas              = $this->input->post('fasilitas');
        $fasilitas_umum         = $this->input->post('fasilitas_umum');
        $fasilitas_kamar_mandi  = $this->input->post('fasilitas_kamar_mandi');
        $fasilitas_parkir       = $this->input->post('fasilitas_parkir');
        $alamat                 = $this->input->post('alamat');
        $kota                   = $this->input->post('kota');
        $harga                  = $this->input->post('harga');
        $kategori               = $this->input->post('kategori');
        $sisa_kamar             = $this->input->post('sisa_kamar');
        $peraturan_kamar        = $this->input->post('peraturan_kamar');
        $spek_kmr_pnjng         = $this->input->post('panjang_kmr');
        $spek_kmr_lebar         = $this->input->post('lebar_kmr');
        $spek_kmr_listrik       = $this->input->post('listrik');
        $spesifikasi_kamar      = $spek_kmr_pnjng . "x" . $spek_kmr_lebar . " Meter;" . $spek_kmr_listrik;
        $status                 = $this->input->post('status');
        $id                     = $this->input->post('id_kos');

        $date             = date('Y-m-d H:i:s');
        $time             = date('H:i:s');

        $data = array(
            'status'                => $status,
            'date'                  => $date,
            'time'                  => $time,
            // 'image_header'	    => $image_header,
            'nama'                  => $nama,
            'tipe'                  => $tipe,
            'fasilitas'             => json_encode($fasilitas),
            'fasilitas_umum'        => json_encode($fasilitas_umum),
            'fasilitas_kamar_mandi' => json_encode($fasilitas_kamar_mandi),
            'fasilitas_parkir'      => json_encode($fasilitas_parkir),
            'alamat'                => $alamat,
            'kota'                  => $kota,
            'harga'                 => $harga,
            'kategori'              => json_encode($kategori),
            'sisa_kamar'            => $sisa_kamar,
            'peraturan_kamar'       => json_encode($peraturan_kamar),
            'spesifikasi_kamar'     => $spesifikasi_kamar,
        );

        $where = array(
            'id_kos' => $id
        );


        $this->User_model->update_data_user($where, $data, 'tbl_kos');
        $this->session->set_flashdata('message', 'Data kos anda berhasil diperbarui');
        redirect('owner');
    }

    function hapus_kos_admin($id)
    {
        $where = array('id_kos' => $id);
        $nama = $this->User_model->get_img_header($id);
        $this->User_model->hapus_data_user($where, 'tbl_kos');

        // Hapus Tempat Terdekat
        $where = array('id_kos' => $id);
        $this->User_model->hapus_data_user($where, 'tbl_tempat');

        unlink("./file/kos_image/$nama->image_header");
        $this->session->set_flashdata('message', 'Data kos anda berhasil dihapus');
        redirect('owner');
    }

    function edit_kos_admin($id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 1e302f2c037212164357f3df68be4409"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_res = json_decode($response, true);
            $data['datakota'] = $array_res["rajaongkir"]["results"];
        }

        $data['title'] = 'Edit Data Kos';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id_kos' => $id);
        $data['kos'] = $this->User_model->edit_data_user($where, 'tbl_kos')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('v_edit_kos_admin');
        $this->load->view('template_admin/footer', $data);
    }

    public function tambah_tempat($id = '')
    {

        $data_tempat = $this->User_model->getTempat("where tbl_kos.id_kos = '$id'")->result_array();
        $data_kos = $this->User_model->getKos("where tbl_kos.id_kos = '$id'")->result_array();
        $where = array('id_kos' => $id);
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tbl_kos'] = $this->User_model->edit_data_user($where, 'tbl_tempat',)->result();
        $data['title'] = 'Tambah Tempat Terdekat';
        $data2 = array(
            'id_kos'                => $id,
            'id_tempat'             => '',
            'kategoriTempat'        => '',
            'namaTempat'            => '',
            'nama'                  => strip_tags($data_kos[0]['nama']),
            'tempat'                => $data_tempat
        );


        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('view_tambah_tempat', $data2);
        $this->load->view('template_admin/footer', $data);
    }


    function hapus_tempat_terdekat($id, $id_kos)
    {
        $where = array('id_tempat' => $id);

        $this->User_model->hapus_data_user($where, 'tbl_tempat');

        $this->session->set_flashdata('message', 'Data tempat berhasil dihapus');
        redirect(base_url('owner/tambah_tempat/') . $id_kos);
    }

    public function data_sewa()
    {
        $data['title'] = 'Data Sewa';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        if ($this->session->userdata('id_role') == 1) {
            $data['transaksi'] = $this->User_model->list_transaksi();
        } elseif ($this->session->userdata('id_role') == 3) {
            $data['transaksi'] = $this->User_model->transaksi_Owner();
        } elseif ($this->session->userdata('id_role') == 4) {
            $data['transaksi'] = $this->User_model->list_transaksi();
        } else {
            redirect(404);
        }

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('admin/data_transaksi', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function cek_pembayaran($id)
    {
        $where = array('id_booking' => $id);
        $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_booking='$id'")->row_array();
        // var_dump($data['pembayaran']['id_kos']);
        // die;

        $data['title'] = 'Konfirmasi pembayaran';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('admin/konfirmasi_pembayaran', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function download_pembayaran($id)
    {
        $this->load->helper('download');
        $this->load->model('Kpr_model');

        $file_pembayaran = $this->Kpr_model->download_pembayaran($id);
        $file            = realpath(FCPATH . './file/kos_image' . '/' . $file_pembayaran['bukti_pembayaran']);

        if (file_exists($file)) {
            force_download($file, null);
        } else {
            echo 'File tidak ditemukan';
        }
    }

    public function dl_pembayaran()
    {
        $id = $this->input->post('id_booking');
        $id_kos = $this->input->post('id_kos');
        $sisa_kamar = $this->input->post('sisa_kamar');

        $this->load->model('Kpr_model');
        $data = array('status_pembayaran' => '1');
        $where = array('id_booking' => $id);

        $this->Kpr_model->update_data('transaksi', $data, $where);
        $this->db->set('sisa_kamar', $sisa_kamar);
        $this->db->where('id_kos', $id_kos);
        $this->db->update('tbl_kos');
        $this->session->set_flashdata('massage', 'Konfirmasi berhasil');
        redirect('owner/data_sewa');
    }

    public function batal_transaksi($id)
    {
        $where = array('id_booking' => $id);
        $this->load->model('Kpr_model');
        $data = $this->Kpr_model->get_where($where, 'transaksi')->result();
        $where2 = array('id_kos'  => $data->id_kos);
        $data2 = array('status'     => '1');
        $this->Kpr_model->update_data('tbl_kos', $data2, $where2);
        $this->Kpr_model->hapus_kos($where, 'transaksi');
        $this->session->set_flashdata('message', 'Transaksi dibatalkan');
        redirect('owner/data_sewa');
    }

    public function request_owner()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Request Owner';

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('pemilikkos/v_tambah_request', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function proses_tambah_request()
    {
        $id_user        = $this->input->post('id_user_request');
        $nama_depan     = $this->input->post('nama_depan');
        $nama_belakang  = $this->input->post('nama_belakang');
        $info_hub       = $this->input->post('info_hub');
        $no_hp          = $this->input->post('no_hp');
        $tipe_kos       = $this->input->post('tipe_kos');
        $nama_properti  = $this->input->post('nama_properti');
        // $url_properti   = $this->input->post('url_properti');
        $harga          = $this->input->post('harga');
        $provinsi       = $this->input->post('provinsi');
        $kabupaten_kota = $this->input->post('kabupaten_kota');
        $kecamatan      = $this->input->post('kecamatan');
        $kelurahan      = $this->input->post('kelurahan');
        $alamat         = $this->input->post('alamat');
        $jumlah_kamar   = $this->input->post('jumlah_kamar');

        $data = array(
            'nama_depan'    => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'info_hub'      => $info_hub,
            'no_hp'         => $no_hp,
            'tipe_kos'      => $tipe_kos,
            'nama_properti' => $nama_properti,
            // 'url_properti'  => $url_properti,
            'harga'         => $harga,
            'provinsi'      => $provinsi,
            'kabupaten_kota' => $kabupaten_kota,
            'kecamatan'     => $kecamatan,
            'kelurahan'     => $kelurahan,
            'alamat'        => $alamat,
            'jumlah_kamar'  => $jumlah_kamar,
            'id_user_request'  => $id_user

        );
        $this->User_model->input_data_request($data, 'tb_request');
        $this->session->set_flashdata('message', 'Permintaan request anda lagi di proses mohon tunggu 2x24 jam !!');
        redirect('owner');
    }
}
