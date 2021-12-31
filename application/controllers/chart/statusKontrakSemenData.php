<?php
if(!empty($param2)){
// A4
    $this->db->select('SUBSTRING(b.item_code, 1,2) as item_code, d.dept_name,sum(b.qty) as qty, a.vendor_name');
    $this->db->where(array('c.vendor_id' => $param2, "SUBSTRING(b.item_code, 1,2)=" => "A1"));
    $this->db->join('ctr_wo_item b', 'a.wo_id = b.wo_id', 'right');
    $this->db->join('ctr_contract_header c', 'c.contract_id = a.contract_id', 'left');
    $this->db->join('adm_dept d', 'd.dep_code = a.dept_code');
    $this->db->group_by('SUBSTRING(b.item_code, 1,2), d.dept_name, a.vendor_name');
    $penyerapan_per_dept = $this->db->get('ctr_wo_header a')->result_array();

    if (count($penyerapan_per_dept) > 0) {

        $data['data'][0]['id'] = $param2;
        $data['data'][0]['name'] = $penyerapan_per_dept[0]['vendor_name'];
        $i = 0;
        foreach ($penyerapan_per_dept as $key => $value) {
            
            $data['data'][0]['data'][$i][] = $value['dept_name'];
            $data['data'][0]['data'][$i][] = $value['qty'];

            $i++;
        }

         $data['data'] = array_values($data['data']);
         $data = json_encode($data['data'],JSON_NUMERIC_CHECK);

    }
   
    // switch ($param2) {
    //     case 'rmx':
    //         $data = '[{
    //             "id": "rmx",
    //             "name": "RMX",
    //             "data": [
    //                 ["DSU 1", 1],
    //                 ["DSU 2", 2],
    //                 ["DSU 3", 3],
    //                 ["DLN", 4],
    //                 ["DBG", 4]
    //             ]
    //             }]';
    //         break;

    //     case 'semen':
    //         $data = '[{
    //             "id": "semen",
    //             "name": "Semen",
    //             "data": [
    //                 ["DSU 1", 1],
    //                 ["DSU 2", 2],
    //                 ["DSU 3", 3],
    //                 ["DLN", 1],
    //                 ["DBG", 3]
    //             ]
    //         }]';
    //         break;

    //     case 'beton':
    //         $data = '[{
    //             "id": "beton",
    //             "name": "Beton",
    //             "data": [
    //                 ["DSU 1", 1],
    //                 ["DSU 2", 2],
    //                 ["DSU 3", 3],
    //                 ["DLN", 1],
    //                 ["DBG", 3]
    //             ]
    //         }]';
    //         break;
        
    //     default:
    //         # code...
    //         break;
    // }
}else{

    $this->db->select('sum(qty_contract) as qty_contract, contract_id, SUBSTRING(item_code, 1,2) as item_code, vendor_name, vendor_id');
    $this->db->order_by('qty_contract', 'desc');
    $this->db->where("SUBSTRING(item_code, 1,2)=", 'A1');
    $this->db->group_by('contract_id, SUBSTRING(item_code, 1,2), vendor_name, vendor_id');
    $kebutuhan = $this->db->get('vw_item_penyerapan_matgis')->row_array();

    $data['data'][0]['name'] = 'Kebutuhan';
    $data['data'][0]['data'][0]['name'] = 'Kebutuhan Kontrak Ready Mix';
    $data['data'][0]['data'][0]['y'] = $kebutuhan['qty_contract'] == null ? 0 : $kebutuhan['qty_contract'];

    // $data['data'] = array_values($data['data']);

    //penyerapan

    $this->db->select('sum(qty_wo) as qty_wo, sum(qty_contract) as qty_contract, contract_id, SUBSTRING(item_code, 1,2) as item_code, vendor_name, vendor_id');
    $this->db->order_by('qty_contract', 'desc');
    $this->db->group_by('contract_id, SUBSTRING(item_code, 1,2), vendor_name, vendor_id');
    $this->db->where("SUBSTRING(item_code, 1,2)=", 'A1');
    $penyerapan = $this->db->get('vw_item_penyerapan_matgis')->result_array();


    if (count($penyerapan) > 0) {
        $i = 0;
        $data['data'][1]['name'] = 'Penyerapan';
        $data['data'][2]['name'] = 'Sisa';
        foreach ($penyerapan as $key => $value) {

            $data['data'][1]['data'][$i]['name'] = $value['vendor_name'];
            $data['data'][1]['data'][$i]['y'] = $value['qty_wo'] == null ? 0 : $value['qty_wo'];
            $data['data'][1]['data'][$i]['drilldown'] = $value['vendor_id'];

            $data['data'][2]['data'][$i]['name'] = $value['vendor_name'];
            $data['data'][2]['data'][$i]['y'] = ($value['qty_contract'] == null ? 0 : $value['qty_contract']) - ($value['qty_wo'] == null ? 0 : $value['qty_wo']);

            $i++;
        }
    }
$data['data'] = array_values($data['data']);

$data = json_encode($data['data'],JSON_NUMERIC_CHECK);

    // $data = '[{
    //     "name": "Kebutuhan",
    //     "data": [{
    //         "name": "Kebutuhan Kontrak Ready Mix",
    //         "y": 1000000,
    //         "drilldown": "semen"
    //     }]
    // },{
    //     "name": "Penyerapan",
    //     "data": [{
    //         "name": "Semen Indonesia",
    //         "y": 400000,
    //         "drilldown": "semen"
    //     }]
    // },{
    //     "name": "Sisa",
    //     "data": [{
    //         "name": "Semen Indonesia",
    //         "y": 600000,
    //         "drilldown": "semen"
    //     }]
    // }]';
}
// print_r(json_decode($data));