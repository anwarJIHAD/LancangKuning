<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pmi_penempatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->model('Penempatan_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = 'Data Penempatan PMI';
        $data['penempatan'] = $this->Penempatan_model->get();

        $this->load->view('layout/header', $data);
        $this->load->view("Admin/penempatan/vw_penempatan", $data);
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
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required', [
            'required' => 'pendidikan Wajib di isi'
        ]);
        $this->form_validation->set_rules('nik', 'nik', 'required', [
            'required' => 'nik Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_paspor', 'no_paspor', 'required', [
            'required' => 'no_paspor Wajib di isi'
        ]);
        $this->form_validation->set_rules('skema', 'skema', 'required', [
            'required' => 'Skema Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat_asal', 'alamat_asal', 'required', [
            'required' => 'alamat asal Wajib di isi'
        ]);
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required', [
            'required' => 'kabupaten Wajib di isi'
        ]);
        $this->form_validation->set_rules('negara_tujuan', 'negara_tujuan', 'required', [
            'required' => 'negara_tujuan Wajib di isi'
        ]);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required', [
            'required' => 'jabatan Wajib di isi'
        ]);
        $this->form_validation->set_rules('company', 'company', 'required', [
            'required' => 'company Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required', [
            'required' => 'no_hp Wajib di isi'
        ]);
        $this->form_validation->set_rules('proses', 'proses', 'required', [
            'required' => 'proses Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("admin/penempatan/vw_tambah_penempatan", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'pendidikan' => $this->input->post('pendidikan'),
                'nik' => $this->input->post('nik'),
                'no_paspor' => $this->input->post('no_paspor'),
                'skema' => $this->input->post('skema'),
                'sektor_usaha' => $this->input->post('sektor_usaha'),
                'alamat_asal' => $this->input->post('alamat_asal'),
                'kabupaten' => $this->input->post('kabupaten'),
                'negara_tujuan' => $this->input->post('negara_tujuan'),
                'jabatan' => $this->input->post('jabatan'),
                'company' => $this->input->post('company'),
                'no_hp' => $this->input->post('no_hp'),
                'proses' => $this->input->post('proses'),



            ];
            $this->Penempatan_model->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penampatan PMI Berhasil diTambahkan! </div>');
            redirect('Pmi_penempatan');

        }
    }
    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Edit Data Pencari Kerja Luar Negeri";
        $data['penempatan'] = $this->Penempatan_model->getById($id);
        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
            'required' => 'jenis_kelamin Wajib di isi'
        ]);
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required', [
            'required' => 'pendidikan Wajib di isi'
        ]);
        $this->form_validation->set_rules('nik', 'nik', 'required', [
            'required' => 'nik Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_paspor', 'no_paspor', 'required', [
            'required' => 'no_paspor Wajib di isi'
        ]);
        $this->form_validation->set_rules('skema', 'skema', 'required', [
            'required' => 'Skema Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat_asal', 'alamat_asal', 'required', [
            'required' => 'alamat asal Wajib di isi'
        ]);
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required', [
            'required' => 'kabupaten Wajib di isi'
        ]);
        $this->form_validation->set_rules('negara_tujuan', 'negara_tujuan', 'required', [
            'required' => 'negara_tujuan Wajib di isi'
        ]);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required', [
            'required' => 'jabatan Wajib di isi'
        ]);
        $this->form_validation->set_rules('company', 'company', 'required', [
            'required' => 'company Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required', [
            'required' => 'no_hp Wajib di isi'
        ]);
        $this->form_validation->set_rules('proses', 'proses', 'required', [
            'required' => 'proses Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("admin/penempatan/vw_edit_penempatan", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'pendidikan' => $this->input->post('pendidikan'),
                'nik' => $this->input->post('nik'),
                'no_paspor' => $this->input->post('no_paspor'),
                'skema' => $this->input->post('skema'),
                'sektor_usaha' => $this->input->post('sektor_usaha'),
                'alamat_asal' => $this->input->post('alamat_asal'),
                'kabupaten' => $this->input->post('kabupaten'),
                'negara_tujuan' => $this->input->post('negara_tujuan'),
                'jabatan' => $this->input->post('jabatan'),
                'company' => $this->input->post('company'),
                'no_hp' => $this->input->post('no_hp'),
                'proses' => $this->input->post('proses'),

            ];
            $this->Penempatan_model->update(['id_penempatan' => $id], $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penempatan PMI Berhasil diTambahkan! </div>');
            redirect('Pmi_penempatan');

        }
    }

    public function hapus($id)
    {
        $this->Penempatan_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI penempatan Berhasil Dihapus!</div>');
        redirect('Pmi_penempatan');
    }



}