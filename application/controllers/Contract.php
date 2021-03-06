<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contract extends Telescoope_Controller {

	var $data;

	public function __construct(){

        // Call the Model constructor
		parent::__construct();

		$this->load->model(array("Procedure2_m","Procedure3_m","Contract_m","Procrfq_m","Administration_m","Comment_m","Administration_m","Workflow_m","Addendum_m","Procplan_m","Procpr_m"));

    $this->data['date_format'] = "h:i A | d M Y";

    $this->form_validation->set_error_delimiters('<div class="help-block">', '</div>');

    $this->data['data'] = array();

    $this->data['post'] = $this->input->post();

    $userdata = $this->Administration_m->getLogin();

    $this->data['dir'] = 'contract';

    $this->data['controller_name'] = $this->uri->segment(1);

    $dir = './uploads/'.$this->data['dir'];

    $this->session->set_userdata("module",$this->data['dir']);

    if (!file_exists($dir)){
      mkdir($dir, 0777, true);
    }

    $config['allowed_types'] = '*';
    $config['overwrite'] = false;
    $config['max_size'] = 3064;
    $config['upload_path'] = $dir;
    $this->load->library('upload', $config);
		$this->load->model("Global_m");
    $this->data['userdata'] = (!empty($userdata)) ? $userdata : array();

    $selection = array(
      "selection_milestone"
      );
    foreach ($selection as $key => $value) {
      $this->data[$value] = $this->session->userdata($value);
    }

    if(empty($userdata)){
     redirect(site_url('log/in'));
   }

 }

 public function daftar_pekerjaan($param1 = "" ,$param2 = ""){

  switch ($param1) {

    case 'proses_kontrak':
    $this->proses_kontrak();
    break;

    case 'proses_addendum':
    $this->proses_addendum();
    break;

    default:
    include("contract/daftar_pekerjaan/daftar_pekerjaan.php");
    break;

  }

}

public function pembatalan_kontrak($param1 = ""){

  switch ($param1) {

    case 'proses':
    include("contract/proses_kontrak/tool_proses_pembatalan_kontrak.php");
    break;

    default:
    include("contract/proses_kontrak/tool_pembatalan_kontrak.php");
    break;

  }
}

public function proses_pembatalan_kontrak(){
  include("contract/proses_kontrak/proses_pembatalan_kontrak.php");
}

public function submit_pembatalan_kontrak(){
  include("contract/proses_kontrak/submit_pembatalan_kontrak.php");
}

public function monitor_bast(){
  include("contract/monitor/monitor_bast.php");
}

public function picker_progress_wo(){
  include("contract/proses_progress/picker_progress_wo.php");
}

public function picker_progress_wo_matgis(){
  include("contract/proses_progress/picker_progress_wo_matgis.php");
}


public function picker_item_milestone(){
  include("contract/proses_progress/picker_item_milestone.php");
}

public function data_progress_wo(){
  include("contract/proses_progress/data_progress_wo.php");
}
public function data_progress_wo_matgis(){
  include("contract/proses_progress/data_progress_wo_matgis.php");
}

public function lihat_bast(){
  include("contract/work_order/lihat_bast.php");
}

public function monitor_wo(){
  include("contract/monitor/monitor_wo.php");
}
public function monitoring_matgis($param1=""){

//redirect function for matgis monitoring

	switch ($param1) {

    case 'monitor_wo_matgis':
    redirect(site_url('contract_matgis/monitor_matgis/wo'));
    break;

		case 'monitoring_report_monev':
    redirect(site_url('contract_matgis/monitor_matgis/monev'));
    break;

		case 'monitoring_si':
		redirect(site_url('contract_matgis/monitor_matgis/si'));
		break;

		case 'monitor_sppm':
		redirect(site_url('contract_matgis/monitor_matgis/sppm'));
		break;

		case 'monitor_do':
		redirect(site_url('contract_matgis/monitor_matgis/do'));
		break;

		case 'monitor_sj':
		redirect(site_url('contract_matgis/monitor_matgis/sj'));
		break;

		case 'monitor_bapb':
		redirect(site_url('contract_matgis/monitor_matgis/bapb'));
		break;

		case 'monitor_invoice':
		redirect(site_url('contract_matgis/monitor_matgis/invoice'));
		break;



  }
}

public function DeleteFile($file)
{

	$this->load->helper("file");
	$path="uploads/contract/".$file;
	//echo $path;die;
	unlink($path);
	return "success";
}

public function lihat_wo($id = ""){
  include("contract/work_order/lihat_wo.php");
}
public function lihat_wo_matgis($id = ""){
  include("contract/work_order/lihat_wo_matgis.php");
}

public function monitor_progress($act = "",$type = ""){
  include("contract/monitor/monitor_progress.php");
}

public function lihat_progress_wo($id = ""){
  include("contract/proses_progress/lihat_progress_wo.php");
}
public function lihat_progress_wo_matgis($id = ""){
  include("contract/proses_progress/lihat_progress_wo_matgis.php");
}

public function data_monitor_wo(){
  include("contract/monitor/data_monitor_wo.php");
}

public function data_monitor_wo_matgis(){
  include("contract/monitoring_matgis/data_monitor_wo_matgis.php");
}
public function data_wo_matgis_aktif(){
  include("contract/work_order/data_wo_matgis_aktif.php");
}

public function data_item_milestone(){
  include("contract/proses_kontrak/data_item_milestone.php");
}

public function monitor($param1 = "" ,$param2 = "",$param3 = ""){

  switch ($param1) {

   case 'monitor_wo':

   switch ($param2) {
    case 'lihat':
    $this->lihat_wo($param2);
    break;

    default:
    $this->monitor_wo();
    break;
  }

  break;

  case 'monitor_bast':

  switch ($param2) {
    case 'lihat':
    $this->lihat_bast();
    break;

    default:
    $this->monitor_bast();
    break;
  }

  break;

  case 'monitor_progress':

  switch ($param2) {
    case 'lihat':
    $this->lihat_progress();
    break;

    default:
    $this->monitor_progress($param2,$param3);
    break;
  }

  break;

  case 'monitor_kontrak':

  switch ($param2) {
    case 'lihat':
    $this->lihat_kontrak();
    break;

    default:
    $this->monitor_kontrak($param2);
    break;
  }

  break;

  case 'monitor_adendum_kontrak':

  switch ($param2) {
    case 'lihat':
    $this->lihat_addendum();
    break;

    default:
    $this->monitor_addendum();
    break;
  }

  break;

  case 'monitor_tagihan':
  $this->monitor_tagihan();
  break;

  default:

  break;

}

}

public function work_order($param1 = "" ,$param2 = ""){

  switch ($param1) {

    case 'proses_work_order':
    $this->proses_work_order();
    break;

		case 'work_order':
    include("contract/work_order/work_order.php");
    break;

    default:
    include("contract/work_order/work_order.php");
    break;

  }

}
public function work_order_matgis($param1 = ""){

	switch ($param1) {

		case 'task_lists_matgis':
		redirect(site_url('contract_matgis/task_lists'));
		break;

    case 'work_order_matgis':
    redirect(site_url('contract_matgis/create_matgis/po'));
    break;

		case 'skbdn':
		redirect(site_url('contract_matgis/create_matgis/skbdn'));
		break;

		case 'shipping_instruction':
		redirect(site_url('contract_matgis/create_matgis/si'));
		break;

		case 'sppm':
		redirect(site_url('contract_matgis/create_matgis/sppm'));
		break;

		case 'bapb':
		redirect(site_url('contract_matgis/create_matgis/bapb'));
		break;

		case 'monitoring_monev':
		redirect(site_url('contract_matgis/monitor_matgis/monev'));

		case 'monitoring_matgis':
		redirect(site_url('contract_matgis/monitor_matgis/reports'));
		break;


  }

}


public function proses_kontrak(){
  include("contract/proses_kontrak/proses_kontrak.php");
}

public function proses_addendum(){
  include("addendum/proses_addendum/proses_addendum.php");
}

public function submit_proses_kontrak(){
  include("contract/proses_kontrak/submit_proses_kontrak.php");
}

public function data_pekerjaan_adendum(){
  include("contract/daftar_pekerjaan/data_pekerjaan_adendum.php");
}

public function data_pekerjaan_kontrak(){
  include("contract/daftar_pekerjaan/data_pekerjaan_kontrak.php");
}

public function update_milestone(){
  include("contract/proses_kontrak/update_milestone.php");
}

public function data_progress_milestone(){
  include("contract/proses_kontrak/data_progress_milestone.php");
}

public function data_monitor_progress_milestone(){
  include("contract/proses_progress/data_monitor_progress_milestone.php");
}

public function data_progress($type,$id = ""){
  include("contract/proses_progress/data_progress.php");
}


public function lihat_progress_milestone($id = ""){
  include("contract/proses_progress/lihat_progress_milestone.php");
}


public function data_monitor_progress_wo(){
  include("contract/proses_progress/data_monitor_progress_wo.php");
}

public function data_comment_milestone(){
  include("contract/proses_kontrak/data_comment_milestone.php");
}

public function load_progress_milestone(){
  include("contract/proses_kontrak/load_progress_milestone.php");
}

public function save_milestone_progress(){
  include("contract/proses_kontrak/save_milestone_progress.php");
}

public function save_milestone_comment(){
  include("contract/proses_kontrak/save_milestone_comment.php");
}

public function tagihan_milestone(){
  include("contract/proses_kontrak/tagihan_milestone.php");
}

public function data_milestone(){
  include("contract/proses_kontrak/data_milestone.php");
}

public function save_invoice(){
  include("contract/proses_kontrak/save_invoice.php");
}

public function data_tagihan(){
  include("contract/proses_kontrak/data_tagihan.php");
}

public function lihat_tagihan(){
  include("contract/proses_kontrak/lihat_tagihan.php");
}

public function lihat_kontrak(){
  include("contract/monitor/lihat_kontrak.php");
}

public function lihat_addendum(){
  include("addendum/monitor/lihat_addendum.php");
}

public function monitor_tagihan(){
  include("contract/monitor/monitor_tagihan.php");
}

public function monitor_kontrak($act = ""){
  include("contract/monitor/monitor_kontrak.php");
}

public function data_monitor_kontrak($act = ""){
  include("contract/monitor/data_monitor_kontrak.php");
}

public function monitor_addendum(){
  include("addendum/monitor/monitor_addendum.php");
}

public function data_monitor_addendum(){
  include("addendum/monitor/data_monitor_addendum.php");
}

public function data_pekerjaan_wo(){
  include("contract/daftar_pekerjaan/data_pekerjaan_wo.php");
}

public function task_lists_matgis(){
  //include("contract/daftar_pekerjaan/data_pekerjaan_wo_matgis.php");

}

public function create_work_order(){
  include("contract/work_order/work_order.php");
}

public function create_work_order_matgis(){
  include("contract/work_order/work_order_matgis.php");
}



public function data_work_order(){
  include("contract/work_order/data_work_order.php");
}

public function data_work_order_matgis(){
  include("contract/work_order/data_work_order_matgis.php");
}


public function proses_work_order($contract_id = ""){
	include("contract/proses_work_order/proses_work_order.php");
}

public function proses_work_order_matgis($contract_id = ""){
	include("contract/proses_work_order/proses_work_order_matgis.php");
}

public function submit_proses_work_order(){
  include("contract/proses_work_order/submit_proses_work_order.php");
}

public function submit_proses_work_order_matgis(){
  include("contract/proses_work_order/submit_proses_work_order_matgis.php");
}

public function submit_proses_si_matgis(){
  include("contract/proses_work_order/submit_proses_si_matgis.php");
}

public function submit_proses_sppm_matgis(){
  include("contract/proses_work_order/submit_proses_sppm_matgis.php");
}

public function lihat_work_order(){
  include("contract/proses_work_order/lihat_work_order.php");
}

public function proses_wo($id = ""){
  include("contract/proses_work_order/proses_wo.php");
}


public function lihat_work_order_matgis(){
  include("contract/proses_work_order/lihat_work_order_matgis.php");
}

public function proses_wo_matgis($id = ""){
  include("contract/proses_work_order/proses_wo_matgis.php");
}

public function proses_si_matgis($id = ""){
  include("contract/proses_work_order/proses_si_matgis.php");
}

public function proses_sppm_matgis($id = ""){
  include("contract/proses_work_order/proses_sppm_matgis.php");
}


public function data_pekerjaan_progress_wo($id = ""){
  include("contract/daftar_pekerjaan/data_pekerjaan_progress_wo.php");
}

public function data_pekerjaan_progress_wo_matgis($id = ""){
  include("contract/daftar_pekerjaan/data_pekerjaan_progress_wo_matgis.php");
}

public function proses_progress_wo($id = ""){
  include("contract/proses_progress/proses_progress_wo.php");
}

public function proses_progress_wo_matgis($id = ""){
  include("contract/proses_progress/proses_progress_wo_matgis.php");
}

public function proses_progress_milestone($id = ""){
  include("contract/proses_progress/proses_progress_milestone.php");
}

public function submit_proses_progress_milestone(){
  include("contract/proses_progress/submit_proses_progress_milestone.php");
}

public function submit_proses_progress_wo(){
  include("contract/proses_progress/submit_proses_progress_wo.php");
}
public function submit_proses_progress_wo_matgis(){
  include("contract/proses_progress/submit_proses_progress_wo_matgis.php");
}
public function data_bast_wo(){
  include("contract/proses_progress/data_bast_wo.php");
}

public function data_bast_milestone(){
  include("contract/proses_progress/data_bast_milestone.php");
}

public function data_invoice_wo(){
  include("contract/proses_progress/data_invoice_wo.php");
}
public function data_invoice_wo_matgis(){
  include("contract/proses_progress/data_invoice_wo_matgis.php");
}

public function data_invoice_milestone(){
  include("contract/proses_progress/data_invoice_milestone.php");
}

public function proses_bast_milestone($id = ""){
  include("contract/proses_progress/proses_bast_milestone.php");
}

public function proses_bast_wo($id = ""){
  include("contract/proses_progress/proses_bast_wo.php");
}

public function proses_bast_wo_matgis($id = ""){
  include("contract/proses_progress/proses_bast_wo_matgis.php");
}

public function submit_proses_bast_wo($id = ""){
  include("contract/proses_progress/submit_proses_bast_wo.php");
}

public function submit_proses_bast_wo_matgis($id = ""){
  include("contract/proses_progress/submit_proses_bast_wo.php");
}
public function proses_invoice_wo($id = ""){
  include("contract/proses_progress/proses_invoice_wo.php");
}
public function proses_invoice_wo_matgis($id = ""){
  include("contract/proses_progress/proses_invoice_wo_matgis.php");
}
public function proses_invoice_milestone($id = ""){
  include("contract/proses_progress/proses_invoice_milestone.php");
}


public function submit_proses_invoice_wo($id = ""){
  include("contract/proses_progress/submit_proses_invoice_wo.php");
}

public function submit_proses_invoice_wo_matgis($id = ""){
  include("contract/proses_progress/submit_proses_invoice_wo_matgis.php");
}

public function submit_proses_invoice_milestone($id = ""){
  include("contract/proses_progress/submit_proses_invoice_milestone.php");
}
//hlmifzi

public function submit_proses_bast_milestone($id = ""){
  include("contract/proses_progress/submit_proses_bast_milestone.php");
}

public function data_monitor_bast_milestone(){
  include("contract/monitor/data_monitor_bast_milestone.php");
}

public function data_monitor_bast_wo(){
  include("contract/monitor/data_monitor_bast_wo.php");
}

public function data_monitor_bast_wo_matgis(){
  include("contract/monitor/data_monitor_bast_wo_matgis.php");
}

public function lihat_bast_wo($id = ""){
  include("contract/monitor/lihat_bast_wo.php");
}

public function lihat_bast_wo_matgis($id = ""){
  include("contract/monitor/lihat_bast_wo_matgis.php");
}
public function lihat_bast_milestone($id = ""){
  include("contract/monitor/lihat_bast_milestone.php");
}

public function push_wo(){
  include("contract/work_order/push_wo.php");
}
 public function panduan($params1 = ""){
  // show_404(); //sementara ini karena blm ada file guide manualnya
  switch ($params1) {
    case 'manual_contract_management':
      // redirect(base_url("guide/WIKA_eSCM_User_Guide_v1.1.pdf"));
      redirect(base_url("guide/user_guide.zip"));
      break;
    
    default:
     show_404();
      break;
  }
  
}
}
