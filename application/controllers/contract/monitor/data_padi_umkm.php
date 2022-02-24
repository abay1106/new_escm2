<?php

  	$get = $this->input->get();

	$order = (isset($get['order']) && !empty($get['order'])) ? $get['order'] : "";
	$limit = (isset($get['limit']) && !empty($get['limit'])) ? $get['limit'] : 10;
	$offset = (isset($get['offset']) && !empty($get['offset'])) ? $get['offset'] : 0;
	$vnd_id = (isset($get['vnd_id']) && !empty($get['vnd_id'])) ? $get['vnd_id'] : "";

	$ch = curl_init( UMKM_PADI );
	
	$payload = json_encode( array( "get_umkm" => array("size" => (int)$limit, "page" => 1) ) );

	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
		'Content-Type:application/json',
		'x-api-key:' . API_KEY_PADI,
		'User-Agent:WIKA_E-SCM_V2'
	));

	$result = curl_exec($ch);

	$res_padi = json_decode($result, true);

	$rows = $res_padi["data"];
  
	curl_close($ch);
  
	$data['rows'] = $rows;
  
	$data['total'] = $res_padi["count"];

	if(!empty($limit)){
		$this->db->limit($limit,$offset);
	}

	foreach ($rows as $key => $value) {
		$rows[$key]['uid'] = $rows[$key]['uid'];
	}

  	echo json_encode($data);

?>