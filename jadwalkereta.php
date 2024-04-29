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

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
    .table-responsive {
    overflow-x: auto;
}

.table {
    width: 100%;
    border-collapse: collapse;
}



</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PACK N GO<sup>2</sup></div>
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola Jadwal Tiket</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Jadwal Kereta</a>
                        <a class="collapse-item" href="cards.html">Jadwal Kapal</a>
                        <a class="collapse-item" href="cards.html">Jadwal Bus</a>
                        <a class="collapse-item" href="cards.html">Jadwal Pesawat</a>
                    </div>
                </div>
            </li>

                   <!-- Nav Item - Pages Collapse Menu -->
                   <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Kelola Pesanan Tiket</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Components:</h6>
                            <a class="collapse-item" href="buttons.html">Pesanan tiket Kereta</a>
                            <a class="collapse-item" href="cards.html">Pesanan tiket  Kapal</a>
                            <a class="collapse-item" href="cards.html">Pesanan tiket Bus</a>
                            <a class="collapse-item" href="cards.html">Pesanan Pesawat</a>
                        </div>
                    </div>
                </li>

                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Kelola Vendor</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Components:</h6>
                            <a class="collapse-item" href="buttons.html"> Vendor Bus</a>
                            <a class="collapse-item" href="buttons.html"> Vendor Kereta</a>
                            <a class="collapse-item" href="buttons.html"> Vendor Kapal</a>
                            <a class="collapse-item" href="buttons.html"> Vendor Pesawat</a>
                        </div>
                    </div>
                </li>


                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Kelola Metode Pembayaran</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Components:</h6>
                            <a class="collapse-item" href="buttons.html">Pembayaran tiket Kereta</a>
                            <a class="collapse-item" href="cards.html">Pembayaran tiket  Kapal</a>
                            <a class="collapse-item" href="cards.html">Pembayaran tiket Bus</a>
                            <a class="collapse-item" href="cards.html">Pembayaran tiket Pesawat</a>
                        </div>
                    </div>
                </li>


                
                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Kelola Pengguna</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Components:</h6>
                            <a class="collapse-item" href="manajemenpengguna.php">Manajemen Pengguna</a>
                        </div>
                    </div>
                </li>


                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Feedback</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="buttons.html">Lihat Feedback</a>
                        </div>
                    </div>
                </li>

       

          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
         

        </ul>
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
                        <h1 class="h3 mb-0 text-gray-800">Jadwal Tiket Kereta</h1>
                        <a href="csvjadwalpswt.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download CSV Jadwal pesawat</a>

                    </div>

              
                

                    <!-- Main Content -->
             <!-- Table Pengguna -->
   <!-- Tambah Data Button -->
   <a href="tambahjadwalkereta.php" class="btn btn-primary">Tambah Data</a>
<!-- Modal Tambah Data -->

