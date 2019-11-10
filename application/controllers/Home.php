<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->load->view('front/index');			
	}

	public function detail()
	{
		$this->load->view('front/detail');			
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
