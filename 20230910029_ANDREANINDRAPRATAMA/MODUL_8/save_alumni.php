<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "tracer_alumni";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$angkatan = $_POST['angkatan'];
$jurusan = $_POST['jurusan'];
$pekerjaan = $_POST['pekerjaan'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];

// Menyimpan data ke database
$sql = "INSERT INTO alumni (nama, angkatan, jurusan, pekerjaan, email, alamat) 
        VALUES ('$nama', '$angkatan', '$jurusan', '$pekerjaan', '$email', '$alamat')";

if ($conn->query($sql) === TRUE) {
    echo "Data alumni berhasil disimpan!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
