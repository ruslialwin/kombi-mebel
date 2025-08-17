<?php 
    error_reporting(0);
    session_start();
    include 'db.php';
    if($_SESSION['level'] != "Penjual"){
        echo '<script>alert("Anda harus login sebagai penjual untuk mengakses halaman ini!")</script>';
        session_destroy();
        echo '<script>window.location="login/login.php"</script>';
    }
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
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="penj-dashboard.php">Kombi Mebel</a></h1>
            <ul>
                <li><a href="penj-dashboard.php">Dashboard</a></li>
                <li><a href="penj-produk.php">Data Produk</a></li>
                <?php if(empty($_SESSION['penjual_nama'])){ ?> 
                    <li><a href="login/register.html">Daftar</a></li>
                    <li><a href="login/login.php">Masuk</a></li>
                <?php } else { ?>
                    <li>&ensp; <?php echo $_SESSION['username'];?></li>
                    <li><a href="3-profile.php">Profile</a></li>
                    <li><a href="admin-keluar.php">Keluar</a></li>
                    <li><a href="tentang-kami2.php">Tentang Kami</a></li>

                <?php } ?>
                
                
            </ul>
        </div>
    </header>
