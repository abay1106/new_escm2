<?php

$post = $this->input->post();

$userdata = $this->Administration_m->getLogin();

$data = array(
	'kategori' => $post['kategori'],
	'tittle' => $post['tittle'],
	'content' => $post['content'],
	'image' => $post['image']
	);

$insert = $this->db->insert('vnd_news', $data);

if($insert){
	$this->setMessage("Berhasil menambah berita");
}

redirect(site_url('administration/news'));
