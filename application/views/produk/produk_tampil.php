<?php
$this->load->view('_partials/header');
?>
<link rel="stylesheet" href="<?php echo base_url('produks/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
<!--tambahkan custom css disini-->
<?php
$this->load->view('_partials/topbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Produk
	<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Produk</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
					<a href="<?php echo base_url('produk/tambah'); ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
					</h3>
					<div class="box-tools">
						
						
					</div>
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
						
						<!-- DataTables -->
						<div class="row">
							<div class="col-xs-12">
								<div class="table-responsive">
									<table class="table table-hover datatable"  width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>ID Produk</th>
												<th>Nama produk</th>
												<th>Jenis produk</th>
												<th>Kategori produk</th>
												<th>Jumlah Yang Dimiliki</th>
												<!-- <th>Stok</th> -->
												
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($result as $produk): ?>
											<tr>
												<td width="150">
													<?php echo $produk->id ?>
												</td>
												<td>
													<?php echo $produk->name ?>
												</td>
												<td>
													<?php echo $produk->category_id ?>
												</td>
												<td>
													<?php echo $produk->price ?>
												</td>
												<td>
													<img src="<?=base_url()?>assets/picture/<?=$produk->image?>" width="100" alt="image">
												</td>
												
												<td>
													<a href="<?php echo base_url('produk/ubah/'.$produk->id) ?>"
													class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
													<button onclick="deleteConfirm('<?php echo base_url('produk/delete/'.$produk->id) ?>')"
													href="" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus </button>
												</td>
												
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						</div><!-- /.box-body -->
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
		<!-- /.content -->
		<?php
		$this->load->view('_partials/js');
		?>
		<!--tambahkan custom js disini-->
		<?php
		$this->load->view('_partials/footer');
		?>
		<script src="<?php echo base_url() ?>produks/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>produks/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript">
		
		$(function () {
		$('.datatable').DataTable()
		
		})
		</script>