<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_produk');
		$this->load->library('pagination');
	}

	public function index()
	{

	  	$config['base_url'] = site_url('Produk/index/'); //site url
        $config['total_rows'] = $this->M_produk->pagination(); //total row
        $config['per_page'] = 2;  //show record per halaman
        $config['num_links'] = 1;

        //config pagination ada difolder config

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);

        $data['produk'] = $this->M_produk->getproduk($config["per_page"], $data['start']);   
        $data['produk_terbaru'] = $this->M_produk->produk_terbaru();
        $data['kategori']   = $this->M_produk->kategori()->result();

		$this->load->view('frontend/template/header');		
		$this->load->view('frontend/Produk', $data);
		$this->load->view('frontend/template/footer');
	}

	public function Produk_detail()
	{
		$kode = $this->uri->segment(3);
		$data['produk'] = $this->M_produk->detail_produk($kode);
		$data['produk_terbaru'] = $this->M_produk->produk_terbaru();
		$data['kategori'] 	= $this->M_produk->kategori()->result();

		$this->load->view('frontend/template/header');		
		$this->load->view('frontend/Produk_detail', $data);
		$this->load->view('frontend/template/footer');
	}

	public function filter_per_kategori($id_kategori, $kategori)
	{

        //mengambil nilai segmen 5 sebagai offset
        $dari      = $this->uri->segment(5);

        //limit data yang ditampilkan
        $sampai = 1;

        //hitung jumlah row
        $jumlah= $this->M_produk->pagination_filter_kategori($id_kategori);

        //inisialisasi array
        $config = array();

        //set base_url untuk setiap link page
        $config['base_url'] = base_url().'Produk/filter_per_kategori/'.$id_kategori . '/' . $kategori;
        $config['total_rows'] = $jumlah;
        $config['per_page'] = $sampai;
        $config['num_links'] = $jumlah;

        $this->pagination->initialize($config);

		$data['joinproduk'] = $this->M_produk->filter_kategori($sampai, $dari, $id_kategori);
        $data['produk_terbaru'] = $this->M_produk->produk_terbaru();
		$data['kategori'] = $this->M_produk->kategori()->result();

		$this->load->view('frontend/template/header');		
		$this->load->view('frontend/filter_per_kategori', $data);
		$this->load->view('frontend/template/footer');
	}

	public function search()
    {

        //mengambil nilai keyword dari form pencarian
        $keyword = (urlencode($this->input->post('keyword',true)))? urlencode($this->input->post('keyword',true)) : ''; //pencarian dengan spasi

        //jika uri segmen 3 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 3
        $keyword = ($this->uri->segment(3)) ? $this->uri->segment(3) : $keyword;

        //mengambil nilai segmen 4 sebagai offset
        $dari      = $this->uri->segment('4');

        //limit data yang ditampilkan
        $sampai = 1;

        //inisialisasi variabel $like
        $cari      = '';

        //mengisi nilai variabel $like dengan variabel $search, digunakan sebagai kondisi untuk menampilkan data
        if($keyword) $cari = $keyword;

        //hitung jumlah row
        $jumlah= $this->M_produk->pagination_search($cari);

        //inisialisasi array
        $config = array();

        //set base_url untuk setiap link page
        $config['base_url'] = base_url().'Produk/search/'.$keyword;
        $config['total_rows'] = $jumlah;
        $config['per_page'] = $sampai;
        $config['num_links'] = $jumlah;
                
        $this->pagination->initialize($config);

        $data = array();

        $data['search'] = $this->M_produk->hasil_search($sampai, $dari, $cari);
        $data['total_rows'] = $jumlah;
		$data['produk_terbaru'] = $this->M_produk->produk_terbaru();
		$data['kategori'] 	= $this->M_produk->kategori()->result();

		$this->load->view('frontend/template/header');		
		$this->load->view('frontend/search', $data);
		$this->load->view('frontend/template/footer');
	}

}
