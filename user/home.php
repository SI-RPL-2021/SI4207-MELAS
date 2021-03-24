<?php require_once("authentication.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MELAS</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/style.css">
</head>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">

    <ul class="navbar-nav ml-auto">
      <div class="my-2 my-lg-0 d-flex align-items-center topBar">
        <div class="hello d-flex mr-5">
          <span class="my-2 my-sm-0 mr-1"><i class="fas fa-user-circle"></i></span>
          <a class="my-2 my-sm-0 font-weight-bold" href="#">Hai, <?php echo  $_SESSION["user"]["nama"] ?></a>
        </div>
        <div class="d-flex ml-4 mr-4">
          <span class="mr-1"><i class="fas fa-sign-out-alt"></i></span>
          <a class="btn-keluar my-2 my-sm-0 font-weight-bold" href="logout.php">Keluar</a>
        </div>

      </div>
    </ul>
    <!-- </div> -->
  </nav>

</header>

<main>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="logo ml-2">
      <img src="../assets/logo.png" alt="" srcset="">
      <a class="navbar-brand text-white" href="#">MELAS</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto font-weight-bold mr-5">
        <li class="nav-item">
          <a class="nav-link text-white" href="portal_berita.php">Berita </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Pembayaran</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Layanan
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">item 1</a>
            <a class="dropdown-item" href="#">item 2</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">item 3</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <section class="content d-flex flex-column">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="../assets/kantor-bg.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>SELAMAT DATANG DI MELAS</h1>
            <h5>KAMI HADIR UNTUK MELAYANI ANDA</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../assets/kantor-bg.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>SELAMAT DATANG DI MELAS</h1>
            <h5>KAMI HADIR UNTUK MELAYANI ANDA</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../assets/kantor-bg.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>SELAMAT DATANG DI MELAS</h1>
            <h5>KAMI HADIR UNTUK MELAYANI ANDA</h5>
          </div>
        </div>
      </div>

    </div>
    <p>Website ini berguna untuk meningkatkan kualitas pelayanan publik masyarakat Indonesia</p>
  </section>
</main>

<footer>
  <p>&copy; MELAS, 2021.</p>
</footer>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<body>

</body>

</html>