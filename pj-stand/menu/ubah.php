<?php include "layouts/sidebar-pj-stand.php"; ?>

<?php 
require_once "controller/controller.php";

$idMenu = $_GET['id'];
$menuById = mysqli_query($conn, "SELECT menu.foto as foto, menu.tipe as tipe, menu.id_menu as id_menu, stand.nama_stand as nama_stand, menu.nama_menu as nama_menu, menu.deskripsi as deskripsi, menu.harga as harga, menu.foto as foto FROM menu INNER JOIN stand ON stand.id_stand=menu.id_stand WHERE id_menu='$idMenu'");
$menuById = mysqli_fetch_array($menuById);


    if(isset($_POST['ubah'])) {

        if(ubahMenu($_POST) > 0 ) {
            
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
    }

?>

<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard / Kelola Data Menu</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Ubah Menu <span class="text-primary"><?= $menuById['nama_menu'] ?></span></h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/pj-stand.jpg" alt="" style="width: 300px;">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center p-3">
            <div class="card col-lg-4 col-xl-4 col-md-12 col-sm-12 p-3">
                <img src="public/dataimage/menu/<?= $menuById['foto']; ?>" alt="" class="img-card-top">
            </div>
            <div class="card col-lg-4 col-xl-4 col-md-12 col-sm-12 p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- input id menu -->
                    <div class="form-group">
                        <input type="text" name="id_menu" value="<?= $menuById['id_menu'] ?>" class="form-control"
                            placeholder="ID Menu" required readonly>
                    </div>

                    <!-- input stand -->
                    <div class="form-group">
                        <input type="text" name="nama_stand" id="nama_stand" class="form-control"
                            value="<?= $menuById['nama_stand'] ?>" readonly required>
                        <input type="hidden" name="id_stand" value="<?= $menuById['id_stand'] ?>">
                    </div>

                    <!-- input nama_menu -->
                    <div class="form-group">
                        <input type="text" name="nama_menu" value="<?= $menuById['nama_menu'] ?>" class="form-control"
                            placeholder="Nama Menu" required>
                    </div>

                    <!-- input deskripsi -->
                    <div class="form-group">
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"
                            placeholder="Deskripsi" required><?= $menuById['deskripsi'] ?> </textarea>
                    </div>
            </div>
            <div class="card col-lg-4 col-xl-4 col-md-12 col-sm-12 p-3">
                <!-- input Tipe -->
                <div class="form-group">
                    <select name="tipe" id="tipe" class="form-control" required>
                        <option value="">Pilih tipe</option>
                        <option value="makanan" <?php if($menuById['tipe'] == 'makanan')  echo "selected"; ?>>Makanan
                        </option>
                        <option value="minuman" <?php if($menuById['tipe'] == 'minuman') echo "selected"; ?>>Minuman
                        </option>
                    </select>
                </div>

                <!-- input harga -->
                <div class="form-group">
                    <input type="number" name="harga" class="form-control" value="<?= $menuById['harga'] ?>"
                        placeholder="Harga" required>
                </div>


                <!-- input foto -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text">Upload
                            Foto</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" require>
                        <input type="hidden" name="fotoLama" value="<?= $menuById['foto'] ?>">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>

                <div class="mt-3 row justify-content-end p-3">
                    <button type="submit" class="btn btn-info m-1" name="ubah">simpan</button>
                    <a href="index.php?page=pjStand&aksi=menu" class="btn btn-success m-1">kembali</a>
                </div>
            </div>
            </form>
        </div>
    </div>



    <?php include "layouts/footer-pj-stand.php"; ?>