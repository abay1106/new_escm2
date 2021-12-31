<?php

$get = $this->input->get();

$filtering = $this->uri->segment(3, 0);

if (isset($get['spk_code'])) {
  $this->db->select('ppm_id');
  $this->db->distinct();
  $this->db->where('ppm_project_id', $get['spk_code']);
  $perencanaan = $this->db->get('prc_plan_main')->row_array();   
}

$order = (isset($get['order']) && !empty($get['order'])) ? $get['order'] : "asc";
$limit = (isset($get['limit']) && !empty($get['limit'])) ? $get['limit'] : 10;
$search = (isset($get['search']) && !empty($get['search'])) ? $this->db->escape_like_str(strtolower($get['search'])) : "";
$offset = (isset($get['offset']) && !empty($get['offset'])) ? $get['offset'] : 0;
$field_order = (isset($get['sort']) && !empty($get['sort'])) ? $get['sort'] : "a.smbd_code";

$id = (isset($get['id']) && !empty($get['id'])) ? $get['id'] : "";

if(!empty($search)){
  $this->db->group_start();
  $this->db->like("LOWER((a.group_smbd_code)::text)",$search);
  $this->db->or_like("LOWER((a.smbd_code)::text)",$search);
  $this->db->or_like("LOWER(a.smbd_name)",$search);
  $this->db->or_like("LOWER(a.unit)",$search);
  $this->db->or_like("LOWER((a.price)::text)",$search);
  $this->db->or_like("LOWER((a.periode_pengadaan)::text)",$search);
  $this->db->or_like("LOWER(a.group_smbd_name)",$search);
  $this->db->group_end();
}

if(!empty($order)){
  $this->db->order_by("a.smbd_code",$order);
  $this->db->order_by($field_order,$order);
}

if(!empty($limit)){
  $this->db->limit($limit,$offset);
}

$this->db->join('prc_plan_main b', 'b.ppm_project_id = a.spk_code');
$this->db->join('prc_plan_volume c', 'c.ppm_id = b.ppm_id and a.smbd_code = c.ppv_smbd_code');

$this->db->select("Distinct on(a.smbd_code) a.smbd_code as smbd_catalog_code,a.group_smbd_name,a.group_smbd_code,a.smbd_code,a.smbd_name,a.unit,a.price,a.smbd_quantity, c.ppv_remain, (select sum(smbd_quantity) from prc_plan_integrasi where spk_code = '".$get['spk_code']."' AND smbd_code = a.smbd_code) as ppv_max");

if(!empty($id)){

      $group_code = substr($id, 0, 3);
      $smbd_code =  $id;
      $arr = array(
        //'group_smbd_code' => $group_code,
        'smbd_code' => $smbd_code
      );
      $this->db->where($arr);
}

    // $this->db->where('ppm_id',$perencanaan['ppm_id']);
if (isset($get['spk_code'])) {
  $this->db->where('spk_code', $get['spk_code']); 
}
    // $this->db->join('prc_plan_volume b', .$perencanaan['ppm_id']" = a.spk_code");
$result = $this->db->get("prc_plan_integrasi a");


$data['total'] = $result->num_rows();

echo $this->db->last_query();

if(!empty($search)){
  $this->db->group_start();
  $this->db->like("LOWER((a.group_smbd_code)::text)",$search);
  $this->db->or_like("LOWER((a.smbd_code)::text)",$search);
  $this->db->or_like("LOWER(a.smbd_name)",$search);
  $this->db->or_like("LOWER(a.unit)",$search);
  $this->db->or_like("LOWER((a.price)::text)",$search);
  $this->db->or_like("LOWER((a.periode_pengadaan)::text)",$search);
  $this->db->or_like("LOWER(a.group_smbd_name)",$search);
  $this->db->group_end();
}

// $this->db->order_by('smbd_code', 'asc');
if(!empty($order)){
  $this->db->order_by("a.smbd_code",$order);
  $this->db->order_by($field_order,$order);
}

