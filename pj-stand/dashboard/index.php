<?php 
    require_once "controller/controller.php";
    include "layouts/sidebar-pj-stand.php";

    $id_pj = $_SESSION['id_pj'];

    $standDanPjStand = mysqli_query($conn, "SELECT stand.id_stand as id_stand, stand.nama_stand as nama_stand, stand.id_stand as id_stand FROM stand INNER JOIN pj_stand ON pj_stand.id_pj=stand.id_pj WHERE pj_stand.id_pj='$id_pj'");

$standDanPjStand = mysqli_fetch_array($standDanPjStand);

    $id_stand = $standDanPjStand['id_stand'];

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
                <img src="public/dataimage/content/pj-stand.jpg" alt="" style="width: 300px;">
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3 p-5">
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Jumlah Pemesanan Yang Belum Di Konfirmasi</h3>
                    <?php 
                        $jumlahPemesananBelumKonfirmasi = mysqli_query($conn, "SELECT * FROM pemesanan WHERE status_pesan='pesan' AND id_stand='$id_stand'");
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
                    <h3 class="card-title text-white">Jumlah Pemesanan Yang Sedang Diproses</h3>
                    <?php 
                        $jumlahPemesananBelumSedangDiProses = mysqli_query($conn, "SELECT * FROM pemesanan WHERE status_pesan='sedang diproses' AND id_stand='$id_stand'");
                        $jumlahPemesananBelumSedangDiProses = mysqli_num_rows($jumlahPemesananBelumSedangDiProses);
                        
                        ?>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $jumlahPemesananBelumSedangDiProses; ?></h2>
                    </div>
                    <span class="float-right display-5 opacity-5">
                        <i class="fa-solid fa-dollar-sign"></i></span>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-7">
                <div class="card-body">
                    <h3 class="card-title text-white">Jumlah Pemesanan Yang Sudah Disajikan</h3>
                    <?php 
                        $jumlahPemesananBelumSudahDisajikan = mysqli_query($conn, "SELECT * FROM pemesanan WHERE status_pesan='sudah disajikan' AND id_stand='$id_stand'");
                        $jumlahPemesananBelumSudahDisajikan = mysqli_num_rows($jumlahPemesananBelumSudahDisajikan);
                        
                        ?>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $jumlahPemesananBelumSudahDisajikan; ?></h2>
                    </div>
                    <span class="float-right display-5 opacity-5">
                        <i class="fa-solid fa-dollar-sign"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>








<?php include "layouts/footer-pj-stand.php" ?>