<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Administrator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Dashboard Administrator</h2>
        <a href="admin_bapprove.php" class="btn btn-warning">Belum Approve</a>
        <a href="admin_index.php" class="btn btn-success">Sudah Approve</a>
        <a href="register.php" class="btn btn-info">Daftar Akun</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
