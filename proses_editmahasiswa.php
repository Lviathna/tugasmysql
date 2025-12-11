<?php
include 'model/connect.php';

$vnim = $_POST['nim'];
$vnama = $_POST['nama'];
$vprodi = $_POST['prodi'];
$vangkatan = $_POST['angkatan'];
$vemail = $_POST['email'];
$queryUpdate = "UPDATE tbl_mahasiswa SET nama='$vnama', prodi='$vprodi', angkatan='$vangkatan', email='$vemail' WHERE nim='$vnim'";
mysqli_query($connection, $queryUpdate);
header('location: data_mahasiswa.php');
