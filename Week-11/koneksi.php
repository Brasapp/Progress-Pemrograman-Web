<?php
$host = "localhost";
$user = "root"; // Sesuaikan jika Anda menggunakan user lain
$pass = "";     // Sesuaikan jika Anda menggunakan password
$db = "crud_laundry"; // Pastikan nama database sama

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>