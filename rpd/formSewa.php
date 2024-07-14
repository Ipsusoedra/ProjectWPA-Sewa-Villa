<?php
include 'koneksi.php';
session_start();

if (isset($_POST['konfirmasi'])) {
  $user_id = $_SESSION['user_id'];
  $villa_id = $_SESSION['villa_id'];
  $payment_id = $_POST['payment_id'];
  $jumlah_orang = $_POST['jumlah_orang'];
  $harga_charge = $_POST['harga_charge'];
  $transaksi_total = $_POST['transaksi_total'];
  $transaksi_kode = $_POST['transaksi_kode'];
  $transaksi_tanggal = $_POST['transaksi_tanggal'];
  $transaksi_status = $_POST['transaksi_status'];


  function code()
  {
    $n = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZabscedghijklmnopqrstuvwxyz';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }
    return $randomString;
  };
  $code = code();
  if ($jumlah_orang <= $_POST['villa_kapasitas'] or $jumlah_orang != 0) {
    $harga_charge = 0;
    $insert = mysqli_query($koneksi, "INSERT INTO tb_transaksi VALUES (NULL, '$user_id', '$villa_id','$payment_id','$jumlah_orang','$harga_charge','$transaksi_total', '$code' , CURRENT_TIMESTAMP()");
  } elseif ($jumlah_orang > $_POST['villa_kapasitas']) {

    $harga_charge = 1000000;
    $insert = mysqli_query($koneksi, "INSERT INTO tb_transaksi VALUES (NULL, '$user_id', '$villa_id','$payment_id','$jumlah_orang','$harga_charge','$transaksi_total', '$code' , CURRENT_TIMESTAMP(), '$transaksi_status' ");
  } else {
    echo `<script type="text/JavaScript">
    alert('Mohon isikan jumlah anggota yang menginap');
  </script>`;
  }
}

?>

<div id="container-user d-flex flex-row justify-content-between px-3 py-4">
  <!-- start content welcome user -->
  <div class="container-user d-flex justify-content-between align-items-center px-3 py-2 bg-warning">
    <h5 class="text-white"><b>ROCKPAD</b></h5>
    <a href="" class="text-decoration-none">
      <i class="fi fi-rr-comments text-white" style="font-size: 28px"></i>
    </a>
  </div>
  <!-- end content welcome user -->

  <!-- end content form search -->
  <!-- start content product list -->
  <div class="container-products w-100 p-0 m-0">
    <div class="title text-center px-3 pt-4 text-warning m-0">
      <h6>Form Transaksi</h6>
      <hr style="background-color: #ffb534" />
    </div>
    <div id="load_data" class="container-product d-flex justify-content-start d-flex w-100 flex-wrap px-2 py-2"></div>
  </div>
  <!-- end content product list -->

</div>