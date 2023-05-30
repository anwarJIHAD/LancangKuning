<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkln extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->model('Pkln_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = 'Halaman Pencarian Kerja Luar Negeri';
        $data['pkln'] = $this->Pkln_model->get();

        $this->load->view('layout/header', $data);
        $this->load->view("Admin/pkln/vw_pkln", $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Tambah Data  Pencari Kerja Luar Negeri";
        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
            'required' => 'jenis_kelamin Wajib di isi'
        ]);
        $this->form_validation->set_rules('usia', 'usia', 'required', [
            'required' => 'usia Wajib di isi'
        ]);
        $this->form_validation->set_rules('daerah_asal', 'daerah_asal', 'required', [
            'required' => 'daerah_asal Wajib di isi'
        ]);
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required', [
            'required' => 'pendidikan Wajib di isi'
        ]);
        $this->form_validation->set_rules('negara_tujuan', 'negara_tujuan', 'required', [
            'required' => 'negara tujuan Wajib di isi'
        ]);
        $this->form_validation->set_rules('sektor_pekerjaan', 'sektor_pekerjaan', 'required', [
            'required' => 'sektor_pekerjaan Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_kontak', 'no_kontak', 'required', [
            'required' => 'no_kontak Wajib di isi'
        ]);
        $this->form_validation->set_rules('informasi', 'informasi', 'required', [
            'required' => 'informasi Wajib di isi'
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'keterangan Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("admin/pkln/vw_tambah_pkln", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'usia' => $this->input->post('usia'),
                'pendidikan' => $this->input->post('pendidikan'),
                'daerah_asal' => $this->input->post('daerah_asal'),
                'negara_tujuan' => $this->input->post('negara_tujuan'),
                'sektor_pekerjaan' => $this->input->post('sektor_pekerjaan'),
                'no_kontak' => $this->input->post('no_kontak'),
                'informasi' => $this->input->post('informasi'),
                'keterangan' => $this->input->post('keterangan'),


            ];
            $this->Pkln_model->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pencari kerja Berhasil diTambahkan! </div>');
            redirect('Pkln');

        }
    }
    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Edit Data Pencari Kerja Luar Negeri";
        $data['pkln'] = $this->Pkln_model->getById($id);
        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
            'required' => 'jenis_kelamin Wajib di isi'
        ]);
        $this->form_validation->set_rules('usia', 'usia', 'required', [
            'required' => 'usia Wajib di isi'
        ]);
        $this->form_validation->set_rules('daerah_asal', 'daerah_asal', 'required', [
            'required' => 'daerah_asal Wajib di isi'
        ]);
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required', [
            'required' => 'pendidikan Wajib di isi'
        ]);
        $this->form_validation->set_rules('negara_tujuan', 'negara_tujuan', 'required', [
            'required' => 'negara tujuan Wajib di isi'
        ]);
        $this->form_validation->set_rules('sektor_pekerjaan', 'sektor_pekerjaan', 'required', [
            'required' => 'sektor_pekerjaan Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_kontak', 'no_kontak', 'required', [
            'required' => 'no_kontak Wajib di isi'
        ]);
        $this->form_validation->set_rules('informasi', 'informasi', 'required', [
            'required' => 'informasi Wajib di isi'
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'keterangan Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("admin/pkln/vw_edit_pkln", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'usia' => $this->input->post('usia'),
                'pendidikan' => $this->input->post('pendidikan'),
                'daerah_asal' => $this->input->post('daerah_asal'),
                'negara_tujuan' => $this->input->post('negara_tujuan'),
                'sektor_pekerjaan' => $this->input->post('sektor_pekerjaan'),
                'no_kontak' => $this->input->post('no_kontak'),
                'informasi' => $this->input->post('informasi'),
                'keterangan' => $this->input->post('keterangan'),


            ];
            $this->Pkln_model->update(['id_pkln' => $id], $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pencari kerja Berhasil diTambahkan! </div>');
            redirect('Pkln');

        }
    }

    public function hapus($id)
    {
        $this->Pkln_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kamu Berhasil Dihapus!</div>');
        redirect('Pkln');
    }



}