<?php 

	class Laporan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this -> load -> model('m_laporan');
			$this -> load -> helper('formatTanggal_helper');
			$this -> load -> library('pdf_report');
		}

		public function buku()
		{
			$isi['content'] = 'laporan/l_buku';
			$isi['judul']	= 'Laporan Data Buku';
			$isi['data']	= $this -> m_laporan -> getBuku();
			// var_dump($isi['data']);
			$this -> load -> view('v_dashboard', $isi);
		}

		public function peminjaman()
		{
			$tglAwal 			= $this -> input -> post('tgl_awal');
			$tglAkhir 			= $this -> input -> post('tgl_akhir');

			$this -> session -> set_userdata('tanggal_awal', $tglAwal);
			$this -> session -> set_userdata('tanggal_akhir', $tglAkhir);

			if(empty($tglAwal) || empty($tglAkhir)) {
				$isi['content']		= 'laporan/v_peminjaman';
				$isi['judul']		= 'Laporan Data Peminjaman';
				$isi['data']		= $this -> m_laporan -> getAllData();
			} else {
				$isi['content']		= 'laporan/v_peminjaman';
				$isi['judul']		= 'Laporan Data Peminjaman';
				$isi['data']		= $this -> m_laporan -> filterData($tglAwal, $tglAkhir);
			}
			$this -> load -> view('v_dashboard', $isi);
		}

		public function pdf_peminjaman()
		{
			if(empty($this -> session -> userdata('tanggal_awal')) || empty($this -> session -> userdata('tanggal_akhir'))){
				$isi['data']	= $this -> m_laporan -> getAlldata();
				$this -> load -> view('laporan/pdf_peminjaman', $isi);
			} else {
				$isi['data']	= $this -> m_laporan -> filterData($this -> session -> userdata('tanggal_awal'), $this -> session -> userdata('tanggal_akhir'));
				$this -> load -> view('laporan/pdf_peminjaman', $isi);
			}
		}

		public function pdf_buku()
		{
			$isi['data'] = $this -> m_laporan -> getBuku();
			$this -> load -> view('laporan/pdf_buku', $isi);
		}


		public function anggota()
		{
			$isi['content'] = 'laporan/l_anggota';
			$isi['judul']	= 'Laporan Data Anggota';
			$isi['data']	= $this -> db -> get('anggota') -> result();
			// var_dump($isi['data']);
			$this -> load -> view('v_dashboard', $isi);
		}

		public function pdf_anggota()
		{
			$isi['data']	= $this -> db -> get('anggota') -> result();
			$this -> load -> view('laporan/pdf_anggota', $isi);
		}

		public function pengembalian()
		{
			$tglAwal 			= $this -> input -> post('tgl_awal');
			$tglAkhir 			= $this -> input -> post('tgl_akhir');

			$this -> session -> set_userdata('tanggal_awal', $tglAwal);
			$this -> session -> set_userdata('tanggal_akhir', $tglAkhir);

			if(empty($tglAwal) || empty($tglAkhir)) {
				$isi['content']		= 'laporan/v_pengembalian';
				$isi['judul']		= 'Laporan Data Pengembalian';
				$isi['data']		= $this -> m_laporan -> getAllDataPengembalian();
			} else {
				$isi['content']		= 'laporan/v_pengembalian';
				$isi['judul']		= 'Laporan Data Pengembalian';
				$isi['data']		= $this -> m_laporan -> filterDataPengembalian($tglAwal, $tglAkhir);
			}
			$this -> load -> view('v_dashboard', $isi);
		}

		public function pdf_pengembalian()
		{
			if(empty($this -> session -> userdata('tanggal_awal')) || empty($this -> session -> userdata('tanggal_akhir'))){
				$isi['data']	= $this -> m_laporan -> getAllDataPengembalian();
				$this -> load -> view('laporan/pdf_pengembalian', $isi);
			} else {
				$isi['data']	= $this -> m_laporan -> filterDataPengembalian($this -> session -> userdata('tanggal_awal'), $this -> session -> userdata('tanggal_akhir'));
				$this -> load -> view('laporan/pdf_pengembalian', $isi);
			}
		}

	}

 ?>