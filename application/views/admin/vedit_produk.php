<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navigasi') ?>

<div class="page-content">

<div id="portlet-config" class="modal hide">
<div class="modal-header">
<button data-dismiss="modal" class="close" type="button"></button> 
<h3>Widget Settings</h3>
</div>
<div class="modal-body"> Widget settings form goes here </div>
</div>
<div class="clearfix"></div>
<div class="content">
<ul class="breadcrumb">
<li>
<p>Produk</p>
</li>
<li><a href="#" class="active">Tambah Produk</a> </li>
</ul>
<div class="page-title"> 
<!-- 	<i class="icon-custom-left"></i>
<h3>Data - <span class="semi-bold">Ukuran</span></h3> -->
</div>

<div class="row-fluid">
<div class="span12">
<div class="grid simple ">
<div class="grid-title">
<!-- <h4>Data <span class="semi-bold">Ukuran</span></h4> -->
<!-- <div class="tools">
<a href="javascript:;" class="collapse"></a>
<a href="#grid-config" data-toggle="modal" class="config"></a>
<a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a>
</div> -->
</div>
<div class="grid-body no-border">
<form action="<?php echo base_url('admin/Produk/edit_produk/'.$data[0]['id_produk']) ?>" id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" method="post" class="validate" enctype="multipart/form-data">

<div class="form-group">
<label class="form-label">Nama Produk</label>
<div class="input-with-icon right">
<i class=""></i>
<input class="form-control" id="form1CardHolderName" name="nama_produk" value="<?php echo  $data[0]['nama_produk'];?>" type="text" required>
</div>
</div>
<div class="form-group">
<label class="form-label">Ukuran</label>

