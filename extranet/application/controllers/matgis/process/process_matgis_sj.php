<?php
  $mod='sj';
  include APPPATH.'controllers/shared/declared.php';
  $post = $this->input->post();
  $activity_id=0;

  if($state==0){

    $activity_id = $activity_first;
    $where       = array('do_id' => $id);
    $header      = $this->Global_m->get_data('ctr_do_header', $where);
    $items       = $this->Global_m->get_data('ctr_do_item',$where, 2);

    $where       = array('contract_id'=>$header['contract_id']);
    $contract    = $this->Global_m->get_data('ctr_contract_header', $where);

    $where       = array('wo_id'=>$header['wo_id']);
    $wo          = $this->Global_m->get_data('ctr_wo_header', $where);


    $doc         = null;
    $reff        ='do';
    $header+=$contract+$wo;


  }else{
    $where       = array('sj_id' => $id);
    $header      = $this->Global_m->get_data('ctr_sj_header',$where);
    $items       = $this->Global_m->get_data('ctr_sj_item', $where, 2);
    $contract_id = $header['contract_id'];
    $where       = array('contract_id'=>$contract_id);
    $contract    = $this->Global_m->get_data('ctr_contract_header', $where);
    $reff        ='sj';
    $this->db->where('sj_id',$id);
    $doc         = $this->db->get('ctr_sj_doc')->result_array();
  }

  $comment_list = $this->Workflow_m->get_comment_matgis($id, '', 'sj')->result_array();
  $where = array('sj_id' => $id, 'cwo_name' => null);
  $last_comment = $this->Global_m->get_data('ctr_sj_comment', $where );
  if (!empty($last_comment)) {
    //jika ada comment artinya data edit
    $id          = $last_comment['sj_id'];
    $activity_id = $last_comment['cwo_activity'];
  }

  $title     = 'Pekerjaan SJ Matgis('.$activity_id.')';
  $sub_title = 'Data SJ Matgis';
  $activity_curr=array('activity_id'=>$activity_id);
  $dir = 'matgis/sj';
  $data['dir']=$dir;
  $data['header']       = $header +  $activity_curr;
  $data['items']        = $items;
  $data['documents']    = $doc;
  $data['comment_list'][0] = $comment_list;
  $data['mod']          = $mod;
  $data['reff']         = $reff;
  $data['state']        = $state;
  $data['id']           = $id;
  $data['content'] = $this->Workflow_m->get_content_by_activity($activity_id)->result_array();
  $wkf             = $this->Workflow_m->get_response_list($activity_id);
  ksort($wkf);
  $data['doc_category'] = $this->Workflow_m->get_doc_type()->result_array();
  $data['workflow_list'] = $wkf;
  $data['title']         = $title;
  $data['sub_title']     = $sub_title;

  if($state==2){
    $view = 'contract/matgis/show_matgis_v';
  }else{
  $view = 'contract/matgis/process_matgis_v';
  }
  $this->layout->view($view, $data);
