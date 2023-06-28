<?php 

	class M_buku extends CI_Model{
		
		public function id_buku($prefix)
		{
			$this -> db -> select('RIGHT(buku.id_buku,5) as kode', FALSE);
			$this -> db -> order_by('id_buku', 'DESC');
			$this -> db -> limit(1);

			$query = $this -> db -> get('buku');
			if ($query -> num_rows() > 0){
				$data = $query -> row();
				$kode = intval($data -> kode) + 1;
			} else {
				$kode = 1;
			}

			$kodemax = str_pad($kode,5,"0", STR_PAD_LEFT);
			$kodeJadi = $prefix.$kodemax;

			return $kodeJadi;
		}

		public function get_data_buku()
		{
			$this -> db -> select('*');
			$this -> db -> from('buku');
			$this -> db -> join('pengarang', 'pengarang.id_pengarang = buku.id_pengarang');
			$this -> db -> join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit');
			return $this -> db -> get();
		}

		public function edit($id)
		{
			$this -> db -> select('*');
			$this -> db -> from('buku');
			$this -> db -> join('pengarang', 'pengarang.id_pengarang = buku.id_pengarang');
			$this -> db -> join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit');
			$this -> db -> where('buku.id_buku', $id);
			return $this -> db -> get() -> row_array();
		}

		public function update($id, $data)
		{
			$this -> db -> where('id_buku', $id);
			$this -> db -> update('buku', $data);
		}

		public function hapus($id)
		{
			$this -> db -> where('id_buku', $id);
			$this -> db -> delete('buku');
		}


	}

 ?>