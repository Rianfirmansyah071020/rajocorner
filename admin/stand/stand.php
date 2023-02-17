<?php 
    require_once "controller/controller.php";
    include "layouts/sidebar-admin.php"; 


    if(isset($_POST['simpan'])) {

        // memanggil function tambah kasir
        if(tambahStand($_POST) > 0 ) {

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
                <h5>Halaman Kelola Data Stand</h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/admin.jpg" alt="">
            </div>
            <div class="mt-3 p-3">
                <a href="index.php?page=admin&aksi=pjStand" class="btn btn-danger">Kelola PJ Stand</a>
                <a href="index.php?page=admin&aksi=stand" class="btn btn-success">Kelola Stand</a>
            </div>
        </div>

        <?php 
            // kode stand otomatis
            $kasirById = mysqli_query($conn, "SELECT MAX(id_stand) AS ID FROM stand");
            $kasirById = mysqli_fetch_array($kasirById);
            $kode = $kasirById["ID"];
            $urutan = (int)substr($kode,5, 4);
            $urutan++;
            $keteranganID = "stand";
            $kodeAuto = $keteranganID . sprintf("%03s", $urutan);
            
            ?>

        <!-- modal form -->
        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah
            Data
            Stand</button>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-4">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Tambah Data Stand</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mt-3">
                            <section>
                                <div class="row">

                                    <!-- awal batas pertama -->
                                    <div class="col-lg-12">
                                        <!-- input id stand -->
                                        <div class="form-group">
                                            <input type="text" name="id_stand" value="<?= $kodeAuto ?>"
                                                class="form-control" placeholder="ID pj" required readonly>
                                        </div>

                                        <!-- input pj stand -->
                                        <div class="form-group">
                                            <select name="id_pj" id="id_pj" class="form-control" require>
                                                <option value="">Pilih penanggung jawab stand</option>
                                                <?php 
                                                $pjStandAll = mysqli_query($conn, "SELECT * FROM pj_stand");
                                                
                                                foreach ($pjStandAll as $row) { ?>
                                                <option value="<?= $row['id_pj'] ?>"><?= $row['nama_lengkap'] ?>
                                                </option>

                                                <?php  } ?>

                                            </select>
                                        </div>

                                        <!-- input nama stand -->
                                        <div class="form-group">
                                            <input type="text" name="nama_stand" id="nama_stand" class="form-control"
                                                placeholder="Nama stand" required>
                                        </div>

                                        <!-- input keterangan -->
                                        <div class="form-group">
                                            <textarea name="keterangan" id="keterangan" cols="30" rows="10"
                                                class="form-control" placeholder="Keterangan"></textarea>
                                        </div>
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

<!-- tabel data pj stand -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title">Data Stand</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Stand</th>
                                <th class="text-center">Nama Penanggung Jawab Stand</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $dataStandAll = mysqli_query($conn, "SELECT stand.id_stand as id_stand, stand.nama_stand as nama_stand, pj_stand.nama_lengkap as nama_lengkap, stand.keterangan as keterangan FROM stand INNER JOIN pj_stand ON stand.id_pj=pj_stand.id_pj");
                                $no = 1;
                                ?>

                            <?php foreach ($dataStandAll as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $no; ?>.</td>
                                <td><?= $row['nama_stand'] ?></td>
                                <td><?= $row['nama_lengkap'] ?></td>
                                <td><?= $row['keterangan'] ?></td>
                                <td class="row justify-content-center">
                                    <a href="index.php?page=admin&aksi=ubahStand&id=<?= $row['id_stand'] ?>"
                                        class="btn btn-info ubah"
                                        onclick="return confirm('Apakah anda ingin mengubah data ini ?')">Ubah</a>

                                    <a href="index.php?page=admin&aksi=hapusStand&id=<?= $row['id_stand'] ?>"
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




<?php include "layouts/footer-admin.php"; ?>