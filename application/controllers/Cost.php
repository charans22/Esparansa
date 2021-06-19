<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cost extends CI_Controller {

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
			'breadcrumb' => 'Cost'
		);
		$res = $this->city();
		
		$data['page'] = $this->load->view('page/cost/form',array("list_city"=>$res),true);
		$this->parser->parse('template/layout_admin',$data);				        
	}

	function city()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 631a182ccc06ef45fb82807fb3b30e64"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$a = json_decode($response,true);
			$a = $a['rajaongkir'];
			$a = $a['results'];
		}

		return $a;
	}

	public function doCek()
	{
		$params = array(
			'origin' => $this->input->post('origin_id'),
			'destination' => $this->input->post('destination_id'),
			'weight' => $this->input->post('txtBerat'),
			'courier' => $this->input->post('txtKurir')
		);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.rajaongkir.com/starter/cost',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => $params,
		  CURLOPT_HTTPHEADER => array(
		    'key: 631a182ccc06ef45fb82807fb3b30e64'
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$response = json_decode($response,true);
			$response = $response['rajaongkir'];
		}

		$data = array(			
			'breadcrumb' => 'Cost / Result'
		);
		
		$data['page'] = $this->load->view('page/cost/result',array("response"=>$response),true);
		$this->parser->parse('template/layout_admin',$data);
	}
}
