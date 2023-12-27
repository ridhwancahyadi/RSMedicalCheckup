<div id="table-checkup">
     <h2 class="recent">Recent Data Checkup <span class="span-short">(short by date)</span></h2>
    
    <div class="table-responsive col-md-10 mb-5">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr class="text-center">
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Tanggal Checkup</th>
            <th>Nama Dokter</th>
            <th>Spesialisasi</th>
            <th>Hasil Checkup</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <?php $i = 1;?>
          <?php foreach ($dataCheckup as $row) : ?>
              <th scope="row"><?=$i;?></th>
              <td><?= $row["nama_pasien"]?></td>
              <td><?= $row["tanggal_checkup"]?></td>
              <td><?= $row["nama_dokter"]?></td>
              <td><?= $row["spesialisasi"]?></td>
              <td><?= $row["hasil_checkup"]?></td>
             
          </tr>
          <?php $i++;?>
          <?php endforeach;?>
        </tbody>
      </table>

    </div>
     </div>