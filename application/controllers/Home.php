<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() //MEMPERSIAPKAN
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('mdl_user_produk');
        $this->load->library('form_validation');
        $this->load->library('session');
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
        $paket['data2'] = $this->mdl_user_produk->ambildata_produk_terkait();
        $paket['id_stok'] = $id_stok;

		$query_stok1 = $this->db->query("SELECT * FROM tb_stok where id_stok=$id_stok");

        foreach ($query_stok1->result() as $keyStok2) {         
        $paket['warna_pilihan'] = $keyStok2->id_warna;        	
        $paket['data_warna'] = $keyStok2->id_warna;
		}

		$this->load->view('front/detail',$paket);			
	}

	public function show($id_produk,$id_warna)
	{
        $paket['data'] = $this->mdl_user_produk->ambildata_show($id_produk,$id_warna);
        $paket['data_warna'] = $id_warna;
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

    public function show_search()
    {
        $bahan_nama = $this->input->post('bahan_nama');    
        // $nama = "Aisyah";
        $query_for = $this->db->query("SELECT * FROM tb_produk where nama_produk LIKE '%$bahan_nama%' LIMIT 1");
        // $query_for = "SELECT * FROM tb_produk where nama_produk='%$bahan_nama%' LIMIT 1";
        // echo $query_for; 

        if ($query_for->num_rows()>0) {
            foreach ($query_for->result() as $keyFor) {         
                $id_produk = $keyFor->id_produk;
                $nama_produk = $keyFor->nama_produk;
                // $id_produk = $keyFor->id_produk;
                // $query_for2 = $this->db->query("SELECT * FROM tb_stok where id_produk=$id_produk LIMIT 1");

                // foreach ($query_for2->result() as $keyFor2) {         
                //     $id_warna = $keyFor2->id_warna;
                //     $id_ukuran = $keyFor2->id_ukuran;
                    // $id_produk = $keyFor->id_produk;
                
                    $link = 'Home/cari_produk2/'.$bahan_nama."/".$id_produk."/".$nama_produk;
                    redirect($link);
                    // echo $link;

                // }

            }
        }else{
            $id_produk=0;
            $nama_produk="kosong";
                    $link = 'Home/cari_produk2/'.$bahan_nama."/".$id_produk."/".$nama_produk;
                    redirect($link);
                    // echo $link;
        }

        // $this->load->view('front/detail',$paket);            
    }

	public function produk()
	{			
        $paket['array'] = $this->mdl_user_produk->ambildata_produk_all();
        $this->load->view('front/category',$paket);             
	}

    public function cari_produk2($bahan_nama,$produk,$nama_produk)
    {           
        // $paket['sub_warna'] = $warna = $this->input->post('v_warna');        
        // $paket['sub_ukuran'] = $ukuran = $this->input->post('v_ukuran');        
        $paket['sub_total'] = 0;               
        $paket['bahan_nama'] = $bahan_nama;                 
            $view_status = $this->db->query("SELECT * FROM tb_stok where id_produk=$produk ORDER BY id_stok DESC");
            if ($view_status->num_rows()<1) {
                $paket['status_data']="ganok";  
                $paket['sub_warna'] = "zonk";        
                $paket['sub_ukuran'] = "zonk";   
               $paket['sub_search_nama'] = "zonk";         
               $paket['sub_nama_warna'] = "kosong";         
               $paket['sub_nama_ukuran'] = "kosong";         
            }else{
                $paket['status_data']="ada";  
                $paket['sub_warna'] = "ono";        
                $paket['sub_ukuran'] = "ono";                   
                $paket['sub_search_nama'] = $nama_produk; 
                $paket['sub_nama_warna'] = "IJOOOO";         
                $paket['sub_nama_ukuran'] = "Gedeeeee";         
            }
            $paket['array'] = $this->mdl_user_produk->ambildata_search_produk4($produk);
            $this->load->view('front/category_search',$paket);       
    }


    public function cari_produk()
    {           

        $paket['sub_warna'] = $warna = $this->input->post('v_warna');        
        $paket['sub_ukuran'] = $ukuran = $this->input->post('v_ukuran');        
        $paket['sub_total'] = 0;        

        if (empty($warna) && empty($ukuran)) {            
            redirect('Home/produk/');
        } elseif (empty($warna) && !empty($ukuran)) {

            $query_stok2 = $this->db->query("SELECT * FROM tb_ukuran where id_ukuran=$ukuran");
            foreach ($query_stok2->result() as $keyStok3) {         
                $paket['sub_nama_ukuran'] = $keyStok3->nama_ukuran;        
            }

            $view_status = $this->db->query("SELECT * FROM tb_stok where id_ukuran=$ukuran ORDER BY id_stok DESC");
            if ($view_status->num_rows()<1) {
                $paket['status_data']="kosong";  
            }else{
                $paket['status_data']="ada";  
            }
            $paket['array'] = $this->mdl_user_produk->ambildata_search_produk1($ukuran);
            $this->load->view('front/category_search',$paket);     
        }elseif (empty($ukuran) && !empty($warna)) {

            $query_stok1 = $this->db->query("SELECT * FROM tb_warna where id_warna=$warna");
            foreach ($query_stok1->result() as $keyStok2) {         
                $paket['sub_nama_warna'] = $keyStok2->nama_warna;        
            }

            $view_status = $this->db->query("SELECT * FROM tb_stok where id_warna=$warna ORDER BY id_stok DESC");
            if ($view_status->num_rows()<1) {
                $paket['status_data']="kosong";  
            }else{
                $paket['status_data']="ada";  
            }
            $paket['array'] = $this->mdl_user_produk->ambildata_search_produk2($warna);
            $this->load->view('front/category_search',$paket);     
        }else{

            $query_stok1 = $this->db->query("SELECT * FROM tb_warna where id_warna=$warna");
            foreach ($query_stok1->result() as $keyStok2) {         
                $paket['sub_nama_warna'] = $keyStok2->nama_warna;        
            }
            $query_stok2 = $this->db->query("SELECT * FROM tb_ukuran where id_ukuran=$ukuran");
            foreach ($query_stok2->result() as $keyStok3) {         
                $paket['sub_nama_ukuran'] = $keyStok3->nama_ukuran;        
            }
            
            $view_status = $this->db->query("SELECT * FROM tb_stok where id_warna=$warna AND id_ukuran=$ukuran ORDER BY id_stok DESC");
            if ($view_status->num_rows()<1) {
                $paket['status_data']="kosong";  
            }else{
                $paket['status_data']="ada";  
            }
            $paket['array'] = $this->mdl_user_produk->ambildata_search_produk3($warna,$ukuran);
            $this->load->view('front/category_search',$paket);             
        
        }
    }

	public function keranjang($id_user)
	{
        if ($this->session->userdata('masuk') == FALSE || $this->session->userdata('hak_akses') !=2) {
            redirect('Home/login', 'refresh');
        }else{
  //       $indexrow['data'] = $this->mdl_user_produk->ambildata_keranjang($id_user);
        $paket['id_user'] = $id_user;
        // $this->load->view('front/cart', $indexrow);          
        $paket['array'] = $this->mdl_user_produk->ambildata_keranjang($id_user);
        $this->load->view('front/cart', $paket);
        }        
	}

	public function transaksi()
	{
        if ($this->session->userdata('masuk') == FALSE || $this->session->userdata('hak_akses') !=2) {
            redirect('Home/login', 'refresh');
        }else{
            $paket['array'] = $this->mdl_user_produk->ambildata_transaksi();
            $this->load->view('front/transaksi',$paket);            
        }        
	}

    public function profil()
    {
        if ($this->session->userdata('masuk') == FALSE || $this->session->userdata('hak_akses') !=2) {
            redirect('Home/login', 'refresh');
        }else{
        $paket['array'] = $this->mdl_user_produk->ambildata_profil();
        $this->load->view('front/profil',$paket);            
        }
    } 

    public function update_profil($id_update)
    {
        if ($this->session->userdata('masuk') == FALSE || $this->session->userdata('hak_akses') !=2) {
            redirect('Home/login', 'refresh');
        }else{
        $this->form_validation->set_rules('nama', 'Nama','trim|required');
        $this->form_validation->set_rules('alamat', 'Harga Ukuran','trim|required');
        $this->form_validation->set_rules('telp', 'Harga Ukuran','trim|required');
        $this->form_validation->set_rules('email', 'Harga Ukuran','trim|required');
        $this->form_validation->set_rules('username', 'Harga Ukuran','trim|required');
        $this->form_validation->set_rules('password', 'Harga Ukuran','trim|required');
        // $this->form_validation->set_rules('sc', 'sc', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $indexrow['data'] = $this->mdl_user_produk->ambildata_profil($id_update);
            $indexrow['id_update'] = $id_update;
            $this->load->view('front/profil', $indexrow);            

        } else {
            $send['id_user'] = $id_update;
            $send['nama_user'] = $this->input->post('nama');
            $send['gmail'] = $this->input->post('email');
            $send['alamat'] = $this->input->post('alamat');
            $send['telp'] = $this->input->post('telp');
            $send['username'] = $this->input->post('username');
            $send['password'] = $this->input->post('password');
            // $send['id_akses'] = '2';
 
            $this->session->set_userdata('ses_nama', $send['nama_user']);
            $kembalian['jumlah'] = $this->mdl_user_produk->update_profil($send);
            $this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
            redirect('Home/update_profil/' . $id_update);
            }
        }
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
        if ($this->session->userdata('masuk') == FALSE || $this->session->userdata('hak_akses') !=2) {
            redirect('Home/login', 'refresh');
        }else{

            // $this->form_validation->set_rules('cs', 'CS', 'trim|required');
            $this->form_validation->set_rules('sc', 'sc', 'trim|required');
            $this->form_validation->set_rules('qu', 'CS', 'trim|required');

            $warna = $this->input->post('support_warna');
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
                        $send['status'] = "aktif";
                        $send['id_user'] = $this->session->userdata('id_user');
                        $send['id_produk'] = $idProduk;
                        $send['id_ukuran'] = $ukuran;
                        $send['id_warna'] = $warna;
                        $send['jumlah_barang'] = $kuantitas;
                        $send['harga'] = $harga;
                        $send2['id_stok'] = $id_stok;
                        $send2['jumlah_stok'] = $cek_kuota;
                        // $this->mdl_user_produk->update_stok($send2);
                        $this->mdl_user_produk->tambah_cart($send);
                        // echo  $send2['jumlah_stok'];
                        redirect('Home/keranjang/'.$this->session->userdata('id_user'));
                    }else{
                        echo "Lha, di kene iki seng pesan stok tidak cukup";
                        
                    }


            }

        }
    }

    public function tambah_transaksi()
    {
        if ($this->session->userdata('masuk') == FALSE || $this->session->userdata('hak_akses') !=2) {
            redirect('Home/login', 'refresh');
        }else{

        $this->form_validation->set_rules('penerima', 'CS', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'sc', 'trim|required');
        $this->form_validation->set_rules('cp', 'CS', 'trim|required');

        $penerima = $this->input->post('penerima');
        $tujuan = $this->input->post('tujuan');
        $cp = $this->input->post('cp');
        $catatan = $this->input->post('catatan');
        $total_bayar = $this->input->post('total_bayars');
        $id_user=$this->session->userdata('id_user');

        if ($this->form_validation->run() == FALSE) {
            $data['msg_error'] = "Silahkan isi semua kolom";
            
            redirect('Home/keranjang/'.$id_user);
        } else {

            $send['id_transaksi'] = '';
            $send['tanggal'] = date("Y-m-d");
            $send['id_user'] = $id_user;
            $send['catatan'] = $catatan;
            $send['ekspedisi'] = "";
            $send['biaya_ekspedisi'] = 0;
            $send['harga_produk'] = $total_bayar;
            $send['total_biaya'] = 0;
            $send['tujuan_pengiriman'] = $tujuan;
            $send['penerima'] = $penerima;
            $send['cp'] = $cp;
            $send['status_transaksi'] = "validasi_pesanan";
            $query_cart = $this->db->query("SELECT * FROM tb_cart where id_user=$id_user AND status='aktif'");

            $no=1;
            foreach ($query_cart->result() as $keycart) { 
                $field="id_cart".$no;
                $send[$field] = $keycart->id_cart;                            
                $send2['id_cart'] = $keycart->id_cart;
                $send2['status'] = "pasif";                
                $this->mdl_user_produk->update_cart($send2);            
                $no++;
            }
            $this->mdl_user_produk->tambah_transaksi($send);
            redirect('Home/transaksi/'.$id_user);

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
            $this->session->set_userdata('id_user',$data['id_user']);
            $this->session->set_userdata('ses_nama', $data['nama_user']);
            redirect('admin/index_admin');
        }elseif ($user->num_rows() > 0) {
            $data = $user->row_array();

            $this->session->set_userdata('masuk', TRUE);
            $this->session->set_userdata('hak_akses',$data['id_akses']);
            $this->session->set_userdata('id_user',$data['id_user']);
            $this->session->set_userdata('ses_nama', $data['nama_user']);

            redirect('Home');
        }else {
            $this->session->set_flashdata('msg_login', 'Username / Passowrd Salah');
            redirect('Home/login/');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('Home/login/');
    }
    function logout_x()
    {
        $this->session->sess_destroy();
        redirect('Home/');
    }

    public function hapus_cart($id)
    {
        if ($this->session->userdata('masuk') == FALSE || $this->session->userdata('hak_akses') !=2) {
            redirect('Home/login', 'refresh');
        }else{

         $where = array('id_cart' => $id);
         $query_p6 = $this->db->query("SELECT * FROM tb_cart where id_cart=$id AND status='aktif'");

                foreach ($query_p6->result() as $keyf6) {
                    $warna=$keyf6->id_warna;
                    $produk=$keyf6->id_produk;
                    $ukuran=$keyf6->id_ukuran;
                    $jumlah=$keyf6->jumlah_barang;
                }

         $query_p7 = $this->db->query("SELECT * FROM tb_stok where id_produk=$produk AND id_warna=$warna AND id_ukuran=$ukuran");

                foreach ($query_p7->result() as $keyf7) {
                    $b_stok=$keyf7->jumlah_stok;
                }

                $update_stok=$jumlah+$b_stok;
                $send['jumlah_stok'] = $update_stok;
                $send['id_produk'] = $produk;
                $send['id_warna'] = $warna;
                $send['id_ukuran'] = $ukuran;

        // $this->mdl_user_produk->update_stok2($send);
        $this->mdl_user_produk->delete_data($where, 'tb_cart');
        $iduser=$this->session->userdata('id_user');
        redirect('Home/keranjang/'.$iduser);
        }
    }

    public function register(){
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Harga Ukuran', 'trim|required');
        $this->form_validation->set_rules('telp', 'Harga Ukuran', 'trim|required');
        $this->form_validation->set_rules('email', 'Harga Ukuran', 'trim|required');
        $this->form_validation->set_rules('username', 'Harga Ukuran', 'trim|required');
        $this->form_validation->set_rules('password', 'Harga Ukuran', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['msg_error'] = "Silahkan isi semua kolom";
            $this->session->set_flashdata('msg_gagal','Login gagal, cek kembali data anda!');
            $this->load->view('front/login', $data);
        } else {
            $send['id_user'] = '';
            $send['nama_user'] = $this->input->post('nama');
            $send['gmail'] = $this->input->post('email');
            $send['alamat'] = $this->input->post('alamat');
            $send['telp'] = $this->input->post('telp');
            $send['username'] = $this->input->post('username');
            $send['password'] = $this->input->post('password');
            $send['id_akses'] = '2';

            $this->mdl_user_produk->registrasi($send);
            
            $this->session->set_flashdata('msg', ' Registrasi berhasil, silahkan login');
            redirect('Home/login/');
        }

    }

    public function upload_pembayaran($id_transaksi)
    {
        if ($this->session->userdata('masuk') == FALSE || $this->session->userdata('hak_akses') !=2) {
            redirect('Home/login', 'refresh');
        }else{
            $iduser=$this->session->userdata('id_user');

            if ($_FILES["foto"]["name"] != "") {
                $config['upload_path']          = './upload/bukti/';
                $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
                $config['max_size']             = 3000;
                $config['file_name'] = "Bukti_" . "_" . time();
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);

                    $data = $this->upload->data();
                    $send['bukti_transfer'] = $data['file_name'];
                    $send['id_transaksi'] = $id_transaksi;
                    $send['status'] = "validasi_pembayaran";

                    $this->mdl_user_produk->update_transaksi("bayar",$send);
                    $iduser=$this->session->userdata('id_user');
                    redirect('Home/transaksi/'.$iduser);
                } else {
                    redirect('Home/transaksi/'.$iduser);
                }
            }else{
                    redirect('Home/transaksi/'.$iduser);                
            }



            // $this->mdl_produk->tambahdataProduk($send);
            
            // $this->session->set_flashdata('msg', 'Data berhasil ditambahkan');
            // redirect('admin/Produk/daftarProduk');
        }
    }
}
