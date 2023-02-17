<?php include "layouts/sidebar-pj-stand.php"; ?>

<?php 
require_once "controller/controller.php";

$idMenu = $_GET['id'];
$menuById = mysqli_query($conn, "SELECT menu.id_menu as id_menu, stand.nama_stand as nama_stand, menu.nama_menu as nama_menu, menu.deskripsi as deskripsi, menu.harga as harga, menu.foto as foto FROM menu INNER JOIN stand ON stand.id_stand=menu.id_stand WHERE id_menu='$idMenu'");
$menuById = mysqli_fetch_array($menuById);

?>

<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard / Kelola Data Menu</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Detail Menu <span class="text-primary"><?= $menuById['nama_menu'] ?></span></h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/pj-stand.jpg" alt="" style="width: 300px;">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="mt-1">
            <div class="row p-3">
                <div class="col-lg-5 col-xl-5 col-md-12 col-sm-12 p-3 card shadow m-2">
                    <img src="public/dataimage/menu/<?= $menuById['foto'] ?>" alt="" class="img-card-top">
                </div>
                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 p-3 card shadow m-2">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?= $menuById['nama_menu'] ?>
                        </h4>
                        <div class="basic-list-group">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Stand : <?= $menuById['nama_stand'] ?></li>
                                <li class="list-group-item">Nama Menu : <?= $menuById['nama_menu'] ?></li>
                                <li class="list-group-item">Deskripsi : <?= $menuById['deskripsi']  ?></li>
                                <li class="list-group-item text-info">Harga :
                                    Rp.<?= number_format($menuById['harga']) ?></li>
                            </ul>
                            <div class="row justify-content-end mt-3">

                                <a href="index.php?page=pjStand&aksi=menu" class="btn btn-primary">kembali</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include "layouts/footer-admin.php"; ?>