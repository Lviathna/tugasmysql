<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
}

include 'komponen/header.php';
include 'komponen/sidebar.php';
include 'model/connect.php';


$dosen_count     = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) AS total FROM tbl_dosen"))['total'];
$mahasiswa_count = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) AS total FROM tbl_mahasiswa"))['total'];
$matkul_count    = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) AS total FROM tbl_matkul"))['total'];
$nilai_count     = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) AS total FROM tbl_nilai"))['total'];
?>

<div class="content">
    <?php include 'komponen/topbar.php'; ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-user fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Data Dosen</p>
                        <h6 class="mb-0"><?php echo $dosen_count; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Data Mahasiswa</p>
                        <h6 class="mb-0"><?php echo $mahasiswa_count; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Data Matakuliah</p>
                        <h6 class="mb-0"><?php echo $matkul_count; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Data Nilai</p>
                        <h6 class="mb-0"><?php echo $nilai_count; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>


<script src="js/main.js"></script>
</body>

</html>