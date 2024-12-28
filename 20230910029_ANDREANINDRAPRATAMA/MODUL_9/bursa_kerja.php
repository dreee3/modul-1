<h3>Bursa Kerja</h3>
<hr>
<a href="?menu=tbursa" class="btn btn-primary mb-3">Tambah Lowongan</a>

<?php

include 'Latihan_09_config.php';

$sql = "SELECT * FROM bursa_kerja";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<tr><th>ID</th><th>Posisi</th><th>Perusahaan</th><th>Lokasi</th><th>Deskripsi</th><th>Tanggal Posting</th><th>Aksi</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["posisi"] . "</td>";
        echo "<td>" . $row["perusahaan"] . "</td>";
        echo "<td>" . $row["lokasi"] . "</td>";
        echo "<td>" . $row["deskripsi"] . "</td>";
        echo "<td>" . $row["tanggal_posting"] . "</td>";
        echo "<td>";
        echo "<a href='edit_bursa.php?id=" . $row["id"] . "' class='btn btn-warning'>Edit</a> | ";
        echo "<a href='delete_bursa.php?id=" . $row["id"] . "' class='btn btn-danger'>Hapus</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada lowongan kerja";
}

$conn->close();

?>
