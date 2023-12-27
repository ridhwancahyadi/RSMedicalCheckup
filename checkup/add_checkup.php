<?php
require "../functions.php";
    // cek apakah tombol submit sudah ditekan atau belum
    if(isset($_POST["submit"])) {
    // cek apakah data berhasil di tambahkan atau tidak
    if(tambahCheckup($_POST) > 0) {
      $valid = true;
    }else {
    $tidakValid = true;

  }

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Medical Checkup</title>

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
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    ></script>

    <!-- Link CSS -->
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body id="body-pd">
  <?php 
  include "sidebar.php";
  ?>
<div class="container" id="hal2">
        <!--Container Main start-->
      <div class="data-header d-flex align-items-center">
        <img src="../assets/icon/medical-checkup.png" alt="" width="50">
        <h4>Data Checkup</h4>
      </div>
      <a href="index.php">
        <button type="btn" class="btn lihat-data">Lihat Data</button>
      </a>
      <h1 class="add-heading mt-3">Add Data Checkup</h1>
<form action="" method="post">
<?php if(isset($valid)) :?>
  <div class="alert alert-success mt-3" role="alert">
  Data Checkup Berhasil Dimasukkan
</div>
<?php elseif(isset($tidakValid)) : ?>
  <div class="alert alert-danger mt-3" role="alert">
   Ada Kesalahan Data Checkup, Silahkan Coba Lagi!
</div>

  <?php endif?>
<div class="mb-3 row">
    <label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
    <div class="col-sm-10">
        <select name="nama_pasien" id="nama_pasien" class="form-control" required>
            <option value="">- Pilih -</option>
            <?php
            $sqlPasien = mysqli_query($conn, "SELECT * FROM pasien ORDER BY nama_pasien ASC");
            while($data_pasien = mysqli_fetch_array($sqlPasien)) {
                echo "<option value='".$data_pasien['id_pasien']."'>".$data_pasien['nama_pasien']."</option>";
            } 
            ?>
        </select>
     
    </div>
</div>
<div class="mb-3 row">
    <label for="nama_dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
    <div class="col-sm-10">
        <select name="nama_dokter" id="nama_dokter" class="form-control" required>
            <option value="">- Pilih -</option>
            <?php
            $sqlDokter = mysqli_query($conn, "SELECT * FROM dokter ORDER BY nama_dokter ASC");
            while($data_dokter = mysqli_fetch_array($sqlDokter)) {
                echo "<option value='".$data_dokter['id_dokter']."'>".$data_dokter['nama_dokter']."</option>";
            } 
            ?>
        </select>
    </div>
</div>
<div class="mb-3 row">
    <label for="tanggal_checkup" class="col-sm-2 col-form-label">Tanggal Checkup</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="tanggal_checkup" name="tanggal_checkup">
    </div>
</div>

<div class="mb-3 row">
    <label for="hasil_checkup" class="col-sm-2 col-form-label">Hasil Checkup</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="hasil_checkup" name="hasil_checkup">
    </div>
</div>
<button type="submit" class="btn btn-hijau" name="submit">Simpan</button>
</form>

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
