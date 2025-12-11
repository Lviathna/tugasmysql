<?php
include 'model/connect.php';
$vnim = $_GET['nim'];
$queryHapus = "DELETE FROM tbl_mahasiswa WHERE nim='$vnim'";
mysqli_query($connection, $queryHapus);
header('location: data_mahasiswa.php');
