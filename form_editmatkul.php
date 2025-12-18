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
$xkodematkul = $_GET['kodematkul'];
$data = mysqli_query($connection, "SELECT * FROM tbl_matkul WHERE kodematkul='$xkodematkul'");
$matkul = mysqli_fetch_array($data);
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
            <h6 class="mb-4">Edit Data Matkul</h6>
            <form action="proses_edit_matkul.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Kode Matkul</label>
                    <input type="number" class="form-control" name="kodematkul" value="<?php echo $matkul['kodematkul']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Matkul</label>
                    <input type="text" class="form-control" name="namamatkul" value="<?php echo $matkul['namamatkul']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">SKS</label>
                    <input type="text" class="form-control" name="sks" value="<?php echo $matkul['sks']; ?>">
                </div>
                <label class="form-label">Pilih Dosen Pengampu</label>
                <label class="form-label">Pilih Dosen Pengampu</label>
                <select class="form-select mb-3" name="dosen_pengampu" required>
                    <option value="" disabled>Silahkan Pilih Dosen Pengampu</option>
                    <?php
                    $result = mysqli_query($connection, "SELECT nidn, nama FROM tbl_dosen");


                    $nidn_selected = $matkul['nidn'];

                    while ($dosen = mysqli_fetch_assoc($result)) {
                        $selected = ($dosen['nidn'] == $nidn_selected) ? "selected" : "";
                        echo "<option value='{$dosen['nidn']}' $selected>{$dosen['nama']}</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="data_matakuliah.php" class="btn btn-danger" style="margin-left: 30px;">Keluar</a>
        </div>

        </form>
    </div>
</div>
<?php include 'komponen/footer.php';
