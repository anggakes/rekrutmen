<?php 

class administrasi extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$method = $this->uri->segment(2);

		if( strtolower( $method ) == "login" ){
			if( check_adm_login() ){
				redirect("administrasi/index");
			}
		}else{

			if( check_adm_login() == FALSE ){
				redirect("administrasi/login");
			}
		}


	}

	public function index(){
		$data['output'] = $this->load->view('adm/beranda',array(),true);
		$this->load->view("layout/layout_backend",$data);
	}

	public function login(){
		$this->load->view("layout/layout_login_backend");
	}


	public function kriteria(){

		$this->load->library('parser');

		$data['kriterias']	=	$this->db->query("SELECT * FROM kriteria")->result();
		$data['output'] 	= 	$this->load->view("adm/kriteria/list",$data,true);
		$data['skript']		=	$this->parser->parse('scripts/script_criteria.js',array(),true);

		$this->load->view('layout/layout_backend',$data);

	}

	public function tambah_kriteria(){
		$data['parent_kriteria'] = $this->db->query("SELECT * FROM kriteria where parent_kriteria is NULL")->result();
		$data['output'] 	= 	$this->load->view("adm/kriteria/add",$data,true);
		$this->load->view('layout/layout_backend',$data);		
	}

	public function edit_kriteria($kode){
		$id = $this->db->query("SELECT id_kriteria FROM kriteria WHERE kode_kriteria='$kode' LIMIT 1")->row();
		$id =$id->id_kriteria;

		$data['kriteria']   = 	$this->db->query("SELECT * FROM kriteria where kode_kriteria = '$kode' or id_kriteria = '$kode' limit 1")->row();			
		$data['parent_kriteria'] = $this->db->query("SELECT * FROM kriteria where parent_kriteria is NULL")->result();
		$data['output'] 	= 	$this->load->view("adm/kriteria/add",$data,true);

		$this->load->view('layout/layout_backend',$data);		
	}

	public function simpan_kriteria( $sub=false ){

		$this->load->library("form_validation");

		$redirect_link = 'administrasi/tambah_kriteria';

		$config = array(
               array(
                     'field'   => 'kode_kriteria', 
                     'label'   => 'Kode Kriteria', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'nama_kriteria', 
                     'label'   => 'nama_kriteria', 
                     'rules'   => 'required'
                  ),
		);

		$this->form_validation->set_rules( $config );

		if( $this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error',validation_errors());
			redirect( $redirect_link );
		}else{

			$kode_kriteria = $this->input->post('kode_kriteria',true);
			$parent_kriteria = $this->input->post('parent_kriteria',true);
			$nama_kriteria = $this->input->post('nama_kriteria',true);
			$keterangan    = $this->input->post('keterangan',true);
			
			$where ="parent_kriteria = '$parent_kriteria'";


			if($parent_kriteria==''){
				$parent_kriteria=NULL;
				$where="parent_kriteria is NULL";
			}


			$kriteria = [
				'kode_kriteria' => $kode_kriteria,
				'nama_kriteria' => $nama_kriteria,
				'keterangan'	=> $keterangan,
				'parent_kriteria'=>$parent_kriteria,
				];
			
		
			

			$kriterias = $this->db->query("SELECT id_kriteria FROM kriteria WHERE $where")->result();


			$this->db->trans_start();  //start transaction
			
			$this->db->insert("kriteria",$kriteria);
			
			$i=0;

			if(count($kriterias)>0){
				
				foreach ($kriterias as $k) {
					$perbandingan_berpasangan[$i]=[
						'baris'=>$this->db->insert_id(),
						'kolom'=>$k->id_kriteria,
						'nama'=>$this->db->insert_id()."_".$k->id_kriteria,
						'nilai'=>1,
						'parent_kriteria'=>$parent_kriteria
					];
					$i++;
					$perbandingan_berpasangan[$i]=[
						'baris'=>$k->id_kriteria,
						'kolom'=>$this->db->insert_id(),
						'nama'=>$k->id_kriteria."_".$this->db->insert_id(),
						'nilai'=>1,
						'parent_kriteria'=>$parent_kriteria
					];
					$i++;
				}
			} //end if

				$perbandingan_berpasangan[$i]=[
						'baris'=>$this->db->insert_id(),
						'kolom'=>$this->db->insert_id(),
						'nama'=>$this->db->insert_id()."_".$this->db->insert_id(),
						'nilai'=>1,
						'parent_kriteria'=>$parent_kriteria
				];

			$this->db->insert_batch('perbandingan_berpasangan',$perbandingan_berpasangan);


			$this->db->trans_complete();  //end transaction

			if ($this->db->trans_status() === FALSE){
				$messages = "Kriteria gagal disimpan.";
				$this->session->set_flashdata('error',$messages);
				redirect( $redirect_link );
			}else{
				$messages = "Kriteria berhasil disimpan.";
				$this->session->set_flashdata('success',$messages);
				redirect( $redirect_link );
			}


		}

	}

	public function update_kriteria(){

		$this->load->library("form_validation");

		$config = array(
               array(
                     'field'   => 'nama_kriteria', 
                     'label'   => 'nama_kriteria', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'kode_kriteria', 
                     'label'   => 'kode_kriteria', 
                     'rules'   => 'required'
                  ),
		);

		$id_kriteria = $this->input->post('k_krit',true);
		$nama_kriteria = $this->input->post('nama_kriteria',true);
		$keterangan    = $this->input->post('keterangan',true);
		$parent_kriteria = $this->input->post('parent_kriteria',true);
		$sumber_tabel	= $this->input->post('sumber_tabel',true);
		$sumber_field	= $this->input->post('sumber_field',true);
		$kode_kriteria = $this->input->post('kode_kriteria',true);
		$kode_kriteria_lama = $this->input->post('kode_kriteria_lama',true);

		if($parent_kriteria==''){
				$parent_kriteria=NULL;
		}


		$this->form_validation->set_rules( $config );

		if( $this->form_validation->run() == FALSE ){
			$this->session->set_flashdata('error',validation_errors());
			redirect('administrasi/edit_kriteria/'.$kode_kriteria_lama);
		}else{
		
			$kriteria = [
				'kode_kriteria' => $kode_kriteria,
				'nama_kriteria' => $nama_kriteria,
				'keterangan'	=> $keterangan,
				'parent_kriteria'=>$parent_kriteria,
			];

			$this->db->trans_start();  //start transaction

			$this->db->where('id_kriteria',$id_kriteria);
			$this->db->update("kriteria",$kriteria);

			$this->db->trans_complete();  //end transaction

			if ($this->db->trans_status() === FALSE){
				$messages = "Kriteria gagal diubah.";
				$this->session->set_flashdata('error',$messages);
				redirect('administrasi/edit_kriteria/'.$kode_kriteria_lama);	
	
			}else{
				$messages = "Kriteria berhasil diubah.";
				$this->session->set_flashdata('success',$messages);
				redirect('administrasi/edit_kriteria/'.$kode_kriteria_lama);				
	
			}

		}

	}
	public function lihat_kriteria($kode){


		$data['kriteria'] 		= $this->db->query("select * from kriteria where kode_kriteria = '$kode' limit 1")->row();
		$data['subkriterias']	= $this->db->query("SELECT * FROM kriteria where parent_kriteria = ".$data['kriteria']->id_kriteria."")->result_array();
		$data['output'] 		= $this->load->view('adm/kriteria/view',$data,true);
		$data['skript']			= $this->load->view('scripts/script_criteria.js',array(),true);

		$this->load->view('layout/layout_backend',$data);

	}

	public function hapus_kriteria($kode){
		
		$this->db->where('kode_kriteria', $kode);
		 
		return ( $this->db->delete('kriteria') );

	}

	public function pair_comparison(){

		$parent = $this->uri->segment(3);
		
		$where ="parent_kriteria = '$parent'";

		if($parent==''){
			$where="parent_kriteria is NULL";
		}

		$data['kriteria'] = $this->db->query("SELECT * FROM kriteria WHERE $where")->result();
		$data['parent']=$parent;
		$data['perbandingan_berpasangan'] = $this->db->query("SELECT * FROM perbandingan_berpasangan WHERE $where ORDER BY baris,kolom")->result();
		$data['ri'] = $this->db->query("SELECT * from table_ri where n='".count($data['kriteria'])."'")->row();
		$data['output'] = $this->load->view('adm/pair_comparison/form',$data,true);
		$data['skript']			= $this->load->view('adm/pair_comparison/hitung.js',$data,true);
		$this->load->view('layout/layout_backend',$data);

	}

	public function simpan_pair_comparison(){

	
		$parent = $this->uri->segment(3);
		$where ="parent_kriteria = '$parent'";

		if($parent==''){
			$parent=NULL;
			$where="parent_kriteria is NULL";
		}


		$kriteria = $this->db->query("SELECT * FROM kriteria WHERE $where")->result();

		$this->db->trans_start();  //start transaction

		foreach ($this->input->post() as $key => $value) {
			if($key=='prioritas'){
				$prioritas=$value;
			}else{
				$data=[
					'nilai'=>$value
				];
				$this->db->where('id',$key);
				$this->db->update('perbandingan_berpasangan',$data);
			}
		}

		for ($i=0;$i<count($kriteria);$i++) {
			$nilai_prioritas[$i]=[
				'id_kriteria'=>$kriteria[$i]->id_kriteria,
				'nilai'=>$prioritas[$i],
				'parent_kriteria'=>$parent
			];
		}

		$this->db->query("DELETE FROM prioritas WHERE $where");//hapus dulu data di table prioritas
		 
		$this->db->insert_batch('prioritas',$nilai_prioritas);

		$this->db->trans_complete();  //end transaction

		if ($this->db->trans_status() === FALSE){
				$messages = "Tabel gagal diubah.";
				$this->session->set_flashdata('error',$messages);
				redirect('administrasi/pair_comparison/'.$parent);	
	
			}else{
				$messages = "Tabel berhasil disimpan.";
				$this->session->set_flashdata('success',$messages);
				redirect('administrasi/pair_comparison/'.$parent);				
	
			}


	}

	public function prioritas(){

		$data['prioritas']	=	$this->db->query("SELECT kriteria.nama_kriteria as nama, prioritas.*,(Select count(id_kriteria) FROM kriteria WHERE kriteria.parent_kriteria=prioritas.id_kriteria) as banyak FROM prioritas,kriteria where prioritas.id_kriteria=kriteria.id_kriteria")->result();
		$data['output'] 	= 	$this->load->view("adm/prioritas/prioritas",$data,true);

		$this->load->view('layout/layout_backend',$data);
	}



	/*  Form Lowongan --------------------------------*/

	public function lowongan(){

		$this->load->library('parser');
		
		$data['lowongan']	=	$this->db->query("SELECT * FROM lowongan Order By id Desc")->result();
		$data['output'] 	= 	$this->load->view("adm/lowongan/list",$data,true);
		$data['skript']		=	$this->parser->parse('adm/lowongan/lowongan_script.js',array(),true);

		$this->load->view('layout/layout_backend',$data);
	}

	public function lowongan_simpan(){

		//inisialisasi
		$nama = $this->input->post('nama',true);
		$deskripsi = $this->input->post('deskripsi',true);
		$berakhir = $this->input->post('berakhir',true);
		$kode_lowongan = $this->input->post('kode_lowongan',true);

		$lowongan=[
			'nama'=>$nama,
			'deskripsi'=>$deskripsi,
			'berakhir'=>$berakhir,
			'kode_lowongan'=>$kode_lowongan
		];

		if($this->db->insert('lowongan',$lowongan)){
			$messages = "Lowongan berhasil disimpan";
			$this->session->set_flashdata('success',$messages);
			redirect('administrasi/lowongan');				
		}else{
			$messages = "Lowongan gagal disimpan";
			$this->session->set_flashdata('error',$messages);
			redirect('administrasi/lowongan');
		}
	}

	public function lowongan_edit(){

		$id= $this->input->post("id");
		$lowongan=
		[
		"nama" => $this->input->post("nama"),
		"berakhir" => $this->input->post("berakhir"),
		"deskripsi" => $this->input->post("deskripsi"),
		"kode_lowongan" => $this->input->post("kode_lowongan")
		];

		$this->db->where('id',$id);

		if($this->db->update("lowongan",$lowongan)){
			$messages = "Lowongan berhasil edit";
			$this->session->set_flashdata('success',$messages);
			redirect('administrasi/lowongan');				
		}else{
			$messages = "Lowongan gagal edit";
			$this->session->set_flashdata('error',$messages);
			redirect('administrasi/lowongan');
		}

	}

	public function lowongan_hapus($id){
		$this->db->where('id', $id);
		
		
		if($this->db->delete('lowongan')){
			$messages = "Lowongan berhasil dihapus";
			$this->session->set_flashdata('success',$messages);
			redirect('administrasi/lowongan');				
		}else{
			$messages = "Lowongan gagal dihapus";
			$this->session->set_flashdata('error',$messages);
			redirect('administrasi/lowongan');
		}
	}
	/* Form Lowongan --------------------------------*/


	

	


}