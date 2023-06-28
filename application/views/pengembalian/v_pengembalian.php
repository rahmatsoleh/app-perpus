<?php 
  if(!empty($this->session->flashdata('info'))) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>SELAMAT !</strong> <?= $this -> session -> flashdata('info');?>
    </div>
  <?php endif ;?>

<div class="row">
  <div class="col-md-12">
    <!-- <a href="<?= base_url('peminjaman/tambah_peminjam'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Peminjaman </a> -->
  </div>
</div>
<br>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Tabel Data Pengembalian</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>ID ANGGOTA</th>
          <th>NAMA ANGGOTA</th>
          <th>JUDUL BUKU</th>
          <th>TANGGAL DI KEMBALIKAN</th>
          <th>DENDA</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($data as $row) : ?>
          <tr>
            <td><?= $no++ ;?></td>
            <td><?= $row -> id_anggota ;?></td>
            <td><?= $row -> nama ;?></td>
            <td><?= $row -> judul ;?></td>
            <td><?= mediumdate_indo($row -> tgl_kembalikan) ;?></td>
            <td>Rp. <?= $row -> denda;?></td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>


