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

$vnilai      = $_POST['nilai'];
$vnilaiHuruf = $_POST['nilaiHuruf'];
$vkodematkul = $_POST['kodematkul'];
$vnim        = $_POST['nim'];
$vnidn       = $_POST['nidn'];

$querytambah = "INSERT INTO tbl_nilai (nim, kodematkul, nilai, nilaiHuruf, nidn) 
                VALUES ('$vnim', '$vkodematkul', '$vnilai', '$vnilaiHuruf', '$vnidn')";

mysqli_query($connection, $querytambah);

header('Location: data_nilai.php');
exit;
