<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Procurement_m extends CI_Model {

	public function __construct(){

		parent::__construct();

	}

	public function getKategoriDokumen($id = ""){

		if(!empty($id)){

			$this->db->where("ldc_id",$id);

		}

		$this->db->order_by("ldc_id","asc");

		return $this->db->get("prc_lkpdoc");

	}

		public function getPekerjaan($id = ""){

		$where = " WHERE A.ppc_name IS NULL AND A.ppc_end_date IS NULL ";

		$where2 = " WHERE C.ptc_name IS NULL AND C.ptc_end_date IS NULL ";

		$sql = "SELECT A.ppc_id,B.pr_number,A.ppc_name,A.ppc_position,B.pr_subject_of_work FROM prc_pr_comment A
		INNER JOIN prc_pr_main B ON B.pr_number = A.pr_number
		$where
		UNION ALL
		SELECT C.ptc_id,D.ptm_number,C.ptc_name,C.ptc_position,D.ptm_subject_of_work FROM prc_tender_comment C
		INNER JOIN prc_tender_main D ON C.ptm_number = D.ptm_number
		$where2";

		return $this->db->query($sql);

	}

	//=========K=========Berita Acara Aanwijzing
		public function getAanwijzingChat($ptmNumber = ""){

		  if(!empty($ptmNumber)){
			$this->db->like('key_ac',$ptmNumber);
		  }

		  $this->db->order_by('datetime_ac');

		  return $this->db->get('adm_chat');

		}

		public function getVendorByName($vendorName){

			$this->db->like("vendor_name",$vendorName);

			return $this->db->get('vnd_header');
		}

		public function getOnlineAanwijzingParticipant($ptmNumber = ""){

			if(!empty($ptmNumber)){
				$this->db->like('key_ac',$ptmNumber);
			}

			$this->db->select('name_ac');

			$this->db->where('message_ac','Online');

			$this->db->group_by('name_ac');

			return $this->db->get('adm_chat');

		}

		public function get_data_matgis()
		{
			$data = array();
			$this->db->where('ppm_type_of_plan', 'rkp_non_pmcs');

			return $this->db->get('vw_prc_matgis_header_detail')->result_array();
		}

		public function get_data_pmcs()
		{
			$data = array();
			$this->db->distinct();
			return $this->db->query("
					SELECT DISTINCT data.ppm_id,item.smbd_code,item.smbd_name,item.unit,project_name,item.smbd_quantity,price,up.ppm_id as id_update
					FROM vw_data_item_perencanaan_pmcs data
					LEFT JOIN vw_prc_plan_item_pmcs item ON data.ppm_id = item.ppm_id
					LEFT JOIN (SELECT ppm_id, smbd_code, spk_code, satuan, volume, harga_satuan FROM prc_update_pmcs GROUP BY ppm_id, smbd_code, spk_code, satuan, volume, harga_satuan) up ON item.ppm_id = up.ppm_id
					AND item.smbd_code = up.smbd_code
			")->result_array();
		}
	//===================

}
