<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_alumni"; // Pastikan nama database sudah benar

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Debugging: Tampilkan nama database yang digunakan
//echo "Nama database yang digunakan: " . $database;
?>
