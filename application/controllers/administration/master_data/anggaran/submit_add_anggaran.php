<?php

$post = $this->input->post();

$userdata = $this->Administration_m->getLogin();

$data = array(
	'kode_perkiraan' => $userdata['kode_perkiraan'],
	'nama_perkiraan' => $userdata['nama_perkiraan'],
	'pusat' => $post['pusat'],
	'divisi' => $post['divisi'],
	'proyek' => $post['proyek'],
	//'allocation_cc' => $post['allocation_inp'],
	//'dept_cc' => $post['dept_inp'],
	//'year_cc' => $post['year_inp'],
	);

$insert = $this->db->insert('adm_coa_new', $data);

if($insert){
	$this->setMessage("Berhasil menambah data anggaran");
}

redirect(site_url('administration/master_data/anggaran'));
