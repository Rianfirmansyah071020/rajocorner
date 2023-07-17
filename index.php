<?php

    $page = $_GET['page'];
    $aksi = $_GET['aksi'];

    error_reporting(0);   

    // akses admin
    if($page == "admin") {

        if($aksi == "dashboard") {
            include "admin/dashboard/index.php";

            // admin
        }elseif ($aksi == "admin") {
            include "admin/admin/index.php";
        }elseif ($aksi == "detailAdmin") {
            include "admin/admin/detail.php";
        }elseif ($aksi == "hapusAdmin") {
            include "admin/admin/hapus.php";
        }elseif ($aksi == "ubahAdmin") {
            include "admin/admin/ubah.php";

            // kasir
        }elseif ($aksi == "kasir") {
            include "admin/kasir/index.php";
        }elseif ($aksi == "detailKasir") {
            include "admin/kasir/detail.php";
        }elseif ($aksi == "hapusKasir") {
            include "admin/kasir/hapus.php";
        }elseif ($aksi == "ubahKasir") {
            include "admin/kasir/ubah.php";

            // pj stand
        }elseif ($aksi == "pjStand") {
            include "admin/stand/pj_stand.php";
        }elseif ($aksi == "detailPjStand") {
            include "admin/stand/detail-pj-stand.php";
        }elseif ($aksi == "hapusPjStand") {
            include "admin/stand/hapus-pj-stand.php";
        }elseif ($aksi == "ubahPjStand") {
            include "admin/stand/ubah-pj-stand.php";

            // stand
        }elseif ($aksi == "stand") {
            include "admin/stand/stand.php";
        }elseif ($aksi == "detailStand") {
            include "admin/stand/detail-stand.php";
        }elseif ($aksi == "hapusStand") {
            include "admin/stand/hapus-stand.php";
        }elseif ($aksi == "ubahStand") {
            include "admin/stand/ubah-stand.php";
        }

        // pelanggan
        elseif ($aksi == "pelanggan") {
            include "admin/pelanggan/index.php";
        }elseif ($aksi == "hapusPelanggan") {
            include "admin/pelanggan/hapus.php";
        }

         // pemesanan
         elseif ($aksi == "pemesanan") {
            include "admin/pemesanan/index.php";
        }elseif ($aksi == "hapusPemesanan") {
            include "admin/pemesanan/hapus.php";
        }

        // meja 
        elseif ($aksi == "meja") {
            include "admin/meja/index.php";
        }elseif ($aksi == "ubahMeja") {
            include "admin/meja/ubah.php";
        }elseif ($aksi == "hapusMeja") {
            include "admin/meja/hapus.php";
        }
    }



    
    // akses umum
    if($page == "") {

        if($aksi == "home"){
            include "home/index.php";
        }elseif ($aksi == "login") {
            include "login/login.php";
        }elseif ($aksi == "logout") {
            include "logout/index.php";
        }elseif ($aksi == "pesanMenu") {
            include "pelanggan/pesanMenu.php";
        }
    }


    // akses pelanggan
    if($page == "pelanggan") {

        if($aksi == "detailPemesanan") {
            include "pelanggan/detailPemesanan.php";
        }elseif($aksi == "batalPemesanan") {
            include "pelanggan/batalPemesanan.php";
        }
    }


    // akses pj stand
    if($page == 'pjStand') {

        // dashboard
        if($aksi == "dashboard") {
            include "pj-stand/dashboard/index.php";

            // menu
        }elseif($aksi == 'menu') {
            include "pj-stand/menu/index.php";
        }elseif ($aksi == "ubahMenu") {
            include "pj-stand/menu/ubah.php";
        }elseif ($aksi == "hapusMenu") {
            include "pj-stand/menu/hapus.php";
        }elseif ($aksi == "detailMenu") {
            include "pj-stand/menu/detail.php";

            // konfirmasi pesan
        }elseif ($aksi == "konfirmasiPesan") {
            include "pj-stand/konfirmasi-pesan/index.php";
        }elseif ($aksi == "ubahStatusPemesanan") {
            include "pj-stand/konfirmasi-pesan/ubah.php";
        }
    }




    // akses kasir
    if($page == "kasir") {
        if($aksi == "dashboard") {
            include "kasir/dashboard/index.php";
        }elseif ($aksi == "konfirmasiPembayaran") {
            include "kasir/konfirmasi-pembayaran/index.php";
        }elseif ($aksi == "ubahKonfirmasiPembayaran") {
            include "kasir/konfirmasi-pembayaran/ubah.php";
        }elseif ($aksi == "pemesanan") {
            include "kasir/pemesanan/index.php";
        }
    }

    if($page == "") {

        if($aksi == "") {
            header("Location:index.php?page=&aksi=home");
        }
    }

?>