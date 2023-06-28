<div class="row">
    <div class="col-md-12">
      <a href="<?= base_url('laporan/pdf_anggota');?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
    </div>
  </div>
  <br>

  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Tabel Data Anggota</h3>
  </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>FOTO</th>
            <th>NISN</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>TELEPON</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($data as $row) :?>
            <tr>
              <td><?= $no++ ;?></td>
              <td style="text-align: center;">
                <img src="<?= base_url('assets/foto/anggota/'. $row -> foto);?>" width="70px" height="70px" alt="<?= $row -> nama;?>">
              </td>
              <td><?= $row -> nisn;?></td>
              <td><?= $row -> nama;?></td>
              <td><?= $row -> jenkel;?></td>
              <td><?= $row -> telepon;?></td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
</div>