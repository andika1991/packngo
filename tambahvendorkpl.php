<?php
// Pastikan koneksi.php sudah memuat script untuk koneksi ke database
include 'koneksi.php';

// Tangkap data yang dikirimkan melalui form
$nama_vendor = $_POST['nama_vendor'];
$alamat_vendor = $_POST['alamat_vendor'];

// Tangkap file logo_vendor
$logo_vendor = $_FILES['logo_vendor']['name'];
$tmp_name = $_FILES['logo_vendor']['tmp_name'];
$size = $_FILES['logo_vendor']['size'];

// Direktori penyimpanan logo
$upload_dir = 'uploads/';

// Pindahkan file ke direktori yang ditentukan
move_uploaded_file($tmp_name, $upload_dir . $logo_vendor);

// Query untuk menambah data vendor kapal
$query = "INSERT INTO vendor_kapal (nama_vendor, alamat_vendor, logo_vendor) VALUES ('$nama_vendor', '$alamat_vendor', '$upload_dir$logo_vendor')";

// Jalankan query
if (mysqli_query($conn, $query)) {
    // Jika query berhasil dijalankan, kembalikan ke halaman sebelumnya
    header("Location: vendorkapal.php");
} else {
    // Jika terjadi kesalahan, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>
