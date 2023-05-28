<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<?php include 'db_connect.php' ?>
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
                        <input type="text" name="nama" class="form-control" id="" required>
                    </div>
                    <div class="row mb-4">
                        <label for="email">alamat</label>
                        <input type="text" name="alamat" class="form-control" id="" required>
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
                    move_uploaded_file($loc, "image/" . $foto);

                    $query = $conn->query("INSERT INTO alternative(nama_tempat,alamat,kategori,foto) VALUES ('$nama','$alamat','$kategori','$foto')");

                    echo "<script>alert('Success Input Data')</script>";
                    echo "<script>window.location.href = 'alternative.php'</script>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">no</th>
                    <th class="border-gray-200">Nama Tempat</th>
                    <th class="border-gray-200">Alamat</th>
                    <th class="border-gray-200">kategori</th>
                    <th class="border-gray-200">foto</th>
                    <th class="border-gray-200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = $conn->query("SELECT * FROM alternative");
                if ($data->num_rows > 0) {
                    while ($row = $data->fetch_row()) {
                ?>
                        <tr>
                            <td><span class="fw-normal"><?= $no++ ?></td>
                            <td><span class="fw-normal"><?= $row[1] ?></td>
                            <td><span class="fw-normal"><?= $row[2] ?></td>
                            <td><span class="fw-normal"><?= $row[3] ?></td>
                            <td><span class="fw-normal"><img src="image/<?= $row[4]?>" alt="" width="100px"></td>
                            <td>
                                <a class="btn btn-success btn-flat rounded" href="edit_alternative.php?id=<?= $row[0] ?>"><i class="fa fa-pen"></i></a>
                                <a class="btn btn-danger btn-flat rounded" href="hapus_alternative.php?id=<?= $row[0] ?>" onclick="return confirm('data ingin di hapus?')"><i class="fa fa-trash">/</i></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
<?php include 'template/footer.php' ?>