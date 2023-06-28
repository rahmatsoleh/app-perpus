<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $judul;?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <!-- <form method="post" action="<?= base_url('buku/simpan');?>" class="form-horizontal"> -->
      <?= form_open_multipart('buku/simpan') ?>
      <div class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label for="id_buku" class="col-sm-2 control-label">Kode Buku</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="id_buku" id="id_buku" value="<?= $id_buku;?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="judul" class="col-sm-2 control-label">Judul Buku</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Buku" required>
            </div>
          </div>
          <div class="form-group">
            <label for="id_pengarang" class="col-sm-2 control-label">Pengarang</label>

            <div class="col-sm-5">
              <select name="id_pengarang" id="id_pengarang" class="form-control select2" required>
                <option value="">-- Pilih Nama Pengarang --</option>
                <?php foreach ($pengarang as $row) : ?>
                 <option value="<?= $row -> id_pengarang;?>"><?= $row -> nama_pengarang;?></option> 
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="id_penerbit" class="col-sm-2 control-label">Penerbit</label>

            <div class="col-sm-5">
              <select name="id_penerbit" id="id_penerbit" class="form-control select2" required>
                <option value="">-- Pilih Nama Penerbit --</option>
                <?php foreach ($penerbit as $row) : ?>
                 <option value="<?= $row -> id_penerbit;?>"><?= $row -> nama;?></option> 
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="tahun" class="col-sm-2 control-label">Tahun</label>

            <div class="col-sm-2">
              <select name="tahun" id="tahun" class="form-control" required>
                <option value=""> -- Pilih Tahun -- </option>
                <?php $tahun = date('Y'); for($i = $tahun; $i >= $tahun - 10; $i--){?>
                  <option value="<?= $i;?>"> <?= $i;?> </option>
                <?php } ;?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="sinopsis" class="col-sm-2 control-label">Sinopsis</label>
            <div class="col-sm-10">
              <textarea name="sinopsis" id="sinopsi" rows="3" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>

            <div class="col-sm-2">
              <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="0" required>
            </div>
          </div>
          <div class="form-group">
            <label for="foto" class="col-sm-2 control-label">Foto</label>

            <div class="col-sm-5">
              <input type="file" class="form-control" name="foto" id="foto" required>
            </div>
          </div>

          <div class="box-footer">
            <a href="<?= base_url('buku');?>" class="btn btn-warning"><i class="fa fa-angle-double-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
          </div>
        </div>
      <?= form_close();?>
      <!-- </form> -->
    </div>
  </div>
</div>