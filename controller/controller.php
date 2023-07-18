<?php 

    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "corner");

    if($conn == false) { 

        echo "<script> alert('Koneksi Gagal'); </script>";
}


    // function tambah gambar admin
    function uploadGambarAdmin() {
    $direktory = 'public/dataimage/admin/';
    $namaFile = $_FILES['foto']['name'];
    $error = $_FILES['foto']['error'];
    $size = $_FILES['foto']['size'];

    if ($error === 4) {
    echo "<script>
        alert('Harap Upload Foto Terlebih Dahulu');
    </script>";
    return false;
    }


    $ekstensiValid = ['jpg','jpeg','png','oip'];
    $ekstensi = explode('.', $namaFile);
    $ekstensi = strtolower(end($ekstensi));

    if (!in_array($ekstensi, $ekstensiValid)){
    echo "<script>
        alert('Maaf Yang Anda Upload Bukan Gambar Mohon Periksa Kembali');
    </script>";
    return false;
    }

    if ($size >= 30000000000){
    echo "<script>
        alert('Maaf Gambar Yang Anda Upload Ukurannya Terlalu Besar, Ukuran Gambar Maksimal Hanya 3 MB');
    </script>";
    return false;
    }

    move_uploaded_file($_FILES['foto']['tmp_name'], $direktory. $namaFile);

    return $namaFile;

    }



     // function tambah gambar kasir
     function uploadGambarKasir() {
        $direktory = 'public/dataimage/kasir/';
        $namaFile = $_FILES['foto']['name'];
        $error = $_FILES['foto']['error'];
        $size = $_FILES['foto']['size'];
    
        if ($error === 4) {
        echo "<script>
            alert('Harap Upload Foto Terlebih Dahulu');
        </script>";
        return false;
        }
    
    
        $ekstensiValid = ['jpg','jpeg','png','oip'];
        $ekstensi = explode('.', $namaFile);
        $ekstensi = strtolower(end($ekstensi));
    
        if (!in_array($ekstensi, $ekstensiValid)){
        echo "<script>
            alert('Maaf Yang Anda Upload Bukan Gambar Mohon Periksa Kembali');
        </script>";
        return false;
        }
    
        if ($size >= 30000000000){
        echo "<script>
            alert('Maaf Gambar Yang Anda Upload Ukurannya Terlalu Besar, Ukuran Gambar Maksimal Hanya 3 MB');
        </script>";
        return false;
        }
    
        move_uploaded_file($_FILES['foto']['tmp_name'], $direktory. $namaFile);
    
        return $namaFile;
    
        }



         // function tambah gambar pj stand
     function uploadGambarPj() {
        $direktory = 'public/dataimage/pj_stand/';
        $namaFile = $_FILES['foto']['name'];
        $error = $_FILES['foto']['error'];
        $size = $_FILES['foto']['size'];
    
        if ($error === 4) {
        echo "<script>
            alert('Harap Upload Foto Terlebih Dahulu');
        </script>";
        return false;
        }
    
    
        $ekstensiValid = ['jpg','jpeg','png','oip'];
        $ekstensi = explode('.', $namaFile);
        $ekstensi = strtolower(end($ekstensi));
    
        if (!in_array($ekstensi, $ekstensiValid)){
        echo "<script>
            alert('Maaf Yang Anda Upload Bukan Gambar Mohon Periksa Kembali');
        </script>";
        return false;
        }
    
        if ($size >= 30000000000){
        echo "<script>
            alert('Maaf Gambar Yang Anda Upload Ukurannya Terlalu Besar, Ukuran Gambar Maksimal Hanya 3 MB');
        </script>";
        return false;
        }
    
        move_uploaded_file($_FILES['foto']['tmp_name'], $direktory. $namaFile);
    
        return $namaFile;
    
        }




         // function tambah gambar menu
     function uploadGambarMenu() {
        $direktory = 'public/dataimage/menu/';
        $namaFile = $_FILES['foto']['name'];
        $error = $_FILES['foto']['error'];
        $size = $_FILES['foto']['size'];
    
        if ($error === 4) {
        echo "<script>
            alert('Harap Upload Foto Terlebih Dahulu');
        </script>";
        return false;
        }
    
    
        $ekstensiValid = ['jpg','jpeg','png','oip'];
        $ekstensi = explode('.', $namaFile);
        $ekstensi = strtolower(end($ekstensi));
    
        if (!in_array($ekstensi, $ekstensiValid)){
        echo "<script>
            alert('Maaf Yang Anda Upload Bukan Gambar Mohon Periksa Kembali');
        </script>";
        return false;
        }
    
        if ($size >= 30000000000){
        echo "<script>
            alert('Maaf Gambar Yang Anda Upload Ukurannya Terlalu Besar, Ukuran Gambar Maksimal Hanya 3 MB');
        </script>";
        return false;
        }
    
        move_uploaded_file($_FILES['foto']['tmp_name'], $direktory. $namaFile);
    
        return $namaFile;
    
        }


