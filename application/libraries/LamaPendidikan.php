<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class LamaPendidikan{

	public $ci;
	
	public function __construct(){
		$this->ci = & get_instance();
	}

	public function make($tahunMasuk, $tahunKeluar){
		$masuk = new DateTime($tahunMasuk);
		$keluar = new DateTime($tahunKeluar);

		$interval = $masuk->diff($keluar);

		return ($interval->y.".".$interval->m);
	}
}