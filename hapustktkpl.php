<?php
    // Termasuk file koneksi
    include 'koneksi.php';

    // Periksa apakah parameter ID jadwal tiket kereta ada dalam permintaan
    if(isset($_GET['id_jadwaltiketkapal'])) {
        // Escape input untuk mencegah SQL Injection
        $jadwalId = mysqli_real_escape_string($conn, $_GET['id_jadwaltiketkapal']);

        // Query untuk menghapus data jadwal tiket kereta berdasarkan ID
        $query = "DELETE FROM jadwal_tiket_kapal WHERE id_jadwaltiketkapal = '$jadwalId'";

        if(mysqli_query($conn, $query)) {
            // Redirect kembali ke halaman daftar jadwal tiket kereta setelah berhasil menghapus
            header("Location: jadwalkapal.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Redirect jika tidak ada ID jadwal tiket kereta yang diberikan
        header("Location: blank.html");
        exit();
    }
?>