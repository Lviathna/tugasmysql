<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
}

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
            <h6 class="mb-4">Tambah Data Dosen</h6>
            <form action="tambahdatadosen.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIDN</label>
                    <input type="number" class="form-control" name="nidn" placeholder="Input NIDN">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Input Nama">
                </div>
                <label for="exampleInputEmail1" class="form-label">Prodi</label>
                <select class="form-select mb-3" aria-label="Default select example" name="prodi">
                    <option selected>Silahkan Pilih Prodi</option>
                    <option value="TEKNOLOGI LISTRIK">TEKNOLOGI LISTTRIK</option>
                    <option value="TEKNOLOGI REKAYASA PERANGKAT LUNAK">TEKNOLOGI REKAYASA PERANGKAT LUNAK</option>
                    <option value="TEKNOLOGI REKAYASA MANUFAKTRU">TEKNOLOGI REKAYASA MANUFAKTUR</option>
                    <option value="TEKNOLOGI REKAYASA MEKATRONIKA">TEKNOLOGI REKAYASA MEKATRONIKA</option>
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Input Email">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="data_dosen.php" class="btn btn-danger" style="margin-left: 30px;">Keluar</a>
        </div>

        </form>
    </div>
</div>
<?php include 'komponen/footer.php';
