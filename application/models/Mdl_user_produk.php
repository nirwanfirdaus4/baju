<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_user_produk extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	} 

	public function auth_admin($username,$password)
	{
		$query=$this->db->query("SELECT * FROM tb_user where username='$username' AND password='$password' AND id_akses=1");
		return $query;
	}

	public function auth_user($username,$password)
	{
		$query=$this->db->query("SELECT * FROM tb_user where username='$username' AND password='$password' AND id_akses=2");
		return $query;
	}
	
	public function ambildata_produk_all()
	{
		$query = $this->db->query("SELECT * FROM tb_stok ORDER BY id_stok DESC");
		return $query->result_array();
	}

	public function ambildata_produk()
	{
		$query = $this->db->query("SELECT * FROM tb_stok ORDER BY id_stok DESC LIMIT 8");
		return $query->result_array();
	}

	public function ambildata_produk_terkait()
	{
		$query = $this->db->query("SELECT * FROM tb_stok ORDER BY id_stok ASC LIMIT 8");
		return $query->result_array();
	}

	public function ambildata_search_produk1($ukuran)
	{
		$query = $this->db->query("SELECT * FROM tb_stok where id_ukuran=$ukuran ORDER BY id_stok DESC");
		return $query->result_array();
	}

	public function ambildata_search_produk2($warna)
	{
		$query = $this->db->query("SELECT * FROM tb_stok where id_warna=$warna ORDER BY id_stok DESC");
		return $query->result_array();
	}

	public function ambildata_search_produk3($warna,$ukuran)
	{
		$query = $this->db->query("SELECT * FROM tb_stok where id_warna=$warna AND id_ukuran=$ukuran ORDER BY id_stok DESC");
		return $query->result_array();
	}

	public function ambildata_transaksi()
	{
        $id=$this->session->userdata('id_user');
		$query = $this->db->query("SELECT * FROM tb_transaksi where id_user=$id");
		return $query->result_array();
	}

	public function ambildata2($id)
	{
		$query = $this->db->query("SELECT * FROM tb_ukuran WHERE id_ukuran=$id");
		return $query->result_array();
	}

	public function ambildata_show($id_produk,$id_warna)
	{
		$query = $this->db->query("SELECT * FROM tb_stok where id_produk=$id_produk AND id_warna=$id_warna");
		return $query->result_array();
	}

	public function ambildata_produk2($id)
	{
		$query = $this->db->query("SELECT * FROM tb_produk WHERE id_produk=$id");
		return $query->result_array();
	}

	public function ambildata_keranjang($id)
	{
		$query = $this->db->query("SELECT * FROM tb_cart WHERE id_user=$id AND status='aktif'");
		return $query->result_array();
	}

	public function ambildata_stok2($id)
	{
		$query = $this->db->query("SELECT * FROM tb_stok WHERE id_stok=$id");
		return $query->result_array();
	}

	public function tambah_transaksi($paket)
	{
		$this->db->insert('tb_transaksi', $paket);
		return $this->db->affected_rows();
	}

	public function tambahdata($paket)
	{
		$this->db->insert('tb_ukuran', $paket);
		return $this->db->affected_rows();
	}

	public function tambah_cart($paket)
	{
		$this->db->insert('tb_cart', $paket);
		return $this->db->affected_rows();
	}

	public function tambahdataProduk($paket)
	{
		$this->db->insert('tb_produk', $paket);
		return $this->db->affected_rows();
	}
	
	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function update($send)
	{
		$sql = "UPDATE tb_ukuran SET nama_ukuran = ?,harga = ? WHERE id_ukuran = ?";
		$query = $this->db->query($sql, array($send['nama_ukuran'],$send['harga'], $send['id_ukuran']));
	}

	public function update_transaksi($status,$send)
	{
		if ($status=="bayar") {
			$sql = "UPDATE tb_transaksi SET status_transaksi = ?,bukti_transfer = ? WHERE id_transaksi = ?";
			$query = $this->db->query($sql, array($send['status'],$send['bukti_transfer'], $send['id_transaksi']));
		}
	}

	public function update_stok($send)
	{
		$sql = "UPDATE tb_stok SET jumlah_stok = ? WHERE id_stok = ?";
		$query = $this->db->query($sql, array($send['jumlah_stok'], $send['id_stok']));
	}

	public function update_cart($send)
	{
		$sql = "UPDATE tb_cart SET status = ? WHERE id_cart = ?";
		$query = $this->db->query($sql, array($send['status'], $send['id_cart']));
	}

	public function update_stok2($send)
	{
		$sql = "UPDATE tb_stok SET jumlah_stok = ? WHERE id_produk = ? AND id_warna = ? AND id_ukuran = ?";
		$query = $this->db->query($sql, array($send['jumlah_stok'], $send['id_produk'], $send['id_warna'], $send['id_ukuran']));
	}

	public function validasi_pesanan($send)
	{
		$sql = "UPDATE tb_transaksi SET status_transaksi = ?, biaya_ekspedisi = ?,total_biaya = ? WHERE id_transaksi = ?";
		$query = $this->db->query($sql, array($send['status_transaksi'],$send['biaya_ekspedisi'],$send['total_biaya'], $send['id_transaksi']));
	}

	public function validasi_pembayaran($send)
	{
		$sql = "UPDATE tb_transaksi SET status_transaksi = ? WHERE id_transaksi = ?";
		$query = $this->db->query($sql, array($send['status_transaksi'], $send['id_transaksi']));
	}

	public function update_produk($status,$send)
	{
		if ($status=="pict") {
			$sql = "UPDATE tb_produk SET nama_produk = ?,ukuran = ?,warna = ?,foto = ? WHERE id_produk = ?";
			$query = $this->db->query($sql, array($send['nama_produk'],$send['ukuran'], $send['warna'], $send['foto'], $send['id_produk']));
		}else{
			$sql = "UPDATE tb_produk SET nama_produk = ?,ukuran = ?,warna = ? WHERE id_produk = ?";
			$query = $this->db->query($sql, array($send['nama_produk'],$send['ukuran'], $send['warna'], $send['id_produk']));			
		}
	}
}
