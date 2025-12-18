<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
}

// hanya admin yang boleh tambah data mahasiswa
if ($_SESSION['role'] != 'admin') {
    header("Location: index.php?page=dashboard");
    exit();
}
?>


<?php
include 'model/connect.php';

$vkodematkul = $_POST['kodematkul'];
$vnamamatkul = $_POST['namamatkul'];
$vsks = $_POST['sks'];
$vdosen = $_POST['dosen_pengampu'];
$querytambah = "INSERT INTO tbl_matkul (kodematkul, namamatkul, sks, nidn) VALUES ('$vkodematkul', '$vnamamatkul' , '$vsks', '$vdosen' )";
mysqli_query($connection, $querytambah);
header('location: data_matakuliah.php');
