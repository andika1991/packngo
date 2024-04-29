<?php
// Sertakan file koneksi
include 'koneksi.php';

// Periksa apakah tombol submit telah ditekan
if(isset($_POST["submit"])) {
    // Periksa apakah file yang diupload berhasil
    if($_FILES["bukti_pembayaran"]["error"] == 0) {
        // Tentukan lokasi untuk menyimpan file yang diupload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["bukti_pembayaran"]["name"]);

        // Periksa apakah file sudah ada
        if(file_exists($target_file)) {
            echo "Maaf, file tersebut sudah ada.";
        } else {
            // Coba untuk mengunggah file
            if(move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $target_file)) {
                echo "File " . basename($_FILES["bukti_pembayaran"]["name"]) . " berhasil diunggah.";
                
                // Update kolom bukti_bayar pada database
                $invoice_id = $_POST["invoice_id"];
                $query_update = "UPDATE pesanantiketbus SET bukti_bayar = '$target_file' WHERE invoice_id = '$invoice_id'";
                if(mysqli_query($conn, $query_update)) {
                    header("Location: tunggu.php?invoice_id=$invoice_id");

                } else {
                    echo "Error: " . $query_update . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file.";
            }
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file: " . $_FILES["bukti_pembayaran"]["error"];
    }
} else {
    echo "Akses tidak valid.";
}
?>
