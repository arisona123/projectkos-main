<?php
defined('BASEPATH') or exit('No direct script direct allowed');

class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('security');
	}

	//Menampilkan seluruh daftar request yang ada di database (Hak akses untuk pemilik kos)
	function request()
	{
		return $this->db->query("select * from tb_request");
	}

	function detail_request($id_request)
	{
		return $this->db->query("select * from tb_request WHERE id_request='$id_request'")->result();
	}

	function input_data_request($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function edit_data_request($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function update_data_request($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function get_listrequest()
	{
		$this->db->from('tb_request');
		$query = $this->db->get();
		return $query->result();
	}

	//Menampilkan seluruh daftar user yang ada di database (Hak akses untuk admin)
	function user()
	{
		return $this->db->query("select * from tb_user");
	}
	function tempat()
	{
		return $this->db->query("select * from tbl_tempat");
	}
	public function detail($id)
	{
		$query = $this->db->get_where('tbl_kos', array('id_kos' => $id))->result();
		return $query;
	}

	function edit_data_user($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function update_data_user($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function hapus_data_user($where, $table)
	{
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');
		$this->db->where($where);
		$this->db->delete($table);
	}

	function hapus_user($where, $table)
	{
		$this->db->from('tbl_kos');
		$this->db->where($where);
		$this->db->delete($table);
	}

	function delete_kos($where, $tables)
	{
		// var_dump($tables);
		// die;
		$this->db->where($where);
		$this->db->delete($tables);
	}
	// function delete_kos($where, $table)
	// {
	// 	// $this->db->from('tbl_kos');
	// 	// $this->db->join('tbl_tempat', 'tbl_kos.id_kos = tbl_tempat.id_kos');
	// 	$this->db->where($where);
	// 	$this->db->delete($table);
	// }

	//Menampilkan seluruh daftar user yang ada di database (Hak akses untuk admin)
	public function get_listuser()
	{
		$this->db->from('tb_user');
		$this->db->join('tb_role', 'tb_user.id_role = tb_role.id_role');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_img_header($where)
	{
		return $this->db->query(" SELECT image_header FROM tbl_kos WHERE id_kos = $where ")->row();
	}

	public function get_listkos($id = null)
	{
		$this->db->select('*');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tb_user.id_user = tbl_kos.id_user');
		if ($id) {
			$this->db->where('tbl_kos.id_user', $id);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function list_Kos_owner()
	{
		$id = $this->session->userdata('id_user');
		$this->db->select('*');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tb_user.id_user = tbl_kos.id_user');
		$this->db->where('tbl_kos.id_user', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function list_transaksi()
	{
		$id = $this->session->userdata('id_user');
		$query = $this->db->query(" SELECT *, tr.kategori as tr_kategori, tr.harga as tr_harga, kos.harga as kos_harga FROM transaksi tr, tbl_kos kos, tb_user user WHERE tr.id_kos=kos.id_kos AND tr.id_user=user.id_user");
		return $query->result_array();
	}

	public function transaksi_Owner()
	{
		$id = $this->session->userdata('id_user');
		$query = $this->db->query(" SELECT *, tr.kategori as tr_kategori, tr.harga as tr_harga, kos.harga as kos_harga FROM transaksi tr, tbl_kos kos, tb_user user WHERE tr.id_kos=kos.id_kos AND tr.id_user=user.id_user AND tr.id_owner='$id'");
		return $query->result_array();
	}

	public function list_User()
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->join('tb_role', 'tb_user.id_role = tb_role.id_role');
		$query = $this->db->get();
		return $query->result_array();;
	}

	public function list_pengguna()
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->join('tb_role', 'tb_user.id_role = tb_role.id_role');
		$this->db->where('tb_user.id_role !=', 1);
		$this->db->where('tb_user.id_role !=', 4);
		$query = $this->db->get();
		return $query->result_array();;
	}

	public function get_list_tempat($slug = '')
	{
		$this->db->select('tbl_tempat.*, tbl_kos.nama');
		$this->db->from('tbl_tempat');
		$this->db->join('tbl_kos', 'tbl_tempat.id_kos = tbl_kos.id_kos');
		$this->db->where('tbl_kos.slug ', $slug);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_listuser_pengguna($id)
	{
		$this->db->from('tb_user');
		//$this->db->join('tb_role','tb_user.id_role = tb_role.id_role');
		$this->db->where('tb_user.id_user', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function input_data_user($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function get_listrole()
	{
		$this->db->from('tb_role');
		$query = $this->db->get();
		return $query->result();
	}

	function insertdata($tabel, $data)
	{
		return $this->db->insert($tabel, $data);
	}

	function updatedata($tabel, $data, $where)
	{
		return $this->db->update($tabel, $data, $where);
	}

	function getKos($where = '')
	{
		return $this->db->query("select tbl_kos.*,  tb_user.id_user, tb_user.no_hp, tb_user.fullname, tb_user.foto FROM tbl_kos JOIN tb_user ON tbl_kos.id_user=tb_user.id_user  $where;");
	}

	function get_Kos($where = '')
	{
		return $this->db->query("select tbl_kos.*, tb_user.no_hp, tb_user.fullname FROM tbl_kos JOIN tb_user ON tbl_kos.id_user=tb_user.id_user JOIN tbl_tempat ON tbl_kos.id_kos=tbl_tempat.id_kos  $where;");
	}

	function getTempat($where = '')
	{
		return $this->db->query("select tbl_tempat.*, tbl_kos.id_kos, tbl_kos.nama FROM tbl_tempat JOIN tbl_kos ON tbl_tempat.id_kos=tbl_kos.id_kos  $where;");
	}


	function get_tempat($where)
	{
		$this->db->select('tbl_tempat.*,tbl_kos.nama, tbl_kos.slug');
		$this->db->from('tbl_tempat');
		$this->db->join('tbl_kos', 'tbl_kos.id_kos=tbl_tempat.id_kos');
		$this->db->where('tbl_tempat.id_kos', $where);
		$query = $this->db->get();
		return $query;
	}

	function getJumlahKos($where = '')
	{
		return $this->db->query("select * from tbl_kos $where;");
	}

	function getJumlahUser($where = '')
	{
		return $this->db->query("select * from tb_user $where;");
	}

	function getJumlahSewa($where = '')
	{
		return $this->db->query("select * from transaksi $where;");
	}

	function getJumlahRequest($where = '')
	{
		return $this->db->query("select * from tb_request $where;");
	}

	public function info_kos($id)
	{
		$this->db->select('tbl_kos.*, tb_user.id_user');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');
		$this->db->where('tbl_kos.id_user', $id);
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function info_user($id)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('id_user', $id);
		$sql = $this->db->get()->result();
		return $sql;
	}
	public function info_tempat($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_tempat');
		$this->db->where('id_tempat', $id);
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function info_user_pengguna($id)
	{
		$this->db->select('tb_user.*');
		$this->db->from('tb_user');
		$this->db->where('tb_user.id_user', $id);
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function deldata($tabel, $where)
	{
		return $this->db->delete($tabel, $where);
	}

	//UNTUK USER YANG TIDAK LOGIN//
	// public function info_semua_kos()
	// {
	// 	$this->db->select('tbl_kos.*, tb_user.id_user');
	// 	$this->db->from('tbl_kos');
	// 	$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');
	// 	$sql = $this->db->get()->result();
	// 	return $sql;
	// }

	public function info_beberapa_kos($limit = 0, $start = 0)
	{
		$this->db->select('tbl_kos.*, tb_user.id_user');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');

		$sql = $this->db->limit($limit, $start)->get()->result();
		return $sql;
	}
	

	public function list_Kos($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('nama', $keyword);
			$this->db->or_like('id_kos', $keyword);
			$this->db->or_like('tbl_kos.alamat', $keyword);
			$this->db->or_like('kota', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('tipe', $keyword);
		}
		$this->db->select('*');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');
		$sql = $this->db->limit($limit, $start)->get()->result();
		return $sql;
	}

	// public function list_Kos_owner($limit, $start, $keyword3 = null)
	// {
	// 	if ($keyword3) {
	// 		$this->db->like('nama', $keyword3);
	// 	}
	// 	$id = $this->session->userdata('id_user');
	// 	$this->db->select('*');
	// 	$this->db->from('tb_user');
	// 	$this->db->join('tbl_kos', 'tb_user.id_user = tbl_kos.id_user');
	// 	$this->db->where('tb_user.id_user', $id);
	// 	$sql = $this->db->limit($limit, $start)->get()->result_array();
	// 	return $sql;
	// }

	// public function list_transaksi($limit, $start, $keyword3 = null)
	// {
	// 	if ($keyword3) {
	// 		$this->db->like('fullname', $keyword3);
	// 		$this->db->or_like('tgl_sewa', $keyword3);
	// 		$this->db->or_like('nama', $keyword3);
	// 	}
	// 	$this->db->select('*');
	// 	$this->db->from('transaksi');
	// 	$this->db->join('tbl_kos', 'transaksi.id_kos = tbl_kos.id_kos');
	// 	$this->db->join('tb_user', 'transaksi.id_user = tb_user.id_user');
	// 	$sql = $this->db->limit($limit, $start)->get()->result();
	// 	return $sql;
	// }
	// public function transaksi()
	// {
	// 	$this->db->select(' transaksi.*, tbl_kos.nama, tb_user_fullname');
	// 	$this->db->from('transaksi');
	// 	$this->db->join('tbl_kos', 'transaksi.id_kos = tbl_kos.id_kos');
	// 	$this->db->join('tb_user', 'transaksi.id_user = tb_user.id_user');
	// }

	// public function transaksi_Owner($limit, $start, $keyword3 = null)
	// {
	// 	if ($keyword3) {
	// 		$this->db->like('fullname', $keyword3);
	// 	}
	// 	$id = $this->session->userdata('id_user');
	// 	$this->db->select('*');
	// 	$this->db->from('transaksi');
	// 	$this->db->join('tbl_kos', 'transaksi.id_kos = tbl_kos.id_kos');
	// 	$this->db->join('tb_user', 'transaksi.id_user = tb_user.id_user');
	// 	$this->db->where('transaksi.id_owner', $id);
	// 	$sql = $this->db->limit($limit, $start)->get()->result();
	// 	return $sql;
	// }

	// public function list_User($limit, $start, $keyword1 = null)
	// {
	// 	if ($keyword1) {
	// 		$this->db->like('fullname', $keyword1);
	// 	}
	// 	$this->db->select('*');
	// 	$this->db->from('tb_user');
	// 	$this->db->join('tb_role', 'tb_user.id_role = tb_role.id_role');
	// 	$sql = $this->db->limit($limit, $start)->get()->result_array();
	// 	return $sql;
	// }
	public function countAllkos()
	{
		$this->db->select('tbl_kos.*, tb_user.id_user');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');
		return $this->db->get()->num_rows();
	}

	public function info_kos_putra()
	{
		$this->db->select('tbl_kos.*, tb_user.id_user');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');
		$this->db->where('tbl_kos.tipe = "Putra"');
		$this->db->where('tbl_kos.status = "1"');
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function info_kos_putri()
	{
		$this->db->select('tbl_kos.*, tb_user.id_user');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');
		$this->db->where('tbl_kos.tipe = "Putri"');
		$this->db->where('tbl_kos.status = "1"');
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function info_kos_campur()
	{
		$this->db->select('tbl_kos.*, tb_user.id_user');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');
		$this->db->where('tbl_kos.tipe = "Campur"');
		$this->db->where('tbl_kos.status = "1"');
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function info_kos_jakarta()
	{
		$this->db->select('tbl_kos.*, tb_user.id_user');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');
		$this->db->where('tbl_kos.kota = "Jakarta"');
		$this->db->where('tbl_kos.status = "1"');
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function info_kos_yogyakarta()
	{
		$this->db->select('tbl_kos.*, tb_user.id_user');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');
		$this->db->where('tbl_kos.kota = "Yogyakarta"');
		$this->db->where('tbl_kos.status = "1"');
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function info_kos_surabaya()
	{
		$this->db->select('tbl_kos.*, tb_user.id_user');
		$this->db->from('tbl_kos');
		$this->db->join('tb_user', 'tbl_kos.id_user = tb_user.id_user');
		$this->db->where('tbl_kos.kota = "Surabaya"');
		$this->db->where('tbl_kos.status = "1"');
		$sql = $this->db->get()->result();
		return $sql;
	}

	function search($keyword)
	{
		$this->db->like('nama', $keyword);
		$query  =   $this->db->get('tbl_kos');
		return $query->result();
	}

	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('tbl_kos');
		$this->db->like('slug', $keyword);
		return $this->db->get()->result();
	}

	public function cariDataKos()
	{
		$keyword = $this->input->post('keyword');
		$this->db->join('tb_user', 'tb_user.id_user = tbl_kos.id_user');
		$this->db->like('nama', $keyword);
		$this->db->or_like('id_kos', $keyword);
		$this->db->or_like('tbl_kos.alamat', $keyword);
		$this->db->or_like('kota', $keyword);
		$this->db->or_like('email', $keyword);
		$this->db->or_like('tipe', $keyword);
		return $this->db->get('tbl_kos')->result();
	}


	public function filter($kota, $tipe)
	{
		if (empty($kota) && !empty($tipe)) {
			$this->db->where("tipe", $tipe);
		} elseif (!empty($kota) && empty($tipe)) {
			$this->db->where("kota", $kota);
		} else {
			$this->db->where("tipe", $tipe);
			$this->db->where("kota", $kota);
		}
		$sql = $this->db->get("tbl_kos");
		return $sql;
	}

	public function detail_kos()
	{
		$sql = $this->db->get()->result();
		return $sql;
	}
}
