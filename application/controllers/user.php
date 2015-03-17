<?php

class user extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('peserta');
		$this->load->library("parser");

		if( check_karir_login() == FALSE ){
			redirect('karir');
		}

		$this->css = [
			base_url('assets/bootstrap-datepicker/css/datepicker3.css'),
		];
		$this->js = [
			base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.js'),
		];
	}

	public function index(){
		$this->load->model('peserta');
		$id_user = $this->session->userdata("nomor_peserta");
		$data['data_pendidikan'] = $this->peserta->getDataPendidikan( $id_user );
		$data['peserta'] = $this->peserta->getUserDataByID($id_user);
		$data['lowongan'] = $this->db->query("SELECT lowongan.*, ( SELECT count(*) FROM peserta_lowongan where no_peserta='$id_user' AND id_lowongan = lowongan.id )as apply FROM lowongan where berakhir >= CURDATE() ")->result();
		$data['sub_title'] 	= "Beranda";
		$data['output'] = $this->load->view("peserta/home_peserta",$data,true);
		$this->load->view('layout/layout_karir',$data);
	}


	public function data_diri(){
		
		$data['peserta'] = $this->peserta->getUserData( $this->session->userdata('username_peserta') );
		$data['sub_title']	= "Identitas Diri";
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['output'] = $this->load->view('peserta/data_diri',$data,true);
		$data['skript'] = $this->parser->parse('scripts/rekrutmen.js',array('kelamin'=>$data['peserta']->jenis_kelamin,'agama'=>$data['peserta']->agama),true);

		$this->load->view('layout/layout_karir',$data);

	}

	public function update_data_diri(){

		$this->load->library('form_validation');
		$config = array(
               array(
                     'field'   => 'nama_peserta', 
                     'label'   => 'Nama Peserta', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'tempat_lahir', 
                     'label'   => 'Tempat Lahir', 
                     'rules'   => 'required'
                  ),
          		array(
                     'field'   => 'tanggal_lahir', 
                     'label'   => 'Tanggal Lahir', 
                     'rules'   => 'required'
                  ),
                array(
                     'field'   => 'jenis_kelamin', 
                     'label'   => 'Jenis Kelamin', 
                     'rules'   => 'required'
                  ),
				array(
                     'field'   => 'agama',
                     'label'   => 'Agama', 
                     'rules'   => 'required'
                  ),
				/*array(
                     'field'   => 'no_telp', 
                     'label'   => 'Nomor Telepon', 
                     'rules'   => 'required'
                  ),
				*/
				array(
                     'field'   => 'no_hp', 
                     'label'   => 'Nomor Handphone', 
                     'rules'   => 'required'
                  ),
				/*array(
                     'field'   => 'warga_negara', 
                     'label'   => 'Warga Negara', 
                     'rules'   => 'required'
                  ),
                  */
				array(
                     'field'   => 'tinggi_badan', 
                     'label'   => 'Tinggi Badan', 
                     'rules'   => 'required'
                  ),
				array(
                     'field'   => 'berat_badan', 
                     'label'   => 'Berat Badan', 
                     'rules'   => 'required'
                  ),
		);

		$this->form_validation->set_rules( $config );

		if( $this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error',validation_errors() );
			redirect( 'user/data_diri' );
		}else{

			$data = [
				'nama_peserta' => $this->input->post('nama_peserta',true),
				'tgl_lahir' => $this->input->post('tanggal_lahir',true),
				'tempat_lahir' => $this->input->post('tempat_lahir',true),
				'jenis_kelamin' => $this->input->post('jenis_kelamin',true),
				'status' => $this->input->post('status',true),
				'agama' => $this->input->post('agama',true),
				'warga_negara' => $this->input->post('warga_negara',true),
				'alamat'=>$this->input->post('alamat',true),
				'kode_pos' => $this->input->post('kode_pos',true),
				'no_telp' => $this->input->post('no_telp',true),				
				'area_telp' => $this->input->post('area_telp',true),
				'no_hp' => $this->input->post('no_hp',true),
				'tinggi_badan' => $this->input->post('tinggi_badan',true),
				'berat_badan' => $this->input->post('berat_badan',true),
				'hobby' => $this->input->post('hobby',true),
			];

			$this->db->where('email', $this->session->userdata('username_peserta'));
			if( $this->db->update('peserta', $data) ) {
				$this->session->set_flashdata('success',"Data Anda telah berhasil diperbarui");
				redirect( site_url('user/data_diri') );
			}else{
				$this->session->set_flashdata('error',"Data Anda gagal diperbarui");
				redirect( site_url('user/data_diri') );				
			}

		}


	}

	public function data_pendidikan(){

		$nomor_peserta = $this->session->userdata( 'nomor_peserta' );
		$dataPendidikan = $this->peserta->getDataPendidikan( $nomor_peserta );
	
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['output'] = $this->load->view('peserta/data_pendidikan',['pendidikan'=>$dataPendidikan,'sub_title'=>'Data Pendidikan Terakhir'],true);
		$this->load->view('layout/layout_karir',$data);

	}

	public function update_data_pendidikan(){

		$this->load->library('form_validation');

		$config = array(
	        array(
	              'field'   => 'nama_sekolah', 
	              'label'   => 'Institusi', 
	              'rules'   => 'required'
	        ),
	        array(
	              'field'   => 'jurusan', 
	              'label'   => 'Jurusan', 
	              'rules'   => 'required'
	         ),
	         array(
	              'field'   => 'tahun_masuk', 
	              'label'   => 'Tahun Masuk', 
	               'rules'   => 'required'
	        ),
	         array(
	              'field'   => 'tahun_keluar',
	              'label'   => 'Tahun Keluar', 
	              'rules'   => 'required'
	          ),
	         array(
	              'field'   => 'tingkat',
	              'label'   => 'Tingkat', 
	              'rules'   => 'required'
	          ),
		);

		$this->form_validation->set_rules( $config );

		if( $this->form_validation->run() == FALSE ){

			$this->session->set_flashdata( "error", validation_errors() );
			redirect( 'user/data_pendidikan' );

		}else{
			
			$nomor_peserta 		= $this->session->userdata("nomor_peserta");
			$tingkat 			= $this->input->post("tingkat",true);
			$pendidikan 		= $this->input->post("nama_sekolah",true);
			$jurusan 			= $this->input->post("jurusan",true);
			$tahun_masuk 		= $this->input->post("tahun_masuk",true);
			$tahun_ijazah		= $this->input->post("tahun_keluar",true);
			$ipk 				= $this->input->post("ipk",true);
			$this->load->library("LamaPendidikan","","LamaPendidikan");
			$lama_pendidikan 	= $this->LamaPendidikan->make($tahun_masuk,$tahun_ijazah);

			$data = [
				'nomor_peserta' 	=> $nomor_peserta,
				'pendidikan'		=> $tingkat,
				'institusi'			=> $pendidikan,
				'lama_pendidikan'	=> $lama_pendidikan,
				'jurusan'			=> $jurusan,
				'tahun_masuk'		=> $tahun_masuk,
				'tahun_ijazah'		=> $tahun_ijazah,
				'ipk'				=> $ipk
			];

			$values = array();

			array_walk($data, function(&$value,&$key) use(&$values){
				array_push($values, "'".$value."'");
			});

			$vals = implode(',', $values);


			$sql = "INSERT
						INTO 
						pendidikan(no_peserta,pendidikan,institusi,lama_pendidikan,jurusan,tahun_masuk,tahun_ijazah,IPK)
					VALUES(".$vals.") 
					ON DUPLICATE KEY UPDATE 
						pendidikan = '$tingkat',
						institusi = '$pendidikan',
						lama_pendidikan = '$lama_pendidikan',
						jurusan = '$jurusan',
						tahun_masuk = '$tahun_masuk',
						tahun_ijazah = '$tahun_ijazah',
						IPK = '$ipk'";

			if( $this->db->query( $sql ) ){

				$this->session->set_flashdata("success","Data Pendidikan telah di tambahkan");
				redirect( 'user/data_pendidikan' );

			}else{

				$this->session->set_flashdata("error","Data Pendidikan gagal di tambahkan :(");
				redirect( 'user/data_pendidikan' );
			}

		}
	}


	public function akun_anda(){

		$data['peserta'] = $this->peserta->getUserDataByID( $this->session->userdata('nomor_peserta') );
		$data['output'] = $this->load->view("peserta/data_akun",$data,true);
		$data['skript'] = $this->parser->parse('scripts/script_account.js',array(),true);
		$data['sub_title']	= "Data Akun";

		$this->load->view("layout/layout_karir",$data);
	}


	public function ganti_email(){

		$this->load->library("form_validation");

		$config = array(
               array(
                     'field'   => 'email_baru', 
                     'label'   => 'email_baru', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'password_email', 
                     'label'   => 'password_email', 
                     'rules'   => 'required'
                  ),
        );

        $this->form_validation->set_rules( $config );

        $notification = array();

        if( $this->form_validation->run() == FALSE ){

        	$notification = ['status'=>'failed','messages'=>validation_errors()];

        }else{

        	$nomor_peserta 		= $this->session->userdata( "nomor_peserta" );
        	$password_email 	= md5($this->input->post("password_email",true));
        	$email_baru 		= $this->input->post("email_baru",true);

        	if( $password_email != $this->session->userdata("password_peserta") ){
        		$notification = ['status'=>'failed','messages'=>'Password yang anda masukan salah!'];
        	}else{
        		$this->db->where( "no_peserta",$nomor_peserta );

        		if( $this->db->update("peserta",['email'=>$email_baru]) ){
        			$notification = ['status'=>'success','messages'=>'email berhasil diubah, silahkan login ulang!'];
        		}else{
        			$notification = ['status'=>'failed','messages'=>'terjadi kesalahan sistem!'];
        		}
        	}

        }

        echo json_encode( $notification );

	}


	public function ganti_password(){

		$this->load->library("form_validation");

		$config = array(
               array(
                     'field'   => 'password_baru', 
                     'label'   => 'password_baru', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'password_lama', 
                     'label'   => 'password_lama', 
                     'rules'   => 'required'
                  ),
        );

        $this->form_validation->set_rules( $config );

        $notification = array();

        if( $this->form_validation->run() == FALSE ){

        	$notification = ['status'=>'failed','messages'=>validation_errors()];

        }else{

        	$nomor_peserta 		= $this->session->userdata( "nomor_peserta" );
        	$password_lama 	= md5($this->input->post("password_lama",true));
        	$password_baru 		= md5($this->input->post("password_baru",true));

        	if( $password_lama != $this->session->userdata("password_peserta") ){
        		$notification = ['status'=>'failed','messages'=>'Password yang anda masukan salah!'];
        	}else{
        		$this->db->where( "no_peserta",$nomor_peserta );

        		if( $this->db->update("peserta",['password'=>$password_baru]) ){
        			$notification = ['status'=>'success','messages'=>'email berhasil diubah, silahkan login ulang!'];
        		}else{
        			$notification = ['status'=>'failed','messages'=>'terjadi kesalahan sistem!'];
        		}
        	}

        }

        echo json_encode( $notification );

	}

	public function lowongan (){
		$id_user = $this->session->userdata("nomor_peserta");
		$data['peserta'] = $this->peserta->getUserDataByID($id_user);
		$data['pendidikan'] = $this->peserta->getDataPendidikan( $id_user );
	
		$data['lowongan'] = $this->db->query("SELECT lowongan.*, ( SELECT count(*) FROM peserta_lowongan where no_peserta='$id_user' AND id_lowongan = lowongan.id )as apply FROM lowongan where berakhir >= CURDATE() ")->result();
		$data['output'] = $this->load->view("peserta/lowongan",$data,true);
		$this->load->view('layout/layout_karir',$data);
	}

	public function apply_lowongan($id_lowongan){
		$id_user = $this->session->userdata("nomor_peserta");
		
		$this->load->library("ApplyLowongan","","apply");
		$oke = $this->apply->make($id_lowongan,$id_user);
	//cek apakah pernah melamar
		$cek = $this->db->query("SELECT Count(*) as sudah FROM peserta_lowongan WHERE no_peserta = '$id_user' AND id_lowongan = '$id_lowongan'")->row(); 
		if($cek->sudah==0 AND $oke){
			$apply = [
				"no_peserta"=>$id_user,
				"id_lowongan"=>$id_lowongan
			];
		if( $this->db->insert('peserta_lowongan', $apply) ) {
				$this->session->set_flashdata('success',"Lowongan berhasil di apply");
				redirect( site_url('user/lowongan') );
			}
		}

		$this->session->set_flashdata('error',"Anda Tidak dapat melamar Pekerjaan ini");
		redirect( site_url('user/lowongan') );				
		
	}



}