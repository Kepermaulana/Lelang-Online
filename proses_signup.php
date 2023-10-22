<?php
if($_POST){
    $nama=$_POST['nama_lengkap'];
    $username =$_POST['username'];
    $password = $_POST['password'];
    $telepon= $_POST['telepon'];

    include "koneksi.php";
  
    $insert=mysqli_query($conn,"INSERT INTO tb_masyarakat (nama_lengkap, username, password, telepon) VALUES ('".$nama."','".$username."','".md5($password)."','".$telepon."')") or die(mysqli_error($conn));
    if($insert){
        echo "<script>alert('Sukses Menambahkan Akun');location.href='login.php';</script>";
    } else {
        echo "<script>alert('Gagal Menambahkan Akun');location.href='signup.php';</script>";
    }
}
?>
