<?php
// Include file koneksi.php
include 'koneksi.php';

// Tangkap id vendor yang akan dihapus
$id = $_GET['id'];

// Lakukan query untuk mendapatkan path logo vendor yang akan dihapus
$query_select = "SELECT logo_vendor FROM vendor_pesawat WHERE id_vendorpesawat = $id";
$result_select = mysqli_query($conn, $query_select);

// Periksa apakah query SELECT berhasil dieksekusi
if ($result_select) {
    $row = mysqli_fetch_assoc($result_select);
    $logoPath = $row['logo_vendor'];

    // Hapus file logo dari direktori penyimpanan
    if (unlink($logoPath)) {
        // Jika berhasil menghapus file, lanjutkan dengan menghapus data vendor dari database
        $query_delete = "DELETE FROM vendor_pesawat WHERE id_vendorpesawat = $id";
        $result_delete = mysqli_query($conn, $query_delete);

        // Periksa apakah query DELETE berhasil dieksekusi
        if ($result_delete) {
            // Redirect kembali ke halaman utama jika berhasil
            header("Location: vendorpesawat.php");
        } else {
            // Tampilkan pesan error jika query DELETE gagal dieksekusi
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Tampilkan pesan error jika gagal menghapus file
        echo "Error: Failed to delete image file";
    }
} else {
    // Tampilkan pesan error jika query SELECT gagal dieksekusi
    echo "Error: " . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
?>
