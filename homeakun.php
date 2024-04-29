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

// Tutup koneksi database
mysqli_close($conn);
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
        }

        html, body {
            margin: 0;
            padding: 0;
        }

        .tiketorderborder {
            display: flex;
            justify-content: center;
            margin-top: 80px;
        }

        .gambar-container {
            text-align: center;
            margin: 0 20px;
            cursor: pointer;
            display: inline-block;
        }

        .gambar-caption {
            margin-top: 10px;
            font-size: 18px;
        }

        /* Menampilkan atau menyembunyikan formulir pencarian */
        .search-form {
            display: none;
            align-items: center;
            margin-top: 10px;
            position: absolute;
           margin-left: 500px;
            z-index: 1;
            
        }

        /* Menampilkan formulir saat id sesuai dengan target */
        .search-form:target {
            display: block;
        }
        /* Styling untuk form */
.search-form form {
    margin-bottom: 20px;
}

/* Styling untuk label */
.search-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

/* Styling untuk select */
.search-form select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

/* Styling untuk tombol */
.search-form button {
    background-color: #4CAF50; /* Warna hijau */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Mengubah warna tombol saat disorot */
.search-form button:hover {
    background-color: #45a049; /* Warna hijau yang sedikit lebih gelap */
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
        echo '</ul>';
        echo '</li>';
    }
    echo '<li><a href="logout.php">Logout</a></li>';
} else {
    // Jika pengguna belum login, tampilkan tautan untuk login
    echo '<li><a href="login.php">Login</a></li>';
}
?>





        </ul>
    </nav>
</header>

<h1>Order Tiket Mudah Dari Mana Aja, Satu Set Tanpa Antri Dan Ribet</h1>
<div class="tiketorderborder">
    <div class="gambar-container">
        <a href="#kereta-form">
            <img src="https://sin1.contabostorage.com/0a986eb902c4469cb860e43985eb18a1:vocapanel/dkamondshop/trainonrailroad_89231-6e58-original.png" height="40px" width="40px">
            <div class="gambar-caption">Tiket Kereta</div>
        </a>
    </div>
    
    <div class="gambar-container">
        <a href="#pesawat-form">
            <img src="https://sin1.contabostorage.com/0a986eb902c4469cb860e43985eb18a1:vocapanel/dkamondshop/airplaneshape_119680-6657-original.png" height="40px" width="40px">
            <div class="gambar-caption">Tiket Pesawat</div>
        </a>
    </div>
    
    <div class="gambar-container">
        <a href="#bus-form">
            <img src="https://sin1.contabostorage.com/0a986eb902c4469cb860e43985eb18a1:vocapanel/dkamondshop/bus_transportatin_school_bus_travel_icon_194002-d1f5-original.png" height="40px" width="40px">
            <div class="gambar-caption">Tiket Bus</div>
        </a>
    </div>
    
    <div class="gambar-container">
        <a href="#kapal-form">
            <img src="https://sin1.contabostorage.com/0a986eb902c4469cb860e43985eb18a1:vocapanel/dkamondshop/cruiseshiptransportationlogistictravel_109809-7c90-original.png" height="40px" width="40px">
            <div class="gambar-caption">Tiket Kapal</div>
        </a>
    </div>
</div>