<select class="form-control" name="ukuran" required="required">
	  <option value="zero">--Pilih Ukuran--</option>
	  <?php 
	  $ukuran = $this->db->query("SELECT * FROM tb_ukuran");
	  foreach($ukuran->result() as $row_kat)  { ?>
	    <option value="<?php echo $row_kat->id_ukuran;?>"<?php echo ($row_kat->id_ukuran == $data[0]['ukuran'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->nama_ukuran; ?></option>
	  <?php } ?>

</select>
<!-- <input class="form-control" id="form1Amount" name="ukuran" type="number" required> -->
</div>
<div class="form-group">
<label class="form-label">Warna</label>
<!-- <input class="form-control" id="form1Amount" name="warna" type="number" required> -->
<select class="form-control" name="warna" required="required">
	<option value="Abu-abu"<?php echo ($data[0]['warna'] == "Abu-abu" ? 'selected="selected"' : ''); ?>>Abu-abu</option>
	<option value="Dusty Pink"<?php echo ($data[0]['warna'] == "Dusty Pink" ? 'selected="selected"' : ''); ?>>Dusty Pink</option>
	<option value="Ungu"<?php echo ($data[0]['warna'] == "Ungu" ? 'selected="selected"' : ''); ?>>Ungu</option>
	<option value="Navy"<?php echo ($data[0]['warna'] == "Navy" ? 'selected="selected"' : ''); ?>>Navy</option>
	<option value="Peach"<?php echo ($data[0]['warna'] == "Peach" ? 'selected="selected"' : ''); ?>>Peach</option>
	<option value="Merah Maroon"<?php echo ($data[0]['warna'] == "Merah Maroon" ? 'selected="selected"' : ''); ?>>Merah Maroon</option>
<!-- 	<option value="Dusty Pink">Dusty Pink</option>
	<option value="Ungu">Ungu</option>
	<option value="Navy">Navy</option>
	<option value="Peach">Peach</option>
	<option value="Merah Maroon">Merah Maroon</option> -->
</select>

</div>
<div class="form-group">
<label class="form-label">Foto Produk</label>
	<input type="file" name="foto">
</div>

<div class="form-actions">
<div class="pull-right">
<button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Simpan</button>
<a href="<?php echo base_url('admin/Produk/daftarProduk'); ?>"><button class="btn btn-white btn-cons" type="button">Batal</button></a>
</div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>

<div class="chat-window-wrapper">
<div id="main-chat-wrapper" class="inner-content">
<div class="chat-window-wrapper scroller scrollbar-dynamic" id="chat-users">
<div class="chat-header">
<div class="pull-left">
<input type="text" placeholder="search">
</div>
<div class="pull-right">
<a href="#" class="">
<div class="iconset top-settings-dark "></div>
</a>
</div>
</div>
<div class="side-widget">
<div class="side-widget-title">group chats</div>
<div class="side-widget-content">
<div id="groups-list">
<ul class="groups">
<li>
<a href="#">
<div class="status-icon green"></div>Office work</a>
</li>
<li>
<a href="#">
<div class="status-icon green"></div>Personal vibes</a>
</li>
</ul>
</div>
</div>
</div>
<div class="side-widget fadeIn">
<div class="side-widget-title">favourites</div>
<div id="favourites-list">
<div class="side-widget-content">
<div class="user-details-wrapper active" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
<div class="user-profile">
<img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
</div>
<div class="user-details">
<div class="user-name">
Jane Smith
</div>
<div class="user-more">
Hello you there?
</div>
</div>
<div class="user-details-status-wrapper">
<span class="badge badge-important">3</span>
</div>
<div class="user-details-count-wrapper">
<div class="status-icon green"></div>
</div>
<div class="clearfix"></div>
</div>
<div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">
<div class="user-profile">
<img src="assets/img/profiles/c.jpg" alt="" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" width="35" height="35">
</div>
<div class="user-details">
<div class="user-name">
David Nester
</div>
<div class="user-more">
Busy, Do not disturb
</div>
</div>
<div class="user-details-status-wrapper">
<div class="clearfix"></div>
</div>
<div class="user-details-count-wrapper">
<div class="status-icon red"></div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
<div class="side-widget">
<div class="side-widget-title">more friends</div>
<div class="side-widget-content" id="friends-list">
<div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
<div class="user-profile">
<img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
</div>
<div class="user-details">
<div class="user-name">
Jane Smith
</div>
<div class="user-more">
Hello you there?
</div>
</div>
<div class="user-details-status-wrapper">
</div>
<div class="user-details-count-wrapper">
<div class="status-icon green"></div>
</div>
<div class="clearfix"></div>
</div>
<div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">
<div class="user-profile">
<img src="assets/img/profiles/h.jpg" alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">
</div>
<div class="user-details">
<div class="user-name">
David Nester
</div>
<div class="user-more">
Busy, Do not disturb
</div>
</div>
<div class="user-details-status-wrapper">
<div class="clearfix"></div>
</div>
<div class="user-details-count-wrapper">
<div class="status-icon red"></div>
</div>
<div class="clearfix"></div>
</div>
<div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
<div class="user-profile">
<img src="assets/img/profiles/c.jpg" alt="" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" width="35" height="35">
</div>
<div class="user-details">
<div class="user-name">
Jane Smith
</div>
<div class="user-more">
Hello you there?
</div>
</div>
<div class="user-details-status-wrapper">
</div>
<div class="user-details-count-wrapper">
<div class="status-icon green"></div>
</div>
<div class="clearfix"></div>
</div>
<div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">
<div class="user-profile">
<img src="assets/img/profiles/h.jpg" alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">
</div>
<div class="user-details">
<div class="user-name">
David Nester
</div>
<div class="user-more">
Busy, Do not disturb
</div>
</div>
<div class="user-details-status-wrapper">
<div class="clearfix"></div>
</div>
<div class="user-details-count-wrapper">
<div class="status-icon red"></div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
<div class="chat-window-wrapper" id="messages-wrapper" style="display:none">
<div class="chat-header">
<div class="pull-left">
<input type="text" placeholder="search">
</div>
<div class="pull-right">
<a href="#" class="">
<div class="iconset top-settings-dark "></div>
</a>
</div>
</div>
<div class="clearfix"></div>
<div class="chat-messages-header">
<div class="status online"></div><span class="semi-bold">Jane Smith(Typing..)</span>
<a href="#" class="chat-back"><i class="icon-custom-cross"></i></a>
</div>
<div class="chat-messages scrollbar-dynamic clearfix">
<div class="inner-scroll-content clearfix">
<div class="sent_time">Yesterday 11:25pm</div>
<div class="user-details-wrapper ">
<div class="user-profile">
<img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
</div>
<div class="user-details">
<div class="bubble">
Hello, You there?
</div>
</div>
<div class="clearfix"></div>
<div class="sent_time off">Yesterday 11:25pm</div>
</div>
<div class="user-details-wrapper ">
<div class="user-profile">
<img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
</div>
<div class="user-details">
<div class="bubble">
How was the meeting?
</div>
</div>
<div class="clearfix"></div>
<div class="sent_time off">Yesterday 11:25pm</div>
</div>
<div class="user-details-wrapper ">
<div class="user-profile">
<img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
</div>
<div class="user-details">
<div class="bubble">
Let me know when you free
</div>
</div>
<div class="clearfix"></div>
<div class="sent_time off">Yesterday 11:25pm</div>
</div>
<div class="sent_time ">Today 11:25pm</div>
<div class="user-details-wrapper pull-right">
<div class="user-details">
<div class="bubble sender">
Let me know when you free
</div>
</div>
<div class="clearfix"></div>
<div class="sent_time off">Sent On Tue, 2:45pm</div>
</div>
</div>
</div>
<div class="chat-input-wrapper" style="display:none">
<textarea id="chat-message-input" rows="1" placeholder="Type your message"></textarea>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

</div>

<?php $this->load->view('admin/footer') ?>