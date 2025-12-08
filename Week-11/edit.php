<?php 
include 'koneksi.php';

// Tangkap ID dari URL
$id = $_GET['id'];

// Ambil data transaksi yang akan diedit dari database
$data = mysqli_query($koneksi, "SELECT * FROM transaksi_masuk WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Laundry</title>
</head>
<body>

    <h2>✏️ Edit Laundry Masuk</h2>
    <a href="index.php"> &lt;-- Kembali</a>
    <hr>
    
    <form method="POST" action="proses_edit.php">
        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
        
        <label>Nama Pelanggan:</label><br>
        <input type="text" name="nama_pelanggan" value="<?php echo $d['nama_pelanggan']; ?>" required><br><br>
        
        <label>Berat (kg):</label><br>
        <input type="number" step="0.01" name="berat_kg" value="<?php echo $d['berat_kg']; ?>" required><br><br>
        
        <input type="submit" value="Simpan Perubahan">
    </form>

</body>
</html>