<?php

$error = false;

$post = $this->input->post();

$id = $post['id'];

$last_comment = $this->Comment_m->getContract("",$id,"")->row_array();

$last_activity = (!empty($last_comment)) ? $last_comment['activity'] : 2000;

$ptm_number = $last_comment['tender_id'];

$this->db->select('pr_number');
$this->db->where('ptm_number', $ptm_number);
$getNoPR = $this->db->get('vw_prc_monitor')->row_array();

$permintaan = $this->Procpr_m->getPR($getNoPR['pr_number'])->row_array();

$perencanaan_id = $permintaan['ppm_id'];

$contract_id = $last_comment['contract_id'];

$tender = $this->Procrfq_m->getRFQ($last_comment['tender_id'])->row_array();

$input = array();

$input_doc = array();

$input_item = array();

$input_prep = array();

$userdata = $this->data['userdata'];

$pelaksana_id = $userdata['employee_id'];

$position = $this->Administration_m->getPosition("PIC USER");

if(!$position){
  //$this->noAccess("Hanya PIC USER yang dapat membuat permintaan pengadaan");
}

if($last_activity == 2000){

  $contract = $this->Contract_m->getContractNew($ptm_number)->row_array();

  $input['ptm_number'] = $ptm_number;
  $input['vendor_id'] = $contract['vendor_id'];
  $input['vendor_name'] = $contract['vendor_name'];
  $input['subject_work'] = $contract['ptm_subject_of_work'];
  $input['scope_work'] = $contract['ptm_scope_of_work'];
  $input['contract_type'] = $contract['ptm_contract_type'];
  $input['completed_tender_date'] = $contract['ptm_completed_date'];
  $input['contract_amount'] = $contract['total_contract'];

  if(isset($post['manager_kontrak_inp'])){
    $this->form_validation->set_rules("manager_kontrak_inp", "Manager Kontrak", 'required|max_length['.DEFAULT_MAXLENGTH.']');
  }

  $pelaksana_id = (isset($post['manager_kontrak_inp'])) ? $post['manager_kontrak_inp'] : null;

  $this->db->where("job_title","MANAJER PENGADAAN");

  $pelaksana = $this->Administration_m->getUserRule($pelaksana_id)->row_array();

  if(!empty($pelaksana)){
    $input['ctr_man_employee'] = $pelaksana['employee_id'];
    $input['ctr_man_pos'] = $pelaksana['pos_id'];
    $input['ctr_man_pos_name'] = $pelaksana['pos_name'];
  }

}

if($last_activity == 2001){

  if(isset($post['pelaksana_kontrak_inp'])){
    $this->form_validation->set_rules("pelaksana_kontrak_inp", "Pelaksana Kontrak", 'required|max_length['.DEFAULT_MAXLENGTH.']');
  }

  $pelaksana_id = (isset($post['pelaksana_kontrak_inp'])) ? $post['pelaksana_kontrak_inp'] : null;

  $this->db->where("job_title","PENGELOLA KONTRAK");

  $pelaksana = $this->Administration_m->getUserRule($pelaksana_id)->row_array();

  if(!empty($pelaksana)){
    $input['ctr_spe_employee'] = $pelaksana['employee_id'];
    $input['ctr_spe_pos'] = $pelaksana['pos_id'];
    $input['ctr_spe_pos_name'] = $pelaksana['pos_name'];
  }

}

$status_id = $post['status_inp'][0];

