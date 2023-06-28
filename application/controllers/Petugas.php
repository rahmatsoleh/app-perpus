<?php 

	class Petugas extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this -> load -> model('m_petugas');
		}


		public function index()
		{
			$isi['content'] = 'petugas/v_petugas';
			$isi['judul']	= 'Daftar Data Petugas';
			$isi['data']	= $this -> db -> get('login') -> result();
			$this -> load -> view('v_dashboard', $isi);
		}

		public function tambah_petugas()
		{
			$this->load->helper('form');
			$isi['content'] = 'petugas/form_petugas';
			$isi['judul']	= 'Form Tambah Petugas';
			$this -> load -> view('v_dashboard', $isi);
		}

		public function simpan()
		{
			// For Upload Files to Directory
			$foto = $_FILES['foto'];
			if($foto == ''){} else {
				$config['upload_path'] 		= './assets/foto/petugas';
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
				'no_pegawai'	=> $this -> input -> post('induk'),
				'nama'			=> $this -> input -> post('nama'),
				'jenkel'		=> $this -> input -> post('jenkel'),
				'email'			=> $this -> input -> post('email'),
				'telepon'		=> $this -> input -> post('telepon'),
				'username'		=> $this -> input -> post('username'),
				'password'		=> $this -> input -> post('password'),
				'level'			=> $this -> input -> post('level'),
				'foto'			=> $foto
			);

			$query = $this -> db -> insert('login', $data);
			if ($query = true){
				$this -> session -> set_flashdata('info', 'Data berhasil disimpan');
				redirect('petugas');
			}
		}


		public function hapus($id)
		{
			// For delete file from directrori
			$data 	= $this -> m_petugas -> getDataById($id) -> row();
			$nama 	= './assets/foto/petugas/'.$data -> foto;

			if(is_readable($nama) && unlink($nama)){

				// For delete database
				$query 	= $this -> m_petugas -> hapus($id);
				if ($query = true){
				$this -> session -> set_flashdata('info', 'Data berhasil di Hapus');
				redirect('petugas');
			}
			} else {
				echo "Gagal";
			}
		}

		public function detail($id)
		{
			$isi['content'] = 'petugas/detail_petugas';
			$isi['judul']	= 'Detail Petugas';
			$isi['data'] = $this -> m_petugas -> getDataById($id) -> row();
			$this -> load -> view('v_dashboard', $isi);
		}

		public function edit_akun()
		{
			$id 			= $this -> session -> userdata('id');
			$isi['content']	= 'petugas/detail_akun';
			$isi['judul']	= 'Pengaturan Akun Saya';
			$isi['data'] 	= $this -> m_petugas -> getDataById($id) -> row();
			$this -> load -> view('v_dashboard', $isi);
		}

		public function ubah_akun()
		{
			$id 			= $this -> session -> userdata('id');
			$isi['content']	= 'petugas/edit_akun';
			$isi['judul']	= 'Pengaturan Akun Saya';
			$isi['data'] = $this -> m_petugas -> getDataById($id) -> row();
			$this -> load -> view('v_dashboard', $isi);
		}

		public function update($id)
		{
			$password 	= $this -> input -> post('password');
			$conf 		= $this -> input -> post('conf');
			$id 		= $this -> session -> userdata('id');

			if($password != $conf){
				$this -> session -> set_flashdata('info', 'Data Tidak Berhasil di Update');
				redirect('petugas/ubah_akun');
			} else {
				$data = array(
					'no_pegawai' 		=> $this -> input -> post('induk'),
					'nama'		 		=> $this -> input -> post('nama'),
					'jenkel'			=> $this -> input -> post('jenkel'),
					'email'		 		=> $this -> input -> post('email'),
					'telepon' 			=> $this -> input -> post('telepon'),
					'username'	 		=> $this -> input -> post('username'),
					'password'			=> $conf
				);

				$query	= $this -> m_petugas -> update($id,$data);
				if($query = true){
					$this -> session -> set_flashdata('berhasil', 'Data Berhasil di Perbarui');
					redirect('petugas/edit_akun');
				}
					
			}
		}

		public function ubah_foto()
		{
			
			$foto = $_FILES['foto'];
			if($foto['name'] == null){
				redirect('petugas/ubah_akun');
			} else {
				// For delete file from directrori
				$id 	= $this -> session -> userdata('id');
				$data 	= $this -> m_petugas -> getDataById($id) -> row();
				$nama 	= './assets/foto/petugas/'.$data -> foto;

				if(is_readable($nama) && unlink($nama)){

					// For Upload Files to Directory
					
					if($foto == ''){} else {
						$config['upload_path'] 		= './assets/foto/petugas';
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
					$this -> m_petugas -> update($id,$gambar);
						
					redirect('petugas/ubah_akun');
				} else {
					redirect('petugas/ubah_akun');
				}
			}

			
		}

	}

 ?>