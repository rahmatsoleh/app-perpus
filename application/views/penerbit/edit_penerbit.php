<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $judul;?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="post" action="<?= base_url('penerbit/update');?>" class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">ID Penerbit</label>

            <div class="col-sm-5">
              <input type="text" class="form-control" name="id_penerbit" value="<?= $data['id_penerbit'];?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama Pengarang</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_penerbit" id="nama" value="<?= $data['nama'];?>" required>
            </div>
          </div>
          <div class="box-footer">
            <a href="<?= base_url('penerbit');?>" class="btn btn-warning"><i class="fa fa-angle-double-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
          </div>
      </form>
    </div>
  </div>
</div>