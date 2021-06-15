<?php 
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Form Pembayaran - MELAS'));
require_once('../config.php');

 
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">FORM PEMBAYARAN</h2>
  </div>

  <section class="content d-flex">
    <div class="pembayaran container d-md-flex justify-content-between">
      <div class="leftSide">
        <?php
        if (isset($_GET['metode'])) {
          if ($_GET['metode'] == 'bank') {
        ?>
            <section>
              <div class="info_tf">
                <h5 class="text-white mb-3">Transfer Bank</h5>
                <h5 class="text-white">Nomor Rekening</h5>
                <h5 class="text-white">908210830480398403</h5>
                <h5 class="text-white">Atas Nama</h5>
                <h5 class="text-white">PT. MELAS Group</h5>
              </div>

              <div class="banks">
                <div>
                  <img src="../assets/bca.png" alt="" srcset="">
                  <img src="../assets/mandiri.png" alt="" srcset="">
                  <img src="../assets/bni.png" alt="" srcset="">
                </div>
                <div>
                  <img src="../assets/bjb.png" alt="" srcset="">
                </div>
              </div>
            </section>
          <?php
          } elseif ($_GET['metode'] == "GRetail") {
          ?>
            <section>
              <div class="info_tf">
                <h5 class="text-white">Kode Pembayaran</h5>
                <h5 class="text-white">908210830480398403</h5>
              </div>

              <div class="banks" id="GRetail">
                <div class="mb-3">
                  <img src="../assets/alfamart.png" alt="" srcset="">
                </div>
                <div>
                  <img class="mr-2" src="../assets/indomart.png" alt="" srcset="">
                  <img src="../assets/circle-k.png" alt="" srcset="">
                </div>
              </div>

            </section>
          <?php
          } elseif ($_GET['metode'] == "VA") {
          ?>
            <section>
              <div class="info_tf">
                <h5 class="text-white mb-3">Virtual Account</h5>
                <h5 class="text-white">Nomor Virtual Account</h5>
                <h5 class="text-white">908210830480398403</h5>
                <h5 class="text-white">Atas Nama</h5>
                <h5 class="text-white">PT. MELAS Group</h5>
              </div>

              <div class="banks">
                <div>
                  <img src="../assets/bca.png" alt="" srcset="">
                  <img src="../assets/mandiri.png" alt="" srcset="">
                  <img src="../assets/bni.png" alt="" srcset="">
                </div>
                <div>
                  <img src="../assets/bjb.png" alt="" srcset="">
                </div>
              </div>
            </section>
          <?php
          } elseif ($_GET['metode'] == "DK") {
          ?>
            <section>
              <div class="info_tf">
                <h5 class="text-white mb-3">Debit / Kredit</h5>
                <!-- <h5 class="text-white">Nomor Virtual Account</h5>
                <h5 class="text-white">908210830480398403</h5> -->
                <h5 class="text-white">Atas Nama</h5>
                <h5 class="text-white">PT. MELAS Group</h5>
              </div>

              <div class="banks">
                <div>
                  <img src="../assets/bca.png" alt="" srcset="">
                  <img src="../assets/mandiri.png" alt="" srcset="">
                  <img src="../assets/bni.png" alt="" srcset="">
                </div>
                <div>
                  <img src="../assets/bjb.png" alt="" srcset="">
                </div>
              </div>
            </section>
          <?php
          } elseif ($_GET['metode'] == "MBanking") {
          ?>
            <section>
              <div class="info_tf">
                <h5 class="text-white mb-3">M-Banking</h5>
                <!-- <h5 class="text-white">Nomor Virtual Account</h5>
                <h5 class="text-white">908210830480398403</h5> -->
                <h5 class="text-white">Atas Nama</h5>
                <h5 class="text-white">PT. MELAS Group</h5>
              </div>

              <div class="banks">
                <div>
                  <img src="../assets/bca.png" alt="" srcset="">
                  <img src="../assets/mandiri.png" alt="" srcset="">
                  <img src="../assets/bni.png" alt="" srcset="">
                </div>
                <div>
                  <img src="../assets/bjb.png" alt="" srcset="">
                </div>
              </div>
            </section>

        <?php
          }
        }
        ?>

      </div>
      <div class="rightSide">
        <img src="../assets/polisi-ilustrasi-2.png" alt="" srcset="">
      </div>
    </div>

  </section>
</main>

<?php
include('./layout/footer.php');
?>