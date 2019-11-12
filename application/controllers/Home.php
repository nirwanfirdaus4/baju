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

	// public function detail($id _produk)
	// {
 //        $paket['data'] = $this->mdl_user_produk->ambildata_produk2($id_produk);
 //        $paket['id_produk'] = $id_produk;
	// 	$this->load->view('front/detail',$paket);			
	// }

	public function detail($id_stok)
	{
        $paket['data'] = $this->mdl_user_produk->ambildata_stok2($id_stok);
        $paket['id_stok'] = $id_stok;

		$query_stok1 = $this->db->query("SELECT * FROM tb_stok where id_stok=$id_stok");

        foreach ($query_stok1->result() as $keyStok2) {         
        $paket['warna_pilihan'] = $keyStok2->id_warna;        	
		}

		$this->load->view('front/detail',$paket);			
	}

	public function show($id_produk,$id_warna)
	{
        $paket['data'] = $this->mdl_user_produk->ambildata_show($id_produk,$id_warna);
        // $paket['id_stok'] = $id_stok;

		$query_stok1 = $this->db->query("SELECT * FROM tb_stok where id_produk=$id_produk AND id_warna=$id_warna");
		$hit=1;
        foreach ($query_stok1->result() as $keyStok2) {         
        	if ($hit==1) {
		        $link = 'Home/detail/'.$keyStok2->id_stok;
        	}
        	$hit++;
		}
		
        redirect($link);
		// $this->load->view('front/detail',$paket);			
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

    public function tambah_cart()
    {
        $this->form_validation->set_rules('cs', 'CS', 'trim|required');
        $this->form_validation->set_rules('sc', 'sc', 'trim|required');
        $this->form_validation->set_rules('qu', 'CS', 'trim|required');

        $warna = $this->input->post('cs');
        $ukuran = $this->input->post('sc');
        $kuantitas = $this->input->post('qu');
        $id_stok = $this->input->post('id_stok');
        $id_produk = $this->input->post('id_produk');

        if ($this->form_validation->run() == FALSE) {
            $data['msg_error'] = "Silahkan isi semua kolom";
			
            redirect('Home/detail/'.$id_stok);
        } else {
			$query_produk = $this->db->query("SELECT * FROM tb_stok where id_produk=$id_produk AND id_warna=$warna AND id_ukuran=$ukuran");
			$query_harga = $this->db->query("SELECT * FROM tb_ukuran where id_ukuran=$ukuran");

            foreach ($query_produk->result() as $keyProduk) { 
            	$idProduk= $keyProduk->id_produk;
            	$stok= $keyProduk->jumlah_stok;
            }
            foreach ($query_harga->result() as $keyHarga) { 
            	$v_harga= $keyHarga->harga;
            	$harga=$v_harga*$kuantitas;
            }

            	$cek_kuota=$stok-$kuantitas;
            	if ($cek_kuota>=0) {
		            $send['id_cart'] = '';
		            $send['id_user'] = 1;
		            $send['id_produk'] = $idProduk;
		            $send['id_ukuran'] = $ukuran;
		            $send['id_warna'] = $warna;
		            $send['jumlah_barang'] = $kuantitas;
		            $send['harga'] = $harga;
		            $send2['id_stok'] = $id_stok;
		            $send2['jumlah_stok'] = $cek_kuota;
		            $this->mdl_user_produk->update_stok($send2);
		            $this->mdl_user_produk->tambah_cart($send);
		            // echo  $send2['jumlah_stok'];
		            redirect('Home/produk');
            	}else{
            		echo "Lha, di kene iki seng pesan stok tidak cukup";
            		
            	}


        }
    }

    public function aksi_login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->mdl_user_produk->auth_user($username, $password);
        $admin = $this->mdl_user_produk->auth_admin($username, $password);

        if ($admin->num_rows() > 0) {
            $data = $admin->row_array();

            $this->session->set_userdata('masuk', TRUE);
            $this->session->set_userdata('hak_akses',$data['id_akses']);
            $this->session->set_userdata('ses_nama', $data['nama_user']);
            redirect('admin/index_admin');
        }elseif ($user->num_rows() > 0) {
            $data = $admin->row_array();

            $this->session->set_userdata('masuk', TRUE);
            $this->session->set_userdata('hak_akses',$data['id_akses']);
            $this->session->set_userdata('ses_nama', $data['nama_user']);
            redirect('Home');
        }else {
            $this->session->set_flashdata('msg', 'Username / Passowrd Salah');
            redirect('Home/login/');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('Home/login/');
    }

}