<div class="search-form" id="kereta-form">
    <form action="carikereta.php" method="POST">
        <label for="stasiun_keberangkatan">Stasiun Keberangkatan:</label>
    <select class="form-control" id="stasiun_keberangkatan" name="stasiun_keberangkatan" required>
        <!-- Pilihan stasiun keberangkatan -->
       
        <option value="Stasiun Gambir (GMR) - Jakarta">Stasiun Gambir (GMR) - Jakarta</option>
        <option value="Stasiun Pasar Senen (PSE) - Jakarta">Stasiun Pasar Senen (PSE) - Jakarta</option>
        <option value="Stasiun Bandung (BD) - Bandung">Stasiun Bandung (BD) - Bandung</option>
        <option value="Stasiun Surabaya Gubeng (SGU) - Surabaya">Stasiun Surabaya Gubeng (SGU) - Surabaya</option>
        <option value="Stasiun Semarang Tawang (SMT) - Semarang">Stasiun Semarang Tawang (SMT) - Semarang</option>
        <option value="Stasiun Yogyakarta Tugu (YK) - Yogyakarta">Stasiun Yogyakarta Tugu (YK) - Yogyakarta</option>
        <option value="Stasiun Malang (ML) - Malang">Stasiun Malang (ML) - Malang</option>
        <option value="Stasiun Solo Balapan (SLO) - Solo">Stasiun Solo Balapan (SLO) - Solo</option>
        <option value="Stasiun Medan (MDN) - Medan">Stasiun Medan (MDN) - Medan</option>
        <option value="Stasiun Palembang (PLB) - Palembang">Stasiun Palembang (PLB) - Palembang</option>
        <option value="Stasiun Cirebon (CN) - Cirebon">Stasiun Cirebon (CN) - Cirebon</option>
        <option value="Stasiun Surakarta (SR) - Surakarta">Stasiun Surakarta (SR) - Surakarta</option>
        <option value="Stasiun Pekalongan (PKG) - Pekalongan">Stasiun Pekalongan (PKG) - Pekalongan</option>
        <option value="Stasiun Jember (JBB) - Jember">Stasiun Jember (JBB) - Jember</option>
        <option value="Stasiun Kediri (KDI) - Kediri">Stasiun Kediri (KDI) - Kediri</option>
        <option value="Stasiun Probolinggo (PB) - Probolinggo">Stasiun Probolinggo (PB) - Probolinggo</option>
        <option value="Stasiun Madiun (MI) - Madiun">Stasiun Madiun (MI) - Madiun</option>
        <option value="Stasiun Kutoarjo (KTA) - Kutoarjo">Stasiun Kutoarjo (KTA) - Kutoarjo</option>
        <option value="Stasiun Tasikmalaya (TSM) - Tasikmalaya">Stasiun Tasikmalaya (TSM) - Tasikmalaya</option>
        <option value="Stasiun Purwokerto (PWT) - Purwokerto">Stasiun Purwokerto (PWT) - Purwokerto</option>
        <option value="Stasiun Cilacap (CIL) - Cilacap">Stasiun Cilacap (CIL) - Cilacap</option>
        <option value="Stasiun Pekanbaru (PKU) - Pekanbaru">Stasiun Pekanbaru (PKU) - Pekanbaru</option>
        <option value="Stasiun Jombang (JOB) - Jombang">Stasiun Jombang (JOB) - Jombang</option>
        <option value="Stasiun Kroya (KRY) - Kroya">Stasiun Kroya (KRY) - Kroya</option>
        <option value="Stasiun Tegal (TG) - Tegal">Stasiun Tegal (TG) - Tegal</option>
        <option value="Stasiun Bojonegoro (BJN) - Bojonegoro">Stasiun Bojonegoro (BJN) - Bojonegoro</option>
        <option value="Stasiun Jember Baru (JBB) - Jember">Stasiun Jember Baru (JBB) - Jember</option>
        <option value="Stasiun Padalarang (PDG) - Padalarang">Stasiun Padalarang (PDG) - Padalarang</option>
        <option value="Stasiun Karanganyar (KA) - Karanganyar">Stasiun Karanganyar (KA) - Karanganyar</option>
        <option value="Stasiun Cilacap (CIL) - Cilacap">Stasiun Cilacap (CIL) - Cilacap</option>
        <option value="Stasiun Padang (PD) - Padang">Stasiun Padang (PD) - Padang</option>
        <option value="Stasiun Batang (BTG) - Batang">Stasiun Batang (BTG) - Batang</option>
        <option value="Stasiun Blitar (BL) - Blitar">Stasiun Blitar (BL) - Blitar</option>
        <option value="Stasiun Rangkasbitung (RKS) - Rangkasbitung">Stasiun Rangkasbitung (RKS) - Rangkasbitung</option>
        <option value="Stasiun Kertosono (KS) - Kertosono">Stasiun Kertosono (KS) - Kertosono</option>
        <option value="Stasiun Magelang (MLG) - Magelang">Stasiun Magelang (MLG) - Magelang</option>
        <option value="Stasiun Banyuwangi Baru (BB) - Banyuwangi">Stasiun Banyuwangi Baru (BB) - Banyuwangi</option>
        <option value="Stasiun Pamekasan (PMK) - Pamekasan">Stasiun Pamekasan (PMK) - Pamekasan</option>
        <option value="Stasiun Bumiayu (BMU) - Bumiayu">Stasiun Bumiayu (BMU) - Bumiayu</option>
        <option value="Stasiun Klaten (KT) - Klaten">Stasiun Klaten (KT) - Klaten</option>
        <option value="Stasiun Kaliwungu (KAL) - Kaliwungu">Stasiun Kaliwungu (KAL) - Kaliwungu</option>
        <option value="Stasiun Martapura (MT) - Martapura">Stasiun Martapura (MT) - Martapura</option>
        <option value="Stasiun Banjar (BJ) - Banjar">Stasiun Banjar (BJ) - Banjar</option>
        <option value="Stasiun Indramayu (IMY) - Indramayu">Stasiun Indramayu (IMY) - Indramayu</option>
        <option value="Stasiun Rangkasbitung (RKS) - Rangkasbitung">Stasiun Rangkasbitung (RKS) - Rangkasbitung</option>
        <option value="Stasiun Prabumulih (PBM) - Prabumulih">Stasiun Prabumulih (PBM) - Prabumulih</option>
        <option value="Stasiun Lubuklinggau (LLG) - Lubuklinggau">Stasiun Lubuklinggau (LLG) - Lubuklinggau</option>
        <option value="Stasiun Lahat (LH) - Lahat">Stasiun Lahat (LH) - Lahat</option>
        <option value="Stasiun Baturaja (BTR) - Baturaja">Stasiun Baturaja (BTR) - Baturaja</option>
        <option value="Stasiun Muaraenim (MNM) - Muaraenim">Stasiun Muaraenim (MNM) - Muaraenim</option>
        <option value="Stasiun Pagaralam (PGL) - Pagaralam">Stasiun Pagaralam (PGL) - Pagaralam</option>
        <option value="Stasiun Curup (CRP) - Curup">Stasiun Curup (CRP) - Curup</option>
        <option value="Stasiun Tebingtinggi (TBG) - Tebingtinggi">Stasiun Tebingtinggi (TBG) - Tebingtinggi</option>
        <option value="Stasiun Rantau Prapat (RPP) - Rantau Prapat">Stasiun Rantau Prapat (RPP) - Rantau Prapat</option>
        <option value="Stasiun Siantar (SIA) - Siantar">Stasiun Siantar (SIA) - Siantar</option>
        <option value="Stasiun Kisaran (KIS) - Kisaran">Stasiun Kisaran (KIS) - Kisaran</option>
        <option value="Stasiun Tanjungbalai (TJB) - Tanjungbalai">Stasiun Tanjungbalai (TJB) - Tanjungbalai</option>
        <option value="Stasiun Bangkinang (BK) - Bangkinang">Stasiun Bangkinang (BK) - Bangkinang</option>
        <option value="Stasiun Dumai (DM) - Dumai">Stasiun Dumai (DM) - Dumai</option>
        <option value="Stasiun Muara Bulian (MB) - Muara Bulian">Stasiun Muara Bulian (MB) - Muara Bulian</option>
        <option value="Stasiun Kotabumi (KBI) - Kotabumi">Stasiun Kotabumi (KBI) - Kotabumi</option>
        <option value="Stasiun Prabumulih (PBM) - Prabumulih">Stasiun Prabumulih (PBM) - Prabumulih</option>
        <option value="Stasiun Tarahan (TRA) - Tarahan">Stasiun Tarahan (TRA) - Tarahan</option>
        <option value="Stasiun Pringsewu (PGW) - Pringsewu">Stasiun Pringsewu (PGW) - Pringsewu</option>
        <option value="Stasiun Kebumen (KBM) - Kebumen">Stasiun Kebumen (KBM) - Kebumen</option>
        <option value="Stasiun Banyumas (BM) - Banyumas">Stasiun Banyumas (BM) - Banyumas</option>
        <option value="Stasiun Kebumen (KBM) - Kebumen">Stasiun Kebumen (KBM) - Kebumen</option>
        <option value="Stasiun Purbalingga (PBG) - Purbalingga">Stasiun Purbalingga (PBG) - Purbalingga</option>
        <option value="Stasiun Banjar (BJR) - Banjar">Stasiun Banjar (BJR) - Banjar</option>
        <option value="Stasiun Karanganyar (KRG) - Karanganyar">Stasiun Karanganyar (KRG) - Karanganyar</option>
        <option value="Stasiun Sukoharjo (SKH) - Sukoharjo">Stasiun Sukoharjo (SKH) - Sukoharjo</option>
        <option value="Stasiun Ngawi (NW) - Ngawi">Stasiun Ngawi (NW) - Ngawi</option>
        <option value="Stasiun Sragen (SRAG) - Sragen">Stasiun Sragen (SRAG) - Sragen</option>
        <option value="Stasiun Tulungagung (TG) - Tulungagung">Stasiun Tulungagung (TG) - Tulungagung</option>
        <option value="Stasiun Nganjuk (NJ) - Nganjuk">Stasiun Nganjuk (NJ) - Nganjuk</option>
        <option value="Stasiun Kertosono (KS) - Kertosono">Stasiun Kertosono (KS) - Kertosono</option>
        <option value="Stasiun Trenggalek (TG) - Trenggalek">Stasiun Trenggalek (TG) - Trenggalek</option>
        <option value="Stasiun Madiun Kota Baru (MK) - Madiun Kota Baru">Stasiun Madiun Kota Baru (MK) - Madiun Kota Baru</option>
        <option value="Stasiun Magetan (MT) - Magetan">Stasiun Magetan (MT) - Magetan</option>
        <option value="Stasiun Sidoarjo (SDA) - Sidoarjo">Stasiun Sidoarjo (SDA) - Sidoarjo</option>
        <option value="Stasiun Porong (PRG) - Porong">Stasiun Porong (PRG) - Porong</option>
        <option value="Stasiun Lawang (LWG) - Lawang">Stasiun Lawang (LWG) - Lawang</option>
        <option value="Stasiun Mojokerto (MJ) - Mojokerto">Stasiun Mojokerto (MJ) - Mojokerto</option>
        <option value="Stasiun Lamongan (LN) - Lamongan">Stasiun Lamongan (LN) - Lamongan</option>
        <option value="Stasiun Tuban (TN) - Tuban">Stasiun Tuban (TN) - Tuban</option>
        <option value="Stasiun Bojonegoro (BJN) - Bojonegoro">Stasiun Bojonegoro (BJN) - Bojonegoro</option>
        <option value="Stasiun Ngawi (NW) - Ngawi">Stasiun Ngawi (NW) - Ngawi</option>
        <option value="Stasiun Kertosono (KS) - Kertosono">Stasiun Kertosono (KS) - Kertosono</option>
        <option value="Stasiun Blitar (BL) - Blitar">Stasiun Blitar (BL) - Blitar</option>
        <option value="Stasiun Pare (PRE) - Pare">Stasiun Pare (PRE) - Pare</option>
        <option value="Stasiun Kepanjen (KPJ) - Kepanjen">Stasiun Kepanjen (KPJ) - Kepanjen</option>
        <option value="Stasiun Tulungagung (TG) - Tulungagung">Stasiun Tulungagung (TG) - Tulungagung</option>
        <option value="Stasiun Ponorogo (PGO) - Ponorogo">Stasiun Ponorogo (PGO) - Ponorogo</option>
        <option value="Stasiun Pacitan (PTN) - Pacitan">Stasiun Pacitan (PTN) - Pacitan</option>
        <option value="Stasiun Trenggalek (TG) - Trenggalek">Stasiun Trenggalek (TG) - Trenggalek</option>
        <option value="Stasiun Prambanan (PR) - Prambanan">Stasiun Prambanan (PR) - Prambanan</option>
        <option value="Stasiun Wates (WTS) - Wates">Stasiun Wates (WTS) - Wates</option>
        <option value="Stasiun Kutoarjo (KTA) - Kutoarjo">Stasiun Kutoarjo (KTA) - Kutoarjo</option>
        <option value="Stasiun Purworejo (PWJ) - Purworejo">Stasiun Purworejo (PWJ) - Purworejo</option>
        <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
    </select>
        
    <label for="stasiun_kedatangan">Stasiun Kedatangan:</label>
    <select class="form-control" id="stasiun_kedatangan" name="stasiun_kedatangan" required>
        <!-- Pilihan bandara kedatangan -->
        <option value="Stasiun Gambir (GMR) - Jakarta">Stasiun Gambir (GMR) - Jakarta</option>
    <option value="Stasiun Pasar Senen (PSE) - Jakarta">Stasiun Pasar Senen (PSE) - Jakarta</option>
    <option value="Stasiun Bandung (BD) - Bandung">Stasiun Bandung (BD) - Bandung</option>
    <option value="Stasiun Surabaya Gubeng (SGU) - Surabaya">Stasiun Surabaya Gubeng (SGU) - Surabaya</option>
    <option value="Stasiun Semarang Tawang (SMT) - Semarang">Stasiun Semarang Tawang (SMT) - Semarang</option>
    <option value="Stasiun Yogyakarta Tugu (YK) - Yogyakarta">Stasiun Yogyakarta Tugu (YK) - Yogyakarta</option>
    <option value="Stasiun Malang (ML) - Malang">Stasiun Malang (ML) - Malang</option>
    <option value="Stasiun Solo Balapan (SLO) - Solo">Stasiun Solo Balapan (SLO) - Solo</option>
    <option value="Stasiun Medan (MDN) - Medan">Stasiun Medan (MDN) - Medan</option>
    <option value="Stasiun Palembang (PLB) - Palembang">Stasiun Palembang (PLB) - Palembang</option>
    <option value="Stasiun Cirebon (CN) - Cirebon">Stasiun Cirebon (CN) - Cirebon</option>
    <option value="Stasiun Surakarta (SR) - Surakarta">Stasiun Surakarta (SR) - Surakarta</option>
    <option value="Stasiun Pekalongan (PKG) - Pekalongan">Stasiun Pekalongan (PKG) - Pekalongan</option>
    <option value="Stasiun Jember (JBB) - Jember">Stasiun Jember (JBB) - Jember</option>
    <option value="Stasiun Kediri (KDI) - Kediri">Stasiun Kediri (KDI) - Kediri</option>
    <option value="Stasiun Probolinggo (PB) - Probolinggo">Stasiun Probolinggo (PB) - Probolinggo</option>
    <option value="Stasiun Madiun (MI) - Madiun">Stasiun Madiun (MI) - Madiun</option>
    <option value="Stasiun Kutoarjo (KTA) - Kutoarjo">Stasiun Kutoarjo (KTA) - Kutoarjo</option>
    <option value="Stasiun Tasikmalaya (TSM) - Tasikmalaya">Stasiun Tasikmalaya (TSM) - Tasikmalaya</option>
    <option value="Stasiun Purwokerto (PWT) - Purwokerto">Stasiun Purwokerto (PWT) - Purwokerto</option>
    <option value="Stasiun Cilacap (CIL) - Cilacap">Stasiun Cilacap (CIL) - Cilacap</option>
    <option value="Stasiun Pekanbaru (PKU) - Pekanbaru">Stasiun Pekanbaru (PKU) - Pekanbaru</option>
    <option value="Stasiun Jombang (JOB) - Jombang">Stasiun Jombang (JOB) - Jombang</option>
    <option value="Stasiun Kroya (KRY) - Kroya">Stasiun Kroya (KRY) - Kroya</option>
    <option value="Stasiun Tegal (TG) - Tegal">Stasiun Tegal (TG) - Tegal</option>
    <option value="Stasiun Bojonegoro (BJN) - Bojonegoro">Stasiun Bojonegoro (BJN) - Bojonegoro</option>
    <option value="Stasiun Jember Baru (JBB) - Jember">Stasiun Jember Baru (JBB) - Jember</option>
    <option value="Stasiun Padalarang (PDG) - Padalarang">Stasiun Padalarang (PDG) - Padalarang</option>
    <option value="Stasiun Karanganyar (KA) - Karanganyar">Stasiun Karanganyar (KA) - Karanganyar</option>
    <option value="Stasiun Cilacap (CIL) - Cilacap">Stasiun Cilacap (CIL) - Cilacap</option>
    <option value="Stasiun Padang (PD) - Padang">Stasiun Padang (PD) - Padang</option>
    <option value="Stasiun Batang (BTG) - Batang">Stasiun Batang (BTG) - Batang</option>
    <option value="Stasiun Blitar (BL) - Blitar">Stasiun Blitar (BL) - Blitar</option>
    <option value="Stasiun Rangkasbitung (RKS) - Rangkasbitung">Stasiun Rangkasbitung (RKS) - Rangkasbitung</option>
    <option value="Stasiun Kertosono (KS) - Kertosono">Stasiun Kertosono (KS) - Kertosono</option>
    <option value="Stasiun Magelang (MLG) - Magelang">Stasiun Magelang (MLG) - Magelang</option>
    <option value="Stasiun Banyuwangi Baru (BB) - Banyuwangi">Stasiun Banyuwangi Baru (BB) - Banyuwangi</option>
    <option value="Stasiun Pamekasan (PMK) - Pamekasan">Stasiun Pamekasan (PMK) - Pamekasan</option>
    <option value="Stasiun Bumiayu (BMU) - Bumiayu">Stasiun Bumiayu (BMU) - Bumiayu</option>
    <option value="Stasiun Klaten (KT) - Klaten">Stasiun Klaten (KT) - Klaten</option>
    <option value="Stasiun Kaliwungu (KAL) - Kaliwungu">Stasiun Kaliwungu (KAL) - Kaliwungu</option>
    <option value="Stasiun Martapura (MT) - Martapura">Stasiun Martapura (MT) - Martapura</option>
    <option value="Stasiun Banjar (BJ) - Banjar">Stasiun Banjar (BJ) - Banjar</option>
    <option value="Stasiun Indramayu (IMY) - Indramayu">Stasiun Indramayu (IMY) - Indramayu</option>
    <option value="Stasiun Rangkasbitung (RKS) - Rangkasbitung">Stasiun Rangkasbitung (RKS) - Rangkasbitung</option>
    <option value="Stasiun Prabumulih (PBM) - Prabumulih">Stasiun Prabumulih (PBM) - Prabumulih</option>
    <option value="Stasiun Lubuklinggau (LLG) - Lubuklinggau">Stasiun Lubuklinggau (LLG) - Lubuklinggau</option>
    <option value="Stasiun Lahat (LH) - Lahat">Stasiun Lahat (LH) - Lahat</option>
    <option value="Stasiun Baturaja (BTR) - Baturaja">Stasiun Baturaja (BTR) - Baturaja</option>
    <option value="Stasiun Muaraenim (MNM) - Muaraenim">Stasiun Muaraenim (MNM) - Muaraenim</option>
    <option value="Stasiun Pagaralam (PGL) - Pagaralam">Stasiun Pagaralam (PGL) - Pagaralam</option>
    <option value="Stasiun Curup (CRP) - Curup">Stasiun Curup (CRP) - Curup</option>
    <option value="Stasiun Tebingtinggi (TBG) - Tebingtinggi">Stasiun Tebingtinggi (TBG) - Tebingtinggi</option>
    <option value="Stasiun Rantau Prapat (RPP) - Rantau Prapat">Stasiun Rantau Prapat (RPP) - Rantau Prapat</option>
    <option value="Stasiun Siantar (SIA) - Siantar">Stasiun Siantar (SIA) - Siantar</option>
    <option value="Stasiun Kisaran (KIS) - Kisaran">Stasiun Kisaran (KIS) - Kisaran</option>
    <option value="Stasiun Tanjungbalai (TJB) - Tanjungbalai">Stasiun Tanjungbalai (TJB) - Tanjungbalai</option>
    <option value="Stasiun Bangkinang (BK) - Bangkinang">Stasiun Bangkinang (BK) - Bangkinang</option>
    <option value="Stasiun Dumai (DM) - Dumai">Stasiun Dumai (DM) - Dumai</option>
    <option value="Stasiun Muara Bulian (MB) - Muara Bulian">Stasiun Muara Bulian (MB) - Muara Bulian</option>
    <option value="Stasiun Kotabumi (KBI) - Kotabumi">Stasiun Kotabumi (KBI) - Kotabumi</option>
    <option value="Stasiun Prabumulih (PBM) - Prabumulih">Stasiun Prabumulih (PBM) - Prabumulih</option>
    <option value="Stasiun Tarahan (TRA) - Tarahan">Stasiun Tarahan (TRA) - Tarahan</option>
    <option value="Stasiun Pringsewu (PGW) - Pringsewu">Stasiun Pringsewu (PGW) - Pringsewu</option>
    <option value="Stasiun Kebumen (KBM) - Kebumen">Stasiun Kebumen (KBM) - Kebumen</option>
    <option value="Stasiun Banyumas (BM) - Banyumas">Stasiun Banyumas (BM) - Banyumas</option>
    <option value="Stasiun Kebumen (KBM) - Kebumen">Stasiun Kebumen (KBM) - Kebumen</option>
    <option value="Stasiun Purbalingga (PBG) - Purbalingga">Stasiun Purbalingga (PBG) - Purbalingga</option>
    <option value="Stasiun Banjar (BJR) - Banjar">Stasiun Banjar (BJR) - Banjar</option>
    <option value="Stasiun Karanganyar (KRG) - Karanganyar">Stasiun Karanganyar (KRG) - Karanganyar</option>
    <option value="Stasiun Sukoharjo (SKH) - Sukoharjo">Stasiun Sukoharjo (SKH) - Sukoharjo</option>
    <option value="Stasiun Ngawi (NW) - Ngawi">Stasiun Ngawi (NW) - Ngawi</option>
    <option value="Stasiun Sragen (SRAG) - Sragen">Stasiun Sragen (SRAG) - Sragen</option>
    <option value="Stasiun Tulungagung (TG) - Tulungagung">Stasiun Tulungagung (TG) - Tulungagung</option>
    <option value="Stasiun Nganjuk (NJ) - Nganjuk">Stasiun Nganjuk (NJ) - Nganjuk</option>
    <option value="Stasiun Kertosono (KS) - Kertosono">Stasiun Kertosono (KS) - Kertosono</option>
    <option value="Stasiun Trenggalek (TG) - Trenggalek">Stasiun Trenggalek (TG) - Trenggalek</option>
    <option value="Stasiun Madiun Kota Baru (MK) - Madiun Kota Baru">Stasiun Madiun Kota Baru (MK) - Madiun Kota Baru</option>
    <option value="Stasiun Magetan (MT) - Magetan">Stasiun Magetan (MT) - Magetan</option>
    <option value="Stasiun Sidoarjo (SDA) - Sidoarjo">Stasiun Sidoarjo (SDA) - Sidoarjo</option>
    <option value="Stasiun Porong (PRG) - Porong">Stasiun Porong (PRG) - Porong</option>
    <option value="Stasiun Lawang (LWG) - Lawang">Stasiun Lawang (LWG) - Lawang</option>
    <option value="Stasiun Mojokerto (MJ) - Mojokerto">Stasiun Mojokerto (MJ) - Mojokerto</option>
    <option value="Stasiun Lamongan (LN) - Lamongan">Stasiun Lamongan (LN) - Lamongan</option>
    <option value="Stasiun Tuban (TN) - Tuban">Stasiun Tuban (TN) - Tuban</option>
    <option value="Stasiun Bojonegoro (BJN) - Bojonegoro">Stasiun Bojonegoro (BJN) - Bojonegoro</option>
    <option value="Stasiun Ngawi (NW) - Ngawi">Stasiun Ngawi (NW) - Ngawi</option>
    <option value="Stasiun Kertosono (KS) - Kertosono">Stasiun Kertosono (KS) - Kertosono</option>
    <option value="Stasiun Blitar (BL) - Blitar">Stasiun Blitar (BL) - Blitar</option>
    <option value="Stasiun Pare (PRE) - Pare">Stasiun Pare (PRE) - Pare</option>
    <option value="Stasiun Kepanjen (KPJ) - Kepanjen">Stasiun Kepanjen (KPJ) - Kepanjen</option>
    <option value="Stasiun Tulungagung (TG) - Tulungagung">Stasiun Tulungagung (TG) - Tulungagung</option>
    <option value="Stasiun Ponorogo (PGO) - Ponorogo">Stasiun Ponorogo (PGO) - Ponorogo</option>
    <option value="Stasiun Pacitan (PTN) - Pacitan">Stasiun Pacitan (PTN) - Pacitan</option>
    <option value="Stasiun Trenggalek (TG) - Trenggalek">Stasiun Trenggalek (TG) - Trenggalek</option>
    <option value="Stasiun Prambanan (PR) - Prambanan">Stasiun Prambanan (PR) - Prambanan</option>
    <option value="Stasiun Wates (WTS) - Wates">Stasiun Wates (WTS) - Wates</option>
    <option value="Stasiun Kutoarjo (KTA) - Kutoarjo">Stasiun Kutoarjo (KTA) - Kutoarjo</option>
    <option value="Stasiun Purworejo (PWJ) - Purworejo">Stasiun Purworejo (PWJ) - Purworejo</option>
    </select>
        
        <label for="date">Tanggal Keberangkatan:</label>
        <input type="date" id="date" name="date" required><br><br>
        
        <button type="submit">Cari Tiket</button>
    </form>
