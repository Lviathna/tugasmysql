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
    <?php include 'komponen/topbar.php'; ?>
    <div class="col-sm-12 col-xl-15 pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tambah Data Nilai</h6>
            <form action="tambahnilai.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Nilai</label>
                    <input type="text" class="form-control" name="nilai" placeholder="Input nilai">
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan Alfabet</label>
                    <input type="text" class="form-control" name="nilaiHuruf" placeholder="Input Keterangan Alfabet">
                </div>

                <label class="form-label">Pilih Matkul</label>
                <select class="form-select mb-3" name="kodematkul" id="kodematkul" required>
                    <option value="" selected disabled>Silahkan Pilih Matkul</option>
                    <?php
                    $result = mysqli_query($connection, "SELECT kodematkul, namamatkul FROM tbl_matkul");
                    while ($matkul = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$matkul['kodematkul']}'>{$matkul['namamatkul']}</option>";
                    }
                    ?>
                </select>
                <label class="form-label">Pilih Mahasiswa</label>
                <select class="form-select mb-3" name="nim" required>
                    <option value="" selected disabled>Silahkan Pilih Nama Mahasiswa</option>
                    <?php
                    $result = mysqli_query($connection, "SELECT nim, nama FROM tbl_mahasiswa");
                    while ($mhs = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$mhs['nim']}'>{$mhs['nama']}</option>";
                    }
                    ?>
                </select>

                <label class="form-label">Dosen Pengampu</label>
                <select class="form-select mb-3" name="nidn" id="nidn" required>
                    <option value="" selected disabled>Silahkan Pilih Matkul terlebih dahulu</option>
                </select>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="data_nilai.php" class="btn btn-danger" style="margin-left: 30px;">Keluar</a>
            </form>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $('#kodematkul').change(function() {
                    var kodematkul = $(this).val();
                    $.getJSON('get_dosen.php', {
                        kodematkul: kodematkul
                    }, function(data) {
                        if (data) {
                            $('#nidn').html(
                                "<option value='" + data.nidn + "' selected>" + data.nama + "</option>"
                            );
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>
<?php include 'komponen/footer.php'; ?>