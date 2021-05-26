<?php 
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Portal Berita - MELAS'));

require_once('../config.php');

$data = mysqli_query($koneksi, "SELECT * FROM tbl_portal_berita WHERE id = $_GET[id]");
$result = mysqli_fetch_array($data);
  
?>  

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">PORTAL BERITA</h2>  
  </div>

  <section class="content d-flex flex-column">
    <div class="list-portal d-flex flex-column align-items-center mt-4 mb-4">

      <div class='card-berita-detail'>
        <p class='portalJudul'>
          <?php echo $result['judul'] ?>
        </p>
        <img src='../berkas/img_berita/<?php echo $result['img'] ?>' />
        <div class="body-text">
          <p class='time'><?php echo $result['time'] ?> | <?php echo $result['penulis'] ?></p>
          <hr>
          <p><?php echo $result['isi'] ?></p>
        </div>
      </div>

      <a href="portal_berita.php" class="">Kembali</a>

    </div>

  </section>
</main>

<?php
include('./layout/footer.php');
?>