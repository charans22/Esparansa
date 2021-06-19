<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('parser');
		$this->load->library('form_validation');
		$this->load->model('Mod_vehicle','mVehicle');
		
		if($this->session->userdata('logged_in') == FALSE){
			redirect("login");
		}
	}

	public function index()
	{
		$data = array(			
			'breadcrumb' => 'Vehicle'
		);
		$res = $this->mVehicle->get();
		
		$data['page'] = $this->load->view('page/kendaraan/list',array('data_vehicle'=>$res),true);
		$this->parser->parse('template/layout_admin',$data);				        
	}

	public function tambah()
	{
		$data = array(			
			'breadcrumb' => 'Vehicle / Tambah',
	        'dropdown_master' => ''
		);
		$data['page'] = $this->load->view('page/kendaraan/form',array(),true);
		$this->parser->parse('template/layout_admin',$data);	
	}

	public function doSimpan()
	{
		$this->form_validation->set_rules('txtFlatNo', 'Flat Nomor', 'required');
		$this->form_validation->set_rules('txtJK', 'Jenis Kendaraan', 'required');
		$this->form_validation->set_rules('txtNoMesin', 'Nomor Mesin', 'required');

		if ($this->form_validation->run() == TRUE){
			$flat_no = $this->input->post('txtFlatNo');
			$jk = $this->input->post('txtJK');
			$no_mesin = $this->input->post('txtNoMesin');

			$data = array(
				'flat_no'=>$flat_no,
				'jenis_kendaraan'=>$jk,
				'nomor_mesin'=>$no_mesin
			);

			$res = $this->mVehicle->simpan($data);

			if ($res > 0) {
				$this->session->set_flashdata('alert_true', 'collapse');
				$this->session->set_flashdata('message', 'Alhamdulillah...');
				redirect('vehicle');
			}else{
				echo "Teu Eucreug";
			}			
		}else{
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', validation_errors());
			redirect('vehicle/tambah');
		}

	}

	public function edit($id)
	{
		$res = $this->mVehicle->detail($id);
		$data = array(			
			'breadcrumb' => 'Vehicle / Edit',
	        'dropdown_master' => ''
		);
		$data['page'] = $this->load->view('page/kendaraan/form',array('data_detail'=>$res),true);
		$this->parser->parse('template/layout_admin',$data);
	}

	public function doUpdate($id)
	{
		$this->form_validation->set_rules('txtFlatNo', 'Flat Nomor', 'required');
		$this->form_validation->set_rules('txtJK', 'Jenis Kendaraan', 'required');
		$this->form_validation->set_rules('txtNoMesin', 'Nomor Mesin', 'required');

		if ($this->form_validation->run() == TRUE){
			$flat_no = $this->input->post('txtFlatNo');
			$jk = $this->input->post('txtJK');
			$no_mesin = $this->input->post('txtNoMesin');

			$data = array(
				'flat_no'=>$flat_no,
				'jenis_kendaraan'=>$jk,
				'nomor_mesin'=>$no_mesin
			);

			$res = $this->mVehicle->update($id,$data);

			if ($res > 0) {
				$this->session->set_flashdata('alert_true', 'collapse');
				$this->session->set_flashdata('message', 'Alhamdulillah...');
				redirect('vehicle');
			}else{
				echo "Teu Eucreug";
			}
		}else{
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', validation_errors());
			redirect('vehicle/edit/'.$id);
		}
	}

	public function doHapus($id)
	{
		$res = $this->mVehicle->hapus($id);
		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', 'Alhamdulillah... Hapus data berhasil');
			redirect('vehicle');
		}else{
			echo "gagal";
		}
	}

}
