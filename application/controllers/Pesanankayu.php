<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanankayu extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_kayu');
        $this->load->model('model_pesanankayu');
        $this->load->library('form_validation');

        is_logged_in();
    }

    public function index() 
    {
        $data['title'] = 'Pesanan Kayu';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);
    
        $data['pesanan'] = $this->model_pesanankayu->get_all_datapesanankayu();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pesanankayu/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_datapesanankayu() 
    {
        $data['title'] = 'Tambah Data Pesanan Kayu';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);
    
        $data['kayujaya'] = $this->model_kayu->get_all_datakayu();
        $data['pesanankayu'] = $this->model_pesanankayu->get_all_datapesanankayu();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pesanankayu/tambah_datapesanankayu', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdata_pesanankayuaction()
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
    
        redirect('pesanankayu');
    }    

    public function editpesanan_kayu($id_pesanankayu)
    {
        // Update field 'is_read' menjadi 1
        $this->db->set('is_read', 1);
        $this->db->where('id_pesanankayu', $id_pesanankayu);
        $this->db->update('pesanan_berkahkayu');
    
        // Ambil data lainnya untuk halaman edit
        $data['title'] = 'Edit Data Pesanan Huruf Timbul';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);
    
        $data['kayujaya'] = $this->model_kayu->get_all_datakayu();
        $data['pesanankayu'] = $this->model_pesanankayu->get_datapesanankayu($id_pesanankayu);
    
        // Memuat tampilan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pesanankayu/editpesanan_kayu', $data);
        $this->load->view('templates/footer');
    }
    
    public function edit_actionpesanankayu($id_pesanankayu) 
    {
        date_default_timezone_set('Asia/Jakarta');
    
        // Ambil nilai total harga dari input form dan pastikan dalam format integer
        $total_harga = $this->input->post('total_harga');
        
        // Periksa apakah total_harga bukan null atau kosong setelah dikonversi
        if (!empty($total_harga)) {
            // Bersihkan format Rupiah dan konversi menjadi integer
            $total_harga = intval(preg_replace("/[^0-9]/", "", $total_harga));
        } else {
            $total_harga = 0; // Atur default menjadi 0 jika nilai tidak valid
        }
    
        $data = [
            'id_pesanankayu' => $id_pesanankayu,
            'id_kayu' => $this->input->post('id_kayu'),
            'nama_customer' => $this->input->post('nama_customer'),
            'tanggal_pesankayu' => $this->input->post('tanggal_pesankayu'),
            'jumlah' => $this->input->post('jumlah'),
            'total_harga' => $total_harga, // Pastikan menyimpan sebagai integer
            'keterangan' => $this->input->post('keterangan'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat_pesanan' => $this->input->post('alamat_pesanan'),
            'is_read' => $this->input->post('is_read'),
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
                $query = $this->model_pesanankayu->edit_datapesankayu($data);
                if ($query) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pesanan kayu berhasil diedit</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pesanan kayu gagal diedit</div>');
                }
            } else {
                // Stok tidak mencukupi
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Stok kayu tidak mencukupi untuk jumlah pesanan!</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kayu dengan ID tersebut tidak ditemukan!</div>');
        }
    
        redirect('pesanankayu');
    }

    public function delete_pesanankayu($id_pesanankayu)
    {
        $query = $this->db->get_where('pesanan_berkahkayu', array('id_pesanankayu' => $id_pesanankayu));
		$row = $query->row();
        
		// menghapus data dari database
		$this->db->where('id_pesanankayu', $id_pesanankayu);
		$this->db->delete('pesanan_berkahkayu');
	
		// mengatur pesan sukses dan redirect ke halaman utama
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">pesanan kayu dihapus!</div>');
		redirect('pesanankayu');
    }
    
}