if(in_array($last_activity, array(2010, 2030))){

  // $this->form_validation->set_rules("nama_bank_inp", "Institusi Keuangan", 
  //   'required|max_length['.DEFAULT_MAXLENGTH.']');
  // $this->form_validation->set_rules("no_jaminan_inp", "No Jaminan", 
  //   'required|max_length['.DEFAULT_MAXLENGTH.']');
  // $this->form_validation->set_rules("nilai_jaminan_inp", "Nilai Jaminan", 
  //   'required|max_length['.DEFAULT_MAXLENGTH.']');
  // $this->form_validation->set_rules("mulai_berlaku_inp", "Mulai Berlaku", 
  //   'required|max_length['.DEFAULT_MAXLENGTH.']');
  // $this->form_validation->set_rules("berlaku_hingga_inp", "Berlaku Hingga", 
  //   'required|max_length['.DEFAULT_MAXLENGTH.']');
  // $this->form_validation->set_rules("jaminan_file_inp", "File Jaminan", 
  //   'required|max_length['.DEFAULT_MAXLENGTH.']');
  $this->form_validation->set_rules("jenis_kontrak_inp", "Jenis Kontrak", 
    'required|max_length['.DEFAULT_MAXLENGTH.']');
  $this->form_validation->set_rules("tgl_mulai_inp", "Tanggal Mulai Kontrak", 
    'required|max_length['.DEFAULT_MAXLENGTH.']');
  $this->form_validation->set_rules("tgl_akhir_inp", "Tanggal Akhir Kontrak", 
    'required|max_length['.DEFAULT_MAXLENGTH.']');

  $input['created_date'] = date("Y-m-d H:i:s");
  $input['pf_bank'] = $post['nama_bank_inp'];
  $input['pf_amount'] = moneytoint($post['nilai_jaminan_inp']);
  $input['pf_number'] = $post['no_jaminan_inp'];
  $input['pf_start_date'] = (!empty($post['mulai_berlaku_inp'])) ? date("Y-m-d",strtotime($post['mulai_berlaku_inp'])) 
  : null;
  $input['pf_end_date'] = (!empty($post['berlaku_hingga_inp'])) ? date("Y-m-d",strtotime($post['berlaku_hingga_inp'])) 
  : null;
  $input['pf_attachment'] = $post['jaminan_file_inp'];
  $input['ctr_currency'] = $post['currency_inp'];
  
}

if(in_array($last_activity, array(2010))){



  $getctr = $this->db->select("*")->like("ptm_number", $ptm_number)->get("ctr_contract_header")->result_array();
  $tenary = $this->Procrfq_m->getRFQ($ptm_number)->row_array();
    
  if($tenary["isjoin"] == NULL){ //normal

    $plans = $this->db->select("*")
                      ->join("prc_pr_main y", "y.ppm_id = z.ppm_id")
                      ->join("prc_tender_main x", "x.pr_number = y.pr_number")
                      ->where(array("x.ptm_number" => $ptm_number))
                      ->get("prc_plan_main z")
                      ->row_array();

    $totalhps = $this->Procrfq_m->getHPSRFQ($ptm_number)->row_array();
    $amount = "";
  
    foreach ($getctr as $keys => $vals) {
      if($vals['created_date'] == NULL){
        $amount += $vals['contract_amount']; 
        $diff = floatval($totalhps['hps_total']) - floatval($amount);
        $remain = $plans['ppm_sisa_anggaran']+$diff;
        $hist = array(
                  'ppm_id' => $plans['ppm_id'],
                  'pph_main' => $plans['ppm_sisa_anggaran'],
                  'pph_plus' => $diff,
                  'pph_remain' => $remain,
                  'pph_date' => date("Y-m-d H:i:s"),
                  'pph_desc' => 2010,
                  'pph_first' => $vals['contract_id'],
                  'pph_mod' => $ptm_number
                );
        //insert history anggaran
        // $this->Procplan_m->insertHist($hist);
        // $this->Procplan_m->updateDataPerencanaanPengadaan($plans['ppm_id'], $hist['pph_remain']);
      }
    }

    
  }else{ //jika join paket

  }

  // exit();
  //y end

  if(isset($post['min_qty'])){

    foreach ($post['min_qty'] as $key => $min) {

      $max = $post['max_qty'][$key];

      if($max < $min || $min < 0){

        $this->setMessage("/ dan Jumlah maksimum tidak boleh dibawah jumlah minimum");

        if(!$error){
          $error = true;
        }

      }

    }

  }

}

if(in_array($last_activity, array(2030))){

  $contract = $this->Contract_m->getData($contract_id)->row_array();
  
  $tipe_pengadaan = $this->Administration_m->isHeadQuatersProcurement($ptm_number);

  $getdept = $this->db->select("dep_code")
  ->join("adm_dept","ptm_dept_id=dept_id")
  ->where("ptm_number",$ptm_number)
  ->get("prc_tender_main")
  ->row()->dep_code;

  $input['contract_number'] = $this->Contract_m->getUrut("", $contract['contract_type'], $post['jenis_kontrak_inp'], $tipe_pengadaan, $getdept);

}

