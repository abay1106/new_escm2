<?php 

  $view = 'vendor/daftar_vendor/daftar_seluruh_vendor/daftar_seluruh_vendor_v';

  $data = array(

      'jumlah' =>1,

    );
  $userdata = $this->data['userdata'];

  if ($userdata['job_title'] == 'PENGELOLA VENDOR') {
  	$data['sync_btn'] = true;
  }
  
  $this->template($view,"Daftar Seluruh Vendor",$data);