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
		$data['pelamar']=$this->db->query("SELECT count(*) as total FROM peserta")->row();
		$data['lowongan']=$this->db->query("SELECT count(*) as total FROM lowongan")->row();
		
		$data['output'] = $this->load->view('adm/beranda',$data,true);
		
		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"dashboard"=>site_url("administrasi/index")
		];
		
		$data['breadcrumb'] = breadcrumb($breadcrumb);
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

		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"kriteria"=>site_url("administrasi/kriteria")
		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);
		$this->load->view('layout/layout_backend',$data);

	}

	public function tambah_kriteria(){
		$data['parent_kriteria'] = $this->db->query("SELECT * FROM kriteria where parent_kriteria is NULL")->result();
		$data['output'] 	= 	$this->load->view("adm/kriteria/add",$data,true);
		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"kriteria"=>site_url("administrasi/kriteria"),
			"tambah"=>site_url("administrasi/tambah_kriteria"),
		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);
		$this->load->view('layout/layout_backend',$data);		
	}

	public function edit_kriteria($kode){
		$id = $this->db->query("SELECT id_kriteria FROM kriteria WHERE kode_kriteria='$kode' LIMIT 1")->row();
		$id =$id->id_kriteria;

		$data['kriteria']   = 	$this->db->query("SELECT * FROM kriteria where kode_kriteria = '$kode' or id_kriteria = '$kode' limit 1")->row();			
		$data['parent_kriteria'] = $this->db->query("SELECT * FROM kriteria where parent_kriteria is NULL")->result();
		$data['output'] 	= 	$this->load->view("adm/kriteria/add",$data,true);
		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"kriteria"=>site_url("administrasi/kriteria"),
			"edit"=>site_url("administrasi/edit_kriteria"),
		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);

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

		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"kriteria"=>site_url("administrasi/kriteria"),
			"lihat"=>site_url("administrasi/lihat_kriteria"),
		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);

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
		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"kriteria"=>site_url("administrasi/kriteria"),
			"Perbandingan berpasangan"=>site_url("administrasi/pair_comparison"),
		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);

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

		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"prioritas"=>site_url("administrasi/prioritas"),
			
		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);
		$this->load->view('layout/layout_backend',$data);
	}



	/*  Form Lowongan --------------------------------*/

	public function lowongan(){

		$this->load->library('parser');
		
		$data['lowongan']	=	$this->db->query("SELECT * FROM lowongan Order By id Desc")->result();
		$data['output'] 	= 	$this->load->view("adm/lowongan/list",$data,true);
		$data['skript']		=	$this->parser->parse('adm/lowongan/lowongan_script.js',array(),true);
		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"lowongan"=>site_url("administrasi/lowongan"),
		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);
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
	public function nilai($id_lowongan){
		$data['id_lowongan']=$id_lowongan;
		$data['peserta']	=	$this->db->query("SELECT peserta.nama_peserta, peserta.no_peserta, alternatif.nilai_ahp,peserta.tgl_lahir, alternatif.id FROM peserta,alternatif WHERE peserta.no_peserta = alternatif.no_peserta AND alternatif.id_lowongan = '".$id_lowongan."' ORDER BY nilai_ahp DESC")->result();
		$data['output'] 	= 	$this->load->view("adm/lowongan/nilai",$data,true);
		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"lowongan"=>site_url("administrasi/lowongan"),
			"alternatif dan hasil"=>site_url("administrasi/nilai"),
		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);
		$this->load->view('layout/layout_backend',$data);
	}

	public function tambah_nilai($id_lowongan){
		
		$this->load->library('parser');

		$alt = $this->db->query("SELECT no_peserta from alternatif WHERE id_lowongan = '".$id_lowongan."'")->result();
		$pesertaAlt=array();
		foreach ($alt as $value) {
			array_push($pesertaAlt, $value->no_peserta);
		}

		$peserta=array();
		$p = $this->db->query("SELECT peserta.nama_peserta, peserta.no_peserta, peserta.tgl_lahir FROM peserta,peserta_lowongan WHERE peserta.no_peserta = peserta_lowongan.no_peserta  AND peserta_lowongan.id_lowongan = '".$id_lowongan."'")->result();
		foreach ($p as $pa) {
			if(!in_array($pa->no_peserta, $pesertaAlt)){
				array_push($peserta, $pa);
			}
		}

		$data['id_lowongan']=	$id_lowongan;
		$data['peserta'] 	= 	$peserta;
		$data['output'] 	= 	$this->load->view("adm/lowongan/tambah_nilai",$data,true);
		$data['skript']		=	$this->parser->parse('adm/lowongan/tambah_nilai_script.js',array(),true);
		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"lowongan"=>site_url("administrasi/lowongan"),
			"alternatif dan hasil"=>site_url("administrasi/nilai/".$id_lowongan),
			"tambah alternatif"=>site_url("administrasi/tambah_nilai"),

		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);
		$this->load->view('layout/layout_backend',$data);		
	}

	public function hitung_alt($id_lowongan){
		$np = explode("-",$this->input->post('no_peserta'));
		$no_peserta = trim($np[0]);
		$nilai_psikotes = $this->input->post('psikotes');
		$ketekunan = $this->input->post("ketekunan");

		$data_wawancara = $this->input->post();
		unset($data_wawancara['psikotes']);
		unset($data_wawancara['no_peserta']);
		unset($data_wawancara['ketekunan']);
		
		$this->load->library('Wawancara','','wawancara');
		$this->load->library('Ipk','','ipk');
		$this->load->library('Pendidikan','','pendidikan');
		$this->load->library('IdentitasDiri','','identitasDiri');
		$this->load->library('Psikotes','','psikotes');

		$this->db->trans_start();
		$data['k1'] 		= $this->ipk->make($no_peserta);
		$data['k2'] 		= $this->pendidikan->make($no_peserta);
		$data['k5'] 		= $this->wawancara->make($data_wawancara,$no_peserta,$id_lowongan);
		$data['k4'] 		= $this->psikotes->make($nilai_psikotes,$no_peserta,$id_lowongan);
		$data['k3'] 		= $this->identitasDiri->make($no_peserta,$ketekunan); 
		$this->db->trans_complete();

		
		$this->load->library('Ahp','','ahp');
		if($this->ahp->simpan($data,$id_lowongan,$no_peserta)){
			$messages = "Alternatif berhasil disimpan";
			$this->session->set_flashdata('success',$messages);
			redirect('administrasi/nilai/'.$id_lowongan);				
		}else{
			$messages = "Terjadi kesalahan";
			$this->session->set_flashdata('error',$messages);
			redirect('administrasi/nilai/'.$id_lowongan);
		}
	}

	public function alternatif_hapus($id,$id_lowongan){
		 if($this->db->where("id",$id)->delete("alternatif")){
			$messages = "Alternatif berhasil dihapus";
			$this->session->set_flashdata('success',$messages);
			redirect('administrasi/nilai/'.$id_lowongan);				
		}else{
			$messages = "Terjadi kesalahan";
			$this->session->set_flashdata('error',$messages);
			redirect('administrasi/nilai/'.$id_lowongan);
		}
	}

	public function alternatif_edit($id,$id_lowongan){
		$data['peserta']= $this->db->query("SELECT peserta.nama_peserta, peserta.no_peserta, alternatif.*,peserta.ketekunan,psikotes.nilai as psikotes, pendukung_wawancara.* FROM peserta,alternatif,psikotes,pendukung_wawancara Where alternatif.id='".$id."' AND peserta.no_peserta = alternatif.no_peserta and psikotes.no_peserta = alternatif.no_peserta AND pendukung_wawancara.no_peserta = alternatif.no_peserta AND pendukung_wawancara.id_lowongan = alternatif.id_lowongan")->row();

		$data['id_lowongan']=	$id_lowongan;
		
		$data['output'] 	= 	$this->load->view("adm/lowongan/edit_nilai",$data,true);
		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"lowongan"=>site_url("administrasi/lowongan"),
			"alternatif dan hasil"=>site_url("administrasi/nilai/".$id_lowongan),
			"edit alternatif"=>site_url("administrasi/alternatif_edit"),

		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);
		$this->load->view('layout/layout_backend',$data);		

	}

	public function cetak_hasil ($id_lowongan){
		$data['id_lowongan']=$id_lowongan;
		$data['lowongan']=$this->db->query("SELECT * FROM lowongan where id = '".$id_lowongan."'")->row();
		$data['peserta']	=	$this->db->query("SELECT peserta.nama_peserta, peserta.no_peserta, alternatif.nilai_ahp,peserta.tgl_lahir, alternatif.id FROM peserta,alternatif WHERE peserta.no_peserta = alternatif.no_peserta AND alternatif.id_lowongan = '".$id_lowongan."' ORDER BY nilai_ahp DESC")->result();
		$this->load->view("adm/lowongan/cetak_hasil",$data);
			
	}

	public function pelamar($id_lowongan){
		$data['id_lowongan']=$id_lowongan;
		$data['peserta']	=	$this->db->query("SELECT peserta.nama_peserta,peserta.no_peserta,peserta.tgl_lahir FROM peserta,peserta_lowongan WHERE peserta_lowongan.id_lowongan = '".$id_lowongan."' AND peserta.no_peserta = peserta_lowongan.no_peserta")->result();
		$data['output'] 	= 	$this->load->view("adm/lowongan/pelamar",$data,true);
		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"lowongan"=>site_url("administrasi/lowongan"),
			"pelamar"=>site_url("administrasi/pelamar"),
		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);
		$this->load->view('layout/layout_backend',$data);
	}

	public function cetak_pelamar($id_lowongan){
		$data['id_lowongan']=$id_lowongan;
		$data['lowongan']=$this->db->query("SELECT * FROM lowongan where id = '".$id_lowongan."'")->row();
	$data['peserta']	=	$this->db->query("SELECT peserta.nama_peserta,peserta.no_peserta,peserta.tgl_lahir FROM peserta,peserta_lowongan WHERE peserta_lowongan.id_lowongan = '".$id_lowongan."' AND peserta.no_peserta = peserta_lowongan.no_peserta")->result();
	$this->load->view("adm/lowongan/cetak_pelamar",$data);
		
	}

	public function detail_pelamar($no_peserta,$id_lowongan){
		$data['id_lowongan']=$id_lowongan;
		$data['peserta']	=	$this->db->query("SELECT peserta.*, pendidikan.* FROM peserta,pendidikan WHERE peserta.no_peserta = '".$no_peserta."' and pendidikan.no_peserta = peserta.no_peserta")->row();
		$data['output'] 	= 	$this->load->view("adm/lowongan/detail_pelamar",$data,true);
		$breadcrumb=[
			"home"=>site_url("administrasi/index"),
			"lowongan"=>site_url("administrasi/lowongan"),
			"pelamar"=>site_url("administrasi/pelamar/".$id_lowongan),
			"detail pelamar"=>"aa"
		];
		$data['breadcrumb'] = breadcrumb($breadcrumb);
		$this->load->view('layout/layout_backend',$data);

	}

	public function cetak_detail_pelamar($no_peserta){
	$data['peserta']	=	$this->db->query("SELECT peserta.*, pendidikan.* FROM peserta,pendidikan WHERE peserta.no_peserta = '".$no_peserta."' and pendidikan.no_peserta = peserta.no_peserta")->row();
	$this->load->view("adm/lowongan/cetak_detail_pelamar",$data);
		
	}

}