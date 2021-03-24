<?php require_once("authentication.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style_user.css">
</head>
        
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <div class="logo ml-2">
                <img src="../assets/logo.png" alt="" srcset="">
                <a class="navbar-brand" style="color: navy; margin-left: 2mm;" href="#"> <b>MELAS</b></a>
            </div>
        </ul>
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
        <h2 class="text-white font-weight-bold">PORTAL BERITA</h2>
    </div>
    <div style="text-align: center; color: white;">
        <br>
        <h4>Pengawalan dalam perjalanan merupakan salah satu layanan dari pihak kepolisian baik yang bersifat</h4>
        <h4>individu maupun kelompok</h4>
        <br>
    </div>
    <!-- Gambar Surat -->
    <div class="card-group" style="margin-right: 10%; margin-left: 10%;">
        <div class="card" style="margin-right: 2%;">
            <img src="https://imgv2-1-f.scribdassets.com/img/document/390872939/original/b411407657/1613141543?v=1" class="" alt="surat1">
        </div>
        <div class="card" style="margin-left: 2%;">
            <img src="https://imgv2-2-f.scribdassets.com/img/document/445648888/original/2d51b41cbc/1616020205?v=1" class="card-img-top" alt="surat2">
        </div>
    </div>

    <!-- 2 yang di bawah apalah itu -->
    <div style="text-align: center; color: white    ;">
        <br>
        <h5>Contoh Surat Permohonan Pengawalan</h5>
        <br>
        <br>
    </div>
    <div class="card-group" style="margin-right: 11%; margin-left: 11%">
        <div class="card" style="margin-right: 10%; background-color: rgba(0, 0, 0, 0.205); text-align: center;">
            <h3 style="color: white; margin-top: 5mm;">AJUKAN PERMOHONAN</h3>
            <br>
            <div class="mb-3" style="margin-left: 11%; margin-right: 11%;">
                <input class="form-control" style="align-items: right;" type="file" id="formFile" >
            </div>
            <div style="text-align: left; margin-left: 11%;">
                <button type="button" class="btn btn-dark" style="background-color: rgba(3, 3, 104, 0.562); width: 3cm;">Kirim</button>
            </div>
            <br>
        </div>
        <div class="card" style="margin-left: 10%; background-color: rgba(0, 0, 0, 0.205); text-align: center;">
            <h5 style="color: white;">
                <br>
                Catatan!!! <br><br>
                Untuk respon dari permohonan akan <br>
                disampaikan lebih lanjut lewat Email.<br><br>
                Terima kasih.
            </h5>
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