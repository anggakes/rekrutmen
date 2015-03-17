<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Psikotes{

	public $ci ;
	public $no_peserta;
	public $nilai_psikotes;

	public function __construct(){
		$this->ci = & get_instance();
	} 

	public function make($nilai_psikotes,$no_peserta,$id_lowongan){

		if($this->insert($nilai_psikotes,$no_peserta,$id_lowongan)){
			return $this->setIntensitas($nilai_psikotes);
		}else{
			return false;
		}
	}

	public function setIntensitas($nilai){
		$intensitas =1;
		$int = $this->ci->db->query("SELECT intensitas FROM intensitas_psikotes WHERE  nilai<='$nilai' ORDER BY intensitas desc")->row();
		if(isset($int->intensitas)){
			$intensitas = $int->intensitas;
		}

		return $intensitas;
	}

	public function insert($nilai_psikotes, $no_peserta,$id_lowongan){
		$psikotes=[
			'no_peserta'=>$no_peserta,
			'id_lowongan'=>$id_lowongan,
			'nilai'=>$nilai_psikotes
		];

		$cek = $this->ci->db->query("SELECT count(*) as ada, id FROM psikotes WHERE no_peserta = '$no_peserta' AND id_lowongan = '$id_lowongan'")->row();
		if($cek->ada > 0){
			
			$this->ci->db->where('id',$cek->id);
			$this->ci->db->delete("psikotes");
		}	
		return $this->ci->db->insert("psikotes",$psikotes);
	}

	
}