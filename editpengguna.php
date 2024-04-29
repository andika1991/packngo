<?php
include 'koneksi.php';

// Periksa apakah parameter ID pengguna telah diterima
if(isset($_GET['id'])) {
    // Ambil ID pengguna dari parameter GET
    $id_pengguna = $_GET['id'];

    // Query untuk mengambil data pengguna berdasarkan ID
    $query = "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah data pengguna ditemukan
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $username_pengguna = $row['username_pengguna'];
        $email = $row['email'];
    } else {
        // Jika data pengguna tidak ditemukan, redirect ke halaman manajemen pengguna
        header("Location: manajemenpengguna.php");
        exit();
    }
} else {
    // Jika parameter ID pengguna tidak diterima, redirect ke halaman manajemen pengguna
    header("Location: manajemenpengguna.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
</head>
<body>
    <h2>Edit Data Pengguna</h2>
    <form action="proses_edit_pengguna.php" method="post">
        <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username_pengguna; ?>">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $email; ?>">
        </div>
        <div>
            <button type="submit" name="submit">Simpan Perubahan</button>
        </div>
    </form>
</body>
</html>
