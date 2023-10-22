<?php
include "../koneksi.php";
        $query_transaksi= mysqli_query($conn,"select * from tb_lelang where id_lelang ORDER BY id_lelang DESC");
        $data_kemas=mysqli_fetch_array($query_transaksi);


        $query_hasil = mysqli_query($conn, "SELECT * FROM history_lelang d
            JOIN tb_barang b ON b.id_barang = d.id_barang WHERE
            id_lelang = '".$data_kemas['id_lelang']."'");
        $hasil = mysqli_fetch_array($query_hasil);


    // $query_hasil = mysqli_query($conn, "select * from tb_barang where id_barang='".$_GET['id_barang']."'");
    // $hasil = mysqli_fetch_array($query_hasil);
    $harga[]=$hasil['penawaran_harga'];
    $harga_akhir= max($harga);

    // $input = mysqli_query($conn, "update tb_barang set
    // nama_barang= '".$nama_barang."', bid='".$bid."',
    // deskripsi='".$deskripsi."', harga_awal='".$harga."', status = '".$status."'
    // where id_barang='".$id_barang."'");
    
    // if ($input) {
    //     echo "<script>alert('Berhasil');location.href='barang.php';</script>";
    // }
    // else {
    //     echo "<script>alert('Gagal');location.href='barang.php';</script>";
    // }

        $input = mysqli_query($conn, "update tb_lelang set
        harga_akhir='".$harga_akhir."' where id_barang='".$_GET['id_barang']."'");

        $input2 = mysqli_query($conn, "update history_lelang set
        harga_akhir='".$harga_akhir."' where id_barang='".$_GET['id_barang']."'");

        if ($input && $input2) {
            echo "<script>alert('Berhasil');location.href='barang.php';</script>";
        }
        else {
            echo "<script>alert('Gagal');location.href='barang.php';</script>";
        }
?>




