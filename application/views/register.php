<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pestain</title>
    <meta name='description' content=''>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='robots' content='all,follow'>
    <!-- Bootstrap CSS-->
    <link rel='stylesheet' href="<?php echo base_url('design/web1/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <!-- Font Awesome CSS-->
    <link rel='stylesheet' href="<?php echo base_url('design/web1/vendor/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Google fonts - Roboto -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700'>
    <!-- owl carousel-->
    <link rel='stylesheet' href="<?php echo base_url('design/web1/vendor/owl.carousel/assets/owl.carousel.css') ?>">
    <link rel='stylesheet' href="<?php echo base_url('design/web1/vendor/owl.carousel/assets/owl.theme.default.css') ?>">
    <!-- theme stylesheet-->
    <link rel='stylesheet' href="<?php echo base_url('design/web1/css/style.default.css') ?>" id='theme-stylesheet'>
    <!-- Custom stylesheet - for your changes-->
    <link rel='stylesheet' href="<?php echo base_url('design/web1/css/custom.css') ?>">
    <!-- Favicon-->
    <link rel='shortcut icon' href="<?php echo base_url('design/web1/favicon.png') ?>">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'></script>
        <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script><![endif]-->
</head>

<body>
  <div>
    <nav class='navbar navbar-expand-lg'>
            <div class='container'><a href='<?php echo base_url(' home ') ?>' class='navbar-brand home'><img src="<?php echo base_url('design/web1/img/logo.png') ?>" alt='Pestain Logo' class='d-none d-md-inline-block'><img src="<?php echo base_url('design/web1/img/logo.png') ?>" alt='Pestin Logo' class='d-inline-block d-md-none'><span class='sr-only'>Pestain - go to homepage</span></a>
                <div class='navbar-buttons'>
                    <button type='button' data-toggle='collapse' data-target='#navigation' class='btn btn-outline-secondary navbar-toggler'><span class='sr-only'>Toggle navigation</span><i class='fa fa-align-justify'></i></button>
                    <button type='button' data-toggle='collapse' data-target='#search' class='btn btn-outline-secondary navbar-toggler'><span class='sr-only'>Toggle search</span><i class='fa fa-search'></i></button><a href='basket.html' class='btn btn-outline-secondary navbar-toggler'><i class='fa fa-shopping-cart'></i></a>
                </div>
                <div id='navigation' class='collapse navbar-collapse'>
                    <ul class='navbar-nav mr-auto'>
                        <li class='nav-item'><a href='<?php echo base_url('Home') ?>' class='nav-link active'>Home</a></li>
                        <li class='nav-item'><a href='<?php echo base_url('Home/wedding') ?>' class='nav-link'>Wedding</a></li>
                        <li class='nav-item'><a href='<?php echo base_url('Home/paket') ?>' class='nav-link'>Paket</a></li>
                        <li class='nav-item'><a href='<?php echo base_url('Home/venue') ?>' class='nav-link'>Venue</a></li>
                        <li class='nav-item'><a href='<?php echo base_url('Home/wedding_cake') ?>' class='nav-link'>Wedding Cake</a></li>
                        <li class='nav-item'><a href='<?php echo base_url('Hom/sound_system') ?>' class='nav-link'>Sound System</a></li>
                        <li class='nav-item'><a href='<?php echo base_url('Home/sourvernir') ?>' class='nav-link'>Sourvernir</a></li>
                        <li class='nav-item'><a href='<?php echo base_url('Home/make_up') ?>' class='nav-link'>Make Up</a></li>

                    </ul>
                </div>
            </div>
        </nav>
  </div>
  <div class="container">
    <br>
  </div>
  <div class="container">
    <div class="box">
  <form method="post" action="<?php echo base_url('register/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID pelanggan</label>
        <td><input type="text" name='id_pelanggan' class="form-control" value="<?= $kodeunik; ?>" readonly></td>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Pelanggan</label>
        <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="">
      </div>
      <div class="form-group">
        <?php echo form_error('email'); ?>
        <label for="exampleInputEmail1">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="">
      </div>
       <div class="form-group">
        <?php echo form_error('email'); ?>
        <label for="exampleInputUsername">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="">
      </div>
      <div class="form-group">
        <?php echo form_error('password'); ?>
        <label for="exampleInputPassword">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleInputTelepon">Telepon</label>
        <input type="number" class="form-control" id="telepon" name="telepon" placeholder="">
      </div>
     <div class="form-group">
        <label for="exampleInputEmail1">Hak Akses</label>
          <input type="text" name="hak_akses" class="form-control" id="hak_akses" value="Pelanggan" readonly>
      </div>
    <div class="form-group">
        <!-- <label for="exampleInputEmail1">Status</label> -->
           <input type="hidden" name="status" class="form-control" id="status" value="aktif" readonly>
      </div>      
    </div>


    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('home') ?>" class="btn btn-danger">Cancel </a>
    </div>
    
  </form>
    </div>
     
  </div>
</body>

