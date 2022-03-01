<?php 

  $view = 'procurement/template_kewenangan/detail_template_kewenangan_v';

  $data = array();

  $id = (isset($post['id'])) ? $post['id'] : $this->uri->segment(4, 0);

  $data['id'] = $id;

  $this->db->where('id', $id);
  $header = $this->db->get('adm_matriks_kegiatan')->row_array();


  $this->db->where('kegiatan_id', $id);
  $detail = $this->db->get('adm_matriks_kewenangan_kegiatan')->result_array();

  $adm_pos = $this->db->get('adm_pos')->result_array();



  $data['data'] = $header;

  $data['detail'] = $detail;
  $data['adm_pos'] = json_encode($adm_pos);


  

  $this->template($view,"Detail Template Kewenangan ".$header['uraian_kegiatan'],$data);