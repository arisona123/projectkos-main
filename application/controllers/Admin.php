<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

        $data['title'] = 'Dasbor Admin';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
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

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('dashboard_admin', $data2);
        $this->load->view('template_admin/footer', $data);
    }
    public function request_owner()
    {
        $this->load->library('pagination');
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Permintaan Pemilik';
        $data['owner'] = $this->Model_request->tampil_data();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('request', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function request_detail($id_request)
    {
        $detail = $this->Model_request->detail_data($id_request);
        $data['detail'] = $detail;
        $sudah_login = $this->session->userdata('sudah_login');
        $data['jk'] = $this->session->userdata('jk');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['id_user'] = $this->session->userdata('id_user');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['request'] = $this->Model_request->tampil_data();
        $data['title'] = 'Detail request pemilik';

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('detail', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function data_pengguna()
    {
        $data['title'] = 'Data Pengguna';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['User_data'] = $this->User_model->list_pengguna();


        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('view_admin', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function cek_pembayaran($id)
    {
        $where = array('id_booking' => $id);
        $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_booking='$id'")->result();
        $data['jk'] = $this->session->userdata('jk');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['id_user'] = $this->session->userdata('id_user');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));
        $data['title'] = 'Konfirmasi pembayaran';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('admin/konfirmasi_pembayaran', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function cek_avtivasi($id)
    {
        $data['title'] = 'Cek aktivasi';
        $where = array('id_request' => $id);
        // $data['user1'] = $this->User_model->get_listuser();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['request'] = $this->db->query("SELECT * FROM tb_request WHERE id_request='$id'")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('admin/cek_aktivasi', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function proses_aktivasi()
    {
        $id = $this->input->post('id_request');
        $this->load->model('Kpr_model');

        $data = array('is_active' => '1');
        $where = array('id_request' => $id);

        $this->Kpr_model->update_data('tb_request', $data, $where);
        $this->session->set_flashdata('message', 'data berhasil di aktivasi!!');
        redirect('admin/request_owner');
    }

    public function hapus_request($id)
    {
        $where = array('id_request' => $id);
        $this->load->model('Kpr_model');
        // $data = $this->Kpr_model->get_where($where, 'tb_request')->result();
        // $where2 = array('id_kos'  => $data->id_kos);
        // $data2 = array('status'     => '1');

        // $this->Kpr_model->update_data('tbl_kos', $data2, $where2);
        $this->Kpr_model->hapus_kos($where, 'tb_request');
        $this->session->set_flashdata('message', 'Aktivasi dibatalkan');
        redirect('admin/request_owner');
    }

    function proses_update_user()
    {
        $username = $this->input->post('username');
        $fullname = $this->input->post('fullname');
        $jk = $this->input->post('jk');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');

        $id = $this->input->post('id_user');

        $data = array(
            'username' => $username,
            'fullname' => $fullname,
            'jk' => $jk,
            'email' => $email,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
        );

        $where = array(
            'id_user' => $id
        );

        $this->User_model->update_data_user($where, $data, 'tb_user');
        $this->session->set_flashdata('message', 'Data user berhasil diperbarui');
        redirect('admin/data_pengguna');
    }
    function edit_user($id)
    {

        $data['title'] = 'Edit data pengguna';
        $where = array('id_user' => $id);
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['admin'] = $this->User_model->edit_data_user($where, 'tb_user')->result();


        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('superadmin/v_edit_user');
        $this->load->view('template_admin/footer', $data);
    }

    function hapus_user($id)
    {
        var_dump($id);
        $where = array('id_user' => $id);
        $this->User_model->hapus_user($where, 'tb_user');
        $this->session->set_flashdata('message', 'Data berhasil di aktivasi!!');
        redirect('admin/data_pengguna');
    }

    public function blocked()
    {
        redirect(404);
    }
}
