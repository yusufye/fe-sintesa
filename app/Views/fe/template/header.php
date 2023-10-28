<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo (isset($title))?$title." - SINTESA":"SINTESA - Sistem Informasi Terpadu Satu Data" ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>/public/assets/main/sintesa_icon.png" rel="icon">
  <link href="<?php echo base_url();?>/public/assets/main/sintesa_icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>/public/assets/bizland/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/public/assets/bizland/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/public/assets/bizland/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/public/assets/bizland/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/public/assets/bizland/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/public/assets/bizland/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <?php
  if(isset($init_datatable)){
    echo '<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">';
  }
  ?>
  <link href="<?php echo base_url();?>/public/assets/bizland/assets/css/style.css?v="<?php echo time();?> rel="stylesheet">

  

  <!-- =======================================================
  * Template Name: BizLand
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container justify-content-center justify-content-md-between clearfix">
      <div class="contact-info d-flex align-items-center">
      </div>
      <div class="clearfix">
        <?php
          if (!session('login')) {
            echo '<a href="'.base_url('/login').'" class="btn btn-warning btn-sm float-end">Login</a>';
          }else{
            echo '<a href="'.base_url('/logout').'" class="btn btn-warning btn-sm float-end">Logout, '.session('username').'</a>';
          }
        ?>
        
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- <h1 class="logo"><a href="index.html">BizLand<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="" class="logo"><img src="<?php echo base_url();?>/public/assets/main/logo-sintesa-new-220x45.png" alt="Sintesa"></a>

      <nav id="navbar" class="navbar">
        <ul>
            
          <li><a class="nav-link scrollto <?php echo ($menu_title=='Home'?'active':''); ?>" href="<?php echo base_url();?>/">HOME</a></li>
          
          <li class="dropdown"><a class="<?php echo ($menu_title=='Data Diklat'?'active':''); ?>" href="#"><span>DATA DIKLAT</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url();?>data-diklat/data-pelamar">Data Pelamar</a></li>
              <li><a href="<?php echo base_url();?>data-diklat/data-penempatan">Data Penempatan</a></li>
              <li><a href="<?php echo base_url();?>data-diklat/data-alumni">Data Alumni</a></li>
            </ul>
          </li>
          
          <li class="dropdown"><a class="<?php echo ($menu_title=='Data Perencana'?'active':''); ?>" href="#"><span>DATA PERENCANA</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url();?>data-perencana/data-perencana">Data Perencana</a></li>
              <li><a href="<?php echo base_url();?>data-perencana/data-tim-penilai">Data Tim Penilai</a></li>
            </ul>
          </li>

          <li class="dropdown"><a class="<?php echo ($menu_title=='Data Administratif'?'active':''); ?>" href="#"><span>DATA ADMINISTRATIF</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url();?>data-administratif/biodata-narasumber">Data Biodata Narasumber</a></li>
              <li><a href="<?php echo base_url();?>data-administratif/data-kegiatan">Data Kegiatan</a></li>
              <li><a href="<?php echo base_url();?>data-administratif/data-lkj">Data LKJ</a></li>
              <li><a href="<?php echo base_url();?>data-administratif/data-kerjasama">Data Kerjasama</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>PUBLIKASI</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url();?>publikasi/kebijakan-diklat">Kebijakan Diklat</a></li>
              <li><a href="<?php echo base_url();?>publikasi/kebijakan-jfp">Kebijakan JFP</a></li>
              <li><a href="<?php echo base_url();?>publikasi/kebijakan-umum">Kebijakan Umum</a></li>
              <li><a href="http://pusbindiklatren.bappenas.go.id/direktori_tesis_disertasi.html">Katalog Tesis/Disertasi</a></li>
              <li><a href="<?php echo base_url();?>publikasi/kurikulum-pelatihan">Kurikulum Pelatihan</a></li>

            </ul>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="index.html" class="logo d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block d-lg-none d-xl-block"><img src="<?php echo base_url();?>/public/assets/main/logo_pusbindiklatren-removebg-260x40.png" alt="pusbindiklatren"></a>
    </div>
  </header><!-- End Header -->
