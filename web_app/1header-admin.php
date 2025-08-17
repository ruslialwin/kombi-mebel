<?php
    session_start();
    if($_SESSION['status_login'] != true){ //???
        echo '<script>window.location="login/admin-login.php"</script>';
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="admin-dashboard.php">Kombi Mebel</a></h1>
            <ul>
                <li><a href="admin-dashboard.php">Dashboard</a></li>
                <li><a href="admin-profil.php">Profile</a></li>
                <li><a href="admin-pengguna.php">Data Pengguna</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="admin-keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>
