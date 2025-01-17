<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_apikayu extends CI_Model
{
    protected $table = 'berkah_kayu';

    public function get_all()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id_kayu' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_kayu', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_kayu', $id)->delete($this->table);
    }
}