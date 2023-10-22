<?php
if($_POST){
    $nama=$_POST['nama_petugas'];
    $username =$_POST['username'];
    $password = $_POST['password'];
    // $telepon= $_POST['telepon'];
    $level=$_POST['level'] == ['petugas'];

    include "../koneksi.php";
    
    $insert=mysqli_query($conn,"INSERT INTO tb_petugas (nama_petugas, username, password,level) VALUES ('".$nama."','".$username."','".md5($password)."','".$level."')") or die(mysqli_error($conn));
    if($insert){
        echo "<script>alert('Sukses Menambahkan Akun');location.href='home_admin.php';</script>";
    } else {
        echo "<script>alert('Gagal Menambahkan Akun');location.href='signup.php';</script>";
    }
}
?>