<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pangkat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in2();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Pangkat_model');
    }
    // public function index()
    // {
    //     $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
    //     // $data['mahasiswa'] = $this->Mahasiswa_model->get();
    //     $data['judul'] = "Halaman Pegawai";
    //     $this->load->view('layout/header', $data);
    //     $this->load->view("pegawai/vw_tambah_pangkat", $data);
    //     $this->load->view('layout/footer', $data);
    // }

    function edit($id)
    {
        $data['judul'] = "Halaman Edit Data";
        $data['pangkat'] = $this->Pangkat_model->getById2($id);
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();

        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'keterangan Wajib di isi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("pegawai/vw_edit_pangkat", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'NIP' => $this->input->post('NIP'),
                'keterangan' => $this->input->post('keterangan'),

            ];
            $upload_image1 = $_FILES['file']['name'];
            if ($upload_image1) {
                $config['allowed_types'] = 'pdf|csv|docx';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/pegawai/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('file', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $id = $this->input->post('id');
            $this->Pangkat_model->update(['id' => $id], $data, $upload_image1);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil DiUbah!</div>');
            redirect('Pegawai');

        }
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Berkas";
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['pangkat'] = $this->Pangkat_model->get();
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'keterangan Wajib di isi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("pegawai/vw_tambah_pangkat", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'NIP' => $this->input->post('NIP'),
                'keterangan' => $this->input->post('keterangan'),

            ];
            $upload_image1 = $_FILES['file']['name'];
            if ($upload_image1) {
                $config['allowed_types'] = 'pdf|csv|docx|gif|jpg|png|jpeg|xls|xlsx';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/pegawai/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('file', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Pangkat_model->insert($data, $upload_image1);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kamu Berhasil Ditambah!</div>');
            redirect('Pegawai');
        }
    }
    public function hapus($id)
    {
        $this->Pangkat_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kamu Berhasil Dihapus!</div>');
        redirect('Pegawai');
    }
}