<?php 
include "layouts/sidebar-admin.php"; 

require_once "controller/controller.php";

$id = $_GET['id'];
$mejaById = mysqli_query($conn, "SELECT * FROM meja WHERE id_meja='$id'");

$mejaById = mysqli_fetch_array($mejaById);

if(isset($_POST['ubah'])) {
    
    if(ubahMeja($_POST) > 0 ) {
        
        echo " <script>
        alert('Berhasil');
        document.location.href='index.php?page=admin&aksi=meja';
        </script>";
    }else {

        echo " <script>
        alert('Gagal');
        document.location.href='index.php?page=admin&aksi=meja';
        </script>";
    }
}
?>


<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard / Kelola Data Meja</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Ubah Data Meja</h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/admin.jpg" alt="">
            </div>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mt-3">
            <section>
                <div class="row justify-content-center">

                    <!-- awal batas pertama -->
                    <div class="col-lg-5 card p-4">
                        <h4>Form Ubah Data Meja <span class="success"><?= $mejaById['kode_meja']; ?></span></h4>
                        <!-- input id menu -->
                        <div class="form-group">
                            <input type="text" name="id_meja" value="<?= $mejaById['id_meja'] ?>" class="form-control"
                                placeholder="ID Meja" required readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="kode_meja" value="<?= $mejaById['kode_meja'] ?>"
                                class="form-control" placeholder="Kode Meja" required>
                        </div>

                    </div>
            </section>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="ubah">simpan</button>
    </form>
</div>





<?php include "layouts/footer-admin.php"; ?>