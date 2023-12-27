<div id="table-dokter">
      <!-- Data Dokter -->
      <h2 class="recent">Recent Data Dokter <span class="span-short">(short by name)</span></h2>

      <div class="table-responsive col-md-10 mb-5">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Dokter</th>
              <th>No Telepon</th>
              <th>Email</th>
              <th>Spesialisasi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;?>

            <?php foreach ($dataDokter as $row) : ?>
            <tr>
              <th scope="row" style="font-size: 16px;"><?=$i;?></th>
              <td><?= $row["nama_dokter"]?></td>
              <td><?= $row["nomor_telepon"]?></td>
              <td><?= $row["email"]?></td>
              <td><?= $row["spesialisasi"]?></td>
              
            </tr>
            <?php $i++;?>
            <?php endforeach;?>
          </tbody>
        </table>

      </div>
     </div>
