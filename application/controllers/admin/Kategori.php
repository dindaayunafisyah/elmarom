<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_produk');
		$this->load->model('M_kontak');
		$this->load->library('form_validation');

	}

	public function index()
	{
		check_tidak_login(); // hak akses fungsi dihelper
		$data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		$data['kategori'] 	= $this->M_produk->kategori()->result();
		$data['total_pesan'] = $this->M_kontak->total_pesan();
		$data['notif'] = $this->M_kontak->get_notif();

		$this->load->view('backend/template/header');		
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/kategori', $data);
		$this->load->view('backend/template/footer');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('kategori', 'Kategori', 'required', [
			'kategori' => '<p><i>*Kategori tidak boleh kosong !</i></p>'
		]);

		if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('gagal', 'gagal');
			redirect(base_url('admin/Kategori'));
		}else{

			$kat =$this->input->post('kategori');
			$insert = $this->M_produk->tambah_kategori($kat);
			$this->session->set_flashdata('kat', 'success');
			redirect(base_url('admin/Kategori'));
		}
	}

	public function edit()
	{
		$kode = $this->input->post('id');
		$kat = $this->input->post('kategori');

		$insert = $this->M_produk->edit_kategori($kode, $kat);
		$this->session->set_flashdata('kat', 'edit');
		redirect(base_url('admin/Kategori'));
	}

	public function hapus()
	{
		$kode = $this->input->post('id');
		$gambar = $this->db->get_where('produk', array('id_kategori' => $kode));
        foreach ($gambar->result_array() as $g) {

        	$path = './backend/img/' . $g['gambar1'];
        	unlink($path);
        	$path = './backend/img/' . $g['gambar2'];
        	unlink($path);
        	$path = './backend/img/' . $g['gambar3'];
        	unlink($path);
        	$path = './backend/img/' . $g['gambar4'];
        	unlink($path);
        	$path = './backend/img/' . $g['gambar5'];
        	unlink($path);
        }

		$hapus = $this->M_produk->hapus_kategori($kode);
		$this->session->set_flashdata('kat', 'hapus');
		redirect(base_url('admin/Kategori'));
	}
}
