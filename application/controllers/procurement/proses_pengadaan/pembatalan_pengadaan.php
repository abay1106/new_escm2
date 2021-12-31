<?php 

$post = $this->input->post();

$view = 'procurement/proses_pengadaan/pembatalan_pengadaan_v';

$ptm_number =  $this->uri->segment(3, 0);

$data['id'] = $ptm_number;


$this->data['dir'] = PROCUREMENT_PERMINTAAN_PENGADAAN_FOLDER;

$data['del_point_list'] = $this->Administration_m->getDelPoint()->result_array();
$data['district_list'] = $this->Administration_m->getDistrict()->result_array();
$data['contract_type'] = array("LUMPSUM"=>"LUMPSUM","HARGA SATUAN"=>"HARGA SATUAN","RENTAL SERVICE"=>"RENTAL SERVICE");

$tender = $this->Procrfq_m->getMonitorRFQ($ptm_number)->row_array();

$this->db->where("job_title","PELAKSANA PENGADAAN");

$data['pelaksana_pengadaan'] = $this->Administration_m->getUserRule()->result_array();

$data['permintaan'] = $tender;

$activity_id = $tender['last_status'];

$data['activity_id'] = $activity_id;

$activity = $this->Procedure_m->getActivity($tender['ptm_status'])->row_array();

if($activity['awa_finish'] == 1){

	echo "<center><h1>Pengadaan tidak dapat dibatalkan</h1></center>";

} else {

$data['content'] = $this->Workflow_m->getContentByActivity($activity_id)->result_array();

$data['workflow_list'] = $this->Procedure_m->getResponseList($activity['awa_id']);

$data["comment_list"][0] = $this->Comment_m->getProcurementRFQActive($ptm_number)->result_array();

$data['document'] = $this->Procrfq_m->getDokumenRFQ("",$ptm_number)->result_array();

$data['item'] = $this->Procrfq_m->getItemRFQ("",$ptm_number)->result_array();

$data['prep'] = $this->Procrfq_m->getPrepRFQ($ptm_number)->row_array();

if(isset($data['prep']['adm_bid_committee'])){
	$this->session->set_userdata("committee_id",$data['prep']['adm_bid_committee']);
}


$vnd = $this->Procrfq_m->getVendorQuoMainRFQ("",$ptm_number)->result_array();
$temp = array();
foreach ($vnd as $key => $value) {
  $temp[$value['vendor_id']] = $value;
}
  
$this->db->where("a.active", "Aktif");
$data['mdiv'] = $this->Administration_m->getMasterMdiv()->result_array();

$data['mppp'] = $this->Administration_m->getPosbyJob("MANAJER PERENCANAAN")->result_array();

$data['hps'] = $this->Procrfq_m->getHPSRFQ($ptm_number)->row_array();

$data['vendor'] = $this->Procrfq_m->getVendorQuoMainRFQ("",$ptm_number)->result_array();

$data['bidder_msg'] = $this->Procrfq_m->getMessageRFQ($ptm_number)->result_array();

$data['evaluation'] = $this->Procrfq_m->getEvalViewRFQ("",$ptm_number)->result_array();

$data['penata_perencana'] = $this->Administration_m->getUserByJob("PENATA PERENCANAAN")->result_array();


$data['metode'] = array(0=>"Penunjukkan Langsung",1=>"Pemilihan Langsung",2=>"Pelelangan",3=>"Pembelian Langsung");

$data['sampul'] = array(0=>"1 Sampul",1=>"2 Sampul",2=>"2 Tahap");

$vnd = $this->Procrfq_m->getVendorRFQ("",$ptm_number)->result_array();

$vendor = array();

$data['eauction_header'] = $this->db->where("ppm_id",$ptm_number)->order_by("id","desc")->get("prc_eauction_header")->result_array();

$data['eauction_hist'] = [];

$data['eauction_item'] = [];

if(in_array($activity_id, [1100,1120]) || $activity_id > 1100){

  $eauction_item = $this->db
  ->select("b.vendor_id,vendor_name,a.tgl_bid,a.jumlah_bid,a.qty_bid,a.ppm_id,f.judul,a.id,tit_description,tit_quantity,tit_price,tit_code,history_id")
  ->distinct()
  ->where("a.ppm_id",$ptm_number)
  ->join("vnd_header b","b.vendor_id=a.vendor_id")
  ->join("prc_eauction_header f","f.ppm_id=a.ppm_id")
  //->join("prc_eauction_history c","c.vendor_id=a.vendor_id AND c.ppm_id =a.ppm_id")
  ->join("prc_tender_item d","d.tit_id=a.tit_id AND d.ptm_number=f.ppm_id")
  ->order_by("a.tgl_bid","asc")
  ->get("prc_eauction_history_item a")
  ->result_array();

  $e = [];

  foreach ($eauction_item as $key => $value) {
    $e[$value['vendor_id']."-".$value['vendor_name']][$value['history_id']][] = $value;
  }

  $data['eauction_item'] = $e;

  $eauction_hist = $this->db
  ->where("a.ppm_id",$ptm_number)
  ->get("prc_eauction_history a")
  ->result_array();

  $e = [];

  foreach ($eauction_hist as $key => $value) {
    $e[$value['id']] = $value;
  }

  $data['eauction_hist'] = $e;

}
foreach ($vnd as $key => $value) {
	$vendor[] = $value['ptv_vendor_code'];
}

$data['vendor_status'] = $vnd;

$data['vendor_aanwijzing'] = array();
$data['user_aanwijzing'] = array();
$userdata = $this->data['userdata'];

if(!empty($vendor)){

  $this->load->model("Vendor_m");

  $this->db
  ->select("vendor_id,vendor_name")
  ->distinct()
  ->where_in("(status)::integer",array(5,9))
  ->where("pvs_status >",0)
  ->where_in("vendor_id",$vendor)
  ->join("prc_tender_vendor_status","pvs_vendor_code=vendor_id","left")
  ->join("z_bidder_status","lkp_id=pvs_status","left"); 

    $vendor_aanwijzing = $this->Vendor_m->getBidderList()->result_array();

    $data['vendor_aanwijzing'] = $vendor_aanwijzing;

  foreach ($vendor_aanwijzing as $key => $value) {
    $data['user_aanwijzing'][$value['vendor_name']] = "Offline";
  }

  $this->session->set_userdata("selection_vendor_tender",$vendor);

}

$status_aanwijzing = $this->db->where(array(
  "key_ac"=>"0-".$ptm_number,
  ))->order_by("datetime_ac","asc")->get("adm_chat")
->result_array();


foreach ($status_aanwijzing as $key => $value) {
  $data['user_aanwijzing'][$value['name_ac']] = (!empty($value['message_ac'])) ? $value['message_ac'] : "Offline";
}

$nama_user = $userdata['complete_name'];
if(!isset($data['user_aanwijzing'][$nama_user])){
  $data['user_aanwijzing'][$nama_user] = "Offline";
}


$data['chat_aanwijzing'] = $this->db->where("key_ac","1-".$ptm_number)->get("adm_chat")
->result_array();
$data['chat_eauction'] = $this->db->where("key_ac","2-".$ptm_number)->get("adm_chat")
->result_array();


$data['dir'] = PROCUREMENT_PERMINTAAN_PENGADAAN_FOLDER;

$data['controller_name'] = "procurement";



$this->session->set_userdata("uri_string",uri_string());

$this->session->set_userdata("selection_vendor_tender",$vendor);

$this->session->set_userdata("rfq_id",$ptm_number);

//haqim

$vnd = $this->Procrfq_m->getVendorStatusRFQ("",$ptm_number)->result_array(); // vendor yang ikut

$this->session->unset_userdata("selection_vendor_tender");

$vendor = array();

foreach ($vnd as $key => $value) {
  if($value['pvs_status'] > 0){
   $vendor[] = $value['pvs_vendor_code'];
 } else {
  unset($temp[$value['pvs_vendor_code']]);
}
}

$data['vendor_status'] = $vnd;
// $data['vendor'] = $temp;
$data['vendor_aanwijzing'] = array();
$data['user_aanwijzing'] = array();
$userdata = $this->data['userdata'];

if(!empty($vendor)){

  $this->load->model("Vendor_m");

  $this->db
  ->select("vendor_id,vendor_name")
  ->distinct()
  ->where_in("(status)::integer",array(5,9))
  //->where("pvs_status",2)
  ->where_in("vendor_id",$vendor)
  ->join("prc_tender_vendor_status","pvs_vendor_code=vendor_id","left")
  ->join("z_bidder_status","lkp_id=pvs_status","left"); 

  $vendor_aanwijzing = $this->Vendor_m->getBidderList()->result_array();

  $data['vendor_aanwijzing'] = $vendor_aanwijzing;

  foreach ($vendor_aanwijzing as $key => $value) {
    $data['user_aanwijzing'][$value['vendor_name']] = "Offline";
  }

  $this->session->set_userdata("selection_vendor_tender",$vendor);

}

$status_aanwijzing = $this->db->where(array(
  "key_ac"=>"0-".$ptm_number,
  ))->order_by("datetime_ac","asc")->get("adm_chat")
->result_array();

foreach ($status_aanwijzing as $key => $value) {
  $data['user_aanwijzing'][$value['name_ac']] = (!empty($value['message_ac'])) ? $value['message_ac'] : "Offline";
}

$nama_user = $userdata['complete_name'];
if(!isset($data['user_aanwijzing'][$nama_user])){
  $data['user_aanwijzing'][$nama_user] = "Offline";
}

$data['userdata'] = $userdata;
$data['chat_aanwijzing'] = $this->db->where("key_ac","1-".$ptm_number)->get("adm_chat")
->result_array();
$data['chat_eauction'] = $this->db->where("key_ac","2-".$ptm_number)->get("adm_chat")
->result_array();

//end



$this->load->view($view,$data);

}