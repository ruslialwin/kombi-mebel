<?php 
    include '4header-penj.php';
    session_start();
    include 'db.php';
?>

   <!-- content -->
   <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['penjual_nama'] ?> di Laman Penjual</h4>
            </div>
        </div>
        <div class="container">
            <img src="logo/home.png" width="100%" style="margin-bottom: 50px;">
            </div>
    </div>

    <?php 
    include '5footer-lobby.php';
?>