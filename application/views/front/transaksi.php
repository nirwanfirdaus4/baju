<?php $this->load->view('front/header') ?>
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Transaksi</h4>
			<div class="site-pagination">
				<a href="">Beranda</a> /
				<a href="">Transaksi</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart-table">
						<h3>Transaksi Anda</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="total-th">No</th>
									<th class="total-th">Tanggal</th>
									<th class="total-th">Total Biaya</th>
									<th class="total-th">Tujuan</th>
									<th class="total-th">Penerima</th>
									<th class="total-th">Bukti Transfer</th>
									<th class="total-th"><center>Status</center></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no=1;
								    foreach ($array as $key) {					
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td class="total-col"><?php echo $key['tanggal']; ?></td>
									<td class="total-col"><?php echo $key['total_biaya']; ?></td>
									<td class="total-col"><h4><?php echo $key['tujuan_pengiriman']; ?></h4></td>
									<td class="total-col"><h4><?php echo $key['penerima']."<br>[ ".$key['cp']." ]"; ?></h4></td>
									<td class="total-col">
									<h4>
									<?php
										if ($key['bukti_transfer']=="" || $key['status_transaksi']=="tolak_pesanan") { ?>
											<button disabled="disabled" data-toggle="modal" data-target="#bukti<?php echo $no; ?>" type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
										<?php }else{ ?>
											<button data-toggle="modal" data-target="#bukti<?php echo $no; ?>" type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
										<?php }
									?>

									</h4></td>
									<td class="total-col">
										<?php
										if($key['status_transaksi']=="validasi_pesanan"){ ?>
											<button data-toggle="modal" data-target="#val_pesan" type="button" class="btn btn-primary"><i class="fa fa-clipboard"></i> Validasi Pesanan</button>
										<?php }elseif ($key['status_transaksi']=="pembayaran") { ?>
								             <button data-toggle="modal" data-target="#formBayar<?php echo $no; ?>" type="button"  class="btn btn-primary"><i class="fa fa-credit-card"></i> Pembayaran</button>          
										<?php }elseif ($key['status_transaksi']=="validasi_pembayaran") { ?>
											<button data-toggle="modal" data-target="#val_bayar" type="button" class="btn btn-primary"><i class="fa fa-clipboard"></i> Validasi Pembayaran</button>
										<?php }elseif ($key['status_transaksi']=="valid") {?>
							 	             <button type="button" class="btn btn-valid"><i class="fa fa-check-square"></i> Valid</button>
										<?php }elseif ($key['status_transaksi']=="tolak_pesanan") {?>
											 <button data-toggle="modal" data-target="#pesanTolak<?php echo $no; ?>" type="button" class="btn btn-danger"><i class="fa fa-ban"></i> Pesanan Ditolak</button>
										<?php }else{ ?>
											 <button type="button" class="btn btn-danger"><i class="fa fa-ban"></i> Tidak Valid</button>
										<?php }
										?>

									</td>
								</tr>

<div class="modal fade" id="pesanTolak<?php echo $no; ?>" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pesanan Ditolak</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        	<p>Mohon Maaf, pesanan anda kami tolak dengan alasan :</p><br>
        	<p ><?php echo $key['alasan_tolak'] ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="bukti<?php echo $no; ?>" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Bukti Transfer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <center><img style="margin-top: 7%; margin-bottom: 7%; " width="80%" src="<?php echo base_url('upload/bukti/'.$key['bukti_transfer']); ?>"></center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="val_bayar" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Validasi Pembayaran</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        	<p align="center">Pembayaran anda sedang dalam proses validasi oleh admin, setelah pembayaran anda dinyatakan valid, pesanan anda akan langsung kami kirimkan sesuai alamat yang tertera.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="val_pesan" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Validasi Pesanan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        	<p align="center">Pesanan anda sedang dalam proses validasi oleh admin, setelah pesanan anda dinyatakan valid, anda dapat melakukan transfer pembayaran dan upload bukti pembayaran yang ada.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="formBayar<?php echo $no; ?>" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Bukti Transfer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
			<form class="contact-form" action="<?php echo base_url('Home/upload_pembayaran/'.$key['id_transaksi']) ?>" method="post" enctype="multipart/form-data">			

<!-- 				<input id="penerima_x" name="penerima" type="text" placeholder="Nama Penerima">
				<input id="tujuan_x" name="tujuan" type="text" placeholder="Alamat Pengiriman"> -->
				<!-- <input id="cp_x" name="cp" type="text" placeholder="CP Penerima"> -->
				<input name="foto" type="file">
				<center><button style="margin-top: 7%;" class="btn btn-primary">Upload</button></center>
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

								<?php $no++; }?>
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<!-- <h6>Total <span></span></h6> -->
						</div>
					</div>
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
				<textarea placeholder="Catatan"></textarea>
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