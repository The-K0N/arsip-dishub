<?php
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];
  // ambil username berdasarkan id
  $result = mysqli_query($koneksi, "SELECT username FROM user WHERE id_user = $id");
  $row = mysqli_fetch_assoc($result);
  // cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}

// Jika tombol login ditekan
if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

  // cek username 
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // set session
      $_SESSION["username"] = $row["username"];
      $_SESSION["nip"] = $row["nip"];
      $_SESSION["nama"] = $row["nama"];
      $_SESSION["akses"] = $row["akses"];
      $_SESSION["id_user"] = $row["id_user"];
      $_SESSION["login"] = true;

      // cek remember me
      if (isset($_POST["remember_me"])) {
        // buat cookie
        setcookie('id', $row['id_user'], time() + 60 * 60 * 24 * 3);
        setcookie('key', hash('sha256', $row['username']), time() + 60 * 60 * 24 * 3);
      }

      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/bootstrap.min.css">

  <!-- CSS -->
  <link rel="stylesheet" href="vendor/style.css">
  <link rel="shortcut icon" type="text/css" href="img/Logo_DISHUB_icon.png">

  <title>Login</title>
</head>

<body class="background-img">

  <div class="container mt-3 mb-3 rounded">
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>

    <div class="row justify-content-center">
      <div class="col-lg-4 bg-white p-4 login" style="border-radius: 2rem;">

        <h3 class="card-text text-center">Pencatatan Arsip</h3>
        <br>

        <div class="card text-center border-0">
          <img src="img/Logo_DISHUB.png" class="card-img-top mx-auto">
          <div class="card-body">
            <h4 class="card-text">Dinas Perhubungan <br>Kab. Lombok Tengah</h4>
            <br>
          </div>
        </div>
        <?php if (isset($error)) : ?>
          <p class="alert alert-danger"> Username / Password yg Anda Masukkan SALAH !</p>
        <?php endif; ?>
        <form action="" method="post">
          <div class="form-group">
            <label for="username"><img src="img/baseline_account_circle_black_18dp.png"> Username</label>
            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
          </div>
          <div class="form-group">
            <label for="password"><img src="img/baseline_https_black_18dp.png"> Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
            <label class="form-check-label" for="remember_me">Remember Me</label>
          </div>
          <br>
          <center><button type="submit" class="btn btn-success" style="font-weight: bolder; font-family: arial;" name="login">&emsp;<img src="icon/key.png">&ensp; Login &emsp;</button></center>
          <br>

          <center>
            <p style=" font-family: arial; font-size: 14px; margin-top: 10%; font-weight: bold;">COPYRIGHT &copy; <?= date('Y'); ?> DISHUB</p>
          </center>
          <center>
            <p style=" font-family: arial; font-size: 10px; margin-top: 10%; font-weight: bold;">By <a href='https://the-k0n.github.io/' title='The-K0N.dev' target='_blank'>The-K0N.dev</a></p>
          </center>

        </form>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="vendor/jquery-3.3.1.slim.min.js"></script>
  <script src="vendor/popper.min.js"></script>
  <script src="vendor/bootstrap.min.js"></script>

</body>

</html>