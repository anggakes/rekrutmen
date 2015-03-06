<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class IdentitasDiri{

	public $ci ;
	public $no_peserta;

	public function __construct(){
		$this->ci = & get_instance();
	}

	public function make($no_peserta, $ketekunan){
		$this->no_peserta = $no_peserta;
		$IdentitasDiri = [
			"sk1"=>$this->setIntensitas($this->getSk1(),"sk1"),
			"sk2"=>$this->setIntensitas($this->getSk2(),"sk2"),
			"sk3"=>$ketekunan
		];

		$this->insertKetekunan($ketekunan);

		return $IdentitasDiri;
	}

		/* Sk3 = Ketekunan -> inputan User */

	public function setIntensitas($nilai,$kode){
		$intensitas =1;
		$int = $this->ci->db->query("SELECT intensitas FROM intensitas_identitas_diri WHERE  nilai<='$nilai' and kode='$kode' ORDER BY intensitas desc")->row();
		if(isset($int->intensitas)){
			$intensitas = $int->intensitas;
		}

		return $intensitas;			
	}

	/* Sk1 = tinggi badan */
	public function getSk1(){
		$nilai = $this->ci->db->query("SELECT tinggi_badan FROM peserta WHERE no_peserta='".$this->no_peserta."'")->row();
		return $nilai->tinggi_badan;
	}

	/* Sk2 = umur */
	public function getSk2(){
		$nilai = $this->ci->db->query("SELECT (YEAR(CURDATE()) - YEAR(tgl_lahir)) as umur FROM peserta WHERE no_peserta='".$this->no_peserta."'")->row();
		return $nilai->umur;
	}

	public function insertKetekunan($ketekunan){
		$data = [
			'ketekunan'=>$ketekunan
		];
		$this->ci->db->where('no_peserta',$this->no_peserta);
		return $this->ci->db->update('peserta',$data);
	}



}