if(in_array($last_activity, array(2010,2030))){

  $contract = $this->Contract_m->getData($contract_id)->row_array();

  $input['subject_work'] = $post['subject_work_inp'];
  $input['scope_work'] = $post['scope_work_inp'];
  $input['contract_type_2'] = $post['jenis_kontrak_inp'];
  $input['ctr_item_type'] = $post['item_kontrak_inp'];

  $mulai = $post['tgl_mulai_inp'];
  $akhir = $post['tgl_akhir_inp'];
  if ($last_activity == 2030) {
  $sign = $post['tgl_sign_inp'];//tambah
  }
  $input['start_date'] = (!empty($mulai)) ? date("Y-m-d",strtotime($mulai)) : null;
  $input['end_date'] = (!empty($mulai)) ? date("Y-m-d",strtotime($akhir)) : null;
  if ($last_activity == 2030) {
    $input['sign_date'] = (!empty($mulai)) ? date("Y-m-d",strtotime($sign)) : null;//tambah
  }  
  if(strtotime($akhir) < strtotime($mulai)){
    $this->setMessage("Tanggal berakhir kontrak tidak boleh kurang dari tanggal mulai kontrak");
    if(!$error){
      $error = true;
    }
  }

  if($contract['contract_type'] != "HARGA SATUAN" && !empty($status_id) && $status_id == 444){

    $milestone = 0.0;

    if(isset($post['milestone_percent'])){

      foreach ($post['milestone_percent'] as $key => $value) {
      //echo moneytoint($value)."<br/>";
        $milestone += moneytoint($value);
      }

    }

    if($milestone != 100.0) {
      $this->setMessage("Milestone harus 100%");
      if(!$error){
        $error = true;
      }
    }

  }

}

$input_doc = array();

$input_milestone = array();

$n = 0;

$this->form_validation->set_rules("id", 'ID', 'required');

foreach ($post as $key => $value) {

  if(is_array($value)){

    foreach ($value as $key2 => $value2) { 

      $this->form_validation->set_rules($key."[".$key2."]", '', '');

      if(isset($post['doc_id_inp'][$key2])){
        $input_doc[$key2]['doc_id'] = $post['doc_id_inp'][$key2];
      }

      if(isset($post['doc_category_inp'][$key2])){
        $this->form_validation->set_rules("doc_category_inp[$key2]", "lang:code #$key2", 'max_length['.DEFAULT_MAXLENGTH.']');
        $input_doc[$key2]['category']= $post['doc_category_inp'][$key2];
      }
      if(isset($post['doc_desc_inp'][$key2])){
        $this->form_validation->set_rules("doc_desc_inp[$key2]", "lang:description #$key2", 'max_length['.DEFAULT_MAXLENGTH_TEXT.']');
        $input_doc[$key2]['description']= $post['doc_desc_inp'][$key2];
      }
      if(isset($post['doc_attachment_inp'][$key2])){
        $this->form_validation->set_rules("doc_attachment_inp[$key2]", "lang:attachment #$key2", 'max_length['.DEFAULT_MAXLENGTH.']');
        $input_doc[$key2]['filename']= $post['doc_attachment_inp'][$key2];
      }

      if(isset($post['doc_vendor_inp'][$key2])){
        $this->form_validation->set_rules("doc_vendor_inp[$key2]", "lang:attachment #$key2", 'max_length['.DEFAULT_MAXLENGTH.']');
        $input_doc[$key2]['publish']= $post['doc_vendor_inp'][$key2];
      }

      if(isset($post['milestone_percent'][$key2])){

        $this->form_validation->set_rules("milestone_percent[$key2]", "Bobot Milestone #$key2", 'max_length['.DEFAULT_MAXLENGTH.']');
        $this->form_validation->set_rules("milestone_desc[$key2]", "Jumlah Milestone #$key2", 'max_length['.DEFAULT_MAXLENGTH_TEXT.']');
        $this->form_validation->set_rules("milestone_date[$key2]", "Tanggal Milestone #$key2", 'max_length['.DEFAULT_MAXLENGTH.']');
        
        if(!empty($post['milestone_id'][$key2])){
          $input_milestone[$key2]['milestone_id']=$post['milestone_id'][$key2];
        }

        $input_milestone[$key2]['percentage']=moneytoint($post['milestone_percent'][$key2]);
        $input_milestone[$key2]['description']=$post['milestone_desc'][$key2];
        $input_milestone[$key2]['target_date']=$post['milestone_date'][$key2];

      }

    }

    $n++;

  }

}


