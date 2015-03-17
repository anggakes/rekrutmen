<?php

class login_admin extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
	}

	public function masuk(){
		$this->load->library('form_validation');
		$config = array(
               array(
                     'field'   => 'username', 
                     'label'   => 'username', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => 'Password', 
                     'rules'   => 'required'
                  ),
		);

		$this->form_validation->set_rules($config);

		if( $this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error',validation_errors());
			redirect( site_url('administrasi/index') );
		}
		else{
			$username 	= $this->input->post("username",true);
			$password 	= md5( $this->input->post("password",true) );

			$result = $this->db->query("SELECT * FROM users where username = '$username' and password = '$password' LIMIT 1");

			if( $result->num_rows() <= 0 ){
				$this->session->set_flashdata('error','Maaf username dan password anda salah');
				redirect( 'administrasi' );
			}else{
				
				$user = $result->row();
				$this->session->set_userdata('username',$username);
				$this->session->set_userdata('password',$password);
				$this->session->set_userdata('nama',$user->nama);
				
				$this->session->set_userdata('role',$user->role);
				$this->session->set_userdata('user_id',$user->id_user);


				redirect( site_url('administrasi/index') );
			}
		}

	}

	public function keluar(){
		$this->session->sess_destroy();
		redirect( site_url('administrasi') );
	}

}