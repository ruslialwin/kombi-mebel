<?php
    session_start();
    include '../db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <h1>Masuk</h1>
        <div class="container">
            <div class="sign-up-content">
                <form method="POST" class="signup-form" action="">
                    <h2 class="form-title">Ubah Password</h2>
                    <div class="box">
                <form action="" method="POST">
                <div class="form-textbox">
                        <label for="password">Password Baru</label>
                        <input type="password" name="pass1" id="password" class="input-control"required/>
                    </div>
                <div class="form-textbox">
                        <label for="password">Konfir Password</label>
                        <input type="password" name="pass2" id="password1" class="input-control"required/>
                </div>
                <br>
                    <div class="form-textbox">
                        <input type="submit" name="ubah_password" id="submit" class="submit" value="Ubah Password" />
                    </div>
                </form>
                <?php
                    if(isset($_POST['ubah_password'])){
                        
                        $id     = $_SESSION['penjual_id'];
                        $pass1  = $_POST['pass1'];
                        $pass2  = $_POST['pass2'];
                        
                        if($pass2 != $pass1){
                            echo'<script>alert("Konfirmasi Password Tidak Sesuai")</script>';
                        }else{
                            $u_pass = mysqli_query($conn, "UPDATE tb_akun SET
                                        password ='".MD5($pass1)."' 
                                        WHERE penjual_id = '$id'");
                            if($u_pass){
                                echo "<script>alert('Password, berhasil diubah!');document.location='login.php'</script>";
                            }else{
                                echo 'gagal'.mysqli_error($conn);
                            }
                        }

                    }
                ?>
            </div>
                
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="../login/vendor/jquery/jquery.min.js"></script>
    <script src="../login/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>