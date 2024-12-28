<!-- Navigasi -->
<a href="bursa_kerja.php" class="btn btn-secondary">Bursa Kerja</a>
<a href="Latihan_09_index.php" class="btn btn-secondary">Penelusuran Alumni</a>

<h3>DAFTAR ALUMNI</h3>
<hr>
<a href="?menu=calumni" class="btn btn-primary mb-3">Tambah</a>

<!-- Form Pencarian -->
<form method="GET" action="Latihan_09_index.php">
    <input type="text" name="search" placeholder="Cari alumni..." class="form-control mb-3">
    <button type="submit" class="btn btn-primary">Cari</button>
</form>

<?php

include 'Latihan_09_config.php';

// Menangkap input pencarian
$search = isset($_GET['search']) ? $_GET['search'] : ''; 

// Modifikasi query untuk mendukung pencarian
$sql = "SELECT * FROM alumni WHERE 
        nama LIKE '%$search%' OR 
        tahun_lulus LIKE '%$search%' OR 
        jurusan LIKE '%$search%'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<tr><th>ID</th><th>Nama</th><th>Tahun Lulus</th><th>Jurusan</th><th>Foto</th><th>Aksi</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama"] . "</td>";
        echo "<td>" . $row["tahun_lulus"] . "</td>";
        echo "<td>" . $row["jurusan"] . "</td>";
        echo "<td><img src='" . $row["foto"] . "' width='50'></td>";
        echo "<td>";
        echo "<a href='Latihan_09_index.php?menu=ualumni&id=" . $row["id"] . "' class='btn btn-warning'>Edit</a> | ";
        echo "<a href='Latihan_09_dalumni.php?id=" . $row["id"] . "' class='btn btn-danger'>Hapus</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data";
}

$conn->close();

?>
