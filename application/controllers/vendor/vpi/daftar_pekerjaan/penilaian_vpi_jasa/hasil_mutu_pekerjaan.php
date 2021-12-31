<?php 
$view = 'vendor/vpi/daftar_pekerjaan/penilaian_vpi_jasa/hasil_mutu_pekerjaan_v';
$vvh_id = $param3;
$this->db->select('vvh_date,contract_id, vendor_id, vendor_name, start_date, end_date, subject_work, ptm_dept_id, ptm_dept_name,vvh_tipe');
$this->db->join('ctr_contract_header b', 'b.contract_id = vnd_vpi_header.vvh_contract_id');
$this->db->join('prc_tender_main a', 'a.ptm_number = b.ptm_number');
$vvh_data = $this->Vendor_m->getVPIHeader("",$vvh_id)->row_array();
$data['vvh_data'] = $vvh_data;

 $vvh_date = $vvh_data['vvh_date'];
 $vvh_date = DateTime::createFromFormat('Ym', $vvh_date ); 
 $data['vvh_data']['vvh_date_text'] = $vvh_date->format('F Y'); 
 $data['vvh_id'] = $vvh_id;

$this->db->where('ahm_status', "A");
$this->db->order_by('ahm_seq', 'asc');
$pertanyaan = $this->Administration_m->getHasilMutuPekerjaan("",'jasa')->result_array();

$this->db->where('vvh_id', $vvh_id);
$prev_data =  $this->Vendor_m->getDataPenilaianMutu()->row_array();
$data['prev_data'] = $prev_data;
$exists = false;
if (count($prev_data) > 0) {
	$data['prev_data']['vpm_value'] = str_replace('.', ',', $data['prev_data']['vpm_answer']);

	foreach ($pertanyaan as $key => $value) {
		if ($value['ahm_id'] == $prev_data['vpm_ahm_id']) {
			$exists = true;
		}
	}

	if (!$exists) {
		$this->db->where('ahm_id', $prev_data['vpm_ahm_id']);
		$this->db->order_by('ahm_seq', 'asc');
		$prev_pertanyaan = $this->Administration_m->getHasilMutuPekerjaan("",'jasa')->result_array();
		$pertanyaan = array_merge($pertanyaan, $prev_pertanyaan);
	}
	
}

$data['pertanyaan'] = $pertanyaan;

$this->template($view,"Penilaian Hasil Mutu Pekerjaan",$data);