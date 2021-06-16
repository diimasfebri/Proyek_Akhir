<?php 

  require "koneksi.php";
  ob_start();
  session_start();
  $_SESSION['status']="";

  $username = $_POST['username'];
  $pass = $_POST['password'];

  $data = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$pass'");
  $cek = mysqli_num_rows($data);
  $row = mysqli_fetch_assoc($data);

  if($cek > 0){
    // Data Diri di page Pengguna
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['email'] = $row['email'];
  
    $_SESSION['status'] = "masuk";
    
   echo "<script>
   alert('berhasil login');
 </script>";


  }

?>