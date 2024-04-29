<?php
include 'koneksi.php';

// Periksa apakah variabel-variabel POST sudah diset
if (
    isset($_POST['id_jadwaltiketkapal']) &&
    isset($_POST['waktu_keberangkatan']) &&
    isset($_POST['waktu_kedatangan']) &&
    isset($_POST['pelabuhan_keberangkatan']) &&
    isset($_POST['pelabuhan_kedatangan']) &&
    isset($_POST['harga']) &&
    isset($_POST['kategori']) &&
    isset($_POST['kapasitas_stok_tiket']) &&
    isset($_POST['deskripsi_jadwal']) &&
    isset($_POST['status_jadwal']) &&
    isset($_POST['id_vendor'])
) {
    // Mengambil data dari $_POST
    $id_jadwaltiketkapal = $_POST['id_jadwaltiketkapal'];
    $waktu_keberangkatan = $_POST['waktu_keberangkatan'];
    $waktu_kedatangan = $_POST['waktu_kedatangan'];
    $pelabuhan_keberangkatan = $_POST['pelabuhan_keberangkatan'];
    $pelabuhan_kedatangan = $_POST['pelabuhan_kedatangan'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $kapasitas_stok_tiket = $_POST['kapasitas_stok_tiket'];
    $deskripsi_jadwal = $_POST['deskripsi_jadwal'];
    $status_jadwal = $_POST['status_jadwal'];
    $id_vendor = $_POST['id_vendor']; 

    // Query SQL UPDATE
    $query = "UPDATE jadwal_tiket_kapal SET
                waktu_keberangkatan = '$waktu_keberangkatan',
                waktu_kedatangan = '$waktu_kedatangan',
                pelabuhan_keberangkatan = '$pelabuhan_keberangkatan',
                pelabuhan_kedatangan = '$pelabuhan_kedatangan',
                harga = $harga,
                kategori = '$kategori',
                kapasitas_stok_tiket = $kapasitas_stok_tiket,
                deskripsi_jadwal = '$deskripsi_jadwal',
                status_jadwal = '$status_jadwal'
              WHERE
                id_jadwaltiketkapal = $id_jadwaltiketkapal";

    // Jalankan query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        header("Location: jadwalkapal.php");
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
