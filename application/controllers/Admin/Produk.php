<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() //MEMPERSIAPKAN
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('mdl_produk');
        $this->load->library('form_validation');
        $this->load->database();
        // if ($this->session->userdata('masuk') == FALSE) {
        //     redirect('Admin/Login', 'refresh');
        // }
    }


	public function ukuran()
	{
        $paket['array'] = $this->mdl_produk->ambildata();
		$this->load->view('admin/ukuran', $paket);			
	}
	
	public function daftarProduk() 
	{
        $paket['array'] = $this->mdl_produk->ambildata_produk();
		$this->load->view('admin/produk', $paket);			
	}

    public function transaksi() 
    {
        $paket['array'] = $this->mdl_produk->ambildata_transaksi();
        $this->load->view('admin/transaksi', $paket);                  
    }


    public function tambahdata() 
    {
        $this->form_validation->set_rules('nama_ukuran', 'Nama Ukuran', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga Ukuran', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['msg_error'] = "Silahkan isi semua kolom";
            $this->load->view('admin/vtambah_ukuran', $data);
        } else {
            $send['id_ukuran'] = '';
            $send['nama_ukuran'] = $this->input->post('nama_ukuran');
            $send['harga'] = $this->input->post('harga');

            $this->mdl_produk->tambahdata($send);
            
            $this->session->set_flashdata('msg', 'Data berhasil ditambahkan');
            redirect('admin/Produk/ukuran');
        }
    }

    public function tambahdataProduk()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Ukuran', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['msg_error'] = "Silahkan isi semua kolom";
            $this->load->view('admin/vtambah_produk', $data);
        } else {
            $send['id_produk'] = '';
            $send['nama_produk'] = $this->input->post('nama_produk');
            $send['ukuran'] = $this->input->post('ukuran');
            $send['warna'] = $this->input->post('warna');
            $send['foto'] = $this->input->post('foto');


            if ($_FILES["foto"]["name"] != "") {
                $config['upload_path']          = './upload/produk/';
                $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
                $config['max_size']             = 3000;
                $config['file_name'] = "Produk_" . "_" . time();
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);

                    $data = $this->upload->data();
                    $send['foto'] = $data['file_name'];

                    $kembalian['jumlah'] = $this->mdl_produk->tambahdataProduk($send);

                    // $kembalian['array'] = $this->mdl_produk->ambildata();

                    // $this->load->view('produk', $kembalian);
                    // $this->session->set_flashdata('msg', 'Data berhasil ditambahkan');
                    redirect('admin/Produk/daftarProduk');
                } else {

                    $kembalian['jumlah'] = $this->mdl_produk->tambahdataProduk($send);
                    // $kembalian['array'] = $this->mdl_produk->ambildata();

                    // $this->load->view('produk', $kembalian);
                    // $this->session->set_flashdata('msg', 'Data berhasil ditambahkan');
                    // redirect('Produk');
                    redirect('admin/Produk/daftarProduk');
                }
            }



            // $this->mdl_produk->tambahdataProduk($send);
            
            // $this->session->set_flashdata('msg', 'Data berhasil ditambahkan');
            // redirect('admin/Produk/daftarProduk');
        }
    }


    public function hapus($id)
    {
        $where = array('id_ukuran' => $id);
        $this->mdl_produk->delete_data($where, 'tb_ukuran');
        $this->session->set_flashdata('msg_delete', 'Data berhasil dihapus');
        redirect('admin/Produk/ukuran');
    }

    public function hapus_produk($id)
    {
        $where = array('id_produk' => $id);
        $query_cekFoto=$this->db->query("SELECT * FROM tb_produk where id_produk=$id");

        foreach ($query_cekFoto->result() as $key) {
                $file_foto=$key->foto;
        }
        if ($file_foto!="") {
            $target= "upload/produk/".$file_foto;
            unlink($target);
        }

        $this->mdl_produk->delete_data($where, 'tb_produk');
        $this->session->set_flashdata('msg_delete', 'Data berhasil dihapus');
        redirect('admin/Produk/daftarProduk');
    }

    public function edit($id_update)
    {
        $this->form_validation->set_rules('nama_ukuran', 'Nama Ukuran', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga Ukuran', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $indexrow['data'] = $this->mdl_produk->ambildata2($id_update);
            $indexrow['id_update'] = $id_update;
            $this->load->view('admin/vedit_produk', $indexrow);            
        } else {
            $send['id_ukuran'] = $id_update;
            $send['nama_ukuran'] = $this->input->post('nama_ukuran');
            $send['harga'] = $this->input->post('harga');

            $kembalian['jumlah'] = $this->mdl_produk->update($send);
            $this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
	        redirect('admin/Produk/ukuran');
        }
    }
  
    public function validasi_pesanan($id_transaksi)
    {
        $this->form_validation->set_rules('biaya_ekspedisi', 'biaya_ekspedisi', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/Produk/transaksi');
        } else {
            $hargaTotal=0;
            $query_cekTrans=$this->db->query("SELECT * FROM tb_transaksi where id_transaksi=$id_transaksi");

            foreach ($query_cekTrans->result() as $keyTrans) {       
                $hargaTotal=$hargaTotal+$keyTrans->harga_produk;
            }
            $send['biaya_ekspedisi'] = $this->input->post('biaya_ekspedisi');
            $send['total_biaya'] = $send['biaya_ekspedisi']+$hargaTotal;
            $send['id_transaksi'] = $id_transaksi;
            $send['status_transaksi'] = "pembayaran";

            $this->mdl_produk->validasi_pesanan($send);
            $this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
            redirect('admin/Produk/transaksi');
        }
    }
  
    public function validasi_pembayaran($id_transaksi,$kode)
    {

        if ($kode=="valid") {
            $send['status_transaksi'] = "valid";
        }else{
            $send['status_transaksi'] = "invalid";
        }

            $send['id_transaksi'] = $id_transaksi;
            $this->mdl_produk->validasi_pembayaran($send);
            redirect('admin/Produk/transaksi');
    }

    public function edit_produk($id_update)
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Ukuran', 'trim|required');
        // $this->form_validation->set_rules('harga', 'Harga Ukuran', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $indexrow['data'] = $this->mdl_produk->ambildata_produk2($id_update);
            $indexrow['id_update'] = $id_update;
            $this->load->view('admin/vedit_produk', $indexrow);            
        } else {
            $send['id_produk'] = $id_update;
            $send['nama_produk'] = $this->input->post('nama_produk');
            $send['ukuran'] = $this->input->post('ukuran');
            $send['warna'] = $this->input->post('warna');
            $send['foto'] = $this->input->post('foto');


            if ($_FILES["foto"]["name"] != "") {
                $config['upload_path']          = './upload/produk/';
                $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
                $config['max_size']             = 3000;
                $config['file_name'] = "Produk_" . "_" . time();
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('msg', $error);

                    $data = $this->upload->data();
                    $send['foto'] = $data['file_name'];

                $query_cekFoto=$this->db->query("SELECT * FROM tb_produk where id_produk=$id_update");

                foreach ($query_cekFoto->result() as $key) {
                        $file_foto=$key->foto;
                }
                if ($file_foto!="") {
                    $target= "upload/produk/".$file_foto;
                    unlink($target);
                }

                    $kembalian['jumlah'] = $this->mdl_produk->update_produk("pict",$send);

                    redirect('admin/Produk/daftarProduk');
                } else {

                    redirect('admin/Produk/edit_produk/'.$id_update);
                }
            }else{
                    $kembalian['jumlah'] = $this->mdl_produk->update_produk("pictless",$send);
                    redirect('admin/Produk/daftarProduk');                
            }



            // $this->mdl_produk->tambahdataProduk($send);
            
            // $this->session->set_flashdata('msg', 'Data berhasil ditambahkan');
            // redirect('admin/Produk/daftarProduk');
        }
    }

}
