<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apiswagger extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'API Swagger';
    
        $this->load->view('apiswagger/index', $data);
    }

    // public function delete($id_kayu)
    // {
    //     // Menghapus data berdasarkan ID dari tabel berkah_kayu
    //     $this->db->where('id_kayu', $id_kayu);
    //     if ($this->db->delete('berkah_kayu')) {
    //         // Jika berhasil, kembalikan pesan sukses
    //         echo json_encode(['message' => 'Data berhasil dihapus']);
    //     } else {
    //         // Jika gagal, kembalikan pesan error
    //         echo json_encode(['message' => 'Data tidak ditemukan']);
    //     }
    // }
}