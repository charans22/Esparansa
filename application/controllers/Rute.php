<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rute extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('Mod_rute','mRute');
				
		if($this->session->userdata('logged_in') == FALSE){
			redirect("login");
		}
	}

	public function index()
	{
		$data = array(			
			'breadcrumb' => 'Rute'
		);
		$res = $this->mRute->get();


		$data['page'] = $this->load->view('page/rute/list',array('data_rute'=>$res),true);
		$this->parser->parse('template/layout_admin',$data);				        
	}

		public function tambah()
	{
		$data = array(			
			'breadcrumb' => 'Rute / Tambah',
	        'dropdown_master' => ''
		);
		$data['page'] = $this->load->view('page/rute/form',array(),true);
		$this->parser->parse('template/layout_admin',$data);	
	}

	public function doSimpan()
	{
		$flat_no = $this->input->post('txtFlatNo');
		$driver = $this->input->post('txtNamaDriver');
		$r = $this->input->post('txtRute');

		$data = array(
			'flat_no'=>$flat_no,
			'nama_driver'=>$driver,
			'rute'=>$r
		);

		$res = $this->mRute->simpan($data);

		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', 'Alhamdulillah...');
			redirect('Rute');
		}else{
			echo "Teu Eucreug";
		}
	}

	public function edit($id)
	{

	}

	public function doUpdate($id)
	{

	}

	public function doHapus($id)
	{
		$res = $this->mRute->hapus($id);
		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', 'Alhamdulillah... Hapus data berhasil');
			redirect('rute');
		}else{
			echo "gagal";
		}
	}

}
