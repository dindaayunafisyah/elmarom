<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_produk');
		$this->load->model('M_kontak');
		$this->load->model('M_Testimoni');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['produk'] = $this->M_produk->tampil_data()->result();
		$data['portofolio'] = $this->M_produk->portofolio()->result();
		$data['testi'] = $this->M_Testimoni->tampiltesti()->result();

		$this->load->view('frontend/template/header');		
		$this->load->view('frontend/dashboard', $data);
		$this->load->view('frontend/template/footer');
	}

	public function testimoni()
	{

		$this->load->view('frontend/template/header');		
		$this->load->view('frontend/testimoni');
		
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', [
			'keterangan' => '<p><i>*Nama tidak boleh kosong !</i></p>'
		]);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
			'keterangan' => '<p><i>*Keterangan tidak boleh kosong !</i></p>'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('gagal', 'gagal');
			redirect('/#testimoni');
			
		}else{
			$nama =$this->input->post('nama');
			$ket = $this->input->post('keterangan');
			$insert = $this->M_Testimoni->tambah_testimoni($nama, $ket);
			$this->session->set_flashdata('testimoni', 'success');
			redirect('/#testimoni');
			
		}
	}


	public function kontak()
	{
		$this->form_validation->set_rules('nama', '', 'required', [
			'required' => '<span class="validation" style="display:block;"><i>*Nama tidak boleh kosong !</i></span>'
		]);
		$this->form_validation->set_rules('email', '', 'required', [
			'required' => '<span class="validation" style="display:block;"><i>*Email tidak boleh kosong !</i></span>'
		]);
		$this->form_validation->set_rules('subject', '', 'required', [
			'required' => '<span class="validation" style="display:block;"><i>*Subject tidak boleh kosong !</i></span>'
		]);
		$this->form_validation->set_rules('message', '', 'required', [
			'required' => '<span class="validation" style="display:block;"><i>*Message tidak boleh kosong !</i></span>'
		]);

		if ($this->form_validation->run() == TRUE)
		{
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			$this->M_kontak->insert($nama, $email, $subject, $message);
			$this->session->set_flashdata('kontak', 'success');
			redirect('/#contact');

		}else{

			$this->session->set_flashdata('kontak', 'gagal');
			redirect('/#contact');
		}

	}
}
