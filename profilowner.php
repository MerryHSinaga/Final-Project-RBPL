<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profil Owner - MJ SPORT</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[linear-gradient(to_bottom,_#123458_62%,_#030303_100%)] text-white font-sans">

  
<!-- Tombol Kembali -->
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

  <!-- Layout Utama -->
  <div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 min-h-screen bg-[#0d2236] p-6 flex flex-col items-center sticky top-0">
      <div class="w-40 h-40 mb-6">
        <img src="LogoMJ.png" alt="MJ Sport Logo" class="w-full h-full object-contain">
      </div>
      <h1 class="text-2xl font-extrabold tracking-widest mb-10">MJ SPORT</h1>
      <nav class="space-y-4 w-full">
      <a href="profiltoko-owner.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">👥 Profil Perusahaan</a>
        <a href="aktivitastoko-owner.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">🏪 Aktivitas Toko</a>
        <a href="daftarproduk-owner.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">📦 Data Produk</a>
        <a href="tampilanfeedbacktoko-owner.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">💬 Feedback Pengunjung</a>
      </nav>
    </aside>

    <!-- Konten Profil -->
    <main class="flex-1 p-10">
  <div class="max-w-3xl mx-auto bg-white bg-opacity-10 backdrop-blur-md rounded-3xl p-8 shadow-xl space-y-8">


        <!-- Biodata + Foto -->
        <div class="bg-[#0d2236] rounded-xl p-6 text-center">
          <h2 class="text-xl font-bold mb-4">Biodata</h2>
          <div class="w-28 h-28 mx-auto rounded-full overflow-hidden border-4 border-white">
            <img src="fotoprofilowner.jpg" alt="Foto Profil" class="w-full h-full object-cover">
          </div>
        </div>

        <!-- Informasi Personal dan Tambahan -->
        <div class="bg-gradient-to-r from-[#0d2236] to-[#134a8e] rounded-xl p-6 space-y-4">
          <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Informasi Personal</h3>
            
        <button onclick="window.location.href='editprofil-owner.php';"
        class="flex items-center gap-1 bg-white text-[#123458] px-3 py-1 rounded-md text-sm hover:bg-opacity-80 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h2m-1 0v14m-7-7h14" />
        </svg>
          Edit
        </button>

          </div>

          <div class="grid grid-cols-1 gap-4 text-sm">
  <p><strong>Nama Lengkap:</strong> Rapolo Siringoringo</p>
  <p><strong>Tempat, Tanggal Lahir:</strong> Simbolon, 13 Juni 2004</p>
  <p><strong>Jenis Kelamin:</strong> Laki-laki</p>
  <p><strong>Alamat:</strong> Dirgantara, Yogyakarta</p>
</div>

<hr class="border-white/30 my-4">

<h3 class="text-lg font-semibold">Informasi Tambahan</h3>
<div class="grid grid-cols-1 gap-4 text-sm">
  <p><strong>Pekerjaan:</strong> Mahasiswa</p>
  <p><strong>Minat:</strong> Bola</p>
  <p><strong>Media Sosial:</strong> @rap</p>
</div>

        </div>
      </div>
    </main>
  </div>
</body>
</html>
