<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Pmi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in2();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Pmi_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['surat_masuk'] = $this->Pmi_model->get();
        $data['provinsi'] = $this->Pmi_model->get_provinsi();
        $data['judul'] = "Halaman Data PMI";
        $this->load->view('layout/header', $data);
        $this->load->view("pmi/vw_pmi", $data);
        $this->load->view('layout/footer', $data);
    }
    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('Pmi_model');
        $data = $this->Pmi_model->get();

        if ($this->input->post('query')) {
            $query = $this->input->post('query');
            $data = $this->Pmi_model->fetch_data($query);

        } elseif ($this->input->post('query') & $this->input->post('query')) {

        }



        if (!empty($data)) {
            $i = 1;
            foreach ($data->result_array() as $us) {
                $output .= '
                <tr>
                <td> ' . $i . '</td>
<td>' . $us['nama'] . '</td>
<td>' . $us['jenis_kelamin'] . '</td>
<td>' . $us['tanggal_lahir'] . '</td>
<td>' . $us['alamat'] . '</td>
<td>' . $us['negara_penempatan'] . '</td>
<td>' . $us['tgl_datang'] . '</td>
<td>' . $us['jenis_pulang'] . '</td>
<td>' . $us['provinsi'] . '</td>
<td>' . $us['debarkas'] . '</td>
<td>' . $us['ket'] . '</td>

<td>
<a href="' . base_url('pmi/hapus/') . $us['id_pmi'] . '" class="badge badge-danger">Hapus</a>
<a href="' . base_url('pmi/edit/') . $us['id_pmi'] . '" class="badge badge-warning">Edit</a>
</td>
</tr>
';
                $i += 1;
            }
        } else {
            $output .= '<tr>
							<td colspan="5">No Data Found</td>
						</tr>';
        }

        echo $output;
    }

    public function hapus($id)
    {
        $this->Pmi_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">DataMahasiswa Berhasil
        Dihapus!
    </div>');
        redirect('pmi');
    }

    function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();

        $data['judul'] = "Halaman Edit Data PMI";
        $data['pmi_'] = $this->Pmi_model->getById2($id);


        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
            'required' => 'jenis_kelamin Wajib di isi'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required', [
            'required' => 'tanggal_lahir Wajib di isi'
        ]);
        $this->form_validation->set_rules('negara_penempatan', 'negara_penempatan', 'required', [
            'required' => 'negara_penempatan Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_datang', 'tgl_datang', 'required', [
            'required' => 'tgl_datang Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("Pmi/vw_editpmi", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'negara_penempatan' => $this->input->post('negara_penempatan'),
                'tgl_datang' => $this->input->post('tgl_datang'),
                'jenis_pulang' => $this->input->post('jenis_pulang'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'debarkas' => $this->input->post('debarkas'),
                'ket' => $this->input->post('keterangan'),


            ];
            $id = $this->input->post('id_pmi');
            $this->Pmi_model->update(['id_pmi' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI Berhasil di Ubah!
    </div>
    ');
            redirect('Pmi');

        }
    }
    function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['judul'] = "Halaman Tambah Data PMI";
        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', [
            'required' => 'jenis_kelamin Wajib di isi'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required', [
            'required' => 'tanggal_lahir Wajib di isi'
        ]);
        $this->form_validation->set_rules('negara_penempatan', 'negara_penempatan', 'required', [
            'required' => 'negara_penempatan Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_datang', 'tgl_datang', 'required', [
            'required' => 'tgl_datang Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view("Pmi/vw_tambahpmi", $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'negara_penempatan' => $this->input->post('negara_penempatan'),
                'tgl_datang' => $this->input->post('tgl_datang'),
                'jenis_pulang' => $this->input->post('jenis_pulang'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'debarkas' => $this->input->post('debarkas'),
                'ket' => $this->input->post('keterangan'),


            ];
            $this->Pmi_model->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data PMI Berhasil di
        Tambahkan!
    </div>');
            redirect('Pmi');

        }
    }
    public function pdf()
    {
        $data['user'] = $this->db->get_where('user', ['NIP' => $this->session->userdata('NIP')])->row_array();
        $data['surat_masuk'] = $this->Pmi_model->get();
        $data['provinsi'] = $this->Pmi_model->get_provinsi();
        $this->load->library('pdf');
        $html = $this->load->view('pmi/GeneratePdfView', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }
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
        $sheet->setCellValue('A1', "Laporan Hasil Pendataan PMI"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:K1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "NAMA"); // Set kolom B3 dengan tulisan "NAMA"
        $sheet->setCellValue('C3', "JENIS KELAMIN"); // Set kolom C3 dengan tulisan "JENIS KELAMIN"
        $sheet->setCellValue('D3', "TANGGAL LAHIR"); // Set kolom D3 dengan tulisan "TANGGAL LAHIR"
        $sheet->setCellValue('E3', "NEGARA PENEMPATAN"); // Set kolom E3 dengan tulisan "NEGARA PENEMPATAN"
        $sheet->setCellValue('F3', "TANGGAL DATANG"); // Set kolom E3 dengan tulisan "TANGGAL DATANG"
        $sheet->setCellValue('G3', "JENIS PULANG"); // Set kolom E3 dengan tulisan "JENIS PULANG"
        $sheet->setCellValue('H3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('I3', "PROVINSI"); // Set kolom E3 dengan tulisan "PROVINSI"
        $sheet->setCellValue('J3', "DEBARKAS"); // Set kolom E3 dengan tulisan "DEBARKAS"
        $sheet->setCellValue('K3', "KETERANGAN"); // Set kolom E3 dengan tulisan "KETERANGAN"
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
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->Pmi_model->get();
        // var_dump($siswa);
        // die;
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data['nama']);
            $sheet->setCellValue('C' . $numrow, $data['jenis_kelamin']);
            $sheet->setCellValue('D' . $numrow, $data['tanggal_lahir']);
            $sheet->setCellValue('E' . $numrow, $data['negara_penempatan']);
            $sheet->setCellValue('F' . $numrow, $data['tgl_datang']);
            $sheet->setCellValue('G' . $numrow, $data['jenis_pulang']);
            $sheet->setCellValue('H' . $numrow, $data['alamat']);
            $sheet->setCellValue('I' . $numrow, $data['provinsi']);
            $sheet->setCellValue('J' . $numrow, $data['debarkas']);
            $sheet->setCellValue('K' . $numrow, $data['ket']);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('G' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('H' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('I' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('J' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('K' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
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

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Data PMI");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data PMI.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}