# Spesifikasi Proyek Website: Project Progress Tracker

Ini adalah spesifikasi proyek untuk membangun platform berbasis web yang berfungsi sebagai **Project Progress Tracker (PPT)**, dirancang khusus untuk meningkatkan transparansi dan efisiensi komunikasi antara klien dan pekerja (mirip dengan Notion).

## 1. Informasi Dasar Proyek 📝

**Nama Proyek:** Project Progress Tracker (PPT)

**Deskripsi:** Platform ini adalah sistem manajemen proyek real-time berbasis web. Fungsinya adalah memungkinkan klien untuk mengajukan proyek, pekerja untuk mengatur dan memperbarui tugas, dan yang paling penting, memungkinkan klien untuk memantau kemajuan proyek secara instan tanpa perlu komunikasi yang berulang-ulang.

**Tujuan Utama:**
- Menciptakan transparansi penuh mengenai status proyek
- Meningkatkan efisiensi kerja dengan memusatkan semua komunikasi dan pembaruan pada satu tempat
- Memastikan klien mendapatkan informasi real-time mengenai persentase penyelesaian dan detail tugas yang sedang dikerjakan

## 2. Fitur Utama Platform ✨

Platform ini akan memiliki fitur utama yang dibagi berdasarkan peran pengguna:

- **Dasbor Real-Time:** Tampilan ringkasan yang diperbarui secara instan melalui WebSockets, menampilkan status proyek, persentase kemajuan total, dan daftar aktivitas terbaru.

- **Manajemen Proyek dan Tugas:**
    - Klien dapat membuat permintaan proyek baru
    - Pekerja/Admin dapat menugaskan proyek dan tugas kepada pekerja lain
    - Fasilitas untuk membuat, mengedit, dan menandai tugas serta subtugas sebagai selesai

- **Pelacakan Kemajuan:** Pekerja dapat memperbarui status, memasukkan log pekerjaan, dan mengunggah dokumen terkait pada tingkat tugas. Perubahan status ini akan secara otomatis memperbarui persentase proyek utama.

- **Kolaborasi:** Sistem komentar terpusat pada setiap tugas dan proyek untuk mengurangi ketergantungan pada email atau aplikasi pesan.

- **Notifikasi:** Notifikasi instan (via email atau di dalam aplikasi) untuk pembaruan status, penugasan baru, dan balasan komentar.

- **Riwayat Aktivitas:** Semua tindakan penting (perubahan status, penugasan, komentar) akan dicatat dan dapat dilihat sebagai log audit terperinci.

## 3. Ruang Lingkup Proyek (Teknis) ⚙️

### 3.1. Pengelolaan Data (Back End)

- **Basis Data:** Direkomendasikan menggunakan basis data SQL seperti PostgreSQL karena membutuhkan integritas data yang kuat dan hubungan terstruktur antara Proyek, Tugas, dan Pengguna.
- **Struktur:** Data akan mencakup skema untuk Pengguna (dengan peran Client, Worker, Admin), Proyek, Tugas, Komentar, dan Log Aktivitas.
- **Kecepatan:** Akan diterapkan teknik caching (misalnya menggunakan Redis) untuk data yang sering diakses di Dasbor real-time.

### 3.2. Logika Bisnis (Back End)

- **Kalkulasi Kemajuan Otomatis:** Sistem akan memiliki logika untuk menghitung persentase penyelesaian proyek berdasarkan status dan bobot tugas yang telah diselesaikan di dalamnya.
- **Otorisasi Berbasis Peran:** Logika bisnis akan membatasi akses: Klien hanya dapat melihat proyek mereka, sementara Pekerja hanya dapat memanipulasi tugas yang ditugaskan kepada mereka.
- **Real-Time Synchronization:** Implementasi WebSockets adalah inti dari fitur real-time. Ini memungkinkan server untuk mendorong pembaruan data secara langsung ke browser klien segera setelah pekerja melakukan pembaruan status.

### 3.3. Authentifikasi dan Security (Back End)

- **Otentikasi:** Menggunakan JSON Web Tokens (JWT) untuk mengelola session pengguna secara aman dan stateless.
- **Keamanan:** Semua password akan di-hash menggunakan Bcrypt. Role-Based Access Control (RBAC) akan diterapkan ketat untuk otorisasi.
- **Pencegahan Serangan:** Penerapan input validation yang ketat dan penggunaan koneksi HTTPS/SSL untuk semua lalu lintas.

### 3.4. API dan Integrasi (Back End)

- **Arsitektur API:** Akan dikembangkan API RESTful atau GraphQL sebagai jembatan komunikasi antara Front End dan Back End.
- **Payment Gateway:** Jika diperlukan fitur pembayaran (misalnya untuk deposit proyek atau langganan), akan diintegrasikan dengan penyedia layanan pihak ketiga (seperti Midtrans, Xendit, atau Stripe) melalui API mereka. Ini memerlukan penanganan Webhook yang aman untuk memproses konfirmasi pembayaran.

## 4. Rencana Implementasi (Tahapan Utama) 🗓️

1. **Tahap Awal:** Setup arsitektur Front End (misalnya React/Next.js) dan Back End (misalnya Node.js/Express atau Python/Django), implementasi otentikasi dasar (login/register).

2. **Tahap Inti:** Pembangunan modul manajemen Proyek dan Tugas (CRUD), dan penerapan logika bisnis untuk perhitungan persentase kemajuan.

3. **Tahap Real-Time:** Integrasi WebSockets (Socket.IO) untuk dasbor dan sistem komentar real-time.

4. **Tahap Finalisasi & Integrasi:** Implementasi sistem notifikasi, integrasi Payment Gateway API (jika ada), pengujian keamanan (penetrasi), dan deployment.
