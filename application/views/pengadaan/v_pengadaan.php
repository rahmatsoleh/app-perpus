<?php 
  if(!empty($this->session->flashdata('info'))) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Berhasil !</strong> <?= $this -> session -> flashdata('info');?>
    </div>
<?php endif ;?>
<div class="box box-default">
  <div class="box-header with-border">
     <h3 class="box-title"><?= $judul ;?></h3>
  </div>
  <div class="box-body">
      <div class="row" style="margin-bottom: 20px;">
       <div class="col-md-6">
         <form class="form-horizontal" action="pengadaan/update" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="pinjam" class="col-sm-4 control-label">Lama Peminjaman</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="number" class="form-control" id="pinjam" name="pinjam" value="<?= $data -> lama_peminjaman;?>" required>
                    <span class="input-group-addon">Hari</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="max" class="col-sm-4 control-label">Maksimal Pinjam</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="number" class="form-control" id="max" name="max" value="<?= $data -> max_pinjam;?>" required>
                    <span class="input-group-addon">Buku</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="denda" class="col-sm-4 control-label">Denda Keterlambatan</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" id="denda" name="denda" value="<?= $data -> denda;?>" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="prefixAnggota" class="col-sm-4 control-label">Prefix ID Anggota</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="prefixAnggota" name="prefixAnggota" value="<?= $data -> prefixAnggota;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="panjangAnggota" class="col-sm-4 control-label">Panjang ID Anggota</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="panjangAnggota" name="panjangAnggota" value="<?= $data -> lengthAnggota;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="prefixBuku" class="col-sm-4 control-label">Prefix ID Buku</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="prefixBuku" name="prefixBuku" value="<?= $data -> prefixBuku;?>" required>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-info pull-right simpan" onclick="return confirm('Apakah Anda Mengubah Data Pengadaan ?')" disabled><i class="fa fa-save"></i> Update</button>
          </form>
       </div>
      </div>
  </div>
</div>

<script>
  $('.form-control').on('change', function() {
    const tombol = document.querySelector('.simpan');
    tombol.disabled = false;
  })
</script>
