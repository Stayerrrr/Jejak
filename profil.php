<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil informasi pengguna dari sesi
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Query ke database untuk mendapatkan informasi pengguna
$servername = "localhost";
$sername = "root";
$password = "";
$database = "jejak";
$conn = mysqli_connect($servername, $sername, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM pengguna WHERE id_pengguna = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Jangan lupa menutup koneksi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="profile.css">
  <title>Profile</title>
</head>
<body>

  <div class="profile">
    <header>
      <h1>User Profile - <?php echo $username; ?></h1>
    </header>
    
    <section class="profile-content">
      <h2>User Information</h2>
      <p>Name: <?php echo $user['nama_pengguna']; ?></p>
      <p>NIK: <?php echo $user['nik']; ?></p>
      <p>Alamat: <?php echo $user['alamat_pengguna']; ?></p>
      
      <!-- Tambahkan elemen lain sesuai dengan informasi pengguna yang ingin ditampilkan -->
      
      <!-- Tombol Logout -->
      <form action="logout.php" method="post">
        <button type="submit" class="logout-button">Logout</button>
      </form>
    </section>

    <footer>
      <p><a href="Menu.php">Kembali</a></p>
    </footer>
  </div>

</body>
</html>
