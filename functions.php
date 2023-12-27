<?php
      // Koneksi ke database
      $conn = mysqli_connect("localhost", "root", "", "medicalcheckup");
      if(mysqli_connect_errno()) {
        echo mysqli_connect_error();
      }
      function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row; // menambahkan elemen baru di tiap akhir array
        }
        return $rows;
    }

//  Function Pasien
function tambahPasien($data) {
    global $conn;
    $nomor_identitas = htmlspecialchars( $data["nomor_identitas"]); 
    $nama = htmlspecialchars( $data["nama_pasien"]); 
    $tanggal_lahir = htmlspecialchars( $data["tanggal_lahir"]);
    $alamat = htmlspecialchars( $data["alamat"]);
    $nomor_telepon = htmlspecialchars( $data["nomor_telepon"]);
    $email = htmlspecialchars( $data["email"]);

    // Query insert data
    $query = "INSERT INTO pasien (nomor_identitas, nama_pasien, tanggal_lahir, alamat, nomor_telepon, email)
                VALUES 
                ('$nomor_identitas','$nama', '$tanggal_lahir', '$alamat', '$nomor_telepon', '$email')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusPasien($id) {
  global $conn;
  $query = "DELETE FROM pasien where id_pasien = $id";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// Function Edit
function editPasien($data) {
  global $conn;
  $id = $_GET["id_pasien"];
  $nomor_identitas = htmlspecialchars( $data["nomor_identitas"]); 
  $nama = htmlspecialchars( $data["nama_pasien"]); 
  $tanggal_lahir = htmlspecialchars( $data["tanggal_lahir"]);
  $alamat = htmlspecialchars( $data["alamat"]);
  $nomor_telepon = htmlspecialchars( $data["nomor_telepon"]);
  $email = htmlspecialchars( $data["email"]);

  // Query insert data
  $query = "UPDATE pasien SET 
          nomor_identitas = '$nomor_identitas',
          nama_pasien = '$nama',
          tanggal_lahir = '$tanggal_lahir',
          alamat = '$alamat',
          nomor_telepon = '$nomor_telepon',
          email = '$email'
          WHERE id_pasien = $id
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cariPasien($keyword) {
  $query = "SELECT * FROM pasien
      WHERE nomor_identitas LIKE '%$keyword%' OR
      nama_pasien LIKE '%$keyword%' OR
      alamat LIKE '%$keyword%'
      ";
return query($query);
}
// End Function Pasien

// Function Dokter
function tambahDokter($data) {
  global $conn; 
  $sip_dokter = htmlspecialchars( $data["sip_dokter"]); 
  $nama = htmlspecialchars( $data["nama_dokter"]); 
  $alamat = htmlspecialchars( $data["alamat"]);
  $nomor_telepon = htmlspecialchars( $data["nomor_telepon"]);
  $email = htmlspecialchars( $data["email"]);
  $spesialisasi = htmlspecialchars( $data["spesialisasi"]);

  // Query insert data
  $query = "INSERT INTO dokter (sip_dokter, nama_dokter, alamat, nomor_telepon, email, spesialisasi)
              VALUES 
              ('$sip_dokter', '$nama', '$alamat', '$nomor_telepon', '$email','$spesialisasi')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusDokter($id) {
  global $conn;
  $query = "DELETE FROM dokter where id_dokter = $id";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// Function Edit
function editDokter($data) {
  global $conn;
  $id = $_GET["id_dokter"];
  $sip_dokter = htmlspecialchars( $data["sip_dokter"]); 
  $nama = htmlspecialchars( $data["nama_dokter"]); 
  $alamat = htmlspecialchars( $data["alamat"]);
  $nomor_telepon = htmlspecialchars( $data["nomor_telepon"]);
  $email = htmlspecialchars( $data["email"]);
  $spesialisasi = htmlspecialchars( $data["spesialisasi"]);

  // Query insert data
  $query = "UPDATE dokter SET 
          sip_dokter = '$sip_dokter',
          nama_dokter = '$nama',
          alamat = '$alamat',
          nomor_telepon = '$nomor_telepon',
          email = '$email',
          spesialisasi = '$spesialisasi'
          WHERE id_dokter = $id
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cariDokter($keyword) {
  $query = "SELECT * FROM dokter
      WHERE sip_dokter LIKE '%$keyword%' OR
      nama_dokter LIKE '%$keyword%' OR
      alamat LIKE '%$keyword%' OR
      spesialisasi LIKE '%$keyword%'
      ";
return query($query);
}
// End Function Dokter

// Function Checkup
function tambahCheckup($data) {
    global $conn;
    $nama_pasien = htmlspecialchars($data["nama_pasien"]);
    $nama_dokter = htmlspecialchars($data["nama_dokter"]);
    $tanggal_checkup = htmlspecialchars($data["tanggal_checkup"]);
    $hasil_checkup = htmlspecialchars($data["hasil_checkup"]);
    $query = "INSERT INTO medicalcheckup(id_pasien, id_dokter, tanggal_checkup, hasil_checkup) 
    VALUES 
    ('$nama_pasien', '$nama_dokter','$tanggal_checkup', '$hasil_checkup')";
    mysqli_query($conn, $query) or die (mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function hapusCheckup($id) {
  global $conn;
  $query = "DELETE FROM checkup where id_checkup = $id";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function editCheckup($data) {
    global $conn;
    $id = $_GET["id_checkup"];
    $nama_pasien = htmlspecialchars($data["nama_pasien"]);
    $nama_dokter = htmlspecialchars($data["nama_dokter"]);
    $tanggal_checkup = htmlspecialchars($data["tanggal_checkup"]);
    $hasil_checkup = htmlspecialchars($data["hasil_checkup"]);

    // Query insert data
    $query = "UPDATE medicalcheckup  
    JOIN pasien ON medicalcheckup.id_pasien = pasien.id_pasien
    JOIN dokter ON medicalcheckup.id_dokter = dokter.id_dokter
    SET
    pasien.nama_pasien = '$nama_pasien',
    dokter.nama_dokter = '$nama_dokter',
    medicalcheckup.tanggal_checkup = '$tanggal_checkup',
    medicalcheckup.hasil_checkup = '$hasil_checkup'
    WHERE medicalcheckup.id_checkup = $id
  ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function cariCheckup($keyword) {
  $query = "SELECT * FROM medicalcheckup 
  INNER JOIN pasien ON medicalcheckup.id_pasien = pasien.id_pasien
  INNER JOIN dokter ON medicalcheckup.id_dokter = dokter.id_dokter
      WHERE nama_pasien LIKE '%$keyword%' OR
      nama_dokter LIKE '%$keyword%' OR
      hasil_checkup LIKE '%$keyword%'
      ";
return query($query);
}
?>
