<?php
require_once("../config.php");
session_start();
if (isset($_SESSION["admin"])) header("Location: ./home.php");

if (isset($_POST['login'])) {

  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

  $sql = "SELECT * FROM tbl_admin WHERE username=:username OR email=:email";
  $stmt = $db->prepare($sql);

  // bind parameter ke query
  $params = array(
    ":username" => $username,
    ":email" => $username
  );

  $stmt->execute($params);

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // jika user terdaftar
  if ($user) {
    // verifikasi password
    if (password_verify($password, $user["password"])) {
      // buat Session
      session_start();
      $_SESSION["admin"] = $user;
      // login sukses, alihkan ke halaman home
      header("Location: ./home_admin.php");
    }
  } else {
    echo "<script>alert('Username tidak dapat ditemukan!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" type="image/png" href="../assets/logo.png" />


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/login.css">
</head>

<body>

  <main>
    <section class="main-body">
      <div class="leftSide">
        <div class="container">
          <div class="title">
            <img src="../assets/logo.png" alt="" srcset="">
            <h4>MELAS</h4>
          </div>
          <h6>KAMI HADIR UNTUK MELAYANI ANDA</h6>
          <img class="img-ilustrasi" src="../assets/polisi-ilustrasi.jpeg" alt="" srcset="">
        </div>
      </div>
      <div class="rightSide">
        <div class="body-login">
          <div class="text">
            <h5>Selamat Datang!</h5>
            <small>silakan masuk ke akun anda</small>
          </div>
          <form class="form-login" action="" method="POST">
            <div class="form-group">
              <label for="exampleInputUsername1">Username</label>
              <input type="username" name="username" class="form-control" id="exampleInputUsername1" placeholder="Username">

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
              <small id="passwordhelp" class="form-text text-muted float-right">
                <p style="color: #fff9f9;">Lupa password?</p>
              </small>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Masuk</button>

          </form>
          <div class="info">
            <span><i class="fas fa-info-circle"></i></span>
            <a class="text-white" href="">Informasi dan bantuan</a>
          </div>

        </div>
      </div>

    </section>
    <div class="footer">
      &copy; Melas, 2021.
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>