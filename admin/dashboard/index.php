    <?php include "layouts/sidebar-admin.php"; 
    require_once "controller/controller.php";
    ?>

    <div class="content-body">

        <div class="row page-titles mx-0 bg-primary text-white">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row p-3 mt-2 mb-2 card shadow ">
                <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                    <h5>Halaman Dashboard</h5>
                </div>
                <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                    <img src="public/dataimage/content/admin.jpg" alt="">
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3 p-5">
            <div class="col-lg-6 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Jumlah Admin</h3>
                        <?php 
                        $jumlahAdmin = mysqli_query($conn, "SELECT * FROM admin");
                        $jumlahAdmin = mysqli_num_rows($jumlahAdmin);
                        
                        ?>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $jumlahAdmin; ?></h2>
                        </div>
                        <span class="float-right display-5 opacity-5">
                            <i class="fa-solid fa-user"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Jumlah Kasir</h3>
                        <?php 
                        $jumlahKasir = mysqli_query($conn, "SELECT * FROM kasir");
                        $jumlahKasir = mysqli_num_rows($jumlahKasir);
                        
                        ?>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $jumlahKasir; ?></h2>
                        </div>
                        <span class="float-right display-5 opacity-5">
                            <i class="fa-solid fa-user"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Jumlah Meja</h3>
                        <?php 
                        $jumlahMeja = mysqli_query($conn, "SELECT * FROM meja");
                        $jumlahMeja = mysqli_num_rows($jumlahMeja);
                        
                        ?>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $jumlahMeja; ?></h2>
                        </div>
                        <span class="float-right display-5 opacity-5">
                            <i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Jumlah Stand</h3>
                        <?php 
                        $jumlahStand = mysqli_query($conn, "SELECT * FROM stand");
                        $jumlahStand = mysqli_num_rows($jumlahStand);
                        
                        ?>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $jumlahStand; ?></h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6">
                <div class="card gradient-5">
                    <div class="card-body">
                        <h3 class="card-title text-white">Jumlah Pelanggan</h3>
                        <?php 
                        $jumlahPelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
                        $jumlahPelanggan = mysqli_num_rows($jumlahPelanggan);
                        
                        ?>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $jumlahPelanggan; ?></h2>
                        </div>
                        <span class="float-right display-5 opacity-5">
                            <i class="fa-solid fa-user"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6">
                <div class="card gradient-6">
                    <div class="card-body">
                        <h3 class="card-title text-white">Jumlah Pemesanan</h3>
                        <?php 
                        $jumlahPemesanan = mysqli_query($conn, "SELECT SUM(jumlah_pesan) AS jumlah_pesan FROM pemesanan");
                        $jumlahPemesanan = mysqli_fetch_assoc($jumlahPemesanan);
                        
                        ?>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $jumlahPemesanan['jumlah_pesan']; ?></h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6">
                <div class="card gradient-7">
                    <div class="card-body">
                        <h3 class="card-title text-white">Jumlah Transaksi</h3>
                        <?php 
                        $jumlahTransaksi = mysqli_query($conn, "SELECT SUM(total) AS total FROM pemesanan");
                        $jumlahTransaksi = mysqli_fetch_assoc($jumlahTransaksi);
                        
                        ?>
                        <div class="d-inline-block">
                            <h2 class="text-white">Rp.<?= number_format($jumlahTransaksi['total']); ?></h2>
                        </div>
                        <span class="float-right display-5 opacity-5">
                            <i class="fa-solid fa-dollar-sign"></i></span>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <?php include "layouts/footer-admin.php"; ?>