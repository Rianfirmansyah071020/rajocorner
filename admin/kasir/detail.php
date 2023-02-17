<?php include "layouts/sidebar-admin.php"; ?>

<?php 
require_once "controller/controller.php";

$idKasir = $_GET['id'];
$kasirById = mysqli_query($conn, "SELECT * FROM kasir WHERE id_kasir='$idKasir'");
$kasirById = mysqli_fetch_array($kasirById);

?>

<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard / Kelola Kasir</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Detail Kasir <span class="text-primary"><?= $kasirById['nama_lengkap'] ?></span></h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/admin.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="mt-1">
            <div class="row p-3">
                <div class="col-lg-5 col-xl-5 col-md-12 col-sm-12 p-3 card shadow m-2">
                    <img src="public/dataimage/kasir/<?= $kasirById['foto'] ?>" alt="" class="img-card-top">
                </div>
                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 p-3 card shadow m-2">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?= $kasirById['nama_lengkap'] ?>
                        </h4>
                        <div class="basic-list-group">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Username : <?= $kasirById['username'] ?></li>
                                <li class="list-group-item">Password : <?= $kasirById['password'] ?></li>
                                <li class="list-group-item">Nama Lengkap : <?= $kasirById['nama_lengkap']  ?></li>
                                <li class="list-group-item">Jenis Kelamin : <?= $kasirById['jekel'] ?></li>
                                <li class="list-group-item">Nomor HP/WA : <?= $kasirById['nomor_hp'] ?></li>
                            </ul>
                            <div class="row justify-content-end mt-3">

                                <a href="index.php?page=admin&aksi=kasir" class="btn btn-primary">kembali</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include "layouts/footer-admin.php"; ?>