<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_administrator');
        $this->load->model('model_pesanankayu');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Administrator';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);

        $data['allusers'] = $this->model_administrator->get_all_users();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('administrator/index', $data);
        $this->load->view('templates/footer');
          
    }

    public function edit_user($id)
	{
		$data['title'] = 'Edit User';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);
		
		$data['roleuser'] =  $this->model_administrator->get_all_data_users();
        $data['allusers'] =  $this->model_administrator->get_datausers($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('administrator/edit_user', $data);
        $this->load->view('templates/footer');
	}

    public function edit_actionuser($id)
    {
        $allusers = $this->model_administrator->get_loginusers_by_id($id);
		date_default_timezone_set('Asia/Jakarta');
		$data = [
			'id' => $id,
			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'role_id' => $this->input->post('role_id'),
			'is_active' => $this->input->post('is_active'),
			'update_at' => date('Y-m-d H:i:s'),
		];
	
		$password = $this->input->post('password');
		$old_password = $this->input->post('old_password');
	
		if (!empty($password)) {
			$data['password'] = password_hash($password, PASSWORD_DEFAULT);
		} elseif (!empty($old_password) && password_verify($old_password, $allusers->password)) {
			// jika password kosong, tetapi old_password tidak kosong dan cocok dengan password lama
			$data['password'] = $allusers->password;
		}

		$uploads = [];
		$upload_fields = ['image'];
			
		foreach ($upload_fields as $field) {
			if (!empty($_FILES[$field]['name'])) {
				$uploads[$field] = $this->_do_upload($field);
			}
		}
			
		// Menambahkan data file yang diunggah ke dalam $data
		foreach ($uploads as $field => $filename) {
			$data[$field] = $filename;
		}

		$query = $this->model_administrator->edit_users($data);
        if ($query) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			data user berhasil diubah</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			data user gagal diubah</div>');
        }
        redirect('administrator/index');
    }

    private function _do_upload($field)
	{
		$filename = time() . '-' . $_FILES[$field]['name'];

		$config['upload_path'] = './assets/profile/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif|pdf|xlsx|xls|doc|docx'; // Sesuaikan dengan jenis file yang diperbolehkan
		$config['file_name'] = $filename;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($field)) {
			$this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
			// redirect('monitoring');
		}
		return $this->upload->data('file_name');
	}

    public function role()
    {
        $data['title'] = 'Role';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);

        $data['loginrole'] = $this->model_administrator->get_all_dataadminstrator();
        $data['role'] = $this->db->get('login_role')->result_array();
        
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('administrator/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('login_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New role added!</div>');
            redirect('administrator/role');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Role';

        $data = array(
            'id' => $id,
            'role' => $this->input->post('role'),
        );
        $this->model_administrator->edit($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            role edit Success!</div>');
        redirect('administrator/role');
    }

    public function delete($id)
    {
        $data = array('id' => $id);
        $this->model_administrator->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            menu deleted Success!</div>');
        redirect('administrator/role');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);
        
        $data['role'] = $this->db->get_where('login_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['loginrole'] = $this->model_administrator->get_all_dataadminstrator();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('administrator/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access Changed!</div>');
    }
}