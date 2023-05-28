<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<?php include 'db_connect.php' ?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM alternative WHERE id='$id'");
while ($data = mysqli_fetch_array($result)) {
    $nama = $data['nama_tempat'];
    $alamat = $data['alamat'];
    $kategori = $data['kategori'];
    $foto = $data['foto'];
}

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <h2 class="h4">Input Alternative</h2>
    </div>
</div>

<div class="row">
    <div class="col-8 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <label for="email">Nama Tempat</label>
                        <input type="text" name="nama" class="form-control" id="" value="<?= $nama ?>" required>
                    </div>
                    <div class="row mb-4">
                        <label for="email">alamat</label>
                        <input type="text" name="alamat" class="form-control" id="" value="<?= $alamat ?>" required>
                    </div>
                    <div class="row mb-4">
                        <label class="my-1 me-2">Kategori</label>
                        <select class="form-select" name="kategori" aria-label="Default select example" required>
                            <option selected disabled>Choose status</option>
                            <option value="Pantai">Pantai</option>
                            <option value="Gunung">Gunung</option>
                            <option value="budaya">Budaya</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="row mb-4">
                        <label for="email">foto</label>
                        <input type="file" name="foto" class="form-control" id="" required>
                    </div>
                    <a href="alternative.php" class="btn btn-warning">Cencel</a>
                    <button class="btn btn-success" name="save" type="submit" style="float: right;">Save</button>
                </form>
                <?php
                if (isset($_POST['save'])) {
                    $nama = $_POST['nama'];
                    $alamat = $_POST['alamat'];
                    $kategori = $_POST['kategori'];

                    $foto = $_FILES['foto']['name'];
                    $loc = $_FILES['foto']['tmp_name'];

                    if (!empty($loc)) {
                        move_uploaded_file($loc, "image/". $foto);
                        $conn->query("UPDATE alternative SET nama_tempat='$nama', alamat='$alamat', kategori='$kategori',foto='$foto' WHERE id='$id'");
                    } else {
                        $conn->query("UPDATE alternative SET nama_tempat='$nama', alamat='$alamat', kategori='$kategori' WHERE id='$id'");
                    }
                    echo "<script>alert('Success Input Data')</script>"; 
                    echo "<script>window.location.href = 'alternative.php'</script>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>