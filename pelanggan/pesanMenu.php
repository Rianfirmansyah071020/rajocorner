<?php 

    include "layouts/header-pelanggan.php";

    require_once "controller/controller.php";

    if($_SESSION['login_pelanggan']) {
        $_SESSION['pesan'] = true;
    }

    $id = $_GET['id'];

    $dataMenuById = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu='$id'");
    $dataMenuById = mysqli_fetch_array($dataMenuById);


    if(isset($_POST['pesan'])) {
        
        if(tambahPemesanan($_POST) > 0 ) {

            echo "<script>
            alert('Berhasil');
            document.location.href='index.php?page=&aksi=home';
            </script>";

        }else {

            echo "<script>
            alert('Gagal');
            document.location.href='index.php?page=&aksi=home';
            </script>";
        }
    }
?>

<div class="container">
    <h2 class="mt-5 mb-3 text-center">Form Pemesanan Menu <span
            class="text-warning"><?= $dataMenuById['nama_menu']; ?></span></h2>
    <div class="row justify-content-center">
        <div class="col-lg-3 col-xl-3 col-md-12 col-sm-12 p-3 m-1 row justify-content-center">
            <img src="public/dataimage/menu/<?= $dataMenuById['foto']?>" alt=""
                style="width: 250px; border-radius:15px;">
        </div>

        <?php 
            // kode menu otomatis
            $menuById = mysqli_query($conn, "SELECT MAX(id_pemesanan) AS ID FROM pemesanan");
            $menuById = mysqli_fetch_array($menuById);
            $kode = $menuById["ID"];
            $urutan = (int)substr($kode,2, 4);
            $urutan++;
            $keteranganID = "pm";
            $kodeAuto = $keteranganID . sprintf("%03s", $urutan);  
            
            date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke Asia/Jakarta (Indonesia)

            $waktuSekarang = new DateTime();
            
            ?>

        <div class="col-lg-7 col-xl-7 col-md-12 col-sm-12 p-3 m-1">
            <form action="" method="post">
                <input type="hidden" name="id_pelanggan" value="<?= $_SESSION['id_pelanggan'] ?>">
                <input type="hidden" name="waktu_pemesanan" value="<?= $waktuSekarang->format('H:i:s') ?>">
                <div class="form-group mt-2">
                    <input type="text" name="nama menu" value="<?= $dataMenuById['nama_menu'] ?>" id="nama menu"
                        placeholder="nama menu" class="form-control" readonly required>
                </div>
                <div class="form-group mt-2">
                    <input type="text" name="harga2" value="Rp.<?= number_format($dataMenuById['harga']) ?>" id="harga2"
                        placeholder="Harga menu" class="form-control" readonly required>
                    <input type="hidden" name="harga" value="<?= $dataMenuById['harga'] ?>">
                </div>
                <div class="form-group mt-2">
                    <input type="hidden" name="id_pemesanan" value="<?= $kodeAuto ?>" id="id_pemesanan"
                        placeholder="ID Pemesanan" class="form-control" readonly required>
                </div>
                <div class="form-group mt-2">
                    <input type="hidden" name="id_stand" value="<?= $dataMenuById['id_stand'] ?>" id="id_stand"
                        placeholder="ID Stand" class="form-control" readonly required>
                </div>
                <div class="form-group mt-2">
                    <input type="hidden" name="id_menu" value="<?= $dataMenuById['id_menu'] ?>" id="id_menu"
                        placeholder="ID Menu" class="form-control" readonly required>
                </div>

                <div class="form-group mt-2">
                    <select name="id_meja" id="id_meja" class="form-control" required>
                        <option value="">Pilih meja</option>
                        <?php 
                $mejaAll = mysqli_query($conn, "SELECT * FROM meja");
                foreach ($mejaAll as $row) { ?>
                        <option value="<?= $row['id_meja'] ?>"><?= $row['kode_meja'] ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <input type="number" name="jumlah_pesan" id="jumlah_pesan" placeholder="Jumlah Pesan"
                        class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <input type="hidden" name="tanggal_pesan" value="<?= date('Y/m/d') ?>" id="tanggal_pesan"
                        placeholder="tanggal Pesan" class="form-control" readonly required>
                </div>

                <div class="m-3 form-group row justify-content-end">
                    <div class="col-2">
                        <button type="submit" name="pesan" class="btn btn-warning">pesan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>







<?php include "layouts/footer.pelanggan.php"; ?>