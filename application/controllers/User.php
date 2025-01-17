<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_kayu');
        
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My User';
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
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
          
    }

    public function edit_user()
    {
        $data['title'] = 'Edit Profile';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);

        $this->form_validation->set_rules('nama', 'Full Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/edit_user', $data);
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
            // var_dump($upload_image);
            // die;
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/profile/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['login']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/myprofile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('username', $username);
            $this->db->where('email', $email);
            $this->db->update('login');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your profile has been update!</div>');
            redirect('user');
        }
    }
}