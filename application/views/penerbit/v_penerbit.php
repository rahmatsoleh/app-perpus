<?php 
  if(!empty($this->session->flashdata('info'))) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>SELAMAT !</strong> <?= $this -> session -> flashdata('info');?>
    </div>
  <?php endif ;?>

<div class="row">
  <div class="col-md-12">
    <a href="<?= base_url('penerbit/tambah_penerbit'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Penerbit </a>
  </div>
</div>
<br>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Tabel Data Penerbit</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>ID PENERBIT</th>
          <th>NAMA</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($data as $row) : ?>
          <tr>
            <td><?= $no++ ;?></td>
            <td><?= $row -> id_penerbit ;?></td>
            <td><?= $row -> nama ;?></td>
            <td>
              <a href="" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a>
              <a href="<?= base_url();?>penerbit/edit/<?= $row -> id_penerbit;?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
              <a href="<?= base_url();?>penerbit/hapus/<?= $row -> id_penerbit;?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>


