<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in2();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Pangkat_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['pangkat'] = $this->Pangkat_model->getById();
        $data['judul'] = "Halaman Pegawai";
        $this->load->view('layout/header', $data);
        $this->load->view("pegawai/vw_pegawai", $data);
        $this->load->view('layout/footer', $data);
    }

    function edit()
    {
        $data['judul'] = "Halaman Data Pegawai";
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();

        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'Nama Lengkap Wajib di isi'
        ]);

        $this->form_validation->set_rules('pangkat', 'pangkat', 'required', [
            'required' => 'pangkat Lengkap Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis_jabatan', 'jenis_jabatan', 'required', [
            'required' => 'jenis jabatan  Wajib di isi'
        ]);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required', [
            'required' => 'jabatan Wajib di isi'
        ]);


        $this->form_validation->set_rules('pendidikan_terakhir', 'pendidikan_terakhir', 'required', [
            'required' => 'pendidikan terakhir  Wajib di isi'
        ]);
        $this->form_validation->set_rules('masa_kerja', 'masa_kerja', 'required', [
            'required' => 'status aktif Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required', [
            'required' => 'Nomor HP Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required', [
            'required' => 'Email  Wajib di isi'
        ]);

        $this->form_validation->set_rules('tgl_akhir', 'tgl_akhir', 'required', [
            'required' => 'Tanggal Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("pegawai/vw_edit_pegawai", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'role' => $this->input->post('role'),
                'pangkat' => $this->input->post('pangkat'),
                'jenis_jabatan' => $this->input->post('jenis_jabatan'),
                'jabatan' => $this->input->post('jabatan'),
                'no_hp' => $this->input->post('no_hp'),
                'email' => $this->input->post('email'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'masa_kerja' => $this->input->post('masa_kerja'),
                'tgl_akhir' => $this->input->post('tgl_akhir'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/pegawai/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['user']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/pegawai/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $NIP = $this->input->post('NIP');
            $this->userrole->update(['NIP' => $NIP], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kamu Berhasil DiUbah!</div>');
            redirect('Pegawai');

        }
    }
}