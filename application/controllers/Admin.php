<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->model('Pangkat_model');
        $this->load->model('Surat_Keluar_model');
        $this->load->model('Surat_Masuk_model');
    }
    public function dashboard()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['user1'] = $this->User_model->get();
        $data['judul'] = "Dashboard";
        $this->load->view('layout/header', $data);
        $this->load->view("admin/dashboard", $data);
        $this->load->view('layout/footer', $data);

    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['user1'] = $this->User_model->get();
        $data['judul'] = "Halaman Pegawai";
        $this->load->view('layout/header', $data);
        $this->load->view("admin/vw_admin", $data);
        $this->load->view('layout/footer', $data);
    }
    public function hapus($NIP)
    {
        $this->User_model->delete($NIP);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i sclass="icon fas fa-check-circle"></i>Data Berhasil Dihapus!</div>');
        }
        redirect('Admin');
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Data Pegawai";
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['user1'] = $this->User_model->get();
        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'Nama Lengkap Wajib di isi'
        ]);
        $this->form_validation->set_rules('status_pegawai', 'status_pegawai', 'required', [
            'required' => 'status_pegawai Wajib di isi'
        ]);
        $this->form_validation->set_rules('NIP', 'NIP', 'required|trim|is_unique[user.NIP]', [
            'is_unique' => 'NIP ini sudah terdaftar!',
            'required' => 'NIP Wajib di isi'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama',
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password harus diisi'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Password Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("admin/vw_tambah_pegawai", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'NIP' => htmlspecialchars($this->input->post('NIP', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'gambar' => 'default.png',
                'role' => htmlspecialchars($this->input->post('status_pegawai', true)),
            ];
            $this->User_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pegawai Berhasil Bertambah </div>');
            redirect('admin');
        }
    }


    public function edit($NIP)
    {
        $data['judul'] = "Halaman Data Pegawai";
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['user1'] = $this->User_model->getById($NIP);

        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'Nama Lengkap Wajib di isi'
        ]);
        $this->form_validation->set_rules('status_pegawai', 'status_pegawai', 'required', [
            'required' => 'Status Pegawai Wajib di isi'
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
            $this->load->view("admin/vw_edit_pegawaiadmin", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'role' => $this->input->post('status_pegawai'),
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
            $this->User_model->update(['NIP' => $NIP], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kamu Berhasil DiUbah!</div>');
            redirect('Admin');

        }
    }
    public function detail($NIP)
    {
        $data['judul'] = "Halaman detail Pegawai";
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['pangkat'] = $this->Pangkat_model->get();
        $data['user1'] = $this->User_model->getById($NIP);
        $this->load->view('layout/header', $data);
        $this->load->view('admin/vw_detail_pegawai', $data);
        $this->load->view('layout/footer', $data);
    }

    public function pangkat()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['pangkat'] = $this->Pangkat_model->get();
        $data['berkas'] = $this->Pangkat_model->tampil();
        $data['judul'] = "Halaman Berkas";
        $this->load->view('layout/header', $data);
        $this->load->view("admin/vw_pangkat", $data);
        $this->load->view('layout/footer', $data);
    }
    public function hapuspangkat($id)
    {
        $this->Pangkat_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i sclass="icon fas fa-check-circle"></i>Data Berhasil Dihapus!</div>');
        }
        redirect('Admin/pangkat');
    }

    function editpangkat($id)
    {
        $data['judul'] = "Halaman Edit Data";
        $data['pangkat'] = $this->Pangkat_model->getById2($id);
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();

        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
            'required' => 'keterangan Wajib di isi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("admin/vw_edit_pangkat", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'keterangan' => $this->input->post('keterangan'),

            ];
            $upload_image = $_FILES['file']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'pdf|csv|docx|gif|jpg|png|jpeg|xls|xlsx';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/pegawai/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_image = $data['pangkat']['file'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/pegawai/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('file', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $id = $this->input->post('id');
            $this->Pangkat_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil DiUbah!</div>');
            redirect('Admin/pangkat');

        }
    }
    public function surat_masuk()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['surat_masuk'] = $this->Surat_Masuk_model->get();
        $data['judul'] = "Halaman Surat Masuk";
        $this->load->view('layout/header', $data);
        $this->load->view("admin/vw_surat_masuk", $data);
        $this->load->view('layout/footer', $data);
    }

    function edit_suratmasuk($id)
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
            $this->load->view("admin/vw_edit_suratmasuk", $data);
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
            redirect('admin/surat_masuk');

        }
    }
    public function hapus_suratmasuk($id)
    {
        $this->Surat_Masuk_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i sclass="icon fas fa-check-circle"></i>Data Berhasil Dihapus!</div>');
        }
        redirect('Admin/surat_masuk');
    }

    public function surat_keluar()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['surat_keluar'] = $this->Surat_Keluar_model->get();
        $data['judul'] = "Halaman Surat Keluar";
        $this->load->view('layout/header', $data);
        $this->load->view("admin/vw_surat_keluar", $data);
        $this->load->view('layout/footer', $data);
    }

    function edit_suratkeluar($id)
    {
        $data['judul'] = "Halaman Edit Data";
        $data['surat_keluar'] = $this->Surat_Keluar_model->getById2($id);
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();

        $this->form_validation->set_rules('no_surat', 'no_surat', 'required', [
            'required' => 'no_surat Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_keluar', 'tgl_keluar', 'required', [
            'required' => 'tgl_keluar Wajib di isi'
        ]);
        $this->form_validation->set_rules('pengirim', 'pengirim', 'required', [
            'required' => 'pengirim Wajib di isi'
        ]);
        $this->form_validation->set_rules('perihal', 'perihal', 'required', [
            'required' => 'perihal Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("admin/vw_edit_suratkeluar", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'no_surat' => $this->input->post('no_surat'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'tujuan' => $this->input->post('pengirim'),
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
            $this->Surat_Keluar_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kamu Berhasil DiUbah!</div>');
            redirect('admin/surat_keluar');

        }
    }
    public function hapus_suratkeluar($id)
    {
        $this->Surat_Keluar_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i sclass="icon fas fa-check-circle"></i>Data Berhasil Dihapus!</div>');
        }
        redirect('Admin/surat_keluar');
    }
    public function tambahSKeluar()
    {
        $data['judul'] = "Halaman Tambah Surat";
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['surat_keluar'] = $this->Surat_Keluar_model->get();
        $this->form_validation->set_rules('no_surat', 'no_surat', 'required', [
            'required' => 'no_surat Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_keluar', 'tgl_keluar', 'required', [
            'required' => 'tgl_keluar Wajib di isi'
        ]);
        $this->form_validation->set_rules('pengirim', 'pengirim', 'required', [
            'required' => 'pengirim Wajib di isi'
        ]);
        $this->form_validation->set_rules('perihal', 'perihal', 'required', [
            'required' => 'perihal Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("surat_keluar/vw_tambah_surat", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'NIP' => $this->input->post('NIP'),
                'no_surat' => $this->input->post('no_surat'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'tujuan' => $this->input->post('pengirim'),
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

            $this->Surat_Keluar_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kamu Berhasil Ditambah!</div>');
            redirect('Admin/surat_keluar');
        }
    }
    public function tambahSMasuk()
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
            redirect('Admin/surat_masuk');
        }
    }
}