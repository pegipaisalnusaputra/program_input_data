<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit;
}

if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    mysqli_query($koneksi, $query);
    header("Location: admin_index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Akun</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
        </form>
    </div>
</body>
</html>
