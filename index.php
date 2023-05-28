<?php session_start();

// if (isset($_SESSION['username'])) {
//     echo "<script>alert('anda telah login')</script>";
//     header('Location:index.php');
//     exit();
// }
?>
<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<div class="py-4">
    <h6>Dashboard</h6>
</div>
<div class="row">
    <div class="card mb-3">
        <div class="card-image image-fluid">
            <img src="https://wallpapercave.com/wp/wp6980761.jpg" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title">Welcome</h5>
            <p class="card-text">selamat datang di tempat destinasi wisata kota palu.</p>
            <a class="btn btn-lg btn-primary" href="alternative.php" role="button">View Data >></a>
        </div>
    </div>
</div>
<div class="row">
</div>

<?php include 'template/footer.php' ?>