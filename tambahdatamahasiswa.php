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

include 'model/connect.php';

$vnim      = $_POST['nim'];
$vnama     = $_POST['nama'];
$vprodi    = $_POST['prodi'];
$vangkatan = $_POST['angkatan'];
$vemail    = $_POST['email'];

// cek apakah ada file foto diupload
if (!empty($_FILES['file_foto']['name'])) {
    $namaFile         = $_FILES['file_foto']['name'];
    $lokasiSemenetara = $_FILES['file_foto']['tmp_name'];
    $lokasiTujuan     = 'foto/' . $namaFile;

    if (move_uploaded_file($lokasiSemenetara, $lokasiTujuan)) {
        $vfoto = $namaFile;
    } else {
        echo "File tidak tersimpan";
        echo "<a href='formtambahmahasiswa.php'>Kembali</a>";
        exit();
    }
} else {
    // jika tidak upload foto, bisa set default kosong atau placeholder
    $vfoto = '';
}

$querySimpan = "INSERT INTO tbl_mahasiswa 
                (nim, nama, prodi, angkatan, email, foto) 
                VALUES ('$vnim', '$vnama', '$vprodi', '$vangkatan', '$vemail', '$vfoto')";
mysqli_query($connection, $querySimpan);

header('location: data_mahasiswa.php');
