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

$vnim = $_POST['nim'];
$vnama = $_POST['nama'];
$vprodi = $_POST['prodi'];
$vangkatan = $_POST['angkatan'];
$vemail = $_POST['email'];
$querySimpan = "INSERT INTO tbl_mahasiswa (nim, nama, prodi, angkatan, email) VALUES ('$vnim', '$vnama',  '$vprodi','$vangkatan', '$vemail' )";
mysqli_query($connection, $querySimpan);


header('location: data_mahasiswa.php');
