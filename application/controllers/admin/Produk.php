<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('M_produk');
		$this->load->model('M_kontak');
		$this->load->library('form_validation');

	}

	public function index()
	{
		check_tidak_login(); // hak akses fungsi dihelper
		$data['user'] 		= $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		$data['kategori'] 	= $this->M_produk->kategori()->result();
		$data['produk'] 	= $this->M_produk->tampil_data()->result();
		$data['joinproduk'] = $this->M_produk->joinproduk();
		$data['total_pesan'] = $this->M_kontak->total_pesan();
		$data['notif'] = $this->M_kontak->get_notif(); 

		$this->load->view('backend/template/header');		
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/produk');
		$this->load->view('backend/template/footer');
	}

	public function page_tambah()
	{
		$data = array();

		$this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => '<span class="text-danger"><i>*Nama tidak boleh kosong !</i></span>'
		]);
		$this->form_validation->set_rules('harga', 'Harga', 'required', [
			'required' => '<span class="text-danger"><i>*Harga tidak boleh kosong !</i></span>'
		]);
		$this->form_validation->set_rules('berat', 'Berat', 'required', [
			'required' => '<span class="text-danger"><i>*Berat tidak boleh kosong !</i></span>'
		]);
		$this->form_validation->set_rules('isi', 'Deskripsi', 'required', [
			'required' => '<span class="text-danger"><i>*Deskripsi tidak boleh kosong !</i></span>'
		]);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|callback_check_default',[
			'required' => '<span class="text-danger"><i>*Kategori tidak boleh kosong !</i></span>'
		]);

		if ($this->form_validation->run() == TRUE)
		{

			$dataInfo = array();

	        $countfiles = count($_FILES['gambar']['name']);
	  
	        for($i=0;$i < $countfiles;$i++){
	            if(!empty($_FILES['gambar']['name'][$i])){

	            	// Define new $_FILES array - $_FILES['file']
	            	$_FILES['file']['name'] 	= $_FILES['gambar']['name'][$i];
	            	$_FILES['file']['type'] 	= $_FILES['gambar']['type'][$i];
	            	$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
	            	$_FILES['file']['error'] 	= $_FILES['gambar']['error'][$i];
	            	$_FILES['file']['size'] 	= $_FILES['gambar']['size'][$i];

		            // Set preference
		            $config['upload_path'] 		= './backend/img/'; //path folder
		            $config['allowed_types'] 	= 'jpg|jpeg|png|gif';
		            $config['max_size'] 		= '5000'; // max_size in kb
		            $config['file_name'] 		= $_FILES['gambar']['name'][$i];

	            	$this->upload->initialize($config);
	  
	                if($this->upload->do_upload('file')){
	                    $data = array('upload_data' => $this->upload->data());
	                    $dataInfo[] = $this->upload->data();
	                    //Compress Image
	                    $config['image_library']	='gd2';
	                    $config['source_image']		='./backend/img/' . $data['upload_data']['file_name'];
	                    $config['maintain_ratio']	= FALSE;
	                    $config['width']         	= 800;
	                    $config['height']       	= 500;
	                   	// $config['new_image']= './backend/img/thumb/' . $data['upload_data']['file_name'];
	                    $this->load->library('image_lib');
	                    $this->image_lib->initialize($config);
	                    $this->image_lib->resize();
	                  	$this->image_lib->clear();

	                }else{

	                	$data['select'] 	= $this->input->post('kategori');
	                	$data['kategori'] 	= $this->M_produk->kategori()->result();
	                	$data['error'] 		= '<span class="text-danger"><i>*File harus format jpg/jpeg/png/gif !</i></span><br><span class="text-danger"><i>*Min ukuran gambar 1000 x 500 !</i></span>';
	                	$data['user'] 		= $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
	                	$data['total_pesan'] = $this->M_kontak->total_pesan();
						$data['notif'] = $this->M_kontak->get_notif(); 

	                	$this->load->view('backend/template/header');		
	                	$this->load->view('backend/template/sidebar', $data);
	                	$this->load->view('backend/tambah_produk', $data);
	                	$this->load->view('backend/template/footer');
	                }
	            }else{

	            	$data['select'] 	= $this->input->post('kategori');
	            	$data['kategori'] 	= $this->M_produk->kategori()->result();
	            	$data['error'] 		= '<span class="text-danger"><i>*Gambar tidak boleh kosong !</i></span>';
	            	$data['user'] 		= $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
	            	$data['total_pesan'] = $this->M_kontak->total_pesan();
					$data['notif'] = $this->M_kontak->get_notif(); 

	            	$this->load->view('backend/template/header');		
	            	$this->load->view('backend/template/sidebar');
	            	$this->load->view('backend/tambah_produk', $data);
	            	$this->load->view('backend/template/footer');
	            }
	        }

	        if(!empty($dataInfo))
	        {
	        	
				$judul 		= $this->input->post('nama');
				$isi 		= $this->input->post('isi');
				$berat 		= $this->input->post('berat');
				$harga 		= $this->input->post('harga');
		        $kategori 	= $this->input->post('kategori');

				$this->M_produk->add_produk($judul, $isi, $berat, $harga, $kategori, $dataInfo);
				$this->session->set_flashdata('msg','success');
				redirect(base_url('admin/Produk'));
			}
		
		}else{
			$data['user'] 			= $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
			$data['select'] 		= $this->input->post('kategori');
			$data['kategori'] 		= $this->M_produk->kategori()->result();
			$data['total_pesan'] 	= $this->M_kontak->total_pesan();
			$data['notif'] 			= $this->M_kontak->get_notif(); 

			$this->load->view('backend/template/header');		
			$this->load->view('backend/template/sidebar', $data);
			$this->load->view('backend/tambah_produk', $data);
			$this->load->view('backend/template/footer');
		}
	}

	function page_edit($error = null, $kode = null)
    {

        $id = $this->uri->segment(4);
        $data['total_pesan'] = $this->M_kontak->total_pesan();
        $data['editproduk'] = $this->M_produk->edit_get($id);
        $data['user'] 		= $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        
 		if ($this->session->flashdata('err') != null) {
 			$data['error'] = $this->session->flashdata('err');
 		}
 		
 		$data['kategori'] 	= $this->M_produk->kategori()->result();

        $this->load->view('backend/template/header');		
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/edit_produk', $data);
        $this->load->view('backend/template/footer');
    }

    public function proses_edit()
	{
		$data = array();

		$this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => '<span class="text-danger"><i>*Nama tidak boleh kosong !</i></span>'
		]);
		$this->form_validation->set_rules('harga', 'Harga', 'required', [
			'required' => '<span class="text-danger"><i>*Harga tidak boleh kosong !</i></span>'
		]);
		$this->form_validation->set_rules('berat', 'Berat', 'required', [
			'required' => '<span class="text-danger"><i>*Berat tidak boleh kosong !</i></span>'
		]);
		$this->form_validation->set_rules('isi', 'Deskripsi', 'required', [
			'required' => '<span class="text-danger"><i>*Deskripsi tidak boleh kosong !</i></span>'
		]);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|callback_check_default',[
			'required' => '<span class="text-danger"><i>*Kategori tidak boleh kosong !</i></span>'
		]);

		if($this->form_validation->run() == TRUE)
		{
			$kode = $this->input->post('id_produk');
			$gambar = $this->db->get_where('produk', array('id_produk' => $kode));
			foreach ($gambar->result_array() as $g) {

			$dataInfo = array();

	        $countfiles = count($_FILES['gambar']['name']);
	  
	        for($i=0;$i < $countfiles;$i++){
	            if(!empty($_FILES['gambar']['name'][$i])){

		            // Define new $_FILES array - $_FILES['file']
		            $_FILES['file']['name'] = $_FILES['gambar']['name'][$i];
		            $_FILES['file']['type'] = $_FILES['gambar']['type'][$i];
		            $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
		            $_FILES['file']['error'] = $_FILES['gambar']['error'][$i];
		            $_FILES['file']['size'] = $_FILES['gambar']['size'][$i];
		 
		            // Set preference
		            $config['upload_path'] = './backend/img/'; //path folder
		            $config['allowed_types'] = 'jpg|jpeg|png|gif';
		            $config['max_size'] = '5000'; // max_size in kb
		            $config['file_name'] = $_FILES['gambar']['name'][$i];

	            	$this->upload->initialize($config);
	  
	                if($this->upload->do_upload('file')){
	                    $data = array('upload_data' => $this->upload->data());
	                    $dataInfo[] = $this->upload->data();
	                    //Compress Image
	                    $config['image_library']	='gd2';
	                    $config['source_image']		='./backend/img/' . $data['upload_data']['file_name'];
	                    $config['maintain_ratio']	= FALSE;
	                    $config['width']         	= 800;
	                    $config['height']       	= 500;
	                   // $config['new_image']= './backend/img/thumb/' . $data['upload_data']['file_name'];
	                    $this->load->library('image_lib');
	                    $this->image_lib->initialize($config);
	                    $this->image_lib->resize();
	                  	$this->image_lib->clear();
	                   
	                }
	                else{

	                	$kode = $this->input->post('id_produk');
	                	$this->session->set_flashdata('err', '<span class="text-danger"><i>*File harus format jpg/jpeg/png/gif !</i></span>');
	    				redirect(base_url('admin/Produk/page_edit/' . $kode));
	                }
	            }
	            else{
						$kode = $this->input->post('id_produk');
	                	$this->session->set_flashdata('err', '<span class="text-danger"><i>*Gambar tidak boleh kosong !</i></span>');
	    				redirect(base_url('admin/Produk/page_edit/' . $kode));
	            	}
	        	}

		        if(!empty($dataInfo))
		        {
		        	unlink('./backend/img/' . $g['gambar1']);
		        	unlink('./backend/img/' . $g['gambar2']);
		        	unlink('./backend/img/' . $g['gambar3']);
		        	unlink('./backend/img/' . $g['gambar4']);
		        	unlink('./backend/img/' . $g['gambar5']);

		        	$id = $this->input->post('id_produk');
		        	$judul = $this->input->post('nama');
		        	$isi = $this->input->post('isi');
		        	$berat = $this->input->post('berat');
		        	$harga = $this->input->post('harga');
		        	$kategori = $this->input->post('kategori');

		        	$this->M_produk->edit_produk($id, $judul, $isi, $berat, $harga, $kategori, $dataInfo);
					$this->session->set_flashdata('msg','diedit');
		        	redirect(base_url('admin/Produk'));
	        	}
	    	}
		}else{
			
			$this->session->set_flashdata('gagal', 'gagal');
			redirect(base_url('admin/Produk'));
		}
	}

	public function hapus_produk()
	{
		$id = $this->input->post('id');
		$gambar = $this->db->get_where('produk', array('id_produk' => $id));
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

        $this->M_produk->hapus($id);
        $this->session->set_flashdata('msg','dihapus');
        redirect(base_url('admin/Produk'));
	}

	function check_default($post_string)
    {
      return $post_string == '0' ? FALSE : TRUE;
    }

   

}
