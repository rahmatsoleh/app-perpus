<?php 

	class M_peminjaman extends CI_Model{

		public function id_peminjaman()
		{
			$this -> db -> select('RIGHT(peminjaman.id_pm,3) as kode', FALSE);
			$this -> db -> order_by('id_pm', 'DESC');
			$this -> db -> limit(1);

			$query = $this -> db -> get('peminjaman');
			if ($query -> num_rows() > 0){
				$data = $query -> row();
				$kode = intval($data -> kode) + 1;
			} else {
				$kode = 1;
			}

			$kodemax = str_pad($kode,4,"0", STR_PAD_LEFT);
			$kodeJadi = "PM".$kodemax;

			return $kodeJadi;
		}

		public function jumlah_buku($id)
		{
			$this -> db -> select('jumlah');
			$this -> db -> from('buku');
			$this -> db -> where('id_buku', $id);
			return $this -> db -> get() -> row_array();
		}

		public function jumlah_anggota($id)
		{
			$this -> db -> select('*');
			$this -> db -> from('peminjaman');
			$this -> db -> where('id_anggota', $id);
			return $this -> db -> get() -> row_array();
		}

		public function get_data_peminjaman()
		{
			$this -> db -> select('*');
			$this -> db -> from('peminjaman');
			$this -> db -> join('buku', 'buku.id_buku = peminjaman.id_buku');
			$this -> db -> join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
			$this -> db -> where('peminjaman.status', 'dipinjam');
			$this -> db -> order_by('peminjaman.tgl_pinjam', 'DESC');
			return $this -> db -> get();
		}

		public function getDataById_pm($id)
		{
			$this -> db -> select('*');
			$this -> db -> from('peminjaman');
			$this -> db -> join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
			$this -> db -> join('buku', 'buku.id_buku = peminjaman.id_buku');
			$this -> db -> where('peminjaman.id_pm', $id);
			return $this -> db -> get() -> row_array();
		}

		public function deletePeminjaman($id)
		{
			$data = array('status' => 'dikembalikan');
			$this -> db -> where('id_pm', $id);
			$this -> db -> update('peminjaman', $data);
		}
	}


 ?>