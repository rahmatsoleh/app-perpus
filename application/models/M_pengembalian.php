<?php 

	class M_pengembalian extends CI_Model {

		public function get_data_pengembalian()
		{
			$this -> db -> select('*');
			$this -> db -> from('pengembalian');
			$this -> db -> join('anggota', 'anggota.id_anggota = pengembalian.id_anggota');
			$this -> db -> join('buku', 'buku.id_buku = pengembalian.id_buku');
			return $this -> db -> get();
		}
	}

 ?>