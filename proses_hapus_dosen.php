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
$vnidn = $_GET['nidn'];
$queryHapus = "DELETE FROM tbl_dosen WHERE nidn='$vnidn'";
mysqli_query($connection, $queryHapus);
header('location: data_dosen.php');
