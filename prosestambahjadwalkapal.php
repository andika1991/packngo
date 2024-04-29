<?php

// Membuka koneksi ke database
include 'koneksi.php';

// Mendapatkan data dari form
$waktu_keberangkatan = $_POST['waktu_keberangkatan'];
$waktu_kedatangan = $_POST['waktu_kedatangan'];
$pelabuhan_keberangkatan = $_POST['pelabuhan_keberangkatan'];
$pelabuhan_kedatangan = $_POST['pelabuhan_kedatangan'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$kapasitas_stok_tiket = $_POST['kapasitas_stok_tiket'];
$deskripsi_jadwal = $_POST['deskripsi_jadwal'];
$status_jadwal = $_POST['status_jadwal'];


// Memeriksa apakah ID vendor pesawat ada
if (isset($_POST['id_vendor'])) {
    $id_vendorkapal = $_POST['id_vendor'];
} else {
    // Menampilkan pesan error
    echo "<script>alert('ID vendor KAPAL tidak ditemukan.'); window.location.href='tambahjadwalkapal.php';</script>";
    exit();
}

// Memasukkan data ke dalam database
// Memasukkan data ke dalam database
$query = "INSERT INTO jadwal_tiket_kapal (waktu_keberangkatan, waktu_kedatangan, pelabuhan_keberangkatan, 
pelabuhan_kedatangan, harga, kategori, kapasitas_stok_tiket, deskripsi_jadwal, id_vendor, status_jadwal)
VALUES ('$waktu_keberangkatan', '$waktu_kedatangan', '$pelabuhan_keberangkatan', 
'$pelabuhan_kedatangan', $harga, '$kategori', $kapasitas_stok_tiket, '$deskripsi_jadwal', $id_vendorkapal, '$status_jadwal')";


// Menjalankan query
mysqli_query($conn, $query);

// Menutup koneksi ke database
mysqli_close($conn);

// Mengarahkan kembali ke halaman daftar jadwal pesawat
header("Location: jadwalkapal.php");

?>