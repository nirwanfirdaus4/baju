<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>L.A Collections</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<!-- <link href="img/favicon.ico" rel="shortcut icon"/> -->
	<link href="<?php echo base_url('assets_front/img/favicon.ico') ?>" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"/> -->
	<link href="<?php echo base_url('assets_front/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets_front/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets_front/css/flaticon.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets_front/css/slicknav.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets_front/css/jquery-ui.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets_front/css/owl.carousel.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets_front/css/animate.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets_front/css/style.css') ?>" rel="stylesheet" type="text/css" />
<!-- 	<link rel="stylesheet" href="css/font-awesome.min.css"/> -->
	<!-- <link rel="stylesheet" href="css/flaticon.css"/> -->
	<!-- <link rel="stylesheet" href="css/slicknav.min.css"/> -->
	<!-- <link rel="stylesheet" href="css/jquery-ui.min.css"/> -->
<!-- 	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/> -->


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<!-- <a href="" class="site-logo"> -->
							<img class="log_la" width="70%" src="<?php echo base_url('assets_front/img/la_logo.png') ?>" alt="">
						<!-- </a> -->
					</div>
					<div class="col-xl-5 col-lg-4">
						<form class="header-search-form" action="<?php echo base_url('Home/show_search/') ?>" method="post" enctype="multipart/form-data">
							<input type="text" name="bahan_nama" placeholder="Cari ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-1 col-lg-1">
						
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel header_magic_1">
							<div class="up-item">
								<i class="flaticon-profile"></i>

								<?php 
									if ($this->session->userdata('hak_akses') == 2) { ?>
										<a href="#"><?php echo $this->session->userdata('ses_nama'); ?></a>
									<?php }else{ ?>
										<a href="<?php echo base_url('Home/login') ?>">Masuk</a>
									<?php }
								?>

							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>
										<?php
										$v_user =$this->session->userdata('id_user');
										if (empty($v_user)) {
										$v_user=0;						
										}						
								         $query_p6 = $this->db->query("SELECT * FROM tb_cart where id_user=$v_user AND status='aktif'");
								         		$hits=0;
								                foreach ($query_p6->result() as $keyf6) {
								                	$hits++;
								                }
								                echo $hits;
										?>

									</span>
								</div>
								<a href="<?php 
									if($v_user==0){
										echo base_url('Home/login'); 							
									}else{
										echo base_url('Home/keranjang/'.$v_user); 							
									}

								?>">Keranjang</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<center>
				<ul class="main-menu">
					<li><a href="<?php echo base_url('Home/'); ?>">Beranda</a></li>
					<li><a href="<?php echo base_url('Home/produk/'); ?>">Produk</a></li>
					<li><a href="<?php echo base_url('Home/kontak/'); ?>">Kontak</a></li>
					<li class="header_magics">
					
						<?php 
							if ($this->session->userdata('hak_akses') == 2) { 
								$ses_user=$this->session->userdata('id_user');
								$ses_nama_user=$this->session->userdata('ses_nama');
								?>
						<a href=""><?php echo $ses_nama_user; ?></a>
						<ul class="sub-menu">
							<li><a href="<?php echo base_url('Home/update_profil/'.$ses_user); ?>">Profil Saya</a></li>
							<li><a href="<?php echo base_url('Home/keranjang/'.$ses_user); ?>">Keranjang Saya</a></li>
							<li><a href="<?php echo base_url('Home/transaksi/'.$ses_user); ?>">Transaksi Saya</a></li>
							<li><a href="<?php echo base_url('Home/logout_x/'); ?>">Keluar</a></li>
						</ul>
							<?php }else{ ?>
								<a href="<?php echo base_url('Home/login/'); ?>">Masuk</a>
							<?php }
								?>
					
					</li>
					<li class="header_magics2">
					
						<?php 
							if ($this->session->userdata('hak_akses') == 2) { 
								$ses_user=$this->session->userdata('id_user');
								$ses_nama_user=$this->session->userdata('ses_nama');
								?>
						<a href="">Akun</a>
						<ul class="sub-menu">
							<li><a href="<?php echo base_url('Home/update_profil/'.$ses_user); ?>">Profil</a></li>
							<li><a href="<?php echo base_url('Home/transaksi/'.$ses_user); ?>">Transaksi Saya</a></li>
							<li><a href="<?php echo base_url('Home/logout_x/'); ?>">Keluar</a></li>
						</ul>
							<?php }else{

							}
								?>
					
					</li>
<!-- 					<li><a href="#">Jewelry
						<span class="new">New</span>
					    </a>
					</li> -->
<!-- 					<li><a href="#">Akun</a>
						<ul class="sub-menu">
							<li><a href="#">Masuk</a></li>
							<li><a href="#">Registrasi</a></li>
						</ul>
					</li> -->
<!-- 					<li><a href="#">Pages</a>
						<ul class="sub-menu">
							<li><a href="<?php echo base_url('Home/produk/'); ?>">Product Page</a></li>
							<li><a href="<?php echo base_url('Home/keranjang/'); ?>">Cart Page</a></li>
							<li><a href="<?php echo base_url('Home/transaksi/'); ?>">Checkout Page</a></li>
							<li><a href="<?php echo base_url('Home/kontak/'); ?>">Contact Page</a></li>
						</ul>
					</li> -->
					<!-- <li><a href="#">Blog</a></li> -->
				</ul>
				</center>
			</div>
		</nav>
	</header>
	<!-- Header section end -->