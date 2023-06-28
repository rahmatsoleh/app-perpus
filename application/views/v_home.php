 <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $anggota;?></h3>

              <p>Total Anggota</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('anggota') ;?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $buku;?></h3>

              <p>Total Judul Buku</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?= base_url('buku');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $pinjam;?></h3>

              <p>Buku Sedang di Pinjam</p>
            </div>
            <div class="icon">
              <i class="fa fa-industry"></i>
            </div>
            <a href="<?= base_url('peminjaman');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><sup>Rp</sup><?= $kembali['denda'] ;?>,-</h3>

              <p>Denda Terkumpul</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="<?= base_url('pengembalian');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-8">
    <!-- PRODUCT LIST -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">History Transaksi Peminjaman</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="products-list product-list-in-box">
        <?php foreach($info as $row) : ?>
          <li class="item">
            <div class="product-img">
              <img src="<?= base_url('assets/foto/anggota/'.$row -> foto);?>" alt="Product Image" style="width: 50px; height: 50px;">
            </div>
            <div class="product-info">
              <a class="product-title"><?= $row -> nama;?>
                <span class="label label-primary pull-right"><?= $row -> tgl_pinjam;?></span></a>
              <span class="product-description"> Telah meminjam buku
                    <?= $row -> judul;?>
                  </span>
            </div>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center">
        <a href="<?= base_url('peminjaman');?>" class="uppercase">Lihat semua transaksi peminjaman</a>
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /.box -->
  </div>
  <div class="col-lg-4">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Buku Populer</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="products-list product-list-in-box">
        <?php foreach($populer as $row) : ?>
          <li class="item">
            <div class="product-img">
              <img src="<?= base_url('assets/foto/buku/'.$row -> gambar);?>" alt="Product Image" style="width: 50px; height: 50px;">
            </div>
            <div class="product-info">
              <a href="<?= base_url('/buku/detail/'.$row -> kode);?>" class="product-title"><?= $row -> judul;?>
                <span class="label label-primary pull-right"><?= $row -> jumlah;?></span></a>
              <span class="product-description">Tersisa
                    <?= $row -> sisa;?> Buku
                  </span>
            </div>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center">
        <a href="<?= base_url('buku');?>" class="uppercase">Lihat semua data buku</a>
      </div>
      <!-- /.box-footer -->
    </div>
  </div>
</div>