<div class="box box-default">
  <div class="box-header with-border">
     <h3 class="box-title"><?= $judul ;?></h3>
  </div>
  <div class="box-body">
      <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-3">
          <img style="width: 100%;" src="<?= base_url('assets/foto/buku/'. $data['foto']);?>" alt="">
        </div>
        <div class="col-md-9">
          <table class="table table-striped">
            <tr>
              <td>Kode Buku</td>
              <td>: <?= $data['id_buku'];?></td>
            </tr>
            <tr>
              <td>Judul Buku</td>
              <td>: <?= $data['judul'];?></td>
            </tr>
            <tr>
              <td>Nama Pengarang</td>
              <td>: <?= $data['nama_pengarang'];?></td>
            </tr>
            <tr>
              <td>Penerbit</td>
              <td>: <?= $data['nama'];?></td>
            </tr> 
            <tr>
              <td>Tahun</td>
              <td>: <?= $data['tahun'];?></td>
            </tr> 
            <tr>
              <td>Sinopsis</td>
              <td>: <?= $data['sinopsis'];?></td>
            </tr>
            <tr>
              <td>Jumlah</td>
              <td>: <?= $data['jumlah'];?> /
                  <?php 
                    // $this -> db -> select('id_buku');
                    // $this -> db -> from('peminjaman');
                    // $this -> db -> where('id_buku', $data['id_buku']);
                    $query = $this -> db -> get_where('peminjaman', array('id_buku' => $data['id_buku'], 'status' => 'dipinjam')) -> num_rows();

                    echo $query + $data['jumlah'];
                  ;?>
              </td>
            </tr>  
          </table>
        </div>
      </div>
  </div>
</div>
<a href="<?= base_url('buku');?>" class="btn btn-success"><i class="fa  fa-angle-double-left"></i> Kembali</a>