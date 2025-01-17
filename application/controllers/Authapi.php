<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use Restserver\Libraries\RestController;

require_once(APPPATH . 'libraries/JWT.php');
use \Firebase\JWT\JWT;

class Authapi extends CI_Controller
{
    private $secret_key = 'T5hV1RzZmZb!3yd^p43bB#mnKlpqS6Fg';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        // Mendapatkan input JSON dari Postman
        $input = json_decode(trim(file_get_contents('php://input')), true);

        // Validasi input
        $this->form_validation->set_data($input);
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode($response));
        }

        $username = $input['username'];
        $password = $input['password'];

        // Cari data user berdasarkan username
        $user = $this->db->get_where('login', ['username' => $username])->row_array();

        if ($user) {
            // Periksa apakah user aktif
            if ($user['is_active'] == 1) {
                // Cek password
                if (password_verify($password, $user['password'])) {
                    // Buat JWT Token
                    $issued_at = time();
                    $expiration_time = $issued_at + 3600; // Token berlaku selama 1 jam
                    $payload = [
                        "username" => $user['username'],
                        "role_id" => $user['role_id'],
                        "iat" => $issued_at,
                        "exp" => $expiration_time
                    ];

                    $jwt = JWT::encode($payload, $this->secret_key, 'HS256');

                    // Simpan token ke database
                    $this->db->update('login', ['token' => $jwt], ['username' => $username]);

                    // Berikan respons token ke client
                    $response = [
                        'status' => 'success',
                        'message' => 'Login successful',
                        'token' => $jwt
                    ];
                    return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode($response));
                } else {
                    // Password salah
                    $response = [
                        'status' => 'error',
                        'message' => 'Invalid password'
                    ];
                    return $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(401)
                        ->set_output(json_encode($response));
                }
            } else {
                // Akun belum aktif
                $response = [
                    'status' => 'error',
                    'message' => 'This account is not activated'
                ];
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(403)
                    ->set_output(json_encode($response));
            }
        } else {
            // Username tidak ditemukan
            $response = [
                'status' => 'error',
                'message' => 'Username not found'
            ];
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode($response));
        }
    }

    public function index()
    {
        $data = $this->db->get('login')->result();
        echo json_encode($data);
    }

    public function show($id)
    {
        $data = $this->db->get_where('login', ['id' => $id])->row();
        echo json_encode($data);
    }

    public function list($page = 1)
    {
        // Set jumlah data per halaman
        $limit = 10;
        $offset = ($page - 1) * $limit;

        // Ambil parameter search jika ada
        $search = $this->input->get('search');
        
        // Query untuk mencari data dengan pagination
        $this->db->limit($limit, $offset);
        if (!empty($search)) {
            // Menambahkan kondisi pencarian jika ada
            $this->db->like('username', $search);
        }
        
        // Ambil data kayu
        $query = $this->db->get('login');
        $data = $query->result_array();
        
        // Hitung total data
        $this->db->like('username', $search);
        $total = $this->db->count_all_results('login');
        
        // Menghitung total halaman
        $total_pages = ceil($total / $limit);

        // Kirim response
        echo json_encode([
            'data' => $data,
            'total' => $total,
            'total_pages' => $total_pages,
            'current_page' => $page
        ]);
    }

    // API untuk registrasi pengguna
    public function register()
    {
        // Mendapatkan data JSON dari body request
        $input = json_decode(trim(file_get_contents('php://input')), true);

        // Validasi input
        $this->form_validation->set_data($input);
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[login.email]', [
            'is_unique' => 'This email has already registered!',
        ]);
        $this->form_validation->set_rules(
            'password', 'Password', 'required|trim|min_length[3]', [
                'min_length' => 'Password too short!',
            ]
        );

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode($response));
        }

        // Hash password
        $hashed_password = password_hash($input['password'], PASSWORD_DEFAULT);

        // Data untuk dimasukkan ke database
        $data = [
            'username' => htmlspecialchars($input['username'], true),
            'nama' => htmlspecialchars($input['nama'], true),
            'email' => htmlspecialchars($input['email'], true),
            'password' => $hashed_password,
            'role_id' => 0,
            'is_active' => 0,
            'image' => 'default.png',
            'date_created' => date('Y-m-d H:i:s'),
        ];

        // Insert ke database
        $this->db->insert('login', $data);

        // Jika berhasil
        $response = [
            'status' => 'success',
            'message' => 'Account successfully registered',
        ];

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(201)
            ->set_output(json_encode($response));
    }

    public function update($id)
    {
        if ($this->input->server('REQUEST_METHOD') === 'PUT') {
            // Ambil data JSON dari body PUT
            $input = json_decode(file_get_contents('php://input'), true);
    
            // Periksa apakah input valid
            if (empty($input)) {
                echo json_encode(['message' => 'Invalid input data']);
                return;
            }
    
            // Lakukan update data berdasarkan ID
            $this->db->update('login', $input, ['id' => $id]);
    
            // Cek jika update berhasil
            if ($this->db->affected_rows() > 0) {
                echo json_encode(['message' => 'Data updated successfully']);
            } else {
                echo json_encode(['message' => 'No changes were made']);
            }
        } else {
            echo json_encode(['message' => 'Invalid request method'], 405);
        }
    }

    public function delete($id)
    {
        if ($this->input->server('REQUEST_METHOD') === 'DELETE') {
            $this->db->delete('login', ['id' => $id]);
            echo json_encode(['message' => 'Data deleted successfully']);
        } else {
            echo json_encode(['message' => 'Invalid request method'], 405);
        }
    }

    public function logout()
    {
        // Ambil input JSON dari Postman
        $input = json_decode(trim(file_get_contents('php://input')), true);
    
        // Validasi input token
        if (!isset($input['token']) || empty($input['token'])) {
            $response = [
                'status' => 'error',
                'message' => 'Token is required'
            ];
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode($response));
        }
    
        $token = $input['token'];
    
        // Cari user berdasarkan token
        $user = $this->db->get_where('login', ['token' => $token])->row_array();
    
        if ($user) {
            // Hapus token dari database
            $this->db->update('login', ['token' => null], ['token' => $token]);
    
            $response = [
                'status' => 'success',
                'message' => 'Logout successful'
            ];
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($response));
        } else {
            // Token tidak ditemukan atau tidak valid
            $response = [
                'status' => 'error',
                'message' => 'Invalid token'
            ];
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(401)
                ->set_output(json_encode($response));
        }
    }
    

}