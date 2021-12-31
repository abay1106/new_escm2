<?php

$this->load->model("Sinkron_m");
$this->load->model("Auth_model");

$selection = $this->data['selection_vendor'];

$vendor_id = isset($vendor_id) ? $vendor_id : ""; 

$login_status = $this->Sinkron_m->do_sinkron($vendor_id);

//push UMKM ke PaDi
//$send_umkm = $this->Auth_model->push_umkm($vendor_id,'vendor');

if ($login_status == 'success') {
	// $this->session->set_flashdata(array('status_sinkron_vendor'=>"success", 'msg_sinkron_vendor'=>'Sukses mensinkronkan data'));
	$status = 'success';
	$msg = 'Sukses mensinkronkan data';
}elseif ($login_status == 'fail') {
	// $this->session->set_flashdata(array('status_sinkron_vendor'=>"fail", 'msg_sinkron_vendor'=>'Gagal mensinkronkan data'));
	$status = 'fail';
	$msg = 'Gagal mensinkronkan data';

}else{
	// $this->session->set_flashdata(array('status_sinkron_vendor'=>"error_ws", 'msg_sinkron_vendor'=>'Terjadi kesalahan teknis'));
	$status = 'error_ws';
	$msg = 'Terjadi kesalahan teknis';
}

// if (array_key_exists('error', $send_umkm)) {
	// $this->setMessage($send_umkm['error']);
// }else{
	// $this->setMessage("Berhasil push data UMKM".$send_umkm);
// }

redirect(site_url("vendor/daftar_vendor/daftar_seluruh_vendor?status=$status&msg=$msg"));