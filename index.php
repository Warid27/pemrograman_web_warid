<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Warid</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <!-- ======= PHP Script ======= -->
  <?php
  include "assets/components/koneksi.php";
  include 'assets/components/alerts.php';
  ?>
  <!-- End PHP Script -->

  <!-- ======= Header ======= -->
  <?php include 'assets/components/header.php'; ?>
  <!-- End Header -->
  
  <!-- ======= Sidebar Variable ======= -->
  <?php 

    // Dashboard 
    $dashboard_sidebar = "collapsed";  
    // Penilaian 1 
    $penilaian1_1 = "";  
    $penilaian1_2 = "";  
    $penilaian1_3 = "";  
    // Penilaian 2 
    $penilaian2_1 = "";  
    $penilaian2_2 = "";  
    // Table View 
    $tableView_1 = "";  
    $tableView_2 = "";  
    $tableView_3 = "";  
    $tableView_4 = "";  
    $tableView_5 = "";  
    // Sim Akademik
    $simAkademik_1 = "";  
    $simAkademik_2 = "";  
    $simAkademik_3 = "";  
    $simAkademik_4 = "";  
    $simAkademik_5 = "";  
  ?>
  <!-- End Sidebar Variable -->

  <!-- ======= Main ======= -->
  <?php
  if (!isset($_GET['page'])) {
    $page = 'dashboard';
  } else {
    $page = $_GET['page'];
  }


  switch ($page) {
      // Homepage
    case 'dashboard':
      include 'assets/components/dashboard.php';
      break;

      // Penilaian Form
    case 'kereta':
      include 'assets/components/penilaian/form/kereta.php';
      break;

    case 'rapor':
      include 'assets/components/penilaian/form/rapor.php';
      break;

    case 'kwalifikasi':
      include 'assets/components/penilaian/form/kwalifikasi.php';
      break;

    case 'seragam':
      include 'assets/components/penilaian/form/seragam.php';
      break;

    case 'gaji':
      include 'assets/components/penilaian/form/gaji.php';
      break;

      // Penilaian Table
    case 'tabel_kereta':
      include 'assets/components/penilaian/tabel/tabel_kereta.php';
      break;

    case 'tabel_rapor':
      include 'assets/components/penilaian/tabel/tabel_rapor.php';
      break;

    case 'tabel_kwalifikasi':
      include 'assets/components/penilaian/tabel/tabel_kwalifikasi.php';
      break;

    case 'tabel_seragam':
      include 'assets/components/penilaian/tabel/tabel_seragam.php';
      break;

    case 'tabel_gaji':
      include 'assets/components/penilaian/tabel/tabel_gaji.php';
      break;

      // Penilaian Aksi
    case 'delete':
      include 'assets/components/penilaian/action/delete.php';
      break;

    case 'update':
      include 'assets/components/penilaian/action/update.php';
      break;

      // Sim Akademik Warid
    case 'siswa':
      include 'assets/components/sim_akademik_warid/siswa.php';
      break;
    case 'mapel':
      include 'assets/components/sim_akademik_warid/mapel.php';
      break;
    case 'nilai_siswa':
      include 'assets/components/sim_akademik_warid/nilai_siswa.php';
      break;
    case 'pembayaran_siswa':
      include 'assets/components/sim_akademik_warid/pembayaran.php';
      break;
    case 'data_sim_akademik':
      include 'assets/components/sim_akademik_warid/data_sim_akademik.php';
      break;

      // Sim Akademik Warid (Aksi)
    case 'update_sim':
      include 'assets/components/sim_akademik_warid/update_sim.php';
      break;
    case 'delete_sim':
      include 'assets/components/sim_akademik_warid/delete_sim.php';
      break;

      // Default Homepage
    default:
      include 'assets/components/main/dashboard.php';
      break;
  }
  ?>
  <!-- End main -->

  <!-- ======= Sidebar ======= -->
  <?php include "assets/components/sidebar.php"; ?>
  <!-- End Sidebar -->
  <!-- ======= Footer ======= -->
  <?php include 'assets/components/footer.php' ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> -->


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>