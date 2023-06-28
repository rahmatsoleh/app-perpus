<?php 
  if(!empty($this->session->flashdata('info'))) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>SELAMAT !</strong> <?= $this -> session -> flashdata('info');?>
    </div>
  <?php endif ;?>

<div class="row">
  <div class="col-md-12">
    <a href="<?= base_url(); ?>petugas/tambah_petugas" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Petugas </a>
  </div>
</div>
<br>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Tabel Data Petugas</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>Nomor Induk</th>
          <th>Foto</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Level</th>
          <TH>AKSI</TH>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1 ;foreach ($data as $row) :?>
          <tr>
            <td><?= $no++ ;?></td>
            <td style="text-align: center;">
              <?php if($row -> foto == null) {?>
                <img width='70px' height='70px' src="<?= base_url('assets/foto/petugas/null.jpg');?>" alt="<?= $row -> nama;?>">
              <?php } else {?>
                <img width='70px' height='70px' src="<?= base_url('assets/foto/petugas/'.$row -> foto);?>" alt="<?= $row -> nama;?>">
              <?php } ?>
            </td>
            <td><?= $row -> no_pegawai ;?></td>
            <td><?= $row -> nama ;?></td>
            <td><?= $row -> jenkel ;?></td>
            <td><?= $row -> level ;?></td>
            <td class="text-center">
              <a href="<?= base_url('petugas/detail/'. $row -> id);?>" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a>
              <a href="<?= base_url()?>petugas/hapus/<?= $row -> id;?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


