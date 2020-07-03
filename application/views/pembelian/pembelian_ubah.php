<?php
$this->load->view('_partials/header');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('_partials/topbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  Pembelian
  <small>Transaksi Data Pembelian</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Transaksi Data</a></li>
    <li class="active">Pembelian</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
  <form method="post" action="<?php echo base_url('pembelian/ubah_proses') ?>">
     {result}
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Pembelian</label>
        <td><input type="text" name='id_pembelian' class="form-control" value="<?= $kodeunik; ?>" readonly></td>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Tgl Transaksi</label>
        <input type="date" class="form-control" id="tgl_pembelian" name="tgl_pembelian" placeholder="" value="{tgl_pembelian}" readonly>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Nama Client</label>
        <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder="" value="{nama_client}" readonly="">
      </div>

      <div class="form-group">
         <!-- <?php
        print_r($result_produk_pilihan);
        ?>  -->
        <label for="id_produk" class="control-label">Nama Produk</label>
        <div class="form-group">
          <select class="form-control" name="id_produk">
            <?php
            foreach($result_produk_pilihan as $row)
            {
            echo '<option value="'.$row['id'].'">'.$row['name'].''.$row['price'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Status Pembayaran</label>
          <select name="status_pembayaran" class="form-control" id="status_pembayaran">
            <option>Pilih Status</option>
            <option>Lunas</option>
            <option>Belum Lunas</option>
            
          </select>
      </div>
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('pembelian') ?>" class="btn btn-danger">Cancel </a>
    </div>
     {/result}
  </form>
</div>
  </section><!-- /.content -->
  <?php
  $this->load->view('_partials/js');
  ?>
  <!--tambahkan custom js disini-->
  <?php
  $this->load->view('_partials/footer');
  ?>