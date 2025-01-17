<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_menu extends CI_Model
{
    public function get_all_datamenu()
    {
        $this->db->select('*');
        $this->db->from('user_menu');
        $this->db->order_by('id', 'ASC');
        return $this->db->get()->result();
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('user_menu', $data);
    }

    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('user_menu', $data);
    }

    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        $this->db->order_by('id', 'ASC');
        return $this->db->query($query)->result_array();
    }

    public function editSubMenu($id)
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                    WHERE `user_sub_menu`.`id` = $id
                ";
        return $this->db->query($query)->row_array();
    }

    public function updateSubMenu($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('user_sub_menu', $data);
    }

    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }
}