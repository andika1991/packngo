<?php
// Include file koneksi.php
include 'koneksi.php';

// Tangkap data yang dikirim dari form modal
$id = $_POST['edit-id'];
$namaVendor = $_POST['edit-nama-vendor'];
$alamatVendor = $_POST['edit-alamat-vendor'];

// Tangkap data file gambar yang diunggah
$newLogo = $_FILES['edit-new-logo-vendor'];

// Jika ada file gambar yang diunggah
if (!empty($newLogo['name'])) {
    $filename = $newLogo['name'];
    $tempname = $newLogo['tmp_name'];
    $folder = "uploads/";

    // Pindahkan file gambar yang diunggah ke folder uploads
    move_uploaded_file($tempname, $folder . $filename);

    // Dapatkan path file gambar yang baru
    $logoVendor = $folder . $filename;

    // Ambil path file gambar lama dari database
    $query_select = "SELECT logo_vendor FROM vendor_kereta WHERE id_vendorkrta = $id";
    $result_select = mysqli_query($conn, $query_select);
    $row_select = mysqli_fetch_assoc($result_select);
    $oldLogo = $row_select['logo_vendor'];

    // Hapus gambar lama dari direktori
    unlink($oldLogo);
} else {
    // Jika tidak ada file gambar yang diunggah, gunakan nilai yang sudah ada di database
    $logoVendor = $_POST['edit-logo-vendor'];
}

// Lakukan query untuk memperbarui data vendor di database
$query = "UPDATE vendor_kereta SET nama_vendor='$namaVendor', alamat_vendor='$alamatVendor', logo_vendor='$logoVendor' WHERE id_vendorkrta=$id";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
    // Redirect kembali ke halaman utama jika berhasil
    header("Location: vendorkereta.php");
} else {
    // Tampilkan pesan error jika query gagal dieksekusi
    echo "Error: " . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
?>
