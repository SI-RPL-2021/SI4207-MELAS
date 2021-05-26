<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Laporan Demo - MELAS'));
require_once('../config.php');

$userID = $_SESSION["user"]["nama"];
if (isset($_POST['upload'])) {
    $rand = date("dmY");
    $ekstensi =  array('pdf');
    $filename = $_FILES['berkas']['name'];
    $ukuran = $_FILES['berkas']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
    echo "
    <script>
        alert('Pastika file berformat PDF');
    </script>";
    } else {
    if ($ukuran < 1044070000) {
        $xx = $rand . '_' . $filename;
        move_uploaded_file($_FILES['berkas']['tmp_name'], '../berkas/demo/' . $rand . '_' . $filename);
        mysqli_query($koneksi, "INSERT INTO tbl_demo (nama, berkas) VALUES('$userID','$xx')");
        header("location:laporan_demo.php?alert=berhasil_izin_demo");
        // echo 'BERHASIL';
    } else {
        echo 'GAGAL';
    }
    }
}
?>

<main>
    <div class="mb-4 title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">LAPORAN DEMO</h2>
    </div>

    <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>

    <h6 class="text-white text-center mt-4">
        Kebebasan Menyampaikan Pendapat Di Muka Umum sudah ada dalam pasal UU NO. 9, LN 1998 / NO. 181, <br>
        TLN. NO. 3789, LL SETKAB : 22 HLM
    </h6>

    <div class="contoh-laporan container d-md-flex justify-content-around">
        <div class="contoh1">
        <img src="../berkas/contoh/LAPORAN-DEMO.jpg" alt="" srcset="">
        </div>
        <div class="contoh2">
        <img src="../berkas/contoh/LAPORAN-DEMO-2.jpg" alt="" srcset="">
        </div>
    </div>
    <p class="text-center text-white">Contoh Surat Demo</p>
    <div class="footer-keramaian d-flex justify-content-center mt-4">
        <div class="ajukan-upload" style="max-width: 30%;">
        <h3 class="text-white">Ajukan Laporan</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row d-md-flex justify-content-center mt-4">
            <div class="form-group col-12">
                <div class="custom-file">
                <input type="file" class="custom-file-input" name="berkas" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            </div>
            <div class="button">
            <button href="#" type="submit" name="upload" class="btn">Kirim</button>
            </div>

        </form>
        </div>

        </div>
    </section>
</main>


<?php
include('./layout/footer.php');
?>