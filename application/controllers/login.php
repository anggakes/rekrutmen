<?php

class login extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function masuk(){
		$this->load->library('form_validation');
		$config = array(
               array(
                     'field'   => 'email', 
                     'label'   => 'Email', 
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
			redirect( site_url('karir/index') );
		}
		else{
			$email 		= $this->input->post("email",true);
			$password 	= md5( $this->input->post("password",true) );

			$result = $this->db->query("SELECT * FROM peserta where email = '$email' and password = '$password' LIMIT 1");

			if( $result->num_rows() <= 0 ){
				$this->session->set_flashdata('error','Maaf username dan password anda salah');
				redirect( site_url('karir') );
			}else{
				
				$peserta = $result->row();
				$this->session->set_userdata('username_peserta',$email);
				$this->session->set_userdata('password_peserta',$password);
				$this->session->set_userdata('nomor_peserta',$peserta->no_peserta);


				redirect( site_url('user/index') );
			}
		}

	}

	public function keluar(){
		$this->session->sess_destroy();
		redirect( site_url('karir') );
	}

}