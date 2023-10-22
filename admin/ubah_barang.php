<?php
        include "nav_admin.php";
        include "../koneksi.php";
        $qry_barang = mysqli_query($conn, "select * from tb_barang where id_barang='".$_GET['id_barang']."'");
        $data_barang = mysqli_fetch_array($qry_barang);

?>

<h2 align="center">Ubah Barang</h2>
<div class="container">
    <div class="card">
        <h1 class="card-header">
            <div class="card-body">
                <form method= "POST" action="proses_ubah_barang.php" enctype="multipart/form-data">
                <input type="hidden" name="id_barang" value="<?=$data_barang['id_barang']?>">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label"><h5>Nama Barang</h5></label>
                        <input type="text" class="form-control" name = "nama_barang" value="<?=$data_barang['nama_barang']?>" placeholder="Masukkan Judul Barang" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga_awal" class="form-label"><h5>harga_awal</h5></label>
                        <input type="text" class="form-control" name = "harga_awal" value="<?=$data_barang['harga_awal']?>" placeholder="Masukkan harga_awal" required>
                    </div>

                    <div class="mb-3">
                        <label for="bid" class="form-label"><h5>bid</h5></label>
                        <input type="text" class="form-control" name = "bid" value="<?=$data_barang['bid']?>" placeholder="Masukkan bid" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label"><h5>Deskripsi</h5></label>
                        <textarea type="text" class="form-control" name = "deskripsi"  placeholder="Masukkan deskripsi" required><?=$data_barang['deskripsi']?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label"><h5>Foto</h5></label>
                        <img src="../foto/<?=$data_barang['foto']?>" width="100"/>
                        <input type="file" class="form-control" name = "foto" value="<?=$data_barang['foto']?>" >
                    </div>
                    <input type="submit" name="simpan" class="btn btn-primary" value="SIMPAN">
                </form>
            </div>
        </h1>
    </div>
</div>
<!-- <?php
include "footer_admin.php";
?> -->