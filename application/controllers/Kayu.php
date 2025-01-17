<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kayu extends CI_Controller 
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
        $data['title'] = 'Kayu Jaya';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();
    
		// Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);
		
        $data['kayujaya'] = $this->model_kayu->get_all_datakayu();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kayu/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_datakayu()
    {
        $data['title'] = 'Tambah Data Kayu';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

		// Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kayu/tambah_datakayu', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdata_kayuaction()
    {
        date_default_timezone_set('Asia/Jakarta');
		$data = [
            'jenis_kayu' => $this->input->post('jenis_kayu'),
            'lebar_kayu' => $this->input->post('lebar_kayu'),
            'tinggi_kayu' => $this->input->post('tinggi_kayu'),
            'harga_kayu' => $this->input->post('harga_kayu'),
            'stok_kayu' => $this->input->post('stok_kayu'),
            'keterangan_kayu' => $this->input->post('keterangan_kayu'),
            'date_created' => date('Y-m-d H:i:s'),
		];

		$uploads = [];
		$upload_fields = ['foto_kayu'];
	
		foreach ($upload_fields as $field) {
			if (!empty($_FILES[$field]['name'])) {
				$uploads[$field] = $this->_do_upload($field);
			}
		}
	
		foreach ($uploads as $field => $filename) {
			$data[$field] = $filename;
		}
		
        $query = $this->model_kayu->insert($data);

		if ($query) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			data kayu berhasil ditambahkan</div>');

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			data kayu gagal ditambahkan</div>');
		}

		redirect('kayu');
    }

    private function _do_upload($field)
	{
		$filename = time() . '-' . $_FILES[$field]['name'];

		$config['upload_path'] = './assets/gambarkayu/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif|pdf';

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($field)) {
			$this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
		}
		return $this->upload->data('file_name');
	}

    public function edit_kayu($id_kayu) 
    {
        $data['title'] = 'Edit Data Kayu';
		$data['login'] = $this->db->get_where(
			'login',
			['username' => $this->session->userdata('username')]
		)->row_array();

		// Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);

		$data['kayujaya'] =  $this->model_kayu->get_datakayu($id_kayu);
	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('kayu/edit_kayu', $data);
		$this->load->view('templates/footer');
    }

    public function editkayu_action($id_kayu)
    {
        date_default_timezone_set('Asia/Jakarta');
		$data = [
			'id_kayu' => $id_kayu,
			'jenis_kayu' => $this->input->post('jenis_kayu'),
            'lebar_kayu' => $this->input->post('lebar_kayu'),
            'tinggi_kayu' => $this->input->post('tinggi_kayu'),
            'harga_kayu' => $this->input->post('harga_kayu'),
			'stok_kayu' => $this->input->post('stok_kayu'),
            'keterangan_kayu' => $this->input->post('keterangan_kayu'),
			'update_at' => date('Y-m-d H:i:s'),
		];

		$uploads = [];
		$upload_fields = ['foto_kayu'];

		foreach ($upload_fields as $field) {
			if (!empty($_FILES[$field]['name'])) {
				$uploads[$field] = $this->_do_upload($field);
			}
		}

		foreach ($uploads as $field => $filename) {
			$data[$field] = $filename;
		}

		$query = $this->model_kayu->edit_datakayu($data);
		if ($query) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data kayu berhasil diubah</div>');
		} else {
			// Log error message for debugging
			log_message('error', 'Update failed for id_kayu: ' . $id_kayu);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">data kayu gagal diubah</div>');
		}
		redirect('kayu');
    }

    public function  delete_kayu($id_kayu)
    {
        $query = $this->db->get_where('berkah_kayu', array('id_kayu' => $id_kayu));
		$row = $query->row();
		$filename = $row->upload_gambar;
		
		// menghapus data dari database
		$this->db->where('id_kayu', $id_kayu);
		$this->db->delete('berkah_kayu');

		if (!empty($filename) && file_exists('./assets/gambarkayu/' . $filename)) {
			unlink('./assets/gambarkayu/' . $filename);
		}
		
		// mengatur pesan sukses dan redirect ke halaman utama
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data kayu dihapus!</div>');
		redirect('kayu');
    }
}