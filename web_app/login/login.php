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
                <form id="masuk" method="POST" class="signup-form" action="ceklogin.php">
                    <h2 class="form-title">Silahkan Masukkan Data Anda</h2>
                    <div class="form-radio">
                        <input type="radio" name="level" value="Pembeli" id="Pembeli" checked="checked" />
                        <label for="Pembeli">Pembeli</label>

                        <input type="radio" name="level" value="Penjual" id="Penjual" />
                        <label for="Penjual">Penjual</label>

                    </div>
                    
                    <div>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required/>
                    </div>

                    <div>
                        <input type="password" name="password" id="password"class="form-control" placeholder="Password" required/>
                    </div>
                    <br>
                    <div class="form-textbox">
                        <input type="submit" id="submit" class="submit" value="Masuk" />
                    </div>
                </form>

                <p class="loginhere">
                    Belum memiliki akun ?<a href="register.html" class="loginhere-link"> Daftar</a>
                    <br>
                    Apakah anda admin ?<a href="admin-login.php" class="loginhere-link">Masuk Admin</a>
                    <br>
                    <a href="reset-pass.html " class="loginhere-link"> Lupa Password</a>
                </p>
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
            $("#masuk").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 2
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                },messages:{
                    username: {
                        required: "Masukkan username",
                        minlength: "Username harus lebih dari 2 huruf"
                    },
                    password: {
                        required: "Masukkan Password",
                        minlength: "minimal 8 object"
                    }}
                });
        });
        </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>