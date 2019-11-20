<?php $this->load->view('admin/header') ?>
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
	<div class="content sm-gutter">
		<div class="page-title">
		</div> 

		<div class="row">
			<div class="col-md-4 col-vlg-3 col-sm-6">
				<div class="tiles green m-b-10">
					<div class="tiles-body">
						<div class="controller">
<!-- 							<a href="javascript:;" class="reload"></a> -->
							<a href="javascript:;" class="remove"></a>
						</div>
						<div class="tiles-title text-black">REKAP JUMLAH </div>
						<div class="widget-stats">
							<div class="wrapper transparent">
								<?php 								
								$hot_rekap1=0;								
								$hot_rekap2=0;								
								$hot_rekap3=0;								
								$query_rekap=$this->db->query("SELECT * FROM tb_produk");
								$query_rekap2=$this->db->query("SELECT * FROM tb_warna");
								$query_rekap3=$this->db->query("SELECT * FROM tb_ukuran");

							        foreach ($query_rekap->result() as $val_rekap1) {
							        	$hot_rekap1++;
							        }
							        foreach ($query_rekap2->result() as $val_rekap2) {
							        	$hot_rekap2++;
							        }
							        foreach ($query_rekap3->result() as $val_rekap3) {
							        	$hot_rekap3++;
							        }
								?>
								<span class="item-title">Produk</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $hot_rekap1; ?>" data-animation-duration="700">0</span>
							</div>
						</div>
						<div class="widget-stats">
							<div class="wrapper transparent">
								<span class="item-title">Ukuran</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $hot_rekap2; ?>" data-animation-duration="700">0</span>
							</div>
						</div>
						<div class="widget-stats ">
							<div class="wrapper last">
								<span class="item-title">Warna</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $hot_rekap3; ?>" data-animation-duration="700">0</span>
							</div>
						</div>
						<div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
							<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="100%"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-vlg-3 col-sm-6">
				<div class="tiles blue m-b-10">
					<div class="tiles-body">
						<div class="controller">
							<!-- <a href="javascript:;" class="reload"></a> -->
							<a href="javascript:;" class="remove"></a>
						</div>
						<div class="tiles-title text-black">TRANSAKSI </div>
						<div class="widget-stats">
							<div class="wrapper transparent">
							<?php
								$hot_rekap4=0;								
								$hot_rekap5=0;								
								$hot_rekap6=0;								
								$query_rekap4=$this->db->query("SELECT * FROM tb_transaksi");
								$query_rekap5=$this->db->query("SELECT DISTINCT id_user FROM tb_transaksi");
								$query_rekap6=$this->db->query("SELECT * FROM tb_user");

							        foreach ($query_rekap4->result() as $val_rekap4) {
							        	$hot_rekap4++;
							        }
							        foreach ($query_rekap5->result() as $val_rekap5) {
							        	$hot_rekap5++;
							        }
							        foreach ($query_rekap6->result() as $val_rekap6) {
							        	$hot_rekap6++;
							        }
							?>								
								<span class="item-title">Pelanggan</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $hot_rekap5."/".$hot_rekap5 ?>" data- animation-duration="700">0</span>
							</div>
						</div>
						<div class="widget-stats">
							<div class="wrapper transparent">
								<span class="item-title">Transaksi</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $hot_rekap4 ?>" data-animation-duration="700">0</span>
							</div>
						</div>
						<div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
							<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="100%"></div>
						</div>
					</div>
				</div>
			</div>
<!-- 			<div class="col-md-4 col-vlg-3 col-sm-6">
				<div class="tiles purple m-b-10">
					<div class="tiles-body">
						<div class="controller">
							<a href="javascript:;" class="reload"></a>
							<a href="javascript:;" class="remove"></a>
						</div>
						<div class="tiles-title text-black">SERVER LOAD </div>
						<div class="widget-stats">
							<div class="wrapper transparent">
								<span class="item-title">Overall Load</span> <span class="item-count animate-number semi-bold" data-value="5695" data-animation-duration="700">0</span>
							</div>
						</div>
						<div class="widget-stats">
							<div class="wrapper transparent">
								<span class="item-title">Today's</span> <span class="item-count animate-number semi-bold" data-value="568" data-animation-duration="700">0</span>
							</div>
						</div>
						<div class="widget-stats ">
							<div class="wrapper last">
								<span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="12459" data-animation-duration="700">0</span>
							</div>
						</div>
						<div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
							<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="90%"></div>
						</div>
						<div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span>
						</div>
					</div>
				</div>
			</div> -->
			<div class="col-md-4 col-vlg-3 visible-xlg visible-sm col-sm-6">
				<div class="tiles red m-b-10">
					<div class="tiles-body">
						<div class="controller">
							<a href="javascript:;" class="reload"></a>
							<a href="javascript:;" class="remove"></a>
						</div>
						<div class="tiles-title text-black">OVERALL SALES </div>
						<div class="widget-stats">
							<div class="wrapper transparent">
								<span class="item-title">Overall Sales</span> <span class="item-count animate-number semi-bold" data-value="5669" data-animation-duration="700">0</span>
							</div>
						</div>
						<div class="widget-stats">
							<div class="wrapper transparent">
								<span class="item-title">Today's</span> <span class="item-count animate-number semi-bold" data-value="751" data-animation-duration="700">0</span>
							</div>
						</div>
						<div class="widget-stats ">
							<div class="wrapper last">
								<span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="1547" data-animation-duration="700">0</span>
							</div>
						</div>
						<div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
							<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="64.8%"></div>
						</div>
						<div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php $this->load->view('admin/footer') ?>