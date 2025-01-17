<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_administrator extends CI_Model
{
    public function get_all_dataadminstrator()
    {
        $this->db->select('*');
        $this->db->from('login_role');
        $this->db->order_by('id', 'ASC');
        return $this->db->get()->result();
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('login_role', $data);
    }

    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('login_role', $data);
    }

    public function get_all_users()
    {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->order_by('id', 'asec');
        return $this->db->get()->result();
    }

    public function get_all_data_users()
    {
		$this->db->select('*');
        $this->db->from('login');
        $this->db->join('login_role', 'login_role.id = login.id', 'left');
        $this->db->order_by('login.id', 'desc');
        return $this->db->get()->result();
    }

    public function get_datausers($id)
    {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function get_loginusers_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('login');
		return $query->row();
	}

    public function edit_users($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('login', $data);
		return ($this->db->affected_rows() > 0);
	}
}