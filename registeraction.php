<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jejak";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];

// Query untuk menyimpan data ke database
$sql = "INSERT INTO pengguna (nama_pengguna, nik, alamat_pengguna, jenis_kelamin) VALUES ('$nama', '$nik', '$alamat', '$jenis_kelamin')";

if ($conn->query($sql) === TRUE) {
    header("Location: login.php");
        exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