<h3>Jadwal Hari ini</h3>
        <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Waktu Keberangkatan</th>
            <th>Waktu Kedatangan</th>
            <th>Stasiun Keberangkatan</th>
            <th>Stasiun Tujuan</th>
            <th>Harga tiket</th>
            <th>Kelas</th>
            <th>Stok Tiket</th>
            <th>Status</th>
            <th>Deskripsi</th>
            <th>Vendor Penyedia</th>
            <th>Aksi</th>
        </tr>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'koneksi.php';
        $updateQuery = "UPDATE jadwal_tiket_kereta SET status_jadwal = 'On Going' WHERE waktu_keberangkatan <= NOW()";
        mysqli_query($conn, $updateQuery);
        
        // Update status tiket menjadi "Arrived" jika waktu kedatangan telah tiba
        $updateQuery = "UPDATE jadwal_tiket_kereta SET status_jadwal = 'Arrived' WHERE waktu_kedatangan <= NOW()";
        mysqli_query($conn, $updateQuery);
        $query = "SELECT 
        jtp.id_jadwaltiketkereta,
        jtp.waktu_keberangkatan,
        jtp.waktu_kedatangan,
        jtp.stasiun_keberangkatan,
        jtp.stasiun_kedatangan,
        jtp.harga,
        jtp.kelas,
        jtp.kapasitas_stok_tiket,
        jtp.status_jadwal,
        jtp.deskripsi_jadwal,
        vp.nama_vendor 
    FROM 
        jadwal_tiket_kereta jtp
    JOIN 
        vendor_kereta vp 
    ON 
        jtp.id_vendorkrta = vp.id_vendorkrta
    WHERE 
        DATE(jtp.waktu_keberangkatan) = CURDATE();
    ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id_jadwaltiketkereta"] . "</td>";
                echo "<td>" . $row["waktu_keberangkatan"] . "</td>";
                echo "<td>" . $row["waktu_kedatangan"] . "</td>";
                echo "<td>" . $row["stasiun_keberangkatan"] . "</td>";
                echo "<td>" . $row["stasiun_kedatangan"] . "</td>";
                echo "<td>" . $row["harga"] . "</td>";
                echo "<td>" . $row["kelas"] . "</td>";
                echo "<td>" . $row["kapasitas_stok_tiket"] . "</td>";
                echo "<td>" . $row["status_jadwal"] . "</td>";
                echo "<td>" . $row["deskripsi_jadwal"] . "</td>";
                echo "<td>" . $row["nama_vendor"] . "</td>";
                echo "<td>
               <a href='editjadwalkereta.php?id=" . $row["id_jadwaltiketkereta"] . "' class='btn btn-primary btn-sm edit-btn'>Edit</a>
                <button class='btn btn-danger btn-sm delete-btn' data-id_jadwaltiketkereta='" . $row["id_jadwaltiketkereta"] . "' data-toggle='modal' data-target='#deleteModal'>Delete</button>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>0 results</td></tr>";
        }
        ?>
    </tbody>
</table>

<h3>Jadwal Tiket Kereta All</h3>
<div class="table-responsive">
        <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Waktu Keberangkatan</th>
            <th>Waktu Kedatangan</th>
            <th>Stasiun Keberangkatan</th>
            <th>Stasiun Tujuan</th>
            <th>Harga tiket</th>
            <th>Kelas</th>
            <th>Stok Tiket</th>
            <th>Status</th>
            <th>Deskripsi</th>
            <th>Vendor Penyedia</th>
            <th>Aksi</th>
        </tr>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'koneksi.php';

        $query = "SELECT id_jadwaltiketkereta,waktu_keberangkatan,waktu_kedatangan,stasiun_keberangkatan,deskripsi_jadwal,stasiun_kedatangan,harga,kelas ,kapasitas_stok_tiket,status_jadwal,vendor_kereta.nama_vendor FROM `jadwal_tiket_kereta`,vendor_kereta;";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id_jadwaltiketkereta"] . "</td>";
                echo "<td>" . $row["waktu_keberangkatan"] . "</td>";
                echo "<td>" . $row["waktu_kedatangan"] . "</td>";
                echo "<td>" . $row["stasiun_keberangkatan"] . "</td>";
                echo "<td>" . $row["stasiun_kedatangan"] . "</td>";
                echo "<td>" . $row["harga"] . "</td>";
                echo "<td>" . $row["kelas"] . "</td>";
                echo "<td>" . $row["kapasitas_stok_tiket"] . "</td>";
                echo "<td>" . $row["status_jadwal"] . "</td>";
                echo "<td>" . $row["deskripsi_jadwal"] . "</td>";
                echo "<td>" . $row["nama_vendor"] . "</td>";
                echo "<td>
              
                <a href='editjadwalkereta.php?id=" . $row["id_jadwaltiketkereta"] . "' class='btn btn-primary btn-sm edit-btn'>Edit</a>
                <button class='btn btn-danger btn-sm delete-btn' data-id_jadwaltiketkereta='" . $row["id_jadwaltiketkereta"] . "' data-toggle='modal' data-target='#deleteModal'>Delete</button>

                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>0 results</td></tr>";
        }
        ?>
    </tbody>
</table>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Modal Hapus Jadwal Tiket Pesawat -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Data Jadwal Tiket kereta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data jadwal tiket kereta ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a id="deleteBtn" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var jadwalId = $(this).data('id_jadwaltiketkereta');
            $('#deleteBtn').attr('href', 'hapustktkrt.php?id_jadwaltiketkereta=' + jadwalId);
        });
    });
</script>




                 

                         
             


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Pack N Go 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>