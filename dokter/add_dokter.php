<?php
    require "../functions.php";
        // cek apakah tombol submit sudah ditekan atau belum
        if(isset($_POST["submit"])) {
                        // Cek Data Pasien
    $sip_dokter =  $_POST["sip_dokter"];
    $cekDokter = mysqli_query($conn, "SELECT * FROM dokter WHERE sip_dokter = '$sip_dokter'");
    if(mysqli_num_rows($cekDokter) > 0) {
        $error = true;
    }else{
      // cek apakah data berhasil di tambahkan atau tidak
      if(tambahDokter($_POST) > 0) {
        $valid = true;
      }else {
        $tidakValid = true;
      }
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
<?php include "sidebar.php";?>

<div class="container" id="hal2">
        <!--Container Main start-->
      <div class="data-header d-flex align-items-center">
          <img src="../assets/icon/patient.png" alt="" width="50">
        <h4>Data Patient</h4>
      </div>
      <a href="index.php"><button type="btn" class="btn lihat-data">Lihat Data</button></a>

      <h1 class="add-heading">Add Data Pasien</h1>
<form action="" method="post">
  <?php if(isset($error)) :?>
    <div class="alert alert-danger mt-3" role="alert">
   SIP Dokter Sudah Tersedia
</div>
<?php elseif(isset($valid)) :?>
  <div class="alert alert-success mt-3" role="alert">
  Data Dokter Berhasil Dimasukkan
</div>
<?php elseif(isset($tidakValid)) : ?>
  <div class="alert alert-danger mt-3" role="alert">
   Data Gagal Dimasukkan
</div>
  <?php endif?>
<div class="mb-3 row">
    <label for="sip_dokter" class="col-sm-2 col-form-label">SIP Dokter</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sip_dokter" name="sip_dokter">
    </div>
</div>
<div class="mb-3 row">
    <label for="nama_dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_dokter" name="nama_dokter">
    </div>
</div>
<div class="mb-3 row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat Dokter</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="alamat" name="alamat">
    </div>
</div>
<div class="mb-3 row">
    <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon">
    </div>
</div>
<div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email">
    </div>
</div>
<div class="mb-3 row">
    <label for="spesialisasi" class="col-sm-2 col-form-label">Spesialisasi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="spesialisasi" name="spesialisasi">
    </div>
</div>
<button type="submit" class="btn btn-hijau" name="submit">Add Doctor</button>
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
