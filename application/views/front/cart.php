<?php $this->load->view('front/header') ?>
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Keranjang</h4>
			<div class="site-pagination">
				<a href="">Beranda</a> /
				<a href="">Keranjang</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="cart-table">
						<h3 class="s_font2">Keranjang Anda</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Produk</th>
									<th class="size-th">Warna & Ukuran</th>
									<th class="size-th">Jumlah</th>
									<th class="total-th">Total</th>
									<th class="total-th"><center>Opsi</center></th>
								</tr>
							</thead>
							<tbody>

								<?php
									$bayar_total=0;
								    foreach ($array as $key) {						
									$bayar_total=  $bayar_total+$key['harga'];
								?>
								<tr>
									<td class="product-col">
										<img src="<?php
											
											$u_img= $key['id_produk']; 
											$u_warna= $key['id_warna'];  
											$query_p0 = $this->db->query("SELECT * FROM tb_stok where id_produk=$u_img AND id_warna=$u_warna");

											foreach ($query_p0->result() as $keyf3) {
												$img=$keyf3->foto;
											}

										 echo base_url('upload/produk/'.$img); 

										 ?>" alt="">
										<div class="pc-title">
											<h4 class="s_font"><?php

											$u_produk= $key['id_produk']; 
											$query_p2 = $this->db->query("SELECT * FROM tb_produk where id_produk=$u_produk");

											foreach ($query_p2->result() as $keyf2) {
												echo $keyf2->nama_produk;
											}

											 ?></h4>
											<p class="s_font"><?php
											$t_produk= $key['id_ukuran']; 
											$query_p3 = $this->db->query("SELECT * FROM tb_ukuran where id_ukuran=$t_produk");

											foreach ($query_p3->result() as $keyf3) {
												echo "Rp. ".$keyf3->harga;
											} 
											 ?></p>
										</div>
									</td>
									<td class="size-col"><h4 class="s_font"><?php
									 $warn=$key['id_warna'];
									 
									 $query_p6 = $this->db->query("SELECT * FROM tb_warna where id_warna=$warn");
	
											foreach ($query_p6->result() as $keyf6) {
												$warna=$keyf6->nama_warna;
											}

									 echo $warna." (".$key['id_ukuran'].")"; 

									 ?></h4></td>
									<td class="size-col"><h4 class="s_font"><?php echo $key['jumlah_barang']; ?></h4></td>
									<td class="total-col"><h4 class="s_font"><?php echo "Rp. ".$key['harga']; ?></h4></td>
									<td class="total-col"><a href="<?php echo base_url('Home/hapus_cart/'.$key['id_cart']); ?>"><button type="button" class="s_font btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
								</tr>


								<?php }?>
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<h6>Total <span><?php echo "Rp. ".$bayar_total; ?></span></h6>
						</div>
					</div>
				</div>
				<div class="col-lg-3 card-right">
<!-- 					<form class="promo-code-form">
						<input type="text" placeholder="Enter promo code">
						<button>Submit</button>
					</form> -->
					<?php

					if ($bayar_total>0) { ?>
						<a href="" data-toggle="modal" data-target="#transaksi" class="site-btn">Pesan</a>
						<a href="<?php echo base_url('Home/produk'); ?>" class="site-btn sb-dark">Lihat Produk lain</a>
					<?php }else{ ?>
						<a href="<?php echo base_url('Home/produk'); ?>" class="site-btn">Mulai Belanja</a>
					<?php }?>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="transaksi" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Pemesanan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        	<?php
        	$idUser=$this->session->userdata('id_user');
			$query_value = $this->db->query("SELECT * FROM tb_user where id_user=$idUser");

	        foreach ($query_value->result() as $keyStok7) {         
	        $paket_nama = $keyStok7->nama_user;        	
	        $paket_alamat = $keyStok7->alamat;        	
	        $paket_cp = $keyStok7->telp;        	
			}        	

        	?>

        	<input type="hidden" id="v_nama" value="<?php echo $paket_nama; ?>" name="">
        	<input type="hidden" id="v_alamat" value="<?php echo $paket_alamat; ?>" name="">
        	<input type="hidden" id="v_cp" value="<?php echo $paket_cp; ?>" name="">
			<form class="contact-form" action="<?php echo base_url('Home/tambah_transaksi/') ?>" method="post" enctype="multipart/form-data">			
				
        	<input type="hidden" id="v_total" value="<?php echo $bayar_total; ?>" name="total_bayars">
            <p align="right"><button id="status" name="status" value="other" onclick="my_data()" style="margin-bottom: 5%;" data-toggle="modal" data-target="" type="button" class="btn btn-fud2"><i class="fa fa-address-card-o"></i> Data Saya</button></p>

				<input id="penerima_x" name="penerima" type="text" placeholder="Nama Penerima">
				<input id="tujuan_x" name="tujuan" type="text" placeholder="Alamat Pengiriman">
				<input id="cp_x" name="cp" type="text" placeholder="CP Penerima">
				<textarea name="catatan" placeholder="Catatan"></textarea>
				<center><button style="margin-top: 7%;" class="site-btn">PESAN</button></center>
			</form>

        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>

<?php $this->load->view('front/footer') ?>

<script type="text/javascript">
	
  function my_data() {

    var values=document.getElementById("status").value;
    var vnama=document.getElementById("v_nama").value;
    var valamat=document.getElementById("v_alamat").value;
    var vcp=document.getElementById("v_cp").value;

    if (values=="own") {
	    document.getElementById("status").setAttribute('class','btn btn-fud2');
        document.getElementById("status").value = "other";
        document.getElementById("penerima_x").value = "";
        document.getElementById("tujuan_x").value = "";
        document.getElementById("cp_x").value = "";
    }else{
	    document.getElementById("status").setAttribute('class','btn btn-fud');    	
        document.getElementById("status").value = "own";    	
        document.getElementById("penerima_x").value = vnama;
        document.getElementById("tujuan_x").value = valamat;
        document.getElementById("cp_x").value = vcp;
    }

  }

</script>