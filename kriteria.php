<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<?php include 'db_connect.php' ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <h2 class="h4">Bobot Kriteria</h2>
    </div>
</div>

<div class="row">
    <div class="col-8 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <div class="row mb-4">
                    <label for="email">Biaya</label>
                    <input type="text" name="title" class="form-control" id="" required>
                </div>
                <div class="row mb-4">
                    <label for="email">Jarak</label>
                    <input type="text" name="title" class="form-control" id="" required>
                </div>
                <div class="row mb-4">
                    <label for="email">waktu</label>
                    <input type="text" name="title" class="form-control" id="" required>
                </div>
                <div class="row mb-4">
                    <label for="email">fasilitas</label>
                    <input type="text" name="title" class="form-control" id="" required>
                </div>
                <div class="row mb-4">
                    <label for="email">umur</label>
                    <input type="text" name="title" class="form-control" id="" required>
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
                    <th class="border-gray-200">biaya</th>
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
                $data = $conn->query("SELECT * FROM bobot");
                if ($data->num_rows > 0) {
                    while ($row = $data->fetch_row()) {
                ?>
                <tr>
                    <td><span class="fw-normal"><?= $no++?></td>
                    <td><span class="fw-normal"><?= $row[1]?></td>
                    <td><span class="fw-normal"><?= $row[2]?></td>
                    <td><span class="fw-normal"><?= $row[3]?></td>
                    <td><span class="fw-normal"><?= $row[4]?></td>
                    <td><span class="fw-normal"><?= $row[5]?></td>
                    <td rowspan="2"><span class="fw-normal">
                            <a class="btn btn-danger btn-flat rounded" href="" onclick="return confirm('data ingin di hapus?')"><i class="fa fa-trash">/</i></a>
                    </td>
                </tr>
                <?php } 
                } ?>
            </tbody>
        </table>

    </div>
</div>
<?php include 'template/footer.php' ?>