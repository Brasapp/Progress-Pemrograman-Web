document.getElementById('zipCodeForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form melakukan reload halaman

    // 1. Ambil nilai dari input
    const provinsi = document.getElementById('provinsi').value.trim();
    const kota = document.getElementById('kota').value.trim();
    const kecamatan = document.getElementById('kecamatan').value.trim();
    const outputDiv = document.getElementById('output');

    // Kosongkan hasil sebelumnya
    outputDiv.innerHTML = '<p>Sedang mencari...</p>';

    // 2. SIMULASI FUNGSI PENCARIAN (IDEALNYA: Panggil API di sini)
    // ---
    // Di aplikasi nyata, Anda akan menggunakan 'fetch()' untuk memanggil API
    // dengan data provinsi, kota, dan kecamatan sebagai parameter.
    // ---

    // Data Dummy/Contoh untuk simulasi
    const dummyData = [
        { provinsi: "Jawa Barat", kota: "Bandung", kecamatan: "Coblong", kodePos: "40131", kelurahan: "Dago" },
        { provinsi: "Jawa Barat", kota: "Bandung", kecamatan: "Coblong", kodePos: "40132", kelurahan: "Cipaganti" },
        { provinsi: "Jawa Tengah", kota: "Semarang", kecamatan: "Tembalang", kodePos: "50275", kelurahan: "Bulusan" },
        { provinsi: "DKI Jakarta", kota: "Jakarta Pusat", kecamatan: "Gambir", kodePos: "10110", kelurahan: "Gambir" }
    ];

    // Filter data dummy berdasarkan input
    const results = dummyData.filter(item => 
        item.provinsi.toLowerCase() === provinsi.toLowerCase() &&
        item.kota.toLowerCase().includes(kota.toLowerCase()) && // Menggunakan includes untuk pencarian yang lebih fleksibel
        item.kecamatan.toLowerCase().includes(kecamatan.toLowerCase())
    );

    // 3. Tampilkan hasil
    if (results.length > 0) {
        outputDiv.innerHTML = ''; // Kosongkan
        results.forEach(item => {
            const resultItem = document.createElement('div');
            resultItem.classList.add('result-item');
            
            // Output Informasi Daerah dan Kode Pos
            resultItem.innerHTML = `
                <p><strong>Daerah:</strong> Kel. ${item.kelurahan}, Kec. ${item.kecamatan}</p>
                <p><strong>Kota/Kab:</strong> ${item.kota}, Prov. ${item.provinsi}</p>
                <p><strong>Kode Pos:</strong> <span class="zip-code">${item.kodePos}</span></p>
            `;
            outputDiv.appendChild(resultItem);
        });
    } else {
        outputDiv.innerHTML = `
            <p>❌ Maaf, Kode Pos untuk daerah <strong>${kecamatan}</strong>, <strong>${kota}</strong>, <strong>${provinsi}</strong> tidak ditemukan dalam data simulasi.</p>
            <p>Pastikan ejaan sudah benar atau coba cari daerah terdekat.</p>
        `;
    }
});