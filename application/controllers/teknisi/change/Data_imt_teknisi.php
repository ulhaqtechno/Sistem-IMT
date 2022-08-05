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

        $data['view'] = 'teknisi/data-imt/detail_teknisi_imt';

        $this->load->view('teknisi/template/template', $data);
    }


    public function update_teknisi_imt($id)
    {
        $this->load->model('m_imt');

        $where = array('id' => $id);

        $data['data_imt'] = $this->m_imt->update_imt($where, 'pengukuran')->result();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['view'] = 'teknisi/data-imt/update_teknisi_imt';

        $this->load->view('teknisi/template/template', $data);
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
        redirect('teknisi/teknisi/data_imt_teknisi');
    }

    public function delete_teknisi_imt($id)
    {
        $this->load->model('m_imt');
        $where = array('id' => $id);
        $this->m_imt->delete_imt($where, 'pengukuran');
        $this->session->set_flashdata('imt-delete', 'berhasil');
        redirect('teknisi/teknisi/data_imt_teknisi');
    }

    public function tambah_data_imt()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $sql_berat_badan = $this->db->get('pengukuran_berat_badan')->result();
        $sql_tinggi_badan = $this->db->get('pengukuran_tinggi_badan')->result();
        $sql_rfid = $this->db->get('rfid')->result();
        $berat_badan = [];
        foreach ($sql_berat_badan as $value) {
            $berat_badan = $value->value;
        }
        $tinggi_badan = [];
        foreach ($sql_tinggi_badan as $values) {
            $tinggi_badan = $values->value;
        }
        $rfid = [];
        foreach ($sql_rfid as $values) {
            $rfid = $values->value;
        }
        $data['berat_badan'] = $berat_badan;
        $data['tinggi_badan'] = $tinggi_badan;
        $data['rfid'] = $rfid;

        $data['view'] = 'teknisi/data-imt/tambah';
        $this->load->view('teknisi/template/template', $data);
    }

    public function insert()
    {
        $cek_member = $this->db->get_where('member', array('id_rfid' => $this->input->post('rf_id')));
        if ($cek_member->num_rows() > 0 ) {
            $id_member = $cek_member->row();
            $data = [
                'id_member' => $id_member->id,
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'berat_badan' => $this->input->post('berat_badan'),
                'usia' => '20',
                'created' => date('Y-m-d'),
            ];
            $insert = $this->db->insert('data-imt', $data);
        }else{
            $data = [
                'id_rfid' => $this->input->post('rf_id'),
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'code_instansi' => $this->input->post('code_instansi'),
            ];
            $this->db->insert('member', $data);
            $id_member = $this->db->insert_id();
            $data_member = [
                'id_member' => $id_member,
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'berat_badan' => $this->input->post('berat_badan'),
                'usia' => '20',
                'created' => date('Y-m-d'),
            ];
            $insert = $this->db->insert('data-imt', $data_member);
        }

        if ($insert) {
            $this->session->set_flashdata('success', 'Data berhasil ditambah!');
            redirect(base_url('petugas/petugas/data_imt_teknisi'));
        }else{
            $this->session->set_flashdata('error', 'Data gagal ditambah!');
            redirect(base_url('petugas/petugas/tambah_data_imt'));
        }
    }
   
}
