<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pendidikan{

	public $ci ;
	public $no_peserta;

	public function __construct(){
		$this->ci = & get_instance();
	}

	public function make($no_peserta){
		$this->no_peserta = $no_peserta;
		return $this->setIntensitas($this->getNilai());
	} 

	public function getNilai(){
		$nilai = $this->ci->db->query("SELECT pendidikan,lama_pendidikan FROM pendidikan WHERE no_peserta='".$this->no_peserta."'")->row();
		return $nilai;
	}

	public function setIntensitas($nilai){
		$jenjang 			= $nilai->pendidikan;
		$lama_pendidikan 	= $nilai->lama_pendidikan;

		$intensitas =1;
		$int = $this->ci->db->query("SELECT intensitas FROM intensitas_pendidikan WHERE  lama<='$lama_pendidikan' AND jenjang='$jenjang' ORDER BY intensitas ASC")->row();
		if(isset($int->intensitas)){
			$intensitas = $int->intensitas;
		}

		return $intensitas;
	}
}