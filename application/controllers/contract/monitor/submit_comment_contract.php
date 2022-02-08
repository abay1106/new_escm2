<?php

	$userdata = $this->data['userdata'];

	$error = false;

	$post = $this->input->post();

	$input = array();

	var_dump($input);die();

	$this->db->trans_begin();

	$input['cad_contract_id'] = $post['cad_contract_id'];
	$input['cad_ptm_number'] = $post['cad_ptm_number'];
	$input['cad_comment'] = $post['cad_comment'];
	$input['cad_user_id'] = $userdata['pos_id'];
	$input['cad_position'] =  $userdata['pos_name'];
	$input['cad_user_name'] =  $userdata['complete_name'];
	$input['cad_created_date'] = date("Y-m-d H:i:s");

	$act = $this->db->insert("ctr_comment_all_div", $input);	

	if ($this->db->trans_status() === FALSE)
	{
		$this->db->trans_rollback();
		$this->setMessage("Gagal mengubah data");
		$this->renderMessage("error");
	}

	else
	{
		$this->db->trans_commit();
		$this->setMessage("Berhasil mengubah data");
		$this->renderMessage("success");		
		redirect(site_url("contract/monitor/monitor_kontrak/lihat/" . $post['cad_contract_id']));
	}

?>