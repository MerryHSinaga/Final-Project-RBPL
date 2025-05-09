<?php
// Mulai sesi
session_start();

// Variabel untuk menangani pesan error jika login gagal
$error_message = '';

// Proses login saat form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Misalkan ini adalah data yang valid (contoh sederhana, Anda bisa menggantinya dengan database)
    $valid_email_admin = 'admin@mjsport.com';
    $valid_password_admin = 'admin123';
    
    $valid_email_owner = 'owner@mjsport.com';
    $valid_password_owner = 'owner123';

    // Cek apakah email dan password valid
    if (($email == $valid_email_admin && $password == $valid_password_admin) || 
        ($email == $valid_email_owner && $password == $valid_password_owner)) {
        
        // Set sesi berdasarkan tipe pengguna
        $_SESSION['user_email'] = $email;
        $_SESSION['user_type'] = ($email == $valid_email_admin) ? 'admin' : 'owner';
        
        // Redirect ke halaman dashboard atau halaman lainnya
        header('Location: dashboard.php');
        exit();
    } else {
        // Jika login gagal, tampilkan pesan error
        $error_message = 'Email atau password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - MJ SPORT</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-[linear-gradient(to_bottom,_#123458_62%,_#030303_100%)] p-6">

  <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl max-w-6xl w-full p-6 md:p-10 grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Logo Besar -->
    <div class="flex justify-center items-center overflow-hidden rounded-full">
      <div class="w-60 h-60 bg-black rounded-full border-4 border-white shadow-lg flex items-center justify-center overflow-hidden">
        <div class="w-60 h-60 p-4 bg-transparent flex items-center justify-center">
          <img src="LogoMJ.png" alt="MJ Sport Logo" class="w-full h-full object-contain">
        </div>
      </div>
    </div>

    <!-- Form Login -->
    <div class="rounded-xl p-8 bg-[linear-gradient(to_bottom,_#123458_62%,_#030303_100%)] shadow-xl text-white">
      <!-- Logo Kecil + MJ SPORT -->
      <div class="flex items-center justify-center mb-6 space-x-2">
        <img src="LogoMJ.png" alt="Logo Kecil" class="w-8 h-8 rounded-full bg-white object-cover">
        <h1 class="text-2xl font-extrabold tracking-widest">MJ SPORT</h1>
      </div>

      <!-- Sambutan -->
      <div class="text-center mb-6">
        <h2 class="text-2xl font-bold">Selamat Datang!</h2>
        <p class="text-sm text-gray-200">Sebelum melanjutkan, login terlebih dahulu ya!</p>
      </div>

      <!-- Pesan Error -->
      <?php if (!empty($error_message)): ?>
        <div class="bg-red-500 text-white p-2 rounded-lg mb-4">
          <?php echo $error_message; ?>
        </div>
      <?php endif; ?>

      <!-- Form -->
      <form action="login.php" method="post" class="space-y-4">
        <div class="relative">
          <input type="email" name="email" placeholder="Email Address" required
            class="w-full py-2 pl-10 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-white text-black">
          <span class="absolute left-3 top-2.5 text-gray-500">📧</span>
        </div>
        <div class="relative">
          <input type="password" name="password" placeholder="Password" required
            class="w-full py-2 pl-10 pr-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-white text-black">
          <span class="absolute left-3 top-2.5 text-gray-500">🔒</span>
        </div>

        <!-- Tombol Login -->
        <div class="flex gap-4 mb-4">
          <button type="submit" class="w-1/2 bg-blue-500 hover:bg-blue-600 py-2 rounded-lg font-semibold text-white transition">
            Login Admin
          </button>
          <button type="submit" class="w-1/2 bg-blue-500 hover:bg-blue-600 py-2 rounded-lg font-semibold text-white transition">
            Login Owner
          </button>
        </div>

        <!-- Tombol Lihat Profil Toko MJ Sport -->
        <div class="text-center">
          <div class="text-center">
            <a 
              href="profiltoko-pengunjung.php" 
              class="inline-block bg-gradient-to-b from-blue-400 to-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition"
            >
              Lihat Profil MJ Sport
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
