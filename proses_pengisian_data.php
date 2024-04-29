<?php
// Mulai sesi
session_start();

// Sertakan file koneksi
include 'koneksi.php';

// Periksa apakah pengguna telah login
if (isset($_SESSION['email'])) {
    // Ambil data dari form
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $usia = mysqli_real_escape_string($conn, $_POST['usia']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $selected_seat = mysqli_real_escape_string($conn, $_POST['selected_seat']);
    $jadwal_tiketbus = mysqli_real_escape_string($conn, $_POST['id_jadwaltiketbus']);

    // Ambil ID pengguna dari sesi
    $id_pengguna = $_SESSION['id_pengguna'];

    // Query untuk menyimpan data penumpang ke dalam database
    $query = "INSERT INTO `datapenumpangbus`(`jenis_kelamin`, `nama_lengkap`, `no_hp`, `email`, `usia`, `kursi`, `id_pengguna`, `id_jadwaltiketbus`)
    VALUES ('$jenis_kelamin', '$nama_lengkap', '$no_hp', '$email', '$usia', '$selected_seat', '$id_pengguna', '$jadwal_tiketbus')";

    // Eksekusi query INSERT INTO
    if (mysqli_query($conn, $query)) {
        // Ambil ID data penumpang yang sesuai dari database
        $id_data_penumpang = mysqli_insert_id($conn);

        // Query untuk mengambil harga tiket berdasarkan id_jadwaltiketbus
        $query_harga = "SELECT harga FROM jadwal_tiket_bus WHERE id_jadwaltiketbus = $jadwal_tiketbus";
        $result_harga = mysqli_query($conn, $query_harga);

        // Query untuk mendapatkan semua kategori metode pembayaran
        $query_kategori = "SELECT DISTINCT kategori_metode FROM metodepembayaran";
        $result_kategori = mysqli_query($conn, $query_kategori);

        // Periksa apakah query mengembalikan hasil
        if ($result_harga && mysqli_num_rows($result_harga) > 0 && $result_kategori && mysqli_num_rows($result_kategori) > 0) {
            // Ambil harga dari hasil query
            $row_harga = mysqli_fetch_assoc($result_harga);
            $harga = $row_harga['harga'];

            // Pemberitahuan pengisian data berhasil
            echo "<p>Pengisian data berhasil</p>";
            
            // Tampilkan formulir pembayaran
            echo "<p>Lanjutkan Ke Pembayaran</p>";
            echo "Harga: " . number_format($harga, 0, ',', '.') . " IDR"; // Menampilkan harga
            
            // Loop through each category
            while($kategori_row = mysqli_fetch_assoc($result_kategori)) {
                $kategori = $kategori_row['kategori_metode'];
                echo "<p> ($kategori):</p>";
                // Query to get payment methods for this category
                $query_metode_pembayaran = "SELECT * FROM metodepembayaran WHERE kategori_metode='$kategori'";
                $result_metode_pembayaran = mysqli_query($conn, $query_metode_pembayaran);
                // Display payment methods
                while($row = mysqli_fetch_assoc($result_metode_pembayaran)) {
                    echo "<input type='radio' name='metode_pembayaran' value='" . $row['id_metode'] . "' id='metode_".$row['id_metode']."'>";
                    echo "<label for='metode_".$row['id_metode']."'><img src='" . $row['logo_metode'] . "' alt='" . $row['nama_metode'] . "' style='width: 50px; height: auto;'> " . $row['nama_metode'] . "</label><br>";
                    // Hyperlink untuk melanjutkan pembayaran dengan menyertakan ID metode
                    echo "<a href='pembayaran.php?id_pengguna=$id_pengguna&id_jadwaltiketbus=$jadwal_tiketbus&harga=$harga&id_datapenumpang=$id_data_penumpang&id_metode=" . $row['id_metode'] . "' class='lanjutkan_pembayaran' id='link_".$row['id_metode']."'>Lanjutkan Pembayaran</a>";
                }
            }
        } else {
            echo "Error: Tidak dapat mengambil harga tiket atau kategori metode pembayaran.";
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: Pengguna belum login.";
}
?>
<script>
    document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            // Semua tautan lanjutkan_pembayaran disembunyikan
            document.querySelectorAll('.lanjutkan_pembayaran').forEach(function(link) {
                link.style.display = 'none';
            });
            // Tampilkan tautan lanjutkan_pembayaran yang sesuai
            var idMetode = this.value;
            document.getElementById('link_' + idMetode).style.display = 'block';
        });
    });
</script>
