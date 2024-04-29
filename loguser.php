<?php
// Mulai sesi
session_start();

// Sertakan file koneksi
include 'koneksi.php';

// Periksa apakah permintaan adalah metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah email dan password telah dikirim melalui formulir
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        // Ambil nilai email dan password dari formulir
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Query untuk memeriksa kredensial pengguna di database
        $query = "SELECT * FROM pengguna WHERE email = '$email' AND password = '$password'";

        // Eksekusi query
        $result = mysqli_query($conn, $query);

        // Periksa apakah query mengembalikan baris hasil
        if (mysqli_num_rows($result) == 1) {
            // Jika email dan password cocok, simpan informasi pengguna ke dalam sesi
            $_SESSION['email'] = $email;
            
            // Ambil nama pengguna dari hasil query atau hasilkan dari email jika perlu
            $row = mysqli_fetch_assoc($result);
            $nama_pengguna = $row['username_pengguna']; // Ubah nama_pengguna sesuai dengan kolom nama pengguna di tabel
            
            // Simpan nama pengguna dalam sesi
            $_SESSION['username_pengguna'] = $nama_pengguna;
            
            // Redirect ke halaman utama atau halaman lain yang sesuai
            header("Location: homeakun.php");
            exit; // Penting untuk menghentikan eksekusi skrip setelah mengarahkan pengguna
        } else {
            // Jika email dan password tidak cocok, tampilkan pesan kesalahan
            echo "Email atau password salah. Silakan coba lagi.";
        }
    } else {
        // Jika email dan password tidak terkirim, tampilkan pesan kesalahan
        echo "Email dan password harus diisi.";
    }
}

// Tutup koneksi database
mysqli_close($conn);
?>
