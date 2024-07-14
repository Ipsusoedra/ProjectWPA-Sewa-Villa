<?php
session_start();
?>
<div id="container-user d-flex flex-row justify-content-between px-3 py-4">
  <!-- start content welcome user -->
  <div class="container-user d-flex flex-row justify-content-between px-3 py-4"></div>
  <!-- end content welcome user -->
  <!-- start content form search -->
  <form class="form-search container-search mx-3 mb-4 d-flex justify-content-between align-items-center" style="height: 48px">
    <div class="input-group-search bg-white h-100">
      <input type="text" name="search" id="search" class="body-text-1 color-black-800" placeholder="Cari transaksi transaksi di sini ..." required />
    </div>

    <button type="button" onclick="search" class="h-100 d-flex align-items-center justify-content-center button-search ml-3" style="width: 48px">
      <i class="fi fi-br-search text-white" onclick="searcTransaksi();"></i>
    </button>
  </form>
  <!-- end content form search -->
  <!-- start content product list -->
  <div class="container-products w-100">
    <div class="container-product d-flex justify-content-start d-flex w-100 flex-wrap px-2 py-2">
      <?php
      include 'koneksi.php';
      $user_id = $_SESSION['user_id'];

      $result = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE user_id ='$user_id' ");
      while ($data = mysqli_fetch_array($result)) {
      ?>
        <a class="bg-warning w-100 mb-2 p-2 d-flex justify-content-between align-items-center text-decoration-none" href="javascript:void(0)" onclick="moreTransaksi(<?= $data['transaksi_id']  ?>);" style="border-radius: 10px">
          <p class="text-white m-0" style="font-size: 12px; font-weight: bold">Tanggal : <span style="font-size: 12px; font-weight: normal"><?= $data['transaksi_tanggal']  ?></span></p>
          <p class="text-white m-0" style="font-size: 12px; font-weight: bold">Status : <span style="font-size: 12px; font-weight: normal"> <?= $data['transaksi_status']  ?></span></p>
        </a>
      <?php } ?>
    </div>
    <div id="load_data_message" class="container-product d-flex justifycontent-start d-flex w-100 flex-wrap px-2 py-2"></div>
  </div>
  <!-- end content product list -->
</div>