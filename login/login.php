<?php 
    
    include "controller/controller.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

   $cekDataLogin = mysqli_query($conn, "SELECT * FROM login WHERE username='$username'");

    // cek username    
   if(mysqli_num_rows($cekDataLogin) === 1) {

    // menjadikan array 
    $cekDataLogin = mysqli_fetch_array($cekDataLogin);

    // cek level
    // login admin
    if($cekDataLogin['level'] == 'admin') {

        $datAdmin = mysqli_query($conn, "SELECT admin.id_admin as id_admin, admin.username as username, admin.password as password, admin.nama_lengkap, admin.jekel as jekel, admin.nomor_hp as nomor_hp, admin.foto as foto  FROM admin INNER JOIN login ON login.kode=admin.id_admin WHERE login.username='$username'");

        // menjadikan array
        $cekDataAdminLogin = mysqli_fetch_array($datAdmin);        

        if(password_verify($password, $cekDataAdminLogin['password'])) {

            session_start();

            // set session
            $_SESSION['login_admin'] = true;
            $_SESSION['id_admin'] = $cekDataAdminLogin['id_admin'];
            $_SESSION['username'] = $cekDataAdminLogin['username'];
            $_SESSION['password'] = $cekDataAdminLogin['password'];
            $_SESSION['nama_lengkap'] = $cekDataAdminLogin['nama_lengkap'];
            $_SESSION['jekel'] = $cekDataAdminLogin['jekel'];
            $_SESSION['nomor_hp'] = $cekDataAdminLogin['nomor_hp'];
            $_SESSION['foto'] = $cekDataAdminLogin['foto'];

            header('Location:index.php?page=admin&aksi=dashboard');
            die;

        }else {

            echo "<script>
            alert('password yang anda masukan salah silahkan coba lagi');
            document.location.href='index.php?page=&aksi=home';
            </script>";
        }
        



    }elseif ($cekDataLogin['level'] == 'kasir') {

        $dataKasir = mysqli_query($conn, "SELECT kasir.id_kasir as id_kasir, kasir.username as username, kasir.password as password, kasir.nama_lengkap, kasir.jekel as jekel, kasir.nomor_hp as nomor_hp, kasir.foto as foto  FROM kasir INNER JOIN login ON login.kode=kasir.id_kasir WHERE login.username='$username'");

        // menjadikan array
        $cekDataKasirLogin = mysqli_fetch_array($dataKasir);        

        if(password_verify($password, $cekDataKasirLogin['password'])) {

            session_start();

            // set session
            $_SESSION['login_kasir'] = true;
            $_SESSION['id_kasir'] = $cekDataKasirLogin['id_kasir'];
            $_SESSION['username'] = $cekDataKasirLogin['username'];
            $_SESSION['password'] = $cekDataKasirLogin['password'];
            $_SESSION['nama_lengkap'] = $cekDataKasirLogin['nama_lengkap'];
            $_SESSION['jekel'] = $cekDataKasirLogin['jekel'];
            $_SESSION['nomor_hp'] = $cekDataKasirLogin['nomor_hp'];
            $_SESSION['foto'] = $cekDataKasirLogin['foto'];

            header('Location:index.php?page=kasir&aksi=dashboard');
            die;

        }else {

            echo "<script>
            alert('password yang anda masukan salah silahkan coba lagi');
            document.location.href='index.php?page=&aksi=home';
            </script>";
        }

        
        // pj stand
    }elseif ($cekDataLogin['level'] == 'pj-stand') {

        $dataPj = mysqli_query($conn, "SELECT pj_stand.id_pj as id_pj, pj_stand.username as username, pj_stand.password as password, pj_stand.nama_lengkap, pj_stand.jekel as jekel, pj_stand.nomor_hp as nomor_hp, pj_stand.foto as foto  FROM pj_stand INNER JOIN login ON login.kode=pj_stand.id_pj WHERE login.username='$username'");

        // menjadikan array
        $cekDataPjLogin = mysqli_fetch_array($dataPj);        

        if(password_verify($password, $cekDataPjLogin['password'])) {

            session_start();

            // set session
            $_SESSION['login_pj'] = true;
            $_SESSION['id_pj'] = $cekDataPjLogin['id_pj'];
            $_SESSION['username'] = $cekDataPjLogin['username'];
            $_SESSION['password'] = $cekDataPjLogin['password'];
            $_SESSION['nama_lengkap'] = $cekDataPjLogin['nama_lengkap'];
            $_SESSION['jekel'] = $cekDataPjLogin['jekel'];
            $_SESSION['nomor_hp'] = $cekDataPjLogin['nomor_hp'];
            $_SESSION['foto'] = $cekDataPjLogin['foto'];

            header('Location:index.php?page=pjStand&aksi=dashboard');
            die;

        }else {

            echo "<script>
            alert('password yang anda masukan salah silahkan coba lagi');
            document.location.href='index.php?page=&aksi=home';
            </script>";
        }


        // pelanggan
    }elseif ($cekDataLogin['level'] == 'pelanggan') {

        $dataPelanggan = mysqli_query($conn, "SELECT pelanggan.id_pelanggan as id_pelanggan, pelanggan.username as username, pelanggan.password as password, pelanggan.nama_lengkap, pelanggan.jekel as jekel, pelanggan.nomor_hp as nomor_hp FROM pelanggan INNER JOIN login ON login.kode=pelanggan.id_pelanggan WHERE login.username='$username'");

        // menjadikan array
        $cekDataPelangganLogin = mysqli_fetch_array($dataPelanggan);        

        if(password_verify($password, $cekDataPelangganLogin['password'])) {

            session_start();

            // set session
            $_SESSION['login_pelanggan'] = true;
            $_SESSION['id_pelanggan'] = $cekDataPelangganLogin['id_pelanggan'];
            $_SESSION['username'] = $cekDataPelangganLogin['username'];
            $_SESSION['password'] = $cekDataPelangganLogin['password'];
            $_SESSION['nama_lengkap'] = $cekDataPelangganLogin['nama_lengkap'];
            $_SESSION['jekel'] = $cekDataPelangganLogin['jekel'];
            $_SESSION['nomor_hp'] = $cekDataPelangganLogin['nomor_hp'];
            $_SESSION['foto'] = $cekDataPelangganLogin['foto'];

            header('Location:index.php?page=&aksi=home');
            die;

        }else {

            echo "<script>
            alert('password yang anda masukan salah silahkan coba lagi');
            document.location.href='index.php?page=&aksi=home';
            </script>";
        }

    }

   }else {
    
    echo "<script>
    alert('Username dan password anda tidak terdaftar silahkan daftar terlebih dahulu');
    document.location.href='index.php?page=&aksi=home';
    </script>";
   }

?>