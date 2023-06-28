<?php 

class M_anggota extends CI_Model {

	public function prefixA()
	{
		$this -> db -> select('*');
		$this -> db -> where('id', 2);
		return $this -> db -> get('pengadaan');
	}

	public function id_anggota($prefix,$panjang)
	{
		$this -> db -> select("RIGHT(anggota.id_anggota,$panjang) as kode", FALSE);
		$this -> db -> order_by('id_anggota', 'DESC');
		$this -> db -> limit(1);

		$query = $this -> db -> get('anggota');
		if ($query -> num_rows() > 0){
			$data = $query -> row();
			$kode = intval($data -> kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode,$panjang,"0", STR_PAD_LEFT);
		$kodeJadi = $prefix.$kodemax;

		return $kodeJadi;
	}

	public function edit($id){
		$this -> db -> where('id_anggota', $id);
		return $this -> db -> get('anggota') -> row_array();
	}

	public function update($id_anggota, $data)
	{
		$this -> db -> where('id_anggota', $id_anggota);
		$this -> db -> update('anggota', $data);
	}

	public function hapus($id){
		$this -> db -> where('id_anggota', $id);
		$this -> db -> delete('anggota');
	}

	public function getDataById($id)
	{
		$this -> db -> where('id_anggota', $id);
		return $this -> db -> get('anggota');
	}



}

 ?>