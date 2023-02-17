    <?php 
    require_once "controller/controller.php";
    include "layouts/sidebar-admin.php"; 


    if(isset($_POST['simpan'])) {

        // memanggil function tambah admin
        if(tambahAdmin($_POST) > 0 ) {

            echo "<script>
            alert('Berhasil');
            document.location.href='index.php?page=admin&aksi=admin';

            </script>";
        }else {

            echo "<script>
                alert('Gagal');
                document.location.href='index.php?page=admin&aksi=admin';
            </script>";
        }
    }


    ?>



    <div class="content-body">

        <div class="row page-titles mx-0 bg-primary text-white">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard / Kelola Data Admin</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="container-fluid">

            <div class="row p-3 mt-2 mb-2 card shadow ">
                <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                    <h5>Halaman Kelola Data Admin</h5>
                </div>
                <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                    <img src="public/dataimage/content/admin.jpg" alt="">
                </div>
            </div>

            <?php 
            // kode admin otomatis
            $adminById = mysqli_query($conn, "SELECT MAX(id_admin) AS ID FROM admin");
            $adminById = mysqli_fetch_array($adminById);
            $kode = $adminById["ID"];
            $urutan = (int)substr($kode,5, 4);
            $urutan++;
            $keteranganID = "admin";
            $kodeAuto = $keteranganID . sprintf("%03s", $urutan);
            
            ?>

            <!-- modal form -->
            <button type="button" class="btn btn-primary mt-4" data-toggle="modal"
                data-target=".bd-example-modal-lg">Tambah
                Data
                Admin</button>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content p-4">
                        <div class="modal-header">
                            <h5 class="modal-title">Form Tambah Data Admin</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mt-3">
                                <section>
                                    <div class="row">

                                        <!-- awal batas pertama -->
                                        <div class="col-lg-6">
                                            <!-- input id admin -->
                                            <div class="form-group">
                                                <input type="text" name="id_admin" value="<?= $kodeAuto ?>"
                                                    class="form-control" placeholder="ID Admin" required readonly>
                                            </div>

                                            <!-- input username -->
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control"
                                                    placeholder="Username" required>
                                            </div>

                                            <!-- input password -->
                                            <div class="form-group">
                                                <input type="password" name="password" id="password"
                                                    class="form-control" placeholder="Password" required>
                                            </div>

                                            <!-- input konfirmasi password -->
                                            <div class="form-group">
                                                <input type="password" name="passwordConfirm" class="form-control"
                                                    placeholder="Masukan Ulang Password" id="passwordConfirm" required>
                                                <div class="btn btn-warning" id="cek">cek password</div>
                                            </div>

                                            <!-- proses cek password -->
                                            <script
                                                src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js">
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


                                        <div class="col-lg-6">
                                            <!-- input nama lengkap -->
                                            <div class="form-group">
                                                <input type="text" name="nama_lengkap" class="form-control"
                                                    placeholder="Nama Lengkap" required>
                                            </div>

                                            <!-- input jenis kelamin -->
                                            <div class="form-group">
                                                <select name="jekel" id="jekel" class="form-control">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="laki-laki">Laki - Laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            <!-- input nomor hp -->
                                            <div class="form-group">
                                                <input type="text" name="nomor_hp" class="form-control"
                                                    placeholder="Nomor Hp/Wa" required>
                                            </div>


                                            <!-- input foto -->
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Upload
                                                        Foto</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="foto" require>
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="simpan">simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- tabel data admin -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Data Admin</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Nomor Hp</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $dataAdminAll = mysqli_query($conn, "SELECT * FROM admin");
                                $no = 1;
                                ?>

                                <?php foreach ($dataAdminAll as $row) { ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $row['nama_lengkap'] ?></td>
                                    <td class="text-center"><?= $row['jekel'] ?></td>
                                    <td class="text-center"><?= $row['nomor_hp'] ?></td>
                                    <td class="row justify-content-center">
                                        <a href="index.php?page=admin&aksi=detailAdmin&id=<?= $row['id_admin'] ?>"
                                            class="btn btn-warning"
                                            onclick="return confirm('Apakah anda ingin melihat detail data ini ?')">Detail</a>

                                        <a href="index.php?page=admin&aksi=ubahAdmin&id=<?= $row['id_admin'] ?>"
                                            class="btn btn-info ubah"
                                            onclick="return confirm('Apakah anda ingin mengubah data ini ?')">Ubah</a>

                                        <a href="index.php?page=admin&aksi=hapusAdmin&id=<?= $row['id_admin'] ?>"
                                            class="btn btn-danger hapus"
                                            onclick="return confirm('Apakah anda ingin menghapus data ini ?')">Hapus</a>
                                    </td>
                                </tr>

                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php include "layouts/footer-admin.php"; ?>