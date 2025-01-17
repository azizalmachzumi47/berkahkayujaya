<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambarkayu extends CI_Controller 
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
        $data['title'] = 'Gambar Kayu Jaya';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);
    
        $data['gambarkayu'] = $this->model_kayu->get_all_datagambarkayu();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('gambarkayu/index', $data);
        $this->load->view('templates/footer');
    }

    public function add_gambarkayu($id_kayu)
    {
        $data['title'] = 'Tambah Gambar Kayu';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);

        $data['kayu'] =  $this->model_kayu->get_datakayu($id_kayu);
        $data['gambar_kayu'] = $this->model_kayu->get_datagambarkayu($id_kayu);

        $this->form_validation->set_rules('id_kayu', 'ID Kayu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('gambarkayu/add_gambarkayu', $data);
            $this->load->view('templates/footer');
        } else {
            
            $data = [
                'id_kayu' => $this->input->post('id_kayu'),
                'date_created' => date('Y-m-d H:i:s'),
            ];

            $uploads = [];
            $upload_fields = ['gambar_berkahkayu'];
        
            foreach ($upload_fields as $field) {
                if (!empty($_FILES[$field]['name'])) {
                    $uploads[$field] = $this->_do_uploadgambarkayu($field);
                }
            }
        
            foreach ($uploads as $field => $filename) {
                $data[$field] = $filename;
            }

            $query = $this->model_kayu->insert_gambarkayu($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Gambar Kayu berhasil di tambah!</div>');
            redirect('gambarkayu/add_gambarkayu/' . $id_kayu);
        }
    }

    private function _do_uploadgambarkayu($field)
	{
		$filename = time() . '-' . $_FILES[$field]['name'];

		$config['upload_path'] = './assets/gambarkayu/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
        $config['max_size'] = 51200;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($field)) {
			$this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
			// redirect('informasi');
		}
		return $this->upload->data('file_name');
	}

    public function delete_gambarkayu($id_kayu, $id_gambarkayu)
    {
        // Validasi apakah data ada di database
        $query = $this->db->get_where('gambar_kayu', ['id_gambarkayu' => $id_gambarkayu]);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $filename = $row->gambar_berkahkayu; // Sesuaikan nama field
    
            // Hapus data dari database
            $this->db->where('id_gambarkayu', $id_gambarkayu);
            $this->db->delete('gambar_kayu');
    
            // Hapus file dari folder jika ada
            $filepath = './assets/gambarkayu/' . $filename;
            if (!empty($filename) && file_exists($filepath)) {
                unlink($filepath);
            }
    
            // Set pesan sukses
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success" role="alert">Gambar Kayu Berhasil Dihapus!</div>');
        } else {
            // Set pesan error jika data tidak ditemukan
            $this->session->set_flashdata('message', 
                '<div class="alert alert-danger" role="alert">Gambar Kayu Tidak Ditemukan!</div>');
        }
    
        // Redirect ke halaman sebelumnya
        redirect('gambarkayu/add_gambarkayu/' . $id_kayu);
    }
}