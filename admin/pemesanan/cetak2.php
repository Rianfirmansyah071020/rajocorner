<?php 
require_once "../../controller/controller.php"; 

    $awal = $_GET['awal'];
    $akhir = $_GET['akhir'];

    echo "<script>
    window.print();
    </script>";

?>

<link href="../../public/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="../../public/assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link rel="stylesheet" href="/../../public/assets/sass/main.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<link href="../../public/assets/plugins/summernote/dist/summernote.css" rel="stylesheet">

<div class="container mt-5" style="font-family: monospace;">
    <!-- <h2 class="text-center">Rajo Corner</h2>
    <h4 class="text-center">Jl. Batang Anai Kelurahan No.11, Rimbo Kaluang, Kec. Padang Utara, Kota Padang,
        Sumatera
        Barat</h4> -->
    <!-- <hr class="mb-5"> -->
    <h3 class="text-center mb-4">SALES REPORT</h3>
    <p>
        periode : <?= date('d-m-Y', strtotime($awal)); ?> - <?= date('d-m-Y', strtotime($akhir)); ?>
    </p>
    <hr>
    <?php                                 

                                $dataPemesananAll = mysqli_query($conn, "SELECT sum(pemesanan.total) as total_all, pemesanan.id_pemesanan as id_pemesanan, pelanggan.nama_lengkap as nama_lengkap, stand.nama_stand as nama_stand, menu.nama_menu as nama_menu, meja.kode_meja as kode_meja, pemesanan.tanggal_pesan as tanggal_pesan, pemesanan.jumlah_pesan as jumlah_pesan, pemesanan.total as total, pemesanan.status_pesan status_pesan FROM pemesanan INNER JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan INNER JOIN menu ON pemesanan.id_menu=menu.id_menu INNER JOIN stand ON pemesanan.id_stand=stand.id_stand INNER JOIN meja ON pemesanan.id_meja=meja.id_meja WHERE tanggal_pesan BETWEEN '$awal' and '$akhir'");
                                $no = 1;
                                ?>
    <div class="row">
        <div class="col-lg-6 col-xl-6 col-md-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product Sold</h4>
                    <hr>
                    <div class="basic-list-group justify-content-center">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($dataPemesananAll as $row) { 
                     $total = mysqli_query($conn, "SELECT sum(total) as total FROM pemesanan WHERE tanggal_pesan BETWEEN '$awal' and '$akhir'");
                     $total = mysqli_fetch_array($total);
                    ?>
                            <li class="list-group-item"><?= $row['jumlah_pesan']; ?> <?= $row['nama_menu']; ?>
                                <?= number_format($row['total']) ?></li>
                            <?php $no++; } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </tbody>
    </table>
</div>
</div>
<script src="../../public/assets/plugins/common/common.min.js"></script>
<script src="../../public/assets/js/custom.min.js"></script>
<script src="../../public/assets/js/settings.js"></script>
<script src="../../public/assets/js/gleek.js"></script>
<script src="../../public/assets/js/styleSwitcher.js"></script>
<script src="../../public/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
<script src="../../public/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="../../public/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
<script src="../../public/assets/plugins/summernote/dist/summernote.min.js"></script>
<script src="../../public/assets/plugins/summernote/dist/summernote-init.js"></script>