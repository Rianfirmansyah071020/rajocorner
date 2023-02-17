<?php 
include "layouts/sidebar-pj-stand.php"; 
include "controller/controller.php";

if(isset($_POST['simpan'])) {

    // memanggil function tambah pj stand
    if(tambahMenu($_POST) > 0 ) {

        echo "<script>
        alert('Berhasil');
        document.location.href='index.php?page=pjStand&aksi=menu';

        </script>";
    }else {

        echo "<script>
            alert('Gagal');
            document.location.href='index.php?page=pjStand&aksi=menu';
        </script>";
    }
}

$id_pj = $_SESSION['id_pj'];

$standDanPjStand = mysqli_query($conn, "SELECT stand.nama_stand as nama_stand, stand.id_stand as id_stand FROM stand INNER JOIN pj_stand ON pj_stand.id_pj=stand.id_pj WHERE pj_stand.id_pj='$id_pj'");

$standDanPjStand = mysqli_fetch_array($standDanPjStand);
?>

<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard / Kelola Data Menu </li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Kelola Data Menu Stand <span class="text-info"><?= $standDanPjStand['nama_stand'] ?></span>
                </h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/pj-stand.jpg" alt="" style="width: 300px;">
            </div>
        </div>

        <?php 
            // kode menu otomatis
            $menuById = mysqli_query($conn, "SELECT MAX(id_menu) AS ID FROM menu");
            $menuById = mysqli_fetch_array($menuById);
            $kode = $menuById["ID"];
            $urutan = (int)substr($kode,5, 4);
            $urutan++;
            $keteranganID = "menu";
            $kodeAuto = $keteranganID . sprintf("%03s", $urutan);
            
            ?>

        <!-- modal form -->
        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah
            Data
            Menu</button>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-4">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Tambah Data Menu Stand <span
                                class="text-info"><?= $standDanPjStand['nama_stand'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mt-3">
                            <section>
                                <div class="row">

                                    <!-- awal batas pertama -->
                                    <div class="col-lg-6">
                                        <!-- input id menu -->
                                        <div class="form-group">
                                            <input type="text" name="id_menu" value="<?= $kodeAuto ?>"
                                                class="form-control" placeholder="ID Menu" required readonly>
                                        </div>

                                        <!-- input stand -->
                                        <div class="form-group">
                                            <input type="text" name="nama_stand" id="nama_stand" class="form-control"
                                                value="<?= $standDanPjStand['nama_stand'] ?>" readonly required>
                                            <input type="hidden" name="id_stand"
                                                value="<?= $standDanPjStand['id_stand'] ?>">
                                        </div>

                                        <!-- input nama_menu -->
                                        <div class="form-group">
                                            <input type="text" name="nama_menu" class="form-control"
                                                placeholder="Nama Menu" required>
                                        </div>

                                        <!-- input deskripsi -->
                                        <div class="form-group">
                                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5"
                                                class="form-control" placeholder="Deskripsi" required></textarea>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">

                                        <!-- input Tipe -->
                                        <div class="form-group">
                                            <select name="tipe" id="tipe" class="form-control" required>
                                                <option value="">Pilih tipe</option>
                                                <option value="makanan">Makanan</option>
                                                <option value="minuman">Minuman</option>
                                            </select>
                                        </div>

                                        <!-- input harga -->
                                        <div class="form-group">
                                            <input type="number" name="harga" class="form-control" placeholder="Harga"
                                                required>
                                        </div>


                                        <!-- input foto -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text">Upload
                                                    Foto</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="foto" require>
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
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


<!-- tabel data menu -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title">Data Menu Stand <span
                        class="text-info"><?= $standDanPjStand['nama_stand'] ?></span>
                </h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Stand</th>
                                <th class="text-center">Nama Menu</th>
                                <th class="text-center">Deskripsi</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $id_stand = $standDanPjStand['id_stand'];
                                
                                $dataMenuAll = mysqli_query($conn, "SELECT menu.id_menu as id_menu, stand.nama_stand as nama_stand, menu.nama_menu as nama_menu, menu.deskripsi as deskripsi, menu.harga as harga, menu.foto as foto FROM menu INNER JOIN stand ON stand.id_stand=menu.id_stand INNER JOIN pj_stand ON pj_stand.id_pj=stand.id_pj WHERE stand.id_stand='$id_stand'");
                                $no = 1;
                                ?>

                            <?php foreach ($dataMenuAll as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $no; ?>.</td>
                                <td><?= $row['nama_stand'] ?></td>
                                <td><?= $row['nama_menu'] ?></td>
                                <td><?= $row['deskripsi'] ?></td>
                                <td class="text-center">Rp.<?= number_format($row['harga']) ?></td>
                                <td class="row">
                                    <a href="index.php?page=pjStand&aksi=detailMenu&id=<?= $row['id_menu'] ?>"
                                        class="btn btn-warning"
                                        onclick="return confirm('Apakah anda ingin melihat detail data ini ?')">Detail</a>

                                    <a href="index.php?page=pjStand&aksi=ubahMenu&id=<?= $row['id_menu'] ?>"
                                        class="btn btn-info ubah"
                                        onclick="return confirm('Apakah anda ingin mengubah data ini ?')">Ubah</a>

                                    <a href="index.php?page=pjStand&aksi=hapusMenu&id=<?= $row['id_menu'] ?>"
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




<?php include "layouts/footer-pj-stand.php"; ?>