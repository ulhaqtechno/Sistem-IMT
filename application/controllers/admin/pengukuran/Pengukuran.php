<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengukuran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        $this->load->library('form_validation');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('welcome');
        }
    }

    public function index()
    {
        // return $this->load->view('pengukuran/index');
        $data['view'] = 'admin/dashboard';
        
        $this->load->view('admin/pengukuran/index', $data);
    }

}