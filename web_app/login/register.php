<?php 

require_once '../db.php';
session_start();
     
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Akun</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <h1>Daftar</h1>
        <div class="container">
            <div class="sign-up-content">
            <?php
          $username = $_POST['username'];
          $password = md5($_POST['password']);
          $nama = $_POST['penjual_nama'];
          $email = $_POST['penjual_email'];
          $alamat = $_POST['penjual_alamat'];
          $tanggallahir = $_POST['penjual_ttl'];
          $telp = $_POST['penjual_telp'];
          $level = $_POST['level'];

		$query1 = "SELECT * from tb_akun where username='$username'";
		$result1 = mysqli_query($conn, $query1);
	if(mysqli_num_rows($result1)>0){//jika username sudah digunakan, maka tampilkan pesan 
  	echo "<script>alert('Username Sudah Digunakan');history.go(-1) </script>";
	}else{$sql = "INSERT INTO tb_akun (username,password,penjual_nama,penjual_email,penjual_alamat,penjual_ttl,penjual_telp,level) VALUES 
		('$username', '$password', '$nama','$email','$alamat','$tanggallahir','$telp','$level')";

	if($conn->query($sql)===TRUE){
 	echo "<p align='center'><img width='300' src='../img/b1.png' alt='daftar selesai'></p><br/>";
 	echo "<h2>Registrasi Akun Anda Berhasil, Silahkan tunggu untuk di direct ke halaman login</h2>";
 	header('refresh:2; login.php');	
	} else {
	  echo "Terjadi kesalahan: " .$sql."<br>".$conn->error;}
    
   	}
  
     $conn->close();

     ?>

                
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../login/vendor/jquery/jquery.min.js"></script>
    <script src="../login/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>