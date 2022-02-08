<?php
  $view = 'vendor/vsi/vsi_v';
  $periode = '1';
	$year = '2021';

  $getVSIVendorList = $this->db->get('vw_vsi_vendor_list');
  $getPeriode = $this->db->get('vw_get_periode_vsi');
  $getYear = $this->db->get('vw_year_list');

  $data = array();
  $data['rows'] = $getVSIVendorList->result_array();
  $data['periode'] = $getYear->result_array();
  $data['year'] = $getYear->result_array();
  $data['vsi_summary'] = $this->Vendor_m->get_vsi_summary($periode,$year);

  $data['label_pertanyaan_kepuasan'] = $this->Vendor_m->get_pertanyaan_label(1,$periode,$year);
	$data['label_pertanyaan_kepentingan'] = $this->Vendor_m->get_pertanyaan_label(2,$periode,$year);

  $data['data_asset_line_kepuasan'] = $this->Vendor_m->get_asset_line_chart(1,$periode,$year);
	$data['data_asset_line_kepentingan'] = $this->Vendor_m->get_asset_line_chart(2,$periode,$year);
	$data['data_scatter_chart'] = $this->Vendor_m->get_dataset_scatter_chart($periode,$year);

  $data['data_satisfication_map'] = $this->Vendor_m->get_satisfacation_map($periode,$year);
  $data['score_rows'] = $this->Vendor_m->get_vsi_vendor_score($periode,$year);

  $this->template($view, "Laporan VSI", $data);
?>
