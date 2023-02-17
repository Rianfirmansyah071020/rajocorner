    <?php include "layouts/sidebar-admin.php"; ?>

    <?php 
    require_once "controller/controller.php";
    
    $idAdmin = $_GET['id'];
    $adminById = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin='$idAdmin'");
    $adminById = mysqli_fetch_array($adminById);

    ?>

    <div class="content-body">

        <div class="row page-titles mx-0 bg-primary text-white">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard / Kelola Admin</li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row p-3 mt-2 mb-2 card shadow ">
                <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                    <h5>Halaman Detail Admin <span class="text-primary"><?= $adminById['nama_lengkap'] ?></span></h5>
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
                        <img src="public/dataimage/admin/<?= $adminById['foto'] ?>" alt="" class="img-card-top">
                    </div>
                    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 p-3 card shadow m-2">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?= $adminById['nama_lengkap'] ?>
                            </h4>
                            <div class="basic-list-group">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Username : <?= $adminById['username'] ?></li>
                                    <li class="list-group-item">Password : <?= $adminById['password'] ?></li>
                                    <li class="list-group-item">Nama Lengkap : <?= $adminById['nama_lengkap']  ?></li>
                                    <li class="list-group-item">Jenis Kelamin : <?= $adminById['jekel'] ?></li>
                                    <li class="list-group-item">Nomor HP/WA : <?= $adminById['nomor_hp'] ?></li>
                                </ul>
                                <div class="row justify-content-end mt-3">

                                    <a href="index.php?page=admin&aksi=admin" class="btn btn-primary">kembali</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php include "layouts/footer-admin.php"; ?>