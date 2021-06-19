<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('Mod_driver','mDriver');
				
		if($this->session->userdata('logged_in') == FALSE){
			redirect("login");
		}
	}

	public function index()
	{
		$data = array(			
			'breadcrumb' => 'Driver'
		);
		$res = $this->mDriver->get();


		$data['page'] = $this->load->view('page/pengemudi/list',array('data_driver'=>$res),true);
		$this->parser->parse('template/layout_admin',$data);				        
	}

		public function tambah()
	{
		$data = array(			
			'breadcrumb' => 'Driver / Tambah',
	        'dropdown_master' => ''
		);
		$data['page'] = $this->load->view('page/pengemudi/form',array(),true);
		$this->parser->parse('template/layout_admin',$data);	
	}

	public function doSimpan()
	{
		$flat_no = $this->input->post('txtFlatNo');
		$jk = $this->input->post('txtJK');
		$driver = $this->input->post('txtNamaDriver');

		$data = array(
			'flat_no'=>$flat_no,
			'jenis_kendaraan'=>$jk,
			'nama_driver'=>$driver
		);

		$res = $this->mDriver->simpan($data);

		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', 'Alhamdulillah...');
			redirect('driver');
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
		$res = $this->mDriver->hapus($id);
		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', 'Alhamdulillah... Hapus data berhasil');
			redirect('driver');
		}else{
			echo "gagal";
		}
	}

}
