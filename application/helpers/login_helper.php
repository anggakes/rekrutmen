<?php


if( !function_exists('check_karir_login') ){
	function check_karir_login(){

		$_CI = &get_instance();

		$username = $_CI->session->userdata('username_peserta'); 
		$password = $_CI->session->userdata('password_peserta');

		$result = $_CI->db->query("select * from peserta where email = '$username' and password = '$password' LIMIT 1");

		return ($result->num_rows() > 0);
	}
}

if( !function_exists('check_role') ){
	function check_role($role){

		$_CI = &get_instance();

		$r = $_CI->session->userdata('role'); 
		if($r == $role){
			return true;
		}else{
			return false;
		}
		
	}
}


if( !function_exists('check_adm_login') ){

	function check_adm_login(){

		$_CI = &get_instance();

		$username = $_CI->session->userdata('username'); 
		$password = $_CI->session->userdata('password');

		$result = $_CI->db->query("select * from users where username = '$username' and password = '$password' LIMIT 1");

		return ($result->num_rows() > 0);		
	}

}

if( !function_exists('ubah_tanggal') ){

	function ubah_tanggal($date){
		$bulan = ["januari","februari","maret","april","mei","juni","juli","agustus","september","oktober","november","desember"];
		$date=explode("-",$date);
		return ($date[2]." ".$bulan[$date[1]-1]." ".$date[0]);
	}

}

if( !function_exists('blink') ){

	function blink($date){
		$masuk = new DateTime($date);
		$keluar = new DateTime(date("Y-m-d"));

		$interval = $masuk->diff($keluar);
		if($interval->d <= 3){
			return true;
		}else{
			return false;
		}
	}

}


if( !function_exists('breadcrumb') ){

	function breadcrumb($data){
		$akhir = count($data);

		$r = "<ul class='breadcrumb'>";
		$i=1;
		foreach ($data as $key => $value) {
				
				if($i != $akhir){
					$r .= 	"<li>
						<a href='$value'>$key</a>";
					$r.="<span class='divider'>/</span>";
					$r .=	"</li>";
				}	else{
					$r .= 	"<li>";
					$r.=	"$key";
					$r .=	"</li>";
				}

				
				$i++;
		}
					
		$r.="</ul>";

		return $r;

	}

}