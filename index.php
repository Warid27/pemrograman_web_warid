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

  <!-- ======= Main ======= -->
  <?php 
    if (!isset($_GET['page'])) {
      $page = 'dashboard';
    } else{
      $page = $_GET['page'];
    }

    switch ($page) {
      case 'dashboard':
        include 'assets/components/main/dashboard.php';
        break;

      case 'kereta':
        include 'assets/components/main/kereta.php';
        break;

      case 'rapor':
        include 'assets/components/main/rapor.php';
        break;

      case 'kwalifikasi':
        include 'assets/components/main/kwalifikasi.php';
        break;

      case 'seragam':
        include 'assets/components/main/seragam.php';
        break;

      case 'gaji':
        include 'assets/components/main/gaji.php';
        break;

      case 'tabel_kereta':
        include 'assets/components/main/tabel/tabel_kereta.php';
        break;

      case 'tabel_rapor':
        include 'assets/components/main/tabel/tabel_rapor.php';
        break;

      case 'tabel_kwalifikasi':
        include 'assets/components/main/tabel/tabel_kwalifikasi.php';
        break;

      case 'tabel_seragam':
        include 'assets/components/main/tabel/tabel_seragam.php';
        break;

      case 'tabel_gaji':
        include 'assets/components/main/tabel/tabel_gaji.php';
        break;

      case 'delete':
        include 'assets/components/delete.php';
        break;
        
      case 'update':
        include 'assets/components/update.php';
        break;
      
      default:
      include 'assets/components/main/dashboard.php';
        break;
    }
  ?>
  <!-- End main -->

  <!-- ======= Footer ======= -->
  <?php include 'assets/components/footer.php' ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
</body>

</html>