</div>

<div class="search-form" id="pesawat-form">
    <form action="caripesawat.php" method="POST">
        <label for="bandara_keberangkatan">Bandara Keberangkatan:</label>
        <select class="form-control" id="bandara_keberangkatan" name="bandara_keberangkatan" required>
            <!-- Pilihan bandara keberangkatan -->
            <option >Pilih Bandara Keberangkatan</option>
            <option value="Bandara Internasional Soekarno-Hatta (CGK) - Jakarta">Bandara Internasional Soekarno-Hatta (CGK) - Jakarta</option>
<option value="Bandara Internasional Ngurah Rai (DPS) - Denpasar, Bali">Bandara Internasional Ngurah Rai (DPS) - Denpasar, Bali</option>
<option value="Bandara Internasional Juanda (SUB) - Surabaya">Bandara Internasional Juanda (SUB) - Surabaya</option>
<option value="Bandara Internasional Sultan Hasanuddin (UPG) - Makassar">Bandara Internasional Sultan Hasanuddin (UPG) - Makassar</option>
<option value="Bandara Internasional Adisutjipto (JOG) - Yogyakarta">Bandara Internasional Adisutjipto (JOG) - Yogyakarta</option>
<option value="Bandara Internasional Adi Soemarmo (SOC) - Solo">Bandara Internasional Adi Soemarmo (SOC) - Solo</option>
<option value="Bandara Internasional Kualanamu (KNO) - Medan">Bandara Internasional Kualanamu (KNO) - Medan</option>
<option value="Bandara Internasional Sultan Mahmud Badaruddin II (PLM) - Palembang">Bandara Internasional Sultan Mahmud Badaruddin II (PLM) - Palembang</option>
<option value="Bandara Internasional Lombok Praya (LOP) - Lombok">Bandara Internasional Lombok Praya (LOP) - Lombok</option>
<option value="Bandara Internasional Minangkabau (PDG) - Padang">Bandara Internasional Minangkabau (PDG) - Padang</option>
<option value="Bandara Internasional Husein Sastranegara (BDO) - Bandung">Bandara Internasional Husein Sastranegara (BDO) - Bandung</option>
<option value="Bandara Internasional Syamsudin Noor (BDJ) - Banjarmasin">Bandara Internasional Syamsudin Noor (BDJ) - Banjarmasin</option>
<option value="Bandara Internasional El Tari (KOE) - Kupang">Bandara Internasional El Tari (KOE) - Kupang</option>
<option value="Bandara Internasional Ahmad Yani (SRG) - Semarang">Bandara Internasional Ahmad Yani (SRG) - Semarang</option>
<option value="Bandara Internasional Sepinggan (BPN) - Balikpapan">Bandara Internasional Sepinggan (BPN) - Balikpapan</option>
<option value="Bandara Internasional Supadio (PNK) - Pontianak">Bandara Internasional Supadio (PNK) - Pontianak</option>
<option value="Bandara Internasional Sultan Aji Muhammad Sulaiman (BTH) - Batam">Bandara Internasional Sultan Aji Muhammad Sulaiman (BTH) - Batam</option>
<option value="Bandara Internasional Sam Ratulangi (MDC) - Manado">Bandara Internasional Sam Ratulangi (MDC) - Manado</option>
<option value="Bandara Internasional Halim Perdanakusuma (HLP) - Jakarta">Bandara Internasional Halim Perdanakusuma (HLP) - Jakarta</option>
<option value="Bandara Internasional Silangit (DTB) - Silangit">Bandara Internasional Silangit (DTB) - Silangit</option>
<option value="Bandara Internasional Fatmawati Soekarno (BKS) - Bengkulu">Bandara Internasional Fatmawati Soekarno (BKS) - Bengkulu</option>
<option value="Bandara Internasional Frans Kaisiepo (BIK) - Biak">Bandara Internasional Frans Kaisiepo (BIK) - Biak</option>
<option value="Bandara Internasional Radin Inten II (TKG) - Lampung">Bandara Internasional Radin Inten II (TKG) - Lampung</option>
<option value="Bandara Internasional Pattimura (AMQ) - Ambon">Bandara Internasional Pattimura (AMQ) - Ambon</option>
<option value="Bandara Internasional Sentani (DJJ) - Jayapura">Bandara Internasional Sentani (DJJ) - Jayapura</option>
<option value="Bandara Internasional H.A.S Hanandjoeddin (TJQ) - Tanjung Pandan">Bandara Internasional H.A.S Hanandjoeddin (TJQ) - Tanjung Pandan</option>
<option value="Bandara Internasional Sultan Thaha (DJB) - Jambi">Bandara Internasional Sultan Thaha (DJB) - Jambi</option>
<option value="Bandara Internasional Sultan Iskandar Muda (BTJ) - Banda Aceh">Bandara Internasional Sultan Iskandar Muda (BTJ) - Banda Aceh</option>
<option value="Bandara Internasional Blimbingsari (BWX) - Banyuwangi">Bandara Internasional Blimbingsari (BWX) - Banyuwangi</option>
<option value="Bandara Internasional Sultan Babullah (TTE) - Ternate">Bandara Internasional Sultan Babullah (TTE) - Ternate</option>
<option value="Bandara Internasional Tjilik Riwut (PLW) - Palu">Bandara Internasional Tjilik Riwut (PLW) - Palu</option>
<option value="Bandara Internasional Maimun Saleh (SBG) - Sabang">Bandara Internasional Maimun Saleh (SBG) - Sabang</option>
<option value="Bandara Internasional Matahora (WKB) - Waikabubak">Bandara Internasional Matahora (WKB) - Waikabubak</option>
<option value="Bandara Internasional Jalaluddin (GTO) - Gorontalo">Bandara Internasional Jalaluddin (GTO) - Gorontalo</option>
<option value="Bandara Internasional Selaparang (AMI) - Mataram">Bandara Internasional Selaparang (AMI) - Mataram</option>
<option value="Bandara Internasional Bukit Siguntang (PGK) - Pangkal Pinang">Bandara Internasional Bukit Siguntang (PGK) - Pangkal Pinang</option>
<option value="Bandara Internasional Hasa Hasa (BUI) - Buli">Bandara Internasional Hasa Hasa (BUI) - Buli</option>
<option value="Bandara Internasional Raja Haji Fisabilillah (TNJ) - Tanjung Pinang">Bandara Internasional Raja Haji Fisabilillah (TNJ) - Tanjung Pinang</option>
<option value="Bandara Internasional Letkol Wisnu (TMC) - Tembagapura">Bandara Internasional Letkol Wisnu (TMC) - Tembagapura</option>
<option value="Bandara Internasional Dominique Edward Osok (SOQ) - Sorong">Bandara Internasional Dominique Edward Osok (SOQ) - Sorong</option>
<option value="Bandara Internasional Syukuran Aminuddin Amir (LUW) - Luwuk">Bandara Internasional Syukuran Aminuddin Amir (LUW) - Luwuk</option>
<option value="Bandara Internasional Jatitujuh (KJT) - Majalengka">Bandara Internasional Jatitujuh (KJT) - Majalengka</option>
<option value="Bandara Internasional Lembuswana (LLJ) - Belitung">Bandara Internasional Lembuswana (LLJ) - Belitung</option>
<option value="Bandara Internasional Umbu Mehang Kunda (WGP) - Waingapu">Bandara Internasional Umbu Mehang Kunda (WGP) - Waingapu</option>
<option value="Bandara Internasional Tjilik Riwut (PKY) - Palangkaraya">Bandara Internasional Tjilik Riwut (PKY) - Palangkaraya</option>
<option value="Bandara Internasional RADJABAGUSWIDJAJA (KTG) - Ketapang">Bandara Internasional RADJABAGUSWIDJAJA (KTG) - Ketapang</option>
<option value="Bandara Internasional Tembagapura (SRI) - Tembagapura">Bandara Internasional Tembagapura (SRI) - Tembagapura</option>
<option value="Bandara Internasional El Tari (NAH) - Naha">Bandara Internasional El Tari (NAH) - Naha</option>
<option value="Bandara Internasional Bontang (BXT) - Bontang">Bandara Internasional Bontang (BXT) - Bontang</option>
<option value="Bandara Internasional Wai Oti (PSU) - Putussibau">Bandara Internasional Wai Oti (PSU) - Putussibau</option>
<option value="Bandara Internasional Lepo-Lepo (MAL) - Mangole">Bandara Internasional Lepo-Lepo (MAL) - Mangole</option>
<option value="Bandara Internasional Sultan Aji Muhamad Sulaiman (BUW) - Bau Bau">Bandara Internasional Sultan Aji Muhamad Sulaiman (BUW) - Bau Bau</option>
<option value="Bandara Internasional Sultan Babullah (SQR) - Soroako">Bandara Internasional Sultan Babullah (SQR) - Soroako</option>
<option value="Bandara Internasional Raden Sadjad (KTG) - Ketapang">Bandara Internasional Raden Sadjad (KTG) - Ketapang</option>
<option value="Bandara Internasional Umbu Mehang Kunda (WGP) - Waingapu">Bandara Internasional Umbu Mehang Kunda (WGP) - Waingapu</option>
<option value="Bandara Internasional Tjilik Riwut (PKY) - Palangkaraya">Bandara Internasional Tjilik Riwut (PKY) - Palangkaraya</option>
<option value="Bandara Internasional Tembagapura (SRI) - Tembagapura">Bandara Internasional Tembagapura (SRI) - Tembagapura</option>
<option value="Bandara Internasional El Tari (NAH) - Naha">Bandara Internasional El Tari (NAH) - Naha</option>
<option value="Bandara Internasional Bontang (BXT) - Bontang">Bandara Internasional Bontang (BXT) - Bontang</option>
<option value="Bandara Internasional Wai Oti (PSU) - Putussibau">Bandara Internasional Wai Oti (PSU) - Putussibau</option>
<option value="Bandara Internasional Lepo-Lepo (MAL) - Mangole">Bandara Internasional Lepo-Lepo (MAL) - Mangole</option>
<option value="Bandara Internasional Sultan Aji Muhamad Sulaiman (BUW) - Bau Bau">Bandara Internasional Sultan Aji Muhamad Sulaiman (BUW) - Bau Bau</option>
<option value="Bandara Internasional Sultan Babullah (SQR) - Soroako">Bandara Internasional Sultan Babullah (SQR) - Soroako</option>
<option value="Bandara Internasional Raden Sadjad (KTG) - Ketapang">Bandara Internasional Raden Sadjad (KTG) - Ketapang</option>
<option value="Bandara Internasional Changi (SIN) - Singapura">Bandara Internasional Changi (SIN) - Singapura</option>
<option value="Bandara Internasional Kuala Lumpur (KUL) - Malaysia">Bandara Internasional Kuala Lumpur (KUL) - Malaysia</option>
<option value="Bandara Internasional Suvarnabhumi (BKK) - Bangkok, Thailand">Bandara Internasional Suvarnabhumi (BKK) - Bangkok, Thailand</option>
<option value="Bandara Internasional Hong Kong (HKG) - Hong Kong">Bandara Internasional Hong Kong (HKG) - Hong Kong</option>
<option value="Bandara Internasional Beijing Capital (PEK) - Beijing, China">Bandara Internasional Beijing Capital (PEK) - Beijing, China</option>
<option value="Bandara Internasional Incheon (ICN) - Seoul, Korea Selatan">Bandara Internasional Incheon (ICN) - Seoul, Korea Selatan</option>
<option value="Bandara Internasional Narita (NRT) - Tokyo, Jepang">Bandara Internasional Narita (NRT) - Tokyo, Jepang</option>
<option value="Bandara Internasional Dubai (DXB) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai (DXB) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Heathrow (LHR) - London, Inggris">Bandara Internasional Heathrow (LHR) - London, Inggris</option>
<option value="Bandara Internasional John F. Kennedy (JFK) - New York City, Amerika Serikat">Bandara Internasional John F. Kennedy (JFK) - New York City, Amerika Serikat</option>
<option value="Bandara Internasional Charles de Gaulle (CDG) - Paris, Prancis">Bandara Internasional Charles de Gaulle (CDG) - Paris, Prancis</option>
<option value="Bandara Internasional Frankfurt (FRA) - Frankfurt, Jerman">Bandara Internasional Frankfurt (FRA) - Frankfurt, Jerman</option>
<option value="Bandara Internasional Los Angeles (LAX) - Los Angeles, Amerika Serikat">Bandara Internasional Los Angeles (LAX) - Los Angeles, Amerika Serikat</option>
<option value="Bandara Internasional Barajas (MAD) - Madrid, Spanyol">Bandara Internasional Barajas (MAD) - Madrid, Spanyol</option>
<option value="Bandara Internasional Leonardo da Vinci (FCO) - Roma, Italia">Bandara Internasional Leonardo da Vinci (FCO) - Roma, Italia</option>
<option value="Bandara Internasional O'Hare (ORD) - Chicago, Amerika Serikat">Bandara Internasional O'Hare (ORD) - Chicago, Amerika Serikat</option>
<option value="Bandara Internasional Denver (DEN) - Denver, Amerika Serikat">Bandara Internasional Denver (DEN) - Denver, Amerika Serikat</option>
<option value="Bandara Internasional Dubai World Central (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai World Central (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Abu Dhabi (AUH) - Abu Dhabi, Uni Emirat Arab">Bandara Internasional Abu Dhabi (AUH) - Abu Dhabi, Uni Emirat Arab</option>
<option value="Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi">Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi</option>
<option value="Bandara Internasional King Fahd (DMM) - Dammam, Arab Saudi">Bandara Internasional King Fahd (DMM) - Dammam, Arab Saudi</option>
<option value="Bandara Internasional Prince Mohammad bin Abdulaziz (MED) - Madinah, Arab Saudi">Bandara Internasional Prince Mohammad bin Abdulaziz (MED) - Madinah, Arab Saudi</option>
<option value="Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Imam Khomeini (IKA) - Tehran, Iran">Bandara Internasional Imam Khomeini (IKA) - Tehran, Iran</option>
<option value="Bandara Internasional Hamad (DOH) - Doha, Qatar">Bandara Internasional Hamad (DOH) - Doha, Qatar</option>
<option value="Bandara Internasional Istanbul (IST) - Istanbul, Turki">Bandara Internasional Istanbul (IST) - Istanbul, Turki</option>
<option value="Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko">Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko</option>
<option value="Bandara Internasional Dubai Creek (DCG) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Creek (DCG) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Dallas/Fort Worth (DFW) - Dallas/Fort Worth, Amerika Serikat">Bandara Internasional Dallas/Fort Worth (DFW) - Dallas/Fort Worth, Amerika Serikat</option>
<option value="Bandara Internasional Dubai Creek (DCG) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Creek (DCG) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Orlando (MCO) - Orlando, Amerika Serikat">Bandara Internasional Orlando (MCO) - Orlando, Amerika Serikat</option>
<option value="Bandara Internasional Ninoy Aquino (MNL) - Manila, Filipina">Bandara Internasional Ninoy Aquino (MNL) - Manila, Filipina</option>
<option value="Bandara Internasional Indira Gandhi (DEL) - Delhi, India">Bandara Internasional Indira Gandhi (DEL) - Delhi, India</option>
<option value="Bandara Internasional Chhatrapati Shivaji (BOM) - Mumbai, India">Bandara Internasional Chhatrapati Shivaji (BOM) - Mumbai, India</option>
<option value="Bandara Internasional Kempegowda (BLR) - Bengaluru, India">Bandara Internasional Kempegowda (BLR) - Bengaluru, India</option>
<option value="Bandara Internasional Rajiv Gandhi (HYD) - Hyderabad, India">Bandara Internasional Rajiv Gandhi (HYD) - Hyderabad, India</option>
<option value="Bandara Internasional Chennai (MAA) - Chennai, India">Bandara Internasional Chennai (MAA) - Chennai, India</option>
<option value="Bandara Internasional Netaji Subhas Chandra Bose (CCU) - Kolkata, India">Bandara Internasional Netaji Subhas Chandra Bose (CCU) - Kolkata, India</option>
<option value="Bandara Internasional Chaudhary Charan Singh (LKO) - Lucknow, India">Bandara Internasional Chaudhary Charan Singh (LKO) - Lucknow, India</option>
<option value="Bandara Internasional Jaipur (JAI) - Jaipur, India">Bandara Internasional Jaipur (JAI) - Jaipur, India</option>
<option value="Bandara Internasional Sardar Vallabhbhai Patel (AMD) - Ahmedabad, India">Bandara Internasional Sardar Vallabhbhai Patel (AMD) - Ahmedabad, India</option>
<option value="Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Bandaranaike (CMB) - Colombo, Sri Lanka">Bandara Internasional Bandaranaike (CMB) - Colombo, Sri Lanka</option>
<option value="Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi">Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi</option>
<option value="Bandara Internasional King Khalid (RUH) - Riyadh, Arab Saudi">Bandara Internasional King Khalid (RUH) - Riyadh, Arab Saudi</option>
<option value="Bandara Internasional Prince Mohammad bin Abdulaziz (MED) - Madinah, Arab Saudi">Bandara Internasional Prince Mohammad bin Abdulaziz (MED) - Madinah, Arab Saudi</option>
<option value="Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko">Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko</option>
<option value="Bandara Internasional Cairo (CAI) - Cairo, Mesir">Bandara Internasional Cairo (CAI) - Cairo, Mesir</option>
<option value="Bandara Internasional Hamad (DOH) - Doha, Qatar">Bandara Internasional Hamad (DOH) - Doha, Qatar</option>
<option value="Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Hamad (DOH) - Doha, Qatar">Bandara Internasional Hamad (DOH) - Doha, Qatar</option>
<option value="Bandara Internasional Istanbul (IST) - Istanbul, Turki">Bandara Internasional Istanbul (IST) - Istanbul, Turki</option>
<option value="Bandara Internasional Muscat (MCT) - Muscat, Oman">Bandara Internasional Muscat (MCT) - Muscat, Oman</option>
<option value="Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko">Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko</option>
<option value="Bandara Internasional Cairo (CAI) - Cairo, Mesir">Bandara Internasional Cairo (CAI) - Cairo, Mesir</option>
<option value="Bandara Internasional Hamad (DOH) - Doha, Qatar">Bandara Internasional Hamad (DOH) - Doha, Qatar</option>
<option value="Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Hamad (DOH) - Doha, Qatar">Bandara Internasional Hamad (DOH) - Doha, Qatar</option>
<option value="Bandara Internasional Istanbul (IST) - Istanbul, Turki">Bandara Internasional Istanbul (IST) - Istanbul, Turki</option>
<option value="Bandara Internasional Muscat (MCT) - Muscat, Oman">Bandara Internasional Muscat (MCT) - Muscat, Oman</option>
<option value="Bandara Internasional Eleftherios Venizelos (ATH) - Athena, Yunani">Bandara Internasional Eleftherios Venizelos (ATH) - Athena, Yunani</option>
<option value="Bandara Internasional Dublin (DUB) - Dublin, Irlandia">Bandara Internasional Dublin (DUB) - Dublin, Irlandia</option>
<option value="Bandara Internasional Sydney (SYD) - Sydney, Australia">Bandara Internasional Sydney (SYD) - Sydney, Australia</option>
<option value="Bandara Internasional Auckland (AKL) - Auckland, Selandia Baru">Bandara Internasional Auckland (AKL) - Auckland, Selandia Baru</option>
<option value="Bandara Internasional Hong Kong (HKG) - Hong Kong">Bandara Internasional Hong Kong (HKG) - Hong Kong</option>
<option value="Bandara Internasional Incheon (ICN) - Seoul, Korea Selatan">Bandara Internasional Incheon (ICN) - Seoul, Korea Selatan</option>
<option value="Bandara Internasional Narita (NRT) - Tokyo, Jepang">Bandara Internasional Narita (NRT) - Tokyo, Jepang</option>
<option value="Bandara Internasional Dubai (DXB) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai (DXB) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Heathrow (LHR) - London, Inggris">Bandara Internasional Heathrow (LHR) - London, Inggris</option>
<option value="Bandara Internasional John F. Kennedy (JFK) - New York City, Amerika Serikat">Bandara Internasional John F. Kennedy (JFK) - New York City, Amerika Serikat</option>
<option value="Bandara Internasional Charles de Gaulle (CDG) - Paris, Prancis">Bandara Internasional Charles de Gaulle (CDG) - Paris, Prancis</option>
<option value="Bandara Internasional Frankfurt (FRA) - Frankfurt, Jerman">Bandara Internasional Frankfurt (FRA) - Frankfurt, Jerman</option>
<option value="Bandara Internasional Los Angeles (LAX) - Los Angeles, Amerika Serikat">Bandara Internasional Los Angeles (LAX) - Los Angeles, Amerika Serikat</option>
<option value="Bandara Internasional Barajas (MAD) - Madrid, Spanyol">Bandara Internasional Barajas (MAD) - Madrid, Spanyol</option>
<option value="Bandara Internasional Leonardo da Vinci (FCO) - Roma, Italia">Bandara Internasional Leonardo da Vinci (FCO) - Roma, Italia</option>
<option value="Bandara Internasional O'Hare (ORD) - Chicago, Amerika Serikat">Bandara Internasional O'Hare (ORD) - Chicago, Amerika Serikat</option>
<option value="Bandara Internasional Denver (DEN) - Denver, Amerika Serikat">Bandara Internasional Denver (DEN) - Denver, Amerika Serikat</option>
<option value="Bandara Internasional Dubai World Central (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai World Central (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Abu Dhabi (AUH) - Abu Dhabi, Uni Emirat Arab">Bandara Internasional Abu Dhabi (AUH) - Abu Dhabi, Uni Emirat Arab</option>
<option value="Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi">Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi</option>
        </select>
        <label for="bandara_kedatangan">Bandara Kedatangan:</label>
        <select class="form-control" id="bandara_kedatangan" name="bandara_kedatangan" required>
            <!-- Pilihan bandara kedatangan -->
            <option >Pilih Bandara Tujuan</option>
            <option value="Bandara Internasional Soekarno-Hatta (CGK) - Jakarta">Bandara Internasional Soekarno-Hatta (CGK) - Jakarta</option>
