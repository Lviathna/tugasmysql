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
include 'komponen/header.php';
include 'komponen/sidebar.php';
include 'model/connect.php';
?>
<div class="content">
    <?php
    include 'komponen/topbar.php';
    ?>
    <div class="col-sm-12 col-xl-15 pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tambah Data Matakuliah</h6>
            <form action="tambahdatamatkul.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Kode Matkul</label>
                    <input type="number" class="form-control" name="kodematkul" placeholder="Input Kode Matkul">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Matkul</label>
                    <input type="text" class="form-control" name="namamatkul" placeholder="Input Nama Matkul">
                </div>
                <div class="mb-3">
                    <label class="form-label">SKS</label>
                    <input type="text" class="form-control" name="sks" placeholder="Input Jumlah SKS">
                </div>
                <label class="form-label">Pilih Dosen Pengampu</label>
                <select class="form-select mb-3" name="dosen_pengampu" required>
                    <option value="" selected disabled>Silahkan Pilih Dosen Pengampu</option>
                    <?php
                    $result = mysqli_query($connection, "SELECT nidn, nama FROM tbl_dosen");
                    while ($dosen = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$dosen['nidn']}'>{$dosen['nama']}</option>";
                    }
                    ?>
                </select>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="data_matakuliah.php" class="btn btn-danger" style="margin-left: 30px;">Keluar</a>
        </div>

        </form>
    </div>
</div>
<?php include 'komponen/footer.php';
