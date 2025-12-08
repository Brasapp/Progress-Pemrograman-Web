<?php 
// Panggil file koneksi
include 'koneksi.php';

// Tangkap semua data dari form edit.php
$id = $_POST['id'];
$nama = $_POST['nama_pelanggan'];
$berat = $_POST['berat_kg'];

// Query untuk update data berdasarkan ID
$query = "UPDATE transaksi_masuk SET 
          nama_pelanggan='$nama', 
          berat_kg='$berat' 
          WHERE id='$id'";

mysqli_query($koneksi, $query);

// Arahkan kembali ke halaman utama (index.php) setelah berhasil
header("location:index.php");

?>