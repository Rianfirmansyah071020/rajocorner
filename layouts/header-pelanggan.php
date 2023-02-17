<?php 
    session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Rajocorner</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="public/assets/restoran/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="public/assets/restoran/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="public/assets/restoran/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/assets/restoran/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="public/assets/restoran/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="public/assets/restoran/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="public/assets/restoran/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="public/assets/restoran/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Restaurantly - v3.10.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-center justify-content-md-between">

            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-phone d-flex align-items-center"><span>08126631733</span></i>
            </div>

            <div class="languages d-none d-md-flex align-items-center">
                <ul>
                    <li>ID</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="index.php?page=&aksi=home">Rajocorner</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <?php
                    if($_SESSION['login_pelanggan']){ ?>

                    <li><a class="nav-link scrollto active" href="index.php?page=&aksi=home">Home</a></li>
                    <?php  } ?>

                    <?php  if(!$_SESSION['login_pelanggan']){ ?>

                    <li><a class="nav-link scrollto active" href="#home">Home</a></li>
                    <?php  } ?>

                    <li><a class="nav-link scrollto" href="index.php?page=&aksi=home#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="index.php?page=&aksi=home#menu">Menu</a></li>
                    <li><a class="nav-link scrollto" href="index.php?page=&aksi=home#gallery">Galeri</a></li>
                    <li><a class="nav-link scrollto" href="index.php?page=&aksi=home#contact">Lokasi</a></li>
                    <?php 
                            if($_SESSION['login_pelanggan']) { ?>
                    <li><a class="nav-link scrollto" href="index.php?page=pelanggan&aksi=detailPemesanan">Detail
                            Pemesanan</a></li>
                    <?php } ?>
                    <?php if(!$_SESSION['login_pelanggan']) { ?>
                    <li><a class="nav-link scrollto" href="index.php?page=&aksi=home#login">Login</a></li>
                    <?php } ?>
                    <?php 
                            if($_SESSION['login_pelanggan']) { ?>
                    <li><a class="nav-link scrollto" href="index.php?page=&aksi=logout">Logout</a></li>

                    <?php } ?>
                    <?php if(!$_SESSION['login_pelanggan']) { ?>
                    <li><a class="nav-link scrollto" href="index.php?page=&aksi=home#registrasi">Registrasi</a></li>
                    <?php } ?>
                    <?php 
                            if($_SESSION['login_pelanggan']) { ?>
                    <li><a class="nav-link scrollto" href=""><?= $_SESSION['nama_lengkap'] ?></a></li>
                    <?php } ?>

                    <!-- <?php if(!$_SESSION['login_pelanggan']) { ?>
                    <li><a class="nav-link scrollto" href="index.php?page=&aksi=home#registrasi">Registrasi</a></li>
                    <?php } ?> -->

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            <!-- <?php 
                            if($_SESSION['login_pelanggan']) { ?>
            <span class="text-warning ml-2 mr-2"><?= $_SESSION['nama_lengkap'] ?></span>
            <?php } ?>

            <?php if($_SESSION['login_pelanggan']){ ?>

            <a href="index.php?page=pelanggan&aksi=detailPemesanan"
                class="book-a-table-btn scrollto d-none d-lg-flex">Detail
                Pemesanan</a>
            <?php  } ?>

            <?php if(!$_SESSION['login_pelanggan']) { ?>
            <a href="index.php?page=&aksi=home#login" class="book-a-table-btn scrollto d-none d-lg-flex">Login</a>
            <?php }else { ?>
            <a href="index.php?page=&aksi=logout" class="book-a-table-btn scrollto d-none d-lg-flex">Logout</a>
            <?php } ?> -->


        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <?php if($_SESSION['login_pelanggan']) {?>
                    <h1>Hai <span class="text-info"><?= $_SESSION['nama_lengkap'] ?></span></h1>
                    <?php } ?>
                    <h1>Selamat Datang Di <span>Rajocorner</span></h1>
                    <h2>Tersedia Menu Spesial</h2>

                    <div class="btns">
                        <a href="#menu" class="btn-menu animated fadeInUp scrollto">Lihat Menu</a>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative"
                    data-aos="zoom-in" data-aos-delay="200">
                </div>

            </div>
        </div>
    </section><!-- End Hero -->