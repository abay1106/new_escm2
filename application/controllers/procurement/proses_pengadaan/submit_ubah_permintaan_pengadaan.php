<?php

$post = $this->input->post();

$id = $post['id'];

$last_comment = $this->Comment_m->getProcurementPR("",$id)->row_array();

$pr_number = $last_comment['tender_id'];

$tender = $this->Procpr_m->getPR()->row_array();

$input = array();

$userdata = $this->data['userdata'];

$position = $this->Administration_m->getPosition("PIC USER");

if(!$position){
  $this->noAccess("Hanya PIC USER yang dapat membuat permintaan pengadaan");
}

//haqim
$permintaan = $this->Procpr_m->getPR($pr_number)->row_array();

// $perencanaan_id = (isset($post['perencanaan_pengadaan_inp'])) ? $post['perencanaan_pengadaan_inp'] : $tender['ppm_id'];
$perencanaan_id = (isset($post['perencanaan_pengadaan_inp'])) ? $post['perencanaan_pengadaan_inp'] : (!empty($permintaan) ? $permintaan['ppm_id'] : $tender['ppm_id']);
//end

$perencanaan = $this->Procplan_m->getPerencanaanPengadaan($perencanaan_id)->row_array();

$prhist = $this->Procplan_m->getHist($pr_number, $perencanaan_id)->row_array();
 
$lasthist = $this->Procplan_m->getHist("", $perencanaan_id)->row_array();

$error = false;

if($last_comment['activity'] == 1000){

if ($post['status_inp'][0] == '287') {
  $this->form_validation->set_rules("tipe_pr", "Jenis PR", 'required|max_length['.DEFAULT_MAXLENGTH.']'); 
    
  if($post['sisa_pagu_inp'] < 0){
    $this->setMessage("Nilai HPS tidak boleh melebihi sisa anggaran");
    $error = true;
  }

}

$input['pr_subject_of_work']= (isset($post['nama_pekerjaan'])) ? $post['nama_pekerjaan'] : $perencanaan['ppm_subject_of_work'];
$input['pr_scope_of_work']= (isset($post['deskripsi_pekerjaan'])) ? $post['deskripsi_pekerjaan'] : $perencanaan['ppm_scope_of_work'];
$input['pr_pagu_anggaran']= (isset($post['total_pagu_inp'])) ? $post['total_pagu_inp'] : $perencanaan['ppm_pagu_anggaran'];
$input['pr_sisa_anggaran']= $perencanaan['ppm_sisa_anggaran'];
//haqim
$input['pr_project_name']=$perencanaan['ppm_project_name']; //y
$input['pr_type_of_plan']=$perencanaan['ppm_type_of_plan']; //y
$input['pr_spk_code']=$perencanaan['ppm_project_id'];
$input['pr_type']=$post['tipe_pr'];//y
$input['pr_packet']=$post['nama_paket'];//y
$input['isjoin']=(isset($post['joinpr'])) ? $post['joinpr'] : NULL ;//y
//end

  if(isset($post['perencanaan_pengadaan_inp'])){
    $this->form_validation->set_rules("perencanaan_pengadaan_inp", "Nomor Perencanaan Pengadaan", 'required|max_length['.DEFAULT_MAXLENGTH.']');
  }

  if(isset($post['lokasi_kebutuhan_inp'])){
    $this->form_validation->set_rules("lokasi_kebutuhan_inp", "Lokasi Kebutuhan", 'required|max_length['.DEFAULT_MAXLENGTH_TEXT.']');
    $input['pr_district_id']=$post['lokasi_kebutuhan_inp'];
  }
  if(isset($post['lokasi_pengiriman_inp'])){
    // haqim
    // $this->form_validation->set_rules("lokasi_pengiriman_inp", "Lokasi Pengiriman", 'required|max_length['.DEFAULT_MAXLENGTH.']');
    //end
    $input['pr_delivery_point_id']=$post['lokasi_pengiriman_inp'];
  }
  if(isset($post['jenis_kontrak_inp'])){
    $input['pr_contract_type']=$post['jenis_kontrak_inp'];
  }

if($input['pr_sisa_anggaran'] < 0){
  $this->setMessage("Sisa anggaran tidak boleh kurang dari 0");
  $error = true;
}

if ($post['status_inp'][0] == '287') {
  
/*
//y validasi tipe pr
if($post['tipe_pr'] == "NON KONSOLIDASI" ){
  if ($post['total_alokasi_ppn_inp'] > 25000000) {
    $this->setMessage("Tipe PR non konsolidasi harus <= 25 juta");
    $error= true;
  }
}elseif ($post['tipe_pr'] == "KONSOLIDASI") {
  if($post['total_alokasi_ppn_inp'] <= 25000000){
    $this->setMessage("Tipe PR konsolidasi harus lebih dari 25 juta");
    $error = true;
  }elseif ($post['total_alokasi_ppn_inp'] > 20000000000) {
    $this->setMessage("Tipe PR konsolidasi harus <= 20 milyar");
    $error= true;
  }
}elseif ($post['tipe_pr'] == "MATERIAL STRATEGIS") {
  if($input['pr_type_of_plan'] == "rkap" and $post['total_alokasi_ppn_inp'] < 20000000000){
    $this->setMessage("Tipe PR material strategis non proyek harus > 20 milyar");
    $error = true;
  }elseif ($input['pr_type_of_plan'] == "rkp" and $post['total_alokasi_ppn_inp'] < 200000000000) {
    $this->setMessage("Tipe PR material strategis proyek harus > 200 milyar");
    $error = true;
  }
}else{
  $this->setMessage("Tipe perencanaan harus dipilih");
  $error = true;
}
//end
*/
}

if($post['status_inp'][0] != '289'){ //Menambahkan eksepsi validasi untuk pembuatan draft permintaan pengadaan
if(!isset($post['item_kode'])){
  $this->setMessage("Tidak ada item yang dipilih");
  if(!$error){
    $error = true;
  }
}
}


}

