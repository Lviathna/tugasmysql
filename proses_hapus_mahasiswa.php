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
$vnim = $_GET['nim'];
$queryHapus = "DELETE FROM tbl_mahasiswa WHERE nim='$vnim'";
mysqli_query($connection, $queryHapus);
header('location: data_mahasiswa.php');
