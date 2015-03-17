<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ApplyLowongan{

	public $ci ;
	public $no_peserta;
	public $id_lowongan;

	public function __construct(){
		$this->ci = & get_instance();
	}

	public function make($id_lowongan, $no_peserta){
		$this->id_lowongan = $id_lowongan;
		$this->no_peserta = $no_peserta;

		return $this->cek($this->getPeserta(),$this->getSyaratLowongan(),$this->apply());
	}

	private function getPeserta(){
		$peserta = $this->ci->db->query("SELECT (YEAR(CURDATE()) - YEAR(peserta.tgl_lahir)) as usia, pendidikan.IPK, pendidikan.pendidikan FROM pendidikan, peserta Where peserta.no_peserta = '".$this->no_peserta."' AND peserta.no_peserta = pendidikan.no_peserta");
		return $peserta->row();
	}

	private function getSyaratLowongan(){
		$lowongan = $this->ci->db->query("SELECT * FROM lowongan WHERE id = '".$this->id_lowongan."'");
		return $lowongan->row();
	}

	private function cek($peserta,$lowongan,$apply){
		$pendidikan = ['D3'=>1,"S1"=>2,"S2"=>3,"S3"=>4];
		
		if($apply){
			if($peserta->usia>=$lowongan->min_usia AND $peserta->IPK >= $lowongan->min_ipk AND $pendidikan[$peserta->pendidikan]>=$pendidikan[$lowongan->min_pendidikan]){
				return true;
			}else{
				return false;
			}
		}else{
				return false;
		}
	}

	private function apply (){
		$pl = $this->ci->db->query("SELECT IF(lowongan.berakhir>=CURDATE(),'false','true') as oke FROM (SELECT id_lowongan FROM peserta_lowongan WHERE no_peserta = '".$this->no_peserta."' ORDER BY id DESC LIMIT 1) p,lowongan WHERE lowongan.id = p.id_lowongan")->row();	
		if($pl->oke == 'true' OR count($pl)==0){
			return true;
		}else{
			return false;
		}
	}
}