if ($last_comment['activity'] == 1010 &&  $perencanaan['ppm_type_of_plan'] == "rkp") {

  $this->db->where("A.dept_id", $userdata['dept_id']);
  $logins = $this->Administration_m->getUserByJob("PELAKSANA PENGADAAN")->row_array();  

  $input['pr_buyer'] = $logins['fullname'];
  $input['pr_buyer_id'] = $logins['employee_id'];
  $input['pr_buyer_pos_code'] = $logins['pos_id'];
  $input['pr_buyer_pos_name'] = $logins['pos_name'];

}elseif ($last_comment['activity'] == 1011) {

  $buyer = $this->Administration_m->getPosition("PELAKSANA PENGADAAN", $post['pelaksana']);
  $buyername = $this->Administration_m->get_employee($post['pelaksana'])->row_array();  

  $input['pr_buyer'] = $buyername['fullname'];
  $input['pr_buyer_id'] = $buyer['employee_id']; 
  $input['pr_buyer_pos_code'] = $buyer['pos_id']; 
  $input['pr_buyer_pos_name'] = $buyer['pos_name']; 
}

//echo $this->db->last_query();

$pr_number = $last_comment['tender_id'];

$input_doc = array();

$input_item = array();

$n = 0;

//print_r($post);

$this->form_validation->set_rules("id", 'ID', 'required');

