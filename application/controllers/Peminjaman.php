<?php 

	class Peminjaman extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this -> load -> model('m_peminjaman');
			$this -> load -> model('m_anggota');
			$this -> load -> helper('formatTanggal_helper');
		}

		public function index()
		{
			$isi['content'] = 'peminjaman/v_peminjaman';
			$isi['judul']	= 'Data Transaksi Peminjaman';
			$isi['data']	= $this -> m_peminjaman -> get_data_peminjaman() -> result();
			$isi['denda']	= $this -> m_anggota -> prefixA() -> row() -> denda;
			$this -> load -> view('v_dashboard', $isi);
		}

		public function tambah_peminjam()
		{

			$isi['content'] 		= 'peminjaman/form_pinjam';
			$isi['judul']			= 'Form Tambah Peminjaman';
			$isi['id_peminjaman']	= $this -> m_peminjaman -> id_peminjaman();
			$isi['anggota']			= $this -> db -> get('anggota') -> result();
			$isi['buku']			= $this -> db -> get('buku') -> result();
			$isi['lama']	= $this -> m_anggota -> prefixA() -> row() -> lama_peminjaman;
			$this -> load -> view('v_dashboard', $isi);
		}

		public function jumlah_buku()
		{
			$id = $this -> input -> post('id');
			$data = $this -> m_peminjaman -> jumlah_buku($id);
			echo json_encode($data);
		}

		public function simpan()
		{
			$id_anggota = $this -> input -> post('id_anggota');

			// Cek jumlah orang yang sudah meminjam
			// $this -> db -> select('id_anggota');
   //          $this -> db -> from('peminjaman');
   //          $this -> db -> where('id_anggota', $id_anggota);
            // $hasil  = $this -> db -> get() -> num_rows();
             $hasil = $this -> db -> get_where('peminjaman', array('id_anggota' => $id_anggota, 'status' => 'dipinjam')) -> num_rows();

            // Cek Besarnya jumlah peminjaman
            $max = $this -> m_anggota -> prefixA() -> row() -> max_pinjam;

            // echo "Maksimal pinjam = $max dan pinjam = $hasil";
            if($hasil < $max){
            	// jika peminjam belum sampai batas maksimal
            	$data = array(
					'id_pm'			=> $this -> input -> post('id_pm'),
					'id_anggota'	=> $id_anggota,
					'id_buku'		=> $this -> input -> post('id_buku'),
					'tgl_pinjam'	=> $this -> input -> post('tgl_pinjam'),
					'tgl_kembali'	=> $this -> input -> post('tgl_kembali'),
					'status'		=> 'dipinjam'
				);
				$query = $this -> db -> insert('peminjaman', $data);
				if ($query = true){
					$this -> session -> set_flashdata('info', 'Data berhasil disimpan');
					redirect('peminjaman');
				}
            } else {
            	// jika peminjam melebihi batas maksimal pinjam
            	$this -> session -> set_flashdata('gagal', "ID Anggota $id_anggota melebihi batas maksimal");
				redirect('peminjaman');
            }

		}

		public function kembalikan()
		{
			$id 		= $this -> input -> post('id_pm');
			$data 		= $this -> m_peminjaman -> getDataById_pm($id);
			$denda		= $this -> input -> post('denda');

			$kembalikan	= array (
				'id_buku'			=> $data['id_buku'],
				'id_pm'				=> $data['id_pm'],
				'id_anggota'		=> $data['id_anggota'],
				'tgl_pinjam'		=> $data['tgl_pinjam'],
				'tgl_kembali'		=> $data['tgl_kembali'],
				'tgl_kembalikan'	=> date('Y-m-d'),
				'denda'				=> $denda
			);

			$query		= $this -> db -> insert('pengembalian', $kembalikan);
			if ($query = true){
				$delete = $this -> m_peminjaman -> deletePeminjaman($id);
				if($delete = true){
					$this -> session -> set_flashdata('info', 'Buku Berhasil di Kembalikan');
					redirect('peminjaman');
				}
			}
		}

	}


 ?>