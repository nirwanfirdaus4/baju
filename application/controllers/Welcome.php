<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('admin/index_admin');			
	}

	public function nusha()
	{
		$this->load->view('welcome');			
	}
}
