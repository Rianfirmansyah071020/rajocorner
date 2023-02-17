<?php 
    require_once "controller/controller.php";
    $id = $_GET['id'];
    
    if(hapusPelanggan($id) > 0) {
        
        echo "<script>
        alert('Berhasil');
        document.location.href='index.php?page=admin&aksi=pelanggan';
        </script>";
    }else {

        echo "<script>
        alert('Gagal');
        document.location.href='index.php?page=admin&aksi=pelanggan';
        </script>";
    }

?>