<?php
require "../functions.php";

$dataDokter = query("SELECT * FROM dokter");

// Pagination
// Konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData=count($dataDokter);
$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$dokter = query("SELECT * FROM dokter LIMIT $awalData, $jumlahDataPerHalaman");

// Searching

if(isset($_POST["cari"])) {
    $dokter = query("SELECT * FROM dokter");
    $dokter = cariDokter($_POST["keyword"]);
  }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Medical Checkup - Dokter</title>
    <!-- Link Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    ></script>

    <!-- Link CSS -->
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body id="body-pd">
    <?php include "sidebar.php";?>

    <div class="box">
      <h1>Dokter</h1>
      <h4><small>Data Dokter</small></h4>
      <p>
        Jumlah Seluruh Data: <strong><?=count($dataDokter); ?></strong>
      </p>
      <div class="pull-right">
        <a href="add_dokter.php" class="btn btn-hijau btn-xs">Add Data</a>
      </div>
      <div class="search">
      <form method="post" action="" class="d-flex w-25" role="search">
          <input
            class="form-control me-2"
            type="search"
            name="keyword"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn" type="submit" name="cari">Search</button>
        </form>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>SIP Dokter</th>
              <th>Nama Dokter</th>
              <th>Alamat</th>
              <th>No Telepon</th>
              <th>Email</th>
              <th>Spesialisasi</th>
              <th>Operasi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;?>

            <?php foreach ($dokter as $row) : ?>
            <tr>
              <th scope="row" style="font-size: 16px;"><?=$i;?></th>
              <td><?= $row["sip_dokter"]?></td>
              <td><?= $row["nama_dokter"]?></td>
              <td><?= $row["alamat"]?></td>
              <td><?= $row["nomor_telepon"]?></td>
              <td><?= $row["email"]?></td>
              <td><?= $row["spesialisasi"]?></td>
              <td>
             <div class="operasi text-center">
             <a href="edit_dokter.php?id_dokter=<?=$row['id_dokter'];?>">
                  <button type="button" class="btn edit m-1">Edit</button></a
                >
                <a href="delete_dokter.php?id_dokter=<?=$row['id_dokter'];?>">
                  <button type="button" class="btn delete" 
                  onclick="return confirm('Ingin Menghapus dokter<?=$row['nama_dokter']?> ?');">Hapus</button></a
                >
             </div>
              </td>
            </tr>
            <?php $i++;?>
            <?php endforeach;?>
          </tbody>
        </table>
        <!-- Navigasi -->
        <?php include "../navigasi.php"; ?>
      </div>
    </div>

    <!--Container Main end-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <!-- script local -->
    <script src="../script.js"></script>
  </body>
</html>
