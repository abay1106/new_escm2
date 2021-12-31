<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH.'core/Base_Api_Controller.php';
class Sync extends Base_Api_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sync_postgre_model');
	}

	public function departement_get()
	{
        
        $data = $this->sync_postgre_model->get_all_dept_data();
        // $key='dept_id';
        // $result = array(); 
        // $i = 0; 
        // $key_array = array(); 
        
        // foreach($data as $k => $val) { 
        //     if (!in_array($val->$key, $key_array)) { 
        //         $key_array[$i] = $val->$key; 
        //         $result[] = $val; 
        //     } 
        //     $i++; 
        // } 
        if ($data) {
			$this->response([
				'status' => true,
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'No department were found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
    }
    
	public function role_get()
	{
       
		$data = $this->sync_postgre_model->get_all_data_role();
		if ($data) {
			$this->response([
				'status' => true,
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'No role were found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

    
	public function vendor_get()
	{
       
		$data = $this->sync_postgre_model->get_all_vendor_data();
		if ($data) {
			$this->response([
				'status' => true,
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'No vendor were found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
    }
    
	public function kontrak_get()
	{
       
		$data = $this->sync_postgre_model->get_all_data_kontrak();
		if ($data) {
			$this->response([
				'status' => true,
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'No kontrak were found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
    }
    
	public function user_get()
	{
       
		$data = $this->sync_postgre_model->get_all_data_users();
		if ($data) {
			$this->response([
				'status' => true,
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'No user were found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
    }
    
	public function data_lelang_get()
	{
       
		$data = $this->sync_postgre_model->get_all_data_lelang();
		if ($data) {
			$this->response([
				'status' => true,
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'No data lelang were found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
    }
    
	public function amandemen_get()
	{
       
		$data = $this->sync_postgre_model->get_all_data_amandemen();
		if ($data) {
			$this->response([
				'status' => true,
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'No amandemen were found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
    }
    
	public function project_get()
	{
       
		$data = $this->sync_postgre_model->get_all_data_project();
		if ($data) {
			$this->response([
				'status' => true,
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'No project were found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	
	public function prc_plan_get()
	{
        $page = $this->get('row');
		$data = $this->sync_postgre_model->get_all_data_prc_plan($page);
		$num_row = $this->sync_postgre_model->get_all_data_prc_plan2();
		if ($data) {
			$this->response([
				'status' => true,
				'total' => $num_row-$page,
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'No prc plan were found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function vpi_get()
	{
       
		$data = $this->sync_postgre_model->get_all_data_vpi();
		if ($data) {
			$this->response([
				'status' => true,
				'data' => $data,
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'No vpi were found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}