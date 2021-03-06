<?php 

$view = 'procurement/proses_pengadaan/pembuatan_permintaan_pengadaan_v';

$position = $this->Administration_m->getPosition("PIC USER");

if(!$position){
	$this->noAccess("Hanya PIC USER yang dapat membuat permintaan pengadaan");
}

$data['pos'] = $position;

$this->data['dir'] = PROCUREMENT_PERMINTAAN_PENGADAAN_FOLDER;

$activity = $this->Procedure_m->getActivity(1000)->row_array();

// $project_cost = $this->Procpr_m->getProjectCost($pr_number)->result_array();

// $data['project_cost'] = $project_cost;

$data['content'] = $this->Workflow_m->getContentByActivity(1000)->result_array();

// /$data['del_point_list'] = $this->Administration_m->getDelPoint()->result_array();
$data['district_list'] = $this->Administration_m->getDistrict()->result_array();
$data['del_point_list'] = $this->Administration_m->get_divisi_departemen()->result_array();
$data['contract_type'] = array("LUMPSUM"=>"LUMPSUM");
$data['workflow_list'] = $this->Procedure_m->getResponseList($activity['awa_id']);
$data['pr_type'] = array("KONSOLIDASI" => "KONSOLIDASI", "NON KONSOLIDASI" => "NON KONSOLIDASI"); //y tipe pr

$this->db->limit(1);
$permintaan = $this->Procpr_m->getPR()->row_array();

if(!empty($permintaan)){
foreach ($permintaan as $key => $value) {
	$permintaan[$key] = null;
}
}

$data['permintaan'] = $permintaan;
 $this->session->unset_userdata("code_group");

$this->template($view,$activity['awa_name'],$data);
//$this->template($view,$activity['awa_name']." (".$activity['awa_id'].")",$data);