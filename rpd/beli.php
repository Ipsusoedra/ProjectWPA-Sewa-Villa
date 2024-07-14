<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $villa_id = $_POST['villa_id'];
    $payment_id = $_POST['payment_id'];
    $jumlah_orang = $_POST['jumlah_orang'];
    $current_timestamp = date("Y-m-d H:i:s");


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



    $result = mysqli_query($koneksi, "SELECT * FROM tb_villa WHERE villa_id = '$villa_id'");
    $jumlah_data = $result->num_rows;
    if ($jumlah_data == 0) {
        echo "<script type='text/JavaScript'>alert('Tidak ada data villa');</script>";
        header("Location: index2.php");
        exit;
    } else {
        $data = $result->fetch_assoc();
        $villa_kapasitas = $data['villa_kapasitas'];
        $villa_harga = $data['villa_harga'];
        if ($jumlah_orang <= $villa_kapasitas) {
            $harga_charge = 0;
            $result2 = mysqli_query($koneksi, "SELECT * FROM tb_payment WHERE payment_id = '$payment_id'");
            $jumlah_data2 = $result2->num_rows;
            $data2 = $result2->fetch_assoc();
            $payment_harga = $data2['payment_harga'];

            $transaksi_total = $villa_harga + $harga_charge + $payment_harga;
            $insert = mysqli_query($koneksi, "INSERT INTO tb_transaksi (transaksi_id, user_id, villa_id, payment_id, jumlah_orang, harga_charge,transaksi_total, transaksi_kode, transaksi_tanggal, transaksi_status) VALUES (NULL, $user_id, $villa_id, $payment_id, $jumlah_orang, $harga_charge, $transaksi_total, '$code' , NOW() ,'belum bayar') ");
            if ($insert) {
                echo "<script>alert('Data User berhasil ditambahkan.');</script>";
                header("Location: index2.php");
                exit();
            } else {
                echo "<script>alert('Terjadi kesalahan saat menambahkan data User.');</script>";
            }
        } elseif ($jumlah_orang > $villa_kapasitas) {

            $harga_charge = 1000000;
            $result2 = mysqli_query($koneksi, "SELECT * FROM tb_payment WHERE payment_id = '$payment_id'");
            $jumlah_data2 = $result2->num_rows;
            $data2 = $result2->fetch_assoc();
            $payment_harga = $data2['payment_harga'];

            $$insert = mysqli_query($koneksi, "INSERT INTO tb_transaksi (transaksi_id, user_id, villa_id, payment_id, jumlah_orang, harga_charge,transaksi_total, transaksi_kode, transaksi_tanggal, transaksi_status) VALUES (NULL, $user_id, $villa_id, $payment_id, $jumlah_orang, $harga_charge, $transaksi_total, '$code' , NOW() ,'belum bayar') ");


            if ($insert) {
                echo "<script>
                alert('Data User berhasil ditambahkan.');
            </script>";
                header("Location: index2.php");
                exit();
            } else {
                echo "<script>
                alert('Terjadi kesalahan saat melakukan pembelian.');
            </script>";
            }
        } else {
            echo `<script type="text/JavaScript">
                alert('Mohon isikan jumlah anggota yang menginap');
              </script>`;
        }
    }
}
