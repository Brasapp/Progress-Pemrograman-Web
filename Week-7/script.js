document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('myForm');
    const responseDiv = document.getElementById('responseMessage');

    form.addEventListener('submit', function(event) {
        // 1. Mencegah (Prevent) submit form default yang menyebabkan page refresh
        event.preventDefault();

        // 2. Mengambil data form
        const formData = new FormData(form);
        
        // Konversi FormData ke objek URLSearchParams jika ingin mengirim sebagai x-www-form-urlencoded
        // atau biarkan sebagai FormData untuk multipart/form-data
        // Contoh: const data = new URLSearchParams(formData);

        // 3. Mengirim data menggunakan Fetch API (pendekatan modern)
        fetch('submit.php', { // Ganti 'submit.php' dengan endpoint server Anda
            method: 'POST',
            body: formData // Langsung kirim objek FormData
            // Jika menggunakan URLSearchParams, Anda perlu menambahkan header:
            /*
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: data
            */
        })
        .then(response => {
            // Cek status HTTP, jika tidak OK (misal 404, 500)
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json(); // Mengasumsikan server merespons JSON
        })
        .then(data => {
            // 4. Menampilkan hasil dan feedback ke pengguna
            console.log('Success:', data);
            
            if (data.success) {
                responseDiv.style.color = 'green';
                responseDiv.textContent = '✅ Sukses! ' + data.message;
                form.reset(); // Kosongkan form setelah sukses
            } else {
                responseDiv.style.color = 'red';
                responseDiv.textContent = '❌ Gagal! ' + data.message;
            }
        })
        .catch(error => {
            // 5. Menangani error (misal koneksi terputus)
            console.error('Error submitting the form:', error);
            responseDiv.style.color = 'red';
            responseDiv.textContent = '⚠️ Terjadi kesalahan saat mengirim data. Cek konsol.';
        });
    });
});