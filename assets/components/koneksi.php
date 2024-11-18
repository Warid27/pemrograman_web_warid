<!-- Web Warid -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "penilaian_warid";

// Create connection
$koneksi = mysqli_connect("$servername", "$username", "$password", "$db_name");

// Check connection
if (!$koneksi) {
  die("Koneksi Web Warid Gagal: " . mysqli_connect_error());
}
?>

<!-- Sim Akademik Warid -->
<?php
$host = "localhost";
$db = "sim_akademik_warid";
$user = "root";
$pass = "";

$foto_dir = './assets/uploads/';

// Create connection
try {
  $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
  echo "Koneksi ke Sim Akademik Gagal: " . $e->getMessage();
}
?>