<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use Restserver\Libraries\RestController;

class Kayuapi extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('model_apikayu');
    }

    public function index()
    {
        $data = $this->db->get('berkah_kayu')->result();
        echo json_encode($data);
    }

    public function show($id)
    {
        $data = $this->db->get_where('berkah_kayu', ['id_kayu' => $id])->row();
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
            $this->db->like('jenis_kayu', $search);
        }
        
        // Ambil data kayu
        $query = $this->db->get('berkah_kayu');
        $data = $query->result_array();
        
        // Hitung total data
        $this->db->like('jenis_kayu', $search);
        $total = $this->db->count_all_results('berkah_kayu');
        
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

    public function store()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Ambil data dari input JSON (bukan melalui $_POST biasa)
            $input = json_decode(file_get_contents('php://input'), true);
    
            // Periksa apakah input valid
            if (empty($input)) {
                echo json_encode(['message' => 'Invalid input data']);
                return;
            }
    
            // Sisipkan data ke dalam tabel
            $this->db->insert('berkah_kayu', $input);
    
            // Cek jika insert berhasil
            if ($this->db->affected_rows() > 0) {
                echo json_encode(['message' => 'Data berhasil ditambahkan']);
            } else {
                echo json_encode(['message' => 'Gagal menambahkan data']);
            }
        } else {
            echo json_encode(['message' => 'Invalid request method'], 405);
        }
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
            $this->db->update('berkah_kayu', $input, ['id_kayu' => $id]);
    
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
            $this->db->delete('berkah_kayu', ['id_kayu' => $id]);
            echo json_encode(['message' => 'Data deleted successfully']);
        } else {
            echo json_encode(['message' => 'Invalid request method'], 405);
        }
    }
}