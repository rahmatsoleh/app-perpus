<?php 

	class M_dashboard extends CI_Model {

		public function countAnggota()
		{
			return $this -> db -> count_all('anggota');
		}

		public function countBuku()
		{
			return $this -> db -> count_all('buku');
		}

		public function countPinjam()
		{
			$this -> db -> select('*');
			$this -> db -> from('peminjaman');
			$this -> db -> where('status', 'dipinjam');
			return $this -> db -> get() -> num_rows();
		}

		public function countKembali()
		{
			$this -> db -> select('sum(denda) as denda');
			$this -> db -> from('pengembalian');
			return $this -> db -> get() -> row_array();
		}

		public function infoPinjam()
		{
			$this -> db -> select('*');
			$this -> db -> from('peminjaman');
			$this -> db -> join('buku', 'peminjaman.id_buku = buku.id_buku');
			$this -> db -> join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
			$this -> db -> where('status', 'dipinjam');
			$this -> db -> limit(10);
			$this -> db -> order_by('tgl_pinjam', 'DESC');
			return $this -> db -> get() -> result();
		}

		public function populer(){
			$this -> db -> select('peminjaman.id_buku as kode, buku.judul as judul, buku.foto as gambar, buku.jumlah as sisa, count(peminjaman.id_buku) as jumlah');
			$this -> db -> from('peminjaman');
			$this -> db -> join('buku', 'buku.id_buku = peminjaman.id_buku');
			$this -> db -> where('peminjaman.status','dipinjam');
			$this -> db -> group_by('kode');
			$this -> db -> order_by('jumlah', 'DESC');
			$this -> db -> limit(10);

			return $this -> db -> get() -> result();
		}


	}

?>