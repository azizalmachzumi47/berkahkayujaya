<?php

function is_logged_in()
{
    $ci = get_instance();
    
    // Cek apakah username ada dalam session
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        // Ambil data menu berdasarkan URI
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        // Cek akses pengguna ke menu
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }

        // Cek token pengguna yang ada di database
        $username = $ci->session->userdata('username');
        $userToken = $ci->db->get_where('login', ['username' => $username])->row_array();

        if (empty($userToken) || !$userToken['token'] || !is_token_valid($userToken['token'])) {
            redirect('auth');
        }
    }
}

function is_token_valid($token)
{
    return true;
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}