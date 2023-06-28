<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $judul;?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="post" action="<?= base_url();?>pengarang/simpan" class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label for="nama_pengarang" class="col-sm-2 control-label">Nama Pengarang</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_pengarang" id="nama_pengarang" placeholder="Nama Pengarang" required>
            </div>
          </div>
          <div class="box-footer">
            <a href="<?= base_url();?>pengarang" class="btn btn-warning"><i class="fa fa-angle-double-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>