<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_username'])) {
    header("Location: user_login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $tanggal_input = date("Y-m-d");
    $kredit = $_POST['kredit'];
    $persentase = 0.20; // Persentase tetap
    $biaya_admin = array_sum($kredit) * $persentase;

    // Simpan data ke database
    $query = "INSERT INTO tb_nasabah (nama, alamat, nohp, tanggal_input, biaya_admin, status) 
              VALUES ('$nama', '$alamat', '$nohp', '$tanggal_input', '$biaya_admin', 'belum_approve')";
    mysqli_query($koneksi, $query);

    // Redirect ke halaman setelah submit
    header("Location: nasabah.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Input Nasabah</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function addKreditField() {
            var kreditFields = document.getElementById("kreditFields");
            var newField = document.createElement("input");
            newField.type = "number";
            newField.name = "kredit[]";
            newField.className = "form-control mt-2";
            newField.placeholder = "Kredit Baru";
            kreditFields.appendChild(newField);
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2>Form Input Nasabah</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">No HP</label>
                <input type="text" name="nohp" class="form-control" required>
            </div>
            <div class="mb-3" id="kreditFields">
                <label for="kredit" class="form-label">Kredit</label>
                <input type="number" name="kredit[]" class="form-control" placeholder="Kredit 1" required>
            </div>
            <button type="button" onclick="addKreditField()" class="btn btn-secondary">Tambah Kredit</button>
            <div class="mb-3">
                <input type="hidden" name="tanggal_input" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>