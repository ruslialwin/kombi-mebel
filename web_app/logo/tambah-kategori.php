<?php
    include '1header-admin.php';
    include 'db.php';
?>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        $nama = strtolower($_POST['nama']);//ubah inputan ke huruf kecil semua
                        $nama_valid = ucwords($nama); // huruf pertama menjadi huruf besar

                        $cek_kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_name = '$nama_valid'"); //cek kategori
                        $kategori = mysqli_fetch_array($cek_kategori);

                        if($nama_valid == $kategori['category_name']){ // jika kategori yang diinput sudah ada di tabel database
                            echo "<script>alert('Maaf Kategori Barang Sudah Ada!');
                        document.location='data-kategori.php'</script>";
                        }

                        else if($nama_valid != $kategori['category_name']){ //jika kategori yang diinput belum ada di database

                            $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES ( 
                                null,
                                '".$nama_valid."')");

                            if($insert){
                                echo '<script>alert("Tambah data berhasil")</script>';
                                echo '<script>window.location="data-kategori.php"</script>';
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