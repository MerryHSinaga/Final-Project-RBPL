<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Beri Feedback Terhadap Toko MJ Sport</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Untuk menyala bintang sesuai pilihan
    function highlightStars(rating) {
      for (let i = 1; i <= 5; i++) {
        const star = document.getElementById('star-label-' + i);
        star.classList.toggle('text-yellow-400', i <= rating);
        star.classList.toggle('text-gray-400', i > rating);
      }
      document.getElementById('rating-input').value = rating;
    }
  </script>
</head>
<body class="min-h-screen bg-gradient-to-b from-[#123458] to-black text-white font-sans">
<!-- Tombol Back -->
<div class="fixed top-6 right-6 z-50 flex items-center gap-4">
    <button onclick="history.back()" class="flex items-center gap-2 text-sm bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-md px-4 py-2 rounded-full text-white shadow-md transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
      Kembali
    </button>
    
  </div>
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 h-full w-64 bg-[#0d2236] p-6 flex flex-col items-center shadow-lg">
      <div class="w-40 h-40 p-2 flex items-center justify-center">
        <img src="LogoMJ.png" alt="MJ Sport Logo" class="w-full h-full object-contain">
      </div>
      <h1 class="text-xl font-extrabold tracking-widest mb-6">MJ SPORT</h1>
      <nav class="space-y-3 w-full">
        <a href="profiltoko-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          👥 Profil Perusahaan
        </a>
        <a href="aktivitastoko-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          🏪 Aktivitas Toko
        </a>
        <a href="daftarproduk-pengunjung.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">
          📦 Data Produk
        </a>
        <a href="tampilanfeedbacktoko-pengunjung.php" class="flex items-center gap-3 bg-white text-[#123458] py-2 px-4 rounded-lg font-semibold">
          💬 Feedback Pengunjung
        </a>
      </nav>
    </aside>

    <!-- Form Konten -->
    <main class="ml-72 p-8 w-full">
      <div class="bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl shadow-md max-w-3xl mx-auto">
        <h2 class="text-xl font-bold mb-6 text-center">Bagaimana kepuasan Anda terhadap Toko MJ Sport?</h2>

        <form action="proses_ulasan.php" method="POST" enctype="multipart/form-data" class="space-y-4">
        <div class="space-y-4">
  <div>
    <label class="block text-sm">Tanggal</label>
    <input type="date" name="tanggal" required 
      class="w-full bg-white text-black rounded-lg px-4 py-2 appearance-none" 
      min="<?= date('Y-m-d') ?>" 
      max="<?= date('Y-m-d') ?>">
  </div>
  <div>
    <label class="block text-sm">Nama Anda</label>
    <input type="text" name="nama" required 
      class="w-full p-2 rounded bg-white bg-opacity-20 backdrop-blur-md text-white placeholder-white focus:outline-none">
  </div>
  <div>
    <label class="block text-sm">Alamat</label>
    <input type="text" name="alamat" required 
      class="w-full p-2 rounded bg-white bg-opacity-20 backdrop-blur-md text-white placeholder-white focus:outline-none">
  </div>
  <div>
    <label class="block text-sm">Nomor Telepon</label>
    <input type="text" name="telepon" required 
      class="w-full p-2 rounded bg-white bg-opacity-20 backdrop-blur-md text-white placeholder-white focus:outline-none">
  </div>
</div>


          <!-- Rating -->
          <div>
            <label class="block text-sm mb-1">Rating Anda</label>
            <div class="flex gap-1 text-2xl">
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <span id="star-label-<?= $i ?>" onclick="highlightStars(<?= $i ?>)" class="cursor-pointer text-gray-400">★</span>
              <?php endfor; ?>
            </div>
            <input type="hidden" name="rating" id="rating-input" value="0">
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm">Ulasan Anda</label>
            <textarea name="ulasan" rows="4" required class="w-full p-2 rounded bg-white bg-opacity-20 backdrop-blur-md text-white placeholder-white focus:outline-none"></textarea>
          </div>
            <div>
              <label class="block text-sm">Unggah Gambar</label>
              <input type="file" name="gambar" accept="image/*" class="w-full p-2 rounded bg-white bg-opacity-20 backdrop-blur-md text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-white file:text-[#123458] hover:file:bg-gray-100">
            </div>
          </div>
          <div class="text-right">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-full text-sm transition">Simpan</button>
          </div>
        </form>
      </div>
    </main>
  </div>

</body>
</html>
