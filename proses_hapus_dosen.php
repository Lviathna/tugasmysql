<?php
include 'model/connect.php';
$vnidn = $_GET['nidn'];
$queryHapus = "DELETE FROM tbl_dosen WHERE nidn='$vnidn'";
mysqli_query($connection, $queryHapus);
header('location: data_dosen.php');
