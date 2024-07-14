<?php
session_start();

include "koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Rockpad</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no" />
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/navigation.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/shimmer.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:600,700" rel="stylesheet" />
  <link rel="manifest" href="manifest.json" />
</head>

<body class="align-items-start pt-0 flex-column">
  <!-- NAV -->
  <nav class="navbar bottom-nav fixed-bottom navbar-expand bg-white shadow-sm col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 text-center m-auto py-3 d-flex justify-content-center align-items-center">
    <div class="bottom-nav-item d-flex justify-content-center align-items-center" id="beranda" onclick="beranda();">
      <div class="bottom-nav-link d-flex justify-content-center align-items-center">
        <p class="d-flex justify-content-center align-items-center">
          <i class="fi fi-rr-home unselected"></i>
          <i class="fi fi-sr-home selected"></i>
        </p>
      </div>
    </div>
    <div class="bottom-nav-item d-flex justify-content-center align-items-center" id="pencarian" onclick="pencarian();">
      <div class="bottom-nav-link d-flex justify-content-center align-items-center">
        <p class="d-flex justify-content-center align-items-center">
          <i class="fi fi-rr-search unselected"></i>
          <i class="fi fi-sr-search selected"></i>
        </p>
      </div>
    </div>
    <div class="bottom-nav-item d-flex justify-content-center align-items-center" id="transaksi" onclick="transaksi();">
      <div class="bottom-nav-link d-flex justify-content-center align-items-center">
        <p class="d-flex justify-content-center align-items-center">
          <i class="fi fi-rr-receipt unselected"></i>
          <i class="fi fi-sr-receipt selected"></i>
        </p>
      </div>
    </div>
    <div class="bottom-nav-item d-flex justify-content-center align-items-center" id="profil" onclick="profil();">
      <div class="bottom-nav-link d-flex justify-content-center align-items-center">
        <p>
          <i class="d-flex justify-content-center align-items-center">
            <img class="rounded-circle" src=" <?php
                                              if ($_SESSION['user_gambar'] == "") {
                                                echo "assets/images/user.png";
                                              } else {
                                                echo $_SESSION['user_gambar'];
                                              } ?> " alt="profile" id="dataImage" style="object-fit: cover; width: 28px; height: 28px" />
          </i>
        </p>
      </div>
    </div>
  </nav>
  <!-- NAV -->

  <!-- MAIN -->
  <main role="main" class="container-fluid col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 pt-0 pl-0 pr-0">
    <div id="content"></div>
  </main>
  <!-- MAIN -->

  <!-- FOOTER -->
  <footer class="container-footer w-100 mb-4 p-3 flex-row justify-contentcenter col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 m-auto"></footer>
  <!-- FOOTER -->

  <!-- MODAL 1 -->
  <div class="modal fade" tabindex="-1" id="md-barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <form id="form-barang">
          <div class="modal-header">
            <h5 class="modal-title" id="md-barang-title">Tambah barang</h5>
            <button type="button" class="close" datadismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input class="d-none" id="id" name="id" />
            <div class="form-group">
              <label>Nama Barang</label>
              <input class="form-control" type="text" id="nama" name="nama" required />
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input class="form-control" type="harga" id="harga" name="harga" required />
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="form-select" name="category" aria-label="size 3 select example" id="select-category">
                <option value="Smartphone">Smartphone</option>
                <option value="Laptop">Laptop/Notebook</option>
                <option value="Aksesoris">Aksesoris</option>
              </select>
            </div>
            <div class="form-group">
              <label>Foto</label>
              <input type="file" id="image" name="image" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" datadismiss="modal">Batal</button>
            <button type="submit" id="btnSubmit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- MODAL 1 -->

  <!-- MODAL 2 -->
  <div class="modal fade" tabindex="-1" id="md-dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="md-dialog-title">Aksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center>
            <button class="btn btn-primary" id="btnEdit" onclick="edit(this.getAttribute('data-id'))"><i class="fi fi-rr-edit"></i> Edit</button>
            <button class="btn btn-danger" id="btnHapus" onclick="hapus(this.getAttribute('data-id'))"><i class="fi fi-rr-trash"></i> Delete</button>
          </center>
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL 2 -->

  <script src="assets/js/jquery-3.6.1.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/register.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>