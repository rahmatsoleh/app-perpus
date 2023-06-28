<?php
 class M_login extends CI_Model {
 	public function proses_login($user, $pass){
 		$password = $pass;
 		$user = $this -> db -> where('username', $user);
 		$pass = $this -> db -> where('password', $password);
 		$query = $this -> db -> get('login');

 		if($query -> num_rows() > 0){
 			foreach ($query -> result() as $row) {
 				$sess = array(
 					'id' 		=> $row -> id,
 					'nama' 		=> $row -> nama,
 					'username' 	=> $row -> username,
 					'password' 	=> $row -> password,
 					'level' 	=> $row -> level,
 					'foto'		=> $row -> foto
 				);
 				$this -> session -> set_userdata($sess);
 			}
 			redirect('dashboard');
 		} else {
 			$this -> session -> set_flashdata('info', '<div class="alert alert-danger" role="alert"><strong>Login Gagal !</strong> Periksan Username dan Password Kembali</div>');
 			redirect('login');
 		}
 	}
 }

?>