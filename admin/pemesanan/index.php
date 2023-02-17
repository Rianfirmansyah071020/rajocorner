<?php 
    require_once "controller/controller.php";
    include "layouts/sidebar-admin.php"; 
?>



<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard / Kelola Data Pemesanan</li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">

        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Kelola Data Pemesanan</h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/admin.jpg" alt="">
            </div>
        </div>


    </div>


    <!-- tabel data pemesanan -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">Data Pemesanan</h4>
                        <form action="" method="post">
                            <div class="row justify-content-end p-3">
                                <div class="col-3">
                                    <input type="date" name="awal" id="awal" class="form-control" required>
                                </div>
                                <div class="col-3">
                                    <input type="date" name="akhir" id="akhir" class="form-control" required>
                                </div>
                                <button type="submit" class="btn mb-1 btn-primary" name="cetak">Cari Data
                                    <span class="btn-icon-right"><i class="fa fa-shopping-cart"></i></span>
                                </button>
                        </form>

                        <?php
                        $tglHariIni = date('Y-m-d');
                        if(isset($_POST['cetak'])) { ?>
                        <a href="admin/pemesanan/cetak2.php?awal=<?= $_POST['awal'] ?>&akhir=<?= $_POST['akhir'] ?>"
                            class="btn mb-1 btn-warning ml-2"
                            onclick="return confirm('Apakah anda ingin mencetak data ini ?');" target="_blank">Print</a>
                        <?php }
                        ?>

                        <a href="admin/pemesanan/cetak.php?tgl=<?= $tglHariIni ?>" class="btn btn-primary mb-1 ml-2"
                            target="_blank">Cetak Pemesanan Hari
                            Ini</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Pelanggan</th>
                                    <th class="text-center">Nama Stand</th>
                                    <th class="text-center">Nama Menu</th>
                                    <th class="text-center">Kode Meja</th>
                                    <th class="text-center">Tanggal Pesan</th>
                                    <th class="text-center">Jumlah Pesan</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Status Pesan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                                 

                                $dataPemesananAll = mysqli_query($conn, "SELECT pemesanan.id_pemesanan as id_pemesanan, pelanggan.nama_lengkap as nama_lengkap, stand.nama_stand as nama_stand, menu.nama_menu as nama_menu, meja.kode_meja as kode_meja, pemesanan.tanggal_pesan as tanggal_pesan, pemesanan.jumlah_pesan as jumlah_pesan, pemesanan.total as total, pemesanan.status_pesan status_pesan FROM pemesanan INNER JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan INNER JOIN menu ON pemesanan.id_menu=menu.id_menu INNER JOIN stand ON pemesanan.id_stand=stand.id_stand INNER JOIN meja ON pemesanan.id_meja=meja.id_meja");
                                $no = 1;
                                ?>

                                <?php foreach ($dataPemesananAll as $row) { ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $row['nama_lengkap'] ?></td>
                                    <td><?= $row['nama_stand'] ?></td>
                                    <td><?= $row['nama_menu'] ?></td>
                                    <td class="text-center"><?= $row['kode_meja'] ?></td>
                                    <td><?= date('d F Y', strtotime($row['tanggal_pesan'])) ?></td>
                                    <td class="text-center"><?= $row['jumlah_pesan'] ?></td>
                                    <td>Rp.<?= number_format($row['total']) ?></td>
                                    <td><?= $row['status_pesan'] ?></td>
                                    <td class="row justify-content-center">
                                        <a href="index.php?page=admin&aksi=hapusPemesanan&id=<?= $row['id_pemesanan'] ?>"
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