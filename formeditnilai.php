<html>

<head>
    <title>Edit Nilai</title>
</head>
<?php
include 'model/connect.php';

$id_nilai = $_GET['id_nilai'];

$data = mysqli_query($connection, "SELECT * FROM tbl_nilai WHERE id_nilai='$id_nilai'");
$nilai = mysqli_fetch_assoc($data);

$matkul_result = mysqli_query($connection, "SELECT kodematkul, namamatkul FROM tbl_matkul");
$mhs_result    = mysqli_query($connection, "SELECT nim, nama FROM tbl_mahasiswa");
$dosen_result  = mysqli_query($connection, "SELECT nidn, nama FROM tbl_dosen");
?>
<?php
include 'komponen/header.php';
include 'komponen/sidebar.php';
?>
<div class="content">
    <?php include 'komponen/topbar.php'; ?>
    <div class="col-sm-12 col-xl-15 pt-4 px-4">
        <div class="bg-secondary rounded h-500 p-4">
            <h6 class="mb-4">Edit Data Nilai</h6>
            <form action="proses_edit_nilai.php" method="post">
                <input type="hidden" name="id_nilai" value="<?php echo $nilai['id_nilai']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nilai</label>
                    <input type="text" class="form-control" name="nilai" value="<?php echo $nilai['nilai']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan Alfabet</label>
                    <input type="text" class="form-control" name="nilaiHuruf" value="<?php echo $nilai['nilaiHuruf']; ?>">
                </div>

                <label class="form-label">Pilih Matkul</label>
                <select class="form-select mb-3" name="kodematkul" required>
                    <option value="" disabled>Silahkan Pilih Matkul</option>
                    <?php while ($matkul = mysqli_fetch_assoc($matkul_result)) {
                        $selected = ($matkul['kodematkul'] == $nilai['kodematkul']) ? "selected" : "";
                        echo "<option value='{$matkul['kodematkul']}' $selected>{$matkul['namamatkul']}</option>";
                    } ?>
                </select>

                <label class="form-label">Pilih Mahasiswa</label>
                <select class="form-select mb-3" name="nim" required>
                    <option value="" disabled>Silahkan Pilih Mahasiswa</option>
                    <?php while ($mhs = mysqli_fetch_assoc($mhs_result)) {
                        $selected = ($mhs['nim'] == $nilai['nim']) ? "selected" : "";
                        echo "<option value='{$mhs['nim']}' $selected>{$mhs['nama']}</option>";
                    } ?>
                </select>

                <label class="form-label">Pilih Dosen Pengampu</label>
                <select class="form-select mb-3" name="nidn" required>
                    <option value="" disabled>Silahkan Pilih Dosen Pengampu</option>
                    <?php while ($dosen = mysqli_fetch_assoc($dosen_result)) {
                        $selected = ($dosen['nidn'] == $nilai['nidn']) ? "selected" : "";
                        echo "<option value='{$dosen['nidn']}' $selected>{$dosen['nama']}</option>";
                    } ?>
                </select>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="data_nilai.php" class="btn btn-danger" style="margin-left: 30px;">Keluar</a>
            </form>
        </div>
    </div>
</div>
<?php include 'komponen/footer.php'; ?>