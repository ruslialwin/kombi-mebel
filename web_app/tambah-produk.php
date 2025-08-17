<?php
    include '1header-admin.php';
    include 'db.php';
?>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                   <select name="kategori" class="input-control" required>
                       <option value="">--Pilih--</option>
                       <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                        while($r = mysqli_fetch_array($kategori)){
                       ?>
                        <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name']?></option>
                        <?php } ?>
                   </select>
                   <input hidden type="text" name="id" class="input-control" placeholder="Id Penjual" value="1">
                   <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                   <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                   <input type="file" name="gambar" class="input-control" required>
                   <label>Deskripsi</label>
                   <textarea name="deskripsi" placeholder="deskripsi" class="input-control" cols="30" rows="10"></textarea></br>
                   <select name="status" class="input-control">
                       <option value="">--Pilih--</option>
                       <option value="1">Aktif</option>
                       <option value="0">Tidak Aktif</option>
                   </select>
                    <input type="submit" name="submit" value="Submit" class="btn">           
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        //cek data
                        //print r($_FILES['gambar']);

                        //menampung inputan dari form
                        $kategori   = $_POST['kategori'];
                        $penjual    = $_POST['id'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];

                        //menampung data file yang diupload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];//array 0 berisi nama file, array 1 berisi tipe file

                        $newname = 'produk'.time().'.'.$type2;

                        //menampung data format file yang diizinkan
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
                        //validasi format file
                        if(!in_array($type2, $tipe_diizinkan)){//jika format file tidak terdapat dalam tipe yang diizinkan
                            echo '<script>alert("Format File Tidak Diizinkan")</script>';
                        }else{
                            //jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                            //proses upload file sekaligus insert ke database
                            move_uploaded_file($tmp_name, './produk/'.$newname);

                            $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES(
                                        null,
                                        '".$kategori."',
                                        '".$penjual."',
                                        '".$nama."',
                                        '".$harga."',
                                        '".$deskripsi."',
                                        '".$newname."',
                                        '".$status."',
                                        null
                                            )");
                            if($insert){
                                echo '<script>alert("Tambah data berhasil")</script>';
                                echo '<script>window.location="data-produk.php"</script>';
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
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>
</html>