<?php 

	class Pengadaan extends CI_Controller {
		public function index()
		{
			$isi['content'] = 'pengadaan/v_pengadaan';
			$isi['judul']	= 'Pengadaan';
			$isi['data']	= $this -> db -> get('pengadaan') -> row();
			$this -> load -> view('v_dashboard', $isi);
		}

		public function update()
		{
			$data = array(
				'lama_peminjaman'	=> $this -> input -> post('pinjam'),
				'denda'				=> $this -> input -> post('denda'),
				'max_pinjam'		=> $this -> input -> post('max'),
				'prefixAnggota'		=> $this -> input -> post('prefixAnggota'),
				'lengthAnggota'		=> $this -> input -> post('panjangAnggota'),
				'prefixBuku'		=> $this -> input -> post('prefixBuku')
			);

			$this -> load -> model('m_pengadaan');
			$query = $this -> m_pengadaan -> update($data);

			if ($query = true){
				$this -> session -> set_flashdata('info', 'Data berhasil di Update');
				redirect('pengadaan');
			}
		}
	}


 ?>