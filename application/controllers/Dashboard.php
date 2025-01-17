<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_pesanankayu');
        $this->load->model('model_kayu');
        $this->load->model('model_kegiatan');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();
    
        // Hitung total data untuk masing-masing tabel
        $data['total_pesanan'] = $this->model_pesanankayu->count_pesanan();
        $data['total_kayu'] = $this->model_kayu->count_kayu();
        $data['total_kegiatan'] = $this->model_kegiatan->count_kegiatan();
    
        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);
    
        $data['pesanan_by_kayu'] = $this->model_pesanankayu->get_pesanan_by_id_kayu();
        $data['pesanan'] = $this->model_pesanankayu->get_all_datapesanankayu();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
 
}