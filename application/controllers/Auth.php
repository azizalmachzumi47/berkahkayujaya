<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/JWT.php');
use \Firebase\JWT\JWT;

class Auth extends CI_Controller 
{
    private $secret_key = 'T5hV1RzZmZb!3yd^p43bB#mnKlpqS6Fg';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login'); 
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        $login = $this->db->get_where('login', ['username' => $username])->row_array();
    
        // jika usernya ada
        if ($login) {
            // jika usernya aktif
            if ($login['is_active'] == 1) {
                // cek password
                if (password_verify($password, $login['password'])) {
                    // Generate JWT Token
                    $issued_at = time();
                    $expiration_time = $issued_at + 3600;  // token berlaku selama 1 jam
                    $payload = array(
                        "username" => $login['username'],
                        "role_id" => $login['role_id'],
                        "iat" => $issued_at,
                        "exp" => $expiration_time
                    );
    
                    // Encode JWT
                    $jwt = \Firebase\JWT\JWT::encode($payload, $this->secret_key, 'HS256');
    
                    // Simpan token ke dalam database
                    $this->db->update('login', ['token' => $jwt], ['username' => $username]);
    
                    // Set session data
                    $data = [
                        'username' => $login['username'],
                        'role_id' => $login['role_id'],
                        'token' => $jwt // Pastikan token yang diset di session adalah token yang baru dibuat
                    ];
                    $this->session->set_userdata($data);
                    if ($login['role_id'] == 1) {
                        // Redirect untuk Administrator
                        redirect('dashboard');
                    } elseif ($login['role_id'] == 2) {
                        // Redirect untuk User
                        redirect('dashboard');
                    } elseif ($login['role_id'] == 3) {
                        // Redirect untuk Pelanggan
                        redirect('webkayu');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This username has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
            redirect('auth');
        }
    }
    
    public function registration() 
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules(
            'email', 'Email', 'required|trim|valid_email|is_unique[login.email]', 
            ['is_unique' => 'This email has already registered!']
        );
        $this->form_validation->set_rules(
            'password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password doesn\'t match!',
                'min_length' => 'Password too short!'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('show_register_form', true);
            $this->load->view('auth/login');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 0,
                'is_active' => 0,
                'image' => 'default.png',
                'date_created' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('login', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! Your account has been created. Please login.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $ci = get_instance();
        
        // Ambil username yang sedang login
        $username = $ci->session->userdata('username');
        
        // Hapus token dari database berdasarkan username
        $ci->db->update('login', ['token' => null], ['username' => $username]);
    
        // Hapus session userdata
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
    
        // Set flashdata untuk menampilkan pesan logout berhasil
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out!</div>');
        
        // Redirect ke halaman login (auth)
        redirect('auth');
    }
    

    function blocked()
    {
        $this->load->view('auth/blocked');
    }
    
}