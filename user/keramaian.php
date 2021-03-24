<?php require_once("authentication.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IZIN KERAMAIAN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style_user.css">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light">
    <img src="../assets/logo.png" alt="" srcset="" style="width:60px;height:40px;">
      <a class="navbar-brand text-primary" style="color:blue" href="#"><b>MELAS</b></a>
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
                <a class="btn-keluar my-2 my-sm-0 font-weight-bold" href="logout.php">Keluar</a>
            </div>

            </div>
        </ul>
        <!-- </div> -->
    </nav>
</header>

<main>
    <div class="title-bar d-flex justify-content-center">
        <h2 class="text-white font-weight-bold">IZIN KERAMAIAN</h2>
    </div>
    <div style="text-align: center; color: white;">
        <br>
        <h3>Izin keramaian dimaksudkan untuk menjaga suasana yang kondusif bagi semua pihak.Kelancaran suatu acara keramaian pasti harus didukung dengan persiapan pengamanan yang pas.</h3>
        <br>
    </div>
    <!-- Gambar Surat -->
    <div class="card-group" style="margin-right: 10%; margin-left: 10%;">
        <div class="card" style="margin-right: 2%;">
            <img src="https://imgv2-2-f.scribdassets.com/img/document/99386720/original/2a63775a3a/1614565402?v=1" class="" alt="...">
        </div>
        <div class="card" style="margin-left: 2%;">
            <img src="https://imgv2-1-f.scribdassets.com/img/document/357320009/original/8431ac6059/1613497068?v=1" class="card-img-top" alt="...">
        </div>
    </div>

    <!-- 2 yang di bawah apalah itu -->
    <div style="text-align: center; color: white    ;">
        <br>
        <h5>Contoh Surat Permohonan Izin Keramaian</h5>
        <br>
        <br>
        
    </div>
    <div style="text-align: center; color: white ; ">
    <h4>Ajukan Laporan<h4>
    <div class="card-group" style="margin-right: 30%; margin-left: 30%; color:black; "> 
    <div class="card" style="margin-right: 2%;">
            <h5>Upload Surat Permohonan</h5>
        </div>
        <div class="card" style="margin-left: 2%;">
           
        </div>

    </div>

    </div>

    <br>
    <br>





<footer>
    <p>&copy; MELAS, 2021.</p>
</footer>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

<body>
</body>

</html>