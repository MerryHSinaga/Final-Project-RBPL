<?php
// Mulai sesi jika diperlukan
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profil Perusahaan - MJ SPORT</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[linear-gradient(to_bottom,_#123458_62%,_#030303_100%)] text-white font-sans">

  <!-- Tombol Back di kanan atas -->
  <div class="fixed top-6 right-6 z-50 flex items-center gap-4">

    <button onclick="history.back()" 
            class="flex items-center gap-3 text-base bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-md px-5 py-2.5 rounded-full text-white shadow-lg transition">
      <!-- Ikon panah -->
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
      Kembali
    </button>
  </div>

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 h-full w-64 bg-[#0d2236] p-6 flex flex-col items-center shadow-lg z-40">
        <div class="w-60 h-60 p-4 bg-transparent flex items-center justify-center">
            <img src="LogoMJ.png" alt="MJ Sport Logo" class="max-w-full max-h-full object-contain">
          </div>
          
      <h1 class="text-2xl font-extrabold tracking-widest mb-10">MJ SPORT</h1>
      <nav class="space-y-4 w-full">
        <a href="profiltoko-pengunjung.php" class="flex items-center gap-3 bg-white text-[#123458] py-2 px-4 rounded-lg font-semibold">
          👥 Profil Perusahaan
        </a>
        <a href="aktivitastoko-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          🏪 Aktivitas Toko
        </a>
        <a href="daftarproduk-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          📦 Data Produk
        </a>
        <a href="tampilanfeedbacktoko-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          💬 Feedback Pengunjung
        </a>
      </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="ml-80 p-10 space-y-8">
      <!-- Header Card -->
      <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl p-6 shadow-xl">
        <div class="grid md:grid-cols-2 gap-6 items-center">
          <img src="fotoperusahaanMJ.png" alt="Foto Toko MJ Sport" class="w-full rounded-xl shadow-md object-cover">
          <div>
            <h2 class="text-3xl font-extrabold mb-3">MJ SPORT</h2>
            <p><strong>Alamat:</strong> Caturtunggal</p>
            <p><strong>Jam Operasional:</strong> 08.00–23.00</p>
            <p><strong>Kontak:</strong> 082325970636</p>
            <p><strong>Media Sosial:</strong> <a href="https://instagram.com/majujayasport_" target="_blank" class="text-blue-400 underline">@majujayasport_</a></p>
            <ul class="text-sm mt-4 list-disc pl-5 space-y-1">
              <li>Kualitas Terjamin</li>
              <li>Harga Bersahabat</li>
              <li>Pelayanan Cepat</li>
              <li>Pengiriman Aman dan Tepat Waktu</li>
            </ul>
            <div class="flex gap-3 mt-4">
            <button onclick="window.location.href='https://wa.me/6282325970636'" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white"> Hubungi Kami</button>
            <button onclick="window.location.href='aktivitastoko-pengunjung.php'" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white"> Lihat Aktivitas</button>
            <button onclick="window.location.href='tampilanfeedbacktoko-pengunjung.php'" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white"> Lihat Penilaian</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Bagian Logo dan Sosial Media -->
      <div class="grid md:grid-cols-2 gap-6">
        <!-- Logo -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl p-6 text-center shadow-lg">
          <h3 class="text-xl font-bold mb-4">LOGO</h3>
          <img src="LogoMJ.png" alt="MJ Sport Logo" class="w-full h-60 object-contain mx-auto">

        </div>
        
        <!-- Sosial Media -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl p-6 shadow-lg text-center">
          <h3 class="text-xl font-bold mb-4">VISIT US</h3>
          <p class="mb-2">Instagram: <a href="https://instagram.com/majujayasport_" class="text-blue-400 underline" target="_blank">instagram.com/majujayasport_</a></p>
          <div class="flex flex-wrap justify-center gap-4 mb-6">
            <img src="instagramlookMJ1.png" alt="Instagram Look 1" class="w-40 h-28 rounded-lg border-2 border-white object-cover">
            <img src="instagramlookMJ2.png" alt="Instagram Look 2" class="w-40 h-28 rounded-lg border-2 border-white object-cover">
            <img src="instagramlookMJ3.png" alt="Instagram Look 3" class="w-40 h-28 rounded-lg border-2 border-white object-cover">
          </div>
                  
          <p class="mb-2">Lokasi: 
            <a href="https://maps.app.goo.gl/FVYAS1g72Cp3PVF48" class="text-blue-400 underline" target="_blank">
              Google Maps
            </a>
          </p>
        </div>
      </div>
    </main>
  </div>

</body>
</html>
