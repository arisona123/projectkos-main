<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_Back_Owner extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Login_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('security');
    }

    public function index()
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
            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner');
            $this->load->view('pemilikkos/footer');
            $this->load->view('pemilikkos/session_owner');
        }
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
            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner');
            $this->load->view('pemilikkos/footer');
            $this->load->view('pemilikkos/session_owner');
        }
    }

    public function data_kos($id)
    {
        $this->load->helper('text');
        $data['sql'] = $this->User_model->info_kos($id);
        $sudah_login = $this->session->userdata('sudah_login');
        $data['jk'] = $this->session->userdata('jk');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['id_user'] = $this->session->userdata('id_user');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));


        if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
            redirect(base_url('Login'));
        } else {
            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner', $data);
            $this->load->view('pemilikkos/footer');
            $this->load->view('view_kos', $data);
        }
    }

    public function data_owner($id)
    {
        $this->load->helper('text');
        $data['sql'] = $this->User_model->info_user($id);
        $sudah_login = $this->session->userdata('sudah_login');
        $data['jk'] = $this->session->userdata('jk');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['id_user'] = $this->session->userdata('id_user');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));


        if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
            redirect(base_url('Login'));
        } else {
            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner', $data);
            $this->load->view('pemilikkos/footer');
            $this->load->view('pemilikkos/view_profile_owner', $data);
        }
    }

    function edit_owner($id)
    {
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
            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner');
            $this->load->view('pemilikkos/footer');
            $this->load->view('pemilikkos/v_edit_owner');
        }
    }

    function proses_update_owner()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $fullname = $this->input->post('fullname');
        $jk = $this->input->post('jk');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $id_role = $this->input->post('id_role');
        $id = $this->input->post('id_user');

        $data = array(
            'username' => $username,
            'password' => md5($password),
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
        redirect('Main_Back_Owner/data_owner/' . $this->session->userdata('id_user'));
    }

    //BAGIAN CHAT PEMILIK KOS
    public function grid_data()
    {
        $this->OuthModel->CSRFVerify();
        // storing  request (ie, get/post) global array to a variable  
        $requestData = $_REQUEST;
        //print_r($requestData);
        $table = "users";
        $fields = "id,name,email, role, created ,username,picture_url,status";
        $id = '';
        $where = " WHERE `role` != 'Admin' ";
        $sql = "SELECT " . $fields;
        $sql .= " FROM " . $table . $where;
        //echo $sql;
        $query = $this->db->query($sql);
        $queryqResults = $query->result();
        $totalData = $query->num_rows(); // rules datatable
        $totalFiltered = $totalData; // rules datatable
        $where = " WHERE `role` != 'Admin' ";
        $sql = "SELECT " . $fields;
        $sql .= " FROM " . $table . $where;
        if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchValue = $requestData['search']['value'];
            $sql .= " AND `name` LIKE '%" . $searchValue . "%' ";
            $sql .= " AND `username` LIKE '%" . $searchValue . "%' ";
            $sql .= " OR `email` LIKE '%" . $searchValue . "%' ";
            $sql .= " OR `no_hp` LIKE '%" . $searchValue . "%' ";
        }
        $query = $this->db->query($sql);
        $totalFiltered = $query->num_rows(); // rules datatable
        //ORDER BY id DESC	
        $sql .= " ORDER BY  created  " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
        $query = $this->db->query($sql);
        //echo $sql;
        $SearchResults = $query->result();
        $data = array();
        foreach ($SearchResults as $row) {
            $nestedData = array();
            $id = $row->id;
            $url_id = '"' . $this->OuthModel->Encryptor('encrypt', $row->id) . '"';
            //$tableCheckTD = "<label class='pos-rel'><input type='checkbox' class='ace' /><span class='lbl'></span></label>";
            $action =  "<div class='action-buttons'>&nbsp;&nbsp;&nbsp;
 																<a onclick='trash($url_id)'  class='red trashID' href='javascript:void(0);'>
																	<i class='ace-icon fa fa-trash-o bigger-130'></i>
																</a>
 															</div>";
            if ($row->status == 2) {
                $action1 = "<a onclick='block($url_id,1)' href='javascript:void(0);'><span class='label label-danger'>Unblock</span>&nbsp;";
            }
            if ($row->status == 0 || $row->status == 1) {
                $action1 = "<a onclick='block($url_id,2)' href='javascript:void(0);'><span class='label label-danger'>Block</span>&nbsp;";
            }
            $action2 = '';
            //$action2 = "<a onclick='trash($url_id)' href='javascript:void(0);'><span class='label label-danger'>Remove</span>";											
            $imgUrl = base_url('public/images/user-icon.jpg');
            if (!empty($row->picture_url)) {
                $imgUrl = base_url('uploads/profiles/' . $row->picture_url);
            }
            $statusTxt = '';
            if ($row->status == 0) {
                $statusTxt = "<a onclick='status($url_id,1)' href='javascript:void(0);'><span class='label label-warning'>InActive</span>";
            } else if ($row->status == 1) {
                $statusTxt = "<a onclick='status($url_id,0)' href='javascript:void(0);'><span class='label label-primary'>Active</span>";
            } else {
                $statusTxt = "<a href='javascript:void(0);'><span class='label label-danger'>Account Blocked</span>";
            }
            $nestedData[] = '<span class="nameID_' . $id . '">' . $row->id . '</span>';
            $nestedData[] = '<span class="nameID_' . $id . '"><img class="img-thumbnail imgcls" src="' . $imgUrl . '"></span>';
            $nestedData[] = '<span class="contactID_' . $id . '">' . $row->email . '</span>';
            $nestedData[] = '<span class="contactID_' . $id . '">' . $row->name . '</span>';
            $nestedData[] = '<span class="contactID_' . $id . '">' . $row->role . '</span>';
            $nestedData[] = '<span class="contactID_' . $id . '">' . $statusTxt . '</span>';
            $nestedData[] = $row->created;
            $nestedData[] =  $action1 . $action2; // $action; 
            $data[] = $nestedData;
        }
        $json_data = array(
            "draw"            => intval($requestData['draw']),
            "recordsTotal"    => intval($totalData),  // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching,  
            "data"            => $data   // total data array
        );
        echo json_encode($json_data);  // send data as json format					
    }

    //PENUTUP PEMILIK KOS

    public function semua_kos()
    {
        $data['sql'] = $this->User_model->info_semua_kos();
        $sudah_login = $this->session->userdata('sudah_login');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['jk'] = $this->session->userdata('jk');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));


        if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
            redirect(base_url('Login'));
        } else {

            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner');
            $this->load->view('pemilikkos/footer');
            $this->load->view('kategorikos_user/index', $data);
        }
    }

    public function kos_putra()
    {
        $data['sql'] = $this->User_model->info_kos_putra();
        $sudah_login = $this->session->userdata('sudah_login');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['jk'] = $this->session->userdata('jk');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));


        if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
            redirect(base_url('Login'));
        } else {

            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner');
            $this->load->view('pemilikkos/footer');
            $this->load->view('kategorikos_user/putra', $data);
        }
    }

    public function kos_putri()
    {
        $data['sql'] = $this->User_model->info_kos_putri();
        $sudah_login = $this->session->userdata('sudah_login');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['jk'] = $this->session->userdata('jk');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));


        if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
            redirect(base_url('Login'));
        } else {

            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner');
            $this->load->view('pemilikkos/footer');
            $this->load->view('pemilikkos/kategorikos_user/putri', $data);
        }
    }

    public function kos_campur()
    {
        $data['sql'] = $this->User_model->info_kos_campur();
        $sudah_login = $this->session->userdata('sudah_login');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['jk'] = $this->session->userdata('jk');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));


        if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
            redirect(base_url('Login'));
        } else {
            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner');
            $this->load->view('pemilikkos/footer');
            $this->load->view('pemilikkos/kategorikos_user/campur', $data);
        }
    }

    public function daftar_request()
    {
        $sudah_login = $this->session->userdata('sudah_login');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['jk'] = $this->session->userdata('jk');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));


        if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
            redirect(base_url('Login'));
        } else {

            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner');
            $this->load->view('pemilikkos/footer');
            $this->load->view('pemilikkos/v_tambah_request');
        }
    }



    public function view_request()
    {
        $sudah_login        = $this->session->userdata('sudah_login');
        $data['id_role']    = $this->session->userdata('id_role');
        $data['jk']         = $this->session->userdata('jk');
        $data['username']   = $this->session->userdata('username');
        $data['email']      = $this->session->userdata('email');
        $data['fullname']   = strtoupper($this->session->userdata('fullname'));
        $data['request']    = $this->User_model->get_listrequest();

        if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
            redirect(base_url('Login'));
        } else {
            $this->load->view('pemilikkos/view_request_owner', $data);
        }
    }

    function edit_request($id)
    {
        $sudah_login        = $this->session->userdata('sudah_login');
        $data['id_role']    = $this->session->userdata('id_role');
        $data['jk']         = $this->session->userdata('jk');
        $data['username']   = $this->session->userdata('username');
        $data['email']      = $this->session->userdata('email');
        $data['fullname']   = strtoupper($this->session->userdata('fullname'));
        $where              = array('id_request' => $id);
        $data['request']    = $this->User_model->edit_data_request($where, 'tb_request')->result();

        if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
            redirect(base_url('Login'));
        } else {
            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner');
            $this->load->view('pemilikkos/footer');
            $this->load->view('pemilikkos/v_edit_request');
        }
    }

    function proses_update_request()
    {
        $nama_depan     = $this->input->post('nama_depan');
        $nama_belakang  = $this->input->post('nama_belakang');
        $info_hub       = $this->input->post('info_hub');
        $no_hp          = $this->input->post('no_hp');
        $tipe_kos       = $this->input->post('tipe_kos');
        $nama_properti  = $this->input->post('nama_properti');
        $url_properti   = $this->input->post('url_properti');
        $harga          = $this->input->post('harga');
        $provinsi       = $this->input->post('provinsi');
        $kabupaten_kota = $this->input->post('kabupaten_kota');
        $kecamatan      = $this->input->post('kecamatan');
        $kelurahan      = $this->input->post('kelurahan');
        $alamat         = $this->input->post('alamat');
        $jumlah_kamar   = $this->input->post('jumlah_kamar');
        $id             = $this->input->post('id_request');

        $data = array(
            'nama_depan'    => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'info_hub'      => $info_hub,
            'no_hp'         => $no_hp,
            'tipe_kos'      => $tipe_kos,
            'nama_properti' => $nama_properti,
            'url_properti'  => $url_properti,
            'harga'         => $harga,
            'provinsi'      => $provinsi,
            'kabupaten_kota' => $kabupaten_kota,
            'kecamatan'     => $kecamatan,
            'kelurahan'     => $kelurahan,
            'alamat'        => $alamat,
            'jumlah_kamar'  => $jumlah_kamar
        );

        $where = array(
            'id_request' => $id
        );

        $this->User_model->update_data_request($where, $data, 'tb_request');
        redirect('Main_Back_Owner/view_request');
    }


    function detail_request($id)
    {
        $sudah_login = $this->session->userdata('sudah_login');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['jk'] = $this->session->userdata('jk');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));
        $where = array('id_request' => $id);
        $data['request'] = $this->User_model->detail_request($id);

        if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
            redirect(base_url('Login'));
        } else {
            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner');
            $this->load->view('pemilikkos/footer');
            $this->load->view('pemilikkos/v_detail_request');
        }
    }

    public function view_chat()
    {
        $sudah_login = $this->session->userdata('sudah_login');
        $data['id_role'] = $this->session->userdata('id_role');
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['fullname'] = strtoupper($this->session->userdata('fullname'));
        $data['jk'] = $this->session->userdata('jk');
        $data['no_hp'] = $this->session->userdata('no_hp');
        $data['alamat'] = $this->session->userdata('alamat');

        if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
            redirect(base_url('Login'));
        } else {
            $this->load->view('pemilikkos/header', $data);
            $this->load->view('pemilikkos/menu_owner');
            $this->load->view('pemilikkos/footer');
            $this->load->view('construction_services/chat_template');
        }
    }
}
