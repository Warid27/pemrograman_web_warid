<!-- Web Warid -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "penilaian_warid";

// Create connection
$koneksi= mysqli_connect("$servername", "$username", "$password", "$db_name");

// Check connection
if (!$koneksi) {
  die("Koneksi Web Warid Gagal: " . mysqli_connect_error());
}
?>

<!-- Sim Akademik Warid -->
<?php
$servername1 = "localhost";
$username1 = "root";
$password1 = "";
$db_name1 = "sim_akademik_warid";

// Create connection
$koneksi1= mysqli_connect("$servername1", "$username1", "$password1", "$db_name1");

// Check connection
if (!$koneksi1) {
  die("Koneksi Sim Akademik Warid Gagal: " . mysqli_connect_error());
}
?>