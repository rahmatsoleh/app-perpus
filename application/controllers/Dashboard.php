<?php 

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this -> load -> model('m_squrity');
		$this -> load -> model('m_dashboard');
	}

	public function index(){
		$this -> m_squrity -> getSqurity();
		$isi['content'] 	= 'v_home';
		$isi['judul']		= 'Dashboard';
		$isi['anggota']		= $this -> m_dashboard -> countAnggota();
		$isi['buku']		= $this -> m_dashboard -> countBuku();
		$isi['pinjam']		= $this -> m_dashboard -> countPinjam();
		$isi['kembali']		= $this -> m_dashboard -> countKembali();
		$isi['info']		= $this -> m_dashboard -> infoPinjam();
		$isi['populer']		= $this -> m_dashboard -> populer();
		// var_dump($isi['populer']);
		$this -> load -> view('v_dashboard', $isi);
	}
}

 ?>