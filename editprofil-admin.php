<?php
session_start();

// Contoh data awal (bisa diganti dengan data dari database nanti)
$nama = "Merry H Sinaga";
$ttl = "Simbolon, 13 Juni 2025";
$jenis_kelamin = "Perempuan";
$alamat = "Kledokan, Yogyakarta";
$pekerjaan = "Mahasiswa";
$minat = "Musik";
$sosial = "@merry_el.s";

// Proses jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $ttl = $_POST['ttl'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $alamat = $_POST['alamat'];
  $pekerjaan = $_POST['pekerjaan'];
  $minat = $_POST['minat'];
  $sosial = $_POST['sosial'];

 
  echo "<script>alert('Profil berhasil diperbarui!');</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Profil Admin - MJ SPORT</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[linear-gradient(to_bottom,_#123458_62%,_#030303_100%)] text-white font-sans relative">

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

<div class="flex">
  <!-- Sidebar -->
  <aside class="w-64 min-h-screen bg-[#0d2236] p-6 flex flex-col items-center sticky top-0">
    <div class="w-40 h-40 mb-6">
      <img src="LogoMJ.png" alt="MJ Sport Logo" class="w-full h-full object-contain">
    </div>
    <h1 class="text-2xl font-extrabold tracking-widest mb-10">MJ SPORT</h1>
    <nav class="space-y-4 w-full">
    <a href="profiltoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">👥 Profil Perusahaan</a>
        <a href="aktivitastoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">🏪 Aktivitas Toko</a>
        <a href="daftarproduk-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">📦 Data Produk</a>
        <a href="tampilanfeedbacktoko-admin.php" class="flex items-center gap-3 hover:bg-white hover:text-[#123458] py-2 px-4 rounded-lg transition">💬 Feedback Pengunjung</a>
    </nav>
  </aside>

  <!-- Konten -->
  <main class="flex-1 p-10 pb-24">
    <form method="POST" action="editprofil-admin.php">
      <div class="max-w-3xl mx-auto bg-white bg-opacity-10 backdrop-blur-md rounded-3xl p-8 shadow-xl space-y-8">

        <!-- Foto -->
        <div class="bg-[#0d2236] rounded-xl p-6 text-center">
          <h2 class="text-xl font-bold mb-4">Edit Biodata</h2>
          <div class="w-28 h-28 mx-auto rounded-full overflow-hidden border-4 border-white">
            <img src="fotoprofiladmin.jpg" alt="Foto Profil" class="w-full h-full object-cover">
          </div>
        </div>

        <!-- Informasi Personal -->
        <div class="bg-gradient-to-r from-[#0d2236] to-[#134a8e] rounded-xl p-6 space-y-4">
          <h3 class="text-lg font-semibold">Informasi Personal</h3>
          <div class="space-y-3 text-sm">
            <div>
              <label class="block font-semibold">Nama Lengkap</label>
              <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
            <div>
              <label class="block font-semibold">Tempat, Tanggal Lahir</label>
              <input type="text" name="ttl" value="<?= htmlspecialchars($ttl) ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
            <div>
              <label class="block font-semibold">Jenis Kelamin</label>
              <input type="text" name="jenis_kelamin" value="<?= htmlspecialchars($jenis_kelamin) ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
            <div>
              <label class="block font-semibold">Alamat</label>
              <textarea name="alamat" class="w-full p-2 rounded bg-white text-black"><?= htmlspecialchars($alamat) ?></textarea>
            </div>
          </div>

          <hr class="border-white/30 my-4">

          <h3 class="text-lg font-semibold">Informasi Tambahan</h3>
          <div class="space-y-3 text-sm">
            <div>
              <label class="block font-semibold">Pekerjaan</label>
              <input type="text" name="pekerjaan" value="<?= htmlspecialchars($pekerjaan) ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
            <div>
              <label class="block font-semibold">Minat</label>
              <input type="text" name="minat" value="<?= htmlspecialchars($minat) ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
            <div>
              <label class="block font-semibold">Media Sosial</label>
              <input type="text" name="sosial" value="<?= htmlspecialchars($sosial) ?>" class="w-full p-2 rounded bg-white text-black">
            </div>
          </div>
        </div>
      </div>

      <!-- Tombol Simpan -->
      <div class="fixed bottom-8 right-8">
        <button type="submit" class="bg-white text-[#123458] px-6 py-3 rounded-full font-bold shadow-lg hover:bg-opacity-80 transition">
          Simpan Perubahan
        </button>
    </form>
  </main>
</div>

</body>
</html>
