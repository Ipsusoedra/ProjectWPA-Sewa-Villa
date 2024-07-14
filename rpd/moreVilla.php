<?php
session_start();



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
      <h6>Informasi Villa</h6>
      <hr style="background-color: #ffb534" />

    </div>
    <div id="load_data" class="container-product d-flex justify-content-start d-flex w-100 flex-wrap px-2 py-2"></div>
  </div>
  <!-- end content product list -->

  <!-- MODAL 1 -->
  <div class="modal fade " tabindex="-1" id="md-barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="md-barang-title">Tambah barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-barang" action="beli.php" class="w-100" method="POST">
          <div class="modal-body border border-0">
            <input class="d-none" id="transaksi_id" name="transaksi_id" />
            <div class="form-group w-100 d-flex justify-content-center align-items-center">
              <label style="font-size: 12px; font-weight: bold" class="w-50 text-secondary">User_id</label>
              <input class="form-control w-75" type="text" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>" placeholder="<?= $_SESSION['user_nama'] ?>" style="font-size: 12px; font-weight: normal" required readonly />
            </div>
            <div class="form-group w-100 d-flex justify-content-center align-items-center">
              <label style="font-size: 12px; font-weight: bold" class="w-50 text-secondary">Villa_id</label>
              <input class="form-control w-75" type="text" id="villa_id" name="villa_id" style="font-size: 12px; font-weight: normal" required readonly />
            </div>
            <div class="form-group w-100 d-flex justify-content-center align-items-center">
              <label style="font-size: 12px; font-weight: bold" class="w-50 text-secondary">Metode pembayaran</label>
              <select class="form-select form-select-sm w-75 border border-secondary bg-warning text-white p-2 rounded" aria-label=".form-select-sm example" style="font-size: 12px; font-weight: normal" name="payment_id" id="payment_id" required>

                <option class="text-white" selected>Pilih metode pembayaran</option>
                <?php
                include 'koneksi.php';


                $result = mysqli_query($koneksi, "SELECT * FROM tb_payment ");
                while ($data = mysqli_fetch_array($result)) {
                ?>
                  <option class="text-white" name="payment_id" value="<?= $data['payment_id']  ?>"><?= $data['payment_nama']  ?> - <?= $data['payment_harga']  ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group w-100 d-flex justify-content-center align-items-center">
              <label style="font-size: 12px; font-weight: bold" class="w-50 text-secondary">Jumlah orang</label>
              <input class="form-control w-75" type="text" id="jumlah_orang" name="jumlah_orang" value="<?php $jumlah_orang ?>" style="font-size: 12px; font-weight: normal" required />
            </div>
          </div>
          <div class="modal-footer border border-0">
            <button style="font-size: 12px; font-weight: normal" type="button" class="btn btn-secondary text-white" data-dismiss="modal">Batal</button>
            <button style="font-size: 12px; font-weight: normal" type="submit" name="submit" id="btnSubmit" class="btn btn-warning text-white">Konfirmasi</button>

          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- MODAL 1 -->
</div>