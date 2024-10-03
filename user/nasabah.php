<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_username'])) {
    header("Location: user_login.php");
    exit;
}

// Mengambil data nasabah untuk akun yang sedang login
$username = $_SESSION['user_username'];
$query = "SELECT * FROM tb_nasabah WHERE username='$username'";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Nasabah</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Nasabah</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Tanggal Input</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['nohp']; ?></td>
                    <td><?php echo $row['tanggal_input']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
