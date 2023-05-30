<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->model('Kasus_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = 'Data Kasus';
        $data['kasus'] = $this->Kasus_model->get();

        $this->load->view('layout/header', $data);
        $this->load->view("Admin/kasus/vw_kasus", $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Tambah Data  Kasus";
        $this->form_validation->set_rules('nama_pmi', 'nama_pmi', 'required', [
            'required' => 'nama pmi Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_pengaduan', 'tgl_pengaduan', 'required', [
            'required' => 'tgl pengaduan Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_paspor', 'no_paspor', 'required', [
            'required' => 'no_paspor Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', [
            'required' => 'alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('negara_penempatan', 'negara_penempatan', 'required', [
            'required' => 'negara_penempatan Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis_kasus', 'jenis_kasus', 'required', [
            'required' => 'Jenis Kasus Wajib di isi'
        ]);
        $this->form_validation->set_rules('p3mi', 'p3mi', 'required', [
            'required' => 'p3mi Wajib di isi'
        ]);
        $this->form_validation->set_rules('uraian_kasus', 'uraian_kasus', 'required', [
            'required' => 'uraian kasus Wajib di isi'
        ]);
        $this->form_validation->set_rules('penyelesaian', 'penyelesaian', 'required', [
            'required' => 'penyelesaian Wajib di isi'
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'keterangan Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("admin/kasus/vw_tambah_kasus", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama_pmi' => $this->input->post('nama_pmi'),
                'tgl_pengaduan' => $this->input->post('tgl_pengaduan'),
                'no_paspor' => $this->input->post('no_paspor'),
                'alamat' => $this->input->post('alamat'),
                'negara_penempatan' => $this->input->post('negara_penempatan'),
                'jenis_kasus' => $this->input->post('jenis_kasus'),
                'p3mi' => $this->input->post('p3mi'),
                'uraian_kasus' => $this->input->post('uraian_kasus'),
                'penyelesaian' => $this->input->post('penyelesaian'),
                'keterangan' => $this->input->post('keterangan'),


            ];
            $this->Kasus_model->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kasus Berhasil diTambahkan! </div>');
            redirect('Kasus');

        }
    }
    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Edit Data Pencari Kerja Luar Negeri";
        $data['kasus'] = $this->Kasus_model->getById($id);
        $this->form_validation->set_rules('nama_pmi', 'nama_pmi', 'required', [
            'required' => 'nama pmi Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_pengaduan', 'tgl_pengaduan', 'required', [
            'required' => 'tgl pengaduan Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_paspor', 'no_paspor', 'required', [
            'required' => 'no_paspor Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', [
            'required' => 'alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('negara_penempatan', 'negara_penempatan', 'required', [
            'required' => 'negara_penempatan Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis_kasus', 'jenis_kasus', 'required', [
            'required' => 'Jenis Kasus Wajib di isi'
        ]);
        $this->form_validation->set_rules('p3mi', 'p3mi', 'required', [
            'required' => 'p3mi Wajib di isi'
        ]);
        $this->form_validation->set_rules('uraian_kasus', 'uraian_kasus', 'required', [
            'required' => 'uraian kasus Wajib di isi'
        ]);
        $this->form_validation->set_rules('penyelesaian', 'penyelesaian', 'required', [
            'required' => 'penyelesaian Wajib di isi'
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'keterangan Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("admin/kasus/vw_edit_kasus", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama_pmi' => $this->input->post('nama_pmi'),
                'tgl_pengaduan' => $this->input->post('tgl_pengaduan'),
                'no_paspor' => $this->input->post('no_paspor'),
                'alamat' => $this->input->post('alamat'),
                'negara_penempatan' => $this->input->post('negara_penempatan'),
                'jenis_kasus' => $this->input->post('jenis_kasus'),
                'p3mi' => $this->input->post('p3mi'),
                'uraian_kasus' => $this->input->post('uraian_kasus'),
                'penyelesaian' => $this->input->post('penyelesaian'),
                'keterangan' => $this->input->post('keterangan'),


            ];
            $this->Kasus_model->update(['id_kasus' => $id], $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kasus Berhasil di edit! </div>');
            redirect('Kasus');

        }
    }

    public function hapus($id)
    {
        $this->Kasus_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kamu Berhasil Dihapus!</div>');
        redirect('Kasus');
    }



}