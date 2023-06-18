<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . '../assets/vendor/autoload.php';

class Sewa extends CI_Controller
{
    public function tambah_sewa($id)
    {
        $this->load->model('Kpr_model');
        $data['detail'] = $this->Kpr_model->detail($id);
        $this->load->view('navbar_user');
        $this->load->view('transaksi/tambah_sewa', $data);
        $this->load->view('footer');
        // $this->load->view('templates_user/footer');
    }

    public function tambah_sewa_aksi()
    {
        $this->form_validation->set_rules('tgl_sewa', 'Tgl_sewa', 'required|trim', [
            'required' => 'Masukan tanggal Masuk.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/detail_kos');
        } else {
            $id_user               = $this->session->userdata('id_user');
            $id_owner              = $this->input->post('id_owner');
            $id_kos                = $this->input->post('id_kos');
            $tgl_sewa              = $this->input->post('tgl_sewa');
            $kategori              = $this->input->post('kategori');
            $harga                 = $this->input->post('harga');
            $denda                 = $this->input->post('denda');
            // $tanggal_selesai = date("Y-m-d", strtotime("+" . $kategori . " month", strtotime($tgl_sewa)));


            $data = array(
                'id_user'               => $id_user,
                'id_owner'              => $id_owner,
                'id_kos'                => $id_kos,
                'tgl_sewa'              => $tgl_sewa,
                'kategori'              => $kategori,
                // 'tanggal_selesai'       => $tanggal_selesai,
                'harga'                 => $harga,
                'tgl_pengembalian'      => '-',
                'status_pengembalian'   => 'belum_kembali',
                'status_sewa'           => 'belum_selesai'
            );
            $this->load->model('Kpr_model');
            $this->Kpr_model->insert_data($data, 'transaksi');
            redirect('transaksi');
        }
    }
}
