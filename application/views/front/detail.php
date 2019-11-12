<?php $this->load->view('front/header') ?>

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Detail Produk</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Detail</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<!-- <a href="./category.html"> &lt;&lt; Back to Category</a> -->
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="">
						<img class="product-big-img" src="<?php echo base_url('upload/produk/'.$data[0]['foto']); ?>" alt="">
					</div>
<!-- 					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="<?php echo base_url('assets_front/img/single-product/1.jpg'); ?>"><img src="<?php echo base_url('assets_front/img/single-product/thumb-1.jpg'); ?>" alt=""></div>
							<div class="pt" data-imgbigurl="<?php echo base_url('assets_front/img/single-product/2.jpg'); ?>"><img src="<?php echo base_url('assets_front/img/single-product/thumb-2.jpg'); ?>" alt=""></div>
							<div class="pt" data-imgbigurl="<?php echo base_url('assets_front/img/single-product/3.jpg'); ?>"><img src="<?php echo base_url('assets_front/img/single-product/thumb-3.jpg'); ?>" alt=""></div>
							<div class="pt" data-imgbigurl="<?php echo base_url('assets_front/img/single-product/4.jpg'); ?>"><img src="<?php echo base_url('assets_front/img/single-product/thumb-4.jpg'); ?>" alt=""></div>
						</div>
					</div> -->
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title" style="font-size: 260% !important;"><?php

					$temp_nama=$data[0]['id_produk']; 
		            $query_Produk=$this->db->query("SELECT * FROM tb_produk where id_produk=$temp_nama;");

		            foreach ($query_Produk->result() as $keyPro) {  

		            	if ($keyPro->id_produk==$temp_nama) {
			            	echo $keyPro->nama_produk;
		            	}
		            }

					?></h2>
					<h3 class="p-price"><?php 
					$ukuran=$data[0]['id_ukuran'];
					            $query_cekUkuran=$this->db->query("SELECT * FROM tb_ukuran where id_ukuran=$ukuran;");

					            foreach ($query_cekUkuran->result() as $keyUkuran) {  
					            	echo "Rp. ".$keyUkuran->harga;
					            }
					 ?></h3>
<!-- 					<h4 class="p-stock">Available: <span>In Stock</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div> -->
<!-- 					<div class="p-review">
						<a href="">3 reviews</a>|<a href="">Add your review</a>
					</div> -->
