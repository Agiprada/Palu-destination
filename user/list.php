<?php include 'header.php' ?>
<?php include '../db_connect.php' ?>
<main class="container-sm mt-5">
    <br>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">List Destination</h3>
        </div>
        <hr style="height: 10px;">
    </div>
    <div class="row">
        <?php $data = $conn->query("SELECT * FROM alternative");
        while ($row = $data->fetch_assoc()) { ?>
            <div class="col-md-4 col-lg-3 col-sm-4 mt-3">
                <div class="card border-primary" style="width: 18rem;">
                    <img src="../image/<?= $row['foto'] ?>" class="card-img-top" width="100px" height="200px" alt="...">
                    <div class="card-body"> 
                        <h5><?= $row['nama_tempat'] ?></h5>
                        <div class="row">
                            <h6>Alamat : <?= $row['alamat'] ?></h6>
                            <a href="detail.php?id=<?= $row['id']?>" class="btn btn-primary" style="float: right;">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</main>
<?php include 'footer.php' ?>