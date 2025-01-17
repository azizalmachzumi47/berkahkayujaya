<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_menu');
        $this->load->model('model_pesanankayu');
        $this->load->library('form_validation');

        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);
        
        $data['tblmenu'] = $this->model_menu->get_all_datamenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('target_menu', 'Target Menu', 'required');
        $this->form_validation->set_rules('idtarget_menu', 'ID Target Menu', 'required');
        $this->form_validation->set_rules('icon_menu', 'Icon Menu', 'required');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $this->db->insert('user_menu', [
                'menu' => $this->input->post('menu'),
                'target_menu' => $this->input->post('target_menu'),
                'idtarget_menu' => $this->input->post('idtarget_menu'),
                'icon_menu' => $this->input->post('icon_menu'),
                'date_created' => date('Y-m-d H:i:s')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New menu added!</div>');
            redirect('menu');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Menu';
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id' => $id,
            'menu' => $this->input->post('menu'),
            'target_menu' => $this->input->post('target_menu'),
            'idtarget_menu' => $this->input->post('idtarget_menu'),
            'icon_menu' => $this->input->post('icon_menu'),
            'update_at' => date('Y-m-d H:i:s'),
        );
        $this->model_menu->edit($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            menu edit Success!</div>');
        redirect('menu');
    }

    public function delete($id)
    {
        $data = array('id' => $id);
        $this->model_menu->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            role deleted Success!</div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);

        $data['subMenu'] = $this->model_menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
                'date_created' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function editSubMenu($id)
    {
        $data['title'] = 'Edit Submenu';
        $data['login'] = $this->db->get_where(
            'login',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // Ambil data pesan belum dibaca
        $data['pesanan_masuk'] = $this->model_pesanankayu->get_pesanan_belum_dibaca();
        $data['jumlah_pesanan_belum_dibaca'] = count($data['pesanan_masuk']);

        $data['subMenu'] = $this->model_menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/editSubMenu', $data);
            $this->load->view('templates/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
                'update_at' => date('Y-m-d H:i:s')
            ];
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Sub menu updated!</div>');
            redirect('menu/submenu');
        }
    }

    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Sub menu deleted!</div>');
        redirect('menu/submenu');
    }
}