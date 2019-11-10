<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() //MEMPERSIAPKAN
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('mdl_user_produk');
        $this->load->library('form_validation');
        $this->load->database();
        // if ($this->session->userdata('masuk') == FALSE) {
        //     redirect('Admin/Login', 'refresh');
        // }
    }

	public function index()
	{
        $paket['array'] = $this->mdl_user_produk->ambildata_produk();
		$this->load->view('front/index',$paket);			 
	}

	public function detail($id_produk)
	{
        $paket['data'] = $this->mdl_user_produk->ambildata_produk2($id_produk);
        $paket['id_produk'] = $id_produk;
		$this->load->view('front/detail',$paket);			
	}
	public function produk()
	{
		$this->load->view('front/category');			
	}

	public function keranjang()
	{
		$this->load->view('front/cart');			
	}

	public function transaksi()
	{
		$this->load->view('front/checkout');			
	}

	public function kontak()
	{
		$this->load->view('front/contact');			
	}

	public function login()
	{
		$this->load->view('front/login');			
	}

}
