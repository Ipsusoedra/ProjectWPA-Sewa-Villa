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
  <div class="container d-flex justify-content-center align-items-center flex-column" style="height: 600px;">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-6 w-100 d-flex justify-content-center align-items-center flex-column">
        <h3 class="text-warning">ROCKPAD</h3>
        <p class="text-warning">Please to register first!</p>
      </div>
    </div>

    <div class="row w-100 d-flex justify-content-center align-items-center">
      <div class="w-75 d-flex justify-content-center align-items-center flex-column">
        <form id="form-barang" class="w-100">
          <div class="mb-3 w-100">
            <input type="hidden" style="font-size: 12px; font-weight: normal" class="form-control py-4" placeholder="Masukkan username ..." id="user_id" name="user_id" aria-describedby="emailHelp" />
          </div>
          <div class="mb-3 w-100">
            <label for="user_nama" class="form-label text-secondary" style="font-size: 12px; font-weight: bold">Username</label>
            <input type="text" style="font-size: 12px; font-weight: normal" class="form-control py-4" placeholder="Masukkan username ..." id="user_nama" name="user_nama" aria-describedby="emailHelp" required />
          </div>
          <div class="mb-3 w-100">
            <label for="user_kontak" class="form-label text-secondary" style="font-size: 12px; font-weight: bold">Kontak</label>
            <input type="text" style="font-size: 12px; font-weight: normal" class="form-control py-4" placeholder="Masukkan kontak ..." id="user_kontak" name="user_kontak" aria-describedby="emailHelp" required />
          </div>
          <div class="mb-3 w-100">
            <input type="hidden" style="font-size: 12px; font-weight: normal" class="form-control py-4" placeholder="Masukkan kontak ..." id="user_status" name="user_status" value="customer" aria-describedby="emailHelp" required />
          </div>
          <div class="mb-3 w-100">
            <label for="user_password" style="font-size: 12px; font-weight: bold" class="form-label text-secondary">Password</label>
            <input type="password" style="font-size: 12px; font-weight: normal" class="form-control py-4" placeholder="Masukkan password ..." id="user_password" name="user_password" required />
          </div>
          <button type="submit" name="register" id="btnSubmit" class="btn btn-warning text-white float-right px-4 py-2" style="font-size: 12px; font-weight: normal" onclick="daftar();">Register</button>
        </form>
      </div>
    </div>
  </div>
  <script src="assets/js/jquery-3.6.1.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/register.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>