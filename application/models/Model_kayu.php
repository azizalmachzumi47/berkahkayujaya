<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kayu extends CI_Model
{
    public function get_all_datakayu()
    {
        $this->db->select('*');
        $this->db->from('berkah_kayu');
        $this->db->order_by('id_kayu', 'ASC');
        return $this->db->get()->result();
    }

    public function count_kayu()
    {
        $this->db->from('berkah_kayu');
        return $this->db->count_all_results();
    }

    public function get_all_datagambarkayu()
    {
        $this->db->select('berkah_kayu.*,COUNT(gambar_kayu.id_kayu) as total_gambarkayu');
        $this->db->from('berkah_kayu');
        $this->db->join('gambar_kayu', 'gambar_kayu.id_kayu = berkah_kayu.id_kayu', 'left');
        $this->db->group_by(' berkah_kayu.id_kayu');
        $this->db->order_by('berkah_kayu.id_kayu', 'ASC');
        return $this->db->get()->result();
    }

    public function insert($data)
	{
		$this->db->insert('berkah_kayu', $data);
		return ($this->db->affected_rows() > 0);
	}

    public function get_datakayu($id_kayu)
    {
		$this->db->select('*');
        $this->db->from('berkah_kayu');
        $this->db->where('id_kayu', $id_kayu);
        return $this->db->get()->row();
    }

    public function edit_datakayu($data)
    {
        $this->db->where('id_kayu', $data['id_kayu']);
        if ($this->db->update('berkah_kayu', $data)) {
            return true;
        } else {
            // Log the error message for debugging
            log_message('error', $this->db->error()['message']);
            return false;
        }
    }

    public function get_datagambarkayu($id_kayu)
    {
        $this->db->select('*');
        $this->db->from('gambar_kayu');
        $this->db->where('id_kayu', $id_kayu);
        return $this->db->get()->result();
    }

    function insert_gambarkayu($data)
    {
        $this->db->select('*');
        $this->db->insert('gambar_kayu', $data);
        return ($this->db->affected_rows() > 0);
    }
    
}