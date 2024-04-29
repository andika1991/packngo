<?php
// Membuka koneksi ke database
include 'koneksi.php';

// Periksa apakah parameter id_jadwaltiketpesawat diterima melalui URL
if (isset($_GET['id_jadwaltiketpesawat'])) {
    // Escape string untuk mencegah serangan SQL Injection
    $id_jadwaltiketpesawat = mysqli_real_escape_string($conn, $_GET['id_jadwaltiketpesawat']);

    // Query untuk menghapus jadwal tiket pesawat dari database
    $delete_query = "DELETE FROM jadwal_tiket_pesawat WHERE id_jadwaltiketpesawat = '$id_jadwaltiketpesawat'";
    
    if (mysqli_query($conn, $delete_query)) {
        // Jika data berhasil dihapus, arahkan kembali ke halaman jadwalpesawat.php
        header("Location: jadwalpesawat.php");
        exit();
    } else {
        // Jika terjadi kesalahan saat menghapus data dari database, tampilkan pesan error
        echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
} else {
    // Jika parameter id_jadwaltiketpesawat tidak ditemukan, arahkan kembali ke halaman jadwalpesawat.php
    header("Location: jadwalpesawat.php");
    exit();
}
?>
