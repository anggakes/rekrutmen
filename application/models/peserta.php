<?php

class peserta extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getUserData( $email ){
		$result = $this->db->query("SELECT * FROM peserta where email = '".$email."' limit 1 ")->row();
		return $result;
	}

	public function getUserDataByID( $id ){
		$result = $this->db->query("SELECT * FROM peserta where no_peserta = '".$id."' limit 1 ")->row();
		return $result;
	}

	public function getDataPendidikan( $id ){
		$result = $this->db->query("SELECT * FROM pendidikan where no_peserta = '$id'")->row();
		return $result;
	}

}