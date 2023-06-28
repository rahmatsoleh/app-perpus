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
      <?= form_open_multipart('petugas/simpan') ;?>
      <div class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label for="induk" class="col-sm-2 control-label">Nomor Induk</label>

            <div class="col-sm-5">
              <input type="text" class="form-control" name="induk" required>
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama Petugas</label>

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

            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" id="email" placeholder="@" required>
            </div>
          </div>
          <div class="form-group">
            <label for="telepon" class="col-sm-2 control-label">Telepon</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="telepon" id="telepon" required>
            </div>
          </div>
          <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="password" id="password" required>
            </div>
          </div>
          <div class="form-group">
            <label for="level" class="col-sm-2 control-label">Hak Akses</label>

            <div class="col-sm-3">
              <select name="level" id="level" class="form-control" required>
                <option value="">-- Pilih Jenis Hak Akses --</option>
                <option value="administrator">Administrator</option>
                <option value="user">User</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="foto" class="col-sm-2 control-label">Foto</label>

            <div class="col-sm-5">
              <input type="file" class="form-control" name="foto" id="foto" required>
            </div>
          </div>

          <div class="box-footer">
            <a href="<?= base_url();?>petugas" class="btn btn-warning"><i class="fa fa-angle-double-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
          </div>
        </div>
        <?= form_close(); ?>
      <!-- </form> -->
    </div>
  </div>
</div>