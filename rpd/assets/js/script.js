let limit = 6; //jumlah data yang ditampilkan pertama
let start = 0;
let action = "inactive";
let search = "";
let result = 1;
let selectCategory = "";

// Routing Halaman Utama yaitu Home
$(document).ready(function () {
  beranda();
  $("#beranda").addClass("active");
  $("#pencarian").removeClass("active");
  $("#transaksi").removeClass("active");
  $("#profil").removeClass("active");
});

function beranda() {
  $.ajax({
    type: "GET",
    url: "beranda.html",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").addClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").removeClass("active");

      $("#load_data").html("");
      start = 0;
      selectCategory = "";
      lazzy_loader(limit);
      if (action == "inactive") {
        action = "active";
        fetchBeranda(limit, start, search, selectCategory);
      }
    },
  });
}

function villa() {
  $.ajax({
    type: "GET",
    url: "villa.html",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").addClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").removeClass("active");

      $("#load_data").html("");
      start = 0;
      selectCategory = "";
      lazzy_loader(limit);
      if (action == "inactive") {
        action = "active";
        fetchVilla(limit, start, search, selectCategory);
      }
    },
  });
}
function user() {
  $.ajax({
    type: "GET",
    url: "user.html",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").addClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").removeClass("active");

      $("#load_data").html("");
      start = 0;
      selectCategory = "";
      lazzy_loader(limit);
      if (action == "inactive") {
        action = "active";
        fetchUser(limit, start, search, selectCategory);
      }
    },
  });
}
function payment() {
  $.ajax({
    type: "GET",
    url: "payment.html",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").addClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").removeClass("active");

      $("#load_data").html("");
      start = 0;
      selectCategory = "";
      lazzy_loader(limit);
      if (action == "inactive") {
        action = "active";
        fetchPayment(limit, start, search, selectCategory);
      }
    },
  });
}
function pencarian() {
  $.ajax({
    type: "GET",
    url: "pencarian.html",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").removeClass("active");
      $("#pencarian").addClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").removeClass("active");

      $("#load_data").html("");
      start = 0;
      selectCategory = "";
      lazzy_loader(limit);
      if (action == "inactive") {
        action = "active";
        fetchBeranda(limit, start, search, selectCategory);
      }
    },
  });
}
function pencarianAdmin() {
  $.ajax({
    type: "GET",
    url: "pencarian.html",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").removeClass("active");
      $("#pencarian").addClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").removeClass("active");

      $("#load_data").html("");
      start = 0;
      selectCategory = "";
      lazzy_loader(limit);
      if (action == "inactive") {
        action = "active";
        fetchVilla(limit, start, search, selectCategory);
      }
    },
  });
}
function transaksi() {
  $.ajax({
    type: "GET",
    url: "transaksi.php",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").removeClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").addClass("active");
      $("#profil").removeClass("active");

      $("#load_data").html("");
      start = 0;
      selectCategory = "";
      lazzy_loader(limit);
      if (action == "inactive") {
        action = "active";
        fetchTransaksi(limit, start, search, selectCategory);
      }
    },
  });
}

function transaksiAdmin() {
  $.ajax({
    type: "GET",
    url: "transaksi.html",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").removeClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").addClass("active");
      $("#profil").removeClass("active");

      $("#load_data").html("");
      start = 0;
      selectCategory = "";
      lazzy_loader(limit);
      if (action == "inactive") {
        action = "active";
        fetchTransaksi(limit, start, search, selectCategory);
      }
    },
  });
}

function profil() {
  $.ajax({
    type: "GET",
    url: "profil.php",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").removeClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").addClass("active");
    },
  });
}

