<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    // public function download_pembayaran($id)
    // {
    //     $this->load->helper('download');
    //     $this->load->model('Kpr_model');
    //     $file_pembayaran = $this->Kpr_model->download_pembayaran($id);
    //     $file ='file/kos_image'. $file_pembayaran['bukti_pembayaran'];
    //     if(is_file($file)){
    //         force_download($file, null);
    //     }else{
    //         echo 'File tidak ditemukan';
    //     }
    // }

    // function download_pembayaran($file = NULL) {
    //     // load download helder
    //     $this->load->helper('download');
    //     // read file contents
    //     $data = file_get_contents(base_url('file/kos_image/'.$file));
    //     force_download($file, $data);
    // }

    public function transaksi_selesai($id)
    {
        $where = array('id_booking' => $id);
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_booking='$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transaksi_selesai', $data);
        $this->load->view('templates_admin/footer');
    }
    public function transaksi_selesai_aksi()
    {
        $id                                 = $this->input->post('id_booking');
        $tgl_selesai                        = $this->input->post('tanggal_selesai');
        $denda                              = $this->input->post('denda');
        $tgl_pengembalian                   = $this->input->post('tgl_pengembalian');
        $status_pengembalian                = $this->input->post('status_pengembalian');
        $status_sewa                        = $this->input->post('status_sewa');
        $x = strtotime($tgl_pengembalian);
        $y = strtotime($tgl_selesai);

        // $selisih = abs($x - $y) / (60 * 60 * 24);

        $selisih = 6 - (date("m", $x) - date("m", $y));

        $total_denda = $selisih * $denda;

        $data = array(
            'tgl_pengembalian'              => $tgl_pengembalian,
            'status_pengembalian'           => $status_pengembalian,
            'status_sewa'                   => $status_sewa,
            'total_denda'                   => $total_denda
        );
        $where = array(
            'id_booking' => $id
        );


        $this->Kpr_model->update_data('transaksi', $data, $where);
        $this->session->set_flashdata('flash', 'Transaksi Sukses');
        redirect('admin/transaksi');
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
        $this->session->set_flashdata('flash', ' Di batalkan');
        redirect('admin/transaksi');
    }


    public function tambah_sewa_aksi()
    {
        $this->form_validation->set_rules('tgl_sewa', 'Tgl_sewa', 'required|trim', [
            'required' => 'Masukkan tanggal Masuk.'
        ]);
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/detail_kos');
        } else {
            $id_user = $this->session->userdata('id_user');
            $id_owner = $this->input->post('id_owner');
            $id_kos = $this->input->post('id_kos');
            $tgl_sewa = $this->input->post('tgl_sewa');
            $kategori = $this->input->post('kategori');
            $harga = $this->input->post('harga');
            $sisa_kamar = $this->input->post('sisa_kamar');
            $denda = $this->input->post('denda');
            $tanggal_selesai = date("Y-m-d", strtotime("+" . $kategori . " month", strtotime($tgl_sewa)));
    
            // Cek apakah user aktif
            $user_query = "SELECT * FROM tb_user WHERE id_user = ?";
            $user_result = $this->db->query($user_query, array($id_user))->row();
    
            if ($user_result) {
                if ($user_result->is_active == 1) {
                    // Perbarui transaksi jika sudah ada transaksi sebelumnya
                    $transaksi_query = "SELECT * FROM transaksi WHERE id_user = ? AND id_kos = ? AND status_sewa = 'belum_selesai'";
                    $transaksi_result = $this->db->query($transaksi_query, array($id_user, $id_kos))->row();
    
                    if ($transaksi_result) {
                        $update_data = array(
                            'tgl_sewa' => $tgl_sewa,
                            'kategori' => $kategori,
                            'tanggal_selesai' => $tanggal_selesai,
                            'harga' => $harga
                        );
    
                        $this->db->where('id_booking', $transaksi_result->id_booking);
                        $this->db->update('transaksi', $update_data);
                    } else {
                        // Tambahkan transaksi baru jika belum ada transaksi sebelumnya
                        $data = array(
                            'id_user' => $id_user,
                            'id_owner' => $id_owner,
                            'id_kos' => $id_kos,
                            'sisa_kamar' => $sisa_kamar,
                            'tgl_sewa' => $tgl_sewa,
                            'kategori' => $kategori,
                            'tanggal_selesai' => $tanggal_selesai,
                            'harga' => $harga,
                            'tgl_pengembalian' => '-',
                            'status_pengembalian' => 'belum_kembali',
                            'status_sewa' => 'belum_selesai'
                        );
    
                        $this->load->model('Kpr_model');
                        $this->Kpr_model->insert_data($data, 'transaksi');
                    }
    
                    redirect('transaksi');
                } else {
                    // Jika user tidak aktif, lakukan transaksi seperti biasa
                    $data = array(
                        'id_user' => $id_user,
                        'id_owner' => $id_owner,
                        'id_kos' => $id_kos,
                        'sisa_kamar' => $sisa_kamar,
                        'tgl_sewa' => $tgl_sewa,
                        'kategori' => $kategori,
                        'tanggal_selesai' => $tanggal_selesai,
                        'harga' => $harga,
                        'tgl_pengembalian' => '-',
                        'status_pengembalian' => 'belum_kembali',
                        'status_sewa' => 'belum_selesai'
                    );
    
                    $this->load->model('Kpr_model');
                    $this->Kpr_model->insert_data($data, 'transaksi');
    
                    redirect('transaksi');
                }
            } else {
                // User tidak ditemukan, berikan respons sesuai kebutuhan (misalnya pesan error)
                echo "User tidak ditemukan";
            }
        }
    }
    

}
