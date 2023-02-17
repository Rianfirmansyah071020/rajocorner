<?php include "layouts/sidebar-admin.php"; ?>

<?php 
require_once "controller/controller.php";

$idKasir = $_GET['id'];
$kasirById = mysqli_query($conn, "SELECT * FROM kasir WHERE id_kasir='$idKasir'");
$kasirById = mysqli_fetch_array($kasirById);

    if(isset($_POST['ubah'])) {

        if(ubahKasir($_POST) > 0 ) {

            echo "<script>
            alert('Berhasil');
            document.location.href='index.php?page=admin&aksi=kasir';
            </script>";
        } else {

            echo "<script>
            alert('Gagal');
            document.location.href='index.php?page=admin&aksi=kasir';
            </script>";
        }
    }


?>

<div class="content-body">

    <div class="row page-titles mx-0 bg-primary text-white">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard / Kelola Kasir</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row p-3 mt-2 mb-2 card shadow ">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <h5>Halaman Ubah Data kasir <span class="text-info"> <?= $kasirById['nama_lengkap']; ?> </span></h5>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <img src="public/dataimage/content/admin.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center p-3">
            <div class="card col-lg-4 col-xl-4 col-md-12 col-sm-12 p-3">
                <img src="public/dataimage/kasir/<?= $kasirById['foto']; ?>" alt="" class="img-card-top">
            </div>
            <div class="card col-lg-4 col-xl-4 col-md-12 col-sm-12 p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- input id kasir -->
                    <div class="form-group">
                        <input type="text" name="id_kasir" value="<?= $kasirById['id_kasir'] ?>" class="form-control"
                            placeholder="ID kasir" required readonly>
                    </div>

                    <!-- input username -->
                    <div class="form-group">
                        <input type="hidden" name="usernameLama" value="<?= $kasirById['username']; ?>"
                            class="form-control" placeholder="Username">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>

                    <!-- input password -->
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Password baru" autocomplete="off">
                        <input type="hidden" name="passwordLama" value="<?= $kasirById['password']; ?>">
                    </div>

                    <!-- input konfirmasi password -->
                    <div class="form-group">
                        <input type="password" name="passwordConfirm" class="form-control"
                            placeholder="Masukan Ulang Password" id="passwordConfirm">
                        <div class="btn btn-warning" id="cek">cek password</div>
                    </div>

                    <!-- proses cek password -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js">
                    </script>
                    <script>
                    $(document).ready(function() {
                        $('#cek').click(function() {
                            var pass = $('#password').val();
                            var pass2 = $('#passwordConfirm')
                                .val();
                            if (pass != pass2) {
                                alert("password tidak sama!");
                            } else if (pass == pass2) {
                                alert("password sudah sama!");
                            }
                        });
                    });
                    </script>
            </div>
            <div class="card col-lg-4 col-xl-4 col-md-12 col-sm-12 p-3">
                <!-- input nama lengkap -->
                <div class="form-group">
                    <input type="text" name="nama_lengkap" value="<?= $kasirById['nama_lengkap']; ?>"
                        class="form-control" placeholder="Nama Lengkap" required>
                </div>

                <!-- input jenis kelamin -->
                <div class="form-group">
                    <select name="jekel" id="jekel" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki" <?php if($kasirById['jekel'] == 'laki-laki')  echo "selected"?>>
                            Laki
                            - Laki</option>
                        <option value="perempuan" <?php if($kasirById['jekel'] == 'perempuan')  echo "selected"?>>
                            Perempuan</option>
                    </select>
                </div>

                <!-- input nomor hp -->
                <div class="form-group">
                    <input type="text" name="nomor_hp" class="form-control" value="<?= $kasirById['nomor_hp']; ?>"
                        placeholder="Nomor Hp/Wa" required>
                </div>


                <!-- input foto -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text">Upload
                            Foto</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto">
                        <input type="hidden" class="custom-file-input" name="fotoLama"
                            value="<?= $kasirById['foto']; ?>">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>

                <div class="mt-3 row justify-content-end p-3">
                    <button type="submit" class="btn btn-info m-1" name="ubah">simpan</button>
                    <a href="index.php?page=admin&aksi=kasir" class="btn btn-success m-1">kembali</a>
                </div>
            </div>
            </form>
        </div>
    </div>



    <?php include "layouts/footer-admin.php"; ?>