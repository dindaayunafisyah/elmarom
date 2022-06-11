<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Testimoni');
		$this->load->library('form_validation');

	}

	public function index()
	{
		check_tidak_login(); // hak akses fungsi dihelper
		$datas['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		$data['testimoni'] = $this->M_Testimoni->testimoni()->result();

		$this->load->view('backend/template/header');		
		$this->load->view('backend/template/sidebar', $datas);
		$this->load->view('backend/testimoni', $data);
		$this->load->view('backend/template/footer');
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
			redirect(base_url('admin/Testimoni'));
		}else{
			$nama =$this->input->post('nama');
			$ket = $this->input->post('keterangan');
			$insert = $this->M_Testimoni->tambah_testimoni($nama, $ket);
			$this->session->set_flashdata('testimoni', 'success');
			redirect(base_url('admin/Testimoni'));
		}
	}

	public function edit()
	{
		$nama = $this->input->post('nama');
		$ket = $this->input->post('keterangan');

		$insert = $this->M_Testimoni->edit_testimoni($nama, $ket);
		$this->session->set_flashdata('ket', 'edit');
		redirect(base_url('admin/Testimoni'));
	}

	// public function hapus()
	// {
	// 	$nama = $this->input->post('nama', TRUE);
	// 	$where = array(
    //         'nama' => $nama
    //     );
	// 	$this->M_Testimoni->hapus($where, 'testimoni');
	// 	redirect('admin/Testimoni');
	// }

	public function hapus($id_testimoni)
	{
		$id_testimoni= array('id_testimoni' => $id_testimoni);
		$hapus = $this->M_Testimoni->hapus_testimoni($id_testimoni);
		$this->session->set_flashdata('kat', 'hapus');
		redirect(base_url('admin/Testimoni'));
	}
}
