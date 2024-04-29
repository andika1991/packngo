<?php

include 'koneksi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if(isset($_POST['id_metode'])) {
        $id = $_POST['id_metode'];

 
        $nama_metode = mysqli_real_escape_string($conn, $_POST['nama_metode']);
        $nomor_metode = mysqli_real_escape_string($conn, $_POST['nomor_metode']);
        $kategori_metode = mysqli_real_escape_string($conn, $_POST['kategori_metode']);
        $deskripsi_metode = mysqli_real_escape_string($conn, $_POST['deskripsi_metode']); 
        
    
        if ($_FILES['logo_metode']['error'] === UPLOAD_ERR_OK) {
            $logo_metode = $_FILES['logo_metode']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["logo_metode"]["name"]);

        
            if (move_uploaded_file($_FILES["logo_metode"]["tmp_name"], $target_file)) {
           
                $sql = "UPDATE metodepembayaran SET nama_metode='$nama_metode', Nomor_metode='$nomor_metode', kategori_metode='$kategori_metode', Deksripsi_metode='$deskripsi_metode', logo_metode='$target_file' WHERE id_metode=$id"; // Perbaikan nama kolom

                if (mysqli_query($conn, $sql)) {
                    header("Location: metodepembayaran.php");
                    exit();
                } else {
                    echo "Terjadi kesalahan: " . mysqli_error($conn);
                }
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file.";
            }
        } else {
    
            $sql = "UPDATE metodepembayaran SET nama_metode='$nama_metode', Nomor_metode='$nomor_metode', kategori_metode='$kategori_metode', Deksripsi_metode='$deskripsi_metode' WHERE id_metode=$id"; // Perbaikan nama kolom

            if (mysqli_query($conn, $sql)) {
                header("Location: metodepembayaran.php");
            } else {
                echo "Terjadi kesalahan: " . mysqli_error($conn);
            }
        }
    } else {
        echo "ID metode pembayaran tidak ditemukan.";
    }
} else {
    echo "Akses tidak valid.";
}
?>
