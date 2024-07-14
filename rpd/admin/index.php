<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Rockpad</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no" />
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/styles.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/navigation.css" />
  <link rel="stylesheet" type="text/css" href="../assets/css/shimmer.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:600,700" rel="stylesheet" />
  <link rel="manifest" href="../manifest.json" />
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
    <div class="bottom-nav-item d-flex justify-content-center align-items-center" id="pencarian" onclick="pencarianAdmin();">
      <div class="bottom-nav-link d-flex justify-content-center align-items-center">
        <p class="d-flex justify-content-center align-items-center">
          <i class="fi fi-rr-search unselected"></i>
          <i class="fi fi-sr-search selected"></i>
        </p>
      </div>
    </div>
    <div class="bottom-nav-item d-flex justify-content-center align-items-center" id="transaksi" onclick="transaksiAdmin();">
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
            <img class="rounded-circle" src="<?php
                                              if ($_SESSION['user_gambar'] == "") {
                                                echo "assets/images/user.png";
                                              } else {
                                                echo $_SESSION['user_gambar'];
                                              } ?>" alt="profile" srcset="" id="dataImage" style="object-fit: cover; width: 28px; height: 28px" />
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

  <script src="../assets/js/jquery-3.6.1.min.js"></script>
  <script src="../assets/js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../assets/js/register.js"></script>
  <script src="../assets/js/script.js"></script>
</body>

</html>