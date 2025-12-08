<?php 
// Panggil file koneksi
include 'koneksi.php';

// Tangkap ID dari URL (yang dikirim dari index.php)
$id = $_GET['id'];

// Query untuk menghapus data berdasarkan ID
mysqli_query($koneksi, "DELETE FROM transaksi_masuk WHERE id='$id'");

// Arahkan kembali ke halaman utama
header("location:index.php");

?>