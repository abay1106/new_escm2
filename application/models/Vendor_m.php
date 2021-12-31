<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_m extends CI_Model {

	public function __construct(){

		parent::__construct();

	}

	public function getVendorActive($id = ""){

			$this->db->where_in("status",array("5","9"));

		return $this->getVendor($id);

	}


	public function getDaftarPekerjaanVerifikasiDocPQ($id=""){
		if (!empty($id)) {
			$this->db->where('vdp_id', $id);
		}
		
		$this->db->where('vdp_status', "1");

		return $this->db->get('vw_daftar_pekerjaan_doc_pq');
	}

	public function getVndType(){
		$this->db->select('vnd_type_master.*');
		//$this->db->group_by('vnd_type_master.vtm_id');
		$this->db->join('adm_vnd_doc', 'adm_vnd_doc.vtm_id = vnd_type_master.vtm_id', 'right');
		return $this->db->get('vnd_type_master');
	}

	public function insertVndDocPq($data){

		$this->db->insert('vnd_doc_pq',$data);
		return $this->db->insert_id();
		// return $this->db->affected_rows();
	}

	public function getDocPq($id="", $template_id=""){
		if (!empty($id)) {
			$this->db->where('vdp_id', $id);
		}
		if (!empty($template_id)) {
			$this->db->where('avd_id', $template_id);
		}

		return $this->db->get('vnd_doc_pq');
	}

	public function getDocPqDetail($id="",$vendor_id="", $status=""){

		$this->db->select('vtm_name, avd_name, adm_vnd_doc_detail.vdd_name,vendor_id,vnd_doc_pq.vtm_id,vnd_doc_pq.vdp_she_main,vnd_doc_pq_detail.*');

		if (!empty($id)) {
			$this->db->where('vnd_doc_pq_detail.vdp_id', $id);
		}
		if (!empty($vendor_id)) {
			$this->db->where('vendor_id', $vendor_id);
		}
		if (!empty($status)) {
			$this->db->where('vdp_status', $status);
		}
		

		$this->db->join('vnd_doc_pq', 'vnd_doc_pq.vdp_id = vnd_doc_pq_detail.vdp_id', 'left');
		$this->db->join('vnd_type_master', 'vnd_type_master.vtm_id = vnd_doc_pq.vtm_id', 'left');
		$this->db->join('adm_vnd_doc_detail', 'adm_vnd_doc_detail.vdd_id = vnd_doc_pq_detail.vdd_id', 'left');
		$this->db->join('adm_vnd_doc', 'adm_vnd_doc_detail.avd_id = adm_vnd_doc.avd_id', 'left');
		$this->db->where('is_active', 1);
		$this->db->order_by('adm_vnd_doc_detail.vdd_id', 'asc');
		return $this->db->get('vnd_doc_pq_detail');
	}

	public function updateDocPqDetail($id="",$data=""){
	return $this->db->update('vnd_doc_pq_detail', $data, ['vdpd_id'=>$id]);
	}


	public function updatePqHeader($id, $data){

		$this->db->where('vdp_id', $id);
		return $this->db->update('vnd_doc_pq', $data);
	}

	public function getTemplateDocPq($id="", $vtm_id=""){

		if (!empty($id)) {
			$this->db->where('avd_id', $id);
		}

		if (!empty($vtm_id)) {
			$this->db->where('vtm_id', $vtm_id);
		}

		return $this->db->get('adm_vnd_doc');
	}


	public function getVendor($code = ""){

		if(!empty($code)){

			$this->db->where("vendor_id",$code);

		}

		return $this->db->get("vw_vnd_header");

	}

	public function getMandor($code = ""){

		if(!empty($code)){

			$this->db->where("vmh_id",$code);

		}

		return $this->db->get("vnd_mandor_header");

	}

	public function getMandorDetail($code = "", $table=""){

		if(!empty($code)){

			$this->db->where("vmh_id",$code);

		}

		return $this->db->get($table);

	}

	public function getVendorKpi($code = ""){

		if(!empty($code)){

			$this->db->where("vendor_id",$code);

		}

		return $this->db->get("vw_vnd_kpi");

	}

	public function getVendorStatus($code = ""){
		return $this->db->get("vw_laporan_vendor_status");

	}
	//start code hlmifzi
	public function getVendorCommodity($code = ""){

		if(!empty($code)){

			$this->db->where("vendor_id",$code);

		}

		return $this->db->get("vnd_suspend_commodity_vendor");

	}
	//end

	public function getBidderList($code = ""){

		if(!empty($code)){

			$this->db->where("vendor_id",$code);

		}

		return $this->db->get("vw_vnd_bidder_list");

	}

	public function getDaftarPekerjaan($code = ""){

		if(!empty($code)){

			$this->db->where("vendor_id",$code);

		}

		return $this->db->get("vw_daftar_pekerjaan_vendor");

	}

	public function getDaftarPekerjaanBlacklist($code = ""){

		if(!empty($code)){

			$this->db->where("vendor_id",$code);

		}

		return $this->db->get("vw_daftar_pekerjaan_blacklist_vendor");

	}

	public function getDaftarSuspend($id = ""){

		if(!empty($id)){

			$this->db->where("vendor_id ='".$id."'");

		}

		return $this->db->get("vnd_comment");

	}

	public function getAktivasiSuspend($code = ""){

		if(!empty($code)){

			$this->db->where("vendor_id",$code);

		}

		return $this->db->get("vw_aktivasi_suspend_vendor");

	}

	public function getUnsuspendVendor($code = ""){

		if(!empty($code)){

			$this->db->where("vendor_id",$code);

		}

		return $this->db->get("vw_unsuspend_vendor");

	}

	public function getBlacklistVendor($code = ""){

		if(!empty($code)){

			$this->db->where("vendor_id",$code);

		}

		return $this->db->get("vw_blacklist_vendor");

	}

	public function updateVendor($id = "", $data = array()){
		if(!empty($id)){
			$this->db->where("vendor_id", $id);
			if (!empty($data)) {
				return $this->db->update("vnd_header", $data);
			}
		}
	}

	//vpi lama

	public function getDataPenilaianMutu($id="",$contract_id=""){

		if (!empty($id)) {
			$this->db->where('vpm_id', $id);
		}else if (!empty($contract_id)) {
			$this->db->where('vpm_contract_id', $contract_id);
		}

		return $this->db->get('vnd_vpi_hasil_mutu_pekerjaan');

	}

		public function insertDataPenilaianMutu($data=array()){

		$this->db->insert('vnd_vpi_hasil_mutu_pekerjaan', $data);

		return $this->db->insert_id();

	}

	public function UpdateDataPenilaianMutu($data=array(), $where=array()){


		$this->db->update('vnd_vpi_hasil_mutu_pekerjaan', $data, $where);

		return $this->db->affected_rows();

	}

//

	public function getDataPenilaianKetepatanProgress($id="",$contract_id=""){

		if (!empty($id)) {
			$this->db->where('vpkp_id', $id);
		}else if (!empty($contract_id)) {
			$this->db->where('vpkp_contract_id', $contract_id);
		}

		return $this->db->get('vnd_penilaian_ketepatan_progress');

	}

		public function insertDataPenilaianKetepatanProgress($data=array()){

		$this->db->insert('vnd_penilaian_ketepatan_progress', $data);

		return $this->db->insert_id();

	}

	public function UpdateDataPenilaianKetepatanProgress($data=array(), $where=array()){


		$this->db->update('vnd_penilaian_ketepatan_progress', $data, $where);

		return $this->db->affected_rows();

	}

	public function getVndKompilasiVPI($contract_id=""){

		if (!empty($contract_id)) {
			$this->db->where('vkv_contract_id', $contract_id);
		}

		return $this->db->get('vnd_kompilasi_vpi');

	}

	public function InsertVndKompilasiVPI($data){

		$this->db->insert('vnd_kompilasi_vpi', $data);

		return $this->db->affected_rows();

	}

	public function InsertVndKompilasiVPIScore($data){

		$this->db->insert('vnd_kompilasi_vpi_score', $data);

		return $this->db->affected_rows();

	}

	public function getDataKompilasiVPI($contract_id=""){

		if (!empty($contract_id)) {
			$this->db->where('contract_id', $contract_id);
		}

		return $this->db->get('vw_kompilasi_vpi');

	}

	public function getDataDetailKompilasiVPI($contract_id=""){

		if (!empty($contract_id)) {
			$this->db->where('vkv_contract_id', $contract_id);
		}

		$this->db->join('vnd_kompilasi_vpi_score b', 'b.vkv_id = a.vkv_id');
		return $this->db->get('vnd_kompilasi_vpi a');

	}

	public function getVendorAward($vendor_id=""){
		if (!empty($vendor_id)) {
			$this->db->where('vendor_id', $vendor_id);
		}

		return $this->db->get('vw_vnd_award');
	}


	//vpi baru
	//vpi header
	public function insertVPIHeader($data=array()){

		$this->db->insert('vnd_vpi_header', $data);

		return $this->db->insert_id();

	}

	public function UpdateVPIHeader($data=array(), $where=array()){


		$this->db->update('vnd_vpi_header', $data, $where);

		return $this->db->affected_rows();

	}

	public function getVPIHeader($vnd_id="",$vvh_id="",$where=""){

		if (!empty($vnd_id)) {
			$this->db->where('vvh_vendor_id', $vnd_id);
		}
		if (!empty($vvh_id)) {
			$this->db->where('vvh_id', $vvh_id);
		}
		if (!empty($where)) {
			$this->db->where($where);
		}

		return $this->db->get('vnd_vpi_header');

	}

	//k3l5r

	public function insertVPIK3l5r($data=array()){

		$this->db->insert('vnd_vpi_k3l_5r_header', $data);

		return $this->db->insert_id();

	}

	public function UpdateVPIK3l5r($data=array(), $where=array()){


		$this->db->update('vnd_vpi_k3l_5r_header', $data, $where);

		return $this->db->affected_rows();

	}

	public function getVPIK3l5r($vvh_id="",$where=""){

		if (!empty($vvh_id)) {
			$this->db->where('vvh_id', $vvh_id);
		}
		if (!empty($where)) {
			$this->db->where($where);
		}

		return $this->db->get('vnd_vpi_k3l_5r_header');

	}

	public function insertVPIK3l5rScore($data=array()){

		$this->db->insert_batch('vnd_vpi_k3l_5r_score', $data);

		return $this->db->affected_rows();

	}

	public function UpdateVPIK3l5rScore($data=array()){

		$this->db->update_batch('vnd_vpi_k3l_5r_score', $data, 'vvks_id');

		return $this->db->affected_rows();

	}

	public function getVPIK3l5rScore($vvh_id="",$where=""){

		if (!empty($vvh_id)) {
			$this->db->where('vvh_id', $vvh_id);
		}
		if (!empty($where)) {
			$this->db->where($where);
		}

		return $this->db->get('vnd_vpi_k3l_5r_score');

	}

	//vpi pengamanan

	public function insertVPIPengamanan($data=array()){

		$this->db->insert('vnd_vpi_pengamanan', $data);

		return $this->db->insert_id();

	}

	public function UpdateVPIPengamanan($data=array(), $where=array()){


		$this->db->update('vnd_vpi_pengamanan', $data, $where);

		return $this->db->affected_rows();

	}

	public function getVPIPengamanan($vvh_id="",$where=""){

		if (!empty($vvh_id)) {
			$this->db->where('vvh_id', $vvh_id);
		}
		if (!empty($where)) {
			$this->db->where($where);
		}

		return $this->db->get('vnd_vpi_pengamanan');

	}

	public function insertVPIPengamananScore($data=array()){

		$this->db->insert_batch('vnd_vpi_pengamanan_score', $data);

		return $this->db->affected_rows();

	}

	public function UpdateVPIPengamananScore($data=array()){

		$this->db->update_batch('vnd_vpi_pengamanan_score', $data, 'vvps_id');

		return $this->db->affected_rows();

	}

	public function getVPIPengamananScore($vvh_id="",$where=""){

		if (!empty($vvh_id)) {
			$this->db->where('vvh_id', $vvh_id);
		}
		if (!empty($where)) {
			$this->db->where($where);
		}

		return $this->db->get('vnd_vpi_pengamanan_score');

	}

	//kompilasi vpi

	public function getVPIKompilasi($vvh_id=""){
		if (!empty($vvh_id)) {
			$this->db->where('vvh_id', $vvh_id);
		}

		return $this->db->get('vnd_vpi_kompilasi');
	}

	public function insertVPIKompilasi($data){

		$this->db->insert('vnd_vpi_kompilasi', $data);

		return $this->db->insert_id();
	}

	public function UpdateVPIKompilasi($data=array(), $where=array()){

		$this->db->update('vnd_vpi_kompilasi', $data, $where);

		return $this->db->affected_rows();

	}

	public function insertVPIKompilasiScore($data=array()){

		$this->db->insert_batch('vnd_vpi_kompilasi_score', $data);

		return $this->db->affected_rows();

	}

	public function UpdateVPIKompilasiScore($data=array()){

		$this->db->update_batch('vnd_vpi_kompilasi_score', $data, 'vks_id');

		return $this->db->affected_rows();

	}

	public function getVPIKompilasiScore($vvh_id="",$where=""){

		if (!empty($vvh_id)) {
			$this->db->where('vvh_id', $vvh_id);
		}
		if (!empty($where)) {
			$this->db->where($where);
		}

		return $this->db->get('vnd_vpi_kompilasi_score');

	}

	//vpi pelayanan

	public function insertVPIPelayanan($data=array()){

		$this->db->insert('vnd_vpi_pelayanan', $data);

		return $this->db->insert_id();

	}

	public function UpdateVPIPelayanan($data=array(), $where=array()){


		$this->db->update('vnd_vpi_pelayanan', $data, $where);

		return $this->db->affected_rows();

	}

	public function insertVPIPelayananScore($data=array()){

		$this->db->insert_batch('vnd_vpi_pelayanan_score', $data);
		
		return $this->db->affected_rows();

	}

	public function UpdateVPIPelayananScore($data=array()){

		$this->db->update_batch('vnd_vpi_pelayanan_score', $data, 'vppa_id');
		
		return $this->db->affected_rows();

	}

	public function getVPIPelayanan($id="",$contract_id=""){

		if (!empty($id)) {
			$this->db->where('vpp_id', $id);
		}else if (!empty($contract_id)) {
			$this->db->where('vpp_contract_id', $contract_id);
		}

		return $this->db->get('vnd_vpi_pelayanan');

	}

	public function getVPIPelayananScore($vvh_id="",$where=""){

		if (!empty($vvh_id)) {
			$this->db->where('vvh_id', $vvh_id);
		}
		if (!empty($where)) {
			$this->db->where($where);
		}

		return $this->db->get('vnd_vpi_pelayanan_score');

	}

	public function getPersetujuanSurvei()
	{
		return $this->db->select("CASE vc_active
									WHEN 3 THEN
										'Rekomendasi Survei'
									ELSE
										'Rekomendasi Tidak Survei'
									END as rekomendasi,vc.*,vh.*")
						->from("vnd_comment vc")
						->join("vw_vnd_header vh", "vh.vendor_id=vc.vendor_id")
						->where_in("vc_active", array(4, 3))
						->get();
	}

	public function getAnotherDoc($vendor_id = ""){
		if(!empty($vendor_id)){	
			$this->db->where("vendor_id", $vendor_id);
		}
		return $this->db->get("vnd_docs");
	}

	public function insertVndDoc($data = []){

		$this->db->insert('adm_vnd_doc', $data);

		return $this->db->insert_id();
	}

	public function getVndDoc($id = ""){
		
		if(!empty($id)){
			$this->db->where("avd_id", $id);
		}
		$this->db->join('vnd_type_master vtm', 'vtm.vtm_id = adm_vnd_doc.vtm_id', 'left');
		return $this->db->get("adm_vnd_doc");
	}
	
	public function updateVndDoc($id = "",$data){

		if (!empty($id)) {
			$this->db->where('avd_id', $id);
		}
		return $this->db->update('adm_vnd_doc', $data);
	}
	
	public function insertVndDocDetail($data){

		$this->db->insert('adm_vnd_doc_detail', $data);

		 $this->db->select('max(vdd_id)+1 as last_vdd_id');
		 return $this->getVndDocDetail()->row()->last_vdd_id;
	}
	
	public function getVndDocDetail($id = "", $avd = ""){
		
		if(!empty($id)){
			$this->db->where("vdd_id", $id);
		}
		if(!empty($avd)){
			$this->db->where("avd_id", $avd);
		}
		$this->db->where('vdd_status', 1);
		return $this->db->get("adm_vnd_doc_detail");
	}

	public function updateVndDocDetail($id = "" ,$data = []){

		return $this->db->where('vdd_id', $id)->update('adm_vnd_doc_detail', $data);
	}
	
	public function replaceVndDocDetail($id, $input){

		if(!empty($id) && !empty($input)){
			$vdd_id = isset($input['vdd_id']) ? $input['vdd_id'] : "";
			$check = $this->getVndDocDetail($vdd_id)->row_array();

			if(!empty($check) AND !empty($vdd_id)){
				$last_id = $check['vdd_id'];
				$this->updateVndDocDetail($last_id,$input);
			} else {
				$this->insertVndDocDetail($input);
				$last_id = $this->db->insert_id();
			}
			
			return $last_id;
		}else{
			return 0;
		}
	}

	public function deleteIfNotExistVndDocDetail($id,$new_data){
		$this->db->where_not_in("vdd_id",$new_data)->where("avd_id",$id)->update("adm_vnd_doc_detail",array("vdd_status"=>0));
		return $this->db->affected_rows();
	}

	public function getMasterVndType($id=""){
		if (!empty($id)) {
			$this->db->where('vtm_id', $id);
		}

		return $this->db->get('vnd_type_master');
	}

}

