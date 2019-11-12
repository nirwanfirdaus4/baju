<?php $this->load->view('front/header') ?>

	<!-- Page info -->
<!-- 	<div class="page-top-info">
		<div class="container">
			<h4>KONTAK</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Contact</a>
			</div>
		</div>
	</div> -->
	<!-- Page info end -->


	<!-- Contact section -->
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					
				</div>
				<div class="col-lg-6 contact-info">
					<center><h3>LOGIN</h3></center>
<!-- 					<p>Main Str, no 23, New York</p> 
					<p>+546 990221 123</p>
					<p>hosting@contact.com</p>
					<div class="contact-social">
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div> -->
					<form class="contact-form" action="<?php echo base_url('Home/aksi_login/') ?>" method="post" enctype="multipart/form-data">
						<input name="username" type="text" placeholder="Username">
						<input style="margin-top: 3%;" type="password" name="password" placeholder="Password">
<!-- 						<input type="text" placeholder="Subject">
						<textarea placeholder="Message"></textarea> -->
						<center><button style="margin-top: 7%;" class="site-btn">MASUK</button></center>
					</form>
					<p style="margin-top: 5%;">Belum punya akun? Registrasi</p>
				</div>
				<div class="col-lg-3">
					
				</div>
			</div>
		</div>
	</section>
	<!-- Contact section end -->
<div style="margin-top: 10%;">
	
</div>

<?php $this->load->view('front/footer') ?>