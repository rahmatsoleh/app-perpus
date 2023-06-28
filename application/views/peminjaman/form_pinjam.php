<?php 

 $tgl_pinjam = date('Y-m-d'); 
 $tujuh_hari = mktime(0,0,0,date("n"), date("j") + $lama, date("Y"));
 $tgl_kembali = date('Y-m-d', $tujuh_hari);
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $judul;?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="post" action="<?= base_url('peminjaman/simpan');?>" class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
            <label for="id_pm" class="col-sm-2 control-label">Kode Peminjaman</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="id_pm" id="id_pm" value="<?= $id_peminjaman;?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="id_anggota" class="col-sm-2 control-label">Nama Peminjam</label>

            <div class="col-sm-5">
              <select name="id_anggota" id="id_anggota" class="form-control select2" required>
                <option value="">-- Pilih Nama Peminjam --</option>
                <?php foreach ($anggota as $row) : ?>
                 <option value="<?= $row -> id_anggota;?>">
                   <table>
                     <tr>
                       <td><?= $row -> id_anggota ;?></td>
                       <td> | <?= $row -> nama ;?></td>
                     </tr>
                   </table>
                 </option> 
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="id_buku" class="col-sm-2 control-label">Judul Buku</label>

            <div class="col-sm-5">
              <select name="id_buku" id="id_buku" class="form-control select2" required>
                <option value="">-- Pilih Judul Buku --</option>
                <?php foreach ($buku as $row) : ?>
                 <option value="<?= $row -> id_buku;?>">
                   <table>
                     <tr>
                       <td><?= $row -> id_buku ;?></td>
                       <td> | <?= $row -> judul ;?></td>
                     </tr>
                   </table>
                 </option> 
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="tgl_pinjam" class="col-sm-2 control-label">Tanggal Peminjaman</label>

            <div class="col-sm-2">
              <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $tgl_pinjam;?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="tgl_kembali" class="col-sm-2 control-label">Tanggal Pengembalian</label>

            <div class="col-sm-2">
              <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $tgl_kembali ;?>" readonly>
            </div>
          </div>
          
          <div class="box-footer">
            <a href="<?= base_url('peminjaman');?>" class="btn btn-warning"><i class="fa fa-angle-double-left"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>

  $('#id_buku').change(function(){
    let id = $(this).val();
    $.ajax({
      url : '<?= base_url('peminjaman/jumlah_buku');?>',
      data : {id:id},
      method : 'post',
      dataType : 'json',
      success :function(hasil){
        let jumlah = JSON.stringify(hasil.jumlah);
        let jumlah1 = jumlah.split('"').join('');
        if(jumlah1 <= 0){
          alert('Maaf, Stok untuk buku ini sedang kosong');
          location.reload();
        }
      }
    })
  })

</script>