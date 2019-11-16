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
					<?php if ($this->session->flashdata('msg')== TRUE) : ?>
				    <div class="alert alert-success" id="notifikasi">
				      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				      <i class="fa fa-check"></i> <strong>Selamat!!</strong><?php echo $this->session->flashdata('msg'); ?>  
				    </div>
				 <?php endif; ?>  
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
					<p style="margin-top: 5%;">Belum punya akun? <a href="" data-toggle="modal" data-target="#registrasi">Registrasi</a></p>
				</div>
				<div class="col-lg-3">
					
				</div>
			</div>
		</div>
	</section>
	<!-- Contact section end -->
<div style="margin-top: 10%;">
	
</div>

<div class="modal fade" id="registrasi" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Registrasi</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

		<form class="contact-form" action="<?php echo base_url('Home/register/') ?>" method="post" enctype="multipart/form-data">
 		  <input style="margin-top: 7%;" name="nama" type="text" placeholder="Nama" required autocomplete="off">
 		  <input name="alamat" type="text" placeholder="Alamat" required autocomplete="off">
 		  <input name="telp" type="text" placeholder="Telpon" required autocomplete="off">
 		  <input name="email" type="email" placeholder="Email" required autocomplete="off">
 		  <input name="username" type="text" placeholder="Username" required autocomplete="off">
 		  <input name="password" type="password" placeholder="Password" required autocomplete="off">

 		  <center><button style="margin-top: 7%;" class="site-btn">Daftar</button></center>
          </form>
          </div>
          </div>
        </div>

      </div>
    </div>
  </div>

 
<?php $this->load->view('front/footer') ?>
