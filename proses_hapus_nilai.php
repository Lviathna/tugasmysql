<?php
include 'model/connect.php';

// Ambil id_nilai dari URL
$id_nilai = $_GET['id_nilai'];

// Jalankan query hapus
$queryDelete = "DELETE FROM tbl_nilai WHERE id_nilai='$id_nilai'";
mysqli_query($connection, $queryDelete);

// Kembali ke halaman data nilai
header('Location: data_nilai.php');
exit;
