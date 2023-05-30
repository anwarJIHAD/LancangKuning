<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
    }
    function index()
    {
        if ($this->session->userdata('NIP')) {
            redirect('Pegawai');
        }
        $this->form_validation->set_rules('NIP', 'NIP', 'trim|required', [
            'required' => 'NIP Wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'required' => 'Password Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("auth/login");
        } else {
            $this->cek_login();
        }
    }

    function registrasi()
    {
        if ($this->session->userdata('NIP')) {
            redirect('auth/registrasi');
        }
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
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
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registrasi');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'NIP' => htmlspecialchars($this->input->post('NIP', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'gambar' => 'default.png',
                'role' => "User",
            ];
            $this->userrole->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat!Akunmu telah berhasil terdaftar, Silahkan Login! </div>');
            redirect('auth');
        }
    }

    // public function cek_regis()
    // {
    //     $data = [
    //         'nama' => htmlspecialchars($this->input->post('nama', true)),
    //         'NIP' => htmlspecialchars($this->input->post('NIP', true)),
    //         'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //         'gambar' => 'default.jpg',
    //         'role' => 'User',
    //     ];
    //     $this->userrole->insert($data);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="elert"> Selamat Akunmu telah berhasil terdaftar, Silahkan Login!</div>');
    //     redirect('Auth');
    // }

    public function cek_login()
    {
        $nip = $this->input->post('NIP');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['NIP' => $nip])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'role' => $user['role'],
                    'NIP' => $user['NIP'],
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 'Admin') {
                    redirect('Admin');
                } else {
                    redirect('Pegawai');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="elert">
            Password Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="elert">
            NIP belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('NIP');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout! </div>');
        redirect('Auth');
    }
}