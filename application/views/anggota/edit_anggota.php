<div class="box box-default">
  <div class="box-header with-border">
     <h3 class="box-title"><?= $judul ;?></h3>
  </div>
  <div class="box-body">
      <div class="row" style="margin-bottom: 20px;">
        
        <div class="col-md-9">
          <?= form_open_multipart('anggota/update') ;?>
            <table class="table table-striped">
              <tr>
                <td>
                  <label for="id_anggota" class="control-label">Kode Angggota</label>
                </td>
                <td><input type="text" id="id_anggota" class="form-control" value="<?= $data['id_anggota'];?>" name="id_anggota" readonly></td>
              </tr>
              <tr>
                <td>
                  <label for="nisn" class="control-label">NISN</label>
                </td>
                <td><input type="text" id="nisn" class="form-control" value="<?= $data['nisn'];?>" name="nisn" required></td>
              </tr>
              <tr>
                <td>
                  <label for="nama" class="control-label">Nama Lengkap</label>
                </td>
                <td><input type="text" id="nama" name="nama" class="form-control" value="<?= $data['nama'];?>" required></td>
              </tr>
              <tr>
                <td>
                  <label for="jenkel" class="control-label">Jenis Kelamin</label>
                </td>
                <td>
                  <select name="jenkel" id="jenkel" class="form-control">
                    <?php if($data['jenkel'] == 'Laki-laki') {?>
                      <option value="Laki-laki" selected> Laki-laki </option>
                      <option value="Perempuan"> Perempuan </option>
                    <?php } else {?>
                      <option value="Laki-laki"> Laki-laki </option>
                      <option value="Perempuan" selected> Perempuan </option>
                    <?php }; ?>
                  </select>
                </td>
              </tr> 
              <tr>
                <td>
                  <label for="email" class="control-label">Email</label>
                </td>
                <td>
                  <input type="email" class="form-control" name="email" id="email" value="<?= $data['email'];?>" required>
                </td>
              </tr> 
              <tr>
                <td>
                  <label for="telepon" class="control-label">Telepon</label>
                </td>
                <td>
                  <input type="text" name="telepon" class="form-control" id="telepon" value="<?= $data['telepon'];?>" required>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="alamat" class="control-label">Alamat</label>
                </td>
                <td>
                  <textarea name="alamat" id="alamat" rows="5" class="form-control" required><?= $data['alamat']  ?></textarea>
                </td>
              </tr>
            </table>
            <div style="text-align: right;">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
          <?= form_close();?>
        </div>
        <div class="col-md-3">
          <img style="width: 100%;" src="<?= base_url('assets/foto/anggota/'. $data['foto']);?>" alt="">
          <?= form_open_multipart('anggota/ubah_foto');?>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputFile">Ubah Foto</label>

                <input type="text" name ="id_anggota" value="<?= $data['id_anggota'];?>" readonly style="display: none;">
                <input type="file" name="foto" id="exampleInputFile">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i>Upload Foto</button>
          <?= form_close();?>
        </div>
      </div>
  </div>
</div>
<a href="<?= base_url('anggota');?>" class="btn btn-success"><i class="fa fa-angle-double-left"></i> Kembali</a>