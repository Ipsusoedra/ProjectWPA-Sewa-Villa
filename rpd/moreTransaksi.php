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
    <div class="title text-start px-3 pt-4 text-warning m-0">
      <h6>Informasi transaksi</h6>
      <hr style="background-color: #ffb534" />
    </div>
    <div id="load_data" class="container-product d-flex justify-content-start d-flex w-100 flex-wrap px-2 py-2"></div>
  </div>
  <!-- end content product list -->
  <!-- MODAL 1 -->
  <div class="modal fade" tabindex="-1" id="md-barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="md-barang-title">Tambah barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-barang" action="redeem.php" class="w-100" method="POST">
          <div class="modal-body border border-0">
            <input class="d-none" id="transaksi_id" name="transaksi_id" />
            <div class="form-group w-100 d-flex justify-content-center align-items-center">
              <input class="form-control w-75" type="text" id="transaksi_kode" name="transaksi_kode" style="font-size: 12px; font-weight: normal" required />
            </div>
          </div>
          <div class="modal-footer border border-0">
            <button style="font-size: 12px; font-weight: normal" type="submit" name="submit" id="btnSubmit" class="btn btn-warning text-white w-100">Bayar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- MODAL 1 -->
</div>