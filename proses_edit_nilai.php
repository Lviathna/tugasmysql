<?php
include 'model/connect.php';

$id_nilai    = $_POST['id_nilai'];
$nilai       = $_POST['nilai'];
$nilaiHuruf  = $_POST['nilaiHuruf'];
$kodematkul  = $_POST['kodematkul'];
$nim         = $_POST['nim'];
$nidn        = $_POST['nidn'];

$queryUpdate = "UPDATE tbl_nilai 
                SET nilai='$nilai', nilaiHuruf='$nilaiHuruf', 
                    kodematkul='$kodematkul', nim='$nim', nidn='$nidn' 
                WHERE id_nilai='$id_nilai'";

mysqli_query($connection, $queryUpdate);

header('Location: data_nilai.php');
exit;
