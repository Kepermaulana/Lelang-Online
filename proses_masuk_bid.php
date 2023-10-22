<?php
session_start();
include "koneksi.php";
if($_POST){
    $harga_awal = $_POST['harga_awal'];
    $bid=$_POST['bid'];
    $harga_akhir = $harga_awal+$bid;
    $id_barang=$_POST['id_barang'];
    $tgl_lelang = date('Y-m-d');
    $id = mysqli_insert_id($conn);
    $query_lelang = mysqli_query($conn, "INSERT INTO tb_lelang (id_user, id_petugas, id_barang, harga_akhir,lelang_user, tgl_lelang)
        VALUES ('".$id."','".$_SESSION['id_user']."','2,3 ','".$id_barang."', '".$harga_akhir."', '".$harga_akhir."','".$tgl_lelang."')") or die (mysqli_error($conn));
    echo "<script>alert('Anda Berhasil ikut lelang');location.href='lelang.php'</script>";
}else{
    echo "<script>alert('Gagal ikut lelang');location.href='lelang.php'</script>";
}

    // if ($query_lelang) {
    //          $id = mysqli_insert_id($conn);
    //         mysqli_query($conn, "INSERT INTO tb_lelang (id_barang, harga_akhir,lelang_user)
    //             VALUES ('".$id."', '".$id_barang."', '".$harga_akhir."', '".$harga_akhir."')");
    //     echo "<script>alert('Anda Berhasil ikut lelang');location.href='lelang.php'</script>";
    // }else{
    //     echo "<script>alert('Gagal ikut lelang');location.href='lelang.php'</script>";

    // }
?>