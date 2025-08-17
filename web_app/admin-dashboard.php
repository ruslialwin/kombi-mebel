<?php
    include '1header-admin.php';
?>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> di Laman Admin</h4>
            </div>
            <div class="box">
                <img src="logo/home.png" alt="home" width="100%" style="margin-bottom: 50px;">
            </div>
        </div>
    </div>

<?php 
    include '5footer-lobby.php';
?>