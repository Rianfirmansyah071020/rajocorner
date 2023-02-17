<?php 
    require_once "controller/controller.php";
    $id = $_GET['id'];

    if(batalPemesanan($id) > 0 ) {

        echo "<script>
        alert('Berhasil');
        document.location.href='index.php?page=pelanggan&aksi=detailPemesanan';
        </script>";
    }else {

        echo "<script>
        alert('Gagal');
        document.location.href='index.php?page=pelanggan&aksi=detailPemesanan';
        </script>";
    }

?>