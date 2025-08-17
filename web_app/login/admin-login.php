<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk Admin</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <h1>Login Admin</h1>
        <div class="container">
            <div class="sign-up-content">
                <form id="admin" method="POST" class="signup-form" action="">
                <h2 class="form-title">Login Admin</h2>
                    
                    <div>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required/>
                    </div>

                    <div>
                        <input type="password" name="password" id="password"class="form-control" placeholder="Password" required/>
                    </div>
                    <br>
                
                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="Masuk" />
                    </div>
                    <p class="loginhere">
                    Bukan admin ?<a href="login.php" class="loginhere-link"> Kembali</a>
                </p>
                </form>
                <?php
            if(isset($_POST['submit'])){
                session_start();
                include '../db.php';

                $user = mysqli_real_escape_string($conn, $_POST['username']);//mysqlirealescapestring digunakan agar ketika user mengetikkan username diawali dengan ' tidak menimbulkan error
                $pass = mysqli_real_escape_string($conn, $_POST['password']);

                $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
                if(mysqli_num_rows($cek) > 0){ //jika terdapat username dan password di database
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d; 
                    $_SESSION['id'] = $d->admin_id;
                    echo '<script>window.location="../admin-dashboard.php"</script>';
                }else{
                    echo '<script>alert("Username atau Password Anda Salah!")</script>';
                }
            }
        ?>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="../login/vendor/jquery/jquery.min.js"></script>
    <script src="../login/js/main.js"></script>
    <script src="lib/jquery.js"></script>
    <script src="dist/jquery.validate.js"></script>
    <script>
        $().ready(function() {
            $("#admin").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 5
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                },messages:{
                    username: {
                        required: "Masukkan username admin dengan benar",
                        minlength: "Username admin terdiri dari 5 huruf"
                    },
                    password: {
                        required: "Masukkan password admin dengan benar",
                        minlength: "password admin terdiri dari 6 object"
                    }}
                });
        });
        </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>