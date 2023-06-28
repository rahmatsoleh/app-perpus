<?php 
  if(!empty($this->session->flashdata('info'))) : ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Maaf !</strong> <?= $this -> session -> flashdata('info');?>. <small> <i>mohon periksa kembali password anda</i></small>
    </div>
<?php endif ;?>

<div class="box box-default">
  <div class="box-header with-border">
     <h3 class="box-title"><?= $judul ;?></h3>
  </div>
  <div class="box-body">
      <div class="row" style="margin-bottom: 20px;">
        
        <div class="col-md-9">
          <?= form_open_multipart('petugas/update/'.$data -> id) ;?>
            <table class="table table-striped">
              <tr>
                <td>
                  <label for="induk" class="control-label">Nomor Induk</label>
                </td>
                <td><input type="text" id="induk" class="form-control" value="<?= $data -> no_pegawai;?>" name="induk" required></td>
              </tr>
              <tr>
                <td>
                  <label for="nama" class="control-label">Nama Lengkap</label>
                </td>
                <td><input type="text" id="nama" name="nama" class="form-control" value="<?= $data -> nama;?>" required></td>
              </tr>
              <tr>
                <td>
                  <label for="jenkel" class="control-label">Jenis Kelamin</label>
                </td>
                <td>
                  <select name="jenkel" id="jenkel" class="form-control">
                    <?php if($data -> jenkel == 'Laki-laki') {?>
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
                  <input type="email" class="form-control" name="email" id="email" value="<?= $data -> email;?>" required>
                </td>
              </tr> 
              <tr>
                <td>
                  <label for="telepon" class="control-label">Telepon</label>
                </td>
                <td>
                  <input type="text" name="telepon" class="form-control" id="telepon" value="<?= $data -> telepon;?>" required>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="level" class="control-label">Level</label>
                </td>
                <td>
                  <input type="text" class="form-control" value="<?= $data -> level;?>" disabled>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="username" class="control-label">Username</label>
                </td>
                <td>
                  <input type="text" value="<?= $data -> username;?>" class="form-control" name="username" id="username" required>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="password" class="control-label">Password</label>
                </td>
                <td>
                  <input type="password" name="password" id="password" value="<?= $data -> password;?>" class="form-control" required>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="conf" class="control-label">Konfirmasi Password</label>
                </td>
                <td>
                  <div class="form-group has-error" id="info">
                      <input type="password" class="form-control" name="conf" id="conf" placeholder="Konfirmasi Password">
                      <span class="help-block"><i>Mohon Isi Konfirmasi Password Jika Ada Perubahan Data</i></span>
                  </div>
                </td>
              </tr> 
            </table>
            <div style="text-align: right;">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
          <?= form_close();?>
        </div>
        <div class="col-md-3">
          <img style="width: 100%;" src="<?= base_url('assets/foto/petugas/'. $data -> foto);?>" alt="">
          <?= form_open_multipart('petugas/ubah_foto');?>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputFile">Ubah Foto</label>
                <input type="file" name="foto" id="exampleInputFile">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i>Upload Foto</button>
          <?= form_close();?>
        </div>
      </div>
  </div>
</div>
<a href="<?= base_url('petugas/edit_akun');?>" class="btn btn-success"><i class="fa fa-angle-double-left"></i> Kembali</a>

<script>
  const password  = document.querySelector('#password');
  const conf      = document.querySelector('#conf');

  conf.addEventListener('input', function(){
    const info = document.querySelector('#info');
    const helpBlock = document.querySelector('.help-block');

    if(conf.value == password.value){
      info.classList.remove('has-error');
      info.classList.add('has-success');
      helpBlock.innerHTML = '<i class="fa fa-check"></i>';
    } else {
      info.classList.remove('has-success');
      info.classList.add('has-error');
      helpBlock.innerHTML = 'Password Tidak Sama';
    }


  })
</script>