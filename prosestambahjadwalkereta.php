<?php

// Membuka koneksi ke database
include 'koneksi.php';

// Mendapatkan data dari form
$waktu_keberangkatan = $_POST['waktu_keberangkatan'];
$waktu_kedatangan = $_POST['waktu_kedatangan'];
$bandara_keberangkatan = $_POST['stasiun_keberangkatan'];
$bandara_kedatangan = $_POST['stasiun_kedatangan'];
$harga = $_POST['harga'];
$kelas = $_POST['kelas'];
$kapasitas_stok_tiket = $_POST['kapasitas_stok_tiket'];
$deskripsi_jadwal = $_POST['deskripsi_jadwal'];
$status_jadwal = $_POST['status_jadwal'];


// Memeriksa apakah ID vendor pesawat ada
if (isset($_POST['id_vendorkrta'])) {
    $id_vendorkrta = $_POST['id_vendorkrta'];
} else {
    // Menampilkan pesan error
    echo "<script>alert('ID vendor pesawat tidak ditemukan.'); window.location.href='tambahjadwalkereta.php';</script>";
    exit();
}

// Memasukkan data ke dalam database
// Memasukkan data ke dalam database
$query = "INSERT INTO jadwal_tiket_kereta (waktu_keberangkatan, waktu_kedatangan, stasiun_keberangkatan, 
stasiun_kedatangan, harga, kelas, kapasitas_stok_tiket, deskripsi_jadwal, id_vendorkrta, status_jadwal)
VALUES ('$waktu_keberangkatan', '$waktu_kedatangan', '$bandara_keberangkatan', 
'$bandara_kedatangan', $harga, '$kelas', $kapasitas_stok_tiket, '$deskripsi_jadwal', $id_vendorkrta, '$status_jadwal')";


// Menjalankan query
mysqli_query($conn, $query);

// Menutup koneksi ke database
mysqli_close($conn);

// Mengarahkan kembali ke halaman daftar jadwal pesawat
header("Location: jadwalkereta.php");

?>