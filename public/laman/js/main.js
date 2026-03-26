/* =========================================
   PUBLIC/LAMAN/JS/MAIN.JS
   ========================================= */

// Memastikan semua elemen web dimuat sebelum menjalankan script
document.addEventListener('DOMContentLoaded', function() {
    
    // Inisialisasi AOS (Animate On Scroll)
    AOS.init({
        once: true,    // Animasi hanya berjalan satu kali saat pertama kali discroll
        offset: 100,   // Mulai animasi ketika elemen 100px masuk ke layar
        easing: 'ease-in-out',
        duration: 800  // Durasi default animasi (opsional)
    });

    // Anda bisa menambahkan script custom lainnya di bawah ini nanti
    console.log("Website LLDIKTI VII Berhasil Dimuat!");

});