<?php
include 'komponen/header.php';
include 'komponen/sidebar.php';
?>
<?php
include 'model/connect.php';
$sql = "SELECT 
            tbl_matkul.kodematkul, 
            tbl_matkul.namamatkul, 
            tbl_matkul.sks, 
            tbl_dosen.nama AS nama_dosen
        FROM tbl_matkul
        JOIN tbl_dosen ON tbl_matkul.nidn = tbl_dosen.nidn";
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
        <a href="formtambahmatkul.php">
            <button class="btn btn-primary w-10 m-2" type="button">Tambah Matakuliah</button>
        </a>
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Data Matakuliah</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Kode Matkul</th>
                        <th scope="col">Nama Matkul</th>
                        <th scope="col">SKS</th>
                        <th scope="col">Dosen Pengampu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td><?php echo $row['kodematkul']; ?></td>
                            <td><?php echo $row['namamatkul']; ?></td>
                            <td><?php echo $row['sks']; ?></td>
                            <td><?php echo $row['nama_dosen']; ?></td>
                            <td>
                                <a href="form_editmatkul.php?kodematkul=<?= $row['kodematkul']; ?>">
                                    <button type="button" class="btn btn-info m-2">Edit</button>
                                </a>
                                <a href="proses_hapus_matkul.php?kodematkul=<?= $row['kodematkul']; ?>">
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