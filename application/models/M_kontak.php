<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kontak extends CI_Model 
{

	function insert($nama, $email, $subject, $message)
	{
       $data = array(
            'nama'   	=> $nama,
            'email'    	=> $email,
            'subject'   => $subject,
            'message'   => $message,
            'status'   => 1,      
        );
        
        $result = $this->db->insert('kontak', $data);
        return $result;

	}

	function total_pesan()
	{
		$this->db->where('status', 1);
		$query = $this->db->count_all_results('kontak');
		return $query;
	}

	function get_notif()
	{
		$this->db->select('*');
		$this->db->from('kontak');
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->result();
	}

	function get_message()
	{
		$this->db->select('*');
		$this->db->from('kontak');
		$query = $this->db->get();
		return $query->result();
	}

	function sudah_dibaca($kode, $data)
	{
		$this->db->where('id', $kode);
        $result = $this->db->update('kontak', $data);
        return $result;
	}
}