foreach ($post as $key => $value) {

  if(is_array($value)){

    foreach ($value as $key2 => $value2) { 

      $this->form_validation->set_rules($key."[".$key2."]", '', '');

      if(isset($post['doc_id_inp'][$key2])){
        $input_doc[$key2]['ppd_id'] = $post['doc_id_inp'][$key2];
      }

      if(isset($post['doc_category_inp'][$key2])){
        $this->form_validation->set_rules("doc_category_inp[$key2]", "lang:code #$key2", 'max_length['.DEFAULT_MAXLENGTH.']');
        $input_doc[$key2]['ppd_category']= $post['doc_category_inp'][$key2];
      }
      if(isset($post['doc_desc_inp'][$key2])){
        $this->form_validation->set_rules("doc_desc_inp[$key2]", "lang:description #$key2", 'max_length['.DEFAULT_MAXLENGTH_TEXT.']');
        $input_doc[$key2]['ppd_description']= $post['doc_desc_inp'][$key2];
      }
      if(isset($post['doc_attachment_inp'][$key2])){
        $this->form_validation->set_rules("doc_attachment_inp[$key2]", "lang:attachment #$key2", 'max_length['.DEFAULT_MAXLENGTH.']');
        $input_doc[$key2]['ppd_file_name']= $post['doc_attachment_inp'][$key2];
      }

       if(isset($post['item_jumlah'][$key2]) && !empty($post['item_jumlah'][$key2])){

        $this->form_validation->set_rules("item_kode[$key2]", "lang:code #$key2", 'max_length['.DEFAULT_MAXLENGTH.']');
        $this->form_validation->set_rules("item_jumlah[$key2]", "Jumlah #$key2", 'max_length['.DEFAULT_MAXLENGTH_TEXT.']|numeric');
        $this->form_validation->set_rules("item_satuan[$key2]", "lang:attachment #$key2", 'max_length['.DEFAULT_MAXLENGTH.']');
        $this->form_validation->set_rules("item_harga_satuan[$key2]", "Harga #$key2", 'max_length['.DEFAULT_MAXLENGTH.']|numeric');
        $this->form_validation->set_rules("item_subtotal[$key2]", "Subtotal #$key2", 'max_length['.DEFAULT_MAXLENGTH.']|numeric');

        if(!empty($post['item_id'][$key2])){
          $input_item[$key2]['ppi_id']=$post['item_id'][$key2];
        }

        $input_item[$key2]['ppi_code']=$post['item_kode'][$key2];
        $input_item[$key2]['ppi_description']=$post['item_deskripsi'][$key2];
        $input_item[$key2]['ppi_quantity']=$post['item_jumlah'][$key2];
        $input_item[$key2]['ppi_unit']=$post['item_satuan'][$key2];
        $input_item[$key2]['ppi_price']=$post['item_harga_satuan'][$key2];
		//$input_item[$key2]['ppi_pr_tujuan']=$post['item_tujuan'][$key2];

        $input_item[$key2]['ppi_ppn']=$post['item_ppn_satuan'][$key2];
        if ($post['item_pph_satuan'][$key2] == '') {
          $input_item[$key2]['ppi_pph'] = 0;
        }else{
          $input_item[$key2]['ppi_pph']=$post['item_pph_satuan'][$key2]; 
        }

        if (!isset($post['periode_pengadaan'][$key2]) OR $post['periode_pengadaan'][$key2] == '') {
          $input_item[$key2]['ppi_periode_pengadaan'] = null;
        }else{
          $input_item[$key2]['ppi_periode_pengadaan'] = $post['periode_pengadaan'][$key2]; 
          $input_item[$key2]['ppi_spk_code'] = $perencanaan['ppm_project_id']; 
        }

        $tipe = $post['item_tipe'][$key2];
        $kode = $post['item_kode'][$key2];

        if($tipe == "BARANG"){
          $com = $this->Commodity_m->getMatCatalog($kode)->row_array();
        } else {
          $com = $this->Commodity_m->getSrvCatalog($kode)->row_array();
        }

        $input_item[$key2]['ppi_currency']= "IDR";
        //$input_item[$key2]['ppi_currency']=$com['currency'];
        $input_item[$key2]['ppi_type']=$tipe;

      }

    }

    $n++;

  }

}


