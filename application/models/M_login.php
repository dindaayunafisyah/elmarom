<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	
	function login($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $post['email']);
		$this->db->where('password', sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}

	function forgot ()
	{
		$this->db->select('*');
		$this->db->from('user_token');
		$this->db->join('user', 'user.email = user_token.email');
		$query = $this->db->get();
		return $query;
	}

	function change_password($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function update_user($data, $id)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('user', $data);
	}

	//fungsi untuk mengecek password lama 
	public function password_lama()
	{
		$old = sha1($this->input->post('password_lama'));    
		$this->db->where('password',$old);
		$query = $this->db->get('user');
		return $query->result();
	}

	public function save()
	{
		$pass = sha1($this->input->post('password_baru'));
		$data = array (
			'password' => $pass
		);
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('user', $data);
	}
}