<?php
defined('BASEPATH') or exit('No direct script access allowed');

class surat_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in2();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Surat_Masuk_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['surat_masuk'] = $this->Surat_Masuk_model->get();
        $data['judul'] = "Halaman Surat Masuk";
        $this->load->view('layout/header', $data);
        $this->load->view("surat_masuk/vw_surat_masuk", $data);
        $this->load->view('layout/footer', $data);
    }

    function edit($id)
    {
        $data['judul'] = "Halaman Edit Data";
        $data['surat_masuk'] = $this->Surat_Masuk_model->getById2($id);
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();

        $this->form_validation->set_rules('no_surat', 'no_surat', 'required', [
            'required' => 'no_surat Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_kirim', 'tgl_kirim', 'required', [
            'required' => 'tgl_kirim Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_terima', 'tgl_terima', 'required', [
            'required' => 'tgl_terima Wajib di isi'
        ]);
        $this->form_validation->set_rules('pengirim', 'pengirim', 'required', [
            'required' => 'pengirim Wajib di isi'
        ]);
        $this->form_validation->set_rules('perihal', 'perihal', 'required', [
            'required' => 'perihal Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("surat_masuk/vw_edit_surat", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'no_surat' => $this->input->post('no_surat'),
                'tgl_kirim' => $this->input->post('tgl_kirim'),
                'tgl_terima' => $this->input->post('tgl_terima'),
                'pengirim' => $this->input->post('pengirim'),
                'perihal' => $this->input->post('perihal'),
            ];
            $upload_image = $_FILES['surat']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'pdf|csv|docx';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/pegawai/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('surat')) {
                    $old_image = $data['user']['surat'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/pegawai/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('surat', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $id = $this->input->post('id');
            $this->Surat_Masuk_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kamu Berhasil DiUbah!</div>');
            redirect('surat_masuk');

        }
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Surat";
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['surat_masuk'] = $this->Surat_Masuk_model->get();
        $this->form_validation->set_rules('no_surat', 'no_surat', 'required', [
            'required' => 'no_surat Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_kirim', 'tgl_kirim', 'required', [
            'required' => 'tgl_kirim Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_terima', 'tgl_terima', 'required', [
            'required' => 'tgl_terima Wajib di isi'
        ]);
        $this->form_validation->set_rules('pengirim', 'pengirim', 'required', [
            'required' => 'pengirim Wajib di isi'
        ]);
        $this->form_validation->set_rules('perihal', 'perihal', 'required', [
            'required' => 'perihal Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("surat_masuk/vw_tambah_surat", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'NIP' => $this->input->post('NIP'),
                'no_surat' => $this->input->post('no_surat'),
                'tgl_kirim' => $this->input->post('tgl_kirim'),
                'tgl_terima' => $this->input->post('tgl_terima'),
                'pengirim' => $this->input->post('pengirim'),
                'perihal' => $this->input->post('perihal'),
            ];
            $upload_image = $_FILES['surat']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'pdf|csv|docx';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/pegawai/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('surat')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('surat', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Surat_Masuk_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kamu Berhasil Ditambah!</div>');
            redirect('surat_masuk');
        }
    }
    public function hapus($id)
    {
        $this->Surat_Masuk_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kamu Berhasil Dihapus!</div>');
        redirect('surat_masuk');
    }
    public function pdf()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['surat_masuk'] = $this->Surat_Masuk_model->get();
        $this->load->library('pdf2');
        $html = $this->load->view('surat_masuk/pdf', $data, true);
        $this->pdf2->createPDF($html, 'mypdf', false);
    }
}