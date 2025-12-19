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
?>
<div class="content">
    <?php
    include 'komponen/topbar.php';
    ?>
    <div class="col-sm-12 col-xl-15 pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Tambah Data Mahasiswa</h6>
            <form action="tambahdatamahasiswa.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIM</label>
                    <input type="number" class="form-control" name="nim" placeholder="Input NIM" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Input Nama" required>
                </div>
                <label for="exampleInputEmail1" class="form-label">Prodi</label>
                <select class="form-select mb-3" aria-label="Default select example" name="prodi" required>
                    <option selected>Silahkan Pilih Prodi</option>
                    <option value="TEKNOLOGI LISTRIK">TEKNOLOGI LISTTRIK</option>
                    <option value="TEKNOLOGI REKAYASA PERANGKAT LUNAK">TEKNOLOGI REKAYASA PERANGKAT LUNAK</option>
                    <option value="TEKNOLOGI REKAYASA MANUFAKTRU">TEKNOLOGI REKAYASA MANUFAKTUR</option>
                    <option value="TEKNOLOGI REKAYASA MEKATRONIKA">TEKNOLOGI REKAYASA MEKATRONIKA</option>
                </select>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tahun Angkatan</label>
                    <input type="number" class="form-control" name="angkatan" placeholder="Input Tahun Angkatan" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Input Email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Foto</label>
                    <input type="file" class="form-control" name="file_foto" placeholder="Pilih Foto" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="data_mahasiswa.php" class="btn btn-danger" style="margin-left: 30px;">Keluar</a>
        </div>

        </form>
    </div>
</div>
<?php include 'komponen/footer.php';
