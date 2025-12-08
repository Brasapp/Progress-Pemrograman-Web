<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laundry Masuk Sederhana</title>
</head>
<body>

    <h2>📝 Input Laundry Masuk</h2>
    <form method="POST" action="proses_tambah.php">
        <label>Nama Pelanggan:</label><br>
        <input type="text" name="nama_pelanggan" required><br><br>
        
        <label>Berat (kg):</label><br>
        <input type="number" step="0.01" name="berat_kg" required><br><br>
        
        <input type="submit" value="Simpan Data">
    </form>

    <hr>

    <h2>📊 Data Laundry Masuk</h2>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Pelanggan</th>
            <th>Berat (kg)</th>
            <th>Tanggal Masuk</th>
        </tr>
        <?php 
        $no = 1;
        $data = mysqli_query($koneksi,"SELECT * FROM transaksi_masuk ORDER BY tgl_masuk DESC");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama_pelanggan']; ?></td>
            <td><?php echo $d['berat_kg']; ?></td>
            <td><?php echo $d['tgl_masuk']; ?></td>
        </tr>
        <?php 
        }
        ?>
    </table>

</body>
</html>