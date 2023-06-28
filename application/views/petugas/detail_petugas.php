<div class="box box-default">
  <div class="box-header with-border">
     <h3 class="box-title"><?= $judul ;?></h3>
  </div>
  <div class="box-body">
      <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-3">
          <img style="width: 100%;" src="<?= base_url('assets/foto/petugas/'. $data -> foto);?>" alt="">
        </div>
        <div class="col-md-9">
          <table class="table table-striped">
            <tr>
              <td>Nomor Induk</td>
              <td>: <?= $data -> no_pegawai;?></td>
            </tr>
            <tr>
              <td>Nama Lengkap</td>
              <td>: <?= $data -> nama;?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>: <?= $data -> jenkel;?></td>
            </tr> 
            <tr>
              <td>Email</td>
              <td>: <?= $data -> email;?></td>
            </tr> 
            <tr>
              <td>Telepon</td>
              <td>: <?= $data -> telepon;?></td>
            </tr>
            <tr>
              <td>Level</td>
              <td>: <?= $data -> level;?></td>
            </tr>  
          </table>
        </div>
      </div>
  </div>
</div>
<a href="<?= base_url('petugas');?>" class="btn btn-success"><i class="fa  fa-angle-double-left"></i> Kembali</a>