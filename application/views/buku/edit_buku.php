
<div class="box box-default">
  <div class="box-header with-border">
     <h3 class="box-title"><?= $judul ;?></h3>
  </div>
  <div class="box-body">
      <div class="row" style="margin-bottom: 20px;">
        
        <div class="col-md-9">
          <?= form_open_multipart('buku/update') ;?>
            <table class="table table-striped">
              <tr>
                <td>
                  <label for="id_buku" class="control-label">Kode Buku</label>
                </td>
                <td><input type="text" id="id_buku" class="form-control" value="<?= $data['id_buku'];?>" name="id_buku" readonly></td>
              </tr>
              <tr>
                <td>
                  <label for="judul" class="control-label">Judul Buku</label>
                </td>
                <td><input type="text" id="judul" class="form-control" value="<?= $data['judul'];?>" name="judul" required></td>
              </tr>
              <tr>
                <td>
                  <label for="id_pengarang" class="control-label">Nama Pengarang</label>
                </td>
                <td>
                  <select name="id_pengarang" id="id_pengarang" class="form-control select2" style="width: 100%;" required>
                    <?php foreach ($pengarang as $row) : ?>
                     <?php if($data['id_pengarang'] == $row -> id_pengarang) {?>
                        <option value="<?= $row -> id_pengarang;?>" selected><?= $row -> nama_pengarang;?></option>
                      <?php } else { ?>
                        <option value="<?= $row -> id_pengarang;?>"><?= $row -> nama_pengarang;?></option>
                    <?php }; endforeach;?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="id_penerbit" class="control-label">Nama Penerbit</label>
                </td>
                <td>
                  <select name="id_penerbit" id="id_penerbit" class="form-control select2" style="width: 100%;" required>
                    <?php foreach ($penerbit as $row) : ?>
                     <?php if($data['id_penerbit'] == $row -> id_penerbit) {?>
                        <option value="<?= $row -> id_penerbit;?>" selected><?= $row -> nama;?></option>
                      <?php } else { ?>
                        <option value="<?= $row -> id_penerbit;?>"><?= $row -> nama;?></option>
                    <?php }; endforeach;?>
                  </select>
                </td>
              </tr> 
              <tr>
                <td>
                  <label for="tahun" class="control-label">Tahun</label>
                </td>
                <td>
                  <select name="tahun" id="tahun" class="form-control" required>
                    <?php $tahun = date('Y'); for($i = $tahun; $i >= $tahun - 10; $i--){?>
                      <?php if($data['tahun'] == $i) {?>
                        <option value="<?= $i;?>" selected> <?= $i;?> </option>
                      <?php } else { ;?>
                        <option value="<?= $i;?>"> <?= $i;?> </option>
                    <?php } ;} ;?>
                  </select>
                </td>
              </tr> 
              <tr>
                <td>
                  <label for="sinopsis" class="control-label">Sinopsis</label>
                </td>
                <td>
                  <textarea name="sinopsis" id="sinopsis" name="sinopsis" class="form-control" rows="5"><?= $data['sinopsis'];?></textarea>
                </td>
              </tr>
              <tr>
                <td><label for="jumlah" class="control-label">Jumlah</label></td>
                <td>
                  <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?php 
                    // $this -> db -> select('id_buku');
                    // $this -> db -> from('peminjaman');
                    // $this -> db -> where('id_buku', $data['id_buku']);
                    $query = $this -> db -> get_where('peminjaman', array('id_buku' => $data['id_buku'], 'status' => 'dipinjam')) -> num_rows();

                    echo $query + $data['jumlah'];
                  ;?>" required>
                </td>
              </tr>
            </table>
            <div style="text-align: right;">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
          <?= form_close();?>
        </div>
        <div class="col-md-3">
          <img style="width: 100%;" src="<?= base_url('assets/foto/buku/'. $data['foto']);?>" alt="">
          <?= form_open_multipart('buku/ubah_foto');?>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputFile">Ubah Foto</label>

                <input type="text" name ="id_buku" value="<?= $data['id_buku'];?>" readonly style="display: none;">
                <input type="file" name="foto" id="exampleInputFile">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i>Simpan Foto</button>
          <?= form_close();?>
        </div>
      </div>
  </div>
</div>
<a href="<?= base_url('buku');?>" class="btn btn-success"><i class="fa fa-angle-double-left"></i> Kembali</a>