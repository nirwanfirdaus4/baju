
	<div class="page-container row-fluid">

		<div class="page-sidebar " id="main-menu">

			<div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
				<p class="menu-title sm">NAVIGATION</p>
				<ul>
					<li class="<?php if($this->uri->segment(2)=="Index_admin"){echo "open active";}?>">
						<a href="<?php echo base_url('admin/Index_admin'); ?>"> <i class="material-icons">home</i> <span class="title">Dashboard</span></a>
					</li>
					<li class="<?php if($this->uri->segment(2)=="Transaksi"){echo "open active";}?>">
						<a href="javascript:;"> <i class="material-icons">panorama_horizontal</i> <span class="title">Produk</span> <span class=" arrow"></span> </a>
						<ul class="sub-menu">
							<li> <a href="<?php echo base_url('admin/Produk/ukuran'); ?>">Ukuran</a> </li>
							<li> <a href="<?php echo base_url('admin/Produk/warna'); ?>">Warna</a> </li>
							<li> <a href="<?php echo base_url('admin/Produk/daftarProduk'); ?>">Daftar Produk</a> </li>
							<li> <a href="<?php echo base_url('admin/Produk/stok'); ?>">Stok Produk</a> </li>
						</ul>
					</li>
					<li class="<?php if($this->uri->segment(2)=="Transaksi"){echo "open active";}?>">
						<a href="<?php echo base_url('admin/Produk/transaksi'); ?>"> <i class="fa fa-shopping-cart"></i> <span class="title">Transaksi</span>
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url('Home/logout'); ?>"><i class="fa fa-sign-out"></i><span class="title"> Logout</span></a>
					</li>
					
				</ul>
				<div class="side-bar-widgets">
					
				</div>
				<div class="clearfix"></div>

			</div>
		</div>
		<!-- <a href="#" class="scrollup">Scroll</a> -->
		<div class="footer-widget">
			<center>envadev.com</center>
			
		</div>
