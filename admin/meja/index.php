<?php 
include "layouts/sidebar-admin.php"; 

require_once "controller/controller.php";

if(isset($_POST['simpan'])) {
    
    if(tambahMeja($_POST) > 0 ) {
        
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
                <h5>Halaman Kelola Data Meja</h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/admin.jpg" alt="">
            </div>
        </div>
    </div>


    <?php 
            // kode meja otomatis
            $mejaById = mysqli_query($conn, "SELECT MAX(id_meja) AS ID FROM meja");
            $mejaById = mysqli_fetch_array($mejaById);
            $kode = $mejaById["ID"];
            $urutan = (int)substr($kode,4, 4);
            $urutan++;
            $keteranganID = "meja";
            $kodeAuto = $keteranganID . sprintf("%04s", $urutan);
            
            ?>

    <!-- modal form -->
    <div class="container-fluid">
        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah
            Data
            Meja</button>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Form Tambah Data Meja <button type="button" class="close"
                            data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mt-3">
                        <section>
                            <div class="row">

                                <!-- awal batas pertama -->
                                <div class="col-lg-12">
                                    <!-- input id menu -->
                                    <div class="form-group">
                                        <input type="text" name="id_meja" value="<?= $kodeAuto ?>" class="form-control"
                                            placeholder="ID Meja" required readonly>
                                    </div>

                                    <!-- input nama meja -->
                                    <div class="form-group">
                                        <input type="text" name="kode_meja" class="form-control" placeholder="Kode meja"
                                            required>
                                    </div>

                                </div>
                        </section>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="simpan">simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<!-- tabel data meja -->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Data Meja </h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode Meja</th>
                                    <th class="text-center">QR Code Meja</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $mejaAll = mysqli_query($conn, "SELECT * FROM meja");
                                $no = 1;
                                ?>

                                <?php foreach ($mejaAll as $row) { ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td class="text-center"><?= $row['kode_meja'] ?></td>
                                    <td class="text-center">
                                        <img src="qrcodes/<?= $row['qr_code'] ?>" alt="">
                                    </td>
                                    <td class="row justify-content-center">
                                        <a href="index.php?page=admin&aksi=ubahMeja&id=<?= $row['id_meja'] ?>"
                                            class="btn btn-info ubah"
                                            onclick="return confirm('Apakah anda ingin mengubah data ini ?')">Ubah</a>

                                        <a href="index.php?page=admin&aksi=hapusMeja&id=<?= $row['id_meja'] ?>"
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