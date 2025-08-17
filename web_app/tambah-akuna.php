<?php
    include '1header-admin.php';
    include 'db.php';
?>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Tambah Pengguna</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">

                   <input type="text" name="penjual_nama" class="input-control" placeholder="Nama Pengguna" required>
                   <input type="text" name="username" class="input-control" placeholder="Username" required>
                   <input type="password" name="password" class="input-control" placeholder="Password" required>
                   <input type="email" name="penjual_email" class="input-control" placeholder="Email" required>
                   <input type="text" name="penjual_alamat" class="input-control" placeholder="Alamat" required>
                   <input type="number" name="penjual_telp" class="input-control" placeholder="No. Telp" required>
                   <input type="date" name="penjual_ttl" class="input-control">
                   <select name="level" class="input-control">
                       <option value="">--Pilih--</option>
                       <option value="Pembeli">Pembeli</option>
                       <option value="Penjual">Penjual</option>
                   </select>
                    <input type="submit" name="submit" value="Submit" class="btn">           
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        //cek data
                        //print r($_FILES['gambar']);

                        //menampung inputan dari form
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);
                        $nama = $_POST['penjual_nama'];
                        $email = $_POST['penjual_email'];
                        $alamat = $_POST['penjual_alamat'];
                        $tanggallahir = $_POST['penjual_ttl'];
                        $telp = $_POST['penjual_telp'];
                        $level = $_POST['level'];
                        
                        $query1 = "SELECT * from tb_akun where username='$username'";
                        $result1 = mysqli_query($conn, $query1);
                    if(mysqli_num_rows($result1)>0){//jika username sudah digunakan, maka tampilkan pesan 
                      echo "<script>alert('Username Sudah Digunakan');history.go(-1) </script>";
                    }else{$sql = "INSERT INTO tb_akun (username,password,penjual_nama,penjual_email,penjual_alamat,penjual_ttl,penjual_telp,level) VALUES 
                        ('$username', '$password', '$nama','$email','$alamat','$tanggallahir','$telp','$level')";
                
                    if($conn->query($sql)===TRUE){
                     echo "<p align='center'><img width='300' src='img/b1.png' alt='daftar selesai'></p><br/>";
                     echo "<h2>Registrasi Akun Anda Berhasil, Silahkan tunggu untuk di direct ke halaman admin</h2>";
                     header('refresh:2; admin-pengguna.php');	
                    } else {
                      echo "Terjadi kesalahan: " .$sql."<br>".$conn->error;}
                    
                       }
                        }

                        
                    
                ?>
            </div>
        </div>
    </div>

    <?php 
    include '5footer-lobby.php';
?>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>
</html>