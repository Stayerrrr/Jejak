<?php
session_start();

// Koneksi ke database
$servername = "localhost";
$sername = "root";
$password = "";
$database = "jejak";
$conn = mysqli_connect($servername, $sername, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Formulir telah disubmit

    // Mendapatkan data dari formulir
    $nik = $_POST["login"];
    $nama = $_POST["pengguna"];

    // Menyiapkan query SQL
    $sql = "SELECT * FROM pengguna WHERE nik = ? AND nama_pengguna = ?";
    
    // Membuat prepared statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "ss", $nik, $nama);

    // Eksekusi prepared statement
    mysqli_stmt_execute($stmt);

    // Mengambil hasil query
    $result = mysqli_stmt_get_result($stmt);

    // Memeriksa apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        // Data ditemukan, set session dan alihkan ke halaman dashboard
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id_pengguna'];
        $_SESSION['username'] = $user['nama_pengguna'];
        header("Location: menu.php");
        exit();
    } else {
        // Data tidak ditemukan, lakukan tindakan yang sesuai
        echo "Data tidak ditemukan";
    }

    // Menutup prepared statement
    mysqli_stmt_close($stmt);
}

// Menutup koneksi
mysqli_close($conn);
?>
