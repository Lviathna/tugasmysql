<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
}
?>

<?php
include 'komponen/header.php';
include 'komponen/sidebar.php';
?>
<?php
include 'model/connect.php';
$sql = "SELECT 
            tbl_nilai.id_nilai,
            tbl_nilai.nilai,
            tbl_nilai.nilaiHuruf,
            tbl_mahasiswa.nama AS nama_mahasiswa,
            tbl_dosen.nama AS nama_dosen,
            tbl_matkul.namamatkul As nama_matkul
        FROM tbl_nilai
        JOIN tbl_mahasiswa ON tbl_nilai.nim = tbl_mahasiswa.nim
        JOIN tbl_dosen ON tbl_nilai.nidn = tbl_dosen.nidn
        JOIN tbl_matkul ON tbl_nilai.kodematkul = tbl_matkul.kodematkul";
$query = mysqli_query($connection, $sql);
if (!$query) {
    die("Query failed: " . mysqli_error($connection));
}
?>

<div class="content">
    <?php
    include 'komponen/topbar.php';
    ?>
    <div class="col-sm-12 col-xl-15 pt-4 px-4">
        <a href="formtambahnilai.php">
            <button class="btn btn-primary w-10 m-2" type="button">Tambah Nilai</button>
        </a>
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Data Nilai</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Mahasiswa</th>
                        <th scope="col">Dosen Pengampu</th>
                        <th scope="col">Matkul</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td><?php echo $row['id_nilai']; ?></td>
                            <td><?php echo $row['nilai']; ?></td>
                            <td><?php echo $row['nilaiHuruf']; ?></td>
                            <td><?php echo $row['nama_mahasiswa']; ?></td>
                            <td><?php echo $row['nama_dosen']; ?></td>
                            <td><?php echo $row['nama_matkul']; ?></td>
                            <td>
                                <a href="formeditnilai.php?id_nilai=<?= $row['id_nilai']; ?>">
                                    <button type="button" class="btn btn-info m-2">Edit</button>
                                </a>
                                <a href="proses_hapus_nilai.php?id_nilai=<?= $row['id_nilai']; ?>">
                                    <button type="button" class="btn btn-danger m-2">Hapus</button>
                                </a>
                            </td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php
            mysqli_free_result($query);
            ?>
        </div>
    </div>
    <?php include 'komponen/footer.php';
    ?>
</div>
</div>