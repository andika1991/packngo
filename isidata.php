<?php
// Mulai sesi
session_start();

// Sertakan file koneksi
include 'koneksi.php';

// Periksa apakah pengguna telah login
if (isset($_SESSION['email'])) {
    // Jika pengguna telah login, dapatkan email pengguna dari sesi
    $email_pengguna = $_SESSION['email'];

    // Query untuk mendapatkan nama pengguna dan ID pengguna berdasarkan email pengguna
    $query = "SELECT id_pengguna, username_pengguna FROM pengguna WHERE email = '$email_pengguna'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query mengembalikan hasil
    if ($result && mysqli_num_rows($result) > 0) {
        // Ambil nama pengguna dan ID pengguna dari hasil query
        $row = mysqli_fetch_assoc($result);
        $nama_pengguna = $row['username_pengguna'];
        $id_pengguna = $row['id_pengguna'];

        // Simpan nama pengguna dan ID pengguna dalam sesi
        $_SESSION['nama_pengguna'] = $nama_pengguna;
        $_SESSION['id_pengguna'] = $id_pengguna;
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
.bus {
            width: 800px;
            background-color: #e0e0e0;
            border-radius: 20px;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            grid-gap: 10px;
        }
        .seat {
            background-color: #ccc;
            border: 1px solid #999;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }
        .seat.selected {
            background-color: #007bff;
            color: #fff;
        }
        .driver {
            background-color: #333;
            color: #fff;
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

/* Gaya untuk formulir */
form {
    margin-top: 20px;
    max-width: 400px;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
/* CSS untuk progress bar */
.form-steps__item.step-2 .form-steps__item-icon {
    background-color: #007bff; /* Warna biru untuk langkah pertama */
    color: #fff; /* Warna teks putih */
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

<section class="page-header page-header-dark bg-secondary mb-0" style="padding: 1.5rem;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1>Pengisian Data Penumpang</h1>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
                    <li><a href="home.html">Beranda <i></i></a></li>
                    <li><i class="active"></i> Pengisian Data Penumpang</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- ======= Page Header end -->



<!-- ======= Steps Progress bar =======-->
<nav class="form-steps">
    <div class="form-steps__item step-1">
        <div class="form-steps__item-content">
            <span class="form-steps__item-icon bg-primary">1</span>
            <span class="form-steps__item-text">Cari Tiket</span>
        </div>
    </div>
    <div class="form-steps__item step-2">
        <div class="form-steps__item-content">
            <span class="form-steps__item-icon">2</span>
            <span class="form-steps__item-line"></span>
            <span class="form-steps__item-text">Pengisian Data</span>
        </div>
    </div>
    <div class="form-steps__item step-3">
        <div class="form-steps__item-content">
            <span class="form-steps__item-icon">3</span>
            <span class="form-steps__item-line"></span>
            <span class="form-steps__item-text">Pembayaran</span>
        </div>
    </div>
    <div class="form-steps__item step-4">
        <div class="form-steps__item-content">
            <span class="form-steps__item-icon">4</span>
            <span class="form-steps__item-line"></span>
            <span class="form-steps__item-text">E-Tiket Terbit</span>
        </div>
    </div>
</nav>
<h2>Pilih Tempat Duduk</h2>
    <div class="bus" id="bus">
        <!-- Kursi disini akan di-generate menggunakan JavaScript -->
        <?php
// Ambil semua kursi yang tersedia
$available_seats = [];
for ($row = 1; $row <= 2; $row++) {
    for ($col = 1; $col <= 10; $col++) {
        $available_seats[] = ($row === 1 ? 'K' : 'A') . $col;
}

// Query untuk mendapatkan kursi-kursi yang sudah dipesan pada jadwal tiket bus tertentu
$id_jadwaltiketbus = $_GET['id'];
$query_kursi_dipesan = "SELECT kursi FROM datapenumpangbus WHERE id_jadwaltiketbus = $id_jadwaltiketbus";

// Eksekusi query
$result_kursi_dipesan = mysqli_query($conn, $query_kursi_dipesan);

// Periksa apakah query mengembalikan hasil
if ($result_kursi_dipesan && mysqli_num_rows($result_kursi_dipesan) > 0) {
    // Buat array untuk menyimpan kursi-kursi yang sudah dipesan
    $reserved_seats = [];
    while ($row_kursi_dipesan = mysqli_fetch_assoc($result_kursi_dipesan)) {
        $reserved_seats[] = $row_kursi_dipesan['kursi'];
    }

    // Hapus kursi yang sudah dipesan dari daftar kursi yang tersedia
    $available_seats = array_diff($available_seats, $reserved_seats);
}

// Tampilkan daftar kursi yang tersedia sebagai opsi pemesanan
foreach ($available_seats as $seat) {
    echo '<div class="seat">' . $seat . '</div>';
}}
?>


</div>


<section class="container">
    <h2>Formulir Pengisian Data Penumpang</h2>
    <form action="proses_pengisian_data.php" method="POST">
    <input type="hidden" id="selected-seat" name="selected_seat">
    <input type="hidden" id="id_jadwaltiketbus" name="id_jadwaltiketbus" value="<?php echo $_GET['id']; ?>">



        <label for="nama_lengkap">Nama Penumpang:</label><br>
        <input type="text" id="nama_lengkap" name="nama_lengkap" required><br><br>
        
        <label for="usia">Umur Penumpang:</label><br>
        <input type="number" id="usia" name="usia" required><br><br>
        
        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <input type="radio" id="tuan" name="jenis_kelamin" value="Tuan" required>
        <label for="tuan">Tuan</label>
        <input type="radio" id="nyonya" name="jenis_kelamin" value="Nyonya" required>
        <label for="nyonya">Nyonya</label><br><br>
        
        <label for="no_hp">No. HP:</label><br>
        <input type="text" id="no_hp" name="no_hp" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
    
</section>

<script>
        document.addEventListener('DOMContentLoaded', () => {
            const bus = document.getElementById('bus');
            const bookingForm = document.getElementById('booking-form');
            const selectedSeatInput = document.getElementById('selected-seat');
            let selectedSeat = '';

            // Ambil denah kursi dari database atau tentukan secara statis
            const seats = [];
            for (let row = 1; row <= 2; row++) {
                for (let col = 1; col <= 10; col++) {
                    seats.push((row === 1 ? 'K' : 'A') + col);
                }
            }

            // Buat kursi
            seats.forEach(seat => {
                const div = document.createElement('div');
                div.classList.add('seat');
                if (seat === 'K1') {
                    div.classList.add('driver');
                }
                div.textContent = seat;
                div.addEventListener('click', () => {
                    if (!div.classList.contains('selected')) {
                        // Hapus kelas 'selected' dari kursi sebelumnya
                        const prevSelectedSeat = document.querySelector('.selected');
                        if (prevSelectedSeat) {
                            prevSelectedSeat.classList.remove('selected');
                        }
                        // Tandai kursi yang dipilih
                        div.classList.add('selected');
                        selectedSeat = seat;
                        // Simpan kursi yang dipilih ke dalam input tersembunyi
                        selectedSeatInput.value = selectedSeat;
                    }
                });
                bus.appendChild(div);
            });

            // Submit form jika kursi telah dipilih
            bookingForm.addEventListener('submit', (event) => {
                if (!selectedSeat) {
                    event.preventDefault();
                    alert('Silakan pilih tempat duduk terlebih dahulu.');
                }
            });
        });
    </script>
    <!-- ======= Page Header end -->

</body>
</html>
