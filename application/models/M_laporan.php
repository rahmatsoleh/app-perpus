<?php 

	class M_laporan extends CI_Model {

		public function getAllData()
		{
			$this -> db -> select('*');
			$this -> db -> from('peminjaman');
			$this -> db -> join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
			$this -> db -> join('buku', 'buku.id_buku = peminjaman.id_buku');
			$this -> db -> where('peminjaman.status', 'dipinjam');
			return $this -> db -> get() -> result();
		}

		public function filterData($tglAwal, $tglAkhir)
		{
			$this -> db -> select('*');
			$this -> db -> from('peminjaman');
			$this -> db -> join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
			$this -> db -> join('buku', 'buku.id_buku = peminjaman.id_buku');
			$this -> db -> where('peminjaman.tgl_pinjam >=', $tglAwal);
			$this -> db -> where('peminjaman.tgl_pinjam <=', $tglAkhir);
			$this -> db -> where('peminjaman.status', 'dipinjam');
			return $this -> db -> get() -> result();
		}

		public function getBuku()
		{
			$this -> db -> select('*');
			$this -> db -> from('buku');
			$this -> db -> join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit');
			$this -> db -> join('pengarang', 'pengarang.id_pengarang = buku.id_pengarang');

			return $this -> db -> get() -> result();
		}

		public function getAllDataPengembalian()
		{
			$this -> db -> select('*');
			$this -> db -> from('pengembalian');
			$this -> db -> join('anggota', 'anggota.id_anggota = pengembalian.id_anggota');
			$this -> db -> join('buku', 'buku.id_buku = pengembalian.id_buku');
			return $this -> db -> get() -> result();
		}

		public function filterDataPengembalian($tglAwal, $tglAkhir)
		{
			$this -> db -> select('*');
			$this -> db -> from('pengembalian');
			$this -> db -> join('anggota', 'anggota.id_anggota = pengembalian.id_anggota');
			$this -> db -> join('buku', 'buku.id_buku = pengembalian.id_buku');
			$this -> db -> where('pengembalian.tgl_kembalikan >=', $tglAwal);
			$this -> db -> where('pengembalian.tgl_kembalikan <=', $tglAkhir);
			return $this -> db -> get() -> result();
		}
	}

 ?>