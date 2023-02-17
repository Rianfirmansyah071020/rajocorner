<?php 
    require_once "controller/controller.php";
    include "layouts/sidebar-admin.php"; 
?>



<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard / Kelola Data Pelanggan</li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">

        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Kelola Data Pelanggan</h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/admin.jpg" alt="">
            </div>
        </div>


    </div>


    <!-- tabel data pelanggan -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">Data Pelanggan</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Nomor Hp</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                $dataPelangganAll = mysqli_query($conn, "SELECT * FROM pelanggan");
                                $no = 1;
                                ?>

                                    <?php foreach ($dataPelangganAll as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?>.</td>
                                        <td><?= $row['nama_lengkap'] ?></td>
                                        <td class="text-center"><?= $row['jekel'] ?></td>
                                        <td class="text-center"><?= $row['nomor_hp'] ?></td>
                                        <td class="row justify-content-center">
                                            <a href="index.php?page=admin&aksi=hapusPelanggan&id=<?= $row['id_pelanggan'] ?>"
                                                class="btn btn-danger hapus"
                                                onclick="return confirm('Apakah anda ingin menghapus data ini ?')">Hapus</a>
                                        </td>
                                    </tr>

                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php include "layouts/footer-admin.php"; ?>