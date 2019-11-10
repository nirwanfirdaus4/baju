<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_admin extends CI_Controller {


	public function index()
	{
		$this->load->view('admin/index_admin');			
	}

}
