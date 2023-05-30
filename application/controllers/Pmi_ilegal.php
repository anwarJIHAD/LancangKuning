<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pmi_ilegal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in2();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Ilegal_model');
        $this->load->model('Pendukung_model');
        $this->load->model('Pelaku_model');
        $this->load->model('Detail_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['data'] = $this->Pendukung_model->get();
        $data['pelaksana'] = $this->Pendukung_model->pmi_ilegal();
        $data['judul'] = "Halaman Penanganan";
        $this->load->view('layout/header', $data);
        $this->load->view("pmi_ilegal/vw_ilegal", $data);
        $this->load->view('layout/footer', $data);
    }
    public function tampil_pelaku($id_p)
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        // $data['detail'] = $this->Detail_Model->get();
        $data['pelaku'] = $this->Pelaku_model->pelaku_ilegal($id_p);
        $data['pelaksana'] = $this->Pendukung_model->pmi_ilegal1($id_p);
        $data['pendukung'] = $this->Pendukung_model->getById2($id_p);
        $data['pmi'] = $this->Ilegal_model->getById2($id_p);
        $data['judul'] = "Halaman Detail Pelaku";
     
        $this->load->view('layout/header', $data);
        $this->load->view("pelaku/vw_pelaku", $data);
        $this->load->view('layout/footer', $data);
    }
    public function edit_pelaku()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data1 = [
            'nama_pelaku' => $this->input->post('nama_pelaku'),
            'asal_daerah' => $this->input->post('asal_daerah'),
            'peran' => $this->input->post('peran'),

        ];
        $id_p = $this->input->post('id_pendukung');
        $id = $this->input->post('id_pelaku');
        $this->Pelaku_model->update(['id_pelaku' => $id], $data1);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data pelaku Berhasil di Ubah!</div>');
        redirect('Pmi_ilegal/tampil_pelaku/' . $id_p);
    }
    public function hapus($id, $id_p)
    {
        $this->Ilegal_model->delete($id);
        $this->Detail_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Korban Berhasil Dihapus!</div>');
        redirect('Pmi_ilegal/tambah_cpmi/' . $id_p);
    }

    function edit($id_p)
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();

        $data['judul'] = "Halaman Edit Data Pendukung";
        $data['pendukung1'] = $this->Pendukung_model->get();
        $data['data'] = $this->Pendukung_model->get();
        $data['pelaksana'] = $this->Pendukung_model->pmi_ilegal1($id_p);
        $data['pendukung'] = $this->Pendukung_model->getById2($data['pelaksana']['id_pendukung']);
        $data['pelaku'] = $this->Pelaku_model->get();
        $data['no_korban'] = $id_p;

        $this->form_validation->set_rules('nama_pelaksana', 'nama_pelaksana', 'required', [
            'required' => 'nama_pelaksana Wajib di isi'
        ]);



        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("Pmi_ilegal/vw_editPendukung", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'id_pendukung' => $this->input->post('nama_pelaksana'),


            ];
            $id = $this->input->post('id_pendukung');
            $this->Detail_model->update(['id_pendukung' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data pendukung Berhasil di Ubah!</div>');
            redirect('Pmi_ilegal/edit_cpmi/' . $id);
        }
    }

    function edit_cpmi($id_p)
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Ubah Data Korban";
        $data['pendukung'] = $this->Pendukung_model->getById2($id_p);
        $data['pelaku'] = $this->Pelaku_model->get_pelaku($id_p);
        $data['korban'] = $this->Ilegal_model->getById2($id_p);

        $this->load->view('layout/header', $data);
        $this->load->view("Pmi_ilegal/vw_editIlegal", $data);
        $this->load->view('layout/footer', $data);
    }
    function edit_detail($k, $id_p)
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Ubah Data Korban";
        $data['pendukung'] = $this->Pendukung_model->getById2($id_p);
        $data['pelaku'] = $this->Pelaku_model->get_pelaku($id_p);
        $data['korban'] = $this->Ilegal_model->getById3($k);
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("Pmi_ilegal/vw_editdetail", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'id_pendukung' => $this->input->post('id_pendukung'),
                'nama' => $this->input->post('nama'),
                'no_paspor' => $this->input->post('no_paspor'),
                'no_ktp' => $this->input->post('no_ktp'),
                'negara_tujuan' => $this->input->post('negara_tujuan'),
                'Daerah_asal_rekrut' => $this->input->post('Daerah_asal_rekrut'),
            ];
            $id = $this->input->post('id_pendukung');
            $this->Detail_model->update(['no_korban' => $k], $data);
            $this->Ilegal_model->update(['no_korban' => $k], $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data pendukung Berhasil di Ubah!</div>');
            redirect('Pmi_ilegal/edit_cpmi/' . $id);
        }
    }

    function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Tambah Data PMI Ilegal";
        $this->form_validation->set_rules('Pelaksana', 'pelaksana', 'required', [
            'required' => 'nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_pelaksana', 'tgl_pelaksana', 'required', [
            'required' => 'tgl_pelaksana Wajib di isi'
        ]);
        $this->form_validation->set_rules('TKP', 'TKP', 'required', [
            'required' => 'TKP Wajib di isi'
        ]);
        $this->form_validation->set_rules('lokasi_shelter', 'lokasi_shelter', 'required', [
            'required' => 'lokasi_shelter Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("Pmi_ilegal/vw_tambahilegal", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data_pendukung = [
                'pelaksana' => $this->input->post('pelaksana'),
                'tgl_pelaksana' => $this->input->post('tgl_pelaksana'),
                'TKP' => $this->input->post('TKP'),
                'lokasi_shelter' => $this->input->post('lokasi_shelter'),
                'instansi_penindaklanjut' => "",
                'keterangan' => "",

            ];
            $this->Pendukung_model->insert($data_pendukung);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI Berhasil di Tambahkan!</div>');
            redirect('Pmi_ilegal');
        }
    }
    function tambah_pendukung()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Tambah Data Pelaksana";
        $this->form_validation->set_rules('nama_pelaksana', 'nama_pelaksana', 'required', [
            'required' => 'nama_pelaksana Wajib di isi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("Pmi_ilegal/vw_tambahPendukung", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama_pelaksana' => $this->input->post('nama_pelaksana'),



            ];
            $this->Pendukung_model->insert($data);
            $lastId = $this->db->insert_id();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pelaksana berhasil di tambahkan, selanjutnya tambahkan Pelaku !!</div>');
            redirect('Pmi_ilegal/tambah_pelaku1/');
        }
    }
    function tambah_pelaku1()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Tambah Data Pelaku";
        $this->form_validation->set_rules('nama_pelaku[]', 'nama_pelaku', 'required', [
            'required' => 'nama_pelaku Wajib di isi'
        ]);
        $this->form_validation->set_rules('peran[]', 'peran', 'required', [
            'required' => 'peran Wajib di isi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("Pmi_ilegal/vw_tambah_pelaku1", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama_pelaku' => $this->input->post('nama_pelaku'),
            ];

            $nama_pelaku = $this->input->post('nama_pelaku');
            $peran = $this->input->post('peran');


            $data2 = array();

            foreach ($nama_pelaku as $key => $value) {
                $data2[$key]['nama_pelaku'] = $value;
                $data2[$key]['peran'] = $peran[$key];
            }
            // var_dump($data2);
            // die;
            if ($this->Pelaku_model->insert($data2)) {

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI Berhasil dibuat!</div>');
                redirect('Pmi_ilegal/tambah_korban/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI Gagal dibuat!</div>');
                redirect('Pmi_ilegal/tambah_pelaku1');
            }
        }
    }

    public function tambah_Korban()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Tambah Data Korban";
        $data['pendukung'] = $this->Pendukung_model->get();
        $data['pelaku'] = $this->Pelaku_model->get();
        $this->form_validation->set_rules('pelaksana', 'pelaksana', 'required', [
            'required' => 'pelaksana Wajib di isi'
        ]);
        $this->form_validation->set_rules('pelaku[]', 'pelaku', 'required', [
            'required' => 'pelaku Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_korban[]', 'nama_korban', 'required', [
            'required' => 'nama_korban Wajib di isi'
        ]);
        $this->form_validation->set_rules('daerah_asal_pmi[]', 'daerah_asal_pmi', 'required', [
            'required' => 'daerah_asal_pmi Wajib di isi'
        ]);
        $this->form_validation->set_rules('negara_tujuan[]', 'negara_tujuan', 'required', [
            'required' => 'negara_tujuan Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_pelaksanaan', 'tgl_pelaksanaan', 'required', [
            'required' => 'tanggal pelaksanaan Wajib di isi'
        ]);
        $this->form_validation->set_rules('TKP', 'TKP', 'required', [
            'required' => 'TKP Wajib di isi'
        ]);
        $this->form_validation->set_rules('lokasi_shelter', 'lokasi_shelter', 'required', [
            'required' => 'lokasi_shelter Wajib di isi'
        ]);



        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("Pmi_ilegal/vw_tambah_korban", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama_pelaku' => $this->input->post('nama_pelaku'),
            ];

            $pelaksana = (int) $this->input->post('pelaksana');
            $pelaku = $this->input->post('pelaku');
            $nama_korban = $this->input->post('nama_korban');
            $daerah_asal_pmi = $this->input->post('daerah_asal_pmi');
            $negara_tujuan = $this->input->post('negara_tujuan');
            $no_korban = $this->input->post('no_korban');
            $kronologi = $this->input->post('kronologi');
            $instansi = $this->input->post('instansi');
            $tgl_pelaksanaan = $this->input->post('tgl_pelaksanaan');
            $TKP = $this->input->post('TKP');
            $lokasi_shelter = $this->input->post('lokasi_shelter');

            $data1 = array();

            foreach ($pelaku as $key => $value) {
                $data1[$key]['id_pendukung'] = $pelaksana;
                $data1[$key]['id_pelaku'] = $value;
                $data1[$key]['no_korban'] = $no_korban;
                $data1[$key]['kronologi_Pencegahan'] = $kronologi;
                $data1[$key]['instansi_penindaklanjut'] = $instansi;
                $data1[$key]['tgl_pelaksanaan'] = $tgl_pelaksanaan;
                $data1[$key]['TKP'] = $TKP;
                $data1[$key]['lokasi_shelter'] = $lokasi_shelter;
            }

            $data2 = array();

            foreach ($daerah_asal_pmi as $key => $value) {
                $data2[$key]['id_pendukung'] = $pelaksana;
                $data2[$key]['nama'] = $nama_korban[$key];
                $data2[$key]['daerah_asal_pmi'] = $value;
                $data2[$key]['negara_tujuan'] = $negara_tujuan[$key];
                $data2[$key]['no_korban'] = $no_korban;
            }

            if ($this->Ilegal_model->insert($data2) && $this->Detail_model->insert($data1)) {

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI Berhasil dibuat!</div>');
                redirect('Pmi_ilegal');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI Gagal dibuat!</div>');
                redirect('Pmi_ilegal/tambah_korban');
            }
        }
    }

    function tambah_cpmi()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Tambah Data CPMI";
        $data['pendukung'] = $this->Pendukung_model->getById2($id_p);
        $data['pelaku'] = $this->Pelaku_model->get_pelaku($id_p);
        $data['korban'] = $this->Ilegal_model->getById2($id_p);


        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_paspor', 'Nomor Paspor', 'required', [
            'required' => 'Nomor Paspor Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_ktp', 'No ktp', 'required', [
            'required' => 'No ktp Wajib di isi'
        ]);
        $this->form_validation->set_rules('Daerah_asal_rekrut', 'Daerah asal rekrut', 'required', [
            'required' => 'Daerah asal rekrut Wajib di isi'
        ]);
        $this->form_validation->set_rules('negara_tujuan', 'negara Tujuan', 'required', [
            'required' => 'negara tujuan Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("Pmi_ilegal/vw_tambahcpmi", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'id_pendukung' => $this->input->post('id_pendukung'),
                'no_korban' => $this->input->post('no_korban'),
                'nama' => $this->input->post('nama'),
                'no_paspor' => $this->input->post('no_paspor'),
                'no_ktp' => $this->input->post('no_ktp'),
                'negara_tujuan' => $this->input->post('negara_tujuan'),
                'Daerah_asal_rekrut' => $this->input->post('Daerah_asal_rekrut'),
            ];

            $pelaku_ = $this->input->post('pelaku');
            $ilegal = $this->input->post('no_korban');
            $pendukung = $this->input->post('id_pendukung');

            $data2 = array();
            foreach ($pelaku_ as $key => $value) {
                $data2[$key]['nama_pelaku'] = $ilegal;
                $data2[$key]['id_pendukung'] = $pendukung;
                $data2[$key]['id_pelaku'] = $value;
            }
            if ($this->Ilegal_model->insert($data) && $this->Detail_model->insert($data2)) {

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI Berhasil dibuat!</div>');
                redirect('Pmi_ilegal/tambah_cpmi/' . $id_p);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI Gagal dibuat!</div>');
                redirect('Pmi_ilegal/tambah_cpmi/' . $id_p);
            }
        }
    }
    function tambah_pelaku()
    {
        $data = [
            'nama_pelaku' => $this->input->post('nama_pelaku'),
            'peran' => $this->input->post('peran'),
            'asal_daerah' => $this->input->post('asal_daerah'),
            'id_pendukung' => $this->input->post('id_pendukung'),
        ];
        $this->Pelaku_model->insert($data);
        $id_p = $this->input->post('id_pendukung');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pelaku Berhasil di Tambahkan!</div>');
        redirect('Pmi_ilegal/tambah_cpmi/' . $id_p);
    }
    function hapusSemua($id_k)
    {
        $this->Ilegal_model->delete_($id_k);
        $this->Detail_model->delete_($id_k);
        $this->Pendukung_model->delete($id_k);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Korban Berhasil Dihapus!</div>');
        redirect('Pmi_ilegal');
    }
    function hapusdetail($id, $id_p)
    {
        $this->Ilegal_model->delete($id);
        $this->Detail_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Korban Berhasil Dihapus!</div>');
        redirect('Pmi_ilegal/edit_cpmi/' . $id_p);
    }
    function editP_tambahCPMI($id_p)
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Tambah Data CPMI";
        $data['pendukung'] = $this->Pendukung_model->getById2($id_p);
        $data['pelaku'] = $this->Pelaku_model->get_pelaku($id_p);
        $data['korban'] = $this->Ilegal_model->getById2($id_p);


        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_paspor', 'Nomor Paspor', 'required', [
            'required' => 'Nomor Paspor Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_ktp', 'No ktp', 'required', [
            'required' => 'No ktp Wajib di isi'
        ]);
        $this->form_validation->set_rules('Daerah_asal_rekrut', 'Daerah asal rekrut', 'required', [
            'required' => 'Daerah asal rekrut Wajib di isi'
        ]);
        $this->form_validation->set_rules('negara_tujuan', 'negara Tujuan', 'required', [
            'required' => 'negara tujuan Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("Pmi_ilegal/vw_editP_TambahCPMI", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'id_pendukung' => $this->input->post('id_pendukung'),
                'no_korban' => $this->input->post('no_korban'),
                'nama' => $this->input->post('nama'),
                'no_paspor' => $this->input->post('no_paspor'),
                'no_ktp' => $this->input->post('no_ktp'),
                'negara_tujuan' => $this->input->post('negara_tujuan'),
                'Daerah_asal_rekrut' => $this->input->post('Daerah_asal_rekrut'),
            ];

            $pelaku_ = $this->input->post('pelaku');
            $ilegal = $this->input->post('no_korban');
            $pendukung = $this->input->post('id_pendukung');

            $data2 = array();
            foreach ($pelaku_ as $key => $value) {
                $data2[$key]['no_korban'] = $ilegal;
                $data2[$key]['id_pendukung'] = $pendukung;
                $data2[$key]['id_pelaku'] = $value;
            }
            if ($this->Ilegal_model->insert($data) && $this->Detail_model->insert($data2)) {

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI Berhasil dibuat!</div>');
                redirect('Pmi_ilegal/edit_cpmi/' . $id_p);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI Gagal dibuat!</div>');
                redirect('Pmi_ilegal/edit_cpmi/' . $id_p);
            }
        }
    }
    function tambah_pelaku2()
    {
        $data = [
            'nama_pelaku' => $this->input->post('nama_pelaku'),
            'peran' => $this->input->post('peran'),
            'asal_daerah' => $this->input->post('asal_daerah'),
            'id_pendukung' => $this->input->post('id_pendukung'),
        ];
        $this->Pelaku_model->insert($data);
        $id_p = $this->input->post('id_pendukung');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pelaku Berhasil di Tambahkan!</div>');
        redirect('Pmi_ilegal/editP_tambahCPMI/' . $id_p);
    }

    public function pdf()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['data'] = $this->Pendukung_model->get();

        $this->load->library('pdf3');
        $html = $this->load->view('pmi_ilegal/pdf', $data, true);
        $this->pdf3->createPDF($html, 'mypdf', false);
    }
    // public function pdf()
    // {
    //     $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
    //     $data['data'] = $this->Ilegal_model->tampil2();

    //     $this->load->library('pdf3');
    //     $html = $this->load->view('pmi_ilegal/pdf', $data, true);
    //     $this->pdf3->createPDF($html, 'mypdf', false);
    // }
    // public function pdf2()
    // {
    //     $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
    //     $data['data'] = $this->Ilegal_model->tampil2();

    //     $this->load->library('pdf3');
    //     $html = $this->load->view('pmi_ilegal/pdf', $data, true);
    //     $this->pdf3->createPDF($html, 'mypdf', false);
    // }
    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true],

            // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                // Set border top dengan garis tipis
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                // Set border right dengan garis tipis
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                // Set border bottom dengan garis tipis
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                // Set border top dengan garis tipis
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                // Set border right dengan garis tipis
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                // Set border bottom dengan garis tipis
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];
        //style judul
        $style_judul = [
            'font' => ['bold' => true, 'size' => 15],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ]
        ];
        $sheet->setCellValue('A1', "Laporan Hasil Pendataan PMI ILEGAL"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:K1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1

        $sheet->setCellValue('A3', "Pelaksana"); // Set kolom A3 Untuk jadi header
        $sheet->mergeCells('A3:F3'); // Set Merge Cell pada kolom A1 sampai F3

        $sheet->setCellValue('G3', "Korban"); // Set kolom A3 Untuk jadi header
        $sheet->mergeCells('G3:J3'); // Set Merge Cell pada kolom G1 sampai J3

        $sheet->setCellValue('K3', "Pelaku"); // Set kolom A3 Untuk jadi header
        $sheet->mergeCells('K3:M3'); // Set Merge Cell pada kolom A1 sampai F3

        $sheet->setCellValue('N3', "Informasi Tambahan"); // Set kolom n3 Untuk jadi header

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A4', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B4', "PELAKSANA"); // Set kolom B3 dengan tulisan "NAMA"
        $sheet->setCellValue('C4', "TANGGAL PELAKSANAAN"); // Set kolom C3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('D4', "TKP"); // Set kolom D3 dengan tulisan "TANGGAL LAHIR"
        $sheet->setCellValue('E4', "LOKASI SHELTER"); // Set kolom E3 dengan tulisan "NEGARA PENEMPATAN"
        $sheet->setCellValue('F4', "PENINDAK LANJUT"); // Set kolom E3 dengan tulisan "TANGGAL DATANG"
        $sheet->setCellValue('G4', "NAMA"); // Set kolom E3 dengan tulisan "JENIS PULANG"
        $sheet->setCellValue('H4', "NO PASPOR"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('I4', "NO KTP"); // Set kolom E3 dengan tulisan "PROVINSI"
        $sheet->setCellValue('J4', "NEGARA TUJUAN"); // Set kolom E3 dengan tulisan "DEBARKAS"
        $sheet->setCellValue('K4', "NAMA PELAKU"); // Set kolom E3 dengan tulisan "KETERANGAN"
        $sheet->setCellValue('L4', "PERAN");
        $sheet->setCellValue('M4', "ASAL DAERAH");
        $sheet->setCellValue('N4', "KETERANGAN");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A1')->applyFromArray($style_judul);
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        $sheet->getStyle('G3')->applyFromArray($style_col);
        $sheet->getStyle('H3')->applyFromArray($style_col);
        $sheet->getStyle('I3')->applyFromArray($style_col);
        $sheet->getStyle('J3')->applyFromArray($style_col);
        $sheet->getStyle('K3')->applyFromArray($style_col);
        $sheet->getStyle('L3')->applyFromArray($style_col);
        $sheet->getStyle('M3')->applyFromArray($style_col);
        $sheet->getStyle('N3')->applyFromArray($style_col);

        $sheet->getStyle('A4')->applyFromArray($style_col);
        $sheet->getStyle('B4')->applyFromArray($style_col);
        $sheet->getStyle('C4')->applyFromArray($style_col);
        $sheet->getStyle('D4')->applyFromArray($style_col);
        $sheet->getStyle('E4')->applyFromArray($style_col);
        $sheet->getStyle('F4')->applyFromArray($style_col);
        $sheet->getStyle('G4')->applyFromArray($style_col);
        $sheet->getStyle('H4')->applyFromArray($style_col);
        $sheet->getStyle('I4')->applyFromArray($style_col);
        $sheet->getStyle('J4')->applyFromArray($style_col);
        $sheet->getStyle('K4')->applyFromArray($style_col);
        $sheet->getStyle('L4')->applyFromArray($style_col);
        $sheet->getStyle('M4')->applyFromArray($style_col);
        $sheet->getStyle('N4')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $ilegal = $this->Detail_model->tampil();
        $ilegal1 = $this->Pendukung_model->get();
        // var_dump($siswa);
        // die;
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
        // foreach ($ilegal as $us) { // Lakukan looping pada variabel siswa
        //     $sheet->setCellValue('A' . $numrow, $no);
        //     $sheet->setCellValue('B' . $numrow, $us['pelaksana']);
        //     $sheet->setCellValue('C' . $numrow, $us['tgl_pelaksana']);
        //     $sheet->setCellValue('D' . $numrow, $us['TKP']);
        //     $sheet->setCellValue('E' . $numrow, $us['lokasi_shelter']);
        //     $sheet->setCellValue('F' . $numrow, $us['instansi_penindaklanjut']);
        //     $sheet->setCellValue('G' . $numrow, $us['nama']);
        //     $sheet->setCellValue('H' . $numrow, $us['no_paspor']);
        //     $sheet->setCellValue('I' . $numrow, $us['no_ktp']);
        //     $sheet->setCellValue('J' . $numrow, $us['negara_tujuan']);
        //     $sheet->setCellValue('K' . $numrow, $us['nama_pelaku']);
        //     $sheet->setCellValue('L' . $numrow, $us['peran']);
        //     $sheet->setCellValue('M' . $numrow, $us['asal_daerah']);
        //     $sheet->setCellValue('N' . $numrow, $us['keterangan']);
        foreach ($ilegal1 as $us) {
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $us['pelaksana']);
            $sheet->setCellValue('C' . $numrow, $us['tgl_pelaksana']);
            $sheet->setCellValue('D' . $numrow, $us['TKP']);
            $sheet->setCellValue('E' . $numrow, $us['lokasi_shelter']);
            $sheet->setCellValue('F' . $numrow, $us['instansi_penindaklanjut']);
            $did = $us['id_pendukung'];
            $korban = $this->Pendukung_model->korban_($did);
            $numrow1 = $numrow;
            foreach ($korban as $kor) {
                $sheet->setCellValue('G' . $numrow1, $kor['nama']);
                $sheet->setCellValue('H' . $numrow1, $kor['no_paspor']);
                $sheet->setCellValue('I' . $numrow1, $kor['no_ktp']);
                $sheet->setCellValue('J' . $numrow1, $kor['negara_tujuan']);
                $numrow1++;
            }

            $pelaku = $this->Pelaku_model->getById3($did);

            $numrow2 = $numrow;
            if (!empty($pelaku)) {
                foreach ($pelaku as $pel) {
                    $sheet->setCellValue('K' . $numrow2, $pel['nama_pelaku']);
                    $sheet->setCellValue('L' . $numrow2, $pel['peran']);
                    $sheet->setCellValue('M' . $numrow2, $pel['asal_daerah']);

                    $numrow2++;
                }
            }

            $sheet->setCellValue('N' . $numrow2, $us['keterangan']);
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            // $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('G' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('H' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('I' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('J' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('K' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('L' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('M' . $numrow)->applyFromArray($style_row);
            // $sheet->getStyle('N' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            if ($numrow1 > $numrow2) {
                $sheet->mergeCells('A' . $numrow . ':A' . $numrow1 - 1);
                $sheet->mergeCells('B' . $numrow . ':B' . $numrow1 - 1);
                $sheet->mergeCells('C' . $numrow . ':C' . $numrow1 - 1);
                $sheet->mergeCells('D' . $numrow . ':D' . $numrow1 - 1);
                $sheet->mergeCells('E' . $numrow . ':E' . $numrow1 - 1);
                $sheet->mergeCells('F' . $numrow . ':F' . $numrow1 - 1);
                $sheet->mergeCells('N' . $numrow . ':N' . $numrow1 - 1);

                $numrow = $numrow1;
            } else {
                $sheet->mergeCells('A' . $numrow . ':A' . $numrow2 - 1);
                $sheet->mergeCells('B' . $numrow . ':B' . $numrow2 - 1);
                $sheet->mergeCells('C' . $numrow . ':C' . $numrow2 - 1);
                $sheet->mergeCells('D' . $numrow . ':D' . $numrow2 - 1);
                $sheet->mergeCells('E' . $numrow . ':E' . $numrow2 - 1);
                $sheet->mergeCells('F' . $numrow . ':F' . $numrow2 - 1);
                $sheet->mergeCells('N' . $numrow . ':N' . $numrow2 - 1);
                $numrow = $numrow2;
            }


            // $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('E')->setWidth(20); // Set width kolom E
        $sheet->getColumnDimension('F')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('G')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('H')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('I')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('J')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('K')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('L')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('M')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('N')->setWidth(50); // Set width kolom D

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Data PMI");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="PMI ILEGAL.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}