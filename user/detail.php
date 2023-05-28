<?php include 'header.php' ?>
<?php include '../db_connect.php' ?>
<main class="container mt-5">
    <?php
    $id = $_GET['id'];

    $query = $conn->query("SELECT * FROM alternative WHERE id='$id'");
    $row = $query->fetch_assoc();

    // $nama = $row['nama_temopa'];
    // $judul = $row['judul'];
    // $premiered = $row['premiered'];
    // $genre = $row['genre'];
    // $rating = $row['rating'];
    // $cover = $row['cover'];
    ?>
    <br><br>
    <div class="col-lg-12">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../image/<?= $row['foto'] ?>" class="img-fluid rounded-start" alt="..." height="500px">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title"><?= $row['nama_tempat'] ?></h1>
                        <!-- <p class="card-text">Status :<? //= $row['status'] 
                                                            ?></p>
                        <p class="card-text">Premired :<? //=$row['premiered'] 
                                                        ?></p>
                        <p class="card-text">Status <? //= $row['status'] 
                                                    ?></p>
                        <p class="card-text">Status <? //= $row['status'] 
                                                    ?></p> -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Alamat</th>
                                    <th>:</th>
                                    <th><?= $row['alamat'] ?></th>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <th>:</th>
                                    <th><?= $row['kategori'] ?></th>
                                </tr>
                            </thead>
                        </table>
                        <h3 class="card-title">Deskripsi</h3>
                        <hr style="height: 5px;">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ab vero, debitis saepe ipsa voluptatem provident aspernatur, id unde natus fuga corporis sunt, repudiandae alias minima expedita! Obcaecati, fugiat provident.</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quas repellendus odio nesciunt. Atque perspiciatis deleniti quidem reprehenderit distinctio deserunt debitis! Non consequuntur voluptates tempora nemo, sit assumenda fugiat aspernatur!</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'footer.php' ?>