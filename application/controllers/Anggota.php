<?php 

class Anggota extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this -> load -> model('m_anggota');
	}

	public function index()
	{
		$isi['content'] = 'anggota/v_anggota';
		$isi['judul']	= 'Daftar Data Anggota';
		$isi['data']	= $this -> db -> get('anggota') -> result();
		$this -> load -> view('v_dashboard', $isi);
	}

	public function tambah_anggota()
	{
		$this->load->helper('form');
		$isi['content'] = 'anggota/form_anggota';
		$isi['judul']	= 'Form Tambah Anggota';
		$prefixA		= $this -> m_anggota -> prefixA() -> row();
		$prefix 		= $prefixA -> prefixAnggota;
		$panjangId		= $prefixA -> lengthAnggota;
		$isi['id_anggota'] = $this -> m_anggota -> id_anggota($prefix, $panjangId);
		$this -> load -> view('v_dashboard', $isi);
	}

	public function simpan()
	{
		// For Upload Files to Directory
		$foto = $_FILES['foto'];
		if($foto == ''){} else {
			$config['upload_path'] 		= './assets/foto/anggota';
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
			'id_anggota'	=> $this -> input -> post('id_anggota'),
			'nisn'			=> $this -> input -> post('nisn'),
			'nama'			=> $this -> input -> post('nama'),
			'jenkel'		=> $this -> input -> post('jenkel'),
			'email'			=> $this -> input -> post('email'),
			'alamat'		=> $this -> input -> post('alamat'),
			'telepon'		=> $this -> input -> post('telepon'),
			'foto'			=> $foto
		);

		$query = $this -> db -> insert('anggota', $data);
		if ($query = true){
			$this -> session -> set_flashdata('info', 'Data berhasil disimpan');
			redirect('anggota');
		}
	}

	public function edit($id)
	{
		$isi['content'] = 'anggota/edit_anggota';
		$isi['judul']	= 'Form Edit Anggota';
		$isi['data'] = $this -> m_anggota -> edit($id);
		$this -> load -> view('v_dashboard', $isi);
	}

	public function update()
	{
		$id_anggota = $this -> input -> post('id_anggota');

		$data = array(
			'nisn'			=> $this -> input -> post('nisn'),
			'nama'			=> $this -> input -> post('nama'),
			'jenkel'		=> $this -> input -> post('jenkel'),
			'email'			=> $this -> input -> post('email'),
			'alamat'		=> $this -> input -> post('alamat'),
			'telepon'		=> $this -> input -> post('telepon')
		);

		$query = $this -> m_anggota -> update($id_anggota, $data);
		if ($query = true){
			$this -> session -> set_flashdata('info', 'Data berhasil di Update');
			redirect('anggota');
		}
	}

	public function hapus($id)
	{
		// For delete file from directrori
		$data 	= $this -> m_anggota -> getDataById($id) -> row();
		$nama 	= './assets/foto/anggota/'.$data -> foto;

		if(is_readable($nama) && unlink($nama)){

			// For delete database
			$query 	= $this -> m_anggota -> hapus($id);
			if ($query = true){
			$this -> session -> set_flashdata('info', 'Data berhasil di Hapus');
			redirect('anggota');
		}
		} else {
			echo "Gagal";
		}

		
	}

	public function detail($id)
	{
		$isi['content'] = 'anggota/detail_Anggota';
		$isi['judul']	= 'Detail Anggota';
		$isi['data'] = $this -> m_anggota -> getDataById($id) -> row();
		$this -> load -> view('v_dashboard', $isi);
	}


	public function ubah_foto()
	{
		$id 	= $this -> input -> post('id_anggota');
		$foto = $_FILES['foto'];
		if($foto['name'] == null){
			
			redirect("anggota/edit/$id");
		} else {
			// For delete file from directrori
			$data 	= $this -> m_anggota -> getDataById($id) -> row();
			$nama 	= './assets/foto/anggota/'.$data -> foto;

			if(is_readable($nama) && unlink($nama)){

				// For Upload Files to Directory
				
				if($foto == ''){} else {
					$config['upload_path'] 		= './assets/foto/anggota';
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
				$this -> m_anggota -> update($id,$gambar);
					
				redirect("anggota/edit/$id");
			} else {
				echo error_log(message);
			}
		}

		
	}


}

 ?>