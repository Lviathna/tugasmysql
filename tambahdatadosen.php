<?php
include 'model/connect.php';

$vnidn = $_POST['nidn'];
$vnama = $_POST['nama'];
$vprodi = $_POST['prodi'];
$vemail = $_POST['email'];
$querytambah = "INSERT INTO tbl_dosen (nidn, nama, prodi, email) VALUES ('$vnidn', '$vnama',  '$vprodi', '$vemail' )";
mysqli_query($connection, $querytambah);
header('location: data_dosen.php');
