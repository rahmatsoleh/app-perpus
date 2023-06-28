<?php 

	class M_pengadaan extends CI_Model {
		public function update($data)
		{
			$this -> db -> where('id', 2);
			$this -> db -> update('pengadaan', $data);
		}
	}


 ?>