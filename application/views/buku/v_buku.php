<?php 
  if(!empty($this->session->flashdata('info'))) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>SELAMAT !</strong> <?= $this -> session -> flashdata('info');?>
    </div>
  <?php endif ;?>

<div class="row">
  <div class="col-md-12">
    <a href="<?= base_url('buku/tambah_buku'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Buku </a>
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
          <th>GAMBAR</th>
          <th>KODE</th>
          <th>JUDUL</th>
          <th>PENGARANG</th>
          <th>PENERBIT</th>
          <th>TAHUN</th>
          <th>JUMLAH</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($data as $row) : ?>
          <tr>
            <td><?= $no++ ;?></td>
            <td style="text-align: center;">
              <img src="<?= base_url('assets/foto/buku/'.$row -> foto);?>" alt="<?= $row -> judul;?>" width="70px">
            </td>
            <td><?= $row -> id_buku ;?></td>
            <td><?= $row -> judul ;?></td>
            <td><?= $row -> nama_pengarang ;?></td>
            <td><?= $row -> nama ;?></td>
            <td><?= $row -> tahun ;?></td>
            <td>
              <?= $row -> jumlah ;?> / 
              <?php 
                // $this -> db -> select('id_buku');
                // $this -> db -> from('peminjaman');
                // $this -> db -> where('id_buku', $row -> id_buku);
                // $this -> db -> where('status', 'dipinjam')
                // $query = $this -> db -> get() -> num_rows();
                $query = $this -> db -> get_where('peminjaman', array('id_buku' => $row -> id_buku, 'status' => 'dipinjam')) -> num_rows();

                echo $query + $row -> jumlah;
              ;?>
            </td>
            <td>
              <a href="<?= base_url('buku/detail/');?><?= $row -> id_buku;?>" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a>
              <a href="<?= base_url('buku/edit/');?><?= $row -> id_buku;?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
              <a href="<?= base_url('buku/hapus/');?><?= $row -> id_buku;?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>


