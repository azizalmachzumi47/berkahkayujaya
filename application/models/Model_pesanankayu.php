<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pesanankayu extends CI_Model
{
    public function get_all_datapesanankayu()
    {
        $this->db->select('*');
        $this->db->from('pesanan_berkahkayu');
        $this->db->join('berkah_kayu', 'berkah_kayu.id_kayu = pesanan_berkahkayu.id_kayu', 'left');
        $this->db->order_by('pesanan_berkahkayu.id_pesanankayu', 'ASC');
        return $this->db->get()->result();
    }

    public function count_pesanan()
    {
        $this->db->from('pesanan_berkahkayu');
        return $this->db->count_all_results();
    }

    public function get_pesanan_by_id_kayu()
    {
        $this->db->select('
            pesanan_berkahkayu.id_kayu, 
            berkah_kayu.jenis_kayu, 
            COUNT(pesanan_berkahkayu.id_kayu) as jumlah
        ');
        $this->db->from('pesanan_berkahkayu');
        $this->db->join('berkah_kayu', 'berkah_kayu.id_kayu = pesanan_berkahkayu.id_kayu', 'left');
        $this->db->group_by('pesanan_berkahkayu.id_kayu');
        $this->db->order_by('jumlah', 'DESC');
        return $this->db->get()->result();
    }

    public function get_pesanan_belum_dibaca()
    {
        $this->db->select('id_pesanankayu, nama_customer, keterangan, date_created');
        $this->db->from('pesanan_berkahkayu');
        $this->db->where('is_read', 0);
        $this->db->order_by('date_created', 'DESC');
        return $this->db->get()->result();
    }
    
    public function insertpesanan($data)
	{
		$this->db->insert('pesanan_berkahkayu', $data);
		return ($this->db->affected_rows() > 0);
	}

    public function get_datapesanankayu($id_pesanankayu)
    {
		$this->db->select('*');
        $this->db->from('pesanan_berkahkayu');
        $this->db->join('berkah_kayu', 'berkah_kayu.id_kayu = pesanan_berkahkayu.id_kayu', 'left');
        $this->db->order_by('pesanan_berkahkayu.id_pesanankayu', 'ASC');
        $this->db->where('id_pesanankayu', $id_pesanankayu);
        return $this->db->get()->row();
    }

    public function edit_datapesankayu($data)
    {
        $this->db->where('id_pesanankayu', $data['id_pesanankayu']);
        if ($this->db->update('pesanan_berkahkayu', $data)) {
            return true;
        } else {
            // Log the error message for debugging
            log_message('error', $this->db->error()['message']);
            return false;
        }
    }

    public function getKayuById($id_kayu)
    {
        $this->db->select('*');
        $this->db->from('berkah_kayu');
        $this->db->where('id_kayu', $id_kayu);
        return $this->db->get()->row(); // Ambil 1 baris data
    }

    public function updateStokKayu($id_kayu, $stok_baru)
    {
        $this->db->set('stok_kayu', $stok_baru);
        $this->db->where('id_kayu', $id_kayu);
        $this->db->update('berkah_kayu');
        return ($this->db->affected_rows() > 0);
    }

}