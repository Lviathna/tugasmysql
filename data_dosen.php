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
$sql = 'SELECT * FROM tbl_dosen';
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
        <a href="formtambahdosen.php">
            <button class="btn btn-primary w-10 m-2" type="button">Tambah Dosen</button>
        </a>
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Data Dosen</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NIDN</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">email</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td><?php echo $row['nidn']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['prodi']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a href="formeditdosen.php?nidn=<?= $row['nidn']; ?>">
                                    <button type="button" class="btn btn-info m-2">Edit</button>
                                </a>
                                <a href="proses_hapus_dosen.php?nidn=<?= $row['nidn']; ?>">
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