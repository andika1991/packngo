<?php
include 'koneksi.php';

// Ambil data yang dikirim melalui formulir tambah data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Query untuk menambahkan data ke dalam database
$query = "INSERT INTO pengguna (username_pengguna, email, password) VALUES ('$username', '$email', '$password')";

if (mysqli_query($conn, $query)) {
    // Redirect kembali ke halaman sebelumnya jika berhasil
    header("Location: manajemenpengguna.php");
    exit();
} else {
    // Tampilkan pesan error jika terjadi masalah
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
?>
