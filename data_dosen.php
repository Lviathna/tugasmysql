<?php
include 'komponen/header.php';
include 'komponen/sidebar.php';
?>
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'kampus';
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
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
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Data Dosen</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NIDN</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">email</th>
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