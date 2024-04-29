<?php
// Sertakan file koneksi
include 'koneksi.php';

// Atur zona waktu PHP ke Indonesia
date_default_timezone_set('Asia/Jakarta');

// Fungsi untuk menghasilkan invoice_id
$invoice_id = generateInvoiceID($conn);

// Periksa apakah data-datanya ada di URL
if(isset($_GET['id_pengguna']) && isset($_GET['id_jadwaltiketbus']) && isset($_GET['harga']) && isset($_GET['id_datapenumpang']) && isset($_GET['id_metode'])) {
    // Ambil data dari URL
    $id_pengguna = $_GET['id_pengguna'];
    $id_jadwaltiketbus = $_GET['id_jadwaltiketbus'];
    $harga = $_GET['harga'];
    $id_datapenumpang = $_GET['id_datapenumpang'];
    $id_metode = $_GET['id_metode'];

    // Data untuk dimasukkan
    $timeorder = date('Y-m-d H:i:s'); // Waktu saat ini

    // Query untuk memasukkan data
    $query_insert = "INSERT INTO pesanantiketbus (bukti_bayar, status_pembayaran, id_datapenumpang, id_metode, invoice_id, TIMEORDER, id_pengguna, id_jadwaltiketbus)
                     VALUES (NULL, 'Belum Bayar', $id_datapenumpang, $id_metode, '$invoice_id', '$timeorder', $id_pengguna, $id_jadwaltiketbus)";

    // Eksekusi query INSERT
    if(mysqli_query($conn, $query_insert)) {
        echo "Data berhasil dimasukkan ke dalam database.<br>";

        // Query untuk menampilkan data yang diminta
        $query_select = "SELECT pa.invoice_id, pa.TIMEORDER, jtb.waktu_keberangkatan, jtb.waktu_kedatangan, jtb.terminal_keberangkatan, jtb.terminal_kedatangan, jtb.kelas, jtb.status_jadwal, vb.nama_vendor, dpb.jenis_kelamin, dpb.nama_lengkap, dpb.no_hp, dpb.email, dpb.kursi, mp.nama_metode, mp.nomor_metode, mp.logo_metode, mp.Deksripsi_metode FROM pesanantiketbus AS pa JOIN jadwal_tiket_bus AS jtb ON pa.id_jadwaltiketbus = jtb.id_jadwaltiketbus JOIN vendor_bus AS vb ON jtb.id_vendorbus = vb.id_vendorbus JOIN datapenumpangbus AS dpb ON pa.id_datapenumpang = dpb.id_datapenumpang JOIN metodepembayaran AS mp ON pa.id_metode = mp.id_metode WHERE pa.invoice_id = '$invoice_id'";

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
            }
        } else {
            echo "Tidak ada data yang ditemukan.";
        }
    } else {
        echo "Error: " . $query_insert . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Data tidak lengkap. Silakan kembali ke halaman sebelumnya dan pastikan semua data terisi.";
}

// Fungsi untuk menghasilkan invoice_id
function generateInvoiceID($conn) {
    // Lakukan pengambilan data terakhir
    $query_last_invoice = "SELECT MAX(CAST(SUBSTRING(invoice_id, 8) AS UNSIGNED)) AS last_id FROM pesanantiketbus";
    $result_last_invoice = mysqli_query($conn, $query_last_invoice);

    // Ambil nilai terakhir
    $row_last_invoice = mysqli_fetch_assoc($result_last_invoice);
    $last_id = $row_last_invoice['last_id'];

    // Jika tidak ada nilai terakhir, mulai dari 1
    if($last_id === null) {
        $last_id = 1;
    } else {
        $last_id += 1;
    }

    // Format nomor urut menjadi string dengan panjang 6 karakter
    $formatted_id = str_pad($last_id, 6, '0', STR_PAD_LEFT);

    // Kembalikan nilai invoice_id
    return 'PACKNGO' . $formatted_id;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bukti Pembayaran</title>
</head>
<body>
    <h2>Upload Bukti Pembayaran</h2>
    <button onclick="showUploadForm()">Upload Bukti Pembayaran</button>

    <div id="uploadForm" style="display: none;">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="bukti_pembayaran">Pilih File Bukti Pembayaran:</label>
            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*">
            <input type="hidden" name="invoice_id" value="<?php echo $invoice_id; ?>">
            <br><br>
            <input type="submit" value="Upload" name="submit">
        </form>
    </div>

    <script>
        function showUploadForm() {
            var uploadForm = document.getElementById("uploadForm");
            uploadForm.style.display = "block";
        }
    </script>
</body>
</html>
