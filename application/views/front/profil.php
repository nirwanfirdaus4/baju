<?php $this->load->view('front/header') ?>

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>PROFIL</h4>
			<div class="site-pagination">
				<a href="">Beranda</a> /
				<a href="">Profil</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Contact section -->
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 contact-info">
					<form class="contact-form" action="<?php echo base_url('Home/update_profil/'.$data[0]['id_user']) ?>" method="post">
						<input type="hidden" name="id_user" value="<?php echo $data[0]['id_user']; ?>">
						<label>Nama: </label>
						<input type="text" name="nama" value="<?php echo $data[0]['nama_user']; ?>">
						
						<label>Email: </label>
						<input type="email" name="email" value="<?php echo $data[0]['gmail']; ?>">
						
						<label>No Telpon: </label>
						<input type="text" name="telp" value="<?php echo $data[0]['telp']; ?>">
						
						<label>Username: </label>
						<input type="text" name="username" value="<?php echo $data[0]['username']; ?>">
						
						<label>Password: </label>
						<input type="password" name="password" value="<?php echo $data[0]['password']; ?>">
						
						<label>Alamat: </label>
						<textarea name="alamat"><?php echo $data[0]['alamat']; ?></textarea>
						<center>
							<button class="site-btn">UBAH PROFIL</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		
	</section>
	<!-- Contact section end -->
<div style="margin-top: 10%;">
	
</div>

<?php $this->load->view('front/footer') ?>