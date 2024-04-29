<?php
// Mulai sesi
session_start();

// Sertakan file koneksi
include 'koneksi.php';

// Periksa apakah pengguna telah login
if (isset($_SESSION['email'])) {
    // Jika pengguna telah login, dapatkan email pengguna dari sesi
    $email_pengguna = $_SESSION['email'];

    // Query untuk mendapatkan nama pengguna berdasarkan email pengguna
    $query = "SELECT username_pengguna FROM pengguna WHERE email = '$email_pengguna'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query mengembalikan hasil
    if ($result && mysqli_num_rows($result) > 0) {
        // Ambil nama pengguna dari hasil query
        $row = mysqli_fetch_assoc($result);
        $nama_pengguna = $row['username_pengguna'];

        // Simpan nama pengguna dalam sesi
        $_SESSION['nama_pengguna'] = $nama_pengguna;
    } else {
        // Jika query tidak mengembalikan hasil, beri nilai default pada nama pengguna
        $nama_pengguna = "Nama Pengguna";
    }
} else {
    // Jika pengguna belum login, beri nilai default pada nama pengguna
    $nama_pengguna = "Nama Pengguna";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PACK N GO</title>
    <style>
        /* Styling untuk navbar */
        header {
            background-color: #66a1e4;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 80px;
            margin-right: 20px;
            margin-left: 130px;
            width: 250px;
            content: url('https://sin1.contabostorage.com/0a986eb902c4469cb860e43985eb18a1:vocapanel/dkamondshop/PACKNGO1-77e7-original.png');
        }

        nav {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 30px;
            font-size: 23px;
        }

        nav a {
            text-decoration: none;
            color: black;
        }

        nav a:hover {
            font-weight: bold;
        }

        .login {
            background-color: #007bff;
            color: #fff;
            padding: 0px 30px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .login:hover {
            background-color: #d9e4f0;
        }

        h1 {
            font-style: normal;
            text-align: center;
            color:black;
        }

        html, body {
            margin: 0;
            padding: 0;
        }

        .page-header {
    padding: 1.5rem;
}



.page-header h1 {
    font-size: 1.5rem; /* Ubah ukuran font sesuai kebutuhan */
    color: black; /* Warna teks */
}

.page-header .breadcrumb {
    margin-bottom: 0; /* Hilangkan margin bawah */
    list-style: none;
    padding: 0;
}

.page-header .breadcrumb li {
    display: inline-block;
    font-size: 0.875rem; /* Ukuran font breadcrumb */
}

.page-header .breadcrumb li a {
    color: black; /* Warna teks link */
    text-decoration: none;
}

.page-header .breadcrumb li i {
    margin: 0 0.25rem;
    color: #fff; /* Warna ikon breadcrumb */
}

/* Steps Progress bar */
.form-steps {
    display: flex;
    justify-content: center;
    margin-top: 1rem; /* Atur margin atas sesuai kebutuhan */
}

.form-steps__item {
    flex: 1;
    text-align: center;
}

.form-steps__item-content {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.form-steps__item-icon {
    width: 36px; 
    height: 36px; 
    line-height: 36px; 
    border-radius: 50%;
    background-color: #f8f9fa;
    color: #495057; 
    font-size: 1rem; 
}

.form-steps__item-line {
    flex: 1;
    width: 2px; 
    background-color: #f8f9fa; 
}

.form-steps__item-text {
    font-size: 0.875rem; 
    margin-top: 0.5rem; 
}

.form-steps__item--completed .form-steps__item-icon {
    background-color: #007bff; 
    color: #fff; 
}

/* Styling untuk tabel */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
}

th, td {
    border: 1px solid #e0e0e0;
    text-align: left;
    padding: 12px; /* Sesuaikan padding untuk memperbaiki tata letak */
    font-family: Arial, sans-serif; /* Font yang mudah dibaca */
}

th {
    background-color: #f8f9fa; /* Warna latar belakang header */
    color: #333; /* Warna teks header */
}

td {
    background-color: #ffffff; /* Warna latar belakang sel data */
    color: #555; /* Warna teks sel data */
}

/* Hover effect pada baris tabel */
tr:hover {
    background-color: #f1f1f1; /* Warna latar belakang saat hover */
}

/* Tombol Beli */
.button-beli {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}

.button-beli:hover {
    background-color: #0056b3;
}

/* CSS untuk submenu */
.submenu {
    display: none;
    position: absolute;
    z-index: 1;
}

.profile-menu:hover .submenu {
    display: block;
}

/* CSS untuk tampilan submenu */
.profile-menu {
    position: relative;
}

.profile-menu a {
    color: #333;
    text-decoration: none;
}

.profile-menu .submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 160px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 1;
}

.profile-menu .submenu li {
    padding: 10px;
}

.profile-menu .submenu li a {
    color: #333;
    display: block;
    padding: 8px 12px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.profile-menu .submenu li a:hover {
    background-color: #f4f4f4;
}


    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="https://sin1.contabostorage.com/0a986eb902c4469cb860e43985eb18a1:vocapanel/dkamondshop/PACKNGO1-77e7-original.png" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Cek pesanan</a></li>
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">FAQ</a></li>
        


            <?php
// Periksa apakah pengguna telah login
if (isset($_SESSION['email'])) {
    // Jika pengguna telah login, tampilkan tautan untuk mengakses profil, nama pengguna, dan tautan logout
   
    // Periksa apakah nama pengguna telah diset
    if (isset($_SESSION['nama_pengguna'])) {
        // Jika nama pengguna telah diset, tampilkan
        echo '<li class="profile-menu">';
        echo '<a href="#">' . $_SESSION['nama_pengguna'] . '</a>';
        // Tambahkan submenu untuk profil dan pesanan tiket
        echo '<ul class="submenu">';
        echo '<li><a href="profile.php">Profil Ku</a></li>';
        echo '<li><a href="pesanantiket.php">Pesanan Tiket Ku</a></li>';
        echo '<li><a href="logout.php">Logout</a></li>';
        echo '</ul>';
        echo '</li>';
    }
   
} else {
    // Jika pengguna belum login, tampilkan tautan untuk login
    echo '<li><a href="login.php">Login</a></li>';
}
?>
 </ul>
    </nav>
</header>
<?php
// Include file koneksi.php untuk menghubungkan ke database
include 'koneksi.php';

// Periksa apakah parameter id tiket ada dalam URL
if(isset($_GET['id'])) {
    // Ambil ID tiket dari URL
    $id_tiket = $_GET['id'];

    // Buat query untuk mengambil detail tiket berdasarkan ID
    $query = "SELECT j.*, v.nama_vendor, v.logo_vendor, v.alamat_vendor
    FROM jadwal_tiket_bus AS j
    JOIN vendor_bus AS v ON j.id_vendorbus = v.id_vendorbus
    WHERE j.id_jadwaltiketbus = '$id_tiket'
    ";
    
    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if(mysqli_num_rows($result) > 0) {
        // Tampilkan detail tiket
        while($row = mysqli_fetch_assoc($result)) {
            // Tampilkan detail tiket sesuai kebutuhan
            echo "<h2>Detail Tiket Bus</h2>";
            echo "<p>ID Tiket: " . $row['id_jadwaltiketbus'] . "</p>";
            echo "<p>Waktu Keberangkatan: " . $row['waktu_keberangkatan'] . "</p>";
            echo "<p>Waktu Kedatangan: " . $row['waktu_kedatangan'] . "</p>";
            echo "<p>Terminal Keberangkatan: " . $row['terminal_keberangkatan'] . "</p>";
            echo "<p>Terminal Kedatangan: " . $row['terminal_kedatangan'] . "</p>";
            echo "<p>Harga: " . $row['harga'] . "</p>";
            echo "<p>Kelas: " . $row['kelas'] . "</p>";
            echo "<p>Kapasitas Stok Tiket: " . $row['kapasitas_stok_tiket'] . "</p>";
            echo "<p>Deskripsi Jadwal: " . $row['deskripsi_jadwal'] . "</p>";
            echo "<p>Nama Vendor: " . $row['nama_vendor'] . "</p>";
            echo "<p>Logo Vendor: <img src='" . $row['logo_vendor'] . "' alt='Logo Vendor'></p>";
            echo "<p>Alamat Vendor: " . $row['alamat_vendor'] . "</p>";

            echo "<a href='isidata.php?id=" . $row['id_jadwaltiketbus'] . "' class='button-beli'>Booking</a>";
            // Tampilkan detail lainnya...
        }
    } else {
        echo "Tiket tidak ditemukan.";
    }

    // Tutup koneksi database
    mysqli_close($conn);
} else {
    echo "ID Tiket tidak ditemukan.";
}
?>


</body>
</html>

