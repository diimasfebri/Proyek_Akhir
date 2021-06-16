<?php

  require "koneksi.php";
  ob_start();
  session_start();

  $username = $_POST['username'];
  $pass = $_POST['password'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];



    $sql = "INSERT INTO tb_user (username, password, nama, email)
    VALUES ('$username', '$pass', '$nama', '$email')";

    // $sql = "INSERT INTO tb_user SET username='$username', pass='$pass',
    // nama_lengkap='$nama_lengkap', email='$email', nomor_telp='$nomor_telp'";

    mysqli_query($koneksi, $sql);
    if (mysqli_error($koneksi)) {
      // echo "<script>alert('Anda xxxxx Terdaftar')</script>";

    } else {
      echo "<script>alert('Anda Berhasil Terdaftar');
      location.replace('login.php');
      </script>";

    }

?>
