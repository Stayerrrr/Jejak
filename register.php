<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="registerstyle.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="registeraction.php" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            <label for="nik">NIK:</label>
            <input type="text" id="nik" name="nik" required>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value=""></option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select><br>
            <button type="submit">Register</button>
        </form>
        <br>
        <a href="login.php">Sudah punya akun?</a>
    </div>
</body>
</html>
