    <?php 
    error_reporting(0);
    session_start();
    include 'db.php';

    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
    ?>

    <!-- footer -->
    <div class="footer">
        <div class="container">
            <h2>Admin</h2>
            <br>
            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>
            <h4>No. HP</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small>Copyright &copy; 2021 - Kombimebel.</small>
        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>