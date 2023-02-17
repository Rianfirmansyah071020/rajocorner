<?php 
    session_start();

    if(!$_SESSION['login_kasir']) {

        header('Location:index.php?page=&aksi=home');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RAJO CORNER</title>
    <!-- Favicon icon -->
    <link rel="icon" type="/image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="public/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="public/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="/public/assets/sass/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <link href="public/assets/plugins/summernote/dist/summernote.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header bg-primary text-white">
            <div class="brand-logo">
                <a href="index.php?page=kasir&aksi=dashboard">
                    <span class="brand-title">
                        <h2 class="text-brand text-white">CORNER <i class="fa-solid fa-burger-soda"></i></h2>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header bg-light">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown d-none d-md-flex">
                            <div class="col">
                                <div class="dropdown custom-dropdown" style="color:black;">
                                </div>
                            </div>
                        </li>

                        <!-- Button trigger modal -->

                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <small><?= $_SESSION['nama_lengkap'] ?></small>
                                <span class="activity active"></span>
                                <img src="public/dataimage/kasir/<?= $_SESSION['foto'] ?>" height="40" width="40"
                                    alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <!-- <a href="/admin/dashboard/profil/{{ $userLogin->id }}"><i
                                                    class="icon-user"></i>
                                                <span>Profile</span></a> -->
                                        </li>
                                        <li><a href="index.php?page=&aksi=logout"><i class="icon-key"></i>
                                                <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="index.php?page=kasir&aksi=dashboard" aria-expanded="false">
                            <i class="fa-solid fa-gauge "></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?page=kasir&aksi=konfirmasiPembayaran" aria-expanded="false">
                            <i class="fa-solid fa-dollar-sign"></i><span class="nav-text">Konfirmasi Pembayaran</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->