// admin -------------------------------------------------------------------------------------------
    // function create admin
    function tambahAdmin($data) {
        global $conn;

        $id_admin = htmlspecialchars($data['id_admin']);
        $username = htmlspecialchars($data['username']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $jekel = htmlspecialchars($data['jekel']);
        $nomor_hp = htmlspecialchars($data['nomor_hp']);
        $foto = uploadGambarAdmin();

        // cek username di tabel admin
        $cekUsername = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
        if(mysqli_num_rows($cekUsername) > 0 ) {

            echo " <script>
                alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        // cek username di tabel login
        $cekUsernameLogin = mysqli_query($conn, "SELECT * FROM login WHERE username='$username'");
        if(mysqli_num_rows($cekUsernameLogin) > 0 ) {

            echo "<script>
             alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        
        if(!$foto) {
            return false;
        }


        // create data admin tabel admin
        $createAdmin = mysqli_query($conn, "INSERT INTO admin (id_admin, username, password, nama_lengkap, jekel, nomor_hp, foto) VALUES ('$id_admin', '$username', '$password', '$nama_lengkap', '$jekel', '$nomor_hp', '$foto')");


        // Id Auto Tabel Login
        $loginById = mysqli_query($conn, "SELECT MAX(id_login) AS ID FROM login");
        $loginById = mysqli_fetch_array($loginById);
        $kode = $loginById["ID"];
        $urutan = (int)substr($kode,5, 4);
        $urutan++;
        $keteranganID = "login";
        $kodeAutoLogin = $keteranganID . sprintf("%04s", $urutan);
        
        // create data admin tabel login
        $createAdminLogin = mysqli_query($conn, "INSERT INTO login (id_login, kode, username, password, level) VALUES ('$kodeAutoLogin', '$id_admin', '$username', '$password', 'admin');");

       if($createAdmin && $createAdminLogin) {
        
         return mysqli_affected_rows($conn);
       }else {

        return false;
       }

    }


    // hapus admin
    function hapusAdmin ($id) { 
        global $conn;

        $hapusAdminById = mysqli_query($conn, "DELETE FROM admin WHERE id_admin='$id'");
        $hapusAdminLoginById = mysqli_query($conn, "DELETE FROM login WHERE kode='$id'");

        if($hapusAdminById && $hapusAdminLoginById) {
            
            return mysqli_affected_rows($conn);
        }else {
            return false;
        }
    }


    // ubah admin
    function ubahAdmin ($data) {
        global $conn;

        $id_admin = htmlspecialchars($data['id_admin']);
        $usernameBaru = htmlspecialchars($data['username']);
        $usernameLama = htmlspecialchars($data['usernameLama']);
        $passwordBaru = password_hash($data['password'], PASSWORD_DEFAULT);
        $passwordLama = htmlspecialchars($data['passwordLama']);
        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $jekel = htmlspecialchars($data['jekel']);
        $nomor_hp = htmlspecialchars($data['nomor_hp']);
        $fotoLama = htmlspecialchars($data['fotoLama']);


        // cek username di tabel admin
        $cekUsername = mysqli_query($conn, "SELECT * FROM admin WHERE username='$usernameBaru'");
        if(mysqli_num_rows($cekUsername) > 0 ) {

            echo " <script>
                alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        // cek username di tabel login
        $cekUsernameLogin = mysqli_query($conn, "SELECT * FROM login WHERE username='$usernameBaru'");
        if(mysqli_num_rows($cekUsernameLogin) > 0 ) {

            echo "<script>
             alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        if(!$usernameBaru) {

            $username = $usernameLama;
        }else {

            $username = $usernameBaru;
        }
        
       if(!$passwordBaru) {

        $password = $passwordLama;
       }else {

        $password = $passwordBaru;
       }


       if($_FILES['foto']['error'] === 4){

        $foto = $fotoLama;
       }else {

        $foto = uploadGambarAdmin();
       }

        //   ubah tabel admin berdasarkan Id
       $ubahAdminById = mysqli_query($conn, "UPDATE admin SET username='$username', password='$password', nama_lengkap='$nama_lengkap', jekel='$jekel', nomor_hp='$nomor_hp', foto='$foto' WHERE id_admin = '$id_admin'");


        //  ubah tabel login berdasarkan kode
        $ubahAdminLoginById = mysqli_query($conn, "UPDATE login SET username='$username', password='$password' WHERE kode='$id_admin'");


        if($ubahAdminById && $ubahAdminLoginById) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }


    }






    // kasir -------------------------------------------------------------------------------------------
    // function create kasir
    function tambahKasir($data) {
        global $conn;

        $id_kasir = htmlspecialchars($data['id_kasir']);
        $username = htmlspecialchars($data['username']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $jekel = htmlspecialchars($data['jekel']);
        $nomor_hp = htmlspecialchars($data['nomor_hp']);
        $foto = uploadGambarKasir();

        // cek username di tabel kasir
        $cekUsername = mysqli_query($conn, "SELECT * FROM kasir WHERE username='$username'");
        if(mysqli_num_rows($cekUsername) > 0 ) {

            echo " <script>
                alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        // cek username di tabel login
        $cekUsernameLogin = mysqli_query($conn, "SELECT * FROM login WHERE username='$username'");
        if(mysqli_num_rows($cekUsernameLogin) > 0 ) {

            echo "<script>
             alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        
        if(!$foto) {
            return false;
        }


        // create data aksir tabel aksir
        $createKasir = mysqli_query($conn, "INSERT INTO kasir (id_kasir, username, password, nama_lengkap, jekel, nomor_hp, foto) VALUES ('$id_kasir', '$username', '$password', '$nama_lengkap', '$jekel', '$nomor_hp', '$foto')");


        // Id Auto Tabel Login
        $loginById = mysqli_query($conn, "SELECT MAX(id_login) AS ID FROM login");
        $loginById = mysqli_fetch_array($loginById);
        $kode = $loginById["ID"];
        $urutan = (int)substr($kode,5, 4);
        $urutan++;
        $keteranganID = "login";
        $kodeAutoLogin = $keteranganID . sprintf("%04s", $urutan);
        
        // create data kasir tabel login
        $createKasirLogin = mysqli_query($conn, "INSERT INTO login (id_login, kode, username, password, level) VALUES ('$kodeAutoLogin', '$id_kasir', '$username', '$password', 'kasir');");

       if($createKasir && $createKasirLogin) {
        
         return mysqli_affected_rows($conn);
       }else {

        return false;
       }

    }


    // hapus kasir
    function hapusKasir ($id) { 
        global $conn;

        $hapusKasirById = mysqli_query($conn, "DELETE FROM kasir WHERE id_kasir='$id'");
        $hapusKasirLoginById = mysqli_query($conn, "DELETE FROM login WHERE kode='$id'");

        if($hapusKasirById && $hapusKasirLoginById) {
            
            return mysqli_affected_rows($conn);
        }else {
            return false;
        }
    }


    // ubah kasir
    function ubahKasir ($data) {
        global $conn;

        $id_kasir = htmlspecialchars($data['id_kasir']);
        $usernameBaru = htmlspecialchars($data['username']);
        $usernameLama = htmlspecialchars($data['usernameLama']);
        $passwordBaru = password_hash($data['password'], PASSWORD_DEFAULT);
        $passwordLama = htmlspecialchars($data['passwordLama']);
        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $jekel = htmlspecialchars($data['jekel']);
        $nomor_hp = htmlspecialchars($data['nomor_hp']);
        $fotoLama = htmlspecialchars($data['fotoLama']);


        // cek username di tabel kasir
        $cekUsername = mysqli_query($conn, "SELECT * FROM kasir WHERE username='$usernameBaru'");
        if(mysqli_num_rows($cekUsername) > 0 ) {

            echo " <script>
                alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        // cek username di tabel login
        $cekUsernameLogin = mysqli_query($conn, "SELECT * FROM login WHERE username='$usernameBaru'");
        if(mysqli_num_rows($cekUsernameLogin) > 0 ) {

            echo "<script>
             alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        if(!$usernameBaru) {

            $username = $usernameLama;
        }else {

            $username = $usernameBaru;
        }
        
       if(!$passwordBaru) {

        $password = $passwordLama;
       }else {

        $password = $passwordBaru;
       }


       if($_FILES['foto']['error'] === 4){

        $foto = $fotoLama;
       }else {

        $foto = uploadGambarKasir();
       }

        //   ubah tabel kasir berdasarkan Id
       $ubahKasirById = mysqli_query($conn, "UPDATE kasir SET username='$username', password='$password', nama_lengkap='$nama_lengkap', jekel='$jekel', nomor_hp='$nomor_hp', foto='$foto' WHERE id_kasir = '$id_kasir'");


        //  ubah tabel login berdasarkan kode
        $ubahKasirLoginById = mysqli_query($conn, "UPDATE login SET username='$username', password='$password' WHERE kode='$id_kasir'");


        if($ubahKasirById && $ubahKasirLoginById) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }


    }




    // pj stand -------------------------------------------------------------------------------------------
    // function create pj stand
    function tambahPj($data) {
        global $conn;

        $id_pj = htmlspecialchars($data['id_pj']);
        $username = htmlspecialchars($data['username']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $jekel = htmlspecialchars($data['jekel']);
        $nomor_hp = htmlspecialchars($data['nomor_hp']);
        $foto = uploadGambarPj();

        // cek username di tabel pj_stand
        $cekUsername = mysqli_query($conn, "SELECT * FROM pj_stand WHERE username='$username'");
        if(mysqli_num_rows($cekUsername) > 0 ) {

            echo " <script>
                alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        // cek username di tabel login
        $cekUsernameLogin = mysqli_query($conn, "SELECT * FROM login WHERE username='$username'");
        if(mysqli_num_rows($cekUsernameLogin) > 0 ) {

            echo "<script>
             alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        
        if(!$foto) {
            return false;
        }


        // create data pj_stand tabel pj_stand
        $createPj = mysqli_query($conn, "INSERT INTO pj_stand (id_pj, username, password, nama_lengkap, jekel, nomor_hp, foto) VALUES ('$id_pj', '$username', '$password', '$nama_lengkap', '$jekel', '$nomor_hp', '$foto')");


        // Id Auto Tabel Login
        $loginById = mysqli_query($conn, "SELECT MAX(id_login) AS ID FROM login");
        $loginById = mysqli_fetch_array($loginById);
        $kode = $loginById["ID"];
        $urutan = (int)substr($kode,5, 4);
        $urutan++;
        $keteranganID = "login";
        $kodeAutoLogin = $keteranganID . sprintf("%04s", $urutan);
        
        // create data kasir tabel login
        $createPjLogin = mysqli_query($conn, "INSERT INTO login (id_login, kode, username, password, level) VALUES ('$kodeAutoLogin', '$id_pj', '$username', '$password', 'pj-stand');");

       if($createPj && $createPjLogin) {
        
         return mysqli_affected_rows($conn);
       }else {

        return false;
       }

    }


    // hapus pj_stand
    function hapusPj ($id) { 
        global $conn;

        $hapusPjById = mysqli_query($conn, "DELETE FROM pj_stand WHERE id_pj='$id'");
        $hapusPjLoginById = mysqli_query($conn, "DELETE FROM login WHERE kode='$id'");

        if($hapusPjById && $hapusPjLoginById) {
            
            return mysqli_affected_rows($conn);
        }else {
            return false;
        }
    }


    // ubah Pj stand
    function ubahPj ($data) {
        global $conn;

        $id_pj = htmlspecialchars($data['id_pj']);
        $usernameBaru = htmlspecialchars($data['username']);
        $usernameLama = htmlspecialchars($data['usernameLama']);
        $passwordBaru = password_hash($data['password'], PASSWORD_DEFAULT);
        $passwordLama = htmlspecialchars($data['passwordLama']);
        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $jekel = htmlspecialchars($data['jekel']);
        $nomor_hp = htmlspecialchars($data['nomor_hp']);
        $fotoLama = htmlspecialchars($data['fotoLama']);


        // cek username di tabel pj stand
        $cekUsername = mysqli_query($conn, "SELECT * FROM pj_stand WHERE username='$usernameBaru'");
        if(mysqli_num_rows($cekUsername) > 0 ) {

            echo " <script>
                alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        // cek username di tabel login
        $cekUsernameLogin = mysqli_query($conn, "SELECT * FROM login WHERE username='$usernameBaru'");
        if(mysqli_num_rows($cekUsernameLogin) > 0 ) {

            echo "<script>
             alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        if(!$usernameBaru) {

            $username = $usernameLama;
        }else {

            $username = $usernameBaru;
        }
        
       if(!$passwordBaru) {

        $password = $passwordLama;
       }else {

        $password = $passwordBaru;
       }


       if($_FILES['foto']['error'] === 4){

        $foto = $fotoLama;
       }else {

        $foto = uploadGambarPj();
       }

        //   ubah tabel pj_stand berdasarkan Id
       $ubahPjById = mysqli_query($conn, "UPDATE pj_stand SET username='$username', password='$password', nama_lengkap='$nama_lengkap', jekel='$jekel', nomor_hp='$nomor_hp', foto='$foto' WHERE id_pj = '$id_pj'");


        //  ubah tabel login berdasarkan kode
        $ubahPjLoginById = mysqli_query($conn, "UPDATE login SET username='$username', password='$password' WHERE kode='$id_pj'");


        if($ubahPjById && $ubahPjLoginById) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }


    }




    // stand ---------------------------------------------------------------------------------------

    function tambahStand ($data) { 
        global $conn;

        $id_stand = htmlspecialchars($data['id_stand']);
        $id_pj = htmlspecialchars($data['id_pj']);
        $nama_stand = htmlspecialchars($data['nama_stand']);
        $keterangan = htmlspecialchars($data['keterangan']);


        $createStand = mysqli_query($conn, "INSERT INTO stand (id_stand, id_pj, nama_stand, keterangan) VALUES ('$id_stand', '$id_pj', '$nama_stand', '$keterangan')");

        if($createStand) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }

    }


    function ubahStand ($data) {
        global $conn;

        $id_stand = htmlspecialchars($data['id_stand']);
        $id_pj = htmlspecialchars($data['id_pj']);
        $nama_stand = htmlspecialchars($data['nama_stand']);
        $keterangan = htmlspecialchars($data['keterangan']);

        $ubahStandById = mysqli_query($conn, "UPDATE stand SET id_pj='$id_pj', nama_stand='$nama_stand', keterangan='$keterangan' WHERE id_stand='$id_stand'");

        if($ubahStandById) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }
    }


    function hapusStand ($id) { 
        global $conn;

        $deleteStandById = mysqli_query($conn, "DELETE FROM stand WHERE id_stand='$id'");

        if($deleteStandById) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }
    }


    // pelanggan bagian admin ---------------------------------------------------------------------------------
    function hapusPelanggan ($id) {
        global $conn;

        $hapusPelangganById = mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan='$id'");

        $hapusPelangganLoginById = mysqli_query($conn, "DELETE FROM login WHERE kode='$id'");

        if($hapusPelangganById && $hapusPelangganLoginById) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }
     }



      // pemesanan bagian admin ---------------------------------------------------------------------------------
    function hapusPemesanan ($id) {
        global $conn;

        $hapusPemesananById = mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pemesanan='$id'");

        if($hapusPemesananById) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }
     }




    //  menu bagian pj stand -------------------------------------------------------------------------------
    function tambahMenu ($data) { 
        global $conn;

        $id_menu = htmlspecialchars($data['id_menu']);
        $id_stand = htmlspecialchars($data['id_stand']);
        $nama_menu = htmlspecialchars($data['nama_menu']);
        $deskripsi = htmlspecialchars($data['deskripsi']);
        $tipe = htmlspecialchars($data['tipe']);
        $harga = htmlspecialchars($data['harga']);
        $foto = uploadGambarMenu();


        if(!$foto) {

            return false;
        }

        $createMenu = mysqli_query($conn, "INSERT INTO menu (id_menu, id_stand, nama_menu, deskripsi, tipe, harga,foto) VALUES ('$id_menu', '$id_stand', '$nama_menu', '$deskripsi', '$tipe', '$harga', '$foto')");


        if($createMenu) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }
    }



    function ubahMenu ($data) {
        global $conn;

        $id_menu = htmlspecialchars($data['id_menu']);        
        $nama_menu = htmlspecialchars($data['nama_menu']);
        $deskripsi = htmlspecialchars($data['deskripsi']);
        $tipe = htmlspecialchars($data['tipe']);
        $harga = htmlspecialchars($data['harga']);
        $fotoLama = htmlspecialchars($data['fotoLama']);

        if($_FILES['foto']['error'] === 4) {
            $foto = $fotoLama;
        }else {
            $foto = uploadGambarMenu();
        }


        $ubahMenuById = mysqli_query($conn, "UPDATE menu SET  nama_menu='$nama_menu', deskripsi='$deskripsi', tipe='$tipe', harga='$harga', foto='$foto' WHERE id_menu='$id_menu'");


        if($ubahMenuById) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }

     }



     function hapusMenu ($id) { 
        global $conn;

        $hapusMenuById = mysqli_query($conn, "DELETE FROM menu WHERE id_menu='$id'");

        if($hapusMenuById) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }
     }


     function ubahStatusPemesanan ($id, $status) {
        global $conn;

        $ubahStatusPemesananById = mysqli_query($conn, "UPDATE pemesanan SET status_pesan='$status' WHERE id_pemesanan='$id'");
    
        if($status == 'sudah dibayar') {
            mysqli_query($conn, "UPDATE pesan_meja SET status_pesan_meja='tidak dipesan' WHERE id_pemesanan='$id'");
        }

        if($ubahStatusPemesananById) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }
      }




    //  pelanggan
    // pendaftaran pelanggan ----------------------------------------------------------------------
    
     function daftarPelanggan ($data) {

        global $conn;

        $id_pelanggan = htmlspecialchars($data['id_pelanggan']);
        $username = htmlspecialchars($data['username']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $jekel = htmlspecialchars($data['jekel']);
        $nomor_hp = htmlspecialchars($data['nomor_hp']);        

        // cek username di tabel admin
        $cekUsername = mysqli_query($conn, "SELECT * FROM pelanggan WHERE username='$username'");
        if(mysqli_num_rows($cekUsername) > 0 ) {

            echo " <script>
                alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }

        // cek username di tabel login
        $cekUsernameLogin = mysqli_query($conn, "SELECT * FROM login WHERE username='$username'");
        if(mysqli_num_rows($cekUsernameLogin) > 0 ) {

            echo "<script>
             alert('Username yang anda masukkan sudah terdaftar silahkan masukkan username yang lain');
            </script>";

            return false;
        }


        // create data pelanggan tabel pelanggan
        $createPelanggan = mysqli_query($conn, "INSERT INTO pelanggan (id_pelanggan, username, password, nama_lengkap, jekel, nomor_hp) VALUES ('$id_pelanggan', '$username', '$password', '$nama_lengkap', '$jekel', '$nomor_hp')");


        // Id Auto Tabel Login
        $loginById = mysqli_query($conn, "SELECT MAX(id_login) AS ID FROM login");
        $loginById = mysqli_fetch_array($loginById);
        $kode = $loginById["ID"];
        $urutan = (int)substr($kode,5, 6);
        $urutan++;
        $keteranganID = "login";
        $kodeAutoLogin = $keteranganID . sprintf("%04s", $urutan);
        
        // create data admin tabel login
        $createPelangganLogin = mysqli_query($conn, "INSERT INTO login (id_login, kode, username, password, level) VALUES ('$kodeAutoLogin', '$id_pelanggan', '$username', '$password', 'pelanggan');");

       if($createPelanggan && $createPelangganLogin) {
        
         return mysqli_affected_rows($conn);
       }else {

        return false;
       }

      }



    //   meja bagian admin-----------------------------------------------------------------------------------------------

    function tambahMeja ($data) {
        global $conn;

        require_once "phpqrcode/qrlib.php";

        $path = "qrcodes/";
        $qrcode = $path . time() . ".png";
        $qrimage = time() . ".png";              

        $id_meja = htmlspecialchars($data['id_meja']);
        $kode_meja = htmlspecialchars($data['kode_meja']);

        QRcode::png($kode_meja, $qrcode, 'H', 4, 4);  

        $tambahMeja = mysqli_query($conn, "INSERT INTO meja (id_meja, kode_meja, qr_code) VALUES ('$id_meja', '$kode_meja', '$qrimage')");

        if($tambahMeja) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }
     }


     function ubahMeja ($data) {
        global $conn;

        require_once "phpqrcode/qrlib.php";

        $path = "qrcodes/";
        $qrcode = $path . time() . ".png";
        $qrimage = time() . ".png";              

        $id_meja = htmlspecialchars($data['id_meja']);
        $kode_meja = htmlspecialchars($data['kode_meja']);

        QRcode::png($kode_meja, $qrcode, 'H', 4, 4);  

        $ubahMeja = mysqli_query($conn, "UPDATE meja SET kode_meja='$kode_meja', qr_code='$qrimage' WHERE id_meja='$id_meja'");

        if($ubahMeja) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }

      }


      function hapusMeja ($id) {
        global $conn;

        $hapusMeja = mysqli_query($conn, "DELETE FROM meja WHERE id_meja='$id'");

        if($hapusMeja) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }

       }




    // pemesanan ------------------------------------------------------------------------
    function tambahPemesanan ($data) {
        global $conn;

        $id_pemesanan = htmlspecialchars($data['id_pemesanan']);
        $id_pelanggan = htmlspecialchars($data['id_pelanggan']);
        $id_stand = htmlspecialchars($data['id_stand']);
        $id_menu = htmlspecialchars($data['id_menu']);
        $id_meja = htmlspecialchars($data['id_meja']);
        $jumlah_pesan = htmlspecialchars($data['jumlah_pesan']);
        $tanggal_pesan = htmlspecialchars($data['tanggal_pesan']);
        $waktu_pemesanan = htmlspecialchars($data['waktu_pemesanan']);
        $harga = htmlspecialchars($data['harga']);
        
        $total = $harga * $jumlah_pesan;
        $status = "pesan";
        

        $tambahPemesanan = mysqli_query($conn, "INSERT INTO pemesanan (id_pemesanan, id_pelanggan, id_stand, id_menu, id_meja, jumlah_pesan, tanggal_pesan,waktu_pemesanan ,total, status_pesan) VALUES ('$id_pemesanan', '$id_pelanggan', '$id_stand', '$id_menu', '$id_meja', '$jumlah_pesan', '$tanggal_pesan','$waktu_pemesanan', '$total', '$status')");

        $tanggalPesan = date('Y-m-d');

        $menuById = mysqli_query($conn, "SELECT MAX(id_pesan_meja) AS ID FROM pesan_meja");
            $menuById = mysqli_fetch_array($menuById);
            $kode = $menuById["ID"];
            $urutan = (int)substr($kode,3, 6);
            $urutan++;
            $keteranganID = "psm";
            $kodeAuto = $keteranganID . sprintf("%06s", $urutan); 
            
        $statusPesanMeja = "dipesan";

        $pesanMeja = mysqli_query($conn, "INSERT INTO pesan_meja (id_pesan_meja,id_meja,id_pemesanan, tanggal_pesan_meja, status_pesan_meja) VALUES ('$kodeAuto','$id_meja','$id_pemesanan', '$tanggalPesan', '$statusPesanMeja')");

        if($tambahPemesanan) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }
        
     }


     function batalPemesanan ($id) {
        global $conn;

        $batalPemesananById = mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pemesanan='$id'");

        if($batalPemesananById) {

            return mysqli_affected_rows($conn);
        }else {

            return false;
        }

      }

?>