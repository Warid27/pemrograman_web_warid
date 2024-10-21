<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "web_warid";

// Create connection
$koneksi= mysqli_connect("$servername", "$username", "$password", "$db_name");

// Check connection
if (mysqli_connect_errno()) {
  die("Koneksi Gagal: " . mysqli_connect_error());
}
?>