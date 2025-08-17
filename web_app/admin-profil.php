<?php
    include 'db.php';
    include '1header-admin.php';

    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."'");
    $d = mysqli_fetch_object($query); //variabel penampung data dalam bentuk object
?>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required> <!-- ->nama di database -->
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                    <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_telp ?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        $nama   = ucwords($_POST['nama']);
                        $user   = $_POST['user'];
                        $hp     = $_POST['hp'];
                        $email  = $_POST['email'];
                        $alamat = ucwords($_POST['alamat']);

                        $update = mysqli_query($conn, "UPDATE tb_admin SET
                                        admin_name ='$nama',
                                        username ='$user',
                                        admin_telp ='$hp',
                                        admin_email ='$email',
                                        admin_address ='$alamat' 
                                        WHERE admin_id = '$d->admin_id'");

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
                        
                        if($pass2 != $pass1){
                            echo'<script>alert("Konfirmasi Password Tidak Sesuai")</script>';
                        }else{
                            $u_pass = mysqli_query($conn, "UPDATE tb_admin SET
                                        password ='".MD5($pass1)."' 
                                        WHERE admin_id = '$d->admin_id'");
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

    <?php 
    include '5footer-lobby.php';
?>