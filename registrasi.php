<?php
require_once("config.php");
session_start();
if (isset($_SESSION["user"])) header("Location: ./user/home.php");

if (isset($_POST['register'])) {
  // filter data yang diinputkan
  $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  // enkripsi password
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


  // menyiapkan query
  $sql = "INSERT INTO tbl_users (nama, username, email, password) 
            VALUES (:nama, :username, :email, :password)";
  $stmt = $db->prepare($sql);

  // bind parameter ke query
  $params = array(
    ":nama" => $nama,
    ":username" => $username,
    ":password" => $password,
    ":email" => $email
  );

  // eksekusi query untuk menyimpan ke database
  $saved = $stmt->execute($params);

  // jika query simpan berhasil, maka user sudah terdaftar
  // maka alihkan ke halaman login
  if ($saved) {
    echo "
    <script>
      alert('Registrasi Berhasil, Silakan Login!');
      window.location = 'index.php';
    </script>
    ";
    // header("Location: index.php");
  };
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <link rel="icon" type="image/png" href="./assets/logo.png" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

  <link rel="stylesheet" href="registrasi.css">
</head>

<body>

  <main>
    <div class="header">
      <div class="logo">
        <img src="./assets/logo.png" alt="" srcset="">
        <h5>MELAS</h5>
      </div>
      <a href="index.php">Masuk</a>
    </div>
    <section class="main-body">
      <div class="container-form">
        <div class="title">
          <h2>Pendaftaran</h2>
          <p>daftarkan diri anda untuk mendapatkan layanan dari MELAS!</p>
        </div>
        <form method="POST" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
          </div>

          <button type="submit" name="register" class="btn btn-primary">Daftar Sekarang</button>
        </form>
      </div>

    </section>
    <div class="footer">
      <p>&copy; MELAS, 2021.</p>
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>