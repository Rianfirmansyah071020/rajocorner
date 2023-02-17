<?php 

    require_once "controller/controller.php";

    $id = $_GET['id'];
    $status = $_GET['status'];

    if(ubahStatusPemesanan($id, $status) > 0 ) {

        echo "<script>
        alert('Berhasil');
        document.location.href='index.php?page=pjStand&aksi=konfirmasiPesan';
        </script>";
    }else {

        echo "<script>
        alert('Gagal');
        document.location.href='index.php?page=pjStand&aksi=konfirmasiPesan';
        </script>";
    }

?>