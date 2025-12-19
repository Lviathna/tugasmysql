<?php

if ($_FILES['file_foto']['size'] > 10000) {
    echo "file terlalu besar";
    echo "<a href='uploud.php'>kembali</a>";
    exit();
}
$namaFile = $_FILES['file_foto']['name'];
$lokasiSemenetara = $_FILES['file_foto']['tmp_name'];
$lokasiTujuan = "foto/" . $namaFile;

$terupload = move_uploaded_file($lokasiSemenetara, $lokasiTujuan);

if ($terupload) {
    echo "upload file berhasil";
    echo "lokasi:" . $lokasiTujuan;
} else {
    echo "upload gagal";
}
