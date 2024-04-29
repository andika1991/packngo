<?php
// Membuka koneksi ke database
include 'koneksi.php';

// Query untuk mendapatkan semua data jadwal pesawat
$query = "SELECT * FROM jadwal_tiket_pesawat";

// Eksekusi query
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
if($result) {
    // Tentukan nama file CSV dan header
    $filename = 'jadwal_pesawat.csv';
    $header = "ID_JADWAL,WAKTU_KEBERANGKATAN,WAKTU_KEDATANGAN,BANDARA_KEBERANGKATAN,BANDARA_KEDATANGAN,HARGA,KELAS,KAPASITAS_STOK,DESKRIPSI,IDVENDOR,STATUS\n";

    // Inisialisasi string kosong untuk menampung data
    $csv_data = '';

    // Tambahkan header ke data CSV
    $csv_data .= $header;

    // Iterasi setiap baris hasil query dan tambahkan ke data CSV
    while($row = mysqli_fetch_assoc($result)) {
        // Ubah tanda koma di dalam data menjadi spasi ganda
        $row = array_map('escape_csv', $row);
        // Gabungkan data ke dalam baris CSV
        $csv_data .= implode(',', $row) . "\n";
    }

    // Menutup koneksi ke database
    mysqli_close($conn);

    // Setting header untuk tipe file CSV
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=$filename");

    // Output data CSV ke output HTTP
    echo $csv_data;
} else {
    // Jika query gagal dieksekusi
    echo "Gagal menjalankan query.";
}

// Fungsi untuk menghindari masalah karakter khusus dalam file CSV
function escape_csv($value) {
    // Membungkus nilai dalam tanda kutip ganda dan menghindari karakter khusus
    return '"' . str_replace('"', '""', $value) . '"';
}
?>
