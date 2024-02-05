<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: process.php");
    exit();
}

// Ambil informasi pengguna dari sesi
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Misalnya, Anda ingin mengambil informasi pengguna lain dari database, Anda dapat melakukan query ke database.
// Contoh:
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
  <link rel="stylesheet" href="dashboard.css">
  <title>Dashboard</title>
</head>
<body>

  <div class="dashboard">
    <header>
      <h1>Selamat Datang, <?php echo $username; ?>!</h1>
    </header>
    
    <nav>
      <ul>
        <li><a href="menu.php">Home</a></li>
        <li><a href="profil.php">Profile</a></li>
        <li><a href="rekam.php">Rekam Jejak</a></li>
      </ul>
    </nav>
    
    <section class="main-content">
      <p>NIK: <?php echo $user['nik']; ?></p>
      <p>Alamat: <?php echo $user['alamat_pengguna']; ?></p>
      <p>Jenis Kelamin: <?php echo $user['jenis_kelamin']; ?></p>
    </section>
  </div>

</body>
</html>