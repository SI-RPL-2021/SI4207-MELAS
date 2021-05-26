<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Portal Berita - MELAS'));

require_once('../config.php');

$data = mysqli_query($koneksi, "SELECT * FROM tbl_portal_berita order by time desc ");
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">PORTAL BERITA</h2>
  </div>

  <section class="content d-flex flex-column">
    <div class="list-portal d-flex flex-column align-items-center mt-4 mb-4">
      <?php
      while ($result = mysqli_fetch_array($data)) {
        $idBerita = $result["id"];
        echo "<div class='card-berita'>";
        echo "<p class='portalJudul'><a href='view_berita.php?id=$idBerita'>" . $result['judul'] . "</a></p>";
        echo "<img src='../berkas/img_berita/" . $result['img'] . "'>";
        echo "</div>";
      } ?>


      <!-- <a href="#" class="">lebih lanjut...</a> -->

    </div>

  </section>
</main>

<?php
include('./layout/footer.php');
?>