<?php 
    session_start();
    include "layouts/sidebar-pj-stand.php"; 
    require_once "controller/controller.php";

    $id_pj = $_SESSION['id_pj'];

    $standDanPjStand = mysqli_query($conn, "SELECT stand.id_stand as id_stand, stand.nama_stand as nama_stand, stand.id_stand as id_stand FROM stand INNER JOIN pj_stand ON pj_stand.id_pj=stand.id_pj WHERE pj_stand.id_pj='$id_pj'");

$standDanPjStand = mysqli_fetch_array($standDanPjStand);
?>

<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard / Konfirmasi Pemesanan</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Konfirmasi Pemesanan Stand <span
                        class="text-info"><?= $standDanPjStand['nama_stand'] ?></span></h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/pj-stand.jpg" alt="" style="width: 300px;">
            </div>
        </div>
    </div>


    <!-- tabel data menu -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">Data Pemesanan Stand <span
                                class="text-info"><?= $standDanPjStand['nama_stand'] ?></span>
                        </h4>
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
                                $id_stand = $standDanPjStand['id_stand'];
                                                            
                                $dataPemesananAll = mysqli_query($conn, "SELECT pemesanan.id_pemesanan as id_pemesanan, pelanggan.nama_lengkap as nama_lengkap, stand.nama_stand as nama_stand, menu.nama_menu as nama_menu, meja.kode_meja as kode_meja, pemesanan.tanggal_pesan as tanggal_pesan, pemesanan.jumlah_pesan as jumlah_pesan, pemesanan.total as total, pemesanan.status_pesan status_pesan, stand.nama_stand as nama_stand FROM pemesanan INNER JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan INNER JOIN menu ON pemesanan.id_menu=menu.id_menu INNER JOIN stand ON pemesanan.id_stand=stand.id_stand INNER JOIN meja ON pemesanan.id_meja=meja.id_meja WHERE pemesanan.id_stand='$id_stand'");
                                $no = 1;
                                ?>

                                    <?php foreach ($dataPemesananAll as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?>.</td>
                                        <td><?= $row['nama_lengkap'] ?></td>
                                        <td><?= $row['nama_stand'] ?></td>
                                        <td><?= $row['nama_menu'] ?></td>
                                        <td class="text-center"><?= $row['kode_meja'] ?></td>
                                        <td><?= $row['tanggal_pesan'] ?></td>
                                        <td class="text-center"><?= $row['jumlah_pesan'] ?></td>
                                        <td>Rp.<?= number_format($row['total']) ?></td>
                                        <td class="text-center"><span
                                                class="badge badge-pill badge-success"><?= $row['status_pesan'] ?></span>
                                        </td>
                                        <td class="row justify-content-center">
                                            <?php if($row['status_pesan'] == 'pesan'){ ?>
                                            <a href="index.php?page=pjStand&aksi=ubahStatusPemesanan&id=<?= $row['id_pemesanan'] ?>&status=sedang diproses"
                                                class="btn btn-danger hapus"
                                                onclick="return confirm('Apakah anda ingin mengkonformasi pemesanan ini ?')">Sedang
                                                di proses</a>
                                            <?php } ?>

                                            <?php if($row['status_pesan'] == 'sedang diproses'){ ?>
                                            <a href="index.php?page=pjStand&aksi=ubahStatusPemesanan&id=<?= $row['id_pemesanan'] ?>&status=sudah disajikan"
                                                class="btn btn-danger hapus"
                                                onclick="return confirm('Apakah anda ingin mengkonformasi pemesanan ini ?')">sudah
                                                disajikan</a>
                                            <?php } ?>

                                            <?php if($row['status_pesan'] == 'sudah disajikan'){ ?>
                                            <a href="index.php?page=pjStand&aksi=ubahStatusPemesanan&id=<?= $row['id_pemesanan'] ?>&status=bayar"
                                                class="btn btn-danger hapus"
                                                onclick="return confirm('Apakah anda ingin mengkonformasi pemesanan ini ?')">bayar</a>
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
</div>


<?php include "layouts/footer-pj-stand.php"; ?>