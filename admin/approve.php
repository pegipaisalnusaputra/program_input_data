<?php
session_start();
require 'koneksi.php';

if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    $query = "UPDATE tb_nasabah SET status='sudah_approve' WHERE id='$id'";
    mysqli_query($koneksi, $query);
    header("Location: admin_bapprove.php");
} elseif (isset($_POST['reject'])) {
    $id = $_POST['id'];
    $query = "UPDATE tb_nasabah SET status='ditolak' WHERE id='$id'";
    mysqli_query($koneksi, $query);
    header("Location: admin_bapprove.php");
}
?>
