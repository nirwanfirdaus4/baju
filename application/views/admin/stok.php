<?php $this->load->view('admin/header_table') ?>
<?php $this->load->view('admin/navigasi') ?>
<!-- isi -->

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
<li><a href="#" class="active">Stok Produk</a> </li>
</ul>
<div class="page-title"> 
<!--    <i class="icon-custom-left"></i>
<h3>Data - <span class="semi-bold">Ukuran</span></h3> -->
</div>

<div class="row-fluid">
<div class="span12">
<div class="grid simple ">
<div class="grid-title">
<h4>Data <span class="semi-bold">Stok Produk</span></h4>
<div class="tools">
<!-- <a href="javascript:;" class="collapse"></a>
<a href="#grid-config" data-toggle="modal" class="config"></a>
<a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a> -->
<a href="<?php echo base_url('admin/Produk/tambahdataStok') ?>"><button type="button" class="btn btn-success btn-cons">Tambah Data</button></a>
</div>
</div>
<div class="grid-body ">
<table class="table table-striped" id="example2">
<thead>
<tr>
<th>No</th>
<th>Nama Produk</th>
<th>Ukuran</th>
<th>Warna</th>
<th>Jumlah Stok</th>
<th>Gambar</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<tr class="odd gradeX">
    <?php $no = 1;
    foreach ($array as $key) { ?>
        <td><?php echo $no; ?></td>
        <td><?php
        $produk = $this->db->query("SELECT * FROM tb_produk");
         $volt=$key['id_produk'];
        foreach ($produk->result() as $key7) {
          if ($key7->id_produk== $volt) {
            echo $key7->nama_produk;
          }
        }
        
        ?></td>
        <td><?php
        $ukuran = $this->db->query("SELECT * FROM tb_ukuran");
         $volt=$key['id_ukuran'];
        foreach ($ukuran->result() as $key2) {
          if ($key2->id_ukuran== $volt) {
            echo $key2->nama_ukuran;
          }
        }
        
        ?></td>
        <td><?php
        $warna = $this->db->query("SELECT * FROM tb_warna");
         $volt=$key['id_warna'];
        foreach ($warna->result() as $key2) {
          if ($key2->id_warna== $volt) {
            echo $key2->nama_warna;
          }
        }
        
        ?></td>
        <td><?php echo $key['jumlah_stok'] ?></td>
        <td><button data-toggle="modal" data-target="#myModal<?php echo $no; ?>" type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>    </td>
        <td>
            <button data-toggle="modal" data-target="#plus<?php echo $no; ?>" type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
            <a href="<?php echo base_url('admin/Produk/edit_stok/'.$key['id_stok']) ?>"><button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>    
            <a href="<?php echo base_url('admin/Produk/hapus_stok/'.$key['id_stok']) ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>         
        </td>
</tr>

<div class="modal fade" id="myModal<?php echo $no; ?>" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Gambar Produk</h4>
        </div>
        <div class="modal-body">
          <center><img style="margin-top: 7%; margin-bottom: 7%; " width="80%" src="<?php echo base_url('upload/produk/'.$key['foto']); ?>"></center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="plus<?php echo $no; ?>" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Stok</h4>
        </div>
        <div class="modal-body">

          <form action="<?php echo base_url('admin/Produk/plus_stok/'.$key['id_stok']) ?>" id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" method="post" class="validate">

          <div class="form-group">
          <label class="form-label">Tambahan</label>
          <div class="input-with-icon right">
          <i class=""></i>
          <input class="form-control" id="form1CardHolderName" name="plus" type="text" required>
          </div>
          </div>

        </div>
        <div class="modal-footer">
            <center>
          <button class="btn btn-primary" type="submit"><i class="icon-ok"></i> Tambahkan</button> 
          <button style="margin-left: 2%;" class="btn btn-warning" type="button" data-dismiss="modal">Batal</button>
          </center>
          </form>
        </div>
      </div>
    </div>
  </div>

        <?php $no++; } ?>

</tbody>
</table>
</div>
</div>
</div>
</div>


</div>
<div class="admin-bar" id="quick-access" style="display:">
<div class="admin-bar-inner">
<div class="form-horizontal">
<!-- <select id="val1" class="select2-wrapper m-r-10">
<option value="Gecko">Gecko</option>
<option value="Webkit">Webkit</option>
<option value="KHTML">KHTML</option>
<option value="Tasman">Tasman</option>
</select> -->
<select id="val2" class="select2-wrapper">
<option value="Internet Explorer 10">Internet Explorer 10</option>
<option value="Firefox 4.0">Firefox 4.0</option>
<option value="Chrome">Chrome</option>
</select>
</div>
<button class="btn btn-primary btn-cons btn-add" type="button">Add Browser</button>
<button class="btn btn-white btn-cons btn-cancel" type="button">Cancel</button>
</div>
</div>
<div class="addNewRow"></div>
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

<?php $this->load->view('admin/footer_table') ?>