<html>

<head>
    <title>Edit Form</title>
</head>
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
$xnim = $_GET['nim'];
$data = mysqli_query($connection, "SELECT * FROM tbl_mahasiswa WHERE nim='$xnim'");
$mhs = mysqli_fetch_array($data);
?>
<?php
include 'komponen/header.php';
include 'komponen/sidebar.php';
?>
<div class="content">
    <?php
    include 'komponen/topbar.php';
    ?>
    <div class="col-sm-12 col-xl-15 pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tambah Data Mahasiswa</h6>
            <form action="proses_editmahasiswa.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIM</label>
                    <input type="number" class="form-control" name="nim" value="<?php echo $mhs['nim']; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $mhs['nama']; ?>">
                </div>
                <label for="exampleInputEmail1" class="form-label">Prodi</label>
                <select class="form-select mb-3" aria-label="Default select example" name="prodi">
                    <option value="" disabled>Silahkan Pilih Prodi</option>
                    <option value="TEKNOLOGI LISTRIK" <?php if ($mhs['prodi'] == 'TEKNOLOGI LISTRIK') echo 'selected'; ?>>TEKNOLOGI LISTRIK</option>
                    <option value="TEKNOLOGI REKAYASA PERANGKAT LUNAK" <?php if ($mhs['prodi'] == 'TEKNOLOGI REKAYASA PERANGKAT LUNAK') echo 'selected'; ?>>TEKNOLOGI REKAYASA PERANGKAT LUNAK</option>
                    <option value="TEKNOLOGI REKAYASA MANUFAKTUR" <?php if ($mhs['prodi'] == 'TEKNOLOGI REKAYASA MANUFAKTUR') echo 'selected'; ?>>TEKNOLOGI REKAYASA MANUFAKTUR</option>
                    <option value="TEKNOLOGI REKAYASA MEKATRONIKA" <?php if ($mhs['prodi'] == 'TEKNOLOGI REKAYASA MEKATRONIKA') echo 'selected'; ?>>TEKNOLOGI REKAYASA MEKATRONIKA</option>
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $mhs['email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tahun Angkatan</label>
                    <input type="number" class="form-control" name="angkatan" value="<?php echo $mhs['angkatan']; ?>">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="data_mahasiswa.php" class="btn btn-danger" style="margin-left: 30px;">Keluar</a>
        </div>

        </form>
    </div>
</div>
<?php include 'komponen/footer.php';
