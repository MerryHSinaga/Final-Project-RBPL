<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Feedback owner Terhadap Toko MJ Sport</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
  <aside class="fixed top-0 left-0 h-full w-64 bg-[#0d2236] p-6 flex flex-col items-center shadow-lg z-40">
    <div class="w-40 h-40 p-2 flex items-center justify-center">
      <img src="LogoMJ.png" alt="MJ Sport Logo" class="w-full h-full object-contain">
    </div>
    <h1 class="text-xl font-extrabold tracking-widest mb-6">MJ SPORT</h1>
    <nav class="space-y-3 w-full">
      <a href="profiltoko-owner.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">👥 Profil Perusahaan</a>
      <a href="aktivitastoko-owner.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">🏪 Aktivitas Toko</a>
      <a href="daftarproduk-owner.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">📦 Data Produk</a>
      <a href="tampilanfeedbacktoko-owner.php" class="flex items-center gap-3 bg-white text-[#123458] py-2 px-4 rounded-lg font-semibold">💬 Feedback owner</a>
      <a href="logout.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">⏻ Logout</a>
    </nav>
  </aside>

  <!-- Konten Utama -->
  <main class="ml-72 p-6 w-full space-y-6">
    <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-xl px-6 py-4 shadow">
      <h2 class="text-base font-semibold text-center">Feedback dari owner terhadap MJ Sport</h2>
    </div>

    <!-- Daftar Ulasan -->
    <div class="space-y-6">
      <?php
 include('koneksi.php');  // Menghubungkan ke database
session_start();
require_once 'auth.php';
checkAccess('owner');

      // Query untuk mendapatkan maksimal 4 feedback terbaru dari database
      $sql = "SELECT * FROM feedback_toko ORDER BY id DESC LIMIT 4";
      $result = $koneksi->query($sql);

      if ($result->num_rows > 0) {
        // Loop untuk menampilkan data ulasan
        while ($row = $result->fetch_assoc()) {
          // Ambil data dari database
          $user = $row['nama'];
          $tanggal = date('d F Y', strtotime($row['tanggal']));
          $ulasan = $row['ulasan'];
          $rating = $row['rating'];
          $gambar = $row['gambar'];

          // Menampilkan ulasan
          echo '
          <div class="bg-white bg-opacity-10 backdrop-blur-md p-4 rounded-xl flex flex-col md:flex-row justify-between gap-4 shadow-lg">
            <div class="flex-1">
              <div class="flex justify-between items-center text-sm mb-2">
                <span class="font-semibold">' . htmlspecialchars($user) . '</span>
                <span class="text-gray-300">' . $tanggal . '</span>
              </div>
              <p class="text-white mb-2">Kata MJ Sport-nation :</p>
              <p class="text-white mb-2">"'. htmlspecialchars($ulasan) .'"</p>
              <div class="text-yellow-400 text-lg">
                ';

                // Menampilkan rating dalam bentuk bintang
                for ($i = 1; $i <= 5; $i++) {
                  if ($i <= $rating) {
                    echo '<span class="text-yellow-400">★</span>';  // Bintang terisi
                  } else {
                    echo '<span class="text-gray-400">☆</span>';  // Bintang kosong
                  }
                }

                echo '</div>
            </div>
            <div class="md:w-40 md:h-32 flex-shrink-0 rounded-lg overflow-hidden">';
              
              // Menangani gambar jika ada
              if (!empty($gambar)) {
                echo '<img src="uploads/' . htmlspecialchars($gambar) . '" alt="Gambar Feedback" class="w-full h-full object-cover">';
              } else {
                echo '<img src="uploads/default-image.jpg" alt="Gambar Feedback" class="w-full h-full object-cover">'; // Gambar default jika tidak ada
              }

              echo '</div>
          </div>
          ';
        }
      } else {
        // Jika tidak ada ulasan, tampilkan pesan
        echo '<p class="text-center text-xl font-semibold text-white">Belum ada feedback dari pelanggan terhadap toko!</p>';
      }

      // Menutup koneksi database
      $koneksi->close();
      ?>
    </div>

    <!-- Tombol aksi -->
    <div class="flex justify-end gap-4 mt-6">
      <button onclick="window.location.href='tampilanfeedbacktoko-owner.php'" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white"> Selesai</button>
    </div>
  </main>
</div>
</body>
</html>
