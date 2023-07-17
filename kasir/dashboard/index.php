<?php 
    require_once "controller/controller.php";
    include "layouts/sidebar-kasir.php";

?>

<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Dashboard</h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/kasir2.jpg" alt="" style="width: 200px;">
            </div>
        </div>
    </div>


    <div class="row justify-content-center mt-3 p-5">
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Jumlah Pemesanan Yang Belum Di Bayar</h3>
                    <?php 
                        $jumlahPemesananBelumKonfirmasi = mysqli_query($conn, "SELECT * FROM pemesanan WHERE status_pesan='tunggu bayar'");
                        $jumlahPemesananBelumKonfirmasi = mysqli_num_rows($jumlahPemesananBelumKonfirmasi);
                        
                        ?>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $jumlahPemesananBelumKonfirmasi; ?></h2>
                    </div>
                    <span class="float-right display-5 opacity-5">
                        <i class="fa-solid fa-dollar-sign"></i></span>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Jumlah Pemesanan Yang Sudah Di Bayar</h3>
                    <?php 
                        $jumlahPemesananBelumSelesai = mysqli_query($conn, "SELECT * FROM pemesanan WHERE status_pesan='selesai'");
                        $jumlahPemesananBelumSelesai = mysqli_num_rows($jumlahPemesananBelumSelesai);
                        
                        ?>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $jumlahPemesananBelumKonfirmasi; ?></h2>
                    </div>
                    <span class="float-right display-5 opacity-5">
                        <i class="fa-solid fa-dollar-sign"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>








<?php include "layouts/footer-kasir.php" ?>