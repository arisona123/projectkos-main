<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('kirim_email')) {
    function kirim_email($data = NULL)
    {
        ($data == NULL) ? exit() : '';
        $ci = get_instance();
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'mail.fiantest.my.id',
            'smtp_user' => 'sevenkos@fiantest.my.id',  // Email gmail
            'smtp_pass'   => 'sevenkos12345',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n",
            'charset' => "iso-8859-1",
            'wordwrap' => TRUE
        ];

        // Load library email dan konfigurasinya
        $ci->load->library('email', $config);
        // Email dan nama pengirim
        $ci->email->from('sevenkos@fiantest.my.id', 'SevenKos');
        // Email penerima
        $ci->email->to($data['email_penerima']); // Ganti dengan email tujuan
        // Lampiran email, isi dengan url/path file
        // $ci->email->attach();

        // Subject email
        $ci->email->subject($data['subject']);
        // Isi email
        $ci->email->message($ci->load->view($data['template'], $data['isi'], TRUE));
        $ci->email->set_mailtype("html");
        // Tampilkan pesan sukses atau error
        if ($ci->email->send()) {
            // echo 'Sukses! email berhasil dikirim.';
            return TRUE;
        } else {
            // echo 'Error! email tidak dapat dikirim.';
            return FALSE;
        }
    }
}
