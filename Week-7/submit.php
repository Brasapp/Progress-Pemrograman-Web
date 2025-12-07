<?php
header('Content-Type: application/json');

$response = array('success' => false, 'message' => 'Terjadi kesalahan tidak terduga.');

// Periksa apakah request adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Ambil data dari POST
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';

    // Validasi sederhana
    if (!empty($nama) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // --- Tempatkan Logika Bisnis/Database di sini ---
        // Contoh: Simpan ke database, kirim email, dll.
        
        // Simulasikan sukses
        $response['success'] = true;
        $response['message'] = "Data berhasil diterima! Nama: " . $nama . ", Email: " . $email;
        
    } else {
        // Simulasikan validasi gagal
        $response['message'] = "Validasi gagal. Pastikan semua kolom terisi dengan benar.";
    }
    
} else {
    $response['message'] = 'Metode request tidak diizinkan.';
}

echo json_encode($response);
?>