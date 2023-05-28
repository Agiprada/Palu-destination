<?php
include 'db_connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM alternative WHERE id = '$id'";
$hasil = $conn->query($sql);
echo "<script>
window.location.href='alternative.php';
alert('berhasil di hapus!');
</script>";
