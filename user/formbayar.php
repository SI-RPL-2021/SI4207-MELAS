<?php require_once("authentication.php"); ?>

<style>
  img.tengah {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
</style>

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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">

    <ul class="navbar-nav mr-auto">
      <div class="logo ml-2">
        <img src="../assets/logo.png" alt="" srcset="">
        <a class="navbar-brand text-blue" href="#">MELAS</a>
      </div>
    </ul>

    <ul class="navbar-nav ml-auto">
      
      <div class="my-2 my-lg-0 d-flex align-items-center topBar">
        <div class="d-flex ml-4 mr-4">
          <a class="btn-keluar my-2 my-sm-0 font-weight-bold" href="">Home</a>
        </div>
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
  
      <div class="w3-container w3-red">
        <h1 style="text-align: center; font-family: 'Poppins'; font-weight: bold;">FORM PEMBAYARAN</h1>
      </div>

<div class="container-fluid">   

	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
        <div class="container" style="margin-top:100px"> 
					<form role="form">

						<div class="form-group">
							<label for="nominal">
								Nominal
							</label>
							<input type="nominal" class="form-control" id="nominal">
						</div>

						<div class="form-group">
							<label for="jenis">
								Metode Pembayaran
							</label>
							<select class="form-control">
                <option>Kartu Debit/Kredit</option>
                <option>Virtual Account</option>
                <option>Transfer Bank</option>
                <option>M-Banking</option>
                <option>Gerai Retail</option>
              </select>
						</div>
						
						<button type="submit" class="btn btn-primary">
							Kirim
						</button>
					</form>
        </div>
				</div>
				<div class="col-md-6">
					<img class="tengah" src="../assets/pol.png" style="width: 450px;" >
				</div>
			</div>
		</div>
	</div>

</div>


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