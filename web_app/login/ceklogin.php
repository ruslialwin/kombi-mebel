<?php
//panggil koneksi database
require "../db.php";
//deklarasi variabel
$password = md5($_POST['password']); //fungsi hash menggunakan md5
$username = mysqli_escape_string($conn, $_POST['username']);
$password = mysqli_escape_string($conn, $password);
$level = mysqli_escape_string($conn, $_POST['level']);

//cek username terdaftar atau tidak
$cek_user = mysqli_query($conn, "SELECT * FROM tb_akun WHERE username = '$username' and level='$level'"); //variabel cek user menampung hasil pencarian di tabel
//data ditampung ke variabel uservalid jika username dan level di variabel cek user ada di tabel
$user_valid = mysqli_fetch_array($cek_user);

//uji jika username terdaftar
if($user_valid){
    //jika terdaftar
    //cek password sesuai atau tidak
    if($password == $user_valid['password']){
        //jika sesuai
        //buat session
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['penjual_nama'] = $user_valid['penjual_nama'];
        $_SESSION['level'] = $user_valid['level'];
        $_SESSION['password'] = $user_valid['password'];
        $_SESSION['penjual_telp'] = $user_valid['penjual_telp'];
        $_SESSION['penjual_email'] = $user_valid['penjual_email'];
        $_SESSION['penjual_id'] = $user_valid['penjual_id'];
        $_SESSION['penjual_alamat'] = $user_valid['penjual_alamat'];
        
        //uji level user
        if($level=="Pembeli"){
            header('location:../index.php');
        }
        elseif($level=="Penjual"){
            header('location:../penj-dashboard.php');
        }
    }else{
        echo "<script>alert('Maaf Login Gagal, Password Anda tidak tepat!');document.location='login.php'</script>";
    }
}else{
    echo "<script>alert('Maaf Login Gagal, Username Anda tidak terdaftar!');
    document.location='login.php'</script>";
}
?>