<?php
$hostname = "localhost";
$user_nama = "root";
$user_password = "";
$database = "db_rockpad_sewa_villa";


$koneksi = mysqli_connect($hostname, $user_nama, $user_password, $database) or die(mysqli_error($koneksi));
