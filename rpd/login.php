<?php
include 'koneksi.php';
if (isset($_POST['login'])) {
    $user_nama = $_POST['user_nama'];
    $user_password = $_POST['user_password'];


    if (empty($user_nama)) {
        echo `<script type="text/JavaScript" >alert('Masukkan username');</script>`;
        header("Location: index.php");
        exit;
    } elseif (empty($user_password)) {
        echo `<script type="text/JavaScript">alert('Masukkan password');</script>`;
        header("Location: index.php");
        exit;
    } elseif (empty($user_nama and
        $user_password)) {
        echo `<script type="text/JavaScript">alert('Masukkan username dan password');</script>`;
        header("Location: index.php");
        exit;
    } elseif ($user_nama and $user_password) {
        $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE user_nama = '$user_nama' AND user_password = md5('$user_password')  ");
        $jumlah_data = $result->num_rows;

        if ($jumlah_data == 0) {
            echo `<script type="text/JavaScript">alert('Anda belum terdaftar');</script>`;
            header("Location: index.php");
            exit;
        } else {
            $data = $result->fetch_assoc();
            $user_id = $data['user_id'];
            $user_nama = $data['user_nama'];
            $user_password = $data['user_password'];
            $user_kontak = $data['user_kontak'];
            $user_status = $data['user_status'];
            $user_gambar = $data['user_gambar'];

            if ($user_status == "administrator") {
                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_nama'] = $user_nama;
                $_SESSION['user_password'] = $user_password;
                $_SESSION['user_kontak'] = $user_kontak;
                $_SESSION['user_status'] = $user_status;
                $_SESSION['user_gambar'] = $user_gambar;
                header("Location: admin/index.php");
                exit;
            } elseif ($user_status == "customer") {
                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_nama'] = $user_nama;
                $_SESSION['user_password'] = $user_password;
                $_SESSION['user_kontak'] = $user_kontak;
                $_SESSION['user_status'] = $user_status;
                $_SESSION['user_gambar'] = $user_gambar;

                echo `<script type="text/JavaScript">alert('$user_nama anda berhasil login');</script>`;
                header("Location: index2.php");
                exit;
            } else {
                echo `<script type="text/JavaScript">alert('Anda tidak terdaftar');</script>`;
                header("Location: index.php");
                exit;
            }
        }
    }
}