<form action="<?php echo base_url('Home/tambah_cart/') ?>" id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" method="post" class="validate" enctype="multipart/form-data">
					<p style="font-weight: bold; font-size: 112%; margin-top: 10%;">WARNA</p>				
					<div class="filter-widget mb-0">
						<div class="fw-color-choose">
							<?php

							$key0=$data[0]['id_stok'];
							$query_stok0 = $this->db->query("SELECT * FROM tb_stok where id_stok=$key0");
							$query_warna0 = $this->db->query("SELECT * FROM tb_warna");

				            foreach ($query_stok0->result() as $keyStok) { 
								$barang_stok=$keyStok->id_produk;

								$hit=0;
					            foreach ($query_warna0->result() as $keyWarna) { 
									if ($hit==7 || $hit==13 || $hit==19 || $hit==25 || $hit==31 || $hit==37 || $hit==43 || $hit==49 || $hit==55 || $hit==61) {
										echo "<br>";
									}

									$key1=$keyWarna->id_warna;
									$query_stok1 = $this->db->query("SELECT * FROM tb_stok where id_produk=$barang_stok AND id_warna=$key1");

									if ($query_stok1->num_rows()>0) {
							            foreach ($query_stok1->result() as $keyStok2) { 
											$show1=$keyStok2->jumlah_stok;
											$show2=$keyStok2->id_produk;
							            }
											$show3=$keyWarna->id_warna;
										?>	

										<input type="hidden" value="<?php echo $key0; ?>" name="id_stok">
										<input type="hidden" value="<?php echo $barang_stok; ?>" name="id_produk">
										<div class="cs-item" >
											<input type="radio" value="<?php echo $show3; ?>" name="cs" id="<?php echo "cs-".$hit; ?>">

											<label class="cs-gray" for="<?php echo "cs-".$hit; ?>" style="background:<?php echo $keyWarna->kode_warna;?>;">

										<a href="<?php echo base_url('Home/show/'.$show2.'/'.$show3); ?>">	
												<span>(<?php 
													$total=0;
										            foreach ($query_stok1->result() as $keyStok2) { 
														$total= $total+$keyStok2->jumlah_stok;
										            }
										            echo $total;
													?>)
												</span>
												</a>													
											</label>

										</div>
									<?php }else{ ?>
										<div class="cs-item" >
											<input type="radio" disabled="disabled" name="cs" id="<?php echo "cs-".$hit; ?>">
											<label disabled="disabled" class="cs-gray" for="<?php echo "cs-".$hit; ?>" style="background:<?php echo $keyWarna->kode_warna;?>;">
												<span>(0)</span>
											</label>
										</div>
									<?php }
									$hit++;
								}
							}
							?>

						</div>
					</div> 
					<p style="font-weight: bold; font-size: 112%; margin-top: 10%;">UKURAN</p>				
					<div class="fw-size-choose">
						<?php

						$query_ukuran0 = $this->db->query("SELECT * FROM tb_ukuran");
						$produk9=$data[0]['id_produk'];

						$hit2=1;
			            foreach ($query_ukuran0->result() as $keyUkuran) { 						

						if ($hit2==7 || $hit==13 || $hit==19 || $hit==25 || $hit==31 || $hit==37 || $hit==43 || $hit==49 || $hit==55 || $hit==61) {
							echo "<br>";
						}
							$ukuran9=$keyUkuran->id_ukuran;
							$nama_ukuran9=$keyUkuran->nama_ukuran;

						$query_stok0 = $this->db->query("SELECT * FROM tb_stok where id_produk=$produk9 AND id_ukuran=$ukuran9 AND id_warna=$warna_pilihan");

							if ($query_stok0->num_rows()>0) {
				            foreach ($query_stok0->result() as $keyStok3) { 	

								$id_ukuran=$keyStok3->id_ukuran;
				            	
							}

				            ?>
							<div class="sc-item">
									<input type="radio" value="<?php echo $id_ukuran; ?>" name="sc" id="<?php echo $id_ukuran."size" ; ?>">
									<label for="<?php echo $id_ukuran."size" ; ?>"><?php echo $nama_ukuran9 ; ?></label>
								</div>
							<?php }else{ ?>
								<div class="sc-item disable">
									<input type="radio" name="sc" id="<?php echo $id_ukuran."size" ; ?>" disabled="disabled">
									<label for="<?php echo $id_ukuran."size" ; ?>"><?php echo $nama_ukuran9 ; ?></label>
								</div>
							<?php }
							$hit2++;
						}
						?>
	
					</div>

					<div class="quantity">
						<p>Jumlah</p>
                        <div class="pro-qty"><input name="qu" id="qu" type="text" value="1"></div>
                    </div>

                    <button class="btn site-btn">ADD TO CART</button>                    
					</form>
					<!-- <a href="#" class="site-btn">ADD TO CART</a> -->
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
									<p>Approx length 66cm/26" (Based on a UK size 8 sample)</p>
									<p>Mixed fibres</p>
									<p>The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5'8"</p>
								</div>
							</div>
						</div>
<!-- 						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="<?php echo base_url('assets_front/img/cards.png'); ?>" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div> -->
<!-- 						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div> -->
					</div>
					<div class="social-sharing">
<!-- 						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section style="margin-top: 5%;" class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>PRODUK TERKAIT</h2>
			</div>
			<div class="product-slider owl-carousel">
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?php echo base_url('assets_front/img/product/1.jpg'); ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">New</div>
						<img src="<?php echo base_url('assets_front/img/product/2.jpg'); ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Black and White Stripes Dress</p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?php echo base_url('assets_front/img/product/3.jpg'); ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
						<div class="pi-pic">
							<img src="<?php echo base_url('assets_front/img/product/4.jpg'); ?>" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?php echo base_url('assets_front/img/product/6.jpg'); ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->


<?php $this->load->view('front/footer') ?>

