<?php
include 'koneksi.php';

// Periksa apakah variabel-variabel POST sudah diset
if (
    isset($_POST['id_jadwaltiketkereta']) &&
    isset($_POST['waktu_keberangkatan']) &&
    isset($_POST['waktu_kedatangan']) &&
    isset($_POST['stasiun_keberangkatan']) &&
    isset($_POST['stasiun_kedatangan']) &&
    isset($_POST['harga']) &&
    isset($_POST['kelas']) &&
    isset($_POST['kapasitas_stok_tiket']) &&
    isset($_POST['deskripsi_jadwal']) &&
    isset($_POST['status_jadwal']) &&
    isset($_POST['id_vendorkrta'])
) {
    // Mengambil data dari $_POST
    $id_jadwaltiketkereta = $_POST['id_jadwaltiketkereta'];
    $waktu_keberangkatan = $_POST['waktu_keberangkatan'];
    $waktu_kedatangan = $_POST['waktu_kedatangan'];
    $bandara_keberangkatan = $_POST['stasiun_keberangkatan'];
    $bandara_kedatangan = $_POST['stasiun_kedatangan'];
    $harga = $_POST['harga'];
    $kelas = $_POST['kelas'];
    $kapasitas_stok_tiket = $_POST['kapasitas_stok_tiket'];
    $deskripsi_jadwal = $_POST['deskripsi_jadwal'];
    $status_jadwal = $_POST['status_jadwal'];
    $id_vendorpesawat = $_POST['id_vendorkrta']; 

    // Query SQL UPDATE
    $query = "UPDATE jadwal_tiket_kereta SET
                waktu_keberangkatan = '$waktu_keberangkatan',
                waktu_kedatangan = '$waktu_kedatangan',
                stasiun_keberangkatan = '$bandara_keberangkatan',
                stasiun_kedatangan = '$bandara_kedatangan',
                harga = $harga,
                kelas = '$kelas',
                kapasitas_stok_tiket = $kapasitas_stok_tiket,
                deskripsi_jadwal = '$deskripsi_jadwal',
                status_jadwal = '$status_jadwal'
              WHERE
                id_jadwaltiketkereta = $id_jadwaltiketkereta";

    // Jalankan query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        header("Location: jadwalkereta.php");
        exit;
    } else {
        // Jika query gagal dijalankan, lakukan sesuatu (misalnya menampilkan pesan error)
        echo "<script>alert('Gagal mengubah data jadwal pesawat.'); window.location.href='jadwalpesawat.php';</script>";
    }
} else {
    // Jika variabel-variabel POST tidak diset, tampilkan pesan error
    echo "<script>alert('Data yang diperlukan tidak lengkap.'); window.location.href='jadwalkereta.php';</script>";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
