<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit;
}

$query = "SELECT * FROM tb_nasabah WHERE status='belum_approve'";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request Approval</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Request Approval Nasabah</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
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
                    <td>
                        <form method="POST" action="approve.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="approve" class="btn btn-success">Approve</button>
                            <button type="submit" name="reject" class="btn btn-danger">Tolak</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
