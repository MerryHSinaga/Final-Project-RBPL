<?php
include('koneksi.php');  // Menghubungkan ke database
session_start();
require_once 'auth.php';
checkAccess('admin');
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aktivitas Toko - MJ SPORT</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-[linear-gradient(to_bottom,_#123458_62%,_#030303_100%)] text-white font-sans">
  
   <!-- Tombol Back + Ikon Profil di kanan atas -->
   <div class="fixed top-6 right-6 z-50 flex items-center gap-4">

  <button onclick="history.back()" 
          class="flex items-center gap-2 text-base bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-md px-5 py-2.5 rounded-full text-white shadow-lg transition">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali
  </button>

  <!-- Ikon Profil -->
  <a href="profiladmin.php" class="bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-md p-2.5 rounded-full shadow-lg transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.828 0 5.433.877 7.879 2.363M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
  </a>
</div>
  

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 h-full w-64 bg-[#0d2236] p-6 flex flex-col items-center shadow-lg z-40">
        <div class="w-60 h-60 p-4 bg-transparent flex items-center justify-center">
            <img src="LogoMJ.png" alt="MJ Sport Logo" class="max-w-full max-h-full object-contain">
          </div>
      <h1 class="text-2xl font-extrabold tracking-widest mb-10">MJ SPORT</h1>
      <nav class="space-y-4 w-full">
      <a href="profiltoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          👥 Profil Perusahaan
        </a>
        <a href="aktivitastoko-admin.php" class="flex items-center gap-3 bg-white text-[#123458] py-2 px-4 rounded-lg font-semibold">
          🏪 Aktivitas Toko
        </a>
        <a href="daftarproduk-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          📦 Data Produk
        </a>
        <a href="tampilanfeedbacktoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          💬 Feedback Pengunjung
        </a>
        <a href="logout.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">⏻ Logout</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-80 p-10 space-y-8">
      <!-- Header Card -->
      <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl p-6 shadow-xl">
        <div class="grid md:grid-cols-2 gap-6 items-center">
          <img src="tampilantokoMJ.png" alt="Tampilan Toko" class="w-full rounded-xl shadow-md object-cover">
          <div>
            <h2 class="text-3xl font-extrabold mb-3">MJ SPORT</h2>
            <p><strong>Alamat:</strong> Caturtunggal</p>
            <p><strong>Jam Operasional:</strong> 08.00–23.00</p>
            <p><strong>Kontak:</strong> 082325970636</p>
            <p><strong>Media Sosial:</strong> <a href="https://instagram.com/majujayasport_" target="_blank" class="text-blue-400 underline">@majujayasport_</a></p>
            <p class="mt-4 text-sm">MJ Sport adalah destinasi terbaik bagi para pencinta olahraga yang mencari jersey berkualitas tinggi dan peralatan olahraga premium. Kami menyediakan berbagai macam jersey untuk tim favorit Anda, mulai dari sepak bola, basket, voli, hingga futsal, serta perlengkapan olahraga seperti sepatu, bola, dan aksesoris lainnya.</p>
            <div class="flex gap-3 mt-4 flex-wrap">
            <button onclick="window.location.href='https://wa.me/6282325970636'" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white"> Hubungi Kami</button>
            <button onclick="window.location.href='aktivitastoko-admin.php'" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white"> Lihat Aktivitas</button>
            <button onclick="window.location.href='tampilanfeedbacktoko-admin.php'" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white"> Lihat Penilaian</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Aktivitas Kolaborasi -->
      <div class="grid md:grid-cols-2 gap-6">
        <!-- Card 1 -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
          <h3 class="text-xl font-bold mb-3 text-center">MJ SPORT X GRASAK GRUSUK FC</h3>
          <img src="kolaborasi1.jpg" alt="Telaga Futsal Team" class="w-full h-48 object-contain rounded-lg mb-4" />
          <p class="text-sm text-justify">
            Sebagai penyedia perlengkapan olahraga terpercaya, MJ Sport dengan bangga berkolaborasi dengan GRASAK GRUSUK FC dalam menghadirkan jersey eksklusif untuk tim-tim terbaik. Kami menghadirkan jersey yang nyaman, fleksibel, dan menggambarkan semangat juang tim di setiap pertandingan.
          </p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl p-6 shadow-lg">
          <h3 class="text-xl font-bold mb-3 text-center">MJ SPORT X ESPANSA TEAM</h3>
          <img src="kolaborasi2.png" alt="Telaga Futsal Team" class="w-full h-48 object-contain rounded-lg mb-4" />
          <p class="text-sm text-justify">
            MJ Sport juga berkolaborasi dengan ESPANSA Team, menyediakan jersey eksklusif yang mencerminkan kekompakan dan semangat juang tim. Dengan material berkualitas dan desain yang fleksibel, MJ Sport mendukung penuh performa terbaik mereka di setiap pertandingan.
          </p>
        </div>
      </div>
    </main>
  </div>
  
</body>
</html>
