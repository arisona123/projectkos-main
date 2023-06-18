<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Login_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('security');
    }
    public function index()
    {
        $data['id_role'] = $this->session->userdata('id_role');
        $data['jk'] = $this->session->userdata('jk');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profil Saya';


        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('user_sb/index', $data);
        $this->load->view('template_admin/footer', $data);
    }

    function edit_profil()
    {
        $this->load->library('form_validation');
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit profil';

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim', [
            'required' => 'wajib mengisi Nama lengkap.'
        ]);
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim|numeric', [
            'required' => 'wajib mengisi no telpon.',
            'numeric' => 'wajid mengisi mnggunakan angka'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'wajib mengisi alamat lengkap.'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar', $data);
            $this->load->view('template_admin/topbar', $data);
            $this->load->view('v_edit_admin');
            $this->load->view('template_admin/footer', $data);
        } else {
            $fullname = $this->input->post('fullname');
            $no_hp = $this->input->post('no_hp');
            $alamat = $this->input->post('alamat');
            $id = $this->input->post('id_user');

            $data = array(
                'fullname' => $fullname,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
            );

            $where = array(
                'id_user' => $id
            );

            $this->User_model->update_data_user($where, $data, 'tb_user');
            $this->session->set_flashdata('message', 'Profil Anda Berhasil di ubah');
            redirect(base_url('User'));
        }
    }


    public function ubah_password()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Ubah Password';
        $email = $this->input->post('email');

        // $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        // $data_from_db = $this->Login_model->cek_user($email, $enkripsi_pass); // mengambil data dari fungsi cek_user

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
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar', $data);
            $this->load->view('template_admin/topbar', $data);
            $this->load->view('user_sb/ubah_password', $data);
            $this->load->view('template_admin/footer', $data);
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
                    redirect(base_url('User'));
                } else {
                    $this->session->set_flashdata('message', 'Password tidak boleh sama dengan password saat ini!');
                    redirect(base_url('User/ubah_password'));
                }
            } else {
                $this->session->set_flashdata('message', 'Salah memasukan password saat ini!');
                redirect(base_url('User/ubah_password'));
            }
        }
    }

    public function view_ubah_foto()
    {
        $this->load->library('form_validation');
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Ubah Foto Profil';

        $id = $this->input->post('id_user');
        //  cek gambar 
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('user_sb/ubah_foto');
        $this->load->view('template_admin/footer', $data);
    }

    function ubah_foto()
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
        redirect(base_url('User'));
    }

    // function hapus_user($id)
    // {
    //     $where = array('id_user' => $id);
    //     $this->User_model->hapus_data_user($where, 'tb_user');
    //     redirect(base_url('User'));
    // }
}
