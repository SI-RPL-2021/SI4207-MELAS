<?php
require_once('./authentication.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $webTitle ?></title>
  <link rel="icon" type="image/png" href="../assets/logo.png" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!-- <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style> -->
  <link rel="stylesheet" href="./css/style_user.css">
</head>

<header>
  <nav class="navbar navbar-expand-lg navbar-light">

    <div class="logo2 ml-2">
      <img src="../assets/logo.png" alt="" srcset="">
      <a class="navbar-brand ml-2" href="#">MELAS</a>
    </div>

    <ul class="navbar-nav ml-auto">
      <div class="my-2 my-lg-0 d-flex align-items-center topBar">
        <div class="mr-5">
          <a href="home.php" class="font-weight-bold">Home</a>
        </div>
        <div class="hello d-flex mr-5">
          <span class="my-2 my-sm-0 mr-1"><i class="fas fa-user-circle"></i></span>
          <a class="my-2 my-sm-0 font-weight-bold" href="#">Hai,
            <?php echo  $_SESSION["user"]["nama"] ?>
          </a>
        </div>
        <div class="d-flex ml-4 mr-4">
          <span class="mr-1"><i class="fas fa-sign-out-alt"></i></span>
          <a class="btn-keluar my-2 my-sm-0 font-weight-bold" href="./logout.php">Keluar</a>
        </div>

      </div>
    </ul>
  </nav>

</header>