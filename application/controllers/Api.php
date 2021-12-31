<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'libraries/REST_Controller.php');

class Api extends REST_Controller {

	public function __construct($config = 'rest'){

    // Call the Model constructor
		parent::__construct($config);

		$this->load->model(array("Procedure2_m","Procedure3_m","Contract_m","Procrfq_m","Administration_m","Comment_m","Administration_m","Workflow_m","Addendum_m","Procplan_m","Procpr_m"));

	}

	public function data_po_pmcs_get(){
	   include('api/data_po_pmcs.php');
	}

    public function data_bapb_pmcs_get(){
       include('api/data_bapb_pmcs.php');
    }

    public function data_baop_pmcs_get(){
       include('api/data_baop_pmcs.php');
    }

    public function data_invoice_pmcs_get(){
       include('api/data_invoice_pmcs.php');
    }

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */