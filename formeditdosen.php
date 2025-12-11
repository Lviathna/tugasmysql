<html>

<head>
    <title>Edit Form</title>
</head>
<?php
include 'model/connect.php';
$xnidn = $_GET['nidn'];
$data = mysqli_query($connection, "SELECT * FROM tbl_dosen WHERE nidn='$xnidn'");
$dosen = mysqli_fetch_array($data);
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
        <div class="bg-secondary rounded h-500 p-4">
            <h6 class="mb-4">Edit Data Dosen</h6>
            <form action="proses_edit_dosen.php" method="post">
                <div class="mb-3">
                    <label class="form-label">NIDN</label>
                    <input type="number" class="form-control" name="nidn" value="<?php echo $dosen['nidn']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $dosen['nama']; ?>">
                </div>
                <label class="form-label">Prodi</label>
                <select class="form-select mb-3" aria-label="Default select example" name="prodi">
                    <option value="" disabled>Silahkan Pilih Prodi</option>
                    <option value="TEKNOLOGI LISTRIK" <?php if ($dosen['prodi'] == 'TEKNOLOGI LISTRIK') echo 'selected'; ?>>TEKNOLOGI LISTRIK</option>
                    <option value="TEKNOLOGI REKAYASA PERANGKAT LUNAK" <?php if ($dosen['prodi'] == 'TEKNOLOGI REKAYASA PERANGKAT LUNAK') echo 'selected'; ?>>TEKNOLOGI REKAYASA PERANGKAT LUNAK</option>
                    <option value="TEKNOLOGI REKAYASA MANUFAKTUR" <?php if ($dosen['prodi'] == 'TEKNOLOGI REKAYASA MANUFAKTUR') echo 'selected'; ?>>TEKNOLOGI REKAYASA MANUFAKTUR</option>
                    <option value="TEKNOLOGI REKAYASA MEKATRONIKA" <?php if ($dosen['prodi'] == 'TEKNOLOGI REKAYASA MEKATRONIKA') echo 'selected'; ?>>TEKNOLOGI REKAYASA MEKATRONIKA</option>
                </select>
                <div class="mb-3">
                    <labe class="form-label">Email</labe>
                    <input type="email" class="form-control" name="email" value="<?php echo $dosen['email']; ?>">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="data_dosen.php" class="btn btn-danger" style="margin-left: 30px;">Keluar</a>
        </div>

        </form>
    </div>
</div>
<?php include 'komponen/footer.php';
