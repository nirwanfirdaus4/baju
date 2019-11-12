<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_produk extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function ambildata()
	{
		$query = $this->db->query("SELECT * FROM tb_ukuran");
		return $query->result_array();
	}
	
	public function ambildata_produk()
	{
		$query = $this->db->query("SELECT * FROM tb_produk");
		return $query->result_array();
	}
	
	public function ambildata_stok()
	{
		$query = $this->db->query("SELECT * FROM tb_stok");
		return $query->result_array();
	}

	public function ambildata_stok2($id_stok)
	{
		$query = $this->db->query("SELECT * FROM tb_stok where id_stok=$id_stok");
		return $query->result_array();
	}

	public function ambildata_transaksi()
	{
		$query = $this->db->query("SELECT * FROM tb_transaksi");
		return $query->result_array();
	}

	public function ambildata2($id)
	{
		$query = $this->db->query("SELECT * FROM tb_ukuran WHERE id_ukuran=$id");
		return $query->result_array();
	}

	public function ambildata_produk2($id)
	{
		$query = $this->db->query("SELECT * FROM tb_produk WHERE id_produk=$id");
		return $query->result_array();
	}

	public function tambahdata($paket)
	{
		$this->db->insert('tb_ukuran', $paket);
		return $this->db->affected_rows();
	}

	public function tambahdataProduk($paket)
	{
		$this->db->insert('tb_produk', $paket);
		return $this->db->affected_rows();
	}

	public function tambahdataStok($paket)
	{
		$this->db->insert('tb_stok', $paket);
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
			$sql = "UPDATE tb_produk SET nama_produk = ? WHERE id_produk = ?";
			$query = $this->db->query($sql, array($send['nama_produk'], $send['id_produk']));			
	}

	public function update_stok($status,$send)
	{
		if ($status=="pict") {
			$sql = "UPDATE tb_stok SET id_produk = ?,id_ukuran = ?,id_warna = ?,foto = ?,jumlah_stok = ? WHERE id_stok = ?";
			$query = $this->db->query($sql, array($send['id_produk'],$send['id_ukuran'], $send['id_warna'], $send['foto'], $send['jumlah_stok'], $send['id_stok']));
		}elseif ($status=="pictless") {
			$sql = "UPDATE tb_stok SET id_produk = ?,id_ukuran = ?,id_warna = ?,jumlah_stok = ? WHERE id_stok = ?";
			$query = $this->db->query($sql, array($send['id_produk'],$send['id_ukuran'], $send['id_warna'], $send['jumlah_stok'], $send['id_stok']));			
		}elseif ($status=="hit"){
			$sql = "UPDATE tb_stok SET jumlah_stok = ? WHERE id_stok = ?";
			$query = $this->db->query($sql, array($send['jumlah_stok'], $send['id_stok']));		
		}
	}

	// public function update_produk($status,$send)
	// {
	// 	if ($status=="pict") {
	// 		$sql = "UPDATE tb_produk SET nama_produk = ?,ukuran = ?,warna = ?,foto = ? WHERE id_produk = ?";
	// 		$query = $this->db->query($sql, array($send['nama_produk'],$send['ukuran'], $send['warna'], $send['foto'], $send['id_produk']));
	// 	}else{
	// 		$sql = "UPDATE tb_produk SET nama_produk = ?,ukuran = ?,warna = ? WHERE id_produk = ?";
	// 		$query = $this->db->query($sql, array($send['nama_produk'],$send['ukuran'], $send['warna'], $send['id_produk']));			
	// 	}
	// }



}