<option value="Bandara Internasional Ngurah Rai (DPS) - Denpasar, Bali">Bandara Internasional Ngurah Rai (DPS) - Denpasar, Bali</option>
<option value="Bandara Internasional Juanda (SUB) - Surabaya">Bandara Internasional Juanda (SUB) - Surabaya</option>
<option value="Bandara Internasional Sultan Hasanuddin (UPG) - Makassar">Bandara Internasional Sultan Hasanuddin (UPG) - Makassar</option>
<option value="Bandara Internasional Adisutjipto (JOG) - Yogyakarta">Bandara Internasional Adisutjipto (JOG) - Yogyakarta</option>
<option value="Bandara Internasional Adi Soemarmo (SOC) - Solo">Bandara Internasional Adi Soemarmo (SOC) - Solo</option>
<option value="Bandara Internasional Kualanamu (KNO) - Medan">Bandara Internasional Kualanamu (KNO) - Medan</option>
<option value="Bandara Internasional Sultan Mahmud Badaruddin II (PLM) - Palembang">Bandara Internasional Sultan Mahmud Badaruddin II (PLM) - Palembang</option>
<option value="Bandara Internasional Lombok Praya (LOP) - Lombok">Bandara Internasional Lombok Praya (LOP) - Lombok</option>
<option value="Bandara Internasional Minangkabau (PDG) - Padang">Bandara Internasional Minangkabau (PDG) - Padang</option>
<option value="Bandara Internasional Husein Sastranegara (BDO) - Bandung">Bandara Internasional Husein Sastranegara (BDO) - Bandung</option>
<option value="Bandara Internasional Syamsudin Noor (BDJ) - Banjarmasin">Bandara Internasional Syamsudin Noor (BDJ) - Banjarmasin</option>
<option value="Bandara Internasional El Tari (KOE) - Kupang">Bandara Internasional El Tari (KOE) - Kupang</option>
<option value="Bandara Internasional Ahmad Yani (SRG) - Semarang">Bandara Internasional Ahmad Yani (SRG) - Semarang</option>
<option value="Bandara Internasional Sepinggan (BPN) - Balikpapan">Bandara Internasional Sepinggan (BPN) - Balikpapan</option>
<option value="Bandara Internasional Supadio (PNK) - Pontianak">Bandara Internasional Supadio (PNK) - Pontianak</option>
<option value="Bandara Internasional Sultan Aji Muhammad Sulaiman (BTH) - Batam">Bandara Internasional Sultan Aji Muhammad Sulaiman (BTH) - Batam</option>
<option value="Bandara Internasional Sam Ratulangi (MDC) - Manado">Bandara Internasional Sam Ratulangi (MDC) - Manado</option>
<option value="Bandara Internasional Halim Perdanakusuma (HLP) - Jakarta">Bandara Internasional Halim Perdanakusuma (HLP) - Jakarta</option>
<option value="Bandara Internasional Silangit (DTB) - Silangit">Bandara Internasional Silangit (DTB) - Silangit</option>
<option value="Bandara Internasional Fatmawati Soekarno (BKS) - Bengkulu">Bandara Internasional Fatmawati Soekarno (BKS) - Bengkulu</option>
<option value="Bandara Internasional Frans Kaisiepo (BIK) - Biak">Bandara Internasional Frans Kaisiepo (BIK) - Biak</option>
<option value="Bandara Internasional Radin Inten II (TKG) - Lampung">Bandara Internasional Radin Inten II (TKG) - Lampung</option>
<option value="Bandara Internasional Pattimura (AMQ) - Ambon">Bandara Internasional Pattimura (AMQ) - Ambon</option>
<option value="Bandara Internasional Sentani (DJJ) - Jayapura">Bandara Internasional Sentani (DJJ) - Jayapura</option>
<option value="Bandara Internasional H.A.S Hanandjoeddin (TJQ) - Tanjung Pandan">Bandara Internasional H.A.S Hanandjoeddin (TJQ) - Tanjung Pandan</option>
<option value="Bandara Internasional Sultan Thaha (DJB) - Jambi">Bandara Internasional Sultan Thaha (DJB) - Jambi</option>
<option value="Bandara Internasional Sultan Iskandar Muda (BTJ) - Banda Aceh">Bandara Internasional Sultan Iskandar Muda (BTJ) - Banda Aceh</option>
<option value="Bandara Internasional Blimbingsari (BWX) - Banyuwangi">Bandara Internasional Blimbingsari (BWX) - Banyuwangi</option>
<option value="Bandara Internasional Sultan Babullah (TTE) - Ternate">Bandara Internasional Sultan Babullah (TTE) - Ternate</option>
<option value="Bandara Internasional Tjilik Riwut (PLW) - Palu">Bandara Internasional Tjilik Riwut (PLW) - Palu</option>
<option value="Bandara Internasional Maimun Saleh (SBG) - Sabang">Bandara Internasional Maimun Saleh (SBG) - Sabang</option>
<option value="Bandara Internasional Matahora (WKB) - Waikabubak">Bandara Internasional Matahora (WKB) - Waikabubak</option>
<option value="Bandara Internasional Jalaluddin (GTO) - Gorontalo">Bandara Internasional Jalaluddin (GTO) - Gorontalo</option>
<option value="Bandara Internasional Selaparang (AMI) - Mataram">Bandara Internasional Selaparang (AMI) - Mataram</option>
<option value="Bandara Internasional Bukit Siguntang (PGK) - Pangkal Pinang">Bandara Internasional Bukit Siguntang (PGK) - Pangkal Pinang</option>
<option value="Bandara Internasional Hasa Hasa (BUI) - Buli">Bandara Internasional Hasa Hasa (BUI) - Buli</option>
<option value="Bandara Internasional Raja Haji Fisabilillah (TNJ) - Tanjung Pinang">Bandara Internasional Raja Haji Fisabilillah (TNJ) - Tanjung Pinang</option>
<option value="Bandara Internasional Letkol Wisnu (TMC) - Tembagapura">Bandara Internasional Letkol Wisnu (TMC) - Tembagapura</option>
<option value="Bandara Internasional Dominique Edward Osok (SOQ) - Sorong">Bandara Internasional Dominique Edward Osok (SOQ) - Sorong</option>
<option value="Bandara Internasional Syukuran Aminuddin Amir (LUW) - Luwuk">Bandara Internasional Syukuran Aminuddin Amir (LUW) - Luwuk</option>
<option value="Bandara Internasional Jatitujuh (KJT) - Majalengka">Bandara Internasional Jatitujuh (KJT) - Majalengka</option>
<option value="Bandara Internasional Lembuswana (LLJ) - Belitung">Bandara Internasional Lembuswana (LLJ) - Belitung</option>
<option value="Bandara Internasional Umbu Mehang Kunda (WGP) - Waingapu">Bandara Internasional Umbu Mehang Kunda (WGP) - Waingapu</option>
<option value="Bandara Internasional Tjilik Riwut (PKY) - Palangkaraya">Bandara Internasional Tjilik Riwut (PKY) - Palangkaraya</option>
<option value="Bandara Internasional RADJABAGUSWIDJAJA (KTG) - Ketapang">Bandara Internasional RADJABAGUSWIDJAJA (KTG) - Ketapang</option>
<option value="Bandara Internasional Tembagapura (SRI) - Tembagapura">Bandara Internasional Tembagapura (SRI) - Tembagapura</option>
<option value="Bandara Internasional El Tari (NAH) - Naha">Bandara Internasional El Tari (NAH) - Naha</option>
<option value="Bandara Internasional Bontang (BXT) - Bontang">Bandara Internasional Bontang (BXT) - Bontang</option>
<option value="Bandara Internasional Wai Oti (PSU) - Putussibau">Bandara Internasional Wai Oti (PSU) - Putussibau</option>
<option value="Bandara Internasional Lepo-Lepo (MAL) - Mangole">Bandara Internasional Lepo-Lepo (MAL) - Mangole</option>
<option value="Bandara Internasional Sultan Aji Muhamad Sulaiman (BUW) - Bau Bau">Bandara Internasional Sultan Aji Muhamad Sulaiman (BUW) - Bau Bau</option>
<option value="Bandara Internasional Sultan Babullah (SQR) - Soroako">Bandara Internasional Sultan Babullah (SQR) - Soroako</option>
<option value="Bandara Internasional Raden Sadjad (KTG) - Ketapang">Bandara Internasional Raden Sadjad (KTG) - Ketapang</option>
<option value="Bandara Internasional Umbu Mehang Kunda (WGP) - Waingapu">Bandara Internasional Umbu Mehang Kunda (WGP) - Waingapu</option>
<option value="Bandara Internasional Tjilik Riwut (PKY) - Palangkaraya">Bandara Internasional Tjilik Riwut (PKY) - Palangkaraya</option>
<option value="Bandara Internasional Tembagapura (SRI) - Tembagapura">Bandara Internasional Tembagapura (SRI) - Tembagapura</option>
<option value="Bandara Internasional El Tari (NAH) - Naha">Bandara Internasional El Tari (NAH) - Naha</option>
<option value="Bandara Internasional Bontang (BXT) - Bontang">Bandara Internasional Bontang (BXT) - Bontang</option>
<option value="Bandara Internasional Wai Oti (PSU) - Putussibau">Bandara Internasional Wai Oti (PSU) - Putussibau</option>
<option value="Bandara Internasional Lepo-Lepo (MAL) - Mangole">Bandara Internasional Lepo-Lepo (MAL) - Mangole</option>
<option value="Bandara Internasional Sultan Aji Muhamad Sulaiman (BUW) - Bau Bau">Bandara Internasional Sultan Aji Muhamad Sulaiman (BUW) - Bau Bau</option>
<option value="Bandara Internasional Sultan Babullah (SQR) - Soroako">Bandara Internasional Sultan Babullah (SQR) - Soroako</option>
<option value="Bandara Internasional Raden Sadjad (KTG) - Ketapang">Bandara Internasional Raden Sadjad (KTG) - Ketapang</option>
<option value="Bandara Internasional Changi (SIN) - Singapura">Bandara Internasional Changi (SIN) - Singapura</option>
<option value="Bandara Internasional Kuala Lumpur (KUL) - Malaysia">Bandara Internasional Kuala Lumpur (KUL) - Malaysia</option>
<option value="Bandara Internasional Suvarnabhumi (BKK) - Bangkok, Thailand">Bandara Internasional Suvarnabhumi (BKK) - Bangkok, Thailand</option>
<option value="Bandara Internasional Hong Kong (HKG) - Hong Kong">Bandara Internasional Hong Kong (HKG) - Hong Kong</option>
<option value="Bandara Internasional Beijing Capital (PEK) - Beijing, China">Bandara Internasional Beijing Capital (PEK) - Beijing, China</option>
<option value="Bandara Internasional Incheon (ICN) - Seoul, Korea Selatan">Bandara Internasional Incheon (ICN) - Seoul, Korea Selatan</option>
<option value="Bandara Internasional Narita (NRT) - Tokyo, Jepang">Bandara Internasional Narita (NRT) - Tokyo, Jepang</option>
<option value="Bandara Internasional Dubai (DXB) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai (DXB) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Heathrow (LHR) - London, Inggris">Bandara Internasional Heathrow (LHR) - London, Inggris</option>
<option value="Bandara Internasional John F. Kennedy (JFK) - New York City, Amerika Serikat">Bandara Internasional John F. Kennedy (JFK) - New York City, Amerika Serikat</option>
<option value="Bandara Internasional Charles de Gaulle (CDG) - Paris, Prancis">Bandara Internasional Charles de Gaulle (CDG) - Paris, Prancis</option>
<option value="Bandara Internasional Frankfurt (FRA) - Frankfurt, Jerman">Bandara Internasional Frankfurt (FRA) - Frankfurt, Jerman</option>
<option value="Bandara Internasional Los Angeles (LAX) - Los Angeles, Amerika Serikat">Bandara Internasional Los Angeles (LAX) - Los Angeles, Amerika Serikat</option>
<option value="Bandara Internasional Barajas (MAD) - Madrid, Spanyol">Bandara Internasional Barajas (MAD) - Madrid, Spanyol</option>
<option value="Bandara Internasional Leonardo da Vinci (FCO) - Roma, Italia">Bandara Internasional Leonardo da Vinci (FCO) - Roma, Italia</option>
<option value="Bandara Internasional O'Hare (ORD) - Chicago, Amerika Serikat">Bandara Internasional O'Hare (ORD) - Chicago, Amerika Serikat</option>
<option value="Bandara Internasional Denver (DEN) - Denver, Amerika Serikat">Bandara Internasional Denver (DEN) - Denver, Amerika Serikat</option>
<option value="Bandara Internasional Dubai World Central (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai World Central (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Abu Dhabi (AUH) - Abu Dhabi, Uni Emirat Arab">Bandara Internasional Abu Dhabi (AUH) - Abu Dhabi, Uni Emirat Arab</option>
<option value="Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi">Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi</option>
<option value="Bandara Internasional King Fahd (DMM) - Dammam, Arab Saudi">Bandara Internasional King Fahd (DMM) - Dammam, Arab Saudi</option>
<option value="Bandara Internasional Prince Mohammad bin Abdulaziz (MED) - Madinah, Arab Saudi">Bandara Internasional Prince Mohammad bin Abdulaziz (MED) - Madinah, Arab Saudi</option>
<option value="Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Imam Khomeini (IKA) - Tehran, Iran">Bandara Internasional Imam Khomeini (IKA) - Tehran, Iran</option>
<option value="Bandara Internasional Hamad (DOH) - Doha, Qatar">Bandara Internasional Hamad (DOH) - Doha, Qatar</option>
<option value="Bandara Internasional Istanbul (IST) - Istanbul, Turki">Bandara Internasional Istanbul (IST) - Istanbul, Turki</option>
<option value="Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko">Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko</option>
<option value="Bandara Internasional Dubai Creek (DCG) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Creek (DCG) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Dallas/Fort Worth (DFW) - Dallas/Fort Worth, Amerika Serikat">Bandara Internasional Dallas/Fort Worth (DFW) - Dallas/Fort Worth, Amerika Serikat</option>
<option value="Bandara Internasional Dubai Creek (DCG) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Creek (DCG) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Orlando (MCO) - Orlando, Amerika Serikat">Bandara Internasional Orlando (MCO) - Orlando, Amerika Serikat</option>
<option value="Bandara Internasional Ninoy Aquino (MNL) - Manila, Filipina">Bandara Internasional Ninoy Aquino (MNL) - Manila, Filipina</option>
<option value="Bandara Internasional Indira Gandhi (DEL) - Delhi, India">Bandara Internasional Indira Gandhi (DEL) - Delhi, India</option>
<option value="Bandara Internasional Chhatrapati Shivaji (BOM) - Mumbai, India">Bandara Internasional Chhatrapati Shivaji (BOM) - Mumbai, India</option>
<option value="Bandara Internasional Kempegowda (BLR) - Bengaluru, India">Bandara Internasional Kempegowda (BLR) - Bengaluru, India</option>
<option value="Bandara Internasional Rajiv Gandhi (HYD) - Hyderabad, India">Bandara Internasional Rajiv Gandhi (HYD) - Hyderabad, India</option>
<option value="Bandara Internasional Chennai (MAA) - Chennai, India">Bandara Internasional Chennai (MAA) - Chennai, India</option>
<option value="Bandara Internasional Netaji Subhas Chandra Bose (CCU) - Kolkata, India">Bandara Internasional Netaji Subhas Chandra Bose (CCU) - Kolkata, India</option>
<option value="Bandara Internasional Chaudhary Charan Singh (LKO) - Lucknow, India">Bandara Internasional Chaudhary Charan Singh (LKO) - Lucknow, India</option>
<option value="Bandara Internasional Jaipur (JAI) - Jaipur, India">Bandara Internasional Jaipur (JAI) - Jaipur, India</option>
<option value="Bandara Internasional Sardar Vallabhbhai Patel (AMD) - Ahmedabad, India">Bandara Internasional Sardar Vallabhbhai Patel (AMD) - Ahmedabad, India</option>
<option value="Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Bandaranaike (CMB) - Colombo, Sri Lanka">Bandara Internasional Bandaranaike (CMB) - Colombo, Sri Lanka</option>
<option value="Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi">Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi</option>
<option value="Bandara Internasional King Khalid (RUH) - Riyadh, Arab Saudi">Bandara Internasional King Khalid (RUH) - Riyadh, Arab Saudi</option>
<option value="Bandara Internasional Prince Mohammad bin Abdulaziz (MED) - Madinah, Arab Saudi">Bandara Internasional Prince Mohammad bin Abdulaziz (MED) - Madinah, Arab Saudi</option>
<option value="Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko">Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko</option>
<option value="Bandara Internasional Cairo (CAI) - Cairo, Mesir">Bandara Internasional Cairo (CAI) - Cairo, Mesir</option>
<option value="Bandara Internasional Hamad (DOH) - Doha, Qatar">Bandara Internasional Hamad (DOH) - Doha, Qatar</option>
<option value="Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Hamad (DOH) - Doha, Qatar">Bandara Internasional Hamad (DOH) - Doha, Qatar</option>
<option value="Bandara Internasional Istanbul (IST) - Istanbul, Turki">Bandara Internasional Istanbul (IST) - Istanbul, Turki</option>
<option value="Bandara Internasional Muscat (MCT) - Muscat, Oman">Bandara Internasional Muscat (MCT) - Muscat, Oman</option>
<option value="Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko">Bandara Internasional Mohammed V (CMN) - Casablanca, Maroko</option>
<option value="Bandara Internasional Cairo (CAI) - Cairo, Mesir">Bandara Internasional Cairo (CAI) - Cairo, Mesir</option>
<option value="Bandara Internasional Hamad (DOH) - Doha, Qatar">Bandara Internasional Hamad (DOH) - Doha, Qatar</option>
<option value="Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai Al Maktoum (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Hamad (DOH) - Doha, Qatar">Bandara Internasional Hamad (DOH) - Doha, Qatar</option>
<option value="Bandara Internasional Istanbul (IST) - Istanbul, Turki">Bandara Internasional Istanbul (IST) - Istanbul, Turki</option>
<option value="Bandara Internasional Muscat (MCT) - Muscat, Oman">Bandara Internasional Muscat (MCT) - Muscat, Oman</option>
<option value="Bandara Internasional Eleftherios Venizelos (ATH) - Athena, Yunani">Bandara Internasional Eleftherios Venizelos (ATH) - Athena, Yunani</option>
<option value="Bandara Internasional Dublin (DUB) - Dublin, Irlandia">Bandara Internasional Dublin (DUB) - Dublin, Irlandia</option>
<option value="Bandara Internasional Sydney (SYD) - Sydney, Australia">Bandara Internasional Sydney (SYD) - Sydney, Australia</option>
<option value="Bandara Internasional Auckland (AKL) - Auckland, Selandia Baru">Bandara Internasional Auckland (AKL) - Auckland, Selandia Baru</option>
<option value="Bandara Internasional Hong Kong (HKG) - Hong Kong">Bandara Internasional Hong Kong (HKG) - Hong Kong</option>
<option value="Bandara Internasional Incheon (ICN) - Seoul, Korea Selatan">Bandara Internasional Incheon (ICN) - Seoul, Korea Selatan</option>
<option value="Bandara Internasional Narita (NRT) - Tokyo, Jepang">Bandara Internasional Narita (NRT) - Tokyo, Jepang</option>
<option value="Bandara Internasional Dubai (DXB) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai (DXB) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Heathrow (LHR) - London, Inggris">Bandara Internasional Heathrow (LHR) - London, Inggris</option>
<option value="Bandara Internasional John F. Kennedy (JFK) - New York City, Amerika Serikat">Bandara Internasional John F. Kennedy (JFK) - New York City, Amerika Serikat</option>
<option value="Bandara Internasional Charles de Gaulle (CDG) - Paris, Prancis">Bandara Internasional Charles de Gaulle (CDG) - Paris, Prancis</option>
<option value="Bandara Internasional Frankfurt (FRA) - Frankfurt, Jerman">Bandara Internasional Frankfurt (FRA) - Frankfurt, Jerman</option>
<option value="Bandara Internasional Los Angeles (LAX) - Los Angeles, Amerika Serikat">Bandara Internasional Los Angeles (LAX) - Los Angeles, Amerika Serikat</option>
<option value="Bandara Internasional Barajas (MAD) - Madrid, Spanyol">Bandara Internasional Barajas (MAD) - Madrid, Spanyol</option>
<option value="Bandara Internasional Leonardo da Vinci (FCO) - Roma, Italia">Bandara Internasional Leonardo da Vinci (FCO) - Roma, Italia</option>
<option value="Bandara Internasional O'Hare (ORD) - Chicago, Amerika Serikat">Bandara Internasional O'Hare (ORD) - Chicago, Amerika Serikat</option>
<option value="Bandara Internasional Denver (DEN) - Denver, Amerika Serikat">Bandara Internasional Denver (DEN) - Denver, Amerika Serikat</option>
<option value="Bandara Internasional Dubai World Central (DWC) - Dubai, Uni Emirat Arab">Bandara Internasional Dubai World Central (DWC) - Dubai, Uni Emirat Arab</option>
<option value="Bandara Internasional Abu Dhabi (AUH) - Abu Dhabi, Uni Emirat Arab">Bandara Internasional Abu Dhabi (AUH) - Abu Dhabi, Uni Emirat Arab</option>
<option value="Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi">Bandara Internasional King Abdulaziz (JED) - Jeddah, Arab Saudi</option>
        </select>
        <label for="date">Tanggal Keberangkatan:</label>
        <input type="date" id="date" name="date" required><br><br>
        
        <button type="submit">Cari Tiket</button>
    </form>
