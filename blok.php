<?php
session_start();

if (!isset($_SESSION["login_user"])) {
    header('Location = login.php');
    exit();
}

if ($_SESSION['role'] != 'admin') {
    header("Location: index.php?page=dashboard");
    exit();
}
