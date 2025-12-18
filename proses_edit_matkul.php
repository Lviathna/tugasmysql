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

// update berdasarkan kode matkul
$queryUpdate = "UPDATE tbl_matkul 
                SET namamatkul='$vnamamatkul', 
                    sks='$vsks', 
                    nidn='$vdosen' 
                WHERE kodematkul='$vkodematkul'";

mysqli_query($connection, $queryUpdate);

// kembali ke halaman data
header('Location: data_matakuliah.php');
exit;
