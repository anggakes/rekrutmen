<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



Class Ahp{

	public $ci;
	
	public function __construct(){
		$this->ci = & get_instance();
	}

	public function simpan($data,$id_lowongan,$no_peserta){
		
		
		$this->ci->db->trans_start();
		$alt = [
			"id_lowongan"	=>$id_lowongan,
			"no_peserta"	=>$no_peserta,
			"nilai_ahp"		=>$this->hitungAhp($data),
			"k1"			=>$data['k1'],
			"k2"			=>$data['k2'],
			"k3sk1"			=>$data['k3']['sk1'],
			"k3sk2"			=>$data['k3']['sk2'],
			"k3sk3"			=>$data['k3']['sk3'],
			"k4"			=>$data['k4'],
			"k5sk1"			=>$data['k5']['sk1'],
			"k5sk2"			=>$data['k5']['sk2'],
			"k5sk3"			=>$data['k5']['sk3'],
			"k5sk4"    		=>$data['k5']['sk4'],
			"k5sk5"			=>$data['k5']['sk5'],
			"k5sk6"			=>$data['k5']['sk6'],
			"k5sk7"			=>$data['k5']['sk7'],
		];

		$cek = $this->ci->db->query("SELECT count(id) as ada, id FROM alternatif WHERE id_lowongan = '".$id_lowongan."' AND no_peserta='".$no_peserta."'")->row();
		if($cek->ada>0){
			$this->ci->db->where("id",$cek->id)->delete("alternatif");
		}
		$this->ci->db->insert("alternatif",$alt);
		
		$this->ci->db->trans_complete();

		return $this->ci->db->trans_status();
	}

	public function getPrioritas(){
		$prioritas	=	$this->ci->db->query("SELECT kriteria.kode_kriteria as kode, prioritas.*,(Select count(id_kriteria) FROM kriteria WHERE kriteria.parent_kriteria=prioritas.id_kriteria) as banyak FROM prioritas,kriteria where prioritas.id_kriteria=kriteria.id_kriteria")->result();
		$return ='';

		foreach ($prioritas as $value) {
			if($value->banyak==0){
				$return[strtolower($value->kode)]=$value->nilai;
			}	
		}
		
		return $return;
	}	

	function hitungAhp($data){
		$prioritas =  $this->getPrioritas();
		$nilaiAhp = 0;
		foreach ($data as $key=>$value) {
			switch ($key) {
				case 'k1':
					$kali 		=  $value*$prioritas[$key];
					$nilaiAhp 	+= $kali;
					break;
				case 'k2':
					$kali 		=  $value*$prioritas[$key];
					$nilaiAhp 	+= $kali;
					break;
				case 'k3':
					$kalisk1 		=  $value["sk1"]*$prioritas[$key."sk1"];
					$kalisk2 		=  $value["sk2"]*$prioritas[$key."sk2"];
					$kalisk3 		=  $value["sk3"]*$prioritas[$key."sk3"];
					$kali = $kalisk1+$kalisk2+$kalisk3;
					$nilaiAhp 	+= $kali;
					break;
				case 'k4':
					$kali 		=  $value*$prioritas[$key];
					$nilaiAhp 	+= $kali;
					break;
				case 'k5':
					$kalisk1 		=  $value["sk1"]*$prioritas[$key."sk1"];
					$kalisk2 		=  $value["sk2"]*$prioritas[$key."sk2"];
					$kalisk3 		=  $value["sk3"]*$prioritas[$key."sk3"];
					$kalisk4 		=  $value["sk4"]*$prioritas[$key."sk4"];
					$kalisk5 		=  $value["sk5"]*$prioritas[$key."sk5"];
					$kalisk6 		=  $value["sk6"]*$prioritas[$key."sk6"];
					$kalisk7 		=  $value["sk7"]*$prioritas[$key."sk7"];
					$kali = $kalisk1+$kalisk2+$kalisk3+$kalisk4+$kalisk5+$kalisk6+$kalisk7;
					$nilaiAhp 	+= $kali;
					break;
				default:
					# code...
					break;
			}
		}

		return $nilaiAhp;

	}



}