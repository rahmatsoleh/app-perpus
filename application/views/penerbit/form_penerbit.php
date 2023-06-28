<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $judul;?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="post" action="<?= base_url('penerbit/simpan');?>" class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label for="nama_pengarang" class="col-sm-2 control-label">Nama Penerbit</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_penerbit" id="nama_pengarang" placeholder="Nama Penerbit" required>
            </div>
          </div>
          <div class="box-footer">
            <a href="<?= base_url('penerbit');?>" class="btn btn-warning"><i class="fa fa-angle-double-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>