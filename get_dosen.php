<?php
include 'model/connect.php';

if (isset($_GET['kodematkul'])) {
    $kodematkul = $_GET['kodematkul'];
    $query = mysqli_query(
        $connection,
        "SELECT d.nidn, d.nama 
         FROM tbl_matkul m 
         JOIN tbl_dosen d ON m.nidn = d.nidn 
         WHERE m.kodematkul='$kodematkul'"
    );
    $dosen = mysqli_fetch_assoc($query);
    echo json_encode($dosen);
}
