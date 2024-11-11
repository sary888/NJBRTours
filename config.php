<?php
$host = "localhost"; // Biasanya localhost
$username = "root"; // Username database Anda
$password = ""; // Password database Anda jika ada
$dbname = "db_hajjumroh"; // Nama database yang sudah ada

// Koneksi ke database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
