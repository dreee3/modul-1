<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "tracer_alumni";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data alumni dari database
$sql = "SELECT * FROM alumni";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nama"] . "</td>
                <td>" . $row["angkatan"] . "</td>
                <td>" . $row["jurusan"] . "</td>
                <td>" . $row["pekerjaan"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["alamat"] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada data alumni</td></tr>";
}

$conn->close();
?>
