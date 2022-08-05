<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_imt_teknisi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        $this->load->library('form_validation');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
    }

    public function detail_teknisi_imt($id)
    {
        $this->load->model('m_imt');
        $where = array('id' => $id);
        $detail = $this->m_imt->detail_member($id);
        $data['detail'] = $detail;

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['data_pengukuran'] = $this->m_imt->tampil_data_pengukuran()->result();

        $data['view'] = 'pemerintah/data-imt/detail_teknisi_imt';

        $this->load->view('pemerintah/template/template', $data);
    }


    


   
}
