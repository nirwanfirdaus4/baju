<?php $this->load->view('front/header') ?>
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>HASIL PENCARIAN :</h4><br>
			<div class="site-pagination">
				<?php
					if ($sub_warna=="") { ?>
						<p>Ukuran <?php echo "<b>".$sub_nama_ukuran."</b>";?></p>
					<?php }elseif ($sub_ukuran=="") { ?>
						<p>Warna <?php echo "<b>".$sub_nama_warna."</b>";?></p>
					<?php }elseif ($sub_ukuran=="zonk" && $sub_search_nama=="zonk") { ?>
						<p>" <?php echo  $bahan_nama; ?> "</p>
					<?php }elseif ($sub_ukuran=="ono" && $sub_search_nama!="zonk") { ?>
						<p>" <?php echo  $bahan_nama; ?> "</p>
					<?php }else{ ?>
						<p>Warna <?php echo "<b>".$sub_nama_warna."</b><br>Ukuran <b>".$sub_nama_ukuran."</b>"; ?></p>
					<?php }
				 ?>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">

					<div class="filter-widget mb-0">
						<h2 class="fw-title">warna</h2>
						<div class="fw-color-choose">
							<input type="hidden" id="sub_warna">
							<input type="hidden" id="sub_ukuran">
							<?php $query_warna = $this->db->query("SELECT * FROM tb_warna");
								$hit=0;
						        foreach ($query_warna->result() as $keyStok9) {  ?>    							
									<div class="cs-item">
										<input onclick="set_warna(<?php echo $keyStok9->id_warna; ?>)" type="radio" value="<?php echo $keyStok9->id_warna; ?>" name="cs" id="<?php echo $keyStok9->id_warna; ?>">
										<label class="cs-gray" for="<?php echo $keyStok9->id_warna; ?>" style="background:<?php echo $keyStok9->kode_warna;?>;">
											<span>(<?php 
											$total=0;
											$key1=$keyStok9->id_warna;
											$query_warna1 = $this->db->query("SELECT * FROM tb_stok where id_warna=$key1");													
										            foreach ($query_warna1->result() as $keyStok2) { 
														$total= $total+1;
										            }
										            echo $total;
													?>)</span>
										</label>
									</div>
								<?php  $hit++;}							
							?>
						</div>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Ukuran</h2>
						<div class="fw-size-choose">
						<?php

						$query_ukuran0 = $this->db->query("SELECT * FROM tb_ukuran");

						$hit2=1;
			            foreach ($query_ukuran0->result() as $keyUkuran) { 						

						if ($hit2==7 || $hit==13 || $hit==19 || $hit==25 || $hit==31 || $hit==37 || $hit==43 || $hit==49 || $hit==55 || $hit==61) {
							echo "<br>";
						}

							if ($query_ukuran0->num_rows()>0) {
				            foreach ($query_ukuran0->result() as $keyStok3) { 	

								$id_ukuran=$keyStok3->id_ukuran;
				            	
							}

				            ?>
							<div class="sc-item">
									<input onclick="set_ukuran(<?php echo $keyUkuran->id_ukuran."1"; ?>)" type="radio" value="<?php echo $keyUkuran->id_ukuran; ?>" name="sc" id="<?php echo $keyUkuran->id_ukuran."1"; ?>">
									<label for="<?php echo $keyUkuran->id_ukuran."1"; ?>"><?php echo $keyUkuran->nama_ukuran; ?></label>
								</div>
							<?php }else{ ?>

							<?php }
							$hit2++;
						}
						?>
						</div>
					</div>
					<div class="filter-widget">
						<form class="contact-form" action="<?php echo base_url('Home/cari_produk/') ?>" method="post" enctype="multipart/form-data">			
							
			        	<input type="hidden" id="v_warna" value="" name="v_warna">
			        	<input type="hidden" id="v_ukuran" value="" name="v_ukuran">
			            
			            <p><button type="submit" id="status" name="status" style="margin-bottom: 5%;" type="button" class="btn btn-fud2"><i class="fa fa-search"></i> Cari</button></p>
						</form>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						<?php

							if ($status_data=="kosong") { ?>
								<center><p align="right" style="font-size: 120%;"> " Produk Yang Anda Cari Sedang Kosong "</p></center>
							<?php }elseif ($status_data=="ganok") { ?>
								<center><p align="right" style="font-size: 120%;"> " Produk Yang Anda Cari Tidak Ditemukan "</p></center>
							<?php }
						    foreach ($array as $key) {	

						 ?>

						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<!-- <div class="tag-sale">ON SALE</div> -->
									<img src="<?php echo base_url('upload/produk/'.$key['foto']); ?>" alt="">
									<div class="pi-links">
										<a href="<?php echo base_url('Home/detail/'.$key['id_stok']) ?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
									</div>
								</div>
								<div class="pi-text">
									<h6><?php
							$ukuran=$key['id_ukuran'];
					            $query_cekUkuran=$this->db->query("SELECT * FROM tb_ukuran where id_ukuran=$ukuran;");

					            foreach ($query_cekUkuran->result() as $keyUkuran) {  
					            	echo "Rp. ".$keyUkuran->harga;
					            }							
							 ?></h6>
								<p>
								<?php 

								$bahan_produk=$key['id_produk'];
								$query_cekProduk=$this->db->query("SELECT * FROM tb_produk where id_produk=$bahan_produk;");

					            foreach ($query_cekProduk->result() as $keyProduk) {  
					            	echo $keyProduk->nama_produk;
					            }								 

							?> </p>
								</div>
							</div>
						</div>
					<?php 

					} ?>

						<div class="text-center w-100 pt-3">
							<!-- <button class="site-btn sb-line sb-dark">LOAD MORE</button> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->

	<!-- Footer section -->
<?php $this->load->view('front/footer') ?>

<script type="text/javascript">
	

  function set_warna($warna){
  	// alert($warna);
    // document.getElementById($warna).setAttribute('class','btn btn-fud2');
    document.getElementById("v_warna").value = $warna;
  }

  function set_ukuran($ukuran){
    // document.getElementById($ukuran).setAttribute('class','btn btn-fud2');
    var ukuran_value = document.getElementById($ukuran).value;
    document.getElementById("v_ukuran").value = ukuran_value;
  	// alert(ukuran_value);
  }

</script>