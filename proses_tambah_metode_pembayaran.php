<?php

include 'koneksi.php';


$namaMetode = $_POST['nama_metode'];
$nomorMetode = $_POST['nomor_metode'];
$kategoriMetode = $_POST['kategori_metode'];
$deskripsiMetode = $_POST['deksripsi_metode'];


$logoMetode = ''; 
if ($_FILES['logo_metode']['name']) {
    $logoMetode = 'uploads/' . $_FILES['logo_metode']['name']; 
    move_uploaded_file($_FILES['logo_metode']['tmp_name'], $logoMetode); 
}


$query = "INSERT INTO metodepembayaran (nama_metode, nomor_metode, kategori_metode, deksripsi_metode, logo_metode) VALUES ('$namaMetode', '$nomorMetode', '$kategoriMetode', '$deskripsiMetode', '$logoMetode')";
$result = mysqli_query($conn, $query);


if ($result) {
  
    header("Location: metodepembayaran.php");
} else {

    echo "Error: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
