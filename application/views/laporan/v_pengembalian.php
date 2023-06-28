<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <style>
    .tgl-akhir {
      margin-left: -20px;
    }
    .tombol {
      margin-left: -20px;
    }
  </style>
</head>
<body>
  <div class="row">
    <div class="col-md-12">
      <!-- <a href="<?= base_url('peminjaman/tambah_peminjam'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Peminjaman </a> -->
    </div>
  </div>
  <br>

  <div class="box">
    <div class="box-header">
      <form action="<?= base_url('laporan/pengembalian');?>" method="post">
        <div class="row">
          <div class="col-md-3">
            <h4 class="text-primary"><b>Filter Laporan Pengembalian</b></h4>
          </div>
          <div class="col-md-2">
            <input type="text" name="tgl_awal" class="form-control" placeholder="tanggal Awal" onfocus="(this.type ='date');">
          </div>
          <div class="col-md-2">
            <input type="text" name="tgl_akhir" class="form-control tgl-akhir" placeholder="tanggal Akhir" onfocus="(this.type ='date');">
          </div>
          <div class="col-md">
            <button type="submit" class="btn btn-primary tombol"><i class="fa fa-filter"></i></button>
            <a href="<?= base_url('laporan/pengembalian');?>" class="btn btn-warning"><i class="fa fa-refresh"></i></a>
            <a href="<?= base_url('laporan/pdf_pengembalian');?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i>  Cetak </a>
          </div>
        </div>
      </form>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>NISN</th>
            <th>NAMA</th>
            <th>JUDUL BUKU</th>
            <th>TANGGAL KEMBALI</th>
            <th>DENDA</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($data as $row) :?>
            <tr>
              <td><?= $no++ ;?></td>
              <td><?= $row -> nisn;?></td>
              <td><?= $row -> nama;?></td>
              <td><?= $row -> judul;?></td>
              <td><?= mediumdate_indo($row -> tgl_kembalikan);?></td>
              <td>Rp. <?= $row -> denda;?></td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
</div>
</body>
</html>