<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Createpdf extends Telescoope_Controller {

    public function index(){
        $this->load->helper('pdf_helper');

        // $param = $this->input->post('param');
        // $param = 'kontrak';

        // // $id = $this->input->post('id');
        // $id = 65;

        // switch ($param) {
        //     case 'kontrak':
        //     $header= $this->db->where('contract_id',$id)->get('ctr_contract_header')->row_array();
            
        //     $item = $this->db->where('contract_id',$id)->get('ctr_contract_item')->result_array();
                
        //     $data['data'] = $this->db->where('contract_id',$id)->where('is_final',1)->get('ctr_contract_surat')->row()->konten_surat;
                
        //     $data['data'] .= '<br pagebreak="true"/>';
        //     $data['data'] .= 'Contract Number : '.$header['contract_number'];
        //     $data['data'] .= '<br/>';
        //     $data['data'] .= 'PTM Number : '.$header['ptm_number'];
        //     $data['data'] .= '<br/>';
        //     $data['data'] .= 'Vendor name: '.$header['vendor_name'];
        //     $data['data'] .= '<br/>';
        //     $data['data'] .= 'Vendor id: '.$header['vendor_id'];
        //     $data['data'] .= '<br/>'; 
        //     $data['data'] .= '<br/>'; 
        //     $data['data'] .= '<br/>'; 
        //     $data['data'] .= '<table class="table table-bordered">';
        //     $data['data'] .= '<thead> <tr> <th>Item Code</th> <th>Short Desc</th> <th>Long Desc</th> <th>Price</th> <th>Qty</th> <th>Min Qty</th> <th>Max Qty</th> <th>UOM</th> <th>PPN</th> <th>PPH</th> </tr> </thead>';
        //     $data['data'] .= '<tbody>';
        //     foreach ($item as $key => $value) {
        //         $data['data'] .= "<tr><td>".$value['item_code']."</td> <td>".$value['short_description']."</td> <td>".$value['long_description']."</td> <td>".$value['price']."</td> <td>".$value['qty']."</td> <td>".$value['min_qty']."</td> <td>".$value['max_qty']."</td> <td>".$value['uom']."</td> <td>".$value['ppn']."</td> <td>". $value['pph'] ."</td> </tr>";
        //     }
        //     $data['data'] .= '</tbody> </table>';

        //         break;
            
        //     default:
        //         # code...
        //         break;
        // }


        $this->load->view('pdfreport', $data);
    }

}
