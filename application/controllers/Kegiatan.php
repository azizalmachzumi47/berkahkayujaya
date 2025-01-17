<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_kegiatan');
		$this->load->model('model_pesanankayu');
        $this->load->library('form_validation');

        is_logged_in();
    }

    public function index() 
    {
        $data['title'] = 'Kegiatan Berkah Kayu Jaya';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

		// Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);
    
        $data['kegiatankayu'] = $this->model_kegiatan->get_all_datakegiatan();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kegiatan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_datakegiatan() 
    {
        $data['title'] = 'Tambah Kegiatan Berkah Kayu Jaya';
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
        $this->load->view('kegiatan/tambah_datakegiatan', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdata_kegiatanaction()
    {
        date_default_timezone_set('Asia/Jakarta');
		$data = [
            'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan'),
            'date_created' => date('Y-m-d H:i:s'),
		];

		$uploads = [];
		$upload_fields = ['upload_kegiatan'];
	
		foreach ($upload_fields as $field) {
			if (!empty($_FILES[$field]['name'])) {
				$uploads[$field] = $this->_do_upload($field);
			}
		}
	
		foreach ($uploads as $field => $filename) {
			$data[$field] = $filename;
		}
		
        $query = $this->model_kegiatan->insert($data);

		if ($query) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			data kegiatan berhasil ditambahkan</div>');

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			data kegiatan gagal ditambahkan</div>');
		}

		redirect('kegiatan');
    }

    private function _do_upload($field)
	{
		$filename = time() . '-' . $_FILES[$field]['name'];

		$config['upload_path'] = './assets/gambarkegiatan/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif|pdf|webp';

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($field)) {
			$this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
		}
		return $this->upload->data('file_name');
	}

    public function edit_kegiatan($id_kegiatan) 
    {
        $data['title'] = 'Edit Data Kayu';
		$data['login'] = $this->db->get_where(
			'login',
			['username' => $this->session->userdata('username')]
		)->row_array();

		// Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);

		$data['kegiatankayu'] =  $this->model_kegiatan->get_datakegiatan($id_kegiatan);
	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('kegiatan/edit_kegiatan', $data);
		$this->load->view('templates/footer');
    }

    public function editkegiatan_action($id_kegiatan)
    {
        date_default_timezone_set('Asia/Jakarta');
		$data = [
			'id_kegiatan' => $id_kegiatan,
            'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan'),
			'update_at' => date('Y-m-d H:i:s'),
		];

		$uploads = [];
		$upload_fields = ['upload_kegiatan'];

		foreach ($upload_fields as $field) {
			if (!empty($_FILES[$field]['name'])) {
				$uploads[$field] = $this->_do_upload($field);
			}
		}

		foreach ($uploads as $field => $filename) {
			$data[$field] = $filename;
		}

		$query = $this->model_kegiatan->edit_datakegiatan($data);
		if ($query) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data kegiatan berhasil diubah</div>');
		} else {
			// Log error message for debugging
			log_message('error', 'Update failed for id_kegiatan: ' . $id_kegiatan);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">data kegiatan gagal diubah</div>');
		}
		redirect('kegiatan');
    }

    public function  delete_kegiatan($id_kegiatan)
    {
        $query = $this->db->get_where('kegiatan_berkahkayu', array('id_kegiatan' => $id_kegiatan));
		$row = $query->row();
		$filename = $row->upload_kegiatan;
		
		// menghapus data dari database
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->delete('kegiatan_berkahkayu');

		if (!empty($filename) && file_exists('./assets/gambarkegiatan/' . $filename)) {
			unlink('./assets/gambarkegiatan/' . $filename);
		}
		
		// mengatur pesan sukses dan redirect ke halaman utama
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data kegiatan dihapus!</div>');
		redirect('kegiatan');
    }
}