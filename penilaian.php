<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<?php include 'db_connect.php' ?>
<?php
if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $biaya = $_POST['biaya'];
    $jarak = $_POST['jarak'];
    $waktu = $_POST['waktu'];
    $fasilitas = $_POST['fasilitas'];
    $umur = $_POST['umur'];
    if ($nama == "" && $biaya == "" && $jarak == "" && $waktu == "" && $fasilitas == "" && $umur == "") {
        echo "<script>alert('masih ada data yang kosong!');</script>";
    } else {
        $sql = "SELECT * FROM penilaian WHERE nama_tempat='$nama'";
        $hasil = $conn->query($sql);
        if ($hasil->num_rows > 0) {
            $row = $hasil->fetch_row();
            echo "<script>
          alert('id $nama sudah ada!');
      </script>";
        } else {
            //get name
            $sql = "SELECT*FROM alternative WHERE nama_tempat='$nama'";
            $hasil = $conn->query($sql);
            $row = $hasil->fetch_row();
            $nama = $row[1];
            //insert name
            $sql = "INSERT INTO penilaian
      values ('$nama','$biaya','$jarak','$waktu','$fasilitas','$umur')";
            $hasil = $conn->query($sql);
            echo "<script>
      alert('berhasil di inputkan !');
      </script>";
        }
    }
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <h2 class="h4">Input Penilaian</h2>
    </div>
</div>

<div class="row">
    <div class="col-8 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row mb-4">
                        <label class="my-1 me-2">Nama Tempat</label>
                        <select class="form-select" name="nama" aria-label="Default select example" required>
                            <option selected disabled>Choose</option>
                            <?php
                            $query = $conn->query("SELECT * FROM alternative");
                            if ($query->num_rows > 0) {
                                while ($row = $query->fetch_row()) {
                            ?>
                                    <option><?= $row[1] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row mb-4">
                        <label class="my-1 me-2">Biaya</label>
                        <select class="form-select" name="biaya" aria-label="Default select example" required>
                            <option selected disabled>Choose Biaya</option>
                            <option value="1">5.000-25.000</option>
                            <option value="2">26.000 - 50.000</option>
                            <option value="3">51.000 - 100.000</option>
                            <option value="4">101.000 - 250.000</option>
                            <option value="5">251.000 - 500.000</option>
                        </select>
                    </div>
                    <div class="row mb-4">
                        <label class="my-1 me-2">Jarak</label>
                        <select class="form-select" name="jarak" aria-label="Default select example" required>
                            <option selected disabled>Choose Jarak</option>
                            <option value="1">Sangat dekat</option>
                            <option value="2">dekat</option>
                            <option value="3">sedang</option>
                            <option value="4">jauh</option>
                            <option value="5">sangat jauh</option>
                        </select>
                    </div>
                    <div class="row mb-4">
                        <label class="my-1 me-2">Waktu</label>
                        <select class="form-select" name="waktu" aria-label="Default select example" required>
                            <option selected disabled>Choose Waktu</option>
                            <option value="1">pagi-siang</option>
                            <option value="2">siang-sore</option>
                            <option value="3">sore-malam</option>
                            <option value="4">pagi-sore</option>
                            <option value="5">fulltime</option>
                        </select>
                    </div>
                    <div class="row mb-4">
                        <label class="my-1 me-2">fasilitas</label>
                        <select class="form-select" name="fasilitas" aria-label="Default select example" required>
                            <option selected disabled>Choose Fasilitas</option>
                            <option value="2">tidak ada</option>
                            <option value="2">tidak lengkap</option>
                            <option value="3">cukup lengkap</option>
                            <option value="4">lengkap</option>
                            <option value="5">sangat lengkap</option>
                        </select>
                    </div>
                    <div class="row mb-4">
                        <label class="my-1 me-2">umur</label>
                        <select class="form-select" name="umur" aria-label="Default select example" required>
                            <option selected disabled>Choose Umur</option>
                            <option value="1">balita</option>
                            <option value="2">anak-anak</option>
                            <option value="3">rermaja</option>
                            <option value="4">Dewasa</option>
                            <option value="5">Semua Umur</option>
                        </select>
                    </div>
                    <button class="btn btn-success" name="save" type="submit" style="float: right;">Save</button>
                </form>
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
                    <th class="border-gray-200">nama tempat</th>
                    <th class="border-gray-200">Biaya</th>
                    <th class="border-gray-200">jarak</th>
                    <th class="border-gray-200">waktu</th>
                    <th class="border-gray-200">fasilitas</th>
                    <th class="border-gray-200">umur</th>
                    <th class="border-gray-200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = $conn->query("SELECT * FROM penilaian");
                if ($data->num_rows > 0) {
                    while ($row = $data->fetch_row()) {
                ?>
                        <tr>
                            <td><span class="fw-normal"><?= $no++ ?></td>
                            <td><span class="fw-normal"><?= $row[0] ?></td>
                            <td><span class="fw-normal"><?= $row[1] ?></td>
                            <td><span class="fw-normal"><?= $row[2] ?></td>
                            <td><span class="fw-normal"><?= $row[3] ?></td>
                            <td><span class="fw-normal"><?= $row[4] ?></td>
                            <td><span class="fw-normal"><?= $row[5] ?></td>
                            <td><span class="fw-normal">
                                    <a class="btn btn-danger btn-flat rounded" href="hapus_penilaian.php?nama=<?= $row[0]?>" onclick="return confirm('data ingin di hapus?')"><i class="fa fa-trash">/</i></a>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>

    </div>
</div>
<?php include 'template/footer.php' ?>