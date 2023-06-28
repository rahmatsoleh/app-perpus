<?php 

	class Pengembalian extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this -> load -> model('m_pengembalian');
			$this -> load -> helper('formatTanggal_helper');
		}

		public function index()
		{
			$isi['content']	= 'pengembalian/v_pengembalian';
			$isi['judul']	= 'Data Pengembalian Bukti';
			$isi['data']	= $this -> m_pengembalian -> get_data_pengembalian() -> result();
			$this -> load -> view('v_dashboard', $isi);
		}
	}

 ?>