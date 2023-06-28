<?php 
  if(!empty($this->session->flashdata('info'))) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>SELAMAT !</strong> <?= $this -> session -> flashdata('info');?>
    </div>
  <?php endif ;?>

<div class="row">
  <div class="col-md-12">
    <a href="<?= base_url(); ?>anggota/tambah_anggota" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Anggota </a>
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
          <th>ID ANGGOTA</th>
          <th>NISN</th>
          <th>NAMA</th>
          <th>JENIS KELAMIN</th>
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
                <img width='70px' height='70px' src="<?= base_url('assets/foto/anggota/'.$row -> foto);?>" alt="<?= $row -> nama;?>">
              <?php } ?>
            </td>
            <td><?= $row -> id_anggota ;?></td>
            <td><?= $row -> nisn ;?></td>
            <td><?= $row -> nama ;?></td>
            <td><?= $row -> jenkel ;?></td>
            <td class="text-center">
              <a href="<?= base_url()?>anggota/detail/<?= $row -> id_anggota;?>" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a>
              <a href="<?= base_url()?>anggota/edit/<?= $row -> id_anggota;?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
              <a href="<?= base_url()?>anggota/hapus/<?= $row -> id_anggota;?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


