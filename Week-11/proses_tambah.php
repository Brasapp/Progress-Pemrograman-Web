<?php 
// Panggil file koneksi
include 'koneksi.php';

// Tangkap data dari form index.php
$nama = $_POST['nama_pelanggan'];
$berat = $_POST['berat_kg'];
$tanggal = date("Y-m-d H:i:s"); // Ambil waktu saat ini

// Query untuk memasukkan data ke tabel
$query = "INSERT INTO transaksi_masuk (nama_pelanggan, berat_kg, tgl_masuk) 
          VALUES ('$nama', '$berat', '$tanggal')";

mysqli_query($koneksi, $query);

// Arahkan kembali ke halaman utama (index.php) setelah berhasil
header("location:index.php");

?>