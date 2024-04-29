<?php
include 'koneksi.php';

// Query untuk mendapatkan data pengguna
$query = "SELECT * FROM pengguna";
$result = mysqli_query($conn, $query);

// Header untuk file CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=report.csv');

// Output file CSV
$output = fopen('php://output', 'w');

// Header kolom
fputcsv($output, array('ID', 'Username', 'Email', 'Password'));

// Isi data dari tabel pengguna
while ($row = mysqli_fetch_assoc($result)) {
    // Menyembunyikan kolom password agar tidak ditampilkan dalam file CSV
    unset($row['password']);
    fputcsv($output, $row);
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