if(!empty($limit)){
  $this->db->limit($limit,$offset);
}

$this->db->join('prc_plan_main b', 'b.ppm_project_id = a.spk_code');
$this->db->join('prc_plan_volume c', 'c.ppm_id = b.ppm_id and a.smbd_code = c.ppv_smbd_code');

$this->db->select("Distinct on(a.smbd_code) a.smbd_code as smbd_catalog_code,a.group_smbd_name,a.group_smbd_code,a.smbd_code,a.smbd_name,a.unit,a.price,a.smbd_quantity, c.ppv_remain, (select sum(smbd_quantity) from prc_plan_integrasi where spk_code = '".$get['spk_code']."' AND smbd_code = a.smbd_code) as ppv_max");

if(!empty($id)){

       $group_code = substr($id, 0, 3);
       $smbd_code =  $id;
      $arr = array(
        //'group_smbd_code' => $group_code,
        'smbd_code' => $smbd_code
      );
      $this->db->where($arr);
}

    // $this->db->where('ppm_id',$perencanaan['ppm_id']);
if (isset($get['spk_code'])) {
  $this->db->where('spk_code', $get['spk_code']);
}

$this->db->order_by('smbd_code', 'asc');
    // $this->db->join('prc_plan_volume b', "(select ppm_project_id from prc_plan_main where ppm_id = b.ppm_id) = a.spk_code");
$result = $this->db->get("prc_plan_integrasi a");

$rows = $result->result_array();

foreach ($rows as $key => $value) {

  // if(!empty($selection) && in_array($value['srv_catalog_code'], $selection)){
  $rows[$key]['checkbox'] = true;
  // }
  $rows[$key]["price"] = inttomoney($rows[$key]["price"]);
  $rows[$key]["ppv_max"] = $rows[$key]["ppv_max"]+0;
  $rows[$key]["ppv_remain"] = $rows[$key]["ppv_remain"]+0;

  // $label = (isset($status[$rows[$key]['status']])) ? $status[$rows[$key]['status']] : "primary";
  // $rows[$key]['status_name'] = "<span class='label label-$label'>".$value['status_name']."</span>";
  // if(!empty($filtering) && $filtering == "approval"){
  //   $rows[$key]['operate'] = site_url("commodity/daftar_pekerjaan/approval_kat_jasa/".$rows[$key]["srv_catalog_code"]);
  // }

}
if (!empty($id)) {
  $this->db->select("substr((periode_pengadaan::text), 1,4) as tahun");
  $this->db->where('spk_code', $get['spk_code']);
  $this->db->where('smbd_code', substr($id, 3,6));
  $this->db->group_by("substr((periode_pengadaan::text), 1,4)");
  $periode_pengadaan_tahun = $this->db->get('prc_plan_integrasi')->result_array();
  $n = 0;
  foreach ($periode_pengadaan_tahun as $key => $value_thn) {

    $rows['periode_pengadaan'][$n] = array(
      'id' => $value_thn['tahun'],
      'text' => $value_thn['tahun'],
      'children' => array()
    );
    
    $tahun = $value_thn['tahun'];
    $this->db->select('periode_pengadaan');
    $this->db->where('spk_code', $get['spk_code']);
    $this->db->where('smbd_code', substr($id, 3,6));
    $this->db->like('(periode_pengadaan)::text', "$tahun");
    $periode_pengadaan = $this->db->get('prc_plan_integrasi')->result_array();
    $no = 1;
    foreach ($periode_pengadaan as $key => $value) {

     $date = date_create($value['periode_pengadaan']);
     $rows['periode_pengadaan'][$n]['children'][] = array(
      'parent' => $value_thn['tahun'],
      'id' => $value['periode_pengadaan'],
      'text' => date_format($date,"d-M-Y")
    );

     $no++;
   }
   
   $n++;
 }
}


$data['rows'] = $rows;

echo json_encode($data);
