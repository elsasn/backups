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

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'></script>
        <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class='header mb-5'>
      <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
      <div id='top'>
        <div class='container'>
          <div class='row'>
            <div class='col-lg-6 offer mb-3 mb-lg-0'><a href='#' class='btn btn-success btn-sm'>Offer of the day</a><a href='#' class='ml-1'>Get flat 35% off on orders over $50!</a></div>
            <div class='col-lg-6 text-center text-lg-right'>
              <ul class='menu list-inline mb-0'>
                <li class='list-inline-item'></li><!-- 
                <li class='list-inline-item'><a href='".base_url("index/register")."'>Logout</a></li> -->
                <li class='list-inline-item'><a href='<?php echo base_url('auth') ?>'>Login Admin</a></li>
                <li class='list-inline-item'><a href='<?php echo base_url('register') ?>'>Register Pelanggan</a></li>"
              </ul>
            </div>
          </div>
        </div>
        <div id='login-modal' tabindex='-1' role='dialog' aria-labelledby='Login' aria-hidden='true' class='modal fade'>
          <div class='modal-dialog modal-sm'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h5 class='modal-title'>Customer login</h5>
                <button type='button' data-dismiss='modal' aria-label='Close' class='close'><span aria-hidden='true'>×</span></button>
              </div>
              <div class='modal-body'>
                <form id='form_login'>
                  <div class='form-group'>
                    <input id='email-modal' type='text' placeholder='email' id='email' name='email' class='form-control'>
                  </div>
                  <div class='form-group'>
                    <input id='password-modal' type='password' placeholder='password' id='password' name='password' class='form-control'>
                  </div>
                  <p class='text-center'>
                    <button type='button' onclick=javascript:login() class='btn btn-primary'><i class='fa fa-sign-in'></i> Log in</button>
                  </p>
                </form>
                <p class='text-center text-muted'>Not registered yets?</p>
                <p class='text-center text-muted'><a href="<?php echo base_url('index/register') ?>"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
              </div>
            </div>
          </div>
        </div>
        <!-- *** TOP BAR END ***-->
        
        
      </div>
      <nav class='navbar navbar-expand-lg'>
        <div class='container'><a href='<?php echo base_url('home') ?>' class='navbar-brand home'><img src="<?php echo base_url('design/web1/img/logo.png') ?>" alt='Pestain Logo' class='d-none d-md-inline-block'><img src="<?php echo base_url('design/web1/img/logo.png') ?>" alt='Pestin Logo' class='d-inline-block d-md-none'><span class='sr-only'>Pestain - go to homepage</span></a>
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
              <li class='nav-item'><a href='<?php echo base_url('Home/sound_system') ?>' class='nav-link'>Sound System</a></li>
               <li class='nav-item'><a href='<?php echo base_url('Home/sourvernir') ?>' class='nav-link'>Sourvernir</a></li>
                <li class='nav-item'><a href='<?php echo base_url('Home/make_up') ?>' class='nav-link'>Make Up</a></li>
            </ul>
            <div class='navbar-buttons d-flex justify-content-end'>
              <!-- /.nav-collapse-->
              <div id='search-not-mobile' class='navbar-collapse collapse'></div><a data-toggle='collapse' href='#search' class='btn navbar-btn btn-primary d-none d-lg-inline-block'><span class='sr-only'>Toggle search</span><i class='fa fa-search'></i></a>
              <!-- <div id='basket-overview' class='navbar-collapse collapse d-none d-lg-block'><a href='basket.html' class='btn btn-primary navbar-btn'><i class='fa fa-shopping-cart'></i><span>3 items in cart</span></a></div> -->
            </div>
          </div>
        </div>
      </nav>
      <div id='search' class='collapse'>
        <div class='container'>
          <form role='search' class='ml-auto'>
            <div class='input-group'>
              <input type='text' placeholder='Search' class='form-control'>
              <div class='input-group-append'>
                <button type='button' class='btn btn-primary'><i class='fa fa-search'></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>
   
    <div id='all'>
      <div id='content'>
        <div class='container'>
          <div class='row'>
            
          </div>
        </div>
        <!--
        *** ADVANTAGES HOMEPAGE ***
        _________________________________________________________
        -->
        
        <!-- /#advantages-->
        <!-- *** ADVANTAGES END ***-->
        <!--
        *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________
        -->
        <div id='hot'>
          <div class='container'>
            <div class='row'>
               <?php foreach($product_souvernir->result() as $row):?>
              <div class="col-md-4">
              <div class="card mb-4">
                <img src="<?=base_url()?>assets/picture/<?=$row->image?>" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row->name;?></h5>
                  <p class="card-text"><strong><?php echo $row->price;?></strong></p>
                  <p class="card-text">Deskripsi product yang akan diposting</p>
                  <a href="#" class="badge badge-primary"><i class="fas fa-tag"><?php echo $row->category_name;?></i></a>
                </div>
                <div class="card-footer">
                  <form action="" class="">
                    <div class="input-group">
                      <div class="input-group-append">
                        <style>
                         .button {
                         background-color: #1c87c9;
                         border: none;
                         color: white;
                         padding: 10px 20px;
                         text-align: center;
                         text-decoration: none;
                         display: inline-block;
                         font-size: 10px;
                         margin: 2px 2px;
                         cursor: pointer;
                         }
                      </style>
                       <a href="https://wa.me/6281717252825" class="button">Buy</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
             <?php endforeach; ?>
               <!-- <div class='item'>
                <div class='product'>
                  <div class='flip-container'>        
                    <div class='flipper'>
                      <div class='front'><a href='detail.html'><img src="<?php echo base_url('design/web1/img/baju/1.jpg') ?>" alt='' class='img-fluid'></a></div>
                      <div class='back'><a href='detail.html'><img src="<?php echo base_url('design/web1/img/baju/1_1.jpg') ?>" alt='' class='img-fluid'></a></div>
                    </div>
                  </div><a href='detail.html' class='invisible'><img src="<?php echo base_url('design/web1/img/baju/1.jpg"') ?>" alt='' class='img-fluid'></a>
                  <div class='text'>
                    <h3><a href='detail.html'><?php echo $row->id;?></a></h3>
                    <p class='price'> 
                      <del></del><?php echo $row->name;?>
                      <del></del><?php echo $row->price;?>
                      <button>Buy</button>
                    </p>
                  </div>
                </div>
              </div> -->
            
              <!-- /.product-slider-->
            </div>
            <!-- /.container-->
          </div>
          <!-- /#hot-->
          <!-- *** HOT END ***-->
        </div>
        <!--
        *** GET INSPIRED ***
        _________________________________________________________
        -->
        
        <!-- *** GET INSPIRED END ***-->
        <!--
        *** BLOG HOMEPAGE ***
        _________________________________________________________
        -->
        <div class='box text-center'>
          <div class='container'>
            <div class='col-md-12'>
              <h3 class='text-uppercase'>Dari Blog Kami</h3>
              <p class='lead mb-0'>Apa yang baru di Blog Kami? <a href='#'>Check our blog!</a></p>
            </div>
          </div>
        </div>
        <div class='container'>
          <div class='col-md-12'>
            <div id='blog-homepage' class='row'>
              <div class='col-sm-6'>
                <div class='post'>
                  <h4><a href='post.html'>Design Undangan Sesukamu</a></h4>
                  <!-- <p class='author-category'>By <a href='#'>John Slim</a> in <a href=''>Fashion and style</a></p> -->
                  <hr>
                  <p class='intro'>Bingung memilih? Ya tentu karena banyak sekali contoh desain undangan unik dan menarik yang tersedia di sini. Pilih lah undangan yang tepat yang sesuai dengan tema pernikahan Anda. Bisa juga memilih desain undangan yang sesuai dengan karakter Anda dan pasangan.</p>
                </div>
              </div>
              <div class='col-sm-6'>
                <div class='post'>
                  <h4><a href='post.html'>Catering</a></h4>
                  <!-- <p class='author-category'>By <a href='#'>John Slim</a> in <a href=''>About Minimal</a></p> -->
                  <hr>
                  <p class='intro'>Bisnis ini banyak diminati oleh masyarakat karena dianggap memiliki tingkat pengembalian modal yang relatif cepat dan dapat memenuhi kebutuhan primer masyarakat. Hal ini terlihat dari semakin banyaknya jumlah usaha catering yang berhasil dan berkembang, baik untuk catering lokal maupun catering internasional.</p>
                </div>
              </div>
            </div>
            <!-- /#blog-homepage-->
          </div>
        </div>
        <!-- /.container-->
        <!-- *** BLOG HOMEPAGE END ***-->
      </div>
    </div>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    <div id='footer'>
      <div class='container'>
        <div class='row'>
          <div class='col-lg-3 col-md-6'>
            <h4 class='mb-3'>Pages</h4>
            <ul class='list-unstyled'>
              <li><a href='text.html'>About us</a></li>
              <li><a href='text.html'>Terms and conditions</a></li>
              <li><a href='faq.html'>FAQ</a></li>
              <li><a href='contact.html'>Contact us</a></li>
            </ul>
            <hr>
            <h4 class='mb-3'>User section</h4>
            <ul class='list-unstyled'>
              <li><a href='#' data-toggle='modal' data-target='#login-modal'>Login</a></li>
              <li><a href='".base_url("index/register")."'>Regiter</a></li>
            </ul>
          </div>
          <!-- /.col-lg-3-->
          <div class='col-lg-3 col-md-6'>
            <h4 class='mb-3'>Top categories</h4>
            <h5>Wedding</h5>
            <ul class='list-unstyled'>
              <li class='nav-item'><a href='category.html' class='nav-link'>Sound System</a></li>
              <li class='nav-item'><a href='category.html' class='nav-link'>Wedding Cake</a></li>
              <li class='nav-item'><a href='category.html' class='nav-link'>Prewedding</a></li>
              <li class='nav-item'><a href='category.html' class='nav-link'>Dekorasi</a></li>
              <li class='nav-item'><a href='category.html' class='nav-link'>Venue</a></li>
              <li class='nav-item'><a href='category.html' class='nav-link'>Souvernir</a></li>
              <li class='nav-item'><a href='category.html' class='nav-link'>Make Up</a></li>
            </ul>
           
          </div>
          <!-- /.col-lg-3-->
          <div class='col-lg-3 col-md-6'>
            <h4 class='mb-3'>Temukan saya di</h4>
            <p><strong>Wedding Organizer</strong><br>Perkiosan rt. 01/09, pucang miliran<br>KAB. KLATEN - TULUNG<br>JAWA TENGAH<br>ID 57482<br></p>
            <hr class='d-block d-md-none'>
          </div>
          <!-- /.col-lg-3-->
          <div class='col-lg-3 col-md-6'>
            <h4 class='mb-3'>Get the news</h4>
            <p class='text-muted'>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            <form>
              <div class='input-group'>
                <input type='text' class='form-control'><span class='input-group-append'>
                  <button type='button' class='btn btn-outline-secondary'>Subscribe!</button></span>
              </div>
              <!-- /input-group-->
            </form>
            <hr>
            <h4 class='mb-3'>Stay in touch</h4>
            <p class='social'><a href='#' class='facebook external'><i class='fa fa-facebook'></i></a><a href='#' class='twitter external'><i class='fa fa-twitter'></i></a><a href='#' class='instagram external'><i class='fa fa-instagram'></i></a><a href='#' class='gplus external'><i class='fa fa-google-plus'></i></a><a href='#' class='email external'><i class='fa fa-envelope'></i></a></p>
          </div>
          <!-- /.col-lg-3-->
        </div>
        <!-- /.row-->
      </div>
      <!-- /.container-->
    </div>
    <!-- /#footer-->
    <!-- *** FOOTER END ***-->
    
    
    <!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
    <div id='copyright'>
      <div class='container'>
        <div class='row'>
          <div class='col-lg-6 mb-2 mb-lg-0'>
            <p class='text-center text-lg-left'>©2019 Your name goes here.</p>
          </div>
          <div class='col-lg-6'>
            <p class='text-center text-lg-right'>Template design by <a href='https://bootstrapious.com/p/big-bootstrap-tutorial'>Bootstrapious</a>
              <!-- If you want to remove this backlink, pls purchase an Attribution-free License @ https://bootstrapious.com/p/obaju-e-commerce-template. Big thanks!-->
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="<?php echo base_url('design/web1/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('design/web1/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('design/web1/vendor/jquery.cookie/jquery.cookie.js') ?>"> </script>
    <script src="<?php echo base_url('design/web1/vendor/owl.carousel/owl.carousel.min.js') ?>"></script>
    <script src="<?php echo base_url('design/web1/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js') ?>"></script>
    <script src="<?php echo base_url('design/web1/js/front.js') ?>"></script>
  </body>
</html>