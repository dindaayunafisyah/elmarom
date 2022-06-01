<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kontak');
	}

	public function index()
	{
		check_tidak_login(); // hak akses fungsi dihelper
		$data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		$data['total_pesan'] = $this->M_kontak->total_pesan();
		$data['notif'] = $this->M_kontak->get_notif();
		$data['message'] = $this->M_kontak->get_message();

		$this->load->view('backend/template/header');		
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/kontak', $data);
		$this->load->view('backend/template/footer');
	}

	public function sudah_dibaca()
	{
		$kode = $this->input->post('id');
		$data = array(
			'status' => 0
		);

		$this->M_kontak->sudah_dibaca($kode, $data);
		$this->session->set_flashdata('dibaca', 'success');
		redirect('admin/Kontak');
	}

	public function hapus_pesan()
	{
		$kode = $this->input->post('id');

		$this->db->where('id', $kode);
		$this->db->delete('kontak');
		$this->session->set_flashdata('hapus_pesan', 'success');
		redirect('admin/Kontak');
	}

}
