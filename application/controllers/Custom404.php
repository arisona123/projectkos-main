<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Custom404 extends CI_Controller
{
    public function index()
    {
        $this->load->view('navbar_user');
        $this->load->view('errors/Custom404');
    }
}
