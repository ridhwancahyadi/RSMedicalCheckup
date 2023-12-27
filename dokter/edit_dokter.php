<?php
require "../functions.php";

$id = $_GET["id_dokter"];
// Query data dokter berdasarkan id
$dokter = query("SELECT * FROM dokter WHERE id_dokter = $id")[0];
    // cek apakah tombol submit sudah ditekan atau belum
    if(isset($_POST["submit"])) {
    // Cek Data dokter
    // cek apakah data berhasil diubah atau tidak
    if(editDokter($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }else {
        echo "<script>
        alert('Data gagal diubah!');
        document.location.href = 'index.php';
    </script>";
    }
}elseif(isset($_POST["back"])) {
    echo "<script>
    document.location.href='index.php'
    </script>";
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
          <img src="../assets/icon/doctor.png" alt="" width="50">
        <h4>Data Dokter</h4>
      </div>

      <h1 class="add-heading">Change Data dokter</h1>
      <form action="" method="post">

      <div class="mb-3 row">
          <label for="sip_dokter" class="col-sm-2 col-form-label">SIP Dokter</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="sip_dokter" name="sip_dokter" value="<?=$dokter['sip_dokter'];?>">
          </div>
      </div>
      <div class="mb-3 row">
          <label for="nama" class="col-sm-2 col-form-label">Nama dokter</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama_dokter" value="<?=$dokter['nama_dokter'];?>">
          </div>
      </div>
      <div class="mb-3 row">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?=$dokter['alamat'];?>">
          </div>
      </div>
      <div class="mb-3 row">
          <label for="nomor-telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nomor-telepon" name="nomor_telepon" value="<?=$dokter['nomor_telepon'];?>">
          </div>
      </div>
      <div class="mb-3 row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="<?=$dokter['email'];?>">
          </div>
      </div>
      <div class="mb-3 row">
          <label for="spesialisasi" class="col-sm-2 col-form-label">Spesialisasi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="<?=$dokter['spesialisasi'];?>">
          </div>
      </div>
      <button type="submit" class="btn edit" name="submit">Change Data</button>
      <button type="submit" class="btn back float-end" name="back">Back</button>
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
