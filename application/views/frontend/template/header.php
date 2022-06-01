<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>El Marom Store</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url('frontend/img/favicon.png') ?>" rel="icon">
  <link href="<?php echo base_url('frontend/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url('frontend/lib/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url('frontend/lib/nivo-slider/css/nivo-slider.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('frontend/lib/owlcarousel/owl.carousel.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('frontend/lib/owlcarousel/owl.transitions.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('frontend/lib/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('frontend/lib/animate/animate.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('frontend/lib/venobox/venobox.css') ?>" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="<?php echo base_url('frontend/css/nivo-slider-theme.css') ?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url('frontend/css/style.css') ?>" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="<?php echo base_url('frontend/css/responsive.css') ?>" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <div class="logo-img"><img style="margin-top: -15px;" src="<?php echo base_url('backend/app-assets/img/logo.png') ?>" alt="Convex Logo" />
                    <span style="    color: #ffff;
    padding: 0;
    margin: 0;
    font-size: 36px;
    font-weight: bold;
    line-height: 1;"><i>El Marom</span><span style="    color: #00ff6b;
    padding: 0;
    margin: 0;
    font-size: 36px;
    font-weight: bold;
    line-height: 1;"> Store</i></span>
                  </div>

                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <?php if ($this->uri->segment(1) == '') : ?>
                    <li class="active">
                      <a class="page-scroll" href="#home">Home</a>
                    </li>

                    <li>
                      <a class="page-scroll" href="#about">Tentang Kami</a>
                    </li>


                    <li>
                      <a class="page-scroll" href="#portfolio">Galeri</a>
                    </li>

                    <li>
                      <a class="page-scroll" href="<?php echo base_url('Produk') ?>">Produk</a>
                    </li>

                    <li>
                      <a class="page-scroll" href="#contact">Kontak</a>
                    </li>
                  <?php else : ?>
                    <li>
                      <a class="page-scroll" href="<?php echo base_url('') ?>">Home</a>
                    </li>
                    <li>
                      <a class="page-scroll" href="<?php echo base_url('#about') ?>">Tentang Kami</a>
                    </li>
                    <li>
                      <a class="page-scroll" href="<?php echo base_url('#portfolio') ?>">Galeri</a>
                    </li>

                    <li class="active">
                      <a class="page-scroll" href="<?php echo base_url('Produk') ?>">Produk</a>
                    </li>

                    <li>
                      <a class="page-scroll" href="<?php echo base_url('#contact') ?>">Kontak</a>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->