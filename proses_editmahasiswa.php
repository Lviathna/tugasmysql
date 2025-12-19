<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
}

// hanya admin yang boleh edit data mahasiswa
if ($_SESSION['role'] != 'admin') {
    header("Location: index.php?page=dashboard");
    exit();
}

include 'model/connect.php';

$vnim      = $_POST['nim'];
$vnama     = $_POST['nama'];
$vprodi    = $_POST['prodi'];
$vangkatan = $_POST['angkatan'];
$vemail    = $_POST['email'];

// cek apakah ada file baru diupload
if (!empty($_FILES['file_foto']['name'])) {
    $namaFile        = $_FILES['file_foto']['name'];
    $lokasiSemenetara = $_FILES['file_foto']['tmp_name'];
    $lokasiTujuan     = 'foto/' . $namaFile;

    if (move_uploaded_file($lokasiSemenetara, $lokasiTujuan)) {
        $vfoto = $namaFile;
        $queryUpdate = "UPDATE tbl_mahasiswa 
                        SET nama='$vnama', prodi='$vprodi', angkatan='$vangkatan', 
                            email='$vemail', foto='$vfoto' 
                        WHERE nim='$vnim'";
    } else {
        echo "File tidak tersimpan";
        exit();
    }
} else {
    // kalau tidak upload foto baru, jangan ubah kolom foto
    $queryUpdate = "UPDATE tbl_mahasiswa 
                    SET nama='$vnama', prodi='$vprodi', angkatan='$vangkatan', 
                        email='$vemail' 
                    WHERE nim='$vnim'";
}

mysqli_query($connection, $queryUpdate);
header('location: data_mahasiswa.php');
