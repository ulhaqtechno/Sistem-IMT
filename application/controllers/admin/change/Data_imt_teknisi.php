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

        $data['view'] = 'admin/data-imt/detail_teknisi_imt';

        $this->load->view('admin/template/template', $data);
    }


    public function update_teknisi_imt($id)
    {
        $this->load->model('m_imt');

        $where = array('id' => $id);

        $data['data_imt'] = $this->m_imt->update_imt($where, 'pengukuran')->result();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['view'] = 'admin/data-imt/update_teknisi_imt';

        $this->load->view('admin/template/template', $data);
    }

    public function teknisi_imt_edit()
    {
        $this->load->model('m_imt');

        $id = $this->input->post('id');
        $uid_biodata = $this->input->post('uid_biodata');
        // $nama = $this->input->post('nama');
        // $usia = $this->input->post('usia');
        $berat_badan = $this->input->post('berat_badan');
        $tinggi_badan = $this->input->post('tinggi_badan');
        // $jenis_kelamin = $this->input->post('jenis_kelamin');

        $data = array(
            'tgljam_ukur' => date('Y-m-d H:i:s', strtotime('now')),
            'uid_biodata' => $uid_biodata,
            // 'nama' => $nama,
            'berat_badan' => $berat_badan,
            'tinggi_badan' => $tinggi_badan,
            // 'jenis_kelamin' => $jenis_kelamin,
            // 'usia' => $usia,
        );


        $where = array(
            'id' => $id,
        );

        $this->m_imt->update_data($where, $data, 'pengukuran');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/admin/data_imt_teknisi');
    }

    public function delete_teknisi_imt($id)
    {
        $this->load->model('m_imt');
        $where = array('id' => $id);
        $this->m_imt->delete_imt($where, 'pengukuran');
        $this->session->set_flashdata('imt-delete', 'berhasil');
        redirect('admin/admin/data_imt_teknisi');
    }


   
}
