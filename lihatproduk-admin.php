<?php
include 'koneksi.php'; // koneksi ke database

// Cek apakah parameter id dikirim
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID produk tidak ditemukan di URL.");
}

$id = intval($_GET['id']); // pastikan ID berupa integer agar aman dari injection

// Ambil data produk dari database
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = $id");
if (!$query) {
    die("Query gagal: " . mysqli_error($koneksi));
}

$data = mysqli_fetch_assoc($query);
if (!$data) {
    die("Produk tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lihat Produk - MJ Sport</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[linear-gradient(to_bottom,_#123458_62%,_#030303_100%)] text-white font-sans">
  
  <!-- Tombol Back + Ikon Profil -->
  <div class="fixed top-6 right-6 z-50 flex items-center gap-4">
    <button onclick="history.back()" class="flex items-center gap-2 text-sm bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-md px-4 py-2 rounded-full text-white shadow-md transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
      Kembali
    </button>
    <a href="profiladmin.php" class="bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-md p-2 rounded-full shadow-md transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.828 0 5.433.877 7.879 2.363M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
    </a>
  </div>

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 h-full w-64 bg-[#0d2236] p-6 flex flex-col items-center shadow-lg z-40">
      <div class="w-40 h-40 p-2 flex items-center justify-center">
        <img src="LogoMJ.png" alt="MJ Sport Logo" class="w-full h-full object-contain">
      </div>
      <h1 class="text-xl font-extrabold tracking-widest mb-6">MJ SPORT</h1>
      <nav class="space-y-3 w-full">
        <a href="profiltoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          👥 Profil Perusahaan
        </a>
        <a href="aktivitastoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          🏪 Aktivitas Toko
        </a>
        <a href="daftarproduk-admin.php" class="flex items-center gap-3 bg-white text-[#123458] py-2 px-4 rounded-lg font-semibold">
          📦 Data Produk
        </a>
        <a href="tampilanfeedbacktoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          💬 Feedback Pengunjung
        </a>
        <a href="logout.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">⏻ Logout</a>
      </nav>
    </aside>

    <!-- Konten -->
    <main class="ml-72 p-6 w-full space-y-6">

      <!-- Info & Header -->
      <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-xl px-6 py-4 shadow">
        <h2 class="text-base font-semibold">Lihat detail produk yang Anda minati di sini!</h2>
      </div>

      <!-- Detail Produk -->
      <div class="bg-white bg-opacity-10 backdrop-blur-md p-6 rounded-2xl shadow-lg space-y-6">

       <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

  <!-- Gambar Thumbnail (Kiri) -->
  <div class="flex justify-center">
    <img src="<?= $data['gambar_thumbnail']; ?>" alt="Thumbnail Produk" class="w-48 h-auto rounded-xl shadow-lg" />
  </div>

  <!-- Gambar Produk Utama (Tengah) -->
  <div class="flex justify-center">
    <img src="<?= $data['gambar_produk']; ?>" alt="Gambar Produk" class="w-64 h-auto rounded-xl shadow-lg" />
  </div>

  <!-- Deskripsi + Rating + Tombol (Kanan) -->
  <div class="space-y-4">
    <h2 class="text-3xl text-yellow-300 font-bold"><?= $data['nama']; ?></h2>
    <p class="text-sm leading-relaxed"><?= $data['deskripsi']; ?></p>
    <div class="flex items-center gap-4 mt-2">
      <span class="bg-blue-500 text-white px-4 py-2 rounded-lg">
        Rating: <?= $data['rating']; ?>/5
      </span>
      <button onclick="window.location.href='lihatulasan-admin.php?id=<?= $id ?>'" class="bg-white text-[#123458] px-4 py-2 rounded-lg font-semibold hover:bg-opacity-80 transition">
        Lihat Ulasan
      </button>
    </div>
  </div>

</div>

        <!-- Informasi Tambahan -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
  <div class="bg-white bg-opacity-20 p-4 rounded-xl shadow">
    <p class="text-xl text-yellow-300 font-bold">💰 Harga</p>
    <p class="text-lg font-bold">Rp <?= number_format($data['harga'], 0, ',', '.'); ?></p>
  </div>
  <div class="bg-white bg-opacity-20 p-4 rounded-xl shadow">
    <p class="text-xl text-yellow-300 font-bold">📏 Ukuran</p>
    <p class="text-lg font-bold"><?= $data['ukuran']; ?></p>
  </div>
  <div class="bg-white bg-opacity-20 p-4 rounded-xl shadow lg:col-span-2">
    <p class="text-xl text-yellow-300 font-bold">🧵 Spesifikasi</p>
    <ul class="text-sm list-disc ml-5 mt-2 space-y-1">
      <li><?= $data['spesifikasi']; ?></li>
    </ul>
  </div>
</div>

        
      </div>
    </main>
  </div>
</body>
</html>
