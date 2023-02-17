<?php
require_once "controller/controller.php";

    $id = $_GET['id'];

    if(hapusMeja($id) > 0 ) {

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

?>