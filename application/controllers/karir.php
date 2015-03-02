<?php

class karir extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if(!check_karir_login()){
		$data['output'] = $this->load->view('karir/home',null,true);
		$this->load->view('layout/layout_karir',$data);
		}else{
			redirect(site_url("user"));
		}
	}

	public function daftar(){
		$data['sub_title'] = "Pendaftaran Akun";
		$data['output'] = $this->load->view('karir/buat_akun',null,true);
		$this->load->view('layout/layout_karir',$data);
	}

	public function proses_daftar(){
		
		$this->load->library('form_validation');

		$rules = array(
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
          		array(
                     'field'   => 'konfirmasi_password', 
                     'label'   => 'Konfirmasi Password', 
                     'rules'   => 'required'
                  ),
                    
		);

		$this->form_validation->set_rules( $rules );

		if( $this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error',validation_errors());
			redirect( site_url('karir') );
		}
		else{

			$email 	=	$this->input->post('email',true);
			$password = $this->input->post('password',true);
			$konf_password = $this->input->post('konfirmasi_password',true); 


			if( strcmp($password, $konf_password) != 0 ){
				//save it to session
				$this->session->set_flashdata('email',$email);
				$this->session->set_flashdata('error','Konfirmasi Password tidak benar');
				redirect( site_url('karir') );
			}else{

				$peserta = array(
						'email'			=> $email,
						'password'		=> md5( $password )
					);

				if( $this->db->insert('peserta',$peserta) ) {
					$this->session->set_flashdata('success','Pendaftaran telah berhasil, silakan login untuk melengkapi data diri <a href="'.site_url('karir').'">di sini</a>');
					redirect( site_url('karir') );
				}else{
					$this->session->set_flashdata('error','Konfirmasi Password tidak benar');
					redirect( site_url('karir') );
				}

			}


		}
	}	

}