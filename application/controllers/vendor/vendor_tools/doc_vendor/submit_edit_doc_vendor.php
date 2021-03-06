<?php

$post = $this->input->post();

$id = $post['id'];

$input = [];

$error = false;

$user = $this->data['userdata'];

$status = "Non Aktif";

if (isset($post['status_inp'])) {
  $status = 'Aktif';
}

//ubah semua template dengan tipe vendor yang sama menjadi nonaktif supaya yang aktif hanya 1
// if ($status == 'Aktif') {
//    $this->db->where('vtm_id', $post['vnd_type_inp']);
//    $this->Vendor_m->updateVndDoc("", array("status"=>"Non Aktif"));
// }


$input  = [
  'avd_name'      => $post['nama_inp'],
  'vtm_id'        => $post['vnd_type_inp'],
  'status'        => $status,
  'updated_date'  => date("Y-m-d H:i:s")
];

$input_detail = array();

$n = 0;

foreach ($post as $key => $value) {

  if (is_array($value)) {

    foreach ($value as $key2 => $value2) {
      if ($post['item_id'][$key2] != "") {
        $input_detail[$key2]['vdd_id']      = $post['item_id'][$key2];
      }
      $input_detail[$key2]['vdd_name']      = $post['item_name'][$key2];
      $input_detail[$key2]['vdd_type']      = $post['item_jenis'][$key2];
      $input_detail[$key2]['vdd_ref_document_pq']      = $post['ref_document_inp'][$key2] ? $post['ref_document_inp'][$key2] : null;
      $input_detail[$key2]['vdd_status']      = 1;
      $input_detail[$key2]['updated_date']  =  date("Y-m-d H:i:s");
    }

    $n++;
  }
}


if (empty($input_detail)) {

  $this->setMessage("Detail dokumen tidak boleh kosong");
  $this->renderMessage("error");

} else {

  $this->db->trans_begin();

  $act = $this->Vendor_m->updateVndDoc($id, $input);
  if ($act) {

    // new_data kumpulan vdd_id yang terbaru/masih digunakan pada template, 
    // selain yang ada di new_data akan di nonaktifkan
    $new_data = [];

    foreach ($input_detail as $key => $value) {
      $value['avd_id'] = $id;

      $actdetail = $this->Vendor_m->replaceVndDocDetail($value['avd_id'], $value);
      if ($actdetail) {
        $new_data[] = $actdetail;
      }
    }

    if (count($new_data) > 0) {
      $this->Vendor_m->deleteIfNotExistVndDocDetail($id, $new_data);
    }
    
  }

  $vnd_doc_pq = $this->Vendor_m->getDocPq("", $id)->result_array();
  $doc_pq_comment = array();

  if (count($vnd_doc_pq) > 0) {
 
    foreach ($vnd_doc_pq as $key => $value) {
      $doc_pq_comment[] = [
        "vdpc_position" => $user['pos_id'],
        "vdp_id" => $value['vdp_id'],
        "vdpc_pos_name" => $user['pos_name'],
        "vdpc_name" => $user['complete_name'],
        "vdpc_activity" => "Permintaan untuk memperbarui dokumen PQ/Tambahan",
        "vdpc_start_date" => date("Y-m-d H:i:s"),
        "vdpc_end_date" => date("Y-m-d H:i:s"),
        "vdpc_response" => "-",
        "vdpc_comment" => "Silahkan Perbarui Dokumen PQ/Tambahan (Generated By System)",
        // "vdpc_attachment" ,
        // "vdpc_next_pos_code" ,
        // "vdpc_next_pos_name" ,
        // "vdpc_activity_code" int4,
      ];
    }
    
      $doc_pq_com = $this->Comment_m->insertDocPQBatch($doc_pq_comment);
    
  }

  if ($this->db->trans_status() === FALSE) {
    $this->setMessage("Gagal menambah data");
    $this->db->trans_rollback();
    $this->renderMessage("error");
  } else {
    $this->setMessage("Sukses menambah data");
    $this->db->trans_commit();
    $this->renderMessage("success", site_url("vendor/vendor_tools/doc_vendor"));
  }
}
