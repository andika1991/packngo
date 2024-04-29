<?php
// Include your database connection file
include 'koneksi.php';

// Check if ID is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $query = "DELETE FROM metodepembayaran WHERE id_metode = $id";

    if(mysqli_query($conn, $query)) {
        header("Location: metodepembayaran.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
} else {
    echo "ID metode pembayaran tidak ditemukan.";
}
?>
