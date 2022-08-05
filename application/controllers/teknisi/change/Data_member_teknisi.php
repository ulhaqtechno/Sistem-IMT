<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_member_teknisi extends CI_Controller {

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

    public function detail_teknisi_member($id)
    {
        $this->load->model('m_imt');
        $where = array('id' => $id);
        $detail = $this->m_imt->detail_member($id)->row();
        $data['detail'] = $detail;

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // select data imt berdasarkan member
        $this->db->select('*');
        $this->db->from('data-imt');
        $this->db->join('member', 'data-imt.id_member=member.id');
        $this->db->where('data-imt.id_member', $id);
        $data_imt = $this->db->get();
        $data['data_imt'] = $data_imt->result();

        $data['view'] = 'teknisi/data-member/detail_teknisi_member';

        $this->load->view('teknisi/template/template', $data);
    }

    public function chart($id)
    {
        $this->db->select('data-imt.tinggi_badan, data-imt.berat_badan, data-imt.created');
        $this->db->from('data-imt');
        $this->db->where('id_member', $id);
        $data = $this->db->get();
        $result = $data->result();
        $berat_badan = [];
        $tinggi_badan = [];
        $tanggal = [];
        foreach ($result as $value) {
            $berat_badan[] = $value->berat_badan;
            $tinggi_badan[] = $value->tinggi_badan;
            $tanggal[] = $value->created;
        }
        echo json_encode([
            'berat_badan' => $berat_badan,
            'tinggi_badan' => $tinggi_badan,
            'tanggal' => $tanggal,
        ]);
    }


    public function update_teknisi_member($id)
    {
        $this->load->model('m_imt');

        $where = array('id' => $id);
        
            $this->load->model('m_imt');
        $data['data_instansi'] = $this->m_imt->tampil_data_instansi()->result();

        $data['data_member'] = $this->m_imt->update_imt($where, 'biodata')->result();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['view'] = 'teknisi/data-member/update_teknisi_member';

        $this->load->view('teknisi/template/template', $data);
    }

    public function edit_teknisi_member()
    {
        $this->load->model('m_imt');

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $code_instansi = $this->input->post('code_instansi');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $uid = $this->input->post('uid');
        $tgl_lahir = $this->input->post('tgl_lahir');

        $data = array(
            'code_instansi' => $code_instansi,
            'nama' => $nama,
            'uid' => $uid,
            'tgl_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
        );



        $where = array(
            'id' => $id,
        );

        $this->m_imt->update_data($where, $data, 'biodata');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('teknisi/teknisi/data_member_teknisi');
    }

    public function delete_teknisi_member($id)
    {
        $this->load->model('m_imt');
        $where = array('id' => $id);
        $this->m_imt->delete_imt($where, 'biodata');
        $this->session->set_flashdata('imt-delete', 'berhasil');
        redirect('teknisi/teknisi/data_member_teknisi');
    }


    public function tambah_teknisi_member()
    {
        
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Harap isi kolom nama.',
        ]);
        $this->form_validation->set_rules('code_instansi', 'Nammaa', 'required|trim', [
            'required' => 'Harap isi kolom nama.',
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required|trim', [
            'required' => 'Harap isi kolom tgl_lahir.',
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'required|trim', [
            'required' => 'Harap isi kolom jenis_kelamin.',
        ]);
        $this->form_validation->set_rules('uid', 'uid', 'required|trim', [
            'required' => 'Harap isi kolom Instansi.',
        ]);

        if ($this->form_validation->run() == false) {

            
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            
            $this->load->model('m_imt');
        $data['data_instansi'] = $this->m_imt->tampil_data_instansi()->result();
        $data['view'] = 'teknisi/data-member/tambah_teknisi_member';


        $this->load->view('teknisi/template/template', $data);

        } else {
            // $image = $_FILES['photo']['name'];
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'code_instansi' => htmlspecialchars($this->input->post('code_instansi', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'uid' => htmlspecialchars($this->input->post('uid', true)),
                
            ];


            $this->db->insert('biodata', $data);
           
            $this->session->set_flashdata('success-upload', 'berhasil');
            redirect(base_url('teknisi/teknisi/data_member_teknisi'));
        }
    }
}
