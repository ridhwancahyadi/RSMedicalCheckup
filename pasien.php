<div id="table-pasien">
       <!-- Data Pasien -->
       <h2 class="recent">Recent Data Pasien <span class="span-short">(short by name)</span></h2>
      <div class="table-responsive col-md-8 mb-5">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr class="text-center">
              <th>No</th>
              <th>Nama Pasien</th>
              <th>Alamat</th>
              <th>No Telepon</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php $i = 1;?>
            <?php foreach ($dataPasien as $row) : ?>
                <th scope="row"><?=$i;?></th>
                <td><?= $row["nama_pasien"]?></td>
                <td><?= $row["alamat"]?></td>
                <td><?= $row["nomor_telepon"]?></td>
                <td><?= $row["email"]?></td>
            </tr>
            <?php $i++;?>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
     </div>