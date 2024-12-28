<h3>BUKU TAMU</h3>
<hr>
<?php
include "Latihan_09_config.php";


// Menambahkan data tamu ke database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST["nama"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $komentar = $conn->real_escape_string($_POST["komentar"]);

    $sql = "INSERT INTO buku_tamu (nama, email, komentar) VALUES ('$nama', '$email', '$komentar')";
    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<div class="container my-4">
    <h2>Buku Tamu</h2>
    <form method="post" class="mb-4">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar</label>
            <textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>

    <h3>Daftar Tamu</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Komentar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM buku_tamu ORDER BY tanggal DESC");
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['komentar']}</td>
                        <td>{$row['tanggal']}</td>
                    </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Belum ada data tamu.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php $conn->close(); ?>