if ($this->form_validation->run() == FALSE || $error){

  $this->renderMessage("error");

} else {

  $this->db->trans_begin();


  if(!empty($input)){

    $act = $this->Contract_m->updateData($contract_id,$input);

  } else {

    $act = true;

  }

  $complete_comment = 1;

    //if($act){

  if(!empty($input_doc)){

    $deleted = array();

    foreach ($input_doc as $key => $value) {
      $value['contract_id'] = $contract_id;
      $id = (isset($value['doc_id'])) ? $value['doc_id'] : "";
      $act = $this->Contract_m->replaceDoc($id,$value);
      if($act){
        $deleted[] = $act;
      }
    }

    $this->Contract_m->deleteIfNotExistDoc($contract_id,$deleted);

  }

  if(!empty($input_milestone)){

    $deleted = array();

    foreach ($input_milestone as $key => $value) {
      $value['contract_id'] = $contract_id;
      $act = $this->Contract_m->replaceMilestone($key,$value);
      if($act){
        $deleted[] = $act;
      }
    }

    $this->Contract_m->deleteIfNotExistMilestone($contract_id,$deleted);

  }

  if(isset($post['tax_ppn'])){

    foreach ($post['tax_ppn'] as $key => $value) {
      $getitem = $this->db->where("contract_item_id",$key)->get("ctr_contract_item")->row_array();
      $ppn = $value;
      $pph = (!empty($post['tax_pph'][$key])) ? $post['tax_pph'][$key] : NULL;
      $input['sub_total'] = (1+(($ppn+$pph)/100))*($getitem['price']*$getitem['qty']);
      $input = array("ppn"=>$ppn,"pph"=>$pph);
      if(isset($post['min_qty'])){
        $input['min_qty'] = $post['min_qty'][$key];
      }
      if(isset($post['max_qty'])){
        $input['max_qty'] = $post['max_qty'][$key];
      }
      $this->db->where("contract_item_id",$key)->update("ctr_contract_item",$input);
    }

  }

  $response = $post['status_inp'][0];

  $com = $post['comment_inp'][0];

  $attachment = $post['comment_attachment_inp'][0];

//hlmifzi
if ($last_activity == 2901) {
  //start code hlmifzi
  // di comment karena penilaian vendor di kontrak aktif tidak digunakan
  
  // $jumlah = count($post['id_question']);
  // $penilaian = [];
  // $contract = $this->Contract_m->getContractNew($ptm_number)->row_array();

  // for ($a=0; $a < $jumlah; $a++) { 
  //   $penilaian[$a]['contract_id']= $contract_id;
  //   $penilaian[$a]['vendor_id']= $contract['vendor_id'];
  //   $penilaian[$a]['ccp_id_question']= $post['id_question'][$a];
  //   $penilaian[$a]['ccp_answer']= $post['jawaban'][$a];
  //   $penilaian[$a]['ccp_id_commodity_cat']=$post['id_commodity_cat'];
  //   $penilaian[$a]['user_created']=$userdata['employee_id'];
  //   $penilaian[$a]['date_created']=date('Y-m-d h:i:s');
  //   $penilaian[$a]['aktif']=1;
  // }

// foreach ($penilaian as $key => $value) {
//     $this->db->insert('ctr_contract_penilaian',$penilaian[$key]);
//   }

}

  $return = $this->Procedure2_m->ctr_contract_comment_complete($ptm_number,$userdata['complete_name'],$last_activity,$response,$com,$attachment,$last_comment['comment_id'],$contract_id,$userdata['employee_id']);

  if ($return['nextactivity'] == 2902) {
     $check_vol = $this->Procplan_m->getVolumeHist("","",$ptm_number)->result_array();
      if (count($check_vol) > 0) {
      $getVolItem = $this->Procrfq_m->getItemRFQ("",$ptm_number)->result_array();
        foreach ($getVolItem as $key => $vol_value) {
          $getVolumeHist = $this->Procplan_m->getVolumeHist($vol_value['ppi_code'],"",$ptm_number)->row_array();
          $getLastHist = $this->Procplan_m->getVolumeHist($vol_value['tit_code'],$perencanaan_id)->row_array();

          $this->db->select('ppv_minus');
          $this->db->where('ppv_minus !=', 0);
          $getMinusVol = $this->Procplan_m->getVolumeHist($vol_value['tit_code'],$perencanaan_id,$ptm_number)->row_array();

           $dataVolume = array(
              'ppm_id' => $getVolumeHist['ppm_id'],
              'ppv_main' => $getLastHist['ppv_remain'],
              'ppv_minus' => 0,
              'ppv_plus' => $getMinusVol['ppv_minus'],
              'ppv_remain' => ($getLastHist['ppv_remain'] + $getMinusVol['ppv_minus']),
              'ppv_activity' =>  $return['nextactivity'],
              'ppv_no' => $ptm_number,
              'ppv_smbd_code' => $getVolumeHist['ppv_smbd_code'],
              'ppv_unit' => $getVolumeHist['ppv_unit'],
              'ppv_prc' => 'CTR',
              'created_datetime' => date("Y-m-d H:i:s"),
            );

            $volumeHist = $this->Procplan_m->insertVolumeHist($dataVolume);
        }
      }
    }elseif (!empty($return['nextactivity'])) {
       $check_vol = $this->Procplan_m->getVolumeHist("","",$ptm_number)->result_array();

      // if (count($check_vol) > 0) {
      // $getVolItem = $this->Procrfq_m->getItemRFQ("",$ptm_number)->result_array();
      //     foreach ($getVolItem as $key => $vol_value) {
      //       $getVolumeHist = $this->Procplan_m->getVolumeHist($vol_value['ppi_code'],"",$ptm_number)->row_array();
      //       $getLastHist = $this->Procplan_m->getVolumeHist($vol_value['tit_code'],$perencanaan_id)->row_array();

      //     $this->db->select('ppv_minus');
      //     $this->db->where('ppv_minus !=', 0);
      //     $getMinusVol = $this->Procplan_m->getVolumeHist($vol_value['tit_code'],$perencanaan_id,$ptm_number)->row_array();

      //        $dataVolume = array(
      //           'ppm_id' => $getVolumeHist['ppm_id'],
      //           'ppv_main' => $getLastHist['ppv_remain'],
      //           'ppv_minus' => 0,
      //           'ppv_plus' => 0,
      //           'ppv_remain' => ($getLastHist['ppv_remain']),
      //           'ppv_activity' =>  $return['nextactivity'],
      //           'ppv_no' => $ptm_number,
      //           'ppv_smbd_code' => $getVolumeHist['ppv_smbd_code'],
      //           'ppv_unit' => $getVolumeHist['ppv_unit'],
      //           'ppv_prc' => $getVolumeHist['ppv_prc'],
      //           'created_datetime' => date("Y-m-d H:i:s"),
      //         );

      //         $volumeHist = $this->Procplan_m->insertVolumeHist($dataVolume);
      //     }
      //   }

    }
// var_dump($return);
// exit();


  if(!empty($return['nextactivity'])){

      //haqim
      //if ($response == '445') {
        $ccc_user = null;
      // } else {
      //   $ccc_user = $pelaksana_id;
      // }

      // print_r($return);
      // die();
      $comment = $this->Comment_m->insertContract($ptm_number,$return['nextactivity'],"","","",$return['nextposcode'],$return['nextposname'],$contract_id,$ccc_user);

    //previous
   // $comment = $this->Comment_m->insertContract($ptm_number,$return['nextactivity'],"","","",$return['nextposcode'],$return['nextposname'],$contract_id,$pelaksana_id);
      // end

      //end
 }


  if ($return['nextactivity'] == "2901") {
    $data = $this->Contract_m->getData($contract_id)->row_array();

    /////ctr_po_header
		$po['po_number'] = $this->Contract_m->getUrutWOMatgis(); //$dl['wo_number'];
		$po['creator_employee'] = $data["ctr_spe_employee"];
		$po['creator_pos'] = $data["ctr_spe_pos"];
		$po['contract_id'] = $data["contract_id"];
		$po['vendor_id'] = $data["vendor_id"];
		$po['vendor_name'] = $data["vendor_name"];
		$po['start_date'] = $data["start_date"];
		$po['end_date'] = $data["end_date"];
		$po['created_date'] = $data["created_date"];
		$po['currency'] = $data["currency"];
		$po['status'] = '2017';
		$po['po_notes'] = $data["scope_work"];
		$po['approved_date'] = date('Y-m-d H:i:s');
		$po['current_approver_pos'] = $data["current_approver_pos"];
		$po['current_approver_level'] = $data["current_approver_level"];
		//$po['current_approver_id'] = $data["current_approver_id"];
		$po['dept_code'] = $data["dept_code"];
		$po['spk_code'] = $data["spk_code"];
		//$po['ctr_doc'] = $data->file_contract;
		$po['ctr_amount'] = $data["contract_amount"];
		$po['type_of_plan'] = $data["type_of_plan"];
		$res3 = $this->Contract_m->insertWOData($po);
		/////ctr_po_item
		$product = $this->Contract_m->getItem("",$contract_id)->result_array();
		$idpo = $this->Contract_m->getDataWO("",$contract_id)->row_array();
		// print_r($product);
		// print_r($idpo);
		if (!empty($product)) {
			foreach ($product as $key => $pro) {
				
				$pd['po_id'] = $idpo["po_id"];
				$pd['contract_item_id'] = $pro["contract_item_id"];
				$pd['item_code'] = $pro["item_code"];
				$pd['short_description'] = $pro["short_description"];
				$pd['long_description'] = $pro["long_description"];
				$pd['price'] = $pro["price"];
				$pd['qty'] = $pro["qty"];
				$pd['uom'] = $pro["uom"];
				$pd['sub_total'] = $pro["sub_total"];
				$pd['ppn'] = 0;
				$pd['pph'] = 0;
				$this->Contract_m->insertWOItem($pd);	
			}
		}
    /////ctr_wo_header
		$dl['wo_id'] = $idpo["po_id"];
		$dl['wo_number'] = $this->Contract_m->getUrutWOMatgis();
		$dl['creator_employee'] = $data["ctr_spe_employee"];
		$dl['creator_pos'] = $data["ctr_spe_pos"];
		$dl['contract_id'] = $data["contract_id"];
		$dl['vendor_id'] = $data["vendor_id"];
		$dl['vendor_name'] = $data["vendor_name"];
		$dl['created_date'] = $data["created_date"];
		$dl['currency'] = 'IDR';
		$dl['status'] = '2033';
		$dl['start_date'] = $data["start_date"];
		$dl['end_date'] = $data["end_date"];
		// $dl['ctr_doc'] = $data->file_contract;
		$dl['ctr_amount'] = $data["contract_amount"];
		$dl['approved_date'] = date('Y-m-d H:i:s');
		$dl['current_approver_pos'] = $data["current_approver_pos"];
		$dl['current_approver_level'] = $data["current_approver_level"];
		// $dl['current_approver_id'] = $data->current_approver_id;
		$dl['dept_code'] = $data["dept_code"];
		$dl['dept_id'] = $data["dept_id"];
		//$dl['si_total'] = $data->si_total;
		//$dl['sj_total'] = $data->sj_total;
		//$dl['invoice_total'] = $data->invoice_total;
		// $dl['sppm_total'] = $data->sppm_total;
		$dl['spk_number'] = $data["spk_code"];
		$dl['spk_name'] = $data["subject_work"];
		$res = $this->Contract_m->insertWODataMatgis($dl);
    /////ctr_wo_item
		$idwo = $this->Contract_m->getDataWO("",$contract_id)->row_array();
		$product = $this->Contract_m->getItem("",$contract_id)->result_array();
		if (!empty($product)) {
			foreach ($product as $key => $pro) {
				$p['wo_id'] = $idwo['po_id'];
				$p['contract_item_id'] = $pro["contract_item_id"];
				$p['item_code'] = $pro["item_code"];
				$p['short_description'] = $pro["short_description"];
				$p['long_description'] = $pro["long_description"];
				$p['price'] = $pro["price"];
				$p['qty'] = $pro["qty"];
				$p['uom'] = $pro["uom"];
				$p['sub_total'] = $pro["sub_total"];
				$p['ppn'] = 0;
				$p['pph'] = 0;
				$this->Contract_m->insertWOItemMatgis($p);	
			}
		}

		///////ctr_sppm_header
		$idwo = $this->Contract_m->getDataWO("",$contract_id)->row_array();
		$sp['sppm_number'] = $data["contract_number"];
		$sp['creator_employee'] = $data["ctr_spe_employee"];
		$sp['creator_pos'] = $data["ctr_spe_pos"];
		$sp['contract_id'] = $data["contract_id"];
		$sp['vendor_id'] = $data["vendor_id"];
		$sp['wo_id'] = $idwo['po_id'];
		$sp['sppm_date'] = date("Y-m-d h:i:sa");
		$sp['created_date'] = date("Y-m-d h:i:sa");
		$sp['tgl_expected_delivery'] = date("Y-m-d h:i:sa",strtotime('+3 days'));
		$sp['sppm_total'] = $data["contract_amount"];
		$sp['sppm_notes'] = $data["notes"];
		$sp['current_approver_pos'] = $data["current_approver_pos"];
		$sp['current_approver_level'] = $data["current_approver_level"];
		//$sp['current_approver_id'] = $data->current_approver_id;
		$sp['approved_date'] = date("Y-m-d h:i:sa");
		
		$res2 = $this->Contract_m->insertSPPMMatgis($sp);
    /////ctr_sppm_item
		$idpo = $this->Contract_m->getDataWO("",$contract_id)->row_array();
		$idsppm = $this->Contract_m->getDataSppm("",$idpo['po_id'])->row_array();
		$product = $this->Contract_m->getItem("",$contract_id)->result_array();
		if (!empty($product)) {
			foreach ($product as $key => $pro) {
				$spi['sppm_id'] = $idsppm['sppm_id'];
				$spi['contract_item_id'] = $pro["contract_item_id"];
				$spi['item_code'] = $pro["item_code"];
				$spi['short_description'] = $pro["short_description"];
				$spi['long_description'] = $pro["long_description"];
				$spi['price'] = $pro["price"];
				$spi['qty'] = $pro["qty"];
				$spi['uom'] = $pro["uom"];
				$spi['sub_total'] = $pro["sub_total"];
				$spi['ppn'] = 0;
				$spi['pph'] = 0;
				$this->Contract_m->insertSPPMItemMatgis($spi);	
			}
    }
    
    $ress = $this->Contract_m->push_kode_nasabah($contract['vendor_id']);

    $nasabahStat = (json_decode($ress, true));
      
    if ($nasabahStat['status'] == "success") {
      $cust = str_replace("kode_nasabah = ", "", $nasabahStat['message']);
      $this->db->where("vendor_id", $contract['vendor_id'])->update("vnd_header", array("nasabah_code" => $cust));
      $this->setMessage("Kode nasabah ".$cust);
    }
    else if($nasabahStat != NULL){
      
      foreach ($nasabahStat['message'] as $k => $v) {
        $msg = str_replace("harus diisi", "vendor belum ada", $v['keterangan']);
        $this->setMessage($msg);
      }
      $this->setMessage("Gagal generate kode nasabah vendor, silahkan hubungi admin<p>");
      $error = true;
    }
  }


 if(!empty($return['message'])){
  $this->setMessage($return['message']);
  if(!$error){
    $error = true;
  }
}


if(!$error){
  if ($this->db->trans_status() === FALSE)  {
    $this->setMessage("Gagal mengubah data");
    $this->db->trans_rollback();
  }
  else  {
    $this->setMessage("Sukses mengubah data");
    $this->db->trans_commit();
  }
  
  $this->renderMessage("success",site_url("contract/daftar_pekerjaan"));
} 
else {
  $this->renderMessage("error");
}

}
