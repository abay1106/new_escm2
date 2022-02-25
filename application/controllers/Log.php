<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends Telescoope_Controller {

	var $data;

	public function __construct(){

        // Call the Model constructor
		parent::__construct();

		$this->load->model(array('Administration_m',"Procpr_m","Procrfq_m","Contract_m","Vendor_m"));

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		$userdata = $this->Administration_m->getLogin();

		$this->data['userdata'] = (!empty($userdata)) ? $userdata : array();

		$sess = $this->session->all_userdata();


	}

	public function change_role($id = "", $url = ""){

		$emp = $this->data['userdata'];
		$check = $this->db->where(array("pos_id"=>$id,"employee_id"=>$emp['employee_id']))
		->get("vw_adm_pos")->num_rows();
		if(!empty($check)){
			$this->session->set_userdata(do_hash("ROLE"),$id);
		}

		//y add new cond
		if(empty($check)) {
			$checkDelegasi = $this->db->where(array("to"=>$emp['employee_id']))->get("adm_delegasi")->num_rows();
			if(!empty($checkDelegasi)){
				$this->session->set_userdata(do_hash("ROLE"),$id);
			}
		}

		if(!empty($url)){
			redirect(site_url()."/".str_replace("-", "/", $url));
		}else{
			redirect(site_url());
		}


	}

	public function download_attachment($folder = "", $subfolder = "", $filename = ""){

		switch ($folder) {
			case 'procurement':
			$subfolders = array("permintaan","chat_sppbj","chat_rfq","tender","panitia","perencanaan","sanggahan");
			break;
			//haqim
			case 'contract':
			$subfolders = array("comment","jaminan","document","milestone");
			break;
			//end
			case 'administration':
				# code...
			break;
			case 'vendor':
			 $subfolders = array("documentpq");
			break;
			case 'commodity':
			$subfolders = array("barang","jasa");
			break;
			case 'activation':
			$subfolders = array("survei","hasil");
			break;
			case 'matgis':
			$subfolders = array("po","si","sppm","tender","do","sj","bapb","inv");
			case 'activation':
				$subfolders = array("survei","hasil");
				break;
			default:
				# code...
			break;
		}

		if(!empty($subfolders)){

			foreach ($subfolders as $key => $value) {

				$file = str_replace("system/","",BASEPATH)."uploads/".$folder."/".$value."/".$filename;

				if (file_exists($file)) {
					$this->load->helper('download');
					force_download($file, null);
					exit;
				}

				$file = str_replace("system/","",BASEPATH)."uploads/comment/".$folder."/".$value."/".$filename;

				if (file_exists($file)) {
					$this->load->helper('download');
					force_download($file, NULL);
					exit;
				}
			}

		} else {
			//haqim
			$file = str_replace("system/","",BASEPATH)."uploads/".$folder."/".$subfolder;
			//$subfolder (tadinya $filename) adalah nama filenya jika file tidak didalam subfolder manapun
			//end
			if (file_exists($file)) {
				$this->load->helper('download');
				force_download($file, NULL);
				exit;
			}

		}
		echo "<script>alert(\"File tidak ditemukan.\"); window.history.go(-1);</script>";
	}

	public function readchat($id){

		$getchat = $this->db->where("status",0)->where("id",$id)
		->get("prc_chat_rfq")->row_array();

		if(!empty($getchat)){

			$this->db->where("id",$id)->update("prc_chat_rfq",['status'=>1]);

			if(!empty($getchat['rfq_number'])){

				$redirect = site_url('procurement/procurement_tools/monitor_pengadaan/lihat/'.$getchat['rfq_number']);

				redirect($redirect);

			} else {

				redirect('/home');

			}

		}

	}

	public function download_attachment_extranet($folder = "",$vendorid = "",$filename = ""){

		$folder = str_replace("%20", " ", $folder);

		if (THIS_ENV != 'DEV' ) {
			stream_context_set_default( [
				'ssl' => [
					'verify_peer' => false,
					'verify_peer_name' => false,
				],
			]);

			$file = EXTRANET_PATH."/attachment/".$vendorid."/".$folder."/".$filename;
			$header = get_headers($file);

			if ($header[0] === "HTTP/1.1 200 OK") {
		        //download file
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: private');
				header('Content-Length: '.filesize($file));
				ob_clean();
				flush();
				readfile($file);
				exit;
			};
		}else{

			$file = str_replace("system/","",BASEPATH)."extranet/attachment/".$vendorid."/".$folder."/".$filename;

			if (file_exists($file)) {

				$this->load->helper('download');
				force_download($file, NULL);
				exit;
			}

		}

		echo "<script>alert(\"File tidak ditemukan.\"); window.history.go(-1);</script>";
		exit;
	}

	public function auto_create_matgis_procurement(){

		$this->db->select("
			a.spk_code,
			a.dept_code,
			a.group_smbd_code,
			a.smbd_code,
			a.unit,
			a.price,
			sum(a.smbd_quantity) as total,
			(select ppv_remain from prc_plan_volume where ppv_smbd_code = a.smbd_code order by ppv_id desc limit 1) as remain
			")
		->group_by('
			a.spk_code,
			a.smbd_code,
			a.dept_code,
			a.dept_name,
			a.group_smbd_name,
			a.group_smbd_code,
			a.smbd_code,
			a.smbd_name,
			a.unit,
			a.price')
		->where("a.smbd_code !=",null)
		->where("a.is_matgis",'t');

		$result = $this->db->get("prc_plan_integrasi a");

		$rearrange = [];

		foreach ($result->result_array() as $key => $value) {

			$value['price'] = round($value['price'],2);

			$value['total'] = round($value['total'],2);

			$value['remain'] = round($value['remain'],2);

			$pkey = $value['spk_code']."-".$value['dept_code']."-".$value['group_smbd_code'];

			$t = $this->db->like("pr_scope_of_work",$pkey)
			->get("prc_pr_main a")->num_rows();

			if($value['remain'] > 0 && empty($t)){

				$rearrange[$pkey][] = $value;

			}

		}

		foreach ($rearrange as $key => $value) {

			$this->db->trans_begin();

			$x = explode("-", $key);

			$i = $this->db->select("group_smbd_name")->where("group_smbd_code",$x[2])
			->get("prc_plan_integrasi a")->row_array();

			$y = $this->db->select("dept_name")->where("dept_code",$x[1])
			->get("prc_plan_integrasi a")->row_array();

			$judul = strtoupper($x[0]." - KEBUTUHAN MATERIAL STRATEGIS ".$i['group_smbd_name']." ".$y['dept_name']." ".date("Y"));

			$spk_code = "MATGIS.".str_replace("-", ".", $key).".".date("Y");

			$plan = $this->db->select("
				ppm_mata_anggaran,
				ppm_nama_mata_anggaran,
				ppm_sub_mata_anggaran,
				ppm_nama_sub_mata_anggaran,
				ppm_planner,
				ppm_planner_id,
				ppm_planner_pos_code,
				ppm_planner_pos_name,
				ppm_pagu_anggaran,
				ppm_sisa_anggaran,
				ppm_district_id,
				ppm_subject_of_work,
				ppm_scope_of_work,
				ppm_district_name,
				ppm_dept_id,
				ppm_dept_name,
				ppm_project_name,
				ppm_currency,
				ppm_type_of_plan,
				ppm_dept_name,
				ppm_id
				")->where("ppm_project_id",$x[0])
			->get("prc_plan_main a")->row_array();

			$input['pr_number'] = $this->Procpr_m->getUrutPR();
			$input['pr_requester_name'] = $plan['ppm_planner'];
			$input['ppm_id'] = $plan['ppm_id'];
			$input['pr_requester_pos_code'] = $plan['ppm_planner_pos_code'];
			$input['pr_requester_pos_name'] = $plan['ppm_planner_pos_name'];
			$input['pr_created_date'] = date("Y-m-d H:i:s");
			$input['pr_subject_of_work'] = $plan['ppm_subject_of_work'];
			$input['pr_scope_of_work'] = $plan['ppm_scope_of_work']." ".$key;
			$input['pr_district_id'] = $plan['ppm_district_id'];
			$input['pr_district'] = $plan['ppm_district_name'];
			$input['pr_currency'] = $plan['ppm_currency'];
			$input['pr_status'] = 1001;
			$input['pr_dept_id'] = $plan['ppm_dept_id'];
			$input['pr_dept_name'] = $plan['ppm_dept_name'];
			$input['pr_mata_anggaran'] = $plan['ppm_mata_anggaran'];
			$input['pr_nama_mata_anggaran'] = $plan['ppm_nama_mata_anggaran'];
			$input['pr_sub_mata_anggaran'] = $plan['ppm_sub_mata_anggaran'];
			$input['pr_nama_sub_mata_anggaran'] = $plan['ppm_nama_sub_mata_anggaran'];
			$input['pr_pagu_anggaran'] = (int) $plan['ppm_pagu_anggaran'];
			$input['pr_sisa_anggaran'] = $input['pr_pagu_anggaran'];
			$input['pr_requester_id'] = $plan['ppm_planner_id'];
			$input['pr_type_of_plan'] = $plan['ppm_type_of_plan'];
			$input['pr_project_name'] = $plan['ppm_project_name'];
			$input['pr_type'] = "MATERIAL STRATEGIS";
			$input['pr_packet'] = $judul;
			$input['pr_spk_code'] = $x[0];

			$sisa_anggaran = (int) ($plan['ppm_sisa_anggaran']) ? $plan['ppm_sisa_anggaran'] : 0;

			foreach ($value as $key2 => $value2) {

				$z = $this->db->select("smbd_name")->where("smbd_code",$value2['smbd_code'])->get("prc_plan_integrasi a")->row_array();

				$item['ppi_code'] = $value2['smbd_code'];
				$item['pr_number'] = $input['pr_number'];
				$item['ppi_description'] = $z['smbd_name'];
				$item['ppi_quantity'] = $value2['remain'];
				$item['ppi_unit'] = $value2['unit'];
				$item['ppi_price'] = $value2['price'];
				$item['ppi_currency'] = $input['pr_currency'];
				$item['ppi_type'] = 'MULTIPLE';
				$item['ppi_ppn'] = 0;
				$item['ppi_pph'] = 0;
				$item['ppi_spk_code'] = $input['pr_spk_code'];

				$this->db->insert("prc_pr_item",$item);

				$sisa_anggaran -= $item['ppi_price']*$item['ppi_quantity'];

			}

			$input['pr_sisa_anggaran'] = (int) $sisa_anggaran;

			$comment['ppc_pos_code'] = $input['pr_requester_pos_code'];
			$comment['ppc_position'] = $input['pr_requester_pos_name'];

			$comment['pr_number'] = $input['pr_number'];
			$comment['ppc_activity'] = $input['pr_status'];
			$comment['ppc_start_date'] = date("Y-m-d H:i:s");
			$comment['ppc_comment'] = "[SYSTEM] MATERIAL STRATEGIS PMCS ".$key;

			$this->db->insert("prc_pr_main",$input);

			$this->db->insert("prc_pr_comment",$comment);

			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
			} else {
				$this->db->trans_commit();
			}

		}

	}

	public function old_dashboard(){

		$sess = $this->session->userdata(do_hash(SESSION_PREFIX));

		$data = array();
		if(!empty($sess)){


			$this->db->where(array('status !='=>"Persetujuan Anggaran Pengadaan", 'last_status !=' => 1020, 'pr_requester_pos_name !=' => NULL));
			$data['total_pr'] = $this->db->get('vw_prc_pr_monitor')->num_rows();
			//$data['total_pr'] = $this->Procpr_m->getPR()->num_rows();
			$this->db->where_in('ptm_status NOT', array(1901, 1902, 1903));
			$data['total_rfq'] = $this->db->get('vw_prc_monitor')->num_rows();
			//$data['total_rfq'] = $this->Procrfq_m->getRFQ()->num_rows();
//===================================Test============================================================
			//$this->db->select_sum("contract_amount")->group_by("contract_id");
			$this->db->select_sum("contract_amount");
			$this->db->where("status", 2901);
//===================================================================================================
			$ctr = $this->Contract_m->getData()->row_array();
			$data['total_contract'] = (isset($ctr['contract_amount'])) ? $ctr['contract_amount'] : 0;
			$data['total_vendor'] = $this->db->get_where("vw_vnd_header", array('status' => '9'))->num_rows();//$this->Vendor_m->getVendorActive()->num_rows();
			$data['top_commodity'] = $this->db->limit(5)->get('vw_pie_chart')->result_array();
			$method_label = array(0=>"Penunjukkan Langsung",1=>"Pemilihan Langsung",2=>"Pelelangan");
			$method = $this->db->select("count(ptp_id) as total,ptp_tender_method")->where("ptp_tender_method is not null")->group_by("ptp_tender_method")->get('prc_tender_prep')->result_array();
			foreach ($method as $key => $value) {
				$method[$key]['label'] = $method_label[$value['ptp_tender_method']];
			}
			$data['durasi'] = $this->db->get('vw_bar_chart')->result_array();
			$data['efisiensi'] = $this->db->get('vw_bar_efisiensi')->result_array();
			$data['terbesar'] = $this->db->limit(5)->get('vw_bar_terbesar')->result_array();
			$data['terbanyak'] = $this->db->limit(5)->get('vw_bar_terbanyak')->result_array();
			$data['top_proc_method'] = $method;
			$data['data_efisiensi'] = $this->db->get('vw_pie_efisiensi')->result_array();
			$byTime = $this->db->get('vw_statistik_kontrak_expire')->result_array();
			$byStatus = $this->db->get('vw_statistik_kontrak_status')->result_array();
			$data['statistik_kontrak'] = array_merge($byStatus, $byTime);
			$data['kinerja_vendor'] = $this->db->get('vw_kinerja_vendor')->result_array();
			$this->load->helper("String");
			//hlmifzi
			$user = $this->Administration_m->getLogin();
			$position = $this->Administration_m->getEmployeePos($user['employee_id'])->row_array();

			//hlmifzi chatting
			// $jml_chat = $this->db
			// ->where('id_employee_to',$user['employee_id'])
			// ->where('status',1)
			// ->get('t_chat_main')->num_rows();

			// $session_userdata = [
			// 	'jml_chat' => $jml_chat,
			// 	'user_id'  => $user['employee_id'],
			// 	'pos_id'  => $user['pos_id'],
			// ];
			// $this->session->set_userdata($session_userdata);
			//end

			$this->auto_remain_dokumen_vendor();

			$this->auto_create_contract();

			$this->auto_create_matgis_procurement();

			$this->auto_find_matgis_pr();

			$this->template("old_dashboard_v","Dashboard",$data);

		} else {

			$this->load->view("login_v");
		}

	}

	public function index(){
		$sess = $this->session->userdata(do_hash(SESSION_PREFIX));

		$data = array();

		if(!empty($sess)){

			$this->db->where(array('status !='=>"Persetujuan Anggaran Pengadaan", 'last_status !=' => 1020, 'pr_requester_pos_name !=' => NULL));
			$data['total_pr'] = $this->db->get('vw_prc_pr_monitor')->num_rows();
			//$data['total_pr'] = $this->Procpr_m->getPR()->num_rows();
			$this->db->where('ptm_status >', 1180);
			$data['rfq_selesai'] = $this->db->get('vw_prc_monitor')->num_rows();
			$this->db->where('ptm_status <', 1901);
			$data['rfq_on_going'] = $this->db->get('vw_prc_monitor')->num_rows();
			//$data['total_rfq'] = $this->Procrfq_m->getRFQ()->num_rows();
//===================================Test============================================================
			//$this->db->select_sum("contract_amount")->group_by("contract_id");
			$this->db->select_sum("contract_amount");
			$this->db->where("status", 2901);
//===================================================================================================
			$ctr = $this->Contract_m->getData()->row_array();
			//total nilai kontrak
			// $data['total_contract'] = (isset($ctr['contract_amount'])) ? $ctr['contract_amount'] : 0; 

			//total nilai kontrak dari penunjukan pemenang belum jadi kontrak
			$data['total_contract'] = $this->db->get('vw_pie_efisiensi_2020')->row_array()['total_contract'];
			$data['total_vendor'] = $this->db->get_where("vw_vnd_header", array('status' => '9'))->num_rows();
			$data['top_commodity'] = $this->db->limit(5)->get('vw_pie_chart')->result_array();
			$method_label = array(0=>"Penunjukkan Langsung",1=>"Pemilihan Langsung",2=>"Pelelangan");
			$method = $this->db->select("count(ptp_id) as total,ptp_tender_method")->where("ptp_tender_method is not null")->group_by("ptp_tender_method")->get('prc_tender_prep')->result_array();
			foreach ($method as $key => $value) {
				$method[$key]['label'] = $method_label[$value['ptp_tender_method']];
			}
			$this->db->where('ptp_tender_method',1);

			$data['method_pemilihan_langsung'] = $this->db->get('vw_rata_durasi_proses')->row()->av;
			$data['method_pemilihan_langsung'] = explode(' ', $this->db->get('vw_rata_durasi_proses')->row()->av);
			$data['method_pemilihan_langsung'] = $data['method_pemilihan_langsung'][0].' '.ucfirst($data['method_pemilihan_langsung'][1]);

			$data['durasi'] = $this->db->get('vw_bar_chart')->result_array();
			$data['efisiensi'] = $this->db->get('vw_bar_efisiensi')->result_array();
			$data['terbesar'] = $this->db->limit(5)->get('vw_bar_terbesar')->result_array();
			$data['terbanyak'] = $this->db->limit(5)->get('vw_bar_terbanyak')->result_array();
			$data['top_proc_method'] = $method;
			$data['data_efisiensi'] = $this->db->get('vw_pie_efisiensi_2020')->result_array();
			//$data['data_efisiensi'] = $this->db->get('vw_efisiensi_total')->result_array();
			$byTime = $this->db->get('vw_statistik_kontrak_expire')->result_array();
			$byStatus = $this->db->get('vw_statistik_kontrak_status')->result_array();
			$data['statistik_kontrak'] = array_merge($byStatus, $byTime);
			$data['kinerja_vendor'] = $this->db->get('vw_kinerja_vendor')->result_array();
			$this->load->helper("String");
			//hlmifzi
			$user = $this->Administration_m->getLogin();
			$position = $this->Administration_m->getEmployeePos($user['employee_id'])->row_array();

			//hlmifzi chatting
			// $jml_chat = $this->db
			// ->where('id_employee_to',$user['employee_id'])
			// ->where('status',1)
			// ->get('t_chat_main')->num_rows();

			// $session_userdata = [
			// 	'jml_chat' => $jml_chat,
			// 	'user_id'  => $user['employee_id'],
			// 	'pos_id'  => $user['pos_id'],
			// ];
			// $this->session->set_userdata($session_userdata);
			//end

			$data['data_efisiensi_total'] = $this->db->get('vw_efisiensi_total')->row_array();

			$this->auto_remain_dokumen_vendor();

			$this->auto_create_contract();

			//$this->auto_create_matgis_procurement();

			$this->auto_find_matgis_pr();

			$this->template("dashboard_v","Dashboard",$data);

		}else{

			$this->load->view("login_v");

		}

			

	}

	public function auto_remain_dokumen_vendor(){
		$infoDate = date('Y-m-d', strtotime('+2 months'));
		$this->db->or_where("address_domisili_exp_date <=",$infoDate);
		$this->db->or_where("siup_to <=",$infoDate);
		$this->db->or_where("tdp_to <=",$infoDate);
		$docExVends = $this->Vendor_m->getVendor()->result_array();

		//inset ceker bulan
		$this->db->where("bulan_kirim",date("Y-m"));
		$cekStatusBulanKirim = $this->db->get("adm_remind_dokumen_vendor_log")->row_array();
		if (empty($cekStatusBulanKirim)) {
			$data['bulan_kirim'] = date("Y-m");
			$data['aktif'] = 1;
			$this->db->insert('adm_remind_dokumen_vendor_log',$data);
		}

		//cek status bulan
		$this->db->where("bulan_kirim",date("Y-m"));
		$this->db->where("aktif","1");
		$cekStatusKirim = $this->db->get("adm_remind_dokumen_vendor_log")->row_array();

		if (!empty($cekStatusKirim) && $this->data['userdata']['job_title'] == "PENGELOLA VENDOR") {

			$to = $this->data['userdata']['email'];
			$no=1;
			$table = "<table>
							<thead style='background-color:#3498DB;color:white;' border = '1'>
								<th>No</th>
								<th>Nama Vendor</th>
								<th>Masa Berlaku Domisili</th>
								<th>Masa Berlaku SIUP</th>
								<th>Masa Berlaku TDP</th>
							</thead>
							<tbody>";
			foreach ($docExVends as $key => $value) {
				$infoDate = date('Y-m-d', strtotime('+2 months'));
				$colorDomisili = ($value['address_domisili_exp_date'] <= $infoDate) ? "#E67E22" : "white" ;
				$colorSIUP = ($value['siup_to'] <= $infoDate) ? "#E67E22" : "white" ;
				$colorTDP = ($value['tdp_to'] <= $infoDate) ? "#E67E22" : "white" ;
				$table.="<tr><td>".$no++."</td>
							<td>".$value['vendor_name']."</td>
							<td style='background-color:".$colorDomisili."'>".date('d-m-Y',strtotime($value['address_domisili_exp_date']))."</td>
							<td style='background-color:".$colorSIUP."'>".date('d-m-Y',strtotime($value['siup_to']))."</td>
							<td style='background-color:".$colorTDP."'>".date('d-m-Y',strtotime($value['tdp_to']))."</td></tr>";
			}
			$table .="</tbody></table>";

			$msg = "Dengan hormat,<br>

			Bersama ini kami sampaikan bahwa Ada ".count($docExVends)." vendor yang memiliki expired dokumen <br/> Berikut Detail Dokumen tersebut : <br/>
			<br/>
			".$table."<br/>
			Demikian Info yang dikirim untuk menjadi perhatian<br/>
			Terima Kasih
			";

			$email = $this->sendEmail($to,"Pemberitahuan Expired Document Vendor",$msg,"no_notif_feedback");

			if ($email) {
				$data['aktif'] = 0;
				$this->db->where("bulan_kirim",date("Y-m"));
				$this->db->update('adm_remind_dokumen_vendor_log',$data);
			}
		}

	}

	public function auto_find_matgis_pr(){

		$pr = $this->db
		->where("pr_buyer_id",null)
		->or_where("pr_buyer",null)
		->or_where("pr_buyer_pos_code",null)
		->or_where("pr_buyer_pos_name",null)
		->or_where("pr_district",null)
		->or_where("pr_district_id",null)
		->get("prc_pr_main")->result_array();

		foreach ($pr as $key => $value) {

			$input = [];

			$is_buyer_empty = (empty($value['pr_buyer_id']) || empty($value['pr_buyer']) || empty($value['pr_buyer_pos_code']) || empty($value['pr_buyer_pos_name']));

			$is_district_empty = (empty($value['pr_district']) || empty($value['pr_district_id']));

			if($is_buyer_empty){

				$find_buyer = $this->db->where("dept_id",$value['pr_dept_id'])
				->where("job_title","PELAKSANA PENGADAAN")
				->get("user_login_rule")
				->row_array();

				if(!empty($find_buyer)){

					$input['pr_buyer_id'] = $find_buyer['employee_id'];
					$input['pr_buyer'] = $find_buyer['complete_name'];
					$input['pr_buyer_pos_code'] = $find_buyer['pos_id'];
					$input['pr_buyer_pos_name'] = $find_buyer['pos_name'];

				}

			}

			if($is_district_empty){

				$find_dept = $this->db
				->where("dept_id",$value['pr_dept_id'])
				->get("adm_dept")
				->row_array();

				if(!empty($find_dept)){

					$input['pr_district_id'] = $find_dept['district_id'];
					$input['pr_district'] = $find_dept['district_name'];

				}

			}

			if(!empty($input)){

				$this->db
				->where("pr_number",$value['pr_number'])
				->update("prc_pr_main",$input);

			}

		}


	}

	public function auto_create_contract(){

		$this->db->trans_begin();

		// BEGIN SINGLE WINNER

		$check = $this->db
		->query("SELECT * FROM vw_prc_monitor WHERE ptm_number NOT IN (SELECT ptm_number FROM ctr_contract_header) AND last_status IN (1180,1181,1901,1905)")
		->result_array();

		foreach ($check as $key => $value) {

			if($value['ptm_winner'] == 2){

				$get_winner = $this->db
				->where("ptm_number",$value['ptm_number'])
				->where("percentage >",0)
				->get("prc_tender_winner")
				->result_array();

				if(!empty($get_winner)){

					$vend_item = [];

					foreach ($get_winner as $x => $y) {

						$d = $this->db
						->select("tit_id,tit_code,pr_dept_id,pr_dept_name,".$y['percentage']." as percentage,cast(".$y['weight']." as text) as weight,tit_description,tit_unit,tit_type,tit_currency")
						->join("prc_pr_main","prc_pr_main.pr_number=prc_tender_item.pr_number","left")
						->where("tit_id",$y['tit_id'])
						->where("ptm_number",$y['ptm_number'])
						->get("prc_tender_item")
						->row_array();
						
						//print_r($d);

						//$vend_item[$y['vendor_id']."-".$d['pr_dept_id']][trim($d['tit_code'])] = $d;

						$vend_item[$y['vendor_id']][trim($d['tit_code'])] = $d;

					}

					foreach ($vend_item as $x => $y) {

						/*

						$exp = explode("-", $x);

						$vendor_id = $exp[0];

						$vendor = $this->db
						->where("vendor_id",$vendor_id)
						->get("vnd_header")
						->row_array();

						$dept_id = $exp[1];

						$dept = $this->db
						->where("dept_id",$dept_id)
						->get("adm_dept")
						->row_array();

						*/

						$vendor_id = $x;

						$vendor = $this->db
						->where("vendor_id",$vendor_id)
						->get("vnd_header")
						->row_array();

						if(!empty($vendor)){

							$item_cont = [];

							$total_contract = 0;

							$is_matgis = ($value['ptm_type_of_plan'] == "rkp_matgis");

							foreach ($y as $a) {

								$this->db->where("vendor_id",$vendor_id);

								$quo_item = $this->Procrfq_m
								->getViewVendorQuoComRFQ($a['tit_id'],"",$value['ptm_number'])
								->row_array();

								$short = (!empty($a['tit_description'])) ? $a['tit_description'] : $quo_item['pqi_description'];

								$weight = ($is_matgis) ? $a['weight']*1.1 : $a['weight'];

								$i = array(
									"tit_id"=>$a['tit_id'],
								//"contract_id"=>$contract_id,
									"item_code"=>trim($a['tit_code']),
									"short_description"=>$short,
									"long_description"=>$quo_item['pqi_description'],
									"price"=>$quo_item['pqi_price'],
									"qty"=>$weight,
									"uom"=>$a['tit_unit'],
									"min_qty"=>1,
									"max_qty"=>$weight,
									"ppn"=>($quo_item['pqi_ppn']) ? $quo_item['pqi_ppn'] : 0,
									"pph"=>($quo_item['pqi_pph']) ? $quo_item['pqi_pph'] : 0,
									"sub_total"=>$sub_total,
									'vendor_code'=>$vendor_id
								);

								$sub_total = $i['qty']*$i['price']*((100+$i['pph']+$i['ppn'])/100);

								$i['sub_total'] = $sub_total;

								$item_cont[] = $i;

								$total_contract += $sub_total;

							}

							$district_id =($value['ptm_district_id']) ? $value['ptm_district_id'] : 1;

							if(!$is_matgis){
								$spew = array(
									"job_title"=>"PENGELOLA KONTRAK",
									"district_id"=>$district_id,
									"dept_id"=>$dept_id
								);
								$spem = array(
									"job_title"=>"MANAJER PENGADAAN",
									"district_id"=>$district_id,
									"dept_id"=>$dept_id
								);
							} else {
								$spew = array(
									"job_title"=>"PENGELOLA KONTRAK",
									"district_id"=>$district_id,
									"dept_name"=>"DIVISI SUPPLY CHAIN MANAGEMENT"
								);
								$or_spew = array( // inject
									"job_title"=>"PENGELOLA KONTRAK",
									"district_id"=>$district_id,
									"dept_name"=>"DIVISI SUPPLY CHAIN MANAGEMENT"
								);
								$spem = array(
									"job_title"=>"MANAJER PENGADAAN",
									"district_id"=>$district_id,
									"dept_name"=>"DIVISI SUPPLY CHAIN MANAGEMENT"
								);
								$or_spem = array( // inject
									"job_title"=>"MANAJER PENGADAAN",
									"district_id"=>$district_id,
									"dept_name"=>"DIVISI SUPPLY CHAIN MANAGEMENT"
								);
							}

							if (isset($or_spem) AND !empty($or_spem)) { // inject
								$this->db->or_where($or_spem);	
							}
							$getman = $this->db->select("pos_id, pos_name, employee_id")
							->where($spem)
							->get("user_login_rule")
							->row_array();

							
							if (isset($or_spew) AND !empty($or_spew)) { // inject
								$this->db->or_where($or_spew);	
							}
							$getspe = $this->db->select("pos_id, pos_name, employee_id")
							->where($spew)
							->get("user_login_rule")
							->row_array();

							$getdata = $getspe;

							$input['type_of_plan'] = 'departemen';

							$input['ctr_is_matgis'] = $is_matgis ? 1 : 0;

							$input['notes'] = strtoupper("MULTI WINNER ".$value['ptm_number']." ".$vendor_id." ".$dept_id);

							$input['dept_code'] = $dept['dep_code'];

							$input['dept_id'] = $dept_id;

							$input['spk_code'] = $value['spk_code'];

							$input['ptm_number'] = $value['ptm_number'];

							$input['currency'] = $value['pqm_currency'];

							$input['vendor_id'] = $vendor_id;

							$input['status'] = 2010;

							$input['vendor_name'] = $vendor['vendor_name'];

							$input['subject_work'] = $value['ptm_subject_of_work'];

							$input['scope_work'] = $value['ptm_scope_of_work'];

							$input['contract_type'] = $value['ptm_contract_type'];

							$input['completed_tender_date'] = $value['ptm_completed_date'];

							$input['contract_amount'] = $total_contract;

							$input['created_date'] = $this->db
							->where("ptc_end_date !=",null)
							->where("ptm_number",$value['ptm_number'])
							->order_by("ptc_id","desc")
							->get("prc_tender_comment")
							->row()
							->ptc_end_date;

							if(!empty($getspe)){

								$input['ctr_spe_employee'] = $getspe['employee_id'];

								$input['ctr_spe_pos'] = $getspe['pos_id'];

								$input['ctr_spe_pos_name'] = $getspe['pos_name'];

							}

							if(!empty($getman)){

								$input['ctr_man_employee'] = $getman['employee_id'];

								$input['ctr_man_pos'] = $getman['pos_id'];

								$input['ctr_man_pos_name'] = $getman['pos_name'];

							}

							$this->db->insert("ctr_contract_header",$input);

							$contract_id = $this->db->insert_id();

							foreach ($item_cont as $b) {

								$b["contract_id"] = $contract_id;

								$act = $this->Contract_m->insertItem($b);

							}

							$this->db->insert("ctr_contract_comment",array(
								"ptm_number"=>$value['ptm_number'],
								"contract_id"=>$contract_id,
								"ccc_activity"=>2010,
								"ccc_position"=>$getdata['pos_name'],
								"ccc_pos_code"=>$getdata['pos_id'],
								"ccc_start_date"=>date("Y-m-d H:i:s"),
							));

						}

					}

				}

			} else {

				if(!empty($value['vendor_id'])){

					$vendor_id = $value['vendor_id'];

					$dept_id = $value['ptm_dept_id'];

					$dept = $this->db->where("dept_id",$dept_id)->get("adm_dept")->row_array();

					$is_matgis = ($value['ptm_type_of_plan'] == "rkp_matgis");

					$district_id =($value['ptm_district_id']) ? $value['ptm_district_id'] : 1;

					if(!$is_matgis){
						$spew = array(
							"job_title"=>"PENGELOLA KONTRAK",
							"district_id"=>$district_id,
							"dept_id"=>$dept_id
						);
						$spem = array(
							"job_title"=>"MANAJER PENGADAAN",
							"district_id"=>$district_id,
							"dept_id"=>$dept_id
						);
					} else {
						$spew = array(
							"job_title"=>"PENGELOLA KONTRAK",
							"district_id"=>$district_id,
							"dept_name"=>"DIVISI SUPPLY CHAIN MANAGEMENT"
						);
						$or_spew = array( // inject
									"job_title"=>"PENGELOLA KONTRAK",
									"district_id"=>$district_id,
									"dept_name"=>"SCM"
								);
						$spem = array(
							"job_title"=>"MANAJER PENGADAAN",
							"district_id"=>$district_id,
							"dept_name"=>"DIVISI SUPPLY CHAIN MANAGEMENT"
						);
						$or_spem = array( // inject
							"job_title"=>"MANAJER PENGADAAN",
							"district_id"=>$district_id,
							"dept_name"=>"SCM"
						);
					}
					
					if (isset($or_spem) AND !empty($or_spem)) { // inject
						$this->db->or_where($or_spem);	
					}
					$getman = $this->db->select("pos_id, pos_name, employee_id")
					->where($spem)
					->get("user_login_rule")
					->row_array();
					
					if (isset($or_spew) AND !empty($or_spew)) { // inject
						$this->db->or_where($or_spew);	
					}
					$getspe = $this->db->select("pos_id, pos_name, employee_id")
					->where($spew)
					->get("user_login_rule")
					->row_array();

					$getdata = $getspe;

					$input['type_of_plan'] = 'departemen';

					$input['ctr_is_matgis'] = $is_matgis ? 1 : 0;

					$input['notes'] = strtoupper("SINGLE WINNER ".$value['ptm_number']." ".$value['vendor_id']);

					$input['dept_code'] = $dept['dep_code'];

					$input['dept_id'] = $dept_id;

					$input['spk_code'] = $value['spk_code'];

					$input['ptm_number'] = $value['ptm_number'];

					$input['status'] = 2010;

					$input['currency'] = $value['pqm_currency'];

					$input['vendor_id'] = $value['vendor_id'];

					$input['vendor_name'] = $value['vendor_name'];

					$input['subject_work'] = $value['ptm_subject_of_work'];

					$input['scope_work'] = $value['ptm_scope_of_work'];

					$input['contract_type'] = $value['ptm_contract_type'];

					$input['completed_tender_date'] = $value['ptm_completed_date'];

					$input['contract_amount'] = $value['total_contract'];

					$input['created_date'] = $this->db
					->where("ptc_end_date !=",null)
					->where("ptm_number",$value['ptm_number'])
					->order_by("ptc_id","desc")
					->get("prc_tender_comment")
					->row()
					->ptc_end_date;

					if(!empty($getspe)){

						$input['ctr_spe_employee'] = $getspe['employee_id'];

						$input['ctr_spe_pos'] = $getspe['pos_id'];

						$input['ctr_spe_pos_name'] = $getspe['pos_name'];

					}

					if(!empty($getman)){

						$input['ctr_man_employee'] = $getman['employee_id'];

						$input['ctr_man_pos'] = $getman['pos_id'];

						$input['ctr_man_pos_name'] = $getman['pos_name'];

					}

					$this->db->insert("ctr_contract_header",$input);

					$contract_id = $this->db->insert_id();

					$vendor_id = $value['vendor_id'];

					$this->db->where("vendor_id",$vendor_id);

					$quo_item = $this->Procrfq_m
					->getViewVendorQuoComRFQ("","",$value['ptm_number'])
					->result_array();

					foreach ($quo_item as $key => $value) {

						$short = (!empty($value['short_description'])) ? $value['short_description'] : $value['pqi_description'];

						$weight = ($is_matgis) ? $value['pqi_quantity']*1.1 : $value['pqi_quantity'];

						$i = array(
							"tit_id"=>$value['tit_id'],
							"contract_id"=>$contract_id,
							"item_code"=>$value['tit_code'],
							"short_description"=>$short,
							"long_description"=>$value['pqi_description'],
							"price"=>$value['pqi_price'],
							"qty"=>$weight,
							"uom"=>$value['tit_unit'],
							"min_qty"=>1,
							"max_qty"=>$weight,
							"ppn"=>($value['pqi_ppn']) ? $value['pqi_ppn'] : 0,
							"pph"=>($value['pqi_pph']) ? $value['pqi_pph'] : 0,
							'vendor_code'=>$vendor_id
						);

						$sub_total = $i['qty']*$i['price']*((100+$i['pph']+$i['ppn'])/100);

						$i['sub_total'] = $sub_total;

						$act = $this->Contract_m->insertItem($i);

					}

					$this->db->insert("ctr_contract_comment",array(
						"ptm_number"=>$value['ptm_number'],
						"contract_id"=>$contract_id,
						"ccc_activity"=>2010,
						"ccc_position"=>$getdata['pos_name'],
						"ccc_pos_code"=>$getdata['pos_id'],
						"ccc_start_date"=>date("Y-m-d H:i:s"),
					));

				}

			}

		}

		// END SINGLE WINNER

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
		} else {
			$this->db->trans_commit();
		}

	}

	public function test_email(){
		$msg = "Dengan hormat,

		Bersama ini kami sampaikan bahwa ".COMPANY_NAME." membuka pendaftaran untuk dapat berpartisipasi dalam pengadaan nomor ........................... dengan Subjek '.....................................................................' (

		Pendaftaran dapat dilakukan melalui e-Procurement dengan memastikan bahwa data perusahaan anda sudah ter-update.";
		$email = $this->sendEmail(COMPANY_EMAIL,"Pemberitahuan Tender Nomor 0003/RFQ/33/01-2016",$msg);

		echo $this->email->print_debugger();
	//echo $email;
	}

	public function remove_file(){
		$post = $this->input->post();
		$loc = str_replace("_", "/", $post['folder']);
		$root = str_replace("application","",APPPATH);
		$dir = $root."/uploads/".$loc;
		$dir = str_replace(array("\\","//"), "/", $dir);
		$file = $post['file'];
		if(unlink($dir."/".$file)){
			echo 1;
		} else {
			echo 0;
		}
	}

	public function doupload(){

		$message = "";

		$loc = $this->session->userdata("dir_upload");
		$module = $this->session->userdata("module");


		$status = "error";

		$url = "";

		if(!empty($loc)){
			$exp = explode("_", $loc);
			$module = $exp[0];
			$loc = str_replace("_", "/", $loc);
			$root = str_replace("application","",APPPATH);
			$dir = $root."/uploads/".$loc;
			$dir = str_replace(array("\\","//"), "/", $dir);
			$config['allowed_types'] = 'jpg|gif|png|doc|docx|xls|xlsx|ppt|pptx|pdf|jpeg|zip|rar|tgz|7zip|tar';
			$config['overwrite'] = false;

			if (!file_exists($dir)){
				mkdir($dir, 0777, true);
			}

			$config['upload_path'] = $dir;
			$config['encrypt_name'] = true;
				$config['max_size'] = 5120; //y max file upload

				$this->load->library('upload', $config);

				if(!empty($_FILES['file']['tmp_name'])){

					if ($this->upload->do_upload('file')){
						$upl = $this->upload->data();
						$message = $upl['file_name'];
						$url = site_url('log/download_attachment/'.$loc.'/'.$message);
						$status = "success";
					} else {
						$message = $this->upload->display_errors('', '');
					}

				} else {
					$message = "No file";
				}

			} else {
				$message = "No directory";
			}

			$this->session->unset_userdata("message");

			echo json_encode(array("message"=>$message,"status"=>$status,"url"=>$url));

		}

		private function upload_files($path, $title, $files)
		{

			if (!file_exists($path)){
				mkdir($path, 0777, true);
			}

			$config = array(
				'upload_path'   => $path,
				'allowed_types' => 'jpg|gif|png|doc|docx|xls|xlsx|ppt|pptx|pdf|jpeg|zip|rar|tgz|7zip|tar',
				'overwrite'     => 1,
				'max_size'		=> 5120, //y max file upload
			);

			$this->load->library('upload', $config);

			$files = array();

			$return = array();

			foreach ($files['name'] as $key => $file) {

				$_FILES['files[]']['name']= $files['name'][$key];
				$_FILES['files[]']['type']= $files['type'][$key];
				$_FILES['files[]']['tmp_name']= $files['tmp_name'][$key];
				$_FILES['files[]']['error']= $files['error'][$key];
				$_FILES['files[]']['size']= $files['size'][$key];

				$fileName = $file;

				if(!empty($title)){
					$fileName = $title .'_'. $file;
				}

				$files[] = $fileName;

				$config['file_name'] = $fileName;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('files[]')) {
					$return[] = array("data"=>$this->upload->data(),"error"=>false);
				} else {
					$return[] = array("data"=>false,"error"=>$this->upload->display_errors());
				}
			}

			return $return;
		}

		public function logout(){

			$this->session->unset_userdata(do_hash(SESSION_PREFIX));
			$this->session->sess_destroy();
			redirect(site_url('log'));

		}

		public function submit_change_password(){

			$post = $this->input->post();

			if(!empty($post)){

				$u = $this->data['userdata'];
				$oldpass = strtoupper(do_hash($post['password_lama_inp'],'sha1'));
				$check2 = $this->db->where(array("password"=>$oldpass,"id"=>$u['id']))->get("adm_user")->row_array();
				if($post['password_baru_inp'] != $post['password_baru_ulang_inp']){
					$this->setMessage("Password baru dan ulangi password tidak sama","Error");
				} else if(empty($check2)){
					$this->setMessage("Password lama salah","Error");
				} else {
					$pass = strtoupper(do_hash($post['password_baru_inp'],'sha1'));
					$input = array("password"=>$pass);
					$this->db->where("id",$u['id'])->update("adm_user",$input);
					$this->setMessage("Sukses mengubah password","Success");
					redirect(site_url('home'));
				}
			}

			$data['controller_name'] = "log";
			$this->template("change_password_v","Ubah Password",$data);

		}

		public function change_password(){
			$data['controller_name'] = "log";
			$this->template("change_password_v","Ubah Password",$data);
		}

		public function in(){

			$method = "login";
			$post = $this->input->post();

			$this->form_validation->set_rules('username_login', 'Username', 'required');
			$this->form_validation->set_rules('password_login', 'Password', 'required');

			if ($this->form_validation->run() == FALSE){

				$this->index();

			} else {

				$username = $post['username_login'];
				$password = $post['password_login'];

				$data = $this->Administration_m->checkLogin($username,$password)->row_array();

			//$data['id'] = 1;
			

				if(!empty($data)){
					if(empty($data['is_locked']) && empty($data['status'])){
						// $first_pos = $this->db->where("employee_id",$data['employeeid'])->get("vw_adm_pos")->row()->pos_id;
						$first_pos = $this->db->where("employee_id",$data['employeeid'])->order_by('is_main_job','desc')->get("vw_adm_pos")->row()->pos_id;
						$this->session->set_userdata(do_hash("ROLE"),$first_pos);
						$this->session->set_userdata(do_hash(SESSION_PREFIX),$data['id']);
					} else {
						$this->setMessage("Sorry, your account is suspended","Error");
					}

				} else {
					$this->setMessage("Wrong username and password","Error");
				}

				redirect(site_url('home'));

			}

		}

		public function forgot(){

			$email = $this->input->post('email_login');

			if(!empty($email)){

				$newpass = generateRandomString();
				$encrypt = do_hash($newpass);
				$employee = $this->db->where("email", $email)->get("adm_employee")->row_array();

				$update = $this->db->where("employeeid",$employee['id'])->update("adm_user",array("password"=>strtoupper($encrypt)));

				if($this->db->affected_rows() > 0){

					$data = $this->db->where("email",$email)->get("adm_employee")->row_array();

					$user = $data['fullname'];

					$this->load->library('email');

					$config['mailtype'] = 'html';
					$config['wordwrap'] = TRUE;

					$this->email->initialize($config);

					$company = $this->globalparam_m->getData();

					$email_company = $company['site_email'];
					$name_company = $company['site_name'];

					$this->email->from($email_company, $name_company);
					$this->email->to($email);

					$this->email->subject($name_company.' - Your new password admin panel');
					$this->email->message("<p>Dear $user,</p>
						<br/>
						<p>Your new password is $newpass. Please login <a href='".site_url('log/in')."' target='_blank'>here</a> with new password.</p>
						<br/>
						<p>Thanks,</p>
						<p>$name_company</p>");

					$this->email->send();

					$this->session->set_userdata('message',"Success to send email reset password");

				} else {
					$this->session->set_userdata('message',"Invalid email address");
				}

			} else {
				$this->session->set_userdata('message',"Email address cannot be empty");
			}

			redirect(site_url("log/in"));

		}

		public function alljob()
		{
			$view = 'all_job_v';
			$data = array();
			$this->template($view,"Daftar Seluruh Pekerjaan",$data);
		}


		public function data_all_job()
		{

			$get = $this->input->get();

			$userdata = $this->data['userdata'];

			$filtering = $this->uri->segment(3, 0);

			$id = (isset($get['id']) && !empty($get['id'])) ? $get['id'] : "";
			$order = (isset($get['order']) && !empty($get['order'])) ? $get['order'] : "";
			$limit = (isset($get['limit']) && !empty($get['limit'])) ? $get['limit'] : 10;
			$search = (isset($get['search']) && !empty($get['search'])) ? $this->db->escape_like_str(strtolower($get['search'])) : "";
			$offset = (isset($get['offset']) && !empty($get['offset'])) ? $get['offset'] : 0;
			$field_order = (isset($get['sort']) && !empty($get['sort'])) ? $get['sort'] : "time";

			if(!empty($search)){
				$this->db->group_start();
				$this->db->or_like("LOWER(vw_job_all.pos_name)",$search);
				$this->db->or_like("LOWER(vw_job_all.activity)",$search);
				$this->db->or_like("LOWER(vw_job_all.number)",$search);
				$this->db->group_end();
			}

			$data['total'] = $this->Administration_m->getAllJob($userdata['employee_id'], "")->num_rows();

			if(!empty($search)){
				$this->db->group_start();
				$this->db->or_like("LOWER(vw_job_all.pos_name)",$search);
				$this->db->or_like("LOWER(vw_job_all.activity)",$search);
				$this->db->or_like("LOWER(vw_job_all.number)",$search);
				$this->db->group_end();
			}

			if(!empty($order)){
				$this->db->order_by($field_order,$order);
			}

			if(!empty($limit)){
				$this->db->limit($limit,$offset);
			}

			$rows = $this->Administration_m->getAllJob($userdata['employee_id'], "")->result_array();

			foreach ($rows as $key => $value) {
				$u = $rows[$key]['url'].$rows[$key]['id'];
				$rows[$key]['urlid'] = $rows[$key]['pos_id']."/".str_replace("/", "-", $u);
			}

			$data['rows'] = $rows;

			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}

		public function chart($param1 = '',$param2 = ''){
			$post = $this->input->post();
			$limit = (!empty($post['limit']) && isset($post['limit'])) ? $post['limit'] : 5;
			$offset = (!empty($post['offset']) && isset($post['offset'])) ? $post['offset'] : 0 ;
			switch ($param1) {
				case 'map':
					include("chart/mapData.php");
					break;

				case 'statBeton':
					include("chart/statusKontrakBetonData.php");
					break;

				case 'statSemen':
					include("chart/statusKontrakSemenData.php");
					break;

				case 'dept':
					include("chart/deptData.php");
					break;

				case 'spk':
					include("chart/spkData.php");
					break;

				case 'vend':
					include("chart/vendData.php");
					break;

				case 'efisiensiLine':
					include("chart/efisiensiLineData.php");
					break;

				default:
					# code...
					break;
			}
			echo !empty($data) ? $data : '';
		}

	}
