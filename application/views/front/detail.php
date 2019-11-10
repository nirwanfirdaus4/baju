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
					<h2 class="p-title" style="font-size: 260% !important;"><?php echo $data[0]['nama_produk'] ?></h2>
					<h3 class="p-price"><?php 
					$ukuran=$data[0]['ukuran'];
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
						<p style="font-weight: bold; font-size: 112%; margin-top: 10%;">SIZE</p>					
					<div class="fw-size-choose">
						<div class="sc-item">
							<input type="radio" name="sc" id="1-size">
							<label for="1-size">32</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="2-size">
							<label for="2-size">34</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="3-size" checked="">
							<label for="3-size">36</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="4-size">
							<label for="4-size">38</label>
						</div>
						<div class="sc-item disable">
							<input type="radio" name="sc" id="5-size" disabled>
							<label for="5-size">40</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="6-size">
							<label for="6-size">42</label>
						</div>
						<br>
						<div class="sc-item disable">
							<input type="radio" name="sc" id="7-size" disabled>
							<label for="7-size">40</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="8-size">
							<label for="8-size">42</label>
						</div>
						<div class="sc-item disable">
							<input type="radio" name="sc" id="9-size" disabled>
							<label for="9-size">40</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="10-size">
							<label for="10-size">42</label>
						</div>
						<div class="sc-item disable">
							<input type="radio" name="sc" id="11-size" disabled>
							<label for="11-size">40</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="12-size">
							<label for="12-size">42</label>
						</div>
					</div>
					<div class="quantity">
						<p>Quantity</p>
                        <div class="pro-qty"><input type="text" value="1"></div>
                    </div>
					<a href="#" class="site-btn">ADD TO CART</a>
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