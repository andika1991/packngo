<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
    /* Gaya untuk tombol sidebar toggler */
.sidebar-toggler {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 999;
    background: transparent;
    border: none;
    color: #fff;
    cursor: pointer;
}

/* Gaya untuk sidebar yang diperkecil */
#accordionSidebar.toggled {
    width: 80px;
}

#accordionSidebar.toggled .sidebar-brand-text {
    display: none;
}

#accordionSidebar.toggled .sidebar-brand-icon {
    padding: 15px 0;
}

#accordionSidebar.toggled .nav-item .nav-link {
    text-align: center;
    padding: 10px;
    width: 80px;
    white-space: nowrap;
    overflow: hidden;
}

#accordionSidebar.toggled .nav-item .nav-link span {
    display: none;
}

</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <button class="sidebar-toggler">
                <i class="fas fa-bars"></i>
            </button>
            
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               <img src="PACKNGO.png" width="30px" height="50px">
                <div class="sidebar-brand-text mx-3">PACK N GO</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

           <!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJadwal" aria-expanded="true" aria-controls="collapseJadwal">
        <i class="bi bi-calendar-week"></i>
        <span>Kelola Jadwal Tiket</span>
    </a>
    <div id="collapseJadwal" class="collapse" aria-labelledby="headingJadwal" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="jadwalpesawat.php">Jadwal Pesawat</a>
            <a class="collapse-item" href="jadwalkereta.php">Jadwal Kereta</a>
            <a class="collapse-item" href="jadwalkapal.php">Jadwal Kapal</a>
            <a class="collapse-item" href="jadwalbus.php">Jadwal Bus</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePesanan" aria-expanded="true" aria-controls="collapsePesanan">
        <i class="bi bi-ticket"></i>
        <span>Kelola Pesanan Tiket</span>
    </a>
    <div id="collapsePesanan" class="collapse" aria-labelledby="headingPesanan" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="pesanantiketpesawat.php">Pesanan tiket Pesawat</a>
            <a class="collapse-item" href="pesanantiketkereta.php">Pesanan tiket Kereta</a>
            <a class="collapse-item" href="pesanantiketkapal.php">Pesanan tiket  Kapal</a>
            <a class="collapse-item" href="pesanantiketbus.php">Pesanan tiket Bus</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVendor" aria-expanded="true" aria-controls="collapseVendor">
        <i class="fas fa-fw fa-cog"></i>
        <span>Kelola Vendor</span>
    </a>
    <div id="collapseVendor" class="collapse" aria-labelledby="headingVendor" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="vendorpesawat.php">Vendor Pesawat</a>
            <a class="collapse-item" href="vendorkereta.php">Vendor Kereta</a>
            <a class="collapse-item" href="vendorkapal.php">Vendor Kapal</a>
            <a class="collapse-item" href="vendorbus.php">Vendor Bus</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePembayaran" aria-expanded="true" aria-controls="collapsePembayaran">
        <i class="bi bi-credit-card"></i>
        <span>Kelola Metode Pembayaran</span>
    </a>
    <div id="collapsePembayaran" class="collapse" aria-labelledby="headingPembayaran" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="metodepembayaran.php">Metode pembayaran</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengguna" aria-expanded="true" aria-controls="collapsePengguna">
        <i class="bi bi-people-fill"></i>
        <span>Kelola Pengguna</span>
    </a>
    <div id="collapsePengguna" class="collapse" aria-labelledby="headingPengguna" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        
            <a class="collapse-item" href="manajemenpengguna.php">Manajemen Pengguna</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFeedback" aria-expanded="true" aria-controls="collapseFeedback">
        <i class="fas fa-fw fa-cog"></i>
        <span>Feedback</span>
    </a>
    <div id="collapseFeedback" class="collapse" aria-labelledby="headingFeedback" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="buttons.html">Lihat Feedback</a>
        </div>
    </div>
</li>
</ul>
        <!-- End of Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
               
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                      
               
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Jadwal Tiket Bus</h1>
                        <a href="csvjadwalpswt.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download CSV Jadwal pesawat</a>

                    </div>

                  
                    <h3>Pesanan Tiket Bus </h3>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Terminal Keberangkatan</th>
                <th>Terminal Tujuan</th>
                <th>Nama Vendor</th>
                <th>Bukti Bayar</th>
                <th>Status Pembayaran</th>
                <th>Harga</th>
                <th>Metode Pembayaran</th>
                <th>Order By</th>
                <th>Waktu Order</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';

            $query = "SELECT pb.id_pesanantiketbus,pb.invoice_id, jtb.terminal_keberangkatan, jtb.terminal_kedatangan, vb.nama_vendor, mp.nama_metode, pb.bukti_bayar, pb.status_pembayaran, jtb.harga, uo.username_pengguna, pb.TIMEORDER FROM pesanantiketbus pb JOIN jadwal_tiket_bus jtb ON pb.id_jadwaltiketbus = jtb.id_jadwaltiketbus JOIN vendor_bus vb ON jtb.id_vendorbus = vb.id_vendorbus JOIN metodepembayaran mp ON pb.id_metode = mp.id_metode JOIN pengguna uo ON pb.id_pengguna = uo.id_pengguna ORDER BY pb.TIMEORDER DESC";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["invoice_id"] . "</td>";
                    echo "<td>" . $row["terminal_keberangkatan"] . "</td>";
                    echo "<td>" . $row["terminal_kedatangan"] . "</td>";
                    echo "<td>" . $row["nama_vendor"] . "</td>";
                    if (!empty($row["bukti_bayar"])) {
                        // Jika ada, tampilkan tautan untuk melihat bukti bayar
                        echo "<td><a href='" . $row["bukti_bayar"] . "' target='_blank'>Lihat Bukti Bayar</a></td>";
                    } else {
                        // Jika tidak ada, tampilkan pesan bahwa bukti bayar belum dikirim
                        echo "<td><button onclick='showAlert()'>Belum mengirimkan bukti</button></td>";
                    }
            
          
                    echo "<td>";
                    echo "<select id='status_pembayaran_" . $row["id_pesanantiketbus"] . "' onchange='updateStatus(" . $row["id_pesanantiketbus"] . ")'>";
                    echo "<option value='Belum Lunas'" . ($row["status_pembayaran"] == "Belum Lunas" ? " selected" : "") . ">Belum Lunas</option>";
                    echo "<option value='Lunas'" . ($row["status_pembayaran"] == "Lunas" ? " selected" : "") . ">Lunas</option>";
                    echo "</select>";
                    echo "</td>";
                    echo "<td>" . $row["harga"] . "</td>";
                    echo "<td>" . $row["nama_metode"] . "</td>";
                    echo "<td>" . $row["username_pengguna"] . "</td>";
                    echo "<td>" . $row["TIMEORDER"] . "</td>";
                    echo "<td>
                    <a href='detailtiketbus.php?id=" . $row["id_pesanantiketbus"] . "' class='btn btn-primary btn-sm edit-btn'>Detail</a>
                </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>Tidak ada jadwal tiket pesawat yang tersedia.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function updateStatus(id_pesanantiketbus) {
        var status_pembayaran = $("#status_pembayaran_" + id_pesanantiketbus).val(); // Dapatkan nilai dropdown menggunakan jQuery

        var confirmation = confirm("Apakah Anda yakin ingin mengupdate status pembayaran menjadi '" + status_pembayaran + "'?");

        if (confirmation) {
            // Buat objek FormData untuk mengirim data ke PHP
            var formData = new FormData();
            formData.append('id_pesanantiketbus', id_pesanantiketbus);
            formData.append('status_pembayaran', status_pembayaran);

            // Kirim permintaan POST ke update_status_pembayaran.php
            fetch('update_status_pembayaran.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Ada kesalahan saat memperbarui status pembayaran.');
                    }
                    // Lakukan tindakan setelah berhasil memperbarui status pembayaran
                    // Misalnya, muat ulang halaman atau tampilkan pesan sukses
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                    // Tampilkan pesan kesalahan kepada pengguna jika terjadi kesalahan saat memperbarui status pembayaran
                });
        } else {
            var previousValue = $("#status_pembayaran_" + id_pesanantiketbus).data("previous-value"); // Dapatkan nilai sebelumnya dari data-previous-value
            $("#status_pembayaran_" + id_pesanantiketbus).val(previousValue); // Setel nilai dropdown kembali ke nilai sebelumnya
        }
    }
</script>
 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarToggler = document.querySelector(".sidebar-toggler");
            const sidebar = document.querySelector("#accordionSidebar");
    
            sidebarToggler.addEventListener("click", function() {
                sidebar.classList.toggle("toggled");
            });
        });
    </script>