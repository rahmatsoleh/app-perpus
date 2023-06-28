<?php 
  if(!empty($this->session->flashdata('berhasil'))) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>SELAMAT !</strong> <?= $this -> session -> flashdata('berhasil');?>
    </div>
<?php endif ;?>
<div class="box box-default">
  <div class="box-header with-border">
     <h3 class="box-title"><?= $judul ;?></h3>
  </div>
  <div class="box-body">
      <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-3">
          <img style="width: 100%;" src="<?= base_url('assets/foto/petugas/'. $data -> foto);?>" alt="">
        </div>
        <div class="col-md-9">
          <table class="table table-striped">
            <tr>
              <td>Nomor Induk</td>
              <td>: <?= $data -> no_pegawai;?></td>
            </tr>
            <tr>
              <td>Nama Lengkap</td>
              <td>: <?= $data -> nama;?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>: <?= $data -> jenkel;?></td>
            </tr> 
            <tr>
              <td>Email</td>
              <td>: <?= $data -> email;?></td>
            </tr> 
            <tr>
              <td>Telepon</td>
              <td>: <?= $data -> telepon;?></td>
            </tr>
            <tr>
              <td>Level</td>
              <td>: <?= $data -> level;?></td>
            </tr>
            <tr>
              <td>Username</td>
              <td><input type="text" value="<?= $data -> username;?>" disabled class="form-control" style="display: inline;"></td>
            </tr>
            <tr>
              <td>Password</td>
              <td>
                <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" class="lihat">
                        </span>
                    <input type="password" class="form-control pwd" value="<?= $data -> password;?>" id="pass" disabled>
                </div>
              </td>
            </tr>  
          </table>
        </div>
      </div>
  </div>
</div>
<a href="<?= base_url('petugas/ubah_akun');?>" class="btn btn-primary"><i class="fa  fa-edit"></i> Ubah Data</a>

<script>
  const lihat = document.querySelector('.lihat');
  lihat.addEventListener('click', function(){
    const tampilkan = document.querySelector('.pwd');
    if(tampilkan.type === "password"){
      tampilkan.type ="text";
    } else {
      tampilkan.type = "password";
    }
  })
</script>