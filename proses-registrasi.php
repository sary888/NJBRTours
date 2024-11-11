<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $paket = mysqli_real_escape_string($conn, $_POST['paket']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $jumlah_jamaah = intval($_POST['jumlah_jamaah']);

    $sql = "INSERT INTO pendaftaran (nama, paket, telepon, jumlah_jamaah) VALUES ('$nama', '$paket', '$telepon', '$jumlah_jamaah')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pendaftaran berhasil!'); window.location='detail-jadwal-paket-umroh.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . mysqli_error($conn) . "'); window.location='detail-jadwal-paket-umroh.php';</script>";
    }
}
?>
