<?php 
    require_once "controller/controller.php";
    $id = $_GET['id'];
    
    if(hapusStand($id) > 0) {
        
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

?>