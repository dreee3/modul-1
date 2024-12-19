<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Tracer Alumni</h2>
    <form id="formAlumni">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        
        <label for="angkatan">Angkatan:</label>
        <input type="number" id="angkatan" name="angkatan" required><br><br>
        
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required><br><br>
        
        <label for="pekerjaan">Pekerjaan:</label>
        <input type="text" id="pekerjaan" name="pekerjaan" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea><br><br>
        
        <button type="submit">Submit</button>
    </form>

    <h3>Daftar Alumni</h3>
    <table id="alumniList" border="1">
        <tr>
            <th>Nama</th>
            <th>Angkatan</th>
            <th>Jurusan</th>
            <th>Pekerjaan</th>
            <th>Email</th>
            <th>Alamat</th>
        </tr>
    </table>

    <script>
        $(document).ready(function(){
            // Menampilkan data alumni dari database
            function loadAlumni() {
                $.ajax({
                    url: 'get_alumni.php',
                    method: 'GET',
                    success: function(response) {
                        $('#alumniList').html(response);
                    }
                });
            }

            loadAlumni(); // Load data alumni saat halaman pertama kali dimuat

            // Menangani pengiriman form
            $('#formAlumni').submit(function(e){
                e.preventDefault();
                
                var formData = $(this).serialize();

                $.ajax({
                    url: 'save_alumni.php',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        alert(response);
                        loadAlumni(); // Reload data alumni setelah berhasil disubmit
                    }
                });
            });
        });
    </script>
</body>
</html>
