<?php
//panggil koneksi database
require "../db.php";
//deklarasi variabel
$username = mysqli_escape_string($conn, $_POST['username']);
$level = mysqli_escape_string($conn, $_POST['level']);
$email = mysqli_escape_string($conn, $_POST['penjual_email']);
$ttl = mysqli_escape_string($conn, $_POST['penjual_ttl']);
//cek username terdaftar atau tidak
$cek_user = mysqli_query($conn, "SELECT * FROM tb_akun WHERE username = '$username' and level='$level'"); //variabel cek user menampung hasil pencarian di tabel
//data ditampung ke variabel uservalid jika username dan level di variabel cek user ada di tabel
$user_valid = mysqli_fetch_array($cek_user);

//uji jika username terdaftar
if($user_valid){
    //jika terdaftar
    //cek email sesuai atau tidak
    if($email == $user_valid['penjual_email']){
        //jika sesuai
        //buat session
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['level'] = $user_valid['level'];
        $_SESSION['password'] = $user_valid['password'];
        $_SESSION['penjual_email'] = $user_valid['penjual_email'];
        $_SESSION['penjual_id'] = $user_valid['penjual_id'];
        $_SESSION['penjual_ttl'] = $user_valid['penjual_ttl'];
        
        //uji tanggal lahir
        if($ttl == $user_valid['penjual_ttl']){
            header('location:updatepassword.php');
        }
        elseif($ttl !== $user_valid['penjual_ttl']){
            echo "<script>alert('Maaf Ganti Password Gagal, Tanggal lahir Anda tidak tepat!');
            document.location='reset-pass.html'</script>";
        }
    }else{
        echo "<script>alert('Maaf Ganti Password Gagal, Email Anda tidak tepat!');
        document.location='reset-pass.html'</script>";
    }
}else{
    echo "<script>alert('Maaf Ganti Password Gagal, Username atau Level Anda tidak tepat!');
    document.location='reset-pass.html'</script>";
}
?>