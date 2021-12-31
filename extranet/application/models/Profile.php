
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Model {

	public function datavendor($vendor_id){

		if(empty($this->session->userdata("header_profile"))){
			$header = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndheader.json?token=123456&act=1&vndHeader.vendorId=".$vendor_id), true);
			$this->session->set_userdata('header_profile', $header["listVndHeader"][0]);
		}
		$data['header'][0] = $this->session->userdata("header_profile");

		if(empty($this->session->userdata("alamat_profile"))){
			$alamat = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndaddress.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('alamat_profile', $alamat["listVndAddress"]);
		}
		$data['alamat'] = $this->session->userdata("alamat_profile");

		if(empty($this->session->userdata("tipe_profile"))){
			$tipe = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndcompanytype.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('tipe_profile', $tipe["listVndCompanyType"]);
		}
		$data['tipe'] = $this->session->userdata("tipe_profile");

		if(empty($this->session->userdata("akta_profile"))){
			$akta = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndakta.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('akta_profile', $akta["listVndAkta"]);
		}
		$data['akta'] = $this->session->userdata("akta_profile");

		if(empty($this->session->userdata("ijin_profile"))){
			$ijin = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndijin.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('ijin_profile', $ijin["listVndIjin"]);
		}
		$data['izin_lain'] = $this->session->userdata("ijin_profile");

		$url = "http://vendor.pengadaan.com:8888/RESTSERVICE/vndagent.json?token=123456&vendorId=".$vendor_id."&act=1";
		if(empty($this->session->userdata("agent_profile"))){

			$agent = json_decode(file_get_contents($url), true);
			$this->session->set_userdata('agent_profile', $agent["listVndAgent"]);
		}
		$data['agent_importir'] = $this->session->userdata("agent_profile");

		if(empty($this->session->userdata("board_profile"))){
			$board = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndboard.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('board_profile', $board["listVndBoard"]);
		}
		$data['board'] = $this->session->userdata("board_profile");

		if(empty($this->session->userdata("bank_profile"))){
			$bank = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndbank.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('bank_profile', $bank["listVndBank"]);
		}
		$data['bank'] = $this->session->userdata("bank_profile");

		if(empty($this->session->userdata("financial_profile"))){
			$financial = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndfinrpt.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('financial_profile', $financial["listVndFinRpt"]);
		}
		$data['financial'] = $this->session->userdata("financial_profile");

		$data['barang'] = $this->db->query("select distinct group_type as catalog_type, product_name, product_description, brand, vnd_product.source , vnd_product.type from vnd_product left join com_group on product_code = group_code where vendor_id = ".$vendor_id)->result_array();

		if(empty($this->session->userdata("sdm_profile"))){
			$sdm = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndsdm.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('sdm_profile', $sdm["listVndSdm"]);
		}
		$data['sdm'] = $this->session->userdata("sdm_profile");

		if(empty($this->session->userdata("sertifikasi_profile"))){
			$sertifikasi = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndcert.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('sertifikasi_profile', $sertifikasi["listVndCert"]);
		}
		$data['sertifikasi'] = $this->session->userdata("sertifikasi_profile");

		if(empty($this->session->userdata("fasilitas_profile"))){
			$fasilitas = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndequip.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('fasilitas_profile', $fasilitas["listVndEquip"]);
		}
		$data['fasilitas'] = $this->session->userdata("fasilitas_profile");

		if(empty($this->session->userdata("pengalaman_profile"))){
			$pengalaman = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndcv.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('pengalaman_profile', $pengalaman["listVndCv"]);
		}
		$data['pengalaman'] = $this->session->userdata("pengalaman_profile");

		if(empty($this->session->userdata("dokumen"))){
			$pengalaman = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndsuppdoc.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('dokumen', $pengalaman["listVndSuppDoc"]);
		}

		$data['dokumen'] = $this->session->userdata("dokumen");

		if(empty($this->session->userdata("tambahan_profile"))){
			$tambahan = json_decode(file_get_contents("http://vendor.pengadaan.com:8888/RESTSERVICE/vndadd.json?token=123456&vendorId=".$vendor_id."&act=1"), true);
			$this->session->set_userdata('tambahan_profile', $tambahan["listVndAdd"]);
		}

		$data['tambahan'] = $this->session->userdata("tambahan_profile");

		$url_ws = "http://vendor.pengadaan.com:8888/RESTSERVICE";
		$url_doc = "http://vendor.pengadaan.com/Download";
		$data['url_ws'] = $url_ws;
		$data['url_doc'] = $url_doc;

		return $data;
	}

	public function getVndType(){
		$this->db->select('vnd_type_master.*');
		$this->db->group_by('vnd_type_master.vtm_id');
		$this->db->group_by('vnd_type_master.vtm_name');
		$this->db->group_by('vnd_type_master.vtm_description');
		$this->db->group_by('vnd_type_master.vtm_created_datetime');
		$this->db->join('adm_vnd_doc', 'adm_vnd_doc.vtm_id = vnd_type_master.vtm_id', 'right');
		return $this->db->get('vnd_type_master');
	}

	// public function getVndCqsmsTemplate(){

	// 	// if(!empty($avd_id)){

	// 	// 	$this->db->where("adm_vnd_doc.avd_id", $avd_id);

	// 	// }

	// 	//$this->db->join('adm_vnd_doc b', 'b.avd_id = a.avd_id');
	// 	$a = $this->db->get('adm_vnd_doc');
	// 	//$b = $this->db->last_query($a);print_r($b);die;
	// 	return $a;

	// }

	// public function getVndCqsmsQuestTemplate($avd_id){

	// 	if(!empty($avd_id)){

	// 		$this->db->where("vnd_cqsms_quest.avd_id", $avd_id);

	// 	}

	// 	$this->db->select(
	// 		'adm_vnd_doc.*,
	// 		vnd_cqsms_ans.*,
	// 		vnd_cqsms_quest.* 
	// 		');

	// 	$this->db->join('adm_vnd_doc', 'adm_vnd_doc.avd_id = vnd_cqsms_quest.avd_id');
	// 	$this->db->join('vnd_cqsms_ans', 'vnd_cqsms_ans.cqsms_quest_id = vnd_cqsms_quest.cqsms_quest_id','left');
	// 	return $this->db->get('vnd_cqsms_quest');

	// }

	public function getVndDocTemplate($vtm_id, $avd_id){

		
		$this->db->where('vtm_id', $vtm_id);
		$this->db->where('adm_vnd_doc.avd_id', $avd_id);
		$this->db->select(
			'adm_vnd_doc.*,
			 adm_vnd_doc_detail.*, 
			 (SELECT doc_file 
			 FROM vnd_doc_pq_detail 
			 LEFT JOIN vnd_doc_pq ON vnd_doc_pq.vdp_id = vnd_doc_pq_detail.vdp_id
			 WHERE vdd_id = "adm_vnd_doc_detail"."vdd_id" 
			 AND "is_active" = 1
			 AND vendor_id = '.$this->session->userdata("userid").'
			) as doc_file');
		$this->db->where(array('adm_vnd_doc.status'=>'Aktif', "adm_vnd_doc_detail.vdd_status" => 1));
		$this->db->join('adm_vnd_doc', 'adm_vnd_doc.avd_id = adm_vnd_doc_detail.avd_id', 'left');
		return $this->db->get('adm_vnd_doc_detail');
	}

	public function getVndDocPq(){

		return $this->db->get('vnd_doc_pq');
	}

	public function insertVndDocPq($data){

		$this->db->insert('vnd_doc_pq',$data);
		return $this->db->affected_rows();
	}

	public function updateVndDocPq($data, $where){

		$this->db->where($where);
		$this->db->update('vnd_doc_pq',$data);
		return $this->db->affected_rows();
	}

	public function getVndDocPqDetail(){
		$this->db->select("adm_vnd_doc_detail.*, vnd_doc_pq.*, vnd_doc_pq_detail.*");
		$this->db->join('adm_vnd_doc_detail', 'adm_vnd_doc_detail.vdd_id = vnd_doc_pq_detail.vdd_id', 'left');
		$this->db->join('vnd_doc_pq', 'vnd_doc_pq.vdp_id = vnd_doc_pq_detail.vdp_id', 'left');
		return $this->db->get('vnd_doc_pq_detail');
	}

	public function insertBatchVndDocPqDetail($data, $vdp_id, $active_docs){
		//deactivate all file for $vdp_id except $active_docs
		// $active_docs not updated file
		if (count($active_docs) > 0) {
			$this->db->where_not_in("vdpd_id", $active_docs);
		}
		$this->db->where('vdp_id', $vdp_id)
		->update("vnd_doc_pq_detail", array("is_active"=>0));

		$this->db->insert_batch('vnd_doc_pq_detail', $data);
		return $this->db->affected_rows();

	}

	public function getCommentDocPQ($id="", $vnd_id = ""){

		$this->db->select("vdpc_id as comment_id,
		vdpc_start_date as comment_date,
		vdpc_end_date as comment_end_date,
		vdpc_name as comment_name,
		vdpc_response as response,
		vdpc_comment as comments,
		vdpc_activity_code as activity,
		(SELECT pos_name FROM vw_pos WHERE (pos_id)::text = (vdpc_position)::text) as position,
		vdpc_end_date as end_date,
		vdpc_activity as activity_name");

		if(!empty($vnd_id)){

			$this->db->where("vnd_doc_pq.vendor_id", $vnd_id);

		}

		if(!empty($id)){

			$this->db->where("vdp_id",$id);

		}

		$this->db->join('vnd_doc_pq', 'vnd_doc_pq.vdp_id = vnd_doc_pq_comment.vdp_id', 'left');
		$this->db->order_by("vdpc_id","desc");

		return $this->db->get("vnd_doc_pq_comment");

	}


}