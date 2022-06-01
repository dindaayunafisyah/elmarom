<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_produk');
		$this->load->model('M_kontak');
		$this->load->model('M_login');
		$this->load->library('form_validation');
	}

	public function index()
	{
		check_tidak_login(); // hak akses fungsi dihelper
		$data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		$data['total_pesan'] = $this->M_kontak->total_pesan();
		$data['notif'] = $this->M_kontak->get_notif();

		$this->load->view('backend/template/header');		
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/dashboard', $data);
		$this->load->view('backend/template/footer');
	}

	public function profil()
	{
		check_tidak_login(); // hak akses fungsi dihelper
		$data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
		$data['total_pesan'] = $this->M_kontak->total_pesan();
		$data['notif'] = $this->M_kontak->get_notif();

		$this->load->view('backend/template/header');		
		$this->load->view('backend/template/sidebar', $data);
		$this->load->view('backend/profil', $data);
		$this->load->view('backend/template/footer');
	}

	public function editUser()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Silahkan masukkan Nama !'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim', [
			'required' => 'Silahkan masukkan Email !'
		]);

		$id = $this->session->userdata('id');
		$gambar_lama = $this->input->post('gambar_lama');
		$data = [
			'nama' 			=> $this->input->post('nama'),
			'email'			=> $this->input->post('email'),
			'level'		    => $this->input->post('level'),

		];

		if ( $this->form_validation->run() == FALSE){

			$this->session->set_flashdata('error','user');
			redirect('admin/Dashboard/profil');

		}else{

            //cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['gambar']['name'];

			if($upload_image)
			{
				$config['upload_path'] = './backend/imgUser/';
				$config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048'; //2 mega

                $this->load->library('upload', $config);

                if($this->upload->do_upload('gambar'))
                {
                    
                    if($gambar_lama != null)
                    {
                        unlink(FCPATH . 'backend/imgUser/' . $gambar_lama); //FCPATH Front controller
                    }
                        
                    $gambar_baru = $this->upload->data('file_name');
                        
                    $gmbr = $this->db->set('gambar', $gambar_baru);
                }else{
                    $this->session->set_flashdata('error','image');
                }
            }

            $result = $this->M_login->update_user($data, $id);
            $this->session->set_flashdata('success','user');
            redirect('admin/Dashboard/Profil');
        }
    }

    public function ganti_password()
    {

    	$this->form_validation->set_rules('password_lama','Password Lama','required|trim');
    	$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[3]');
    	if($this->form_validation->run() == FALSE)
    	{
    		$this->session->set_flashdata('error','passKosong');
			redirect('admin/Dashboard/profil');

    	}else{
    		$cek_old   = $this->M_login->password_lama();
    		$pass_lama   = $this->input->post('password_lama');
    		$pass_baru = $this->input->post('password_baru'); 
    		if ($cek_old == FALSE) 
    		{
    			$this->session->set_flashdata('error','passLama');
				redirect('admin/Dashboard/profil');
			}else{

			 	if ($pass_lama == $pass_baru)
				{
					$this->session->set_flashdata('error','passSama');
					redirect('admin/Dashboard/profil');

				}else{
				
					$this->M_login->save();
	    			$this->session->set_flashdata('success','password');
	    			redirect('admin/Dashboard/profil');
    			}
    		}
	   	}
	}
}
