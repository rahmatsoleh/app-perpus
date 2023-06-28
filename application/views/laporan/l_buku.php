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
      <a href="<?= base_url('laporan/pdf_buku');?>" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
    </div>
  </div>
  <br>

  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Tabel Data Buku</h3>
  </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>KODE</th>
            <th>JUDUL</th>
            <th>PENGARANG</th>
            <th>PENERBIT</th>
            <th>TAHUN</th>
            <th>JUMLAH</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($data as $row) :?>
            <tr>
              <td><?= $no++ ;?></td>
              <td><?= $row -> id_buku;?></td>
              <td><?= $row -> judul;?></td>
              <td><?= $row -> nama_pengarang;?></td>
              <td><?= $row -> nama;?></td>
              <td><?= $row -> tahun;?></td>
              <td>
                <?php
                $query = $this -> db -> get_where('peminjaman', array('id_buku' => $row -> id_buku, 'status' => 'dipinjam')) -> num_rows();

                echo $query + $row -> jumlah;
              ;?>
              </td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
</div>
</body>
</html>