<?php
// Sisipkan library FPDF
require('fpdf186/fpdf.php');

// Koneksi ke database (gantilah dengan informasi koneksi Anda)
include 'koneksi.php';

// Buat objek PDF
$pdf = new FPDF();
$pdf->AddPage();

// Atur font untuk judul
$pdf->SetFont('Arial', 'B', 16);

// Tambahkan logo atau nama perusahaan di bagian atas
$pdf->Cell(0, 10, 'PACK N GO', 0, 1, 'C');
$pdf->Ln(10); // Spasi antara header dan konten

// Atur font untuk konten
$pdf->SetFont('Arial', '', 12);

// Tambahkan judul
$pdf->Cell(0, 10, 'Detail Pesanan Tiket Bus', 0, 1, 'C');

// Tambahkan spasi
$pdf->Ln(10);

// Ambil data dari database
$query = "SELECT 
    pb.invoice_id, 
    jtb.terminal_keberangkatan, 
    jtb.terminal_kedatangan, 
    vb.nama_vendor, 
    mp.nama_metode, 
    pb.bukti_bayar, 
    pb.status_pembayaran, 
    jtb.harga, 
    uo.username_pengguna, 
    pb.TIMEORDER,
    dpb.jenis_kelamin,
    dpb.nama_lengkap,
    dpb.no_hp,
    dpb.email,
    dpb.usia,
    dpb.kursi
FROM 
    pesanantiketbus pb 
JOIN 
    jadwal_tiket_bus jtb ON pb.id_jadwaltiketbus = jtb.id_jadwaltiketbus 
JOIN 
    vendor_bus vb ON jtb.id_vendorbus = vb.id_vendorbus 
JOIN 
    metodepembayaran mp ON pb.id_metode = mp.id_metode 
JOIN 
    pengguna uo ON pb.id_pengguna = uo.id_pengguna
JOIN
    datapenumpangbus dpb ON pb.id_datapenumpang = dpb.id_datapenumpang";
$result = mysqli_query($conn, $query);

// Periksa apakah ada data
if (mysqli_num_rows($result) > 0) {
    // Loop untuk setiap baris data
    while ($row = mysqli_fetch_assoc($result)) {
        // Tambahkan informasi tiket ke PDF
        $pdf->Cell(0, 10, 'Invoice ID: ' . $row['invoice_id'], 0, 1);
        $pdf->Cell(0, 10, 'Terminal Keberangkatan: ' . $row['terminal_keberangkatan'], 0, 1);
        $pdf->Cell(0, 10, 'Terminal Kedatangan: ' . $row['terminal_kedatangan'], 0, 1);
        $pdf->Cell(0, 10, 'Harga: ' . $row['harga'], 0, 1);
        $pdf->Cell(0, 10, 'Waktu Pesanan: ' . $row['TIMEORDER'], 0, 1);
        $pdf->Cell(0, 10, 'Status Pembayaran: ' . $row['status_pembayaran'], 0, 1);
        $pdf->Cell(0, 10, 'Nama Penumpang: ' . $row['nama_lengkap'], 0, 1);
        $pdf->Cell(0, 10, 'Nomor Telepon: ' . $row['no_hp'], 0, 1);
        $pdf->Cell(0, 10, 'Email: ' . $row['email'], 0, 1);
        $pdf->Cell(0, 10, '-------------------------------------------', 0, 1);
    }
} else {
    // Tampilkan pesan jika tidak ada data
    $pdf->Cell(0, 10, 'Tidak ada data tiket bus.', 0, 1);
}

// Tambahkan footer dengan kredensial perusahaan
$pdf->SetY(-30); // Geser ke atas untuk footer
$pdf->Cell(0, 10, 'PACK N GO', 0, 1, 'C'); // Nama perusahaan
$pdf->Cell(0, 10, 'Alamat: Jl. Contoh No. 123, Kota Bandar Lampung', 0, 1, 'C');
$pdf->Cell(0, 10, 'Telp: (021) 123-4567 | Website: www.packngo.com', 0, 1, 'C');

// Tutup koneksi database
mysqli_close($conn);

// Output atau simpan ke file
$pdf->Output('tiket_bus.pdf', 'D'); // D untuk download, I untuk tampilkan di browser
?>
