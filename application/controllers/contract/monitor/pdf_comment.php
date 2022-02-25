<?php

$contract_id = $this->uri->segment(3, 0);

$data['id'] = $contract_id;

$this->data['dir'] = CONTRACT_FOLDER;

$kontrak = $this->Contract_m->getData($contract_id)->row_array();

// comment
$this->db->where('cad_contract_id', $kontrak['contract_id']);
$komentar = $this->db->get('ctr_comment_all_div');

// count thumbs
$thumbs_up = $this->db->where('cad_contract_id', $kontrak['contract_id']);
$thumbs_up->where('cad_respon', 't');
$thumbs_up = $this->db->get('ctr_comment_all_div');
$data['thumbs_up'] = $thumbs_up->num_rows();

$thumbs_down = $this->db->where('cad_contract_id', $kontrak['contract_id']);
$thumbs_down->where('cad_respon', 'f');
$thumbs_down = $this->db->get('ctr_comment_all_div');
$data['thumbs_down'] = $thumbs_down->num_rows();

$data['komentar'] = $komentar->result_array();
$data['com_num'] = $komentar->num_rows();

// $this->session->set_userdata("rfq_id",$ptm_number);

$this->session->set_userdata("contract_id", $contract_id);
$view = 'contract/proses_kontrak/cetak_komentar_kontrak_v';
$this->load->view($view, $data);
// $this->template($view,"Detail Kontrak (".$activity['awa_name'].")",$data);


$html = $this->output->get_output();
$html .= '<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">';
//$this->load->library('dompdf_gen');


$dompdf = new Dompdf\Dompdf();
$dompdf->set_paper('A4', 'landscape');
// $dompdf->set_option('isHtml5ParserEnabled', true);
// $dompdf->set_option('isRemoteEnabled', true);
// $dompdf->set_option("isPhpEnabled", true);
$dompdf->load_html($html);
$dompdf->render();
//$dompdf->stream("BAKP-".date('YmdHis').'-'.$rfq_id.'.pdf');
$filename = "Comment-".date('YmdHis').'.pdf';
$output = $dompdf->output();
file_put_contents('uploads/' . $filename, $output);


$data_update = array(
    'filename' => $filename,
    'is_generate' => 1,
);

//echo json_encode(array("message" => "PDF BAKP Berhasil Di Generete Dan Diupload Ke Privy", "url_file_mentah" => "https://escm.scmwika.com/uploads/".$filename));

$name_doc = "BAKP";
$full_url = base_url() . "uploads/" . $filename;
redirect($full_url);
