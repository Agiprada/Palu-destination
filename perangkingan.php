<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<?php include 'db_connect.php' ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <h2 class="h4">Perangkingan</h2>
    </div>
</div>
<div class="row mt-2">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <div class="card-header">
            Matrix X
        </div>
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
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>

    </div>
</div>
<div class="row mt-2">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <div class="card-header">
            Matrix Ternormalisasi
        </div>
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
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $C1 = '';
                $C2 = '';
                $C3 = '';
                $C4 = '';
                $C5 = '';

                $data = $conn->query("SELECT * FROM penilaian ORDER BY biaya ASC");
                $row = $data->fetch_row();
                $C1 = $row[1];
                $data = $conn->query("SELECT * FROM penilaian ORDER BY jarak DESC");
                $row = $data->fetch_row();
                $C2 = $row[2];
                $data = $conn->query("SELECT * FROM penilaian ORDER BY waktu DESC");
                $row = $data->fetch_row();
                $C3 = $row[3];
                $data = $conn->query("SELECT * FROM penilaian ORDER BY fasilitas DESC");
                $row = $data->fetch_row();
                $C4 = $row[4];
                $data = $conn->query("SELECT * FROM penilaian ORDER BY usia DESC");
                $row = $data->fetch_row();
                $C5 = $row[5];

                $data = $conn->query("SELECT * FROM penilaian");
                if ($data->num_rows > 0) {
                    while ($row = $data->fetch_row()) {
                ?>
                        <tr>
                            <td><span class="fw-normal"><?= $no++ ?></td>
                            <td><span class="fw-normal"><?= $row[0] ?></td>
                            <td><span class="fw-normal"><?= round($C1 / $row[1], 2) ?></td>
                            <td><span class="fw-normal"><?= round($C2 / $row[2], 2) ?></td>
                            <td><span class="fw-normal"><?= round($C3 / $row[3], 2) ?></td>
                            <td><span class="fw-normal"><?= round($C4 / $row[4], 2) ?></td>
                            <td><span class="fw-normal"><?= round($C5 / $row[5], 2) ?></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row mt-2">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <div class="card-header">
            Hitung SAW
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">no</th>
                    <th class="border-gray-200">nama tempat</th>
                    <th class="border-gray-200">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = $conn->query("SELECT * FROM bobot");
                if ($data->num_rows > 0) {
                    $row = $data->fetch_row();
                    $B1 = $row[1];
                    $B2 = $row[2];
                    $B3 = $row[3];
                    $B4 = $row[4];
                    $B5 = $row[5];
                }
                $sql = $conn->query("TRUNCATE table perangkingan");

                $sql = $conn->query("SELECT * FROM penilaian");
                $data = $sql;
                if ($data->num_rows > 0) {
                    while ($row = $data->fetch_row()) {
                        $nilai = round((($C1 / $row[1]) * $B1) +
                            (($row[2] / $C2) * $B2) +
                            (($row[3] / $C3) * $B3) +
                            (($row[4] / $C4) * $B4) +
                            (($row[5] / $C5) * $B5), 3);
                        $nama = $row[0];
                        $sql1 = $conn->query("INSERT INTO perangkingan (nama,nilai)VALUES('" . $nama . "','" . $nilai . "')");
                    }
                }

                $no = 1;
                $data = $conn->query("SELECT * FROM perangkingan");
                if ($data->num_rows > 0) {
                    while ($row = $data->fetch_row()) {
                ?>
                        <tr>
                            <td><span class="fw-normal"><?= $no++ ?></td>
                            <td><span class="fw-normal"><?= $row[1] ?></td>
                            <td><span class="fw-normal"><?= $row[2] ?></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-2">
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <div class="card-header">
            Hasil Rangking
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">no</th>
                    <th class="border-gray-200">nama tempat</th>
                    <th class="border-gray-200">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = $conn->query("SELECT * FROM perangkingan ORDER BY nilai DESC");
                if ($data->num_rows > 0) {
                    while ($row = $data->fetch_row()) {
                ?>
                        <tr>
                            <td><span class="fw-normal"><?= $no++ ?></td>
                            <td><span class="fw-normal"><?= $row[1] ?></td>
                            <td><span class="fw-normal"><?= $row[2] ?></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'template/footer.php' ?>