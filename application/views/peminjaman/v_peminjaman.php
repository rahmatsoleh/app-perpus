<?php 
  if(!empty($this->session->flashdata('info'))) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>SELAMAT !</strong> <?= $this -> session -> flashdata('info');?>
    </div>
<?php endif ;?>

<?php
if(!empty($this->session->flashdata('gagal'))) : ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>MAAF !</strong> <?= $this -> session -> flashdata('gagal');?>
    </div>
<?php endif ;?>

<div class="row">
  <div class="col-md-12">
    <a href="<?= base_url('peminjaman/tambah_peminjam'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Peminjaman </a>
  </div>
</div>
<br>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Tabel Data Peminjaman</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>ID ANGGOTA</th>
          <th>PEMINJAM</th>
          <th>BUKU</th>
          <th>TANGGAL PINJAM</th>
          <th>TANGGAL KEMBALI</th>
          <th>STATUS</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($data as $row) : ?>
          <?php 
            $tgl_kembali = new DateTime($row -> tgl_kembali);
            $tgl_sekarang = new DateTime();
            $selisih = $tgl_sekarang -> diff($tgl_kembali) -> format("%a");
            $kurang = $tgl_kembali -> diff($tgl_sekarang) -> format("%a") +1;
            $tagihan = $selisih * $denda
          ?>
          <tr>
            <td><?= $no++ ;?></td>
            <td><?= $row -> id_anggota ;?></td>
            <td><?= $row -> nama ;?></td>
            <td><?= $row -> judul ;?></td>
            <td><?= mediumdate_indo($row -> tgl_pinjam);?></td>
            <td><?= mediumdate_indo($row -> tgl_kembali);?></td>
            <td class="text-center">
              <?php 
                if($tgl_kembali >= $tgl_sekarang OR $selisih == 0){
                  echo "Kurang <b style='color: red;'>".$kurang."</b> Hari Lagi"."<br><span class='label label-warning'>Belum di Kembalikan</span>";;
                } else {
                  echo "Terlambat <b style='color: red;'>".$selisih ."</b> Hari"."<br><span class='label label-danger'> Denda Rp. ". $tagihan ."</span>";
                };
               ?>
            </td>
            <td class="text-center">
              <form action="<?= base_url('peminjaman/kembalikan');?>" method="post">
                <input type="text" name="id_pm" value="<?= $row -> id_pm;?>" readonly style="display: none;">
              <?php if($tgl_kembali >= $tgl_sekarang OR $selisih == 0){ ?>
                <input type="number" name="denda" value="<?= 0 ;?>" readonly style="display: none;">
              <?php } else { ?>
                <input type="number" name="denda" value="<?= $tagihan ;?>" readonly style="display: none;">
              <?php }; ?>
                <button type="submit" class="btn btn-primary btn-xs kembalikan" onclick="return confirm('Yakin Buku ini Mau dikembalikan ?');">Kembalikan</button>
              </form>
            </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>




