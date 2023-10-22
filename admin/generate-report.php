<?php
// Sisipkan konfigurasi dan file database
require_once '../koneksi.php';
// require_once '../../config/database.php';

// Periksa apakah petugas masuk atau belum, dan periksa peran petugas
if (!isset($_SESSION['user_id']) || $_SESSION['level'] !== 'admin') {
  // header('location: ../login.php');
  // exit;
}

// Query untuk mendapatkan daftar barang yang dikelola oleh petugas
$sql = "SELECT b.nama_barang, b.tanggal_awal, b.harga_awal, l.harga_akhir, m.nama_lengkap, m.telepon
        FROM tb_barang b
        LEFT JOIN tb_lelang l ON b.id_barang = l.id_barang
        LEFT JOIN tb_masyarakat m ON l.id_user = m.id_user
        ORDER BY b.tanggal_awal ASC";

$barang_list = [];

if ($stmt = $conn->prepare($sql)) {
  if ($stmt->execute()) {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $barang_list[] = $row;
    }
  }
  $stmt->close();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generate Report - Petugas</title>
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
  <?php include './nav_admin.php'; ?>

  <div class="container mt-4">
    <h2>Generate Report - Petugas</h2>
    <p>Selamat datang, Petugas!</p>

    <div id="pdf-content">
      <h3>Daftar Barang yang Anda Kelola:</h3>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nama Barang</th>
            <th>Tanggal Lelang</th>
            <th>Harga Awal (IDR)</th>
            <th>Harga Akhir (IDR)</th>
            <th>Pemenang Lelang</th>
            <th>No. Telepon</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($barang_list as $barang) : ?>
            <tr>
              <td><?php echo $barang['nama_barang']; ?></td>
              <td><?php echo $barang['tanggal_awal']; ?></td>
              <td><?php echo $barang['harga_awal']; ?></td>
              <td><?php echo $barang['harga_akhir']; ?></td>
              <td><?php echo $barang['nama_lengkap']; ?></td>
              <td><?php echo $barang['telepon']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <button class="btn btn-primary" onclick="generatePDF()">Generate PDF</button>
  </div>
  <script>
    function generatePDF() {
      var printContent = document.getElementById("pdf-content").innerHTML;
      var originalContent = document.body.innerHTML;
      document.body.innerHTML = printContent;
      window.print();
      document.body.innerHTML = originalContent;
    }
  </script>
