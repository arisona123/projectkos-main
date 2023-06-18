<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super_admin extends CI_Controller
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
        redirect(404);
    }

    public function data_admin()
    {
        $data['title'] = 'Data Admin';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['admin'] = $this->db->get_where('tb_user', ['id_role' => 1])->result_array();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('superadmin/view_superadmin', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function daftar_Admin()
    {
        $data['title'] = 'Daftar Admin';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['admin'] = $this->db->get_where('tb_user', ['id_role' => 1])->result_array();

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]', [
            'is_unique' => 'This username has already taken',
            'required' => 'The username field is required.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'The password too sort!',
            'required' => 'The Password field is required.'
        ]);
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email has already registered',
            'required' => 'The Email field is required.'
        ]);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
            'required' => 'The Gender field is required.'
        ]);
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim|numeric|is_unique[tb_user.no_hp]', [
            'is_unique' => 'This phone Number has already taken',
            'required' => 'The Phone Number field is required.'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'The Address field is required.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar', $data);
            $this->load->view('template_admin/topbar', $data);
            $this->load->view('superadmin/v_tambah_user');
            $this->load->view('template_admin/footer', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $fullname = $this->input->post('fullname');
            $jk = $this->input->post('jk');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $alamat = $this->input->post('alamat');
            $id_role = $this->input->post('id_role');


            if ($jk == 1) {
                $image = 'pria.png';
            } else {
                $image = 'wanita.png';
            }
            $data = array(
                'username' => $username,
                'password' => md5($password),
                'fullname' => $fullname,
                'foto'         => $image,
                'jk' => $jk,
                'email' => $email,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
                'id_role' => $id_role
            );
            $this->User_model->input_data_user($data, 'tb_user');
            $this->session->set_flashdata('message', 'Data Admin berhasil ditambahkan');
            redirect('super_admin/data_admin');
        }
    }



    function proses_update_admin()
    {
        $username = $this->input->post('username');
        $fullname = $this->input->post('fullname');
        $jk = $this->input->post('jk');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $id_role = $this->input->post('id_role');
        $id = $this->input->post('id_user');

        $data = array(
            'username' => $username,
            'fullname' => $fullname,
            'jk' => $jk,
            'email' => $email,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'id_role' => $id_role
        );

        $where = array(
            'id_user' => $id
        );

        $this->User_model->update_data_user($where, $data, 'tb_user');
        $this->session->set_flashdata('message', 'Data Admin berhasil diperbarui');
        redirect('super_admin/data_admin');
    }
    function edit_admin($id)
    {

        $data['title'] = 'Edit Admin';
        $where = array('id_user' => $id);
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['admin'] = $this->User_model->edit_data_user($where, 'tb_user')->result();


        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('superadmin/v_edit_user');
        $this->load->view('template_admin/footer', $data);
    }
    function hapus_admin($id)
    {
        $where = array('id_user' => $id);
        $this->User_model->hapus_data_user($where, 'tb_user');
        $this->session->set_flashdata('message', 'Data Admin berhasil dihapus');
        redirect('super_admin/data_admin');
    }

    public function view_superadmin()
    {
        $data['user'] = $this->User_model->get_listuser();
        $this->load->view('super_admin/data_admin', $data);
    }
}
