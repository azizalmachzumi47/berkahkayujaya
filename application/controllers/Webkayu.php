<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webkayu extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_kayu');
        $this->load->model('model_pesanankayu');
        $this->load->model('model_kegiatan');
    }

    public function index()
    {
        $data['title'] = 'Berkah Kayu Jaya';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        
        $data['kayujaya'] = $this->model_kayu->get_all_datakayu();
        $data['kegiatankayu'] = $this->model_kegiatan->get_all_datakegiatan();

        $data['pesanankayu'] = $this->model_pesanankayu->get_all_datapesanankayu();
    
        $this->load->view('webkayu/index', $data);
    }

    public function pesananwebkayu_action()
    {
        date_default_timezone_set('Asia/Jakarta');
    
        // Ambil nilai total harga dari input form dan pastikan dalam format integer
        $total_harga = $this->input->post('total_harga');
        if (!empty($total_harga)) {
            $total_harga = intval(preg_replace("/[^0-9]/", "", $total_harga));
        } else {
            $total_harga = 0;
        }
    
        // Data pesanan kayu
        $data = [
            'id_kayu' => $this->input->post('id_kayu'),
            'nama_customer' => $this->input->post('nama_customer'),
            'tanggal_pesankayu' => $this->input->post('tanggal_pesankayu'),
            'jumlah' => $this->input->post('jumlah'),
            'total_harga' => $total_harga,
            'keterangan' => $this->input->post('keterangan'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat_pesanan' => $this->input->post('alamat_pesanan'),
            'is_read' => '0',
            'date_created' => date('Y-m-d H:i:s'),
        ];
    
        // Ambil id_kayu dan jumlah pesanan
        $id_kayu = $this->input->post('id_kayu');
        $jumlah_pesanan = (int) $this->input->post('jumlah');
    
        // Cek stok kayu berdasarkan id_kayu
        $kayu = $this->model_pesanankayu->getKayuById($id_kayu);
        if ($kayu) {
            $stok_kayu = (int) $kayu->stok_kayu;
    
            // Pastikan stok mencukupi
            if ($stok_kayu >= $jumlah_pesanan) {
                // Kurangi stok kayu
                $stok_baru = $stok_kayu - $jumlah_pesanan;
                $this->model_pesanankayu->updateStokKayu($id_kayu, $stok_baru);
    
                // Insert data pesanan
                $query = $this->model_pesanankayu->insertpesanan($data);
                if ($query) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pesanan kayu berhasil ditambahkan</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pesanan kayu gagal ditambahkan</div>');
                }
            } else {
                // Stok tidak mencukupi
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Stok kayu tidak mencukupi untuk jumlah pesanan!</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kayu dengan ID tersebut tidak ditemukan!</div>');
        }
    
        redirect('webkayu');
    }

    public function detail_kayu($id_kayu) 
    {
        $data['title'] = 'Detail Kayu';


		$data['kayu'] =  $this->model_kayu->get_datakayu($id_kayu);
        $data['gambar_kayu'] = $this->model_kayu->get_datagambarkayu($id_kayu);
	
		$this->load->view('webkayu/detail_kayu', $data);

    }
}