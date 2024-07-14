<?php
session_start();


if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
?>

<!-- start content welcome user -->
<div class="container-user d-flex flex-column w-100 px-3 py-4 mb-4">
  <div class="content-profile d-flex flex-column align-items-center mt-2 py-4">
    <div class="container-image-profile">

      <img src="<?php
                if ($_SESSION['user_gambar'] == "") {
                  echo "assets/images/user.png";
                } else {
                  echo $_SESSION['user_gambar'];
                } ?>" alt="profile" class="image-profile" id="dataImage" />

    </div>
    <div class="data-profile d-flex flex-column flex-fill">
      <p class="headline5 color-black500 semibold p-0 mb-2 mt-2 text-center" id="dataName"><?php echo $_SESSION['user_nama']; ?></p>
      <p class="bodytext2 color-black500 p-0 m-0 text-center" id="dataEmail"><?php echo $_SESSION['user_status']; ?></p>
    </div>
  </div>
  <div class="container-spec d-flex align-content-between flex-wrap mt-3 mb-3 data-spec" id="data-spec">
    <div class="spec-item flex-column flex-fill justify-content-column m-0 mt3 p-3 radius-16">
      <div class="d-flex">
        <button class="button-action-profile color-black500 bg-white bodytext1 d-flex flex-row justify-content-between align-items-center flex-fill px-0 py-2">
          <p class="mb-0 bodytext1 flex-fill text-left">Kontak</p>
          <p class="mb-0 bodytext1 flex-fill text-right"><?php echo $_SESSION['user_kontak']; ?></p>
        </button>
      </div>
      <div class="d-flex">
        <button class="button-action-profile color-black500 bg-white bodytext1 d-flex flex-row justify-content-between align-items-center flex-fill px-0 py-2">
          <p class="mb-0 bodytext1 flex-fill text-left">Password</p>
          <p class="mb-0 bodytext1 flex-fill text-right">********</p>
        </button>
      </div>
      <div class="d-flex justify-content-between mt-3">
        <button class="bg-warning text-white" style="padding: 12px 20px; border-radius: 8px; border: none" onclick="editAkun(<?php echo $_SESSION['user_id']; ?>);">Edit</button>
        <button class="bg-secondary text-white" style="padding: 12px 20px; border-radius: 8px; border: none" onclick="hapusAkun(<?php echo $_SESSION['user_id']; ?>);">Hapus</button>
      </div>
      <button class="button-action-logout text-white bodytext1 text-center mt-3 d-flex flex-row w-100 justify-content-center flex-fill my-5" id="buttonLogout">
        <p class="mb-0 "><a href="../logout.php" class="text-decoration-none" style="color: #fff;">Logout</a></p>
      </button>
    </div>
  </div>
</div>
<!-- end content welcome user -->
<!-- MODAL 1 -->
<div class="modal fade" tabindex="-1" id="md-barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form id="form-barang">
        <div class="modal-header">
          <p class="modal-title" id="md-barang-title" style="font-size: 14px; font-weight: bold">Tambah villa</p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input class="d-none" id="user_id" name="user_id" />
          <div class="form-group">
            <label style="font-size: 12px; font-weight: bold">Nama user</label>
            <input class="form-control" type="text" id="user_nama" name="user_nama" style="font-size: 12px; font-weight: normal" required />
          </div>
          <div class="form-group">
            <label style="font-size: 12px; font-weight: bold">Kontak user</label>
            <input style="font-size: 12px; font-weight: normal" class="form-control" type="text" id="user_kontak" name="user_kontak" required />
          </div>
          <div class="form-group">
            <label style="font-size: 12px; font-weight: bold">Status user</label>
            <input style="font-size: 12px; font-weight: normal" class="form-control" type="text" id="user_status" name="user_status" required />
          </div>
          <div class="form-group">
            <label style="font-size: 12px; font-weight: bold">Password</label>
            <input style="font-size: 12px; font-weight: normal" class="form-control" type="password" id="user_password" name="user_password" required />
          </div>
          <div class="form-group">
            <input style="font-size: 12px; font-weight: normal" type="file" id="user_gambar" name="user_gambar" />
          </div>
        </div>
        <div class="modal-footer">
          <button style="font-size: 12px; font-weight: normal" type="button" class="btn btn-secondary text-white" data-dismiss="modal">Batal</button>
          <button style="font-size: 12px; font-weight: normal" type="submit" id="btnSubmit" class="btn btn-warning text-white" onclick="simpanAkunAdmin();">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- MODAL 1 -->