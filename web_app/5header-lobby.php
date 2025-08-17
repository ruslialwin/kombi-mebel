<?php 
    error_reporting(0);
    session_start();
    include 'db.php';

    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_product  WHERE product_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);

    $jual = mysqli_query($conn, "SELECT * FROM tb_akun WHERE penjual_id = '".$_GET['pen']."' ");
    $j = mysqli_fetch_object($jual);

    $komen = mysqli_query($conn, "SELECT * FROM tb_komen WHERE product_id = '".$_GET['id']."' ");
    $men = mysqli_fetch_object(($komen));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="css/rapi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login/css/screen.css">
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <!-- logo -->
            <a href="index.php"><img src="logo/logo.png"></a>
            
            <h1><a href="index.php">Kombi Mebel</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
                <?php if(empty($_SESSION['penjual_nama'])){ ?> 
                    <li><a href="login/register.html">Daftar</a></li>
                    <li><a href="login/login.php">Masuk</a></li>
                <?php } else { ?>
                    <li>&ensp; <?php echo $_SESSION['username'];?></li>
                    <li><a href="2-profile.php">Profile</a></li>
                    <li><a href="admin-keluar.php">Keluar</a></li>
                <?php } ?>
                <li><a href="tentang-kami1.php">Tentang Kami</a></li>
                
            </ul>
        </div>
    </header>
