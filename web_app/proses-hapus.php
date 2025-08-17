<?php
    include 'db.php';
    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."'");
        echo '<script>window.location="data-kategori.php"</script>';
    }
    if(isset($_GET['idp'])){
        $produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idp']."'");
        $p = mysqli_fetch_object($produk); //mendapatkan objek dari tabel

        unlink('./produk/'.$p->product_image);//menghapus gambar yang ada di folder produk

        $delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."'");
        echo '<script>window.location="data-produk.php"</script>';
    }
    if(isset($_GET['idz'])){
        $produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idz']."'");
        $p = mysqli_fetch_object($produk); //mendapatkan objek dari tabel

        unlink('./produk/'.$p->product_image);//menghapus gambar yang ada di folder produk

        $delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idz']."'");
        echo '<script>window.location="penj-produk.php"</script>';
    }
    if(isset($_GET['idl'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_akun WHERE penjual_id = '".$_GET['idl']."' ");
        echo '<script>window.location="admin-pengguna.php"</script>';
    }
    if(isset($_GET['ido'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_akun WHERE penjual_id = '".$_GET['ido']."'");
        echo '<script>window.location="admin-keluar.php"</script>';
    }
    if(isset($_GET['ida'])){
        $produk = mysqli_query($conn, "DELETE FROM tb_product WHERE penjual_id ='".$_GET['ida']."'");
        $delete = mysqli_query($conn, "DELETE FROM tb_akun WHERE penjual_id = '".$_GET['ida']."'");
        echo '<script>window.location="admin-keluar.php"</script>';
    }
?>