if ($this->form_validation->run() == FALSE || $error){

  //$this->ubah_permintaan_pengadaan();

  $this->renderMessage("error");

} else {

  $this->db->trans_begin();

  $act = $this->Procpr_m->updateDataPR($pr_number,$input);

  $act = true;
  
  $complete_comment = 1;

  if($act){

    if(!empty($input_doc)){

      $deleted = array();

      foreach ($input_doc as $key => $value) {
        $value['pr_number'] = $pr_number;
        $id = (isset($value['ppd_id'])) ? $value['ppd_id'] : "";
        $act = $this->Procpr_m->replaceDokumenPR($id,$value);
        if($act){
          $deleted[] = $act;
        }
      }

      $this->Procpr_m->deleteIfNotExistDokumenPR($pr_number,$deleted);

    }

    if(!empty($input_item)){

      $deleted = array();

      foreach ($input_item as $key => $value) {
        $value['pr_number'] = $pr_number;
        $ppi_id = isset($value['ppi_id']) ? $value['ppi_id'] : $key;
        $act = $this->Procpr_m->replaceItemPR($ppi_id, $value);
       
        if($act){
          $deleted[] = $act;
        }
      }

      $this->Procpr_m->deleteIfNotExistItemPR($pr_number,$deleted);

    }

    $response = $post['status_inp'][0];

    $com = $post['comment_inp'][0];

    $attachment = $post['comment_attachment_inp'][0];

    $buyerman = (isset($post['pelaksana'])) ? $post['pelaksana'] : NULL;
    $this->db->select('*');
    $this->db->from('prc_pr_main');
    $this->db->where('pr_number', $pr_number);
    $isSwakelola = $this->db->get()->row_array();

    $return = $this->Procedure_m->prc_pr_comment_complete($pr_number,$userdata['complete_name'],$last_comment['activity'],$response,$com,$attachment,$last_comment['comment_id'],$perencanaan_id,$userdata['employee_id'],$isSwakelola['isSwakelola'],$perencanaan['ppm_type_of_plan'], $isSwakelola['isjoin'], $buyerman, "");
   
    if($last_comment['activity'] == 1000){
      if($return['nextactivity'] == 1010){ //next aprv
        $hist = array(
                  'ppm_id' => $perencanaan_id,
                  'pph_main' => $perencanaan['ppm_sisa_anggaran'],
                  'pph_min' => $post['total_alokasi_ppn_inp'],
                  'pph_remain' => $perencanaan['ppm_sisa_anggaran']-$post['total_alokasi_ppn_inp'],
                  'pph_date' => date("Y-m-d H:i:s"),
                  'pph_desc' => $return['nextactivity'],
                  'pph_first' => $pr_number,
                  'pph_mod' => $pr_number
                ); 
      //potong anggaran
      $angg = $perencanaan['ppm_sisa_anggaran']-$post['total_alokasi_ppn_inp'];
      $potong = $this->Procplan_m->updateDataPerencanaanPengadaan($perencanaan_id, array('ppm_sisa_anggaran'=>$angg));
      //insert history anggaran
      $plan_hist = $this->Procplan_m->insertHist($hist);
      }
    }else{
      if($return['nextactivity'] == 1000 || $return['nextactivity'] == 1904){ //revisi or batal PR
         $histbatal = array(
                      'ppm_id' => $perencanaan_id,
                      'pph_main' => $perencanaan['ppm_sisa_anggaran'],
                      'pph_plus' => $post['total_alokasi_ppn_inp'],
                      'pph_remain' => $perencanaan['ppm_sisa_anggaran']+$post['total_alokasi_ppn_inp'],
                      'pph_date' => date("Y-m-d H:i:s"),
                      'pph_desc' => $return['nextactivity'],
                      'pph_first' => $pr_number,
                      'pph_mod' => $pr_number
                    );
        $revang = $post['total_alokasi_ppn_inp'] + $perencanaan['ppm_sisa_anggaran'];
        $back = $this->Procplan_m->updateDataPerencanaanPengadaan($perencanaan_id, array('ppm_sisa_anggaran'=>$revang));
        $planhist = $this->Procplan_m->insertHist($histbatal);

        //histori volume batal atau revisi
         $check_vol = $this->Procplan_m->getVolumeHist("",$perencanaan_id,$pr_number)->result_array();
         if (count($check_vol) > 0) {
          $getVolItem = $this->Procpr_m->getItemPR("",$pr_number)->result_array();
          foreach ($getVolItem as $key => $vol_value) {
            $getVolumeHist = $this->Procplan_m->getVolumeHist($vol_value['ppi_code'],$perencanaan_id,$pr_number)->row_array();
            $getLastVolume = $this->Procplan_m->getVolumeHist($vol_value['ppi_code'],$perencanaan_id)->row_array();

             $dataVolume = array(
                'ppm_id' => $getVolumeHist['ppm_id'],
                'ppv_main' => $getLastVolume['ppv_remain'],
                'ppv_minus' => 0,
                'ppv_plus' => $getVolumeHist['ppv_minus'],
                'ppv_remain' => ($getLastVolume['ppv_remain'] + $getVolumeHist['ppv_minus']),
                'ppv_activity' =>  $return['nextactivity'],
                'ppv_no' => $pr_number,
                'ppv_smbd_code' => $getVolumeHist['ppv_smbd_code'],
                'ppv_unit' => $getVolumeHist['ppv_unit'],
                'ppv_prc' => $getVolumeHist['ppv_prc'],
                'created_datetime' => date("Y-m-d H:i:s"),
              );

              $volumeHist = $this->Procplan_m->insertVolumeHist($dataVolume);
          }
        }
        //end

      }else{ //to rfq or join pr

          $rfqorpr = ($return['newnumber'] != "0") ? $return['newnumber'] : $pr_number;
          $hist = array(
                  'pph_desc' => $return['nextactivity'],
                  'pph_mod' => $rfqorpr
                );
        //update history anggaran
        $plan_hist = $this->Procplan_m->updateHist($pr_number, $hist);

        //histori volume lanjut rfq
        $check_vol = $this->Procplan_m->getVolumeHist("",$perencanaan_id,$pr_number)->result_array();
         if (count($check_vol) > 0) {
          $getVolItem = $this->Procpr_m->getItemPR("",$pr_number)->result_array();
          foreach ($getVolItem as $key => $vol_value) {
            $getVolumeHist = $this->Procplan_m->getVolumeHist($vol_value['ppi_code'],$perencanaan_id,$pr_number)->row_array();
            $getLastVolume = $this->Procplan_m->getVolumeHist($vol_value['ppi_code'],$perencanaan_id)->row_array();

             $dataVolume = array(
                'ppm_id' => $getVolumeHist['ppm_id'],
                'ppv_main' => $getLastVolume['ppv_main'],
                'ppv_minus' => 0,
                'ppv_plus' => 0,
                'ppv_remain' => ($getLastVolume['ppv_remain']),
                'ppv_activity' =>  $return['nextactivity'],
                'ppv_no' => $return['newnumber'],
                'ppv_smbd_code' => $getVolumeHist['ppv_smbd_code'],
                'ppv_unit' => $getVolumeHist['ppv_unit'],
                'ppv_prc' => "RFQ",
                'created_datetime' => date("Y-m-d H:i:s"),
              );

              $volumeHist = $this->Procplan_m->insertVolumeHist($dataVolume);
          }
      }
        //end
      }
    }

    if(!empty($return['nextactivity'])){

      if(!empty($return['newnumber'])){
        $comment = $this->Comment_m->insertProcurementRFQ($return['newnumber'],$return['nextactivity'],"","","",$return['nextposcode'],$return['nextposname']);
      } else {
        $comment = $this->Comment_m->insertProcurementPR($pr_number,$return['nextactivity'],"","","",$return['nextposcode'],$return['nextposname']);
      }

    } else {

  }

}

if ($this->db->trans_status() === FALSE)
{
  $this->setMessage("Gagal mengubah data");
  $this->db->trans_rollback();
}
else
{
  $this->setMessage("Sukses mengubah data");
  $this->db->trans_commit();
}

//echo $this->db->last_query();

$this->renderMessage("success",site_url("procurement/daftar_pekerjaan"));
//$this->renderMessage("success");

}
