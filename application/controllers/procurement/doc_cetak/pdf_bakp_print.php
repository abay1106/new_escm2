<?php
$this->load->library('terbilang');
$view = "procurement/doc_cetak/pdf_bakp_print_v";

$this->load->model(array("Procrfq_m", "Vendor_m", "Procedure_m", "Comment_m", "Procpanitia_m", "Contract_m"));

$rfq_id = $id;
if (isset($_POST['id'])) {
	$rfq_id = $_POST['id'];
}

$tender = $this->Procrfq_m->getMonitorRFQ($rfq_id)->row_array();

//$contract = $this->Contract_m->getMonitorByPtm($rfq_id)->row_array();

$tgl_penetapan_pemenang = $tender['ptm_completed_date'];

$nilai_hps = $this->db->where("ptm_number",$rfq_id)->get('vw_prc_tender_hps')->row_array();

$efesiensi = $nilai_hps['hps_total'] - $tender['total_contract'];

if ($efesiensi <= 0) {
	$efesiensi = 0;
}

$eval = $this->Procrfq_m->getEvalViewRFQ("",$rfq_id)->result_array();

$first_price = array();

$this->db->distinct()->select("ptv_vendor_code");
$history = $this->Procrfq_m->getVendorQuoHistRFQ($tender['vendor_id'],$rfq_id)->result_array();

foreach ($history as $key => $value) {
	if(!isset($first_price[$value['ptv_vendor_code']])){
		$this->db->distinct()->select("total,total_ppn")->order_by("pqm_created_date","asc");
		$dat = $this->Procrfq_m->getVendorQuoHistRFQ($value['ptv_vendor_code'],$rfq_id)->row_array();
		$first_price[$value['ptv_vendor_code']] = array(
			"total"=>$dat['total'],
			"total_ppn"=>$dat['total_ppn'],
			);
	}
}

$data['first_price'] = $first_price;

$panitia = $this->Procpanitia_m->getPanitiaAnggota($tender['adm_bid_committee'])->result_array();

$vendor_verifikasi = $this->Procrfq_m->getVendorBidderRFQ($rfq_id)->result_array();

$getDataUskep = $this->Procrfq_m->getUskepData($rfq_id)->row_array();

if (isset($_POST['kota'])) {
	
	if ($getDataUskep) {
		$data_update = array(
			'bakp_city' => $_POST['kota'],
			'bakp_catatan' => implode(";", $_POST['catatan']),
			'bakp_kpd_name' => implode(";", $_POST['panitia_name']),
			//'bakp_kpd_cat' => implode(";", $_POST['panitia_category']),
			'bakp_kpd_as' => implode(";", $_POST['panitia_ketua']),
			'bakp_catatan_penawran' => implode(";", $_POST['catatan_penawran']),
		);
		$this->Procrfq_m->updateDataUskep($rfq_id, $data_update);
		$getDataUskep = $this->Procrfq_m->getUskepData($rfq_id)->row_array();
	} else {
		
		$this->Procrfq_m->insertDataUskep(array(
			'rfq_number' => $rfq_id,
			'bakp_city' => $_POST['kota'],
			'bakp_catatan' => implode(";", $_POST['catatan']),
			'bakp_kpd_name' => implode(";", $_POST['panitia_name']),
			//'bakp_kpd_cat' => implode(";", $_POST['panitia_category']),
			'bakp_kpd_as' => implode(";", $_POST['panitia_ketua']),
			'bakp_catatan_penawran' => implode(";", $_POST['catatan_penawran']),
		));
		$getDataUskep = $this->Procrfq_m->getUskepData($rfq_id)->row_array();
		
	}
}

$data=array(
	'tender' => $tender,
	'tgl_penetapan_pemenang' => $tgl_penetapan_pemenang,
	'nilai_hps' => $nilai_hps['hps_total'],
	'efesiensi' => $efesiensi,
	'first_price' => $first_price,
	'evaluation' => $eval,
	'panitia' => $panitia,
	'contract_number' => $rfq_id,
	'kota' => $getDataUskep['bakp_city'],
	'catatan' => explode(";", $getDataUskep['bakp_catatan']),
	'panitia_category' => explode(";", $getDataUskep['bakp_kpd_cat']),
	'panitia_ketua' => explode(";", $getDataUskep['bakp_kpd_as']),
	'panitia_name' => explode(";", $getDataUskep['bakp_kpd_name']),
	'bakp_catatan_penawran' => explode(";", $getDataUskep['bakp_catatan_penawran']),
	'vendor_verifikasi' => $vendor_verifikasi,
	'data_uskep' => $getDataUskep,
	'ptm_id' => $rfq_id,
);

//print_r($tender);

$this->load->view($view,$data);
//$this->template($view,"Generate PDF BAKP",$data);


$html = $this->output->get_output();
//$this->load->library('dompdf_gen');


$dompdf= new Dompdf\Dompdf();
$dompdf->set_paper('a4');
$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->set_option('isRemoteEnabled', true);   
$dompdf->set_option("isPhpEnabled", true);
$dompdf->load_html($html);
$dompdf->render();
//$dompdf->stream("BAKP-".date('YmdHis').'-'.$rfq_id.'.pdf');
$filename = "BAKP-".date('YmdHis').'-'.$rfq_id.'.pdf';
$output = $dompdf->output();
file_put_contents('uploads/'.$filename, $output);

$data_update = array(
	'filename' =>$filename,
	'is_generate'=>1,
);
$this->Procrfq_m->updateDataUskep($rfq_id, $data_update);

//echo json_encode(array("message" => "PDF BAKP Berhasil Di Generete Dan Diupload Ke Privy", "url_file_mentah" => "https://escm.scmwika.com/uploads/".$filename));

$name_doc = "BAKP";
$full_url = base_url()."uploads/".$filename;
$full_url_upload = base_url()."index.php/procurement/privyupload/".$rfq_id.'/'.$filename;
redirect($full_url);

// echo "<br><br><center><b>File PDF $name_doc Berhasil Dibuat</b></center><br><br>".
// "<center><a target='_blank' href = '$full_url'> Preview PDF  </a>&nbsp;&nbsp;|&nbsp;&nbsp;<a target='_blank' href = '$full_url_upload'>Upload To Privy </a></center>";

exit;


