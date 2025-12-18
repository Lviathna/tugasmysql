<?php
session_start();
include("model/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = mysqli_real_escape_string($connection, $_POST['username']);
    $pass = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM tbl_user WHERE username = '$user' AND password = '$pass'";
    $hasil = mysqli_query($connection, $sql);

    if (mysqli_num_rows($hasil) == 1) {
        $row = mysqli_fetch_assoc($hasil);

        $_SESSION['login_user'] = $row['username'];
        $_SESSION['role'] = $row['role']; // simpan role

        // arahkan sesuai role
        if ($row['role'] == 'admin') {
            header("Location: index.php?page=dashboard"); // admin ke dashboard
        } else {
            header("Location: index.php?page=profile"); // user ke halaman user
        }
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }
}
