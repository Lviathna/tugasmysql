<?php
include 'model/connect.php';
$vkodematkul = $_GET['kodematkul'];
$queryHapus = "DELETE FROM tbl_matkul WHERE kodematkul='$vkodematkul'";
mysqli_query($connection, $queryHapus);
header('location: data_matakuliah.php');
