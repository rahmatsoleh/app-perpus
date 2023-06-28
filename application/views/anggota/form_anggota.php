<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $judul;?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <!-- anggota/simpan -->
      <!-- <form method="post" action="<?= base_url();?>anggota/simpan" class="form-horizontal"> -->
      <?= form_open_multipart('anggota/simpan') ;?>
      <div class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">ID Anggota</label>

            <div class="col-sm-5">
              <input type="text" class="form-control" name="id_anggota" value="<?= $id_anggota;?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="nisn" class="col-sm-2 control-label">NISN</label>

            <div class="col-sm-5">
              <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Nomor Induk Siswa Nasional" required>
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama Anggota</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required>
            </div>
          </div>
          <div class="form-group">
            <label for="jenkel" class="col-sm-2 control-label">Jenis Kelamin</label>

            <div class="col-sm-3">
              <select name="jenkel" id="jenkel" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki - laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-5">
              <input type="email" class="form-control" id="email" name="email" placeholder="@" required>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat" class="col-sm-2 control-label">Alamat</label>

            <div class="col-sm-10">
              <textarea name="alamat" id="alamat" rows="5" placeholder="Alamat . . ." class="form-control" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="telepon" class="col-sm-2 control-label">Telepon</label>

            <div class="col-sm-5">
              <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Nomor Telepon" required>
            </div>
          </div>
          <div class="form-group">
            <label for="foto" class="col-sm-2 control-label">Foto</label>

            <div class="col-sm-5">
              <input type="file" class="form-control" name="foto" id="foto" required>
            </div>
          </div>

          <div class="box-footer">
            <a href="<?= base_url();?>anggota" class="btn btn-warning"><i class="fa fa-angle-double-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
          </div>
        </div>
        <?= form_close(); ?>
      <!-- </form> -->
    </div>
  </div>
</div>