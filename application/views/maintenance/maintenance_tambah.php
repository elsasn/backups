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
  maintenance
  <small>Transaksi Data maintenance</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">maintenance</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
  <form method="post" action="<?php echo base_url('maintenance/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID maintenance</label>
        <td><input type="text" name='id_maintenance' class="form-control" value="<?= $kodeunik; ?>" readonly></td>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Tgl Transaksi</label>
        <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" placeholder="" value="<?php echo date('Y-m-d') ?>" readonly>
      </div>

      <div class="form-group">
         <!-- <?php
        print_r($result_asset_pilihan);
        ?>  -->
        <label for="id_asset" class="control-label">ID Asset</label>
        <div class="form-group">
          <select class="form-control" name="id_asset">
            <?php
            foreach($result_asset_pilihan as $row)
            {
            echo '<option value="'.$row['id_asset'].'">'.$row['nama_asset'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Tgl Mulai Maintenance</label>
        <input type="date" class="form-control" id="tgl_maintenance_mulai" name="tgl_maintenance_mulai" placeholder="">
      </div>

       <div class="form-group">
        <label for="exampleInputEmail1">Tgl Selesai Maintenance</label>
        <input type="date" class="form-control" id="tgl_maintenance_selesai" name="tgl_maintenance_selesai" placeholder="">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Jumlah</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Jenis Maintenance</label>
        <input type="text" class="form-control" id="jenis_maintenance" name="jenis_maintenance" placeholder="">
      </div>
      <!-- <div class="form-group">
        <label for="exampleInputEmail1">Stok</label>
        <input type="text" class="form-control" id="stok" name="stok" placeholder="">
      </div> -->
      <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
          <select name="status_maintenance" class="form-control" id="status_maintenance">
            <option>Pilih Status</option>
            <option>Proses</option>
            <option>Selesai</option>
            
          </select>
      </div>
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('maintenance') ?>" class="btn btn-danger">Cancel </a>
    </div>
    
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