<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kegiatan extends CI_Model
{
    public function get_all_datakegiatan()
    {
        $this->db->select('*');
        $this->db->from('kegiatan_berkahkayu');
        $this->db->order_by('id_kegiatan', 'ASC');
        return $this->db->get()->result();
    }

    public function count_kegiatan()
    {
        $this->db->from('kegiatan_berkahkayu');
        return $this->db->count_all_results();
    }

    public function insert($data)
	{
		$this->db->insert('kegiatan_berkahkayu', $data);
		return ($this->db->affected_rows() > 0);
	}

    public function get_datakegiatan($id_kegiatan)
    {
		$this->db->select('*');
        $this->db->from('kegiatan_berkahkayu');
        $this->db->where('id_kegiatan', $id_kegiatan);
        return $this->db->get()->row();
    }

    public function edit_datakegiatan($data)
    {
        $this->db->where('id_kegiatan', $data['id_kegiatan']);
        if ($this->db->update('kegiatan_berkahkayu', $data)) {
            return true;
        } else {
            // Log the error message for debugging
            log_message('error', $this->db->error()['message']);
            return false;
        }
    }
}