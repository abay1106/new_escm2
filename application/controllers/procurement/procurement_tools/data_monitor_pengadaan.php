<?php

$get = $this->input->get();

$userdata = $this->data['userdata'];

$filtering = $this->uri->segment(3, 0);

$deptuser = $userdata['dept_name'];

$id = (isset($get['id']) && !empty($get['id'])) ? $get['id'] : "";
$order = (isset($get['order']) && !empty($get['order'])) ? $get['order'] : "";
$limit = (isset($get['limit']) && !empty($get['limit'])) ? $get['limit'] : 10;
$search = (isset($get['search']) && !empty($get['search'])) ? $this->db->escape_like_str(strtolower($get['search'])) : "";
$offset = (isset($get['offset']) && !empty($get['offset'])) ? $get['offset'] : 0;
$field_order = (isset($get['sort']) && !empty($get['sort'])) ? $get['sort'] : "ptm_number";

if(!empty($search)){
  $this->db->group_start();
  $this->db->like("LOWER(ptm_number)",$search);
  $this->db->or_like("LOWER(ptm_subject_of_work)",$search);
  $this->db->or_like("LOWER(ptm_requester_name)",$search);
  $this->db->or_like("LOWER(ptm_scope_of_work)",$search);
  $this->db->or_like("LOWER(ptm_requester_pos_name)",$search);
  $this->db->or_like("LOWER(ptm_packet)",$search);
  $this->db->or_like("LOWER(status)",$search);
  $this->db->or_like("LOWER(jenis_pengadaan)",$search);
  $this->db->or_like("LOWER(last_pos)",$search);
  $this->db->group_end();
}

if($userdata['job_title'] == 'PIC USER'){
  $this->db->group_start();
  $this->db->where("ptm_dept_id",$userdata['dept_id']);
  $this->db->or_like('ptm_dept', $deptuser);
  $this->db->group_end();
}


/*
$getfinishstate = $this->db->select("awa_id")->where("awa_finish",1)->get("adm_wkf_activity")->result_array();

$statuslist = array();

foreach ($getfinishstate as $key => $value) {
  $statuslist[] = $value['awa_id'];
}
*/

// $statuslist = array(1060, 1070, 1071, 1080, 1081, 1113, 1114,1090,1115);

if(!empty($filtering) && $filtering == "active"){
  $this->db->where("last_status !=", 1902);
} elseif(!empty($filtering) && $filtering == "rfq_ongoing"){
  $this->db->where('last_status <', 1180);
} elseif(!empty($filtering) && $filtering == "rfq_selesai"){
  $this->db->group_start();
  $this->db->where('last_status', 1901);
  $this->db->where('last_status <', 1902);
  $this->db->group_end();
} else{
  $this->db->where("last_status !=",null,false);
}

if ($userdata['job_title'] == 'ADMIN' || $userdata['pos_name'] == 'GM SCM Strategis' || $userdata['pos_name'] == 'Kepala Divisi SCM' || $userdata['dept_name'] == 'SCM' && $userdata['dept_name'] == 'DIVISI SUPPLY CHAIN MANAGEMENT' || preg_match('/(DIREKTUR)/i', $userdata['job_title'])) {
    
}else{

  $this->db->group_start();
  if($userdata['pos_name'] == 'Manajer Sub Dept. Infrastruktur 1'){
	$ar = array('28','54','48');
	$this->db->where_in('ptm_dept_id', $ar); 
  }else{
  $this->db->where('ptm_dept_id', $userdata['dept_id']);
  $this->db->or_like('ptm_dept', $deptuser);
  }
  $this->db->group_end();

}

$this->db->select("ptm_number");

$data['total'] = $this->Procrfq_m->getMonitorRFQ($id)->num_rows();

if($userdata['job_title'] == 'PIC USER'){
  $this->db->group_start();
  $this->db->where("ptm_dept_id",$userdata['dept_id']);
      $this->db->or_like('ptm_dept', $deptuser);
      $this->db->group_end();
}

if(!empty($filtering) && $filtering == "active"){
  $this->db->where("last_status !=", 1902);
} elseif(!empty($filtering) && $filtering == "rfq_ongoing"){
  $this->db->where('last_status <', 1180);
} elseif(!empty($filtering) && $filtering == "rfq_selesai"){
  $this->db->where('last_status <', 1902);
} else{
  $this->db->where("last_status !=",null,false);
}

if ($userdata['job_title'] == 'ADMIN' || $userdata['pos_name'] == 'GM SCM Strategis' || $userdata['pos_name'] == 'Kepala Divisi SCM' || $userdata['dept_name'] == 'SCM' && $userdata['dept_name'] == 'DIVISI SUPPLY CHAIN MANAGEMENT' || preg_match('/(DIREKTUR)/i', $userdata['job_title'])) {
    
}else{

   $this->db->group_start();
  if($userdata['pos_name'] == 'Manajer Sub Dept. Infrastruktur 1'){
	$ar = array('28','54','48');
	$this->db->where_in('ptm_dept_id', $ar); 
  }else{
  $this->db->where('ptm_dept_id', $userdata['dept_id']);
  $this->db->or_like('ptm_dept', $deptuser);
  }
  $this->db->group_end();

}

if(!empty($search)){
  $this->db->group_start();
  $this->db->like("LOWER(ptm_number)",$search);
  $this->db->or_like("LOWER(ptm_subject_of_work)",$search);
  $this->db->or_like("LOWER(ptm_requester_name)",$search);
  $this->db->or_like("LOWER(ptm_scope_of_work)",$search);
  $this->db->or_like("LOWER(ptm_requester_pos_name)",$search);
  $this->db->or_like("LOWER(ptm_packet)",$search);
  $this->db->or_like("LOWER(status)",$search);
  $this->db->or_like("LOWER(jenis_pengadaan)",$search);
  $this->db->or_like("LOWER(last_pos)",$search);
  $this->db->group_end();
}
if(!empty($order)){
  $this->db->order_by($field_order,$order);
}

if(!empty($limit)){
  $this->db->limit($limit,$offset);
}

//$this->db->select("ptm_number,ptm_requester_name,ptm_subject_of_work,ptm_requester_pos_name,status,ptm_mata_anggaran,ptm_nama_mata_anggaran,ptm_sub_mata_anggaran,ptm_nama_sub_mata_anggaran");

$this->db->where("ptm_status !=",null,false);

$rows = $this->Procrfq_m->getMonitorRFQ($id)->result_array();

foreach ($rows as $key => $value) {
  $rows[$key]['mata_anggaran'] = $rows[$key]['ptm_mata_anggaran']." - ".$rows[$key]['ptm_nama_mata_anggaran'];
  $rows[$key]['sub_mata_anggaran'] = $rows[$key]['ptm_sub_mata_anggaran']." - ".$value['ptm_nama_sub_mata_anggaran'];
}

$data['rows'] = $rows;
// echo $this->db->last_query();
$this->output->set_content_type('application/json')->set_output(json_encode($data));