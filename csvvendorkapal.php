<?php
// Include file koneksi.php
include 'koneksi.php';

// Nama file CSV yang akan di-generate
$filename = 'data_vendor_kapal.csv';

// Membuka file CSV untuk menulis
$file = fopen($filename, 'w');

// Header kolom CSV
$fields = array('ID', 'Nama Vendor', 'Alamat', 'Logo');
fputcsv($file, $fields);

// Query untuk mendapatkan data dari tabel vendor_kapal
$query = "SELECT id_vendor, nama_vendor, alamat_vendor, logo_vendor FROM vendor_kapal";
$result = mysqli_query($conn, $query);

// Menuliskan data ke dalam file CSV
while ($row = mysqli_fetch_assoc($result)) {
    $data = array($row['id_vendor'], $row['nama_vendor'], $row['alamat_vendor'], $row['logo_vendor']);
    fputcsv($file, $data);
}

// Tutup file CSV
fclose($file);

// Set header untuk memicu download file CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Membaca file CSV dan mengirimkannya ke output
readfile($filename);

// Hapus file CSV setelah selesai
unlink($filename);

// Tutup koneksi database
mysqli_close($conn);
?>
