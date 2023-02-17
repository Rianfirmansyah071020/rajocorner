<?php 
    require_once "controller/controller.php";
    $id = $_GET['id'];
    
    if(hapusMenu($id) > 0) {
        
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

?>