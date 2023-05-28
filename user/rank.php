<?php include 'header.php' ?>
<?php include '../db_connect.php' ?>

<div class="container mt-5">
    <br>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Rank Info</h3>
        </div>
        <hr style="height: 10px;">
    </div>
    <div class="row mt-2">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <div class="card-header">
                Skor <i class="fa-solid fa-star">1</i> - <i class="fa-solid fa-star">5</i> 
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
                                <td><span class="fw-normal"><i class="fa-solid fa-star"><?= $row[1] ?></i></td>
                                <td><span class="fw-normal"><i class="fa-solid fa-star"><?= $row[2] ?></i></td>
                                <td><span class="fw-normal"><i class="fa-solid fa-star"><?= $row[3] ?></i></td>
                                <td><span class="fw-normal"><i class="fa-solid fa-star"><?= $row[4] ?></i></td>
                                <td><span class="fw-normal"><i class="fa-solid fa-star"><?= $row[5] ?></i></td>
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
</div>
<?php include 'footer.php' ?>