<?php

class Model_request extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_request')->result_array();
    }
    public function input_data($data)
    {
        $this->db->insert('tb_request', $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($data, $table);
    }
    public function list_Owner($limit, $start, $keyword2 = null)
    {
        if ($keyword2) {
            $this->db->like('nama_depan', $keyword2);
        }
        $this->db->select('*');
        $this->db->from('tb_request');
        $sql = $this->db->limit($limit, $start)->get()->result_array();
        return $sql;
    }
    public function detail_data($id_request = NULL)
    {
        $query = $this->db->get_where('tb_request', array('id_request' => $id_request))->row();
        return $query;
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_request');
        $this->db->like('nama_depan', $keyword);
        $this->db->or_like('nama_belakang', $keyword);
        $this->db->or_like('info_hub', $keyword);
        $this->db->or_like('no_hp', $keyword);
        $this->db->or_like('tipe_kos', $keyword);
        $this->db->or_like('nama_properti', $keyword);
        $this->db->or_like('url_properti', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('provinsi', $keyword);
        $this->db->or_like('kabupaten_kota', $keyword);
        $this->db->or_like('kecamatan', $keyword);
        $this->db->or_like('kelurahan', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('jumlah_kamar', $keyword);
        return $this->db->get()->result();
    }
}
