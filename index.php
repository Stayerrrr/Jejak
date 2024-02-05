<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign in</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <form action="process.php" method="post">
      <h1 class="anim">Rekam Jejak</h1>
      <p class="anim">Rekam jejak perjalananmu!</p>
      <input class="anim" type="text" name="login" placeholder="NIK" id="login">
      <input class="anim" type="text" name="pengguna" placeholder="Nama" id="password">
      <br>  
      <div class="check">
      <input class="anim" type="checkbox" id="remember" name="remember">
      <label class="anim">Remember me</label>
      </div>
      <input class="anim" type="submit" name="submit">
    </form>
    <p class="register-link">Belum punya akun? <a href="register.php">Register disini</a></p>
  </div>
</body>
</html>

