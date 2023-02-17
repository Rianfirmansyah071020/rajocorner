<?php 
    require_once "controller/controller.php";
    include "layouts/sidebar-admin.php"; 

    $idStand = $_GET['id'];
    $standById = mysqli_query($conn, "SELECT * FROM stand WHERE id_stand='$idStand'");

    $standById = mysqli_fetch_array($standById);
    


    if(isset($_POST['ubah'])) {

        // memanggil function ubah stand
        if(ubahStand($_POST) > 0 ) {

            echo "<script>
            alert('Berhasil');
            document.location.href='index.php?page=admin&aksi=stand';

            </script>";
        }else {

            echo "<script>
                alert('Gagal');
                document.location.href='index.php?page=admin&aksi=stand';
            </script>";
        }
    }


    ?>



<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard / Kelola Data Stand</li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">

        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Ubah Data Stand <span class="text-info"><?= $standById['nama_stand']; ?></span></h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/admin.jpg" alt="">
            </div>
            <div class="mt-3 p-3">
                <a href="index.php?page=admin&aksi=pjStand" class="btn btn-danger">Kelola PJ Stand</a>
                <a href="index.php?page=admin&aksi=stand" class="btn btn-success">Kelola Stand</a>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="card p-3 mt-3 w-75">
                <h3 class="m-3 text-center">Form Ubah Data Stand <span
                        class="text-info"><?= $standById['nama_stand'] ?></span></h3>
                <form action="" method="post">
                    <div class="mt-3">
                        <section>
                            <div class="row">

                                <!-- awal batas pertama -->
                                <div class="col-lg-12">
                                    <!-- input id stand -->
                                    <div class="form-group">
                                        <input type="text" name="id_stand" value="<?= $standById['id_stand'] ?>"
                                            class="form-control" placeholder="ID pj" required readonly>
                                    </div>

                                    <!-- input pj stand -->
                                    <div class="form-group">
                                        <select name="id_pj" id="id_pj" class="form-control" require>
                                            <option value="">Pilih penanggung jawab stand</option>
                                            <?php 
                                                $pjStandAll = mysqli_query($conn, "SELECT * FROM pj_stand");
                                                
                                                foreach ($pjStandAll as $row) { ?>
                                            <option value="<?= $row['id_pj'] ?>"
                                                <?php if($row['id_pj'] === $standById['id_pj']) echo "selected"; ?>>
                                                <?= $row['nama_lengkap'] ?>
                                            </option>

                                            <?php  } ?>

                                        </select>
                                    </div>

                                    <!-- input nama stand -->
                                    <div class="form-group">
                                        <input type="text" name="nama_stand" id="nama_stand"
                                            value="<?= $standById['nama_stand'] ?>" class="form-control"
                                            placeholder="Nama stand" required>
                                    </div>

                                    <!-- input keterangan -->
                                    <div class="form-group">
                                        <textarea name="keterangan" id="keterangan" cols="30" rows="10"
                                            class="form-control"
                                            placeholder="Keterangan"><?= $standById['keterangan'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="ubah">simpan</button>
                </form>
            </div>
        </div>

    </div>
</div>




<?php include "layouts/footer-admin.php"; ?>