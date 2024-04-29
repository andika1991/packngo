<?php
// Include file koneksi.php
include 'koneksi.php';

// Ambil data yang dikirim melalui metode POST
$id_pesanantiketbus = $_POST['id_pesanantiketbus'];
$status_pembayaran = $_POST['status_pembayaran'];

// Lakukan query untuk memperbarui status pembayaran di tabel pesanantiketbus
$query = "UPDATE pesanantiketbus SET status_pembayaran = '$status_pembayaran' WHERE id_pesanantiketbus = $id_pesanantiketbus";
$result = mysqli_query($conn, $query);

// Cek apakah query berhasil dijalankan
if ($result) {
    echo "Status pembayaran berhasil diperbarui.";
} else {
    echo "Gagal memperbarui status pembayaran: " . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
?>
