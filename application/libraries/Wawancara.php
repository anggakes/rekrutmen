<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Wawancara{

	public $ci ;
	public $data_wawancara;
	public $no_peserta;

	public function __construct(){
		$this->ci = & get_instance();
	} 

	public function make($data_wawancara, $no_peserta,$id_lowongan){
		$this->data_wawancara = $data_wawancara;
		$this->no_peserta = $no_peserta;


		if($this->insert($data_wawancara,$no_peserta,$id_lowongan))
		{
			return $this->countSkWawancara();
		}else{
			return false;
		}
	}

	function insert($data_wawancara,$no_peserta,$id_lowongan){
		
		$data_wawancara['no_peserta']= $no_peserta;
		$data_wawancara['id_lowongan'] = $id_lowongan;
		$cek = $this->ci->db->query("SELECT count(*) as ada, id FROM pendukung_wawancara WHERE no_peserta = '$no_peserta' AND id_lowongan = '$id_lowongan'")->row();
		if($cek->ada > 0){
		
			$this->ci->db->where('id',$cek->id);
			$this->ci->db->delete('pendukung_wawancara');
		}

			return $this->ci->db->insert("pendukung_wawancara",$data_wawancara);
	
	}

	function countSkWawancara(){

		$data=array();
		$label="sk";
		for ($i=1; $i <=7 ; $i++) {
			$wadah = 0;
			for ($j=1; $j<=4 ; $j++) { 
				$wadah += $this->data_wawancara[$label.$i.$j];	
			}
			$data[$label.$i]=$this->getIntensitas($label.$i,$wadah);
		}

		return($data);


		
	}

	function getIntensitas($sk, $nilai){
		$r =1;
		$int = $this->ci->db->query("SELECT intensitas FROM intensitas_pendukung_wawancara WHERE kode='$sk' and skor<='$nilai' ORDER BY intensitas desc")->row();
		if(isset($int->intensitas)){
			$r = $int->intensitas;
		}
		return $r;
	}

}