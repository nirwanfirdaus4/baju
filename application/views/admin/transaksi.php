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
<p>Transaksi</p>
</li>
<li><a href="#" class="active">Rekap Transaksi</a> </li>
</ul>
<div class="page-title"> 
<!--    <i class="icon-custom-left"></i>
<h3>Data - <span class="semi-bold">Ukuran</span></h3> -->
</div>

<div class="row-fluid">
<div class="span12">
<div class="grid simple ">
<div class="grid-title">
<h4>Data <span class="semi-bold">Transaksi</span></h4>
<div class="tools">
<!-- <a href="javascript:;" class="collapse"></a>
<a href="#grid-config" data-toggle="modal" class="config"></a>
<a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a> -->
</div>
</div>
<div class="grid-body ">
<table class="table table-striped" id="example2">
<thead>
<tr>
<!-- <th>No</th> -->
<th>User</th>
<th>Pesanan</th>
<th>Ekspedisi</th>
<th>Total</th>
<th>Penerima & CP</th>
<th>Bukti Transfer</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<tr class="odd gradeX">
    <?php $no = 1;
    foreach ($array as $key) { ?>
        <td>
         <?php
         $idUser=$key['id_user'];         
         $query_cekUser=$this->db->query("SELECT * FROM tb_user where id_user=$idUser");
         foreach ($query_cekUser->result() as $keyUser) {
          echo $keyUser->nama_user;
         }?>           
         </td>
        <td>
          <button data-toggle="modal" data-target="#pesan<?php echo $no; ?>" type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>          
        </td>
        <td><?php echo "<b>tujuan:</b><br>".$key['tujuan_pengiriman']."<br><br><b>".$key['ekspedisi']."</b><br>Rp. ".$key['biaya_ekspedisi'] ?></td>
        <td><?php echo "Rp. ".$key['total_biaya'] ?></td>
        <td><?php echo $key['penerima'] ?><br>[ <?php echo $key['cp'] ?> ]</td>        
        <td>
        <?php
          if ($key['status_transaksi']=="validasi_pesanan" || $key['status_transaksi']=="pembayaran") { ?>
            <button disabled="disabled" type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
          <?php }else{ ?>
            <button data-toggle="modal" data-target="#myModal<?php echo $no; ?>" type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
          <?php }
        ?>
        </td>
        <td>
          <?php

          if ($key['status_transaksi']=="validasi_pesanan") { ?>
            <button type="button" data-toggle="modal" data-target="#modalValidPesan<?php echo $no; ?>" class="btn btn-validasiPesan"><i class="fa fa-clipboard"></i> Validasi pesanan</button>          
          <?php }elseif ($key['status_transaksi']=="pembayaran") { ?>
              <button type="button" disabled="disabled" class="btn btn-primary"><i class="fa fa-credit-card"></i> Pembayaran</button>          
          <?php }elseif ($key['status_transaksi']=="validasi_pembayaran"){ ?>
            <button type="button" data-toggle="modal" data-target="#modalValidPembayaran<?php echo $no; ?>" class="btn btn-primary"><i class="fa fa-clipboard"></i> Validasi pembayaran</button>                   
          <?php }elseif ($key['status_transaksi']=="invalid"){ ?>
              <button data-toggle="modal" data-target="#modalValidPembayaran<?php echo $no; ?>" type="button" class="btn btn-danger"><i class="fa fa-ban"></i> Tidak Valid</button>          
          <?php }else{ ?>
              <button data-toggle="modal" data-target="#modalValidPembayaran<?php echo $no; ?>" type="button" class="btn btn-primary"><i class="fa fa-check-square"></i> Valid</button>            
          <?php }

          ?>
        </td>
</tr>

<div class="modal fade" id="modalValidPesan<?php echo $no; ?>" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Pesanan</h4>
        </div>
        <div class="modal-body">

          <form action="<?php echo base_url('admin/Produk/validasi_pesanan/'.$key['id_transaksi']) ?>" id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" method="post" class="validate" enctype="multipart/form-data">

          <div class="form-group">
          <label class="form-label">Tujuan</label>
          <div class="input-with-icon right">
          <i class=""></i>
          <input class="form-control" value="<?php echo $key['tujuan_pengiriman'] ?>" type="textarea" readonly="readonly">
          </div>
          </div>
          <div class="form-group">
          <label class="form-label">Ekspedisi</label>
          <div class="input-with-icon right">
          <i class=""></i>
          <input class="form-control" name="nama_ekspedisi" type="text" placeholder="">
          </div>
          </div>          
          <div class="form-group">
          <label class="form-label">Biaya</label>
          <div class="input-with-icon right">
          <i class=""></i>
          <input class="form-control" value="" id="biaya_ekspedisi" name="biaya_ekspedisi" type="text" required="required">
          </div>
          </div>

        </div>
        <div class="modal-footer">
          <div class="pull-right">
          <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Validasi</button>
          <button class="btn btn-white btn-cons" type="button" data-dismiss="modal">Batal</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="modalValidPembayaran<?php echo $no; ?>" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Validasi Pembayaran</h4>
        </div>
        <div class="modal-body">

          
          <center><p>Dengan memvalidasi transaksi ini, maka anda menyatakan bahwa pembayaran oleh user sudah benar dan telah diterima oleh anda, lanjutkan validasi?</p></center>
          <form action="<?php echo base_url('admin/Produk/validasi_pembayaran/'.$key['id_transaksi']) ?>" id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" method="post" class="validate">

        </div>
        <div class="modal-footer">
            <center>
            <a href="<?php echo base_url('admin/Produk/validasi_pembayaran/'.$key['id_transaksi']."/valid"); ?>"><button style="margin-left: 2%;" class="btn btn-primary" type="button">Validasi</button></a>
            <a href="<?php echo base_url('admin/Produk/validasi_pembayaran/'.$key['id_transaksi']."/invalid"); ?>"><button style="margin-left: 2%;" class="btn btn-danger" type="button">Tidak Valid</button></a>            

          <button style="margin-left: 2%;" class="btn btn-warning" type="button" data-dismiss="modal">Batal</button>
          </center>
          </form>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="myModal<?php echo $no; ?>" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bukti Transfer</h4>
        </div>
        <div class="modal-body">
          <center><img style="margin-top: 7%; margin-bottom: 7%; " width="80%" src="<?php echo base_url('upload/bukti/'.$key['bukti_transfer']); ?>"></center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="pesan<?php echo $no; ?>" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Daftar Pesanan</h4>
        </div>
        <div class="modal-body" style="padding-top: 7%;">
          <?php 
          $hargaTotal=0;
          for ($i=1; $i <=10 ; $i++) { 
            $cart= $key['id_cart'.$i];
            if ($cart!="0") {

          $query_cekCart=$this->db->query("SELECT * FROM tb_cart where id_cart=$cart");

              foreach ($query_cekCart->result() as $keyCart) {

              $bahan_warna = $keyCart->id_warna;
              $bahan_ukuran = $keyCart->id_ukuran;
              $query_warna=$this->db->query("SELECT * FROM tb_warna where id_warna=$bahan_warna");
              $query_ukuran=$this->db->query("SELECT * FROM tb_ukuran where id_ukuran=$bahan_ukuran");
              foreach ($query_warna->result() as $keyWarna) {
                $is_warna = $keyWarna->nama_warna;
              }
              foreach ($query_ukuran->result() as $keyUkuran) {
                $is_ukuran = $keyUkuran->nama_ukuran;
              }
          $query_cekCart=$this->db->query("SELECT * FROM tb_cart where id_cart=$cart");

          $query_cekProduk=$this->db->query("SELECT * FROM tb_produk where id_produk=$keyCart->id_produk");

          foreach ($query_cekProduk->result() as $keyProduk) {
                        echo "<p style='font-size:110%;'>"."<b>".$keyProduk->nama_produk."</b> - Ukuran <b>".$is_ukuran."</b> - Warna <b>".$is_warna."</b>"." (".$keyCart->jumlah_barang.")<br></p>";
                        $hargaTotal=$hargaTotal+$keyCart->harga;
                   }

              }

            }
          }
              echo "<br><p style='font-size:110%;'>Harga :<br><b>Rp. ".$hargaTotal."</b></p>";
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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