<?php
include "functions.php";

$checkup = query("SELECT * FROM medicalcheckup 
                INNER JOIN pasien ON medicalcheckup.id_pasien = pasien.id_pasien
                INNER JOIN dokter ON medicalcheckup.id_dokter = dokter.id_dokter");
$pasien = query("SELECT * FROM pasien");
$dokter = query("SELECT * FROM dokter");

// Hitung Seluruh Data Pasien, Dokter dan Checkup
$jumlahDataPasien=count($pasien);
$jumlahDataDokter=count($dokter);
$jumlahDataCheckup=count($checkup);
// Limit page
$dataPasien = query("SELECT * FROM pasien ORDER BY nama_pasien asc LIMIT 0, 5");
$dataDokter = query("SELECT * FROM dokter ORDER BY nama_dokter asc LIMIT 0, 5");
$dataCheckup = query("SELECT * FROM medicalcheckup 
                INNER JOIN pasien ON medicalcheckup.id_pasien = pasien.id_pasien
                INNER JOIN dokter ON medicalcheckup.id_dokter = dokter.id_dokter ORDER BY tanggal_checkup desc LIMIT 0, 5
                ");
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
    <link rel="stylesheet" href="style.css" />
  </head>
  <body id="body-pd">
    <?php 
    include "sidebar.php";
    include "highlight.php";
    ?>
    <!-- Data Checkup -->
    <div class="box">
 <?php
// Cari
if(isset($_POST["cari"])) {
  $kategori = $_POST['kategori'];
  $keyword = $_POST['keyword'];
  switch ($kategori) {
    case 'pasien':
      $dataPasien = cariPasien($_POST["keyword"]);
      include "pasien.php";
      break;
      case 'dokter':
        $dataDokter = cariDokter($_POST["keyword"]);
        include "dokter.php";
        break;
        case 'checkup':
          $dataCheckup = cariCheckup($_POST["keyword"]);
          include "checkup.php";
          default:
          break;
        }
      }else {
        include "checkup.php";
        include "pasien.php";
        include "dokter.php";
}
 ?>
</div>
    <!--Container Main end-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <!-- script local -->
    <script src="script.js">
    </script>
  </body>
</html>
