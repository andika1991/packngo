<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if id_jadwaltiketbus is set
    if(isset($_POST['id_jadwaltiketbus'])) {
        $id_jadwaltiketbus = $_POST['id_jadwaltiketbus'];
    } else {
        // Handle if id_jadwaltiketbus is not set
        echo "ID tidak ditemukan.";
        exit();
    }

    $waktu_keberangkatan = $_POST['waktu_keberangkatan'];
    $waktu_kedatangan = $_POST['waktu_kedatangan'];
    $terminal_keberangkatan = $_POST['terminal_keberangkatan'];
    $terminal_kedatangan = $_POST['terminal_kedatangan'];
    $harga = $_POST['harga'];
    $kelas = $_POST['kelas'];
    $kapasitas_stok_tiket = $_POST['kapasitas_stok_tiket'];
    $deskripsi_jadwal = $_POST['deskripsi_jadwal'];
    $id_vendorbus = $_POST['id_vendorbus'];
    $status_jadwal = $_POST['status_jadwal'];

    // Update data in the database
    $query = "UPDATE jadwal_tiket_bus SET waktu_keberangkatan='$waktu_keberangkatan', waktu_kedatangan='$waktu_kedatangan', terminal_keberangkatan='$terminal_keberangkatan', terminal_kedatangan='$terminal_kedatangan', harga=$harga, kelas='$kelas', kapasitas_stok_tiket=$kapasitas_stok_tiket, deskripsi_jadwal='$deskripsi_jadwal', id_vendorbus='$id_vendorbus', status_jadwal='$status_jadwal' WHERE id_jadwaltiketbus=$id_jadwaltiketbus";

    if (mysqli_query($conn, $query)) {
        header("Location: jadwalbus.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // Handle if request method is not POST
    echo "Metode permintaan tidak valid.";
}
?>
