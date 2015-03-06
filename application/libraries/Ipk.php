<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ipk{

	public $ci ;
	public $no_peserta;

	public function __construct(){
		$this->ci = & get_instance();
	} 

	public function make($no_peserta){
		$this->no_peserta = $no_peserta;
		return $this->setIntensitas($this->getNilai());
	}

	public function setIntensitas($nilai){
		$intensitas =1;
		$int = $this->ci->db->query("SELECT intensitas FROM intensitas_ipk WHERE  nilai<='$nilai' ORDER BY intensitas desc")->row();
		if(isset($int->intensitas)){
			$intensitas = $int->intensitas;
		}

		return $intensitas;
	}

	public function getNilai(){
		$nilai = $this->ci->db->query("SELECT IPK FROM pendidikan WHERE no_peserta='".$this->no_peserta."'")->row();
		return $nilai->IPK;
	}

}