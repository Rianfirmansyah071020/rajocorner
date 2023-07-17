<?php include "layouts/sidebar-pelanggan.php"; 
    require_once "controller/controller.php";
?>

<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Detail Pemesanan</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Detail Pemesanan <span class="text-info"><?= $_SESSION['nama_lengkap'] ?></span></h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/pelanggan2.png" alt="">
            </div>
        </div>
    </div>

    <!-- tabel data pemesanan -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">Data Pemesanan <span
                                class="text-info"><?= $_SESSION['nama_lengkap'] ?></span></h4>
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
                                        <th class="text-center">Waktu Pemesanan</th>
                                        <th class="text-center">Jumlah Pesan</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Status Pesan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $idPelanggan = $_SESSION['id_pelanggan'];
                                $dataPemesananAll = mysqli_query($conn, "SELECT pemesanan.id_pemesanan as id_pemesanan, pelanggan.nama_lengkap as nama_lengkap, stand.nama_stand as nama_stand, menu.nama_menu as nama_menu, meja.kode_meja as kode_meja, pemesanan.tanggal_pesan as tanggal_pesan, pemesanan.jumlah_pesan as jumlah_pesan, pemesanan.waktu_pemesanan as waktu_pemesanan, pemesanan.total as total, pemesanan.status_pesan status_pesan FROM pemesanan INNER JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan INNER JOIN menu ON pemesanan.id_menu=menu.id_menu INNER JOIN stand ON pemesanan.id_stand=stand.id_stand INNER JOIN meja ON pemesanan.id_meja=meja.id_meja WHERE pelanggan.id_pelanggan='$idPelanggan'");                                
                                $no = 1;

                                date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke Asia/Jakarta (Indonesia)

                                $waktu = new DateTime();
                                ?>

                                    <?php foreach ($dataPemesananAll as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?>.</td>
                                        <td><?= $row['nama_lengkap'] ?></td>
                                        <td><?= $row['nama_stand'] ?></td>
                                        <td><?= $row['nama_menu'] ?></td>
                                        <td class="text-center"><?= $row['kode_meja'] ?></td>
                                        <td><?= $waktu->format($row['tanggal_pesan']) ?></td>
                                        <td><?= $row['waktu_pemesanan'] ?></td>
                                        <td class="text-center"><?= $row['jumlah_pesan'] ?></td>
                                        <td class="text-center">Rp.<?= number_format($row['total']) ?></td>
                                        <td class="text-center"><span
                                                class="badge badge-pill badge-success"><?= $row['status_pesan'] ?></span>
                                        </td>
                                        <td class="row justify-content-center">

                                            <?php if($row['status_pesan'] == 'pesan') { ?>
                                            <a href="index.php?page=pelanggan&aksi=batalPemesanan&id=<?= $row['id_pemesanan'] ?>"
                                                class="btn btn-danger hapus"
                                                onclick="return confirm('Apakah anda ingin membatalkan pesanan ini ?')">Batal</a>
                                            <?php } ?>
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


    <?php include "layouts/footer-pelanggan-new.php"; ?>