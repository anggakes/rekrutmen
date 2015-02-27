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


if( !function_exists('check_adm_login') ){

	function check_adm_login(){

		$_CI = &get_instance();

		$username = $_CI->session->userdata('username'); 
		$password = $_CI->session->userdata('password');

		$result = $_CI->db->query("select * from users where username = '$username' and password = '$password' LIMIT 1");

		return ($result->num_rows() > 0);		
	}

}