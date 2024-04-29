<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if id_jadwaltiketbus is set
    if(isset($_POST['id_jadwaltiketbus'])) {
        $id_jadwaltiketbus = $_POST['id_jadwaltiketbus'];

        // Delete data from the database
        $query = "DELETE FROM jadwal_tiket_bus WHERE id_jadwaltiketbus = $id_jadwaltiketbus";

        if (mysqli_query($conn, $query)) {
          header("Location: jadwalbus.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        // Handle if id_jadwaltiketbus is not set
        echo "ID tidak ditemukan.";
    }

    mysqli_close($conn);
} else {
    // Handle if request method is not POST
    echo "Metode permintaan tidak valid.";
}
?>
