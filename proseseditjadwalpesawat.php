<?php

// Membuka koneksi ke database
include 'koneksi.php';

// Mendapatkan data dari form
$id_jadwal_pesawat = $_POST['id_jadwaltiketpesawat']; // Anda perlu mendapatkan ID jadwal pesawat yang ingin diubah
$waktu_keberangkatan = $_POST['waktu_keberangkatan'];
$waktu_kedatangan = $_POST['waktu_kedatangan'];
$bandara_keberangkatan = $_POST['bandara_keberangkatan'];
$bandara_kedatangan = $_POST['bandara_kedatangan'];
$harga = $_POST['harga'];
$kelas = $_POST['kelas'];
$kapasitas_stok_tiket = $_POST['kapasitas_stok_tiket'];
$deskripsi_jadwal = $_POST['deskripsi_jadwal'];
$status_jadwal = $_POST['status_jadwal'];
$id_vendorpesawat = $_POST['id_vendorpesawat']; // Anda perlu mendapatkan ID vendor pesawat yang ingin diubah

// Memasukkan data ke dalam database
$query = "UPDATE jadwal_tiket_pesawat SET
            waktu_keberangkatan = '$waktu_keberangkatan',
            waktu_kedatangan = '$waktu_kedatangan',
            bandara_keberangkatan = '$bandara_keberangkatan',
            bandara_kedatangan = '$bandara_kedatangan',
            harga = $harga,
            kelas = '$kelas',
            kapasitas_stok_tiket = $kapasitas_stok_tiket,
            deskripsi_jadwal = '$deskripsi_jadwal',
            status_jadwal = '$status_jadwal'
          WHERE
            id_jadwaltiketpesawat = $id_jadwal_pesawat"; // Menambahkan kondisi untuk memastikan hanya data dengan ID yang tepat yang diubah

$result = mysqli_query($conn, $query);

if ($result) {

    header("Location: jadwalpesawat.php");
 
    
} else {
    // Jika query gagal dijalankan, lakukan sesuatu (misalnya menampilkan pesan error)
    echo "<script>alert('Gagal mengubah data jadwal pesawat.'); window.location.href='jadwalpesawat.php';</script>";
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
