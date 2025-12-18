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
$queryUpdate = "UPDATE tbl_mahasiswa SET nama='$vnama', prodi='$vprodi', angkatan='$vangkatan', email='$vemail' WHERE nim='$vnim'";
mysqli_query($connection, $queryUpdate);
header('location: data_mahasiswa.php');
