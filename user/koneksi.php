<?php
$servername = "localhost"; // Ganti dengan server database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "db_klient"; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($servername, $username, $password, $dbname);
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
