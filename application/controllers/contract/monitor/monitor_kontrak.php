<?php 
$this->session->unset_userdata("contract_id");
$this->session->unset_userdata("ptm_number");

$view = 'contract/monitor/monitor_kontrak_v';
$data = array("act"=>$act);

$siup_type = $this->db->select('siup_type')
->distinct('siup_type')
->get("vnd_header")
->result_array();

$data['siup_type'] = $siup_type;

$ptm_dept_name = $this->db->select('ptm_dept_name')
->distinct('ptm_dept_name')
->get("prc_tender_main")
->result_array();

$data['ptm_dept_name'] = $ptm_dept_name;

$data['contract'] = $this->Contract_m->getMonitor()->result_array();

if(!empty($act)){
	$this->load->view($view,$data);
} else {
	$this->template($view,"Monitor Kontrak",$data);
}
?>