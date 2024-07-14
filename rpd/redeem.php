<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $transaksi_id = $_POST['transaksi_id'];
    $transaksi_kode = $_POST['transaksi_kode'];
    $payment_id = $_POST['payment_id'];

    $result = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE transaksi_id = '$transaksi_id'");
    $jumlah_data = $result->num_rows;
    if ($jumlah_data == 0) {
        echo `<script type="text/JavaScript">alert('Tidak ada data transaksi');</script>`;
        header("Location: index.php");
        exit;
    } else {
        $data = $result->fetch_assoc();
        $transaksi_kode2 = $data['transaksi_kode'];
        if ($transaksi_kode == $transaksi_kode2) {
            $transaksi_status = 'berhasil';
            $update = mysqli_query($koneksi, "UPDATE tb_transaksi SET transaksi_status='$transaksi_status' WHERE transaksi_id='$transaksi_id'");

            if ($update) {
                echo "<script>
                alert('Pembayaran berhasil');
            </script>";
                header("Location: index2.php");
                exit();
            } else {
                echo "<script>
                alert('Kode transaksi salah');
            </script>";
                header("Location: index2.php");
                exit();
            }
        }
    }
}
