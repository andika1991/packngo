<?php
// Sertakan file koneksi
include 'koneksi.php';

$invoice_id = $_GET['invoice_id'];

$query_select = "SELECT pa.invoice_id, pa.TIMEORDER, jtb.waktu_keberangkatan, jtb.waktu_kedatangan, jtb.terminal_keberangkatan, jtb.terminal_kedatangan, jtb.kelas, jtb.status_jadwal, vb.nama_vendor, dpb.jenis_kelamin, dpb.nama_lengkap, dpb.no_hp, dpb.email, dpb.kursi, mp.nama_metode, mp.nomor_metode, mp.logo_metode, mp.Deksripsi_metode, pa.status_pembayaran FROM pesanantiketbus AS pa JOIN jadwal_tiket_bus AS jtb ON pa.id_jadwaltiketbus = jtb.id_jadwaltiketbus JOIN vendor_bus AS vb ON jtb.id_vendorbus = vb.id_vendorbus JOIN datapenumpangbus AS dpb ON pa.id_datapenumpang = dpb.id_datapenumpang JOIN metodepembayaran AS mp ON pa.id_metode = mp.id_metode WHERE pa.invoice_id = '$invoice_id'";
// Eksekusi query SELECT
$result = mysqli_query($conn, $query_select);

// Tampilkan hasil query SELECT
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Invoice ID: " . $row["invoice_id"] . "<br>";
        echo "Waktu Order: " . $row["TIMEORDER"] . "<br>";
        echo "Waktu Keberangkatan: " . $row["waktu_keberangkatan"] . "<br>";
        echo "Waktu Kedatangan: " . $row["waktu_kedatangan"] . "<br>";
        echo "Terminal Keberangkatan: " . $row["terminal_keberangkatan"] . "<br>";
        echo "Terminal Kedatangan: " . $row["terminal_kedatangan"] . "<br>";
        echo "Kelas: " . $row["kelas"] . "<br>";
        echo "Status Jadwal: " . $row["status_jadwal"] . "<br>";
        echo "Nama Vendor: " . $row["nama_vendor"] . "<br>";
        echo "Jenis Kelamin: " . $row["jenis_kelamin"] . "<br>";
        echo "Nama Lengkap: " . $row["nama_lengkap"] . "<br>";
        echo "No HP: " . $row["no_hp"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Kursi: " . $row["kursi"] . "<br>";
        echo "Nama Metode: " . $row["nama_metode"] . "<br>";
        echo "Nomor Metode: " . $row["nomor_metode"] . "<br>";
        echo "Deskripsi Metode: " . $row["Deksripsi_metode"] . "<br>";
        echo "<img src='" . $row["logo_metode"] . "' alt='Logo Metode' style='width: 50px; height: auto;'><br>";
        
        // Periksa status pembayaran
        if ($row["status_pembayaran"] == 'Lunas') {
            // Redirect ke halaman tiket jika pembayaran sudah lunas
            header("Location: webterbitiket.php?invoice_id=" . $row["invoice_id"]);
            exit; // Pastikan tidak ada output lain sebelum redirect
        }
    }
} elseif(mysqli_error($conn)) {
    echo "Error: " . $query_select . "<br>" . mysqli_error($conn);
} else {
    echo "Data tidak lengkap. Silakan kembali ke halaman sebelumnya dan pastikan semua data terisi.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <h2>Terimakasih telah mengirimkan bukti pembayaran, Admin sedang melakukan pengecekan estimasi 1-15 menit</h2>
    <p>Jika status sudah diupdate halam ini akan otomatis terefresh</p>
</body>
</html>
