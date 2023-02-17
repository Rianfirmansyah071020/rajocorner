<?php 
    
    require_once "controller/controller.php";
    include "layouts/header-pelanggan.php";

    if(isset($_POST['daftar'])) {

        if(daftarPelanggan($_POST) > 0 ) {
            
            echo "<script>
            alert('Selamat anda berhasil mendaftar selanjutnya silahkan login dan pilih menu yang anda inginkan');
            document.location.href='index.php?page=&aksi=home';
            </script>";
        }else {

            echo "<script>
            alert('Maaf anda gagal mendantar silahkan coba lagi');
            document.location.href='index.php?page=&aksi=home';
            </script>";
        }
    }
?>
<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                    <div class="about-img">
                        <img src="public/dataimage/content/dok1.jpeg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>Rajo Corner</h3>
                    <p class="fst-italic">
                        Rajo Corner merupakan salah satu restoran yang ada di kota padang, restoran ini menyediakan
                        berbagai macam jenis makanan dan minuman. restoran rajo corner beralamat di Alamat: Jl. Batang
                        Kampar No. 3G Komplek GOR Agus Salim, Rimbo Kaluang, Kec. Padang Bar., Kota Padang, Sumatera
                        Barat 25111
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Menu</h2>
                <p>Lihat semua menu yang tersedia</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-makanan">Makanan</li>
                        <li data-filter=".filter-minuman">Minuman</li>
                    </ul>
                </div>
            </div>

            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                <?php
                
                $menuAll = mysqli_query($conn, "SELECT * FROM menu ");
                foreach ($menuAll as $row) {
                ?>

                <div class="col-lg-6 menu-item filter-<?= $row['tipe'] ?>">
                    <img src="public/dataimage/menu/<?= $row['foto'] ?>" class="menu-img" alt="" style="width: 150px;">
                    <div class="menu-content">
                        <?php if($_SESSION['login_pelanggan']) { ?>
                        <a onclick="return confirm('Apakah anda ingin memesan menu ini ?'); "
                            href="index.php?page=&aksi=pesanMenu&id=<?= $row['id_menu'] ?>"><?= $row['nama_menu'] ?></a><span>Rp.<?= number_format($row['harga']); ?></span>
                        <?php }else { ?>

                        <a onclick="return confirm('Silahkan login terlebih dahulu agar anda bisa melakukan pemesanan '); "
                            href="index.php?page=&aksi=home#login"><?= $row['nama_menu'] ?></a><span>Rp.<?= number_format($row['harga']); ?></span>
                        <?php } ?>
                    </div>
                    <div class="menu-ingredients">
                        <?= $row['deskripsi']; ?>
                    </div>
                </div>

                <?php } ?>
            </div>

        </div>
    </section><!-- End Menu Section -->



    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Galeri</h2>
                <p>Galeri Restoran Rajo Corner</p>
            </div>
        </div>

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0">

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="public/dataimage/content/dok1.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                            <img src="public/dataimage/content/dok1.jpeg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="public/dataimage/content/dok2.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                            <img src="public/dataimage/content/dok2.jpeg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="public/dataimage/content/dok3.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                            <img src="public/dataimage/content/dok3.jpeg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="public/dataimage/content/dok4.jpeg" class="gallery-lightbox" data-gall="gallery-item">
                            <img src="public/dataimage/content/dok4.jpeg" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Lokasi Rajo Corner</h2>
            </div>
        </div>

        <div data-aos="fade-up">
            <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.2966128031603!2d100.35702871329477!3d-0.9265723993240732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b99af9d3700d%3A0x56a4fb083f3af7e3!2sRAJO%20CORNER!5e0!3m2!1sid!2sid!4v1674360117759!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section><!-- End Contact Section -->

    <?php 

     // kode pelanggan otomatis
     $pelangganById = mysqli_query($conn, "SELECT MAX(id_pelanggan) AS ID FROM pelanggan");
     $pelangganById = mysqli_fetch_array($pelangganById);
     $kode = $pelangganById["ID"];
     $urutan = (int)substr($kode,3, 6);
     $urutan++;
     $keteranganID = "plg";
     $kodeAuto = $keteranganID . sprintf("%05s", $urutan);
     
     ?>

    <style>
    .form-new {
        background-color: black;
        color: white;
    }
    </style>

    <!-- ======= Book A Table Section ======= -->
    <?php if(!$_SESSION['login_pelanggan']) { ?>
    <section id="registrasi" class="book-a-table">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Registrasi</h2>
            </div>
            <div class="row">
                <!-- awal batas pertama -->
                <div class="col-lg-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- input id pelanggan -->
                        <div class="form-group mt-2">
                            <input type="text" name="id_pelanggan" value="<?= $kodeAuto ?>"
                                class="form-control form-new" placeholder="ID Pelanggan" required readonly>
                        </div>

                        <!-- input username -->
                        <div class="form-group mt-2">
                            <input type="text" name="username" class="form-control form-new" placeholder="Username"
                                required>
                        </div>

                        <!-- input password -->
                        <div class="form-group mt-2">
                            <input type="password" name="password" id="password" class="form-control form-new"
                                placeholder="Password" required>
                        </div>

                        <!-- input konfirmasi password -->
                        <div class="form-group mt-2">
                            <input type="password" name="passwordConfirm" class="form-control form-new"
                                placeholder="Masukan Ulang Password" id="passwordConfirm" required>
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


                <div class="col-lg-6 mt-2">
                    <!-- input nama lengkap -->
                    <div class="form-group">
                        <input type="text" name="nama_lengkap" class="form-control form-new" placeholder="Nama Lengkap"
                            required>
                    </div>

                    <!-- input jenis kelamin -->
                    <div class="form-group mt-2">
                        <select name="jekel" id="jekel" class="form-control form-new">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="laki-laki">Laki - Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>

                    <!-- input nomor hp -->
                    <div class="form-group mt-2">
                        <input type="text" name="nomor_hp" class="form-control form-new" placeholder="Nomor Hp/Wa"
                            required>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-warning" name="daftar">daftar</button>
                </div>
                </form>
            </div>
        </div>
    </section>

    <?php } ?>



    </div>
    </section><!-- End Book A Table Section -->

    <style>
    .login {
        background-color: #873600;

    }
    </style>
    <!-- login -->
    <?php if(!$_SESSION['login_pelanggan'] && !$_SESSION['login_admin'] && !$_SESSION['login_kasir'] && !$_SESSION['login_pj']) { ?>
    <section id="login" class="book-a-table login">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Login</h2>
            </div>
            <form action="index.php?page=&aksi=login" method="post">
                <div class="row">
                    <div class="col-lg-4 col-md-6 form-group">
                        <input type="text" name="username" class="form-control" id="username" placeholder="username">
                    </div>
                    <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="password">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-warning" name="login">login</button>
                </div>
            </form>


        </div>
    </section><!-- End Book A Table Section -->

    <?php } ?>


</main><!-- End #main -->












<?php 
    include "layouts/footer.pelanggan.php";
?>