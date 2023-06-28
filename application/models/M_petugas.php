<?php 

	class M_petugas extends CI_Model {
		public function getDataById($id)
		{
			$this -> db -> where('id', $id);
			return $this -> db -> get('login');
		}

		public function hapus($id)
		{
			$this -> db -> where('id', $id);
			$this -> db -> delete('login');
		}

		public function update($id, $data)
		{
			$this -> db -> where('id', $id);
			$this -> db -> update('login', $data);
		}
	}

 ?>