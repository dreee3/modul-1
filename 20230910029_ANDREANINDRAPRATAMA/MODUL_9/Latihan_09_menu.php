<aside class="col-md-2 p-0">
    <nav class="nav flex-column bg-light p-3 m-0">
        <?php
        // Array menu untuk mempermudah pengelolaan
        include 'Latihan_09_config.php';
        $menus = [
            "home" => "Home",
            "alumni" => "Alumni",
            "bukutamu" => "Buku Tamu",
            "bursakerja" => "Bursa Kerja",
            // Tambahkan menu lain di sini jika diperlukan
        ];

        // Ambil menu aktif dari URL
        $activeMenu = isset($_GET['menu']) ? $_GET['menu'] : 'home';

        // Loop untuk menampilkan menu
        foreach ($menus as $key => $label) {
            // Tambahkan kelas "active" jika menu aktif
            $activeClass = ($key === $activeMenu) ? 'active' : '';
            echo "<a class='nav-link $activeClass' href='?menu=$key'>$label</a>";
        }
        ?>
    </nav>
</aside>