function seeMore(id) {
  $.ajax({
    type: "GET",
    url: "moreVilla.php",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").addClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").removeClass("active");

      $.ajax({
        type: "GET",
        url: "http://localhost/apirpd/villa/detail/" + id,
        dataType: "JSON",
        success: function (response) {
          if (response.status) {
            let detail_data = "";
            detail_data = `
            <div class="container w-100">
              <div class="row">
                <div class="col-md-5 w-50">
                  <img src="${response.data.villa_gambar}" style="object-fit:cover; height: 240px; width:100%"  alt="">
                </div>
                <div class="col-md-5 w-50 d-flex flex-column justify-content-between align-items-start p-0 m-0">
                  <h5 class="text-secondary " style="font-size:12px; font-weight: bold; border-bottom:2px solid black; ">${response.data.villa_nama}</h5>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Lokasi : ${response.data.villa_lokasi}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Kapasitas : ${response.data.villa_kapasitas}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Kontak : ${response.data.villa_kontak}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Harga : Rp. ${numFormat(response.data.villa_harga)}/malam</p>
                  <a href="javascript:void(0)" role="button" type="submit" name="sewa" id="sewa" class="btn-warning text-decoration-none text-white  p-2 w-100 text-center" style="font-size: 14px; border-radius:8px;" onclick="sewa('${
                    response.data.villa_id
                  }');">Sewa</a>
                </div>     
              <div class="row">
                <div class=" col-md-10 px-4 pt-3">
                  <h5 class="text-warning" style="font-size:12px; font-weight: normal;">Deskripsi villa</h5>
                  <hr class="p-0 m-0 bg-warning">
                  <p class="text-secondary"style="font-size:12px; font-weight: normal;text-align:justify;">
                  ${response.data.villa_deskripsi}
                  </p>
                </div>
              </div> 
            </div>
            `;
            $("#load_data").append(detail_data);
          } else {
            Swal.fire({
              text: response.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
      });
    },
  });
}

function moreVilla(id) {
  $.ajax({
    type: "GET",
    url: "moreVilla.html",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").addClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").removeClass("active");

      $.ajax({
        type: "GET",
        url: "http://localhost/apirpd/villa/detail/" + id,
        dataType: "JSON",
        success: function (response) {
          if (response.status) {
            let detail_data = "";
            detail_data = `
            
            <div class="container w-100">
              <div class="row">
                <div class="col-md-5 w-50">
                  <img src="${response.data.villa_gambar}" style="object-fit:cover; height: 240px; width:100%"  alt="">
                </div>
                <div class="col-md-5 w-50 d-flex flex-column justify-content-between align-items-start p-0 m-0">
                  <h5 class="text-secondary " style="font-size:12px; font-weight: bold; border-bottom:2px solid black; ">${response.data.villa_nama}</h5>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Lokasi : ${response.data.villa_lokasi}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Kapasitas : ${response.data.villa_kapasitas}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Kontak : ${response.data.villa_kontak}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Harga : Rp. ${numFormat(response.data.villa_harga)}/malam</p>
                  <button class="btn btn-warning text-white" style="font-size:12px; font-weight: normal; width:100%" onclick="editVilla(${response.data.villa_id});" >Edit</button>
                  <button class="btn btn-secondary text-white" style="font-size:12px; font-weight: normal; width:100%" onclick="hapusVilla(${response.data.villa_id});" >Hapus</button>
                  </div>
              </div>     
              <div class="row">
                <div class="col-md-12  w-100 py-2">
                  <h5 class="text-warning" style="font-size:12px; font-weight: normal;">Deskripsi villa</h5>
                  <hr class="p-0 m-0 bg-warning">
                  <p class="text-secondary" style="font-size:12px; font-weight: normal;text-align:justify;">
                  ${response.data.villa_deskripsi}
                  </p>
                </div>
              </div>       
            </div>
            
            `;
            $("#load_data").append(detail_data);
          } else {
            Swal.fire({
              text: response.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
      });
    },
  });
}

function moreUser(id) {
  $.ajax({
    type: "GET",
    url: "moreUser.html",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").addClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").removeClass("active");

      $.ajax({
        type: "GET",
        url: "http://localhost/apirpd/user/detail/" + id,
        dataType: "JSON",
        success: function (response) {
          if (response.status) {
            let detail_data = "";
            detail_data = `
            
            <div class="container w-100">
              <div class="row">
                <div class="col-md-5 w-50">
                  <img src="${response.data.user_gambar}" style="object-fit:cover; height: 240px; width:100%"  alt="">
                </div>
                <div class="col-md-5 w-50 d-flex flex-column justify-content-between align-items-start p-0 m-0">
                  <h5 class="text-secondary " style="font-size:12px; font-weight: bold; border-bottom:2px solid black; ">${response.data.user_nama}</h5>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Kontak : ${response.data.user_kontak}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Status : ${response.data.user_status}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;" type="hidden" >password : **********</p>
                  <button class="btn btn-warning text-white" style="font-size:12px; font-weight: normal; width:100%" onclick="editUser(${response.data.user_id});" >Edit</button>
                  <button class="btn btn-secondary text-white" style="font-size:12px; font-weight: normal; width:100%" onclick="hapusUser(${response.data.user_id});" >Hapus</button>
                  </div>
              </div>     
              <div class="row">
                <div class="col-md-12  w-100 py-2">
                  <hr class=" bg-warning">
                </div>
              </div>       
            </div>
            
            `;
            $("#load_data").append(detail_data);
          } else {
            Swal.fire({
              text: response.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
      });
    },
  });
}

function morePayment(id) {
  $.ajax({
    type: "GET",
    url: "morePayment.html",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").addClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").removeClass("active");

      $.ajax({
        type: "GET",
        url: "http://localhost/apirpd/payment/detail/" + id,
        dataType: "JSON",
        success: function (response) {
          if (response.status) {
            let detail_data = "";
            detail_data = `
            
            <div class="container w-100">
              <div class="row">
                <div class="col-md-5 w-100">
                  <img src="${response.data.payment_gambar}" class="img-circle" style="object-fit:cover; height: 240px; width:100%;"  alt="">
                </div>
                <div class="col-md-5 w-100 d-flex flex-column justify-content-center align-items-center p-2 ">
                  <h5 class="text-secondary " style="font-size:16px; font-weight: bold; border-bottom:2px solid black; ">${response.data.payment_nama}</h5>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Harga transaksi : ${response.data.payment_harga}</p>
                  <div class="button d-flex justify-content-around w-100 gap-2 my-5">
                    <button class="btn btn-warning text-white w-25" style="font-size:12px; font-weight: normal; width:100%" onclick="editPayment(${response.data.payment_id});" >Edit</button>
                    <button class="btn btn-secondary text-white w-25" style="font-size:12px; font-weight: normal; width:100%" onclick="hapusPayment(${response.data.payment_id});" >Hapus</button>
                  </div>
                  </div>
                 
              </div>     
              <div class="row">
                <div class="col-md-12  w-100 py-2">
                  <hr class=" bg-warning">
                </div>
              </div>       
            </div>
            
            `;
            $("#load_data").append(detail_data);
          } else {
            Swal.fire({
              text: response.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
      });
    },
  });
}

function moreTransaksi(id) {
  $.ajax({
    type: "GET",
    url: "moreTransaksi.php",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").removeClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").addClass("active");
      $("#profil").removeClass("active");

      $.ajax({
        type: "GET",
        url: "http://localhost/apirpd/transaksi/detail/" + id,
        dataType: "JSON",
        success: function (response) {
          if (response.status) {
            let detail_data = "";
            detail_data = `
            
            <div class="container w-100">
              <div class="row">
                <div class="col-md-5 w-50">
                  <img src="${response.data.villa_gambar}" style="object-fit:cover; height: 240px; width:100%"  alt="">
                </div>
                <div class="col-md-5 w-50 d-flex flex-column justify-content-between align-items-start p-0 m-0">
                  <h5 class="text-secondary " style="font-size:12px; font-weight: bold; border-bottom:2px solid black; ">${response.data.transaksi_tanggal}</h5>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Nama user : ${response.data.user_nama}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Nama villa : ${response.data.villa_nama}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Kontak user : ${response.data.user_kontak}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;" >Metode pembayaran : ${response.data.payment_nama}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;" >Jumlah orang : ${response.data.jumlah_orang}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;" >Harga Charge : Rp. ${numFormat(response.data.harga_charge)}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;" >Total transaksi : Rp. ${numFormat(response.data.transaksi_total)}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;" >Kode transaksi : ${response.data.transaksi_kode}</p>



                  <p class="p-1 mt-1  float-right bg-secondary text-white" style="font-size:12px; font-weight: normal;" >${response.data.transaksi_status}</p>
                  <a href="javascript:void(0)" role="button" type="submit" name="sewa" id="sewa" class="btn-warning text-decoration-none text-white  p-2 w-100 text-center" style="font-size: 12px; border-radius:8px;" onclick="kode(${
                    response.data.transaksi_id
                  })">Masukkan kode</a>
                  
                  </div>
              </div>     
              <div class="row">
                <div class="col-md-12  w-100 py-2">
                <h5 class="text-warning" style="font-size:12px; font-weight: normal;">Deskripsi villa</h5>
                <hr class="p-0 m-0 bg-warning">
                <p class="text-secondary" style="font-size:12px; font-weight: normal;text-align:justify;">
                ${response.data.villa_deskripsi}
                </p>
                </div>
              </div>       
            </div>
            
            `;
            $("#load_data").append(detail_data);
          } else {
            Swal.fire({
              text: response.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
      });
    },
  });
}
function moreTransaksiAdmin(id) {
  $.ajax({
    type: "GET",
    url: "moreTransaksi.php",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").removeClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").addClass("active");
      $("#profil").removeClass("active");

      $.ajax({
        type: "GET",
        url: "http://localhost/apirpd/transaksi/detail/" + id,
        dataType: "JSON",
        success: function (response) {
          if (response.status) {
            let detail_data = "";
            detail_data = `
            
            <div class="container w-100">
              <div class="row">
                <div class="col-md-5 w-50">
                  <img src="${response.data.villa_gambar}" style="object-fit:cover; height: 240px; width:100%"  alt="">
                </div>
                <div class="col-md-5 w-50 d-flex flex-column justify-content-between align-items-start p-0 m-0">
                  <h5 class="text-secondary " style="font-size:12px; font-weight: bold; border-bottom:2px solid black; ">${response.data.transaksi_tanggal}</h5>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Nama user : ${response.data.user_nama}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Nama villa : ${response.data.villa_nama}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;">Kontak user : ${response.data.user_kontak}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;" >Metode pembayaran : ${response.data.payment_nama}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;" >Jumlah orang : ${response.data.jumlah_orang}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;" >Harga Charge : Rp. ${numFormat(response.data.harga_charge)}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;" >Total transaksi : Rp. ${numFormat(response.data.transaksi_total)}</p>
                  <p class="text-secondary p-0 m-0" style="font-size:12px; font-weight: normal;" >Kode transaksi : ${response.data.transaksi_kode}</p>



                  <p class="p-1 mt-1 float-right bg-secondary text-white" style="font-size:12px; font-weight: normal;" >${response.data.transaksi_status}</p>
                  
                  </div>
              </div>     
              <div class="row">
                <div class="col-md-12  w-100 py-2">
                <h5 class="text-warning" style="font-size:12px; font-weight: normal;">Deskripsi villa</h5>
                <hr class="p-0 m-0 bg-warning">
                <p class="text-secondary" style="font-size:12px; font-weight: normal;text-align:justify;">
                ${response.data.villa_deskripsi}
                </p>
                </div>
              </div>       
            </div>
            
            `;
            $("#load_data").append(detail_data);
          } else {
            Swal.fire({
              text: response.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
      });
    },
  });
}
// Get data from api

// Format Currency
function numFormat(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// new m12
function mdVilla() {
  $("#md-barang").modal("show");
  $("#md-barang-title").html("Tambah Villa");
  $("#villa_gambar").attr("required", true);
  $("#form-barang")[0].reset();
}

function mdUser() {
  $("#md-barang").modal("show");
  $("#md-barang-title").html("Tambah user");
  $("#user_gambar").attr("required", true);
  $("#form-barang")[0].reset();
}

function mdPayment() {
  $("#md-barang").modal("show");
  $("#md-barang-title").html("Tambah payment");
  $("#payment_gambar").attr("required", true);
  $("#form-barang")[0].reset();
}

function simpanVilla() {
  // when the form is submitted
  $("#form-barang").on("submit", function (e) {
    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      Swal.fire("Sedang menyimpan data");
      Swal.showLoading();
      $("#btnSubmit").text("Menyimpan...");
      $("#btnSubmit").attr("disabled", true);
      var formData = new FormData($("#form-barang")[0]);
      $.ajax({
        url: "http://localhost/apirpd/villa/simpan",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
          if (data.status) {
            $("#form-barang")[0].reset();
            $("#md-barang").modal("hide");
            Swal.fire({
              text: data.message,
              icon: "success",
              confirmButtonText: "Ok",
            });
          } else {
            Swal.fire({
              text: data.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
          $("#btnSubmit").text("Simpan");
          $("#btnSubmit").attr("disabled", false);
        },
      });
      return false;
    }
  });
}
function simpanUser() {
  // when the form is submitted
  $("#form-barang").on("submit", function (e) {
    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      Swal.fire("Sedang mendaftarkan user");
      Swal.showLoading();
      $("#btnSubmit").text("Menyimpan...");
      $("#btnSubmit").attr("disabled", true);
      var formData = new FormData($("#form-barang")[0]);
      $.ajax({
        url: "http://localhost/apirpd/user/simpan",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
          if (data.status) {
            $("#form-barang")[0].reset();
            $("#md-barang").modal("hide");
            user();
            Swal.fire({
              text: data.message,
              icon: "success",
              confirmButtonText: "Ok",
            });
          } else {
            Swal.fire({
              text: data.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
          $("#btnSubmit").text("Simpan");
          $("#btnSubmit").attr("disabled", false);
        },
      });
      return false;
    }
  });
}

function simpanAkun() {
  // when the form is submitted
  $("#form-barang").on("submit", function (e) {
    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      Swal.fire("Sedang mendaftarkan user");
      Swal.showLoading();
      $("#btnSubmit").text("Menyimpan...");
      $("#btnSubmit").attr("disabled", true);
      var formData = new FormData($("#form-barang")[0]);
      $.ajax({
        url: "http://localhost/apirpd/user/simpan",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
          if (data.status) {
            $("#form-barang")[0].reset();
            $("#md-barang").modal("hide");
            Swal.fire({
              text: data.message,
              icon: "success",
              confirmButtonText: "Ok",
            });
            window.location.href = "logout.php";
          } else {
            Swal.fire({
              text: data.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
          $("#btnSubmit").text("Simpan");
          $("#btnSubmit").attr("disabled", false);
        },
      });
      return false;
    }
  });
}
function simpanAkunAdmin() {
  // when the form is submitted
  $("#form-barang").on("submit", function (e) {
    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      Swal.fire("Sedang mendaftarkan user");
      Swal.showLoading();
      $("#btnSubmit").text("Menyimpan...");
      $("#btnSubmit").attr("disabled", true);
      var formData = new FormData($("#form-barang")[0]);
      $.ajax({
        url: "http://localhost/apirpd/user/simpan",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
          if (data.status) {
            $("#form-barang")[0].reset();
            $("#md-barang").modal("hide");
            Swal.fire({
              text: data.message,
              icon: "success",
              confirmButtonText: "Ok",
            });
            window.location.href = "../logout.php";
          } else {
            Swal.fire({
              text: data.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
          $("#btnSubmit").text("Simpan");
          $("#btnSubmit").attr("disabled", false);
        },
      });
      return false;
    }
  });
}

function daftar() {
  // when the form is submitted
  $("#form-barang").on("submit", function (e) {
    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      Swal.fire("Sedang mendaftarkan user");
      Swal.showLoading();
      $("#btnSubmit").text("Menyimpan...");
      $("#btnSubmit").attr("disabled", true);
      var formData = new FormData($("#form-barang")[0]);
      $.ajax({
        url: "http://localhost/apirpd/user/simpan",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
          if (data.status) {
            $("#form-barang")[0].reset();
            Swal.fire({
              text: data.message,
              icon: "success",
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "index.php";
              }
            });
          } else {
            Swal.fire({
              text: data.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
          $("#btnSubmit").text("Simpan");
          $("#btnSubmit").attr("disabled", false);
        },
      });
      return false;
    }
  });
}
function simpanPayment() {
  // when the form is submitted
  $("#form-barang").on("submit", function (e) {
    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      Swal.fire("Sedang menyimpan data");
      Swal.showLoading();
      $("#btnSubmit").text("Menyimpan...");
      $("#btnSubmit").attr("disabled", true);
      var formData = new FormData($("#form-barang")[0]);
      $.ajax({
        url: "http://localhost/apirpd/payment/simpan",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
          if (data.status) {
            $("#form-barang")[0].reset();
            $("#md-barang").modal("hide");

            Swal.fire({
              text: data.message,
              icon: "success",
              confirmButtonText: "Ok",
            });
            payment();
          } else {
            Swal.fire({
              text: data.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
          $("#btnSubmit").text("Simpan");
          $("#btnSubmit").attr("disabled", false);
        },
      });
      return false;
    }
  });
}
function simpanTransaksi() {
  // when the form is submitted
  $("#form-barang").on("submit", function (e) {
    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      Swal.fire("Sedang menyimpan data");
      Swal.showLoading();
      $("#btnSubmit").text("Menyimpan...");
      $("#btnSubmit").attr("disabled", true);
      var formData = new FormData($("#form-barang")[0]);
      $.ajax({
        url: "http://localhost/apirpd/transaksi/simpan",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (data) {
          if (data.status) {
            $("#form-barang")[0].reset();
            fetchTransaksi(limit, start, search, filter);
            Swal.fire({
              text: data.message,
              icon: "success",
              confirmButtonText: "Ok",
            });
          } else {
            Swal.fire({
              text: data.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
          $("#btnSubmit").text("Simpan");
          $("#btnSubmit").attr("disabled", false);
        },
      });
      return false;
    }
  });
}
function dialog(id) {
  $("#md-dialog").modal("show");
  $("#btnEdit").attr("data-id", id);
  $("#btnHapus").attr("data-id", id);
}

function editVilla(id) {
  $("#form-barang")[0].reset();
  $("#md-dialog").modal("hide");
  $("#md-barang").modal("show");
  $("#md-barang-title").html("Edit villa");
  $("#villa_gambar").attr("required", false);
  $.ajax({
    type: "GET",
    url: "http://localhost/apirpd/villa/detail/" + id,
    dataType: "JSON",
    success: function (response) {
      if (response.status) {
        $("#villa_id").val(response.data.villa_id);
        $("#villa_nama").val(response.data.villa_nama);
        $("#villa_lokasi").val(response.data.villa_lokasi);
        $("#villa_kontak").val(response.data.villa_kontak);
        $("#villa_kapasitas").val(response.data.villa_kapasitas);
        $("#villa_harga").val(response.data.villa_harga);
        $("#villa_deskripsi").val(response.data.villa_deskripsi);
        $("#villa_gambar").val(response.data.villa_gambar);
      } else {
        Swal.fire({
          text: response.message,
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
  });
}

function sewa(id) {
  $("#form-barang")[0].reset();
  $("#md-barang").modal("show");
  $("#md-barang-title").html("Lakukan transaksi");
  $("#villa_gambar").attr("required", false);
  $.ajax({
    type: "GET",
    url: "http://localhost/apirpd/villa/detail/" + id,
    dataType: "JSON",
    success: function (response) {
      if (response.status) {
        $("#villa_id").val(response.data.villa_id);
      } else {
        Swal.fire({
          text: response.message,
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
  });
}
function kode(id) {
  $("#form-barang")[0].reset();
  $("#md-barang").modal("show");
  $("#md-barang-title").html("Masukkan kode Transaksi");
  $.ajax({
    type: "GET",
    url: "http://localhost/apirpd/transaksi/detail/" + id,
    dataType: "JSON",
    success: function (response) {
      if (response.status) {
        $("#transaksi_id").val(response.data.transaksi_id);
      } else {
        Swal.fire({
          text: response.message,
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
  });
}

function editUser(id) {
  $("#form-barang")[0].reset();
  $("#md-dialog").modal("hide");
  $("#md-barang").modal("show");
  $("#md-barang-title").html("Edit user");
  $("#user_gambar").attr("required", false);
  $.ajax({
    type: "GET",
    url: "http://localhost/apirpd/user/detail/" + id,
    dataType: "JSON",
    success: function (response) {
      if (response.status) {
        $("#user_id").val(response.data.user_id);
        $("#user_nama").val(response.data.user_nama);
        $("#user_kontak").val(response.data.user_kontak);
        $("#user_status").val(response.data.user_status);
        $("#user_password").val(response.data.user_password);
        $("#user_gambar").val(response.data.user_gambar);
      } else {
        Swal.fire({
          text: response.message,
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
  });
}
function fetchAkun(id) {
  $.ajax({
    type: "GET",
    url: "http://localhost/apirpd/user/detail/" + id,
    dataType: "JSON",
    success: function (response) {
      if (response.status) {
        $("#user_id").val(response.data.user_id);
        $("#user_nama").val(response.data.user_nama);
        $("#user_kontak").val(response.data.user_kontak);
        $("#user_status").val(response.data.user_status);
        $("#user_password").val(response.data.user_password);
        $("#user_gambar").val(response.data.user_gambar);
      } else {
        Swal.fire({
          text: response.message,
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
  });
}
function editPayment(id) {
  $("#form-barang")[0].reset();
  $("#md-dialog").modal("hide");
  $("#md-barang").modal("show");
  $("#md-barang-title").html("Edit payment");
  $("#payment_gambar").attr("required", false);
  $.ajax({
    type: "GET",
    url: "http://localhost/apirpd/payment/detail/" + id,
    dataType: "JSON",
    success: function (response) {
      if (response.status) {
        $("#payment_id").val(response.data.payment_id);
        $("#payment_nama").val(response.data.payment_nama);
        $("#payment_harga").val(response.data.payment_harga);
        $("#payment_gambar").val(response.data.payment_gambar);
      } else {
        Swal.fire({
          text: response.message,
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    },
  });
}

function hapusVilla(id) {
  Swal.fire({
    title: "Data villa akan dihapus?",
    text: "Data yang di hapus tidak dapat di kembalikan",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Hapus",
    confirmButtonColor: "#ffb534",
    cancelButtonText: "Batal",
    cancelButtonColor: "#6c757d",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Sedang menghapus data");
      Swal.showLoading();
      $.ajax({
        type: "GET",
        url: "http://localhost/apirpd/villa/hapus/" + id,
        dataType: "JSON",
        success: function (response) {
          if (response.status) {
            Swal.fire({
              text: response.message,
              icon: "success",
              confirmButtonText: "Ok",
            });
            $("#md-dialog").modal("hide");
            fetchVilla(limit, start, search, filter);
          } else {
            Swal.fire({
              text: response.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
      });
    }
  });
}
function hapusUser(id) {
  Swal.fire({
    title: "Data user akan dihapus?",
    text: "Data yang di hapus tidak dapat di kembalikan",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Hapus",
    confirmButtonColor: "#ffb534",
    cancelButtonText: "Batal",
    cancelButtonColor: "#6c757d",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Sedang menghapus data");
      Swal.showLoading();
      $.ajax({
        type: "GET",
        url: "http://localhost/apirpd/user/hapus/" + id,
        dataType: "JSON",
        success: function (response) {
          if (response.status) {
            Swal.fire({
              text: response.message,
              icon: "success",
              confirmButtonText: "Ok",
            });
            $("#md-dialog").modal("hide");
            user();
          } else {
            Swal.fire({
              text: response.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
      });
    }
  });
}

function hapusAkun(id) {
  Swal.fire({
    title: "Data user akan dihapus?",
    text: "Data yang di hapus tidak dapat di kembalikan",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Hapus",
    confirmButtonColor: "#ffb534",
    cancelButtonText: "Batal",
    cancelButtonColor: "#6c757d",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Sedang menghapus data");
      Swal.showLoading();
      $.ajax({
        type: "GET",
        url: "http://localhost/apirpd/user/hapus/" + id,
        dataType: "JSON",
        success: function (response) {
          if (response.status) {
            Swal.fire({
              text: response.message,
              icon: "success",
              confirmButtonText: "Ok",
            });
            window.location.href = "logout.php";
          } else {
            Swal.fire({
              text: response.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
      });
    }
  });
}
function hapusPayment(id) {
  Swal.fire({
    title: "Data payment akan dihapus?",
    text: "Data yang di hapus tidak dapat di kembalikan",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Hapus",
    confirmButtonColor: "#ffb534",
    cancelButtonText: "Batal",
    cancelButtonColor: "#6c757d",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Sedang menghapus data");
      Swal.showLoading();
      $.ajax({
        type: "GET",
        url: "http://localhost/apirpd/payment/hapus/" + id,
        dataType: "JSON",
        success: function (response) {
          if (response.status) {
            Swal.fire({
              text: response.message,
              icon: "success",
              confirmButtonText: "Ok",
            });
            $("#md-dialog").modal("hide");
            payment();
          } else {
            Swal.fire({
              text: response.message,
              icon: "error",
              confirmButtonText: "Ok",
            });
          }
        },
      });
    }
  });
}

function logoutAdmin() {
  $.ajax({
    type: "GET",
    url: "beranda.html",
    data: "data",
    dataType: "html",
    success: function (response) {
      $("#content").html(response);

      $("#beranda").addClass("active");
      $("#pencarian").removeClass("active");
      $("#transaksi").removeClass("active");
      $("#profil").removeClass("active");

      $("#load_data").html("");
      start = 0;
      selectCategory = "";
      lazzy_loader(limit);
      if (action == "inactive") {
        action = "active";
        fetchBeranda(limit, start, search, selectCategory);
      }
    },
  });
}
function fetchBeranda(limit, start, search, filter) {
  $.ajax({
    url: "http://localhost/apirpd/villa/list",
    method: "GET",
    data: {
      limit: limit,
      start: start,
      search: search,
      filter: filter,
    },
    dataType: "JSON",
    cache: false,
    success: function (response) {
      result = response.result;
      if (response.data.length < limit) {
        result = 0;
      } else {
        result = 1;
      }
      if (response.status) {
        let card_data = "";
        $.each(response.data, function (i, v) {
          card_data = ` <a class="product-items w-50 flex-column gap-2"
    href="javascript:void(0)" onclick="seeMore('${v.villa_id}');">
    
    <img src="${v.villa_gambar}" class="img-fluid" style="height:120px; width:100%; object-fit:contain;"/>
    <p class="text-secondary m-0" style="font-size:12px; font-weight: bold; ">${v.villa_nama.substring(0, 10)}</p>
    <p class="text-primary m-0" style="font-size:12px; font-weight: normal;">Rp.
    ${numFormat(v.villa_harga)}</p>
    <button class="btn btn-warning text-white float-right m-0 py-1 my-2" style="font-size:12px; font-weight: normal;">More...</button>
    </a>`;
          $("#load_data").append(card_data);
        });
        action = "inactive";
        $("#load_data_message").html("");
      } else {
        $("#load_data").html("");
        $("#load_data_message").html('<div class="col-12 text-center"><h4 class="text-danger">Oops, villa yang anda cari tidak di temukan</h4></div>');
        action = "active";
      }
    },
  });
}
function fetchVilla(limit, start, search, filter) {
  $.ajax({
    url: "http://localhost/apirpd/villa/list",
    method: "GET",
    data: {
      limit: limit,
      start: start,
      search: search,
      filter: filter,
    },
    dataType: "JSON",
    cache: false,
    success: function (response) {
      result = response.result;
      if (response.data.length < limit) {
        result = 0;
      } else {
        result = 1;
      }
      if (response.status) {
        let card_data = "";
        $.each(response.data, function (i, v) {
          card_data = ` <a class="product-items w-50 flex-column gap-2"
    href="javascript:void(0)" onclick="moreVilla('${v.villa_id}');">
    
    <img src="${v.villa_gambar}" class="img-fluid" style="height:120px; width:100%; object-fit:contain;"/>
    <p class="text-secondary m-0" style="font-size:12px; font-weight: bold; ">${v.villa_nama.substring(0, 10)}</p>
    <p class="text-primary m-0" style="font-size:12px; font-weight: normal;">Rp.
    ${numFormat(v.villa_harga)}</p>
    <button class="btn btn-warning text-white float-right m-0 py-1 my-2" style="font-size:12px; font-weight: normal;">More...</button>
    </a>`;
          $("#load_data").append(card_data);
        });
        action = "inactive";
        $("#load_data_message").html("");
      } else {
        $("#load_data").html("");
        $("#load_data_message").html('<div class="col-12 text-center"><h4 class="text-danger">Oops, villa yang anda cari tidak di temukan</h4></div>');
        action = "active";
      }
    },
  });
}

function fetchUser(limit, start, search, filter) {
  $.ajax({
    url: "http://localhost/apirpd/user/list",
    method: "GET",
    data: {
      limit: limit,
      start: start,
      search: search,
      filter: filter,
    },
    dataType: "JSON",
    cache: false,
    success: function (response) {
      result = response.result;
      if (response.data.length < limit) {
        result = 0;
      } else {
        result = 1;
      }
      if (response.status) {
        let card_data = "";
        $.each(response.data, function (i, v) {
          card_data = ` <a class="product-items w-50 flex-column gap-2 d-flex flex-xl-column justify-content-center align-items-center"
    href="javascript:void(0)" onclick="moreUser('${v.user_id}');">
    
    <img src="${v.user_gambar}" class="img-fluid" style="height:120px; width:100%; object-fit:contain;"/>
    <p class="text-secondary m-0" style="font-size:12px; font-weight: bold; ">${v.user_nama.substring(0, 15)}</p>
    <p class="text-primary m-0" style="font-size:12px; font-weight: normal;">
    ${v.user_status}</p>
    <button class="btn btn-warning text-white m-0 py-1 my-2" style="font-size:12px; font-weight: normal;">More...</button>
    </a>`;
          $("#load_data").append(card_data);
        });
        action = "inactive";
        $("#load_data_message").html("");
      } else {
        $("#load_data").html("");
        $("#load_data_message").html('<div class="col-12 text-center"><h4 class="text-danger">Oops, user yang anda cari tidak di temukan</h4></div>');
        action = "active";
      }
    },
  });
}

function fetchPayment(limit, start, search, filter) {
  $.ajax({
    url: "http://localhost/apirpd/payment/list",
    method: "GET",
    data: {
      limit: limit,
      start: start,
      search: search,
      filter: filter,
    },
    dataType: "JSON",
    cache: false,
    success: function (response) {
      result = response.result;
      if (response.data.length < limit) {
        result = 0;
      } else {
        result = 1;
      }
      if (response.status) {
        let card_data = "";
        $.each(response.data, function (i, v) {
          card_data = ` <a class="product-items w-50 flex-column gap-2 d-flex flex-xl-column justify-content-center align-items-start"
    href="javascript:void(0)" onclick="morePayment('${v.payment_id}');">
    
    <img src="${v.payment_gambar}" class="img-fluid" style="height:120px; width:100%; object-fit:contain;"/>
    <p class="text-secondary m-0" style="font-size:12px; font-weight: bold; ">${v.payment_nama}</p>
    <p class="text-primary m-0" style="font-size:12px; font-weight: normal;">
    ${v.payment_harga}</p>
    <button class="btn btn-warning text-white m-0 py-1 my-2" style="font-size:12px; font-weight: normal;">More...</button>
    </a>`;
          $("#load_data").append(card_data);
        });
        action = "inactive";
        $("#load_data_message").html("");
      } else {
        $("#load_data").html("");
        $("#load_data_message").html('<div class="col-12 text-center"><h4 class="text-danger">Oops, user yang anda cari tidak di temukan</h4></div>');
        action = "active";
      }
    },
  });
}
function fetchTransaksi(limit, start, search, filter) {
  $.ajax({
    url: "http://localhost/apirpd/transaksi/list",
    method: "GET",
    data: {
      limit: limit,
      start: start,
      search: search,
      filter: filter,
    },
    dataType: "JSON",
    cache: false,
    success: function (response) {
      result = response.result;
      if (response.data.length < limit) {
        result = 0;
      } else {
        result = 1;
      }
      if (response.status) {
        let card_data = "";
        $.each(response.data, function (i, v) {
          card_data = ` <a class="bg-warning w-100 mb-2 p-2 d-flex justify-content-between align-items-center text-decoration-none "
    href="javascript:void(0)" onclick="moreTransaksiAdmin('${v.transaksi_id}');" style="border-radius:10px;">
    <p class="text-white m-0" style="font-size:12px; font-weight: bold;">Tanggal : <span  style="font-size:12px; font-weight: normal;">${v.transaksi_tanggal}</span> </p>
    <p class="text-white m-0" style="font-size:12px; font-weight: bold;">Status : <span style="font-size:12px; font-weight: normal;">
    ${v.transaksi_status}
    </span></p>

    </a>`;
          $("#load_data").append(card_data);
        });
        action = "inactive";
        $("#load_data_message").html("");
      } else {
        $("#load_data").html("");
        $("#load_data_message").html('<div class="col-12 text-center"><h4 class="text-danger">Oops, data transaksi yang anda cari tidak di temukan</h4></div>');
        action = "active";
      }
    },
  });
}

function lazzy_loader(limit) {
  var output = "";
  for (var count = 0; count < limit; count++) {
    output += `
    <a class="product-items w-50 flex-column shimmer"
    href="javascript:void(0)">
    <div class="product-cover animate mb-2" ></div>
    <p class="bodytext1 semibold m-0 px-2 text-secondary animate
    mb-2"></p>
    <p class="bodytext2 color-black300 m-0 px-2 animate mb2"></p>
    <p class="caption m-0 py-1 px-2 text-primary animate"></p>
    </a>`;
  }
  $("#load_data_message").html(output);
}
$(window).scroll(function () {
  if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == "inactive" && result == 1) {
    lazzy_loader(limit);
    action = "active";
    start = start + limit;
    setTimeout(function () {
      fetchBeranda(limit, start, search, selectCategory);
    }, 1000);
  }
  if (result === 0) {
    action = "inactive";
  }
});
function searchTransaksi() {
  $("#load_data").html("");
  search = $("#search_transaksi").val();
  start = 0;
  fetchTransaksi(limit, start, search, selectCategory);
}
function searchVilla() {
  $("#load_data").html("");
  search = $("#search").val();
  start = 0;
  fetchSearchVilla(search);
}

function handleChange(filter) {
  selectCategory = filter;
  $("#load_data").html("");
  start = 0;
  fetch(limit, start, search, filter);
}

function filterHandler(select) {
  selectCategory = select;
  $("#load_data").html("");
  if (select == "") {
    fetch(limit, start, search, selectCategory);
  }
  handleChange(selectCategory);
}