</div>

<div class="search-form" id="bus-form">
    <form action="caribus.php" method="POST">
        <label for="terminal_keberangkatan">Stasiun Keberangkatan:</label>
        <select class="form-control" id="terminal_keberangkatan" name="terminal_keberangkatan" required>
            <!-- Pilihan Pelabuhan keberangkatan -->
            <option value="">Pilih Terminal Keberangkatan</option>
            <option value="Terminal Lebak Bulus">Terminal Lebak Bulus</option>
        <option value="Terminal Kampung Rambutan">Terminal Kampung Rambutan</option>
        <option value="Terminal Kalideres">Terminal Kalideres</option>
        <option value="Terminal Pulo Gadung">Terminal Pulo Gadung</option>
        <option value="Terminal Cililitan">Terminal Cililitan</option>
        <option value="Terminal Rawamangun">Terminal Rawamangun</option>
        <option value="Terminal Blok M">Terminal Blok M</option>
        <option value="Terminal Tanjung Priok">Terminal Tanjung Priok</option>
        <option value="Terminal Kampung Melayu">Terminal Kampung Melayu</option>
        <option value="Terminal Pasar Minggu">Terminal Pasar Minggu</option>
        <option value="Terminal Senen">Terminal Senen</option>
        <option value="Terminal Pulogadung">Terminal Pulogadung</option>
        <option value="Terminal Pulo Gebang">Terminal Pulo Gebang</option>
        <option value="Terminal Tanah Abang">Terminal Tanah Abang</option>
        <option value="Terminal Manggarai">Terminal Manggarai</option>
        <option value="Terminal Pondok Cabe">Terminal Pondok Cabe</option>
        <option value="Terminal Bintaro">Terminal Bintaro</option>
        <option value="Terminal Kp Rambutan">Terminal Kp Rambutan</option>
        <option value="Terminal Cibubur">Terminal Cibubur</option>
        <option value="Terminal Depok">Terminal Depok</option>
        <option value="Terminal Kp Melayu">Terminal Kp Melayu</option>
        <option value="Terminal Kebayoran">Terminal Kebayoran</option>
        <option value="Terminal Kuningan">Terminal Kuningan</option>
        <option value="Terminal Ciputat">Terminal Ciputat</option>
        <option value="Terminal Pasar Rebo">Terminal Pasar Rebo</option>
        <option value="Terminal Serpong">Terminal Serpong</option>
        <option value="Terminal Cinere">Terminal Cinere</option>
        <option value="Terminal Pondok Labu">Terminal Pondok Labu</option>
        <option value="Terminal Kp Cina">Terminal Kp Cina</option>
        <option value="Terminal Gandaria">Terminal Gandaria</option>
        <option value="Terminal Lenteng Agung">Terminal Lenteng Agung</option>
        <option value="Terminal Tebet">Terminal Tebet</option>
        <option value="Terminal Jagakarsa">Terminal Jagakarsa</option>
        <option value="Terminal Ciracas">Terminal Ciracas</option>
        <option value="Terminal Ciganjur">Terminal Ciganjur</option>
        <option value="Terminal Cijantung">Terminal Cijantung</option>
        <option value="Terminal Cipinang">Terminal Cipinang</option>
        <option value="Terminal Klp Dua">Terminal Klp Dua</option>
        <option value="Terminal Klp Gading">Terminal Klp Gading</option>
        <option value="Terminal Cakung">Terminal Cakung</option>
        <option value="Terminal Cikokol">Terminal Cikokol</option>
        <option value="Terminal Sawah Besar">Terminal Sawah Besar</option>
        <option value="Terminal Setiabudi">Terminal Setiabudi</option>
        <option value="Terminal Kalisari">Terminal Kalisari</option>
        <option value="Terminal Karet">Terminal Karet</option>
        <option value="Terminal Kedoya">Terminal Kedoya</option>
        <option value="Terminal Grogol">Terminal Grogol</option>
        <option value="Terminal Slipi">Terminal Slipi</option>
        <option value="Terminal Kelapa Gading">Terminal Kelapa Gading</option>
        <option value="Terminal Cibitung">Terminal Cibitung</option>
        <option value="Terminal Margonda">Terminal Margonda</option>
        <option value="Terminal Parung">Terminal Parung</option>
        <option value="Terminal Pasar Jumat">Terminal Pasar Jumat</option>
        <option value="Terminal Rempoa">Terminal Rempoa</option>
        <option value="Terminal Balaraja">Terminal Balaraja</option>
        <option value="Terminal BSD">Terminal BSD</option>
        <option value="Terminal Cikarang">Terminal Cikarang</option>
        <option value="Terminal Kemanggisan">Terminal Kemanggisan</option>
        <option value="Terminal Kramat Jati">Terminal Kramat Jati</option>
        <option value="Terminal Kukusan">Terminal Kukusan</option>
        <option value="Terminal Pabuaran">Terminal Pabuaran</option>
        <option value="Terminal Pagedangan">Terminal Pagedangan</option>
        <option value="Terminal Poris">Terminal Poris</option>
        <option value="Terminal Serang">Terminal Serang</option>
        <option value="Terminal Soekarno Hatta">Terminal Soekarno Hatta</option>
        <option value="Terminal Tangerang">Terminal Tangerang</option>
        <option value="Terminal Tegal Alur">Terminal Tegal Alur</option>
        <option value="Terminal Teluk Naga">Terminal Teluk Naga</option>
        <option value="Terminal Tigaraksa">Terminal Tigaraksa</option>
        <option value="Terminal Tugu">Terminal Tugu</option>
        <option value="Terminal Waru">Terminal Waru</option>
        <option value="Terminal Soreang">Terminal Soreang</option>
        <option value="Terminal Batununggal">Terminal Batununggal</option>
        <option value="Terminal Cicaheum">Terminal Cicaheum</option>
        <option value="Terminal Cikutra">Terminal Cikutra</option>
        <option value="Terminal Cimindi">Terminal Cimindi</option>
        <option value="Terminal Cipedes">Terminal Cipedes</option>
        <option value="Terminal Cisomang Baru">Terminal Cisomang Baru</option>
        <option value="Terminal Cisomang Lama">Terminal Cisomang Lama</option>
        <option value="Terminal Guntur">Terminal Guntur</option>
        <option value="Terminal Jamika">Terminal Jamika</option>
        <option value="Terminal Karang Setra">Terminal Karang Setra</option>
        <option value="Terminal Kebon Kelapa">Terminal Kebon Kelapa</option>
        <option value="Terminal Lengkong">Terminal Lengkong</option>
        <option value="Terminal Leuwipanjang">Terminal Leuwipanjang</option>
        <option value="Terminal Soreang">Terminal Soreang</option>
        <option value="Terminal Cipeundeuy">Terminal Cipeundeuy</option>
        <option value="Terminal Margaasih">Terminal Margaasih</option>
        <option value="Terminal Baleendah">Terminal Baleendah</option>
        <option value="Terminal Pasirjati">Terminal Pasirjati</option>
        <option value="Terminal Tajur">Terminal Tajur</option>
        <option value="Terminal Cimahi">Terminal Cimahi</option>
        <option value="Terminal Cibabat">Terminal Cibabat</option>
        <option value="Terminal Cibolerang">Terminal Cibolerang</option>
        <option value="Terminal Cibeusi">Terminal Cibeusi</option>
        <option value="Terminal Cihanjuang">Terminal Cihanjuang</option>
        <option value="Terminal Cimareme">Terminal Cimareme</option>
        <option value="Terminal Cipageran">Terminal Cipageran</option>
        <option value="Terminal Cipatat">Terminal Cipatat</option>
        <option value="Terminal Cipeundeuy">Terminal Cipeundeuy</option>
        <option value="Terminal Cisarua">Terminal Cisarua</option>
        <option value="Terminal Dayeuhkolot">Terminal Dayeuhkolot</option>
        <option value="Terminal Garut">Terminal Garut</option>
        <option value="Terminal Katapang">Terminal Katapang</option>
        <option value="Terminal Margahayu">Terminal Margahayu</option>
        <option value="Terminal Majalaya">Terminal Majalaya</option>
        <option value="Terminal Rancaekek">Terminal Rancaekek</option>
        <option value="Terminal Soreang">Terminal Soreang</option>
        <option value="Terminal Bojongsoang">Terminal Bojongsoang</option>
        <option value="Terminal Cicalengka">Terminal Cicalengka</option>
        <option value="Terminal Cileunyi">Terminal Cileunyi</option>
        <option value="Terminal Jatinangor">Terminal Jatinangor</option>
        <option value="Terminal Paseh">Terminal Paseh</option>
        <option value="Terminal Tanjungsari">Terminal Tanjungsari</option>
        <option value="Terminal Cigugur">Terminal Cigugur</option>
        <option value="Terminal Banjaran">Terminal Banjaran</option>
        <option value="Terminal Cipeundeuy">Terminal Cipeundeuy</option>
        <option value="Terminal Leuwigoong">Terminal Leuwigoong</option>
        <option value="Terminal Lembang">Terminal Lembang</option>
        <option value="Terminal Padalarang">Terminal Padalarang</option>
        <option value="Terminal Parongpong">Terminal Parongpong</option>
        <option value="Terminal Ujung Berung">Terminal Ujung Berung</option>
        <option value="Terminal Cimareme">Terminal Cimareme</option>
        <option value="Terminal Cipageran">Terminal Cipageran</option>
        <option value="Terminal Cipatat">Terminal Cipatat</option>
        <option value="Terminal Cipeundeuy">Terminal Cipeundeuy</option>
        <option value="Terminal Cisarua">Terminal Cisarua</option>
        <option value="Terminal Dayeuhkolot">Terminal Dayeuhkolot</option>
        <option value="Terminal Garut">Terminal Garut</option>
        <option value="Terminal Katapang">Terminal Katapang</option>
        <option value="Terminal Margahayu">Terminal Margahayu</option>
        <option value="Terminal Majalaya">Terminal Majalaya</option>
        <option value="Terminal Rancaekek">Terminal Rancaekek</option>
        <option value="Terminal Soreang">Terminal Soreang</option>
        <option value="Terminal Bojongsoang">Terminal Bojongsoang</option>
        <option value="Terminal Cicalengka">Terminal Cicalengka</option>
        <option value="Terminal Cileunyi">Terminal Cileunyi</option>
        <option value="Terminal Jatinangor">Terminal Jatinangor</option>
        <option value="Terminal Paseh">Terminal Paseh</option>
        <option value="Terminal Tanjungsari">Terminal Tanjungsari</option>
        <option value="Terminal Cigugur">Terminal Cigugur</option>
        <option value="Terminal Banjaran">Terminal Banjaran</option>
        <option value="Terminal Cipeundeuy">Terminal Cipeundeuy</option>
        <option value="Terminal Leuwigoong">Terminal Leuwigoong</option>
        <option value="Terminal Lembang">Terminal Lembang</option>
        <option value="Terminal Padalarang">Terminal Padalarang</option>
        <option value="Terminal Parongpong">Terminal Parongpong</option>
        <option value="Terminal Ujung Berung">Terminal Ujung Berung</option>
        <option value="Terminal Pasirkoja">Terminal Pasirkoja</option>
        <option value="Terminal Bandung">Terminal Bandung</option>
        <option value="Terminal Cileunyi">Terminal Cileunyi</option>
        <option value="Terminal Majalaya">Terminal Majalaya</option>
        <option value="Terminal Soreang">Terminal Soreang</option>
        <option value="Terminal Ciawi">Terminal Ciawi</option>
        <option value="Terminal Cisarua">Terminal Cisarua</option>
        <option value="Terminal Cipanas">Terminal Cipanas</option>
        <option value="Terminal Citeko">Terminal Citeko</option>
        <option value="Terminal Cisarua">Terminal Cisarua</option>
        <option value="Terminal Ciawi">Terminal Ciawi</option>
        <option value="Terminal Cipanas">Terminal Cipanas</option>
        <option value="Terminal Citeko">Terminal Citeko</option>
        <option value="Terminal Cibodas">Terminal Cibodas</option>
        <option value="Terminal Ciwidey">Terminal Ciwidey</option>
        <option value="Terminal Leuwi Panjang">Terminal Leuwi Panjang</option>
        <option value="Terminal Kopo">Terminal Kopo</option>
        <option value="Terminal Buah Batu">Terminal Buah Batu</option>
        <option value="Terminal Leuwigajah">Terminal Leuwigajah</option>
        <option value="Terminal Baros">Terminal Baros</option>
        <option value="Terminal Purwakarta">Terminal Purwakarta</option>
        <option value="Terminal Ciater">Terminal Ciater</option>
        <option value="Terminal Padalarang">Terminal Padalarang</option>
        <option value="Terminal Lembang">Terminal Lembang</option>
        <option value="Terminal Parongpong">Terminal Parongpong</option>
        <option value="Terminal Cililin">Terminal Cililin</option>
        <option value="Terminal Cimahi">Terminal Cimahi</option>
        <option value="Terminal Majalaya">Terminal Majalaya</option>
        <option value="Terminal Soreang">Terminal Soreang</option>
        <option value="Terminal Ciranjang">Terminal Ciranjang</option>
        <option value="Terminal Sukabumi">Terminal Sukabumi</option>
        <option value="Terminal Cisaat">Terminal Cisaat</option>
        <option value="Terminal Cibadak">Terminal Cibadak</option>
        <option value="Terminal Ciambar">Terminal Ciambar</option>
        <option value="Terminal Cicurug">Terminal Cicurug</option>
        <option value="Terminal Cikembar">Terminal Cikembar</option>
        <option value="Terminal Cikidang">Terminal Cikidang</option>
        <option value="Terminal Ciracap">Terminal Ciracap</option>
        <option value="Terminal Cisaat">Terminal Cisaat</option>
        <option value="Terminal Cibadak">Terminal Cibadak</option>
        <option value="Terminal Ciambar">Terminal Ciambar</option>
        <option value="Terminal Cicurug">Terminal Cicurug</option>
        <option value="Terminal Cikembar">Terminal Cikembar</option>
        <option value="Terminal Cikidang">Terminal Cikidang</option>
        <option value="Terminal Ciracap">Terminal Ciracap</option>
        <option value="Terminal Pelabuhan Ratu">Terminal Pelabuhan Ratu</option>
        <option value="Terminal Sukabumi">Terminal Sukabumi</option>
        <option value="Terminal Cibadak">Terminal Cibadak</option>
        <option value="Terminal Cibuntu">Terminal Cibuntu</option>
        <option value="Terminal Cidadap">Terminal Cidadap</option>
        <option value="Terminal Cikakak">Terminal Cikakak</option>
        <option value="Terminal Cicurug">Terminal Cicurug</option>
        <option value="Terminal Cijulang">Terminal Cijulang</option>
        <option value="Terminal Cikatomas">Terminal Cikatomas</option>
        <option value="Terminal Cisoka">Terminal Cisoka</option>
        <option value="Terminal Maja">Terminal Maja</option>
        <option value="Terminal Malingping">Terminal Malingping</option>
        <option value="Terminal Rangkasbitung">Terminal Rangkasbitung</option>
        <option value="Terminal Caringin">Terminal Caringin</option>
        <option value="Terminal Bojong">Terminal Bojong</option>
        <option value="Terminal Sajira">Terminal Sajira</option>
        <option value="Terminal Serang">Terminal Serang</option>
        <option value="Terminal Pandeglang">Terminal Pandeglang</option>
        <option value="Terminal Banten">Terminal Banten</option>
        <option value="Terminal Rangkasbitung">Terminal Rangkasbitung</option>
        <option value="Terminal Tangerang">Terminal Tangerang</option>
        <option value="Terminal Cikupa">Terminal Cikupa</option>
        <option value="Terminal Mauk">Terminal Mauk</option>
        <option value="Terminal Sepatan">Terminal Sepatan</option>
        <option value="Terminal Serang">Terminal Serang</option>
        <option value="Terminal Cilegon">Terminal Cilegon</option>
        <option value="Terminal Labuhan">Terminal Labuhan</option>
        <option value="Terminal Panimbang">Terminal Panimbang</option>
        <option value="Terminal Sumur">Terminal Sumur</option>
        <option value="Terminal Bayah">Terminal Bayah</option>
        <option value="Terminal Cikarae">Terminal Cikarae</option>
        <option value="Terminal Cipanas">Terminal Cipanas</option>
        <option value="Terminal Cisimeut">Terminal Cisimeut</option>
        <option value="Terminal Cisuka">Terminal Cisuka</option>
        <option value="Terminal Kadugede">Terminal Kadugede</option>
        <option value="Terminal Kalapa">Terminal Kalapa</option>
        <option value="Terminal Limbangan">Terminal Limbangan</option>
        <option value="Terminal Panawuan">Terminal Panawuan</option>
        <option value="Terminal Pasir Eurih">Terminal Pasir Eurih</option>
        <option value="Terminal Singaparna">Terminal Singaparna</option>
        <option value="Terminal Wanaraja">Terminal Wanaraja</option>
    </select>

    <label for="terminal_kedatangan">Stasiun Kedatangan:</label>
    <select class="form-control" id="terminal_kedatangan" name="terminal_kedatangan" required>
        <!-- Pilihan bandara kedatangan -->
        <option value="">Pilih Terminal Tujuan</option>
        <option value="Terminal Lebak Bulus">Terminal Lebak Bulus</option>
<option value="Terminal Kampung Rambutan">Terminal Kampung Rambutan</option>
<option value="Terminal Kalideres">Terminal Kalideres</option>
<option value="Terminal Pulo Gadung">Terminal Pulo Gadung</option>
<option value="Terminal Cililitan">Terminal Cililitan</option>
<option value="Terminal Rawamangun">Terminal Rawamangun</option>
<option value="Terminal Blok M">Terminal Blok M</option>
<option value="Terminal Tanjung Priok">Terminal Tanjung Priok</option>
<option value="Terminal Kampung Melayu">Terminal Kampung Melayu</option>
<option value="Terminal Pasar Minggu">Terminal Pasar Minggu</option>
<option value="Terminal Senen">Terminal Senen</option>
<option value="Terminal Pulogadung">Terminal Pulogadung</option>
<option value="Terminal Pulo Gebang">Terminal Pulo Gebang</option>
<option value="Terminal Tanah Abang">Terminal Tanah Abang</option>
<option value="Terminal Manggarai">Terminal Manggarai</option>
<option value="Terminal Pondok Cabe">Terminal Pondok Cabe</option>
<option value="Terminal Bintaro">Terminal Bintaro</option>
<option value="Terminal Kp Rambutan">Terminal Kp Rambutan</option>
<option value="Terminal Cibubur">Terminal Cibubur</option>
<option value="Terminal Depok">Terminal Depok</option>
<option value="Terminal Kp Melayu">Terminal Kp Melayu</option>
<option value="Terminal Kebayoran">Terminal Kebayoran</option>
<option value="Terminal Kuningan">Terminal Kuningan</option>
<option value="Terminal Ciputat">Terminal Ciputat</option>
<option value="Terminal Pasar Rebo">Terminal Pasar Rebo</option>
<option value="Terminal Serpong">Terminal Serpong</option>
<option value="Terminal Cinere">Terminal Cinere</option>
<option value="Terminal Pondok Labu">Terminal Pondok Labu</option>
<option value="Terminal Kp Cina">Terminal Kp Cina</option>
<option value="Terminal Gandaria">Terminal Gandaria</option>
<option value="Terminal Lenteng Agung">Terminal Lenteng Agung</option>
<option value="Terminal Tebet">Terminal Tebet</option>
<option value="Terminal Jagakarsa">Terminal Jagakarsa</option>
<option value="Terminal Ciracas">Terminal Ciracas</option>
<option value="Terminal Ciganjur">Terminal Ciganjur</option>
<option value="Terminal Cijantung">Terminal Cijantung</option>
<option value="Terminal Cipinang">Terminal Cipinang</option>
<option value="Terminal Klp Dua">Terminal Klp Dua</option>
<option value="Terminal Klp Gading">Terminal Klp Gading</option>
<option value="Terminal Cakung">Terminal Cakung</option>
<option value="Terminal Cikokol">Terminal Cikokol</option>
<option value="Terminal Sawah Besar">Terminal Sawah Besar</option>
<option value="Terminal Setiabudi">Terminal Setiabudi</option>
<option value="Terminal Kalisari">Terminal Kalisari</option>
<option value="Terminal Karet">Terminal Karet</option>
<option value="Terminal Kedoya">Terminal Kedoya</option>
<option value="Terminal Grogol">Terminal Grogol</option>
<option value="Terminal Slipi">Terminal Slipi</option>
<option value="Terminal Kelapa Gading">Terminal Kelapa Gading</option>
<option value="Terminal Cibitung">Terminal Cibitung</option>
<option value="Terminal Margonda">Terminal Margonda</option>
<option value="Terminal Parung">Terminal Parung</option>
<option value="Terminal Pasar Jumat">Terminal Pasar Jumat</option>
<option value="Terminal Rempoa">Terminal Rempoa</option>
<option value="Terminal Balaraja">Terminal Balaraja</option>
<option value="Terminal BSD">Terminal BSD</option>
<option value="Terminal Cikarang">Terminal Cikarang</option>
<option value="Terminal Kemanggisan">Terminal Kemanggisan</option>
<option value="Terminal Kramat Jati">Terminal Kramat Jati</option>
<option value="Terminal Kukusan">Terminal Kukusan</option>
<option value="Terminal Pabuaran">Terminal Pabuaran</option>
<option value="Terminal Pagedangan">Terminal Pagedangan</option>
<option value="Terminal Poris">Terminal Poris</option>
<option value="Terminal Serang">Terminal Serang</option>
<option value="Terminal Soekarno Hatta">Terminal Soekarno Hatta</option>
<option value="Terminal Tangerang">Terminal Tangerang</option>
<option value="Terminal Tegal Alur">Terminal Tegal Alur</option>
<option value="Terminal Teluk Naga">Terminal Teluk Naga</option>
<option value="Terminal Tigaraksa">Terminal Tigaraksa</option>
<option value="Terminal Tugu">Terminal Tugu</option>
<option value="Terminal Waru">Terminal Waru</option>
<option value="Terminal Soreang">Terminal Soreang</option>
<option value="Terminal Batununggal">Terminal Batununggal</option>
<option value="Terminal Cicaheum">Terminal Cicaheum</option>
<option value="Terminal Cikutra">Terminal Cikutra</option>
<option value="Terminal Cimindi">Terminal Cimindi</option>
<option value="Terminal Cipedes">Terminal Cipedes</option>
<option value="Terminal Cisomang Baru">Terminal Cisomang Baru</option>
<option value="Terminal Cisomang Lama">Terminal Cisomang Lama</option>
<option value="Terminal Guntur">Terminal Guntur</option>
<option value="Terminal Jamika">Terminal Jamika</option>
<option value="Terminal Karang Setra">Terminal Karang Setra</option>
<option value="Terminal Kebon Kelapa">Terminal Kebon Kelapa</option>
<option value="Terminal Lengkong">Terminal Lengkong</option>
<option value="Terminal Leuwipanjang">Terminal Leuwipanjang</option>
<option value="Terminal Soreang">Terminal Soreang</option>
<option value="Terminal Cipeundeuy">Terminal Cipeundeuy</option>
<option value="Terminal Margaasih">Terminal Margaasih</option>
<option value="Terminal Baleendah">Terminal Baleendah</option>
<option value="Terminal Pasirjati">Terminal Pasirjati</option>
<option value="Terminal Tajur">Terminal Tajur</option>
<option value="Terminal Cimahi">Terminal Cimahi</option>
<option value="Terminal Cibabat">Terminal Cibabat</option>
<option value="Terminal Cibolerang">Terminal Cibolerang</option>
<option value="Terminal Cibeusi">Terminal Cibeusi</option>
<option value="Terminal Cihanjuang">Terminal Cihanjuang</option>
<option value="Terminal Cimareme">Terminal Cimareme</option>
<option value="Terminal Cipageran">Terminal Cipageran</option>
<option value="Terminal Cipatat">Terminal Cipatat</option>
<option value="Terminal Cipeundeuy">Terminal Cipeundeuy</option>
<option value="Terminal Cisarua">Terminal Cisarua</option>
<option value="Terminal Dayeuhkolot">Terminal Dayeuhkolot</option>
<option value="Terminal Garut">Terminal Garut</option>
<option value="Terminal Katapang">Terminal Katapang</option>
<option value="Terminal Margahayu">Terminal Margahayu</option>
<option value="Terminal Majalaya">Terminal Majalaya</option>
<option value="Terminal Rancaekek">Terminal Rancaekek</option>
<option value="Terminal Soreang">Terminal Soreang</option>
<option value="Terminal Bojongsoang">Terminal Bojongsoang</option>
<option value="Terminal Cicalengka">Terminal Cicalengka</option>
<option value="Terminal Cileunyi">Terminal Cileunyi</option>
<option value="Terminal Jatinangor">Terminal Jatinangor</option>
<option value="Terminal Paseh">Terminal Paseh</option>
<option value="Terminal Tanjungsari">Terminal Tanjungsari</option>
<option value="Terminal Cigugur">Terminal Cigugur</option>
<option value="Terminal Banjaran">Terminal Banjaran</option>
<option value="Terminal Cipeundeuy">Terminal Cipeundeuy</option>
<option value="Terminal Leuwigoong">Terminal Leuwigoong</option>
<option value="Terminal Lembang">Terminal Lembang</option>
<option value="Terminal Padalarang">Terminal Padalarang</option>
<option value="Terminal Parongpong">Terminal Parongpong</option>
<option value="Terminal Ujung Berung">Terminal Ujung Berung</option>
<option value="Terminal Cimareme">Terminal Cimareme</option>
<option value="Terminal Cipageran">Terminal Cipageran</option>
<option value="Terminal Cipatat">Terminal Cipatat</option>
<option value="Terminal Cipeundeuy">Terminal Cipeundeuy</option>
<option value="Terminal Cisarua">Terminal Cisarua</option>
<option value="Terminal Dayeuhkolot">Terminal Dayeuhkolot</option>
<option value="Terminal Garut">Terminal Garut</option>
<option value="Terminal Katapang">Terminal Katapang</option>
<option value="Terminal Margahayu">Terminal Margahayu</option>
<option value="Terminal Majalaya">Terminal Majalaya</option>
<option value="Terminal Rancaekek">Terminal Rancaekek</option>
<option value="Terminal Soreang">Terminal Soreang</option>
<option value="Terminal Bojongsoang">Terminal Bojongsoang</option>
<option value="Terminal Cicalengka">Terminal Cicalengka</option>
<option value="Terminal Cileunyi">Terminal Cileunyi</option>
<option value="Terminal Jatinangor">Terminal Jatinangor</option>
<option value="Terminal Paseh">Terminal Paseh</option>
<option value="Terminal Tanjungsari">Terminal Tanjungsari</option>
<option value="Terminal Cigugur">Terminal Cigugur</option>
<option value="Terminal Banjaran">Terminal Banjaran</option>
<option value="Terminal Cipeundeuy">Terminal Cipeundeuy</option>
<option value="Terminal Leuwigoong">Terminal Leuwigoong</option>
<option value="Terminal Lembang">Terminal Lembang</option>
<option value="Terminal Padalarang">Terminal Padalarang</option>
<option value="Terminal Parongpong">Terminal Parongpong</option>
<option value="Terminal Ujung Berung">Terminal Ujung Berung</option>
<option value="Terminal Pasirkoja">Terminal Pasirkoja</option>
<option value="Terminal Bandung">Terminal Bandung</option>
<option value="Terminal Cileunyi">Terminal Cileunyi</option>
<option value="Terminal Majalaya">Terminal Majalaya</option>
<option value="Terminal Soreang">Terminal Soreang</option>
<option value="Terminal Ciawi">Terminal Ciawi</option>
<option value="Terminal Cisarua">Terminal Cisarua</option>
<option value="Terminal Cipanas">Terminal Cipanas</option>
<option value="Terminal Citeko">Terminal Citeko</option>
<option value="Terminal Cisarua">Terminal Cisarua</option>
<option value="Terminal Ciawi">Terminal Ciawi</option>
<option value="Terminal Cipanas">Terminal Cipanas</option>
<option value="Terminal Citeko">Terminal Citeko</option>
<option value="Terminal Cibodas">Terminal Cibodas</option>
<option value="Terminal Ciwidey">Terminal Ciwidey</option>
<option value="Terminal Leuwi Panjang">Terminal Leuwi Panjang</option>
<option value="Terminal Kopo">Terminal Kopo</option>
<option value="Terminal Buah Batu">Terminal Buah Batu</option>
<option value="Terminal Leuwigajah">Terminal Leuwigajah</option>
<option value="Terminal Baros">Terminal Baros</option>
<option value="Terminal Purwakarta">Terminal Purwakarta</option>
<option value="Terminal Ciater">Terminal Ciater</option>
<option value="Terminal Padalarang">Terminal Padalarang</option>
<option value="Terminal Lembang">Terminal Lembang</option>
<option value="Terminal Parongpong">Terminal Parongpong</option>
<option value="Terminal Cililin">Terminal Cililin</option>
<option value="Terminal Cimahi">Terminal Cimahi</option>
<option value="Terminal Majalaya">Terminal Majalaya</option>
<option value="Terminal Soreang">Terminal Soreang</option>
<option value="Terminal Ciranjang">Terminal Ciranjang</option>
<option value="Terminal Sukabumi">Terminal Sukabumi</option>
<option value="Terminal Cisaat">Terminal Cisaat</option>
<option value="Terminal Cibadak">Terminal Cibadak</option>
<option value="Terminal Ciambar">Terminal Ciambar</option>
<option value="Terminal Cicurug">Terminal Cicurug</option>
<option value="Terminal Cikembar">Terminal Cikembar</option>
<option value="Terminal Cikidang">Terminal Cikidang</option>
<option value="Terminal Ciracap">Terminal Ciracap</option>
<option value="Terminal Cisaat">Terminal Cisaat</option>
<option value="Terminal Cibadak">Terminal Cibadak</option>
<option value="Terminal Ciambar">Terminal Ciambar</option>
<option value="Terminal Cicurug">Terminal Cicurug</option>
<option value="Terminal Cikembar">Terminal Cikembar</option>
<option value="Terminal Cikidang">Terminal Cikidang</option>
<option value="Terminal Ciracap">Terminal Ciracap</option>
<option value="Terminal Pelabuhan Ratu">Terminal Pelabuhan Ratu</option>
<option value="Terminal Sukabumi">Terminal Sukabumi</option>
<option value="Terminal Cibadak">Terminal Cibadak</option>
<option value="Terminal Cibuntu">Terminal Cibuntu</option>
<option value="Terminal Cidadap">Terminal Cidadap</option>
<option value="Terminal Cikakak">Terminal Cikakak</option>
<option value="Terminal Cicurug">Terminal Cicurug</option>
<option value="Terminal Cijulang">Terminal Cijulang</option>
<option value="Terminal Cikatomas">Terminal Cikatomas</option>
<option value="Terminal Cisoka">Terminal Cisoka</option>
<option value="Terminal Maja">Terminal Maja</option>
<option value="Terminal Malingping">Terminal Malingping</option>
<option value="Terminal Rangkasbitung">Terminal Rangkasbitung</option>
<option value="Terminal Caringin">Terminal Caringin</option>
<option value="Terminal Bojong">Terminal Bojong</option>
<option value="Terminal Sajira">Terminal Sajira</option>
<option value="Terminal Serang">Terminal Serang</option>
<option value="Terminal Pandeglang">Terminal Pandeglang</option>
<option value="Terminal Banten">Terminal Banten</option>
<option value="Terminal Rangkasbitung">Terminal Rangkasbitung</option>
<option value="Terminal Tangerang">Terminal Tangerang</option>
<option value="Terminal Cikupa">Terminal Cikupa</option>
<option value="Terminal Mauk">Terminal Mauk</option>
<option value="Terminal Sepatan">Terminal Sepatan</option>
<option value="Terminal Serang">Terminal Serang</option>
<option value="Terminal Cilegon">Terminal Cilegon</option>
<option value="Terminal Labuhan">Terminal Labuhan</option>
<option value="Terminal Panimbang">Terminal Panimbang</option>
<option value="Terminal Sumur">Terminal Sumur</option>
<option value="Terminal Bayah">Terminal Bayah</option>
<option value="Terminal Cikarae">Terminal Cikarae</option>
<option value="Terminal Cipanas">Terminal Cipanas</option>
<option value="Terminal Cisimeut">Terminal Cisimeut</option>
<option value="Terminal Cisuka">Terminal Cisuka</option>
<option value="Terminal Kadugede">Terminal Kadugede</option>
<option value="Terminal Kalapa">Terminal Kalapa</option>
<option value="Terminal Limbangan">Terminal Limbangan</option>
<option value="Terminal Panawuan">Terminal Panawuan</option>
<option value="Terminal Pasir Eurih">Terminal Pasir Eurih</option>
<option value="Terminal Singaparna">Terminal Singaparna</option>
<option value="Terminal Wanaraja">Terminal Wanaraja</option>
    </select>
    <label for="date">Tanggal Keberangkatan:</label>
    <input type="date" id="date" name="date" required><br><br>

    
    
    <button type="submit">Cari Tiket</button>
    </form>
    <script>
    // Fungsi untuk menyaring opsi berdasarkan input pencarian
    function filterOptions(selectElement, inputElement) {
        var filter = inputElement.value.toUpperCase();
        var options = selectElement.options;
        for (var i = 0; i < options.length; i++) {
            var option = options[i];
            var txtValue = option.textContent || option.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                option.style.display = "";
            } else {
                option.style.display = "none";
            }
        }
    }

    // Ambil elemen select dan input pencarian
    var selectKeberangkatan = document.getElementById("terminal_keberangkatan");
    var inputSearchKeberangkatan = document.createElement("input");
    inputSearchKeberangkatan.setAttribute("type", "text");
    inputSearchKeberangkatan.setAttribute("placeholder", "Cari terminal keberangkatan...");
    inputSearchKeberangkatan.addEventListener("input", function() {
        filterOptions(selectKeberangkatan, inputSearchKeberangkatan);
    });
    selectKeberangkatan.parentNode.insertBefore(inputSearchKeberangkatan, selectKeberangkatan.nextSibling);

    var selectKedatangan = document.getElementById("terminal_kedatangan");
    var inputSearchKedatangan = document.createElement("input");
    inputSearchKedatangan.setAttribute("type", "text");
    inputSearchKedatangan.setAttribute("placeholder", "Cari terminal kedatangan...");
    inputSearchKedatangan.addEventListener("input", function() {
        filterOptions(selectKedatangan, inputSearchKedatangan);
    });
    selectKedatangan.parentNode.insertBefore(inputSearchKedatangan, selectKedatangan.nextSibling);
</script>
</div>

<div class="search-form" id="kapal-form">
    <form action="carikapal.php" method="POST">
        <label for="pelabuhan_keberangkatan">Stasiun Keberangkatan:</label>
    <select class="form-control" id="pelabuhan_keberangkatan" name="pelabuhan_keberangkatan" required>
        <!-- Pilihan Pelabuhan keberangkatan -->
        <option value="">Pilih Pelabuhan Keberangkatan</option>
        <option>Jakarta (Pelabuhan Tanjung Priok)</option>
        <option>Surabaya (Pelabuhan Tanjung Perak)</option>
        <option>Semarang (Pelabuhan Tanjung Emas)</option>
        <option>Makassar (Pelabuhan Soekarno-Hatta)</option>
        <option>Bali (Pelabuhan Benoa)</option>
        <option>Medan (Pelabuhan Belawan)</option>
        <option>Batam (Pelabuhan Batu Ampar)</option>
        <option>Palembang (Pelabuhan Boom Baru)</option>
        <option>Pontianak (Pelabuhan Sungai Duri)</option>
        <option>Samarinda (Pelabuhan Samarinda)</option>
        <option>Padang (Pelabuhan Teluk Bayur)</option>
        <option>Lampung (Pelabuhan Panjang)</option>
        <option>Tanjung Pinang (Pelabuhan Sri Bintan Pura)</option>
        <option>Cirebon (Pelabuhan Cirebon)</option>
        <option>Bontang (Pelabuhan Bontang)</option>
        <option>Banjarmasin (Pelabuhan Trisakti)</option>
        <option>Tarakan (Pelabuhan Tarakan)</option>
        <option>Manado (Pelabuhan Samudera Bitung)</option>
        <option>Pekanbaru (Pelabuhan Sungai Duku)</option>
        <option>Ambon (Pelabuhan Yos Sudarso)</option>
        <option>Tegal (Pelabuhan Tegal)</option>
        <option>Kupang (Pelabuhan Tenau)</option>
        <option>Sorong (Pelabuhan Sorong)</option>
        <option>Berau (Pelabuhan Berau)</option>
        <option>Jambi (Pelabuhan Sungai Rengas)</option>
        <option>Bitung (Pelabuhan Bitung)</option>
        <option>Palu (Pelabuhan Palu)</option>
        <option>Palangkaraya (Pelabuhan Kumai)</option>
        <option>Kendari (Pelabuhan Kendari)</option>
        <option>Bima (Pelabuhan Bima)</option>
        <option>Banyuwangi (Pelabuhan Ketapang)</option>
        <option>Tarakan (Pelabuhan Tarakan)</option>
        <option>Merauke (Pelabuhan Merauke)</option>
        <option>Tanjung Pandan (Pelabuhan Tanjung Pandan)</option>
        <option>Sorong (Pelabuhan Sorong)</option>
        <option>Biak (Pelabuhan Biak)</option>
        <option>Maumere (Pelabuhan Maumere)</option>
        <option>Bau Bau (Pelabuhan Bau Bau)</option>
        <option>Waingapu (Pelabuhan Waingapu)</option>
        <option>Kendari (Pelabuhan Kendari)</option>
        <option>Nabire (Pelabuhan Nabire)</option>
        <option>Palopo (Pelabuhan Palopo)</option>
        <option>Manokwari (Pelabuhan Manokwari)</option>
        <option>Selayar (Pelabuhan Benteng)</option>
        <option>Waigeo (Pelabuhan Waisai)</option>
        <option>Langsa (Pelabuhan Langsa)</option>
        <option>Rote (Pelabuhan Ba'a)</option>
        <option>Mamuju (Pelabuhan Mamuju)</option>
        <option>Luwuk (Pelabuhan Luwuk)</option>
        <option>Lhokseumawe (Pelabuhan Lhokseumawe)</option>
        <option>Palu (Pelabuhan Pantoloan)</option>
        <option>Palu (Pelabuhan Palu)</option>
        <option>Banjuwangi (Pelabuhan Banjuwangi)</option>
        <option>Yogyakarta (Pelabuhan Tanjung Mas)</option>
        <option>Padang Bai (Pelabuhan Padang Bai)</option>
        <option>Watampone (Pelabuhan Watampone)</option>
        <option>Ampana (Pelabuhan Ampana)</option>
</select>
        <label for="pelabuhan_kedatangan">Stasiun Kedatangan:</label>
        <select class="form-control" id="pelabuhan_kedatangan" name="pelabuhan_kedatangan" required>
            <!-- Pilihan bandara kedatangan -->
            <option value="">Pilih Pelabuhan Tujuan</option>
        <option>Jakarta (Pelabuhan Tanjung Priok)</option>
        <option>Surabaya (Pelabuhan Tanjung Perak)</option>
        <option>Semarang (Pelabuhan Tanjung Emas)</option>
        <option>Makassar (Pelabuhan Soekarno-Hatta)</option>
        <option>Bali (Pelabuhan Benoa)</option>
        <option>Medan (Pelabuhan Belawan)</option>
        <option>Batam (Pelabuhan Batu Ampar)</option>
        <option>Palembang (Pelabuhan Boom Baru)</option>
        <option>Pontianak (Pelabuhan Sungai Duri)</option>
        <option>Samarinda (Pelabuhan Samarinda)</option>
        <option>Padang (Pelabuhan Teluk Bayur)</option>
        <option>Lampung (Pelabuhan Panjang)</option>
        <option>Tanjung Pinang (Pelabuhan Sri Bintan Pura)</option>
        <option>Cirebon (Pelabuhan Cirebon)</option>
        <option>Bontang (Pelabuhan Bontang)</option>
        <option>Banjarmasin (Pelabuhan Trisakti)</option>
        <option>Tarakan (Pelabuhan Tarakan)</option>
        <option>Manado (Pelabuhan Samudera Bitung)</option>
        <option>Pekanbaru (Pelabuhan Sungai Duku)</option>
        <option>Ambon (Pelabuhan Yos Sudarso)</option>
        <option>Tegal (Pelabuhan Tegal)</option>
        <option>Kupang (Pelabuhan Tenau)</option>
        <option>Sorong (Pelabuhan Sorong)</option>
        <option>Berau (Pelabuhan Berau)</option>
        <option>Jambi (Pelabuhan Sungai Rengas)</option>
        <option>Bitung (Pelabuhan Bitung)</option>
        <option>Palu (Pelabuhan Palu)</option>
        <option>Palangkaraya (Pelabuhan Kumai)</option>
        <option>Kendari (Pelabuhan Kendari)</option>
        <option>Bima (Pelabuhan Bima)</option>
        <option>Banyuwangi (Pelabuhan Ketapang)</option>
        <option>Tarakan (Pelabuhan Tarakan)</option>
        <option>Merauke (Pelabuhan Merauke)</option>
        <option>Tanjung Pandan (Pelabuhan Tanjung Pandan)</option>
        <option>Sorong (Pelabuhan Sorong)</option>
        <option>Biak (Pelabuhan Biak)</option>
        <option>Maumere (Pelabuhan Maumere)</option>
        <option>Bau Bau (Pelabuhan Bau Bau)</option>
        <option>Waingapu (Pelabuhan Waingapu)</option>
        <option>Kendari (Pelabuhan Kendari)</option>
        <option>Nabire (Pelabuhan Nabire)</option>
        <option>Palopo (Pelabuhan Palopo)</option>
        <option>Manokwari (Pelabuhan Manokwari)</option>
        <option>Selayar (Pelabuhan Benteng)</option>
        <option>Waigeo (Pelabuhan Waisai)</option>
        <option>Langsa (Pelabuhan Langsa)</option>
        <option>Rote (Pelabuhan Ba'a)</option>
        <option>Mamuju (Pelabuhan Mamuju)</option>
        <option>Luwuk (Pelabuhan Luwuk)</option>
        <option>Lhokseumawe (Pelabuhan Lhokseumawe)</option>
        <option>Palu (Pelabuhan Pantoloan)</option>
        <option>Palu (Pelabuhan Palu)</option>
        <option>Banjuwangi (Pelabuhan Banjuwangi)</option>
        <option>Yogyakarta (Pelabuhan Tanjung Mas)</option>
        <option>Padang Bai (Pelabuhan Padang Bai)</option>
        <option>Watampone (Pelabuhan Watampone)</option>
        <option>Ampana (Pelabuhan Ampana)</option>
        </select>
        <label for="date">Tanggal Keberangkatan:</label>
        <input type="date" id="date" name="date" required><br><br>
        <button type="submit">Cari</button>
    </form>
</div>

</body>
</html>
