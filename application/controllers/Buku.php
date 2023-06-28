<?php 

	class Buku extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this -> load -> model('m_buku');
			$this -> load -> model('m_anggota');
		}

		public function index()
		{
			$isi['content'] = 'buku/v_buku';
			$isi['judul']	= 'Daftar Data Buku';
			$isi['data']	= $this -> m_buku -> get_data_buku() -> result();
			$this -> load -> view('v_dashboard', $isi);
		}

		public function tambah_buku()
		{
			$isi['content']		= 'buku/form_buku';
			$isi['judul']		= 'Form Tambah Buku';
			$prefixBuku			= $this -> m_anggota -> prefixA() -> row();
			$prefix 			= $prefixBuku -> prefixBuku;
			$isi['id_buku']		= $this -> m_buku -> id_buku($prefix);
			$isi['pengarang'] 	= $this -> db -> get('pengarang') -> result();
			$isi['penerbit'] 	= $this -> db -> get('penerbit') -> result();

			$this -> load -> view('v_dashboard', $isi);
		}

		public function simpan()
		{
			// For Upload Files to Directory
			$foto = $_FILES['foto'];
			if($foto == ''){} else {
				$config['upload_path'] 		= './assets/foto/buku';
				$config['allowed_types']	= 'jpg|jpeg|png';

				$this -> load -> library('upload', $config);
				if(!$this -> upload -> do_upload('foto')){
					echo "Upload Gagal"; die();
				} else {
					$foto = $this -> upload -> data('file_name');
				}
			}

			// For Uploade to database
			$data = array(
				'id_buku'		=> $this -> input -> post('id_buku'),
				'judul'			=> $this -> input -> post('judul'),
				'id_pengarang'	=> $this -> input -> post('id_pengarang'),
				'id_penerbit'	=> $this -> input -> post('id_penerbit'),
				'tahun'			=> $this -> input -> post('tahun'),
				'jumlah'		=> $this -> input -> post('jumlah'),
				'sinopsis'		=> $this -> input -> post('sinopsis'),
				'foto'			=> $foto
			);

			$query = $this -> db -> insert('buku', $data);
			if ($query = true){
				$this -> session -> set_flashdata('info', 'Data berhasil disimpan');
				redirect('buku');
			}
		}

		public function edit($id){
			$isi['content']		= 'buku/edit_buku';
			$isi['judul']		= 'Form Edit Buku';
			$isi['id_buku']		= $this -> m_buku -> id_buku($id);
			$isi['pengarang'] 	= $this -> db -> get('pengarang') -> result();
			$isi['penerbit'] 	= $this -> db -> get('penerbit') -> result();
			$isi['data']		= $this -> m_buku -> edit($id);
			$this -> load -> view('v_dashboard', $isi);
		}

		public function update()
		{
			$id_buku = $this -> input -> post('id_buku');
			$jumlahKotor = $this -> input -> post('jumlah');

			// Menghitung stok buku
            // $this -> db -> select('id_buku');
            // $this -> db -> from('peminjaman');
            // $this -> db -> where('id_buku', $id_buku);
            $hasil = $this -> db -> get_where('peminjaman', array('id_buku' => $id_buku, 'status' => 'dipinjam')) -> num_rows();

            $jumlah = $jumlahKotor - $hasil;


			$data = array(
			'judul'			=> $this -> input -> post('judul'),
			'id_pengarang'	=> $this -> input -> post('id_pengarang'),
			'id_penerbit'	=> $this -> input -> post('id_penerbit'),
			'tahun'			=> $this -> input -> post('tahun'),
			'jumlah'		=> $jumlah,
			'sinopsis'		=> $this -> input -> post('sinopsis')
			);

			$query = $this -> m_buku -> update($id_buku, $data);
			if ($query = true){
				$this -> session -> set_flashdata('info', 'Data berhasil di Update');
				redirect('buku');
			}

		}

		public function hapus($id)
		{
			// For delete file from directrori
			$data 	= $this -> m_buku -> edit($id);
			$nama 	= './assets/foto/buku/'.$data['foto'];

			if(is_readable($nama) && unlink($nama)){

				// For delete database
				$query = $this -> m_buku -> hapus($id);
				if($query = true){
					$this -> session -> set_flashdata('info', 'Data Berhasil di Hapus');
					redirect('buku');
				}

			} else {
				echo "Gagal";
			}
		
		}

		public function ubah_foto()
		{
			$id 	= $this -> input -> post('id_buku');
			$foto = $_FILES['foto'];
			if($foto['name'] == null){
				
				redirect("buku/edit/$id");
			} else {
				// For delete file from directrori
				$data 	= $this -> m_buku -> edit($id);
				$nama 	= './assets/foto/buku/'.$data['foto'];

				if(is_readable($nama) && unlink($nama)){

					// For Upload Files to Directory
					
					if($foto == ''){} else {
						$config['upload_path'] 		= './assets/foto/buku';
						$config['allowed_types']	= 'jpg|jpeg|png';

						$this -> load -> library('upload', $config);
						if(!$this -> upload -> do_upload('foto')){
							echo "Upload Gagal"; die();
						} else {
							$foto = $this -> upload -> data('file_name');
						}
					}

					// For Uploade to database
					
					$gambar = array('foto' => $foto);
					$this -> m_buku -> update($id,$gambar);
						
					redirect("buku/edit/$id");
				} else {
					echo error_log(message);
				}
			}

			
		}


		public function detail($id)
		{
			$isi['content'] = 'buku/detail_buku';
			$isi['judul']	= 'Detail Buku';
			$isi['data'] = $this -> m_buku -> edit($id);
			$this -> load -> view('v_dashboard', $isi);
		}

	}


 ?>