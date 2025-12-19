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
$sql = 'SELECT * FROM tbl_mahasiswa';
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
        <a href="formtambahmahasiswa.php">
            <button class="btn btn-primary w-10 m-2" type="button">Tambah Mahasiswa</button>
        </a>
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Data Mahasiswa</h6>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">profile</th>
                        <th scope="col">Nim</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Tahun Angkatan</th>
                        <th scope="col">Email</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td><img src="foto/<?= $row['foto']; ?>" width="100px" height="auto"></td>
                            <td><?php echo $row['nim']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['prodi']; ?></td>
                            <td><?php echo $row['angkatan']; ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td>
                                <a href="formeditmahasiswa.php?nim=<?= $row['nim']; ?>">
                                    <button type="button" class="btn btn-info m-1">Edit</button>
                                </a>
                                <a href="proses_hapus_mahasiswa.php?nim=<?= $row['nim']; ?>">
                                    <button type="button" class="btn btn-danger m-1">Hapus</button>
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