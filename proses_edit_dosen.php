<?php
include 'model/connect.php';

$vnidn = $_POST['nidn'];
$vnama = $_POST['nama'];
$vprodi = $_POST['prodi'];
$vemail = $_POST['email'];
$queryUpdate = "UPDATE tbl_dosen SET nama='$vnama', prodi='$vprodi', email='$vemail' WHERE nidn='$vnidn'";
mysqli_query($connection, $queryUpdate);
header('location: data_dosen.php');
