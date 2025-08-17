<?php
    include 'db.php';
    include '4header-penj.php';

    $query = mysqli_query($conn, "SELECT * FROM tb_akun WHERE penjual_id = '".$_SESSION['penjual_id']."'");
    $d = mysqli_fetch_object($query); //variabel penampung data dalam bentuk object
?>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $_SESSION['penjual_nama']; ?>" required> <!-- ->nama di database -->
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $_SESSION['username']; ?>" required>
                    <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $_SESSION['penjual_telp']; ?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $_SESSION['penjual_email']; ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $_SESSION['penjual_alamat']; ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                    <a href="proses-hapus.php?ida=<?php echo $_SESSION['penjual_id']?>" onclick="return confirm('Apakah Anda Yakin ingin menghapus akun?')">Hapus</a>
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        $nama   = ucwords($_POST['nama']);
                        $user   = $_POST['user'];
                        $hp     = $_POST['hp'];
                        $email  = $_POST['email'];
                        $alamat = ucwords($_POST['alamat']);
                        $id     = $_SESSION['penjual_id'];

                        $update = mysqli_query($conn, "UPDATE tb_akun SET
                                        penjual_nama ='$nama',
                                        username ='$user',
                                        penjual_telp ='$hp',
                                        penjual_email ='$email',
                                        penjual_alamat ='$alamat'
                                        WHERE penjual_id = '$id'");

                    if($update){
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location:"profil.php"</script>';
                    }else{
                        echo 'gagal'.mysqli_error($conn);
                    }

                    }
                ?>
            </div>

            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required> <!-- ->nama di database -->
                    <input type="password" name="pass2" placeholder="Konfirmasi Password" class="input-control" required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>
                <?php
                    if(isset($_POST['ubah_password'])){

                        $pass1  = $_POST['pass1'];
                        $pass2  = $_POST['pass2'];
                        $id     = $_SESSION['penjual_id'];
                        
                        if($pass2 != $pass1){
                            echo'<script>alert("Konfirmasi Password Tidak Sesuai")</script>';
                        }else{
                            $u_pass = mysqli_query($conn, "UPDATE tb_akun SET
                                        password ='".MD5($pass1)."' 
                                        WHERE penjual_id = '$id'");
                            if($u_pass){
                                echo '<script>alert("Password berhasil diubah")</script>';
                                echo '<script>window.location:"profil.php"</script>';
                            }else{
                                echo 'gagal'.mysqli_error($conn);
                            }
                        }

                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2021 - Bukawarung </small>
        </div>
    </footer>
</body>
</html>