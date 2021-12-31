<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class Sinkron_m extends CI_Model {
    
public function do_sinkron($vendorParams = ""){

    $this->db->trans_begin();
     
    if (!empty($vendorParams)) {
       $vendorIdparams = "&vendorId=".$vendorParams;
    }else{
       $vendorIdparams = "";
    }

    $curl = curl_init();
    $this_url = explode('/', base_url())[2];
    curl_setopt_array($curl, array(
      CURLOPT_PORT => "9222",
      CURLOPT_URL => "http://linuxdev.adw.co.id:9222/security/token",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\r\n  
        \"buyerId\": 8,\r\n  
        \"domain\": \"$this_url\",\r\n  
        \"type\": 0\r\n}",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Postman-Token: 2782fcbb-3371-4fff-aca9-d0b761cbfc79",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
      return "cURL Error #:" . $err;
      exit();
    } else {
      $token_data = json_decode($response,true);
    }

    if ($token_data['resultCode'] != 200) {
      return "cURL Error #:" . $token_data['resultCode'];
      exit();
    }

    $data = array(
        "accessKey" => $token_data['resultData']['accessKey'], 
        "accessToken" => $token_data['resultData']['accessToken']
      );                                                                    
    $body = json_encode($data);  
    
    $login = "http://linuxdev.adw.co.id:9222/BuyerProduct/findByBuyerOrVendor?buyerId=8".$vendorIdparams; 

    $ch = curl_init($login);                                                                
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                             
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);                        
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($body))                                                                       
    );                                                                                                            
                                                                                                                     
    $res = curl_exec($ch);

    $arrays = json_decode($res, true);

    $dataHeader = $arrays["resultData"];
    
    if ($arrays['resultCode'] != 200) {
      echo $arrays['resultCode'];
      exit();
    }
       
    if (is_array($dataHeader)) {
        $countVendor = count($dataHeader);
    } else {
        $countVendor= 2;
    }
	
    foreach($dataHeader as $k => $v){
     
      if($v["finClass"] == '1'){
        $klasifikasi = 'K';
      } else if($v["finClass"] == '2'){
        $klasifikasi = 'M';
      } else if($v["finClass"] == '3'){
        $klasifikasi = 'B';
      } else{
        if(strtolower($v["siupType"]) == 'kecil'){
          $klasifikasi = 'K';
        } else if(strtolower($v["siupType"]) == 'menengah'){
          $klasifikasi = 'M';
        } else if(strtolower($v["siupType"]) == 'besar'){
          $klasifikasi = 'B';
        } else{
          $klasifikasi = 'U';
        }
      }
     
      ////////////////

      $this->db->select('vendor_id');
      $this->db->where('vendor_id', $v["vendorId"]);
      $check = $this->db->get('vnd_header')->num_rows();

      // $this->db->select('');
      // $this->db->where('vendor_id', $v["vendorId"]);
      // $check = $this->db->get('vnd_header')->num_rows();

      $emailsalt = THIS_ENV == 'DEV' ? "x" : "";
      $pass = THIS_ENV != 'DEV' ? $v["password"] : "7C4A8D09CA3762AF61E59520943DC26494F8941B";

      //$vendorbank[] = $this->getBankWs($v["vendorId"]);
	  //var_dump($vendorbank);die;
      
      //update
      if(!empty($check)){ 
  
        $dataUpdate = array(
          'vendor_name'               => $v["vendorName"],
          'email_address'             => $v["emailAddress"].$emailsalt,
          'npwp_pkp'                  => strtoupper($v["npwpPkp"]),
          'creation_date'             => date("Y-m-d h:i:s",strtotime($v["creationDate"])),
          'modified_date'             => date("Y-m-d h:i:s",strtotime($v['modifiedDate'])),
          'fin_class'                 => $klasifikasi,
          'address_street'            => str_replace("'","", $v["addressStreet"]),
          'address_domisili_exp_date' => date("Y-m-d H:i:s",strtotime($v['addressDomisiliExpDate'])),
          'login_id'                  => $v["emailAddress"],
          'password'                  => $pass,
          'district_id'               => 0,
          'prefix'                    => $v["prefix"],
          'prefix_other'              => $v["prefixOther"],
          'suffix'                    => $v["suffix"],
          'suffix_other'              => $v["suffixOther"],
          'addres_prop'               => $v["addresProp"],
          'address_postcode'          => $v["addressPostcode"],
          'address_country'           => $v["addressCountry"],
          'address_phone_no'          => $v["addressPhoneNo"],
          'address_website'           => $v["addressWebsite"],
          'address_domisili_no'       => $v["addressDomisiliNo"],
          'address_domisili_date'     => date("Y-m-d H:i:s",strtotime($v['addressDomisiliDate'])),
          'contact_name'              => $v["contactName"], 
          'contact_pos'               => $v["contactPos"],
          'contact_phone_no'          => $v["contactPhoneNo"],
          'contact_email'             => $v["contactEmail"],
          'npwp_no'                   => $v["npwpNo"],
          'npwp_address'              => $v["npwpAddress"],
          'npwp_city'                 => $v["npwpCity"],
          'npwp_prop'                 => $v["npwpProp"],
          'npwp_postcode'             => $v["npwpPostcode"],
          'npwp_pkp_no'               => $v["npwpPkpNo"],
          'vendor_type'               => $v["vendorType"],
          'siup_iujk_type'            => $v["siupIujkType"],
          'siup_issued_by'            => $v["siupIssuedBy"],
          'siup_no'                   => $v["siupNo"],
          'siup_type'                 => $v["siupType"],
          'siup_from'                 => date("Y-m-d H:i:s",strtotime($v['siupFrom'])),
          'siup_to'                   => date("Y-m-d H:i:s",strtotime($v["siupTo"])),
          'tdp_issued_by'             => $v["tdpIssuedBy"],
          'tdp_no'                    => $v["tdpNo"],
          'tdp_from'                  => date("Y-m-d H:i:s",strtotime($v["tdpFrom"])),
          'tdp_to'                    => date("Y-m-d H:i:s",strtotime($v["tdpTo"])),
          'imp_issued_by'             => $v["impIssuedBy"],
          'imp_from'                  => $v["impFrom"],
          'imp_to'                    => $v["impTo"],
          'att_org'                   => $v["attOrg"],
          'fin_akta_mdl_dsr_curr'     => $v["finAktaMdlDsrCurr"],
          'fin_akta_mdl_dsr'          => $v["finAktaMdlDsr"],
          'fin_akta_mdl_str_curr'     => $v["finAktaMdlStrCurr"],
          'fin_akta_mdl_str'          => $v["finAktaMdlStr"],
          'fin_asset_mdl_dsr_cur'     => $v["finAssetMdlDsrCur"],
          'fin_asset_mdl_dsr'         => $v["finAssetMdlDsr"],
          'fin_rpt_currency'          => $v["finRptCurrency"],
          'fin_rpt_year'              => $v["finRptYear"],
          'fin_rpt_type'              => $v["finRptType"],
          'fin_rpt_asset_value'       => $v["finRptAssetValue"],
          'fin_rpt_hutang'            => $v["finRptHutang"],
          'fin_rpt_revenue'           => $v["finRptRevenue"],
          'fin_rpt_netincome'         => $v["finRptNetincome"],
          'smk_no'                    => $v["smkNo"],
          'smk_date'                  => $v["smkDate"],
          'smk_expired'               => $v["smkExpired"],
          'expiredfrom'               => $v["expiredfrom"],
          'expiredto'                 => $v["expiredto"],
          'expiredby'                 => $v["expiredby"],
          'modified_by'               => $v["modifiedBy"],
          'next_page'                 => $v["nextPage"],
          'reg_sessionid'             => $v["regSessionid"],
          'nib_no'                    => $v["nibNo"], //
          'nib_from'                  => $v["nibFrom"], //
          'nib_to'                    => $v["nibTo"], //
          'sppkp_date'                => $v["sppkpDate"] //
        );
     

        $dataItem = [];
        $no = 0;
        foreach ($v["product"] as $p => $v2) {
          if ($v2['productId'] != null) {
            $dataItem[$no]['vendor_id']            = $v["vendorId"];
            $dataItem[$no]['product_id']           = $v2['productId'];
            $dataItem[$no]['product_name']         = $v2['productName'];
            $dataItem[$no]['product_code']         = str_replace(".","",$v2['productCode']);
            $dataItem[$no]['product_description']  = $v2['productDescription'];
            $dataItem[$no]['brand']                = $v2['brand'];
            $dataItem[$no]['source']               = $v2['source'];
            $dataItem[$no]['type']                 = $v2['type'];
            $no++;
          }
        }

     
        $dataBoard = [];
        $nb = 0;

        foreach ($v["listVndBoard"] as $ky => $val) {
          if ($val['boardId'] != null) {
            $dataBoard[$nb]['vendor_id']  = $v["vendorId"];
            $dataBoard[$nb]['board_id']   = $val["boardId"];
            $dataBoard[$nb]['email']      = $val['emailAddress'];
            $dataBoard[$nb]['ktp']        = $val['ktpNo'];
            $dataBoard[$nb]['name']       = $val['name'];
            $dataBoard[$nb]['npwp']       = $val['npwpNo'];
            $dataBoard[$nb]['position']   = $val['pos'];
            $dataBoard[$nb]['phone']      = $val['telephoneNo'];
            $dataBoard[$nb]['type']       = $val['type'];

            /*
            if ($val['pos'] == "DIREKTUR UTAMA") {
              $dataUpdate['dir_name'] = $val['name'];
              $dataUpdate['dir_pos']  = $val['pos'];
              $lv1 = true;
              // break;
            }else if ($val['pos'] == "PRESIDEN DIREKTUR" && !isset($lv1)) {
              $dataUpdate['dir_name'] = $val['name'];
              $dataUpdate['dir_pos']  = $val['pos'];
              $lv2 = true;
              // break;
            }else if ($val['pos'] == "DIREKTUR" && !isset($lv1) && !isset($lv2)){
              $dataUpdate['dir_name'] = $val['name'];
              $dataUpdate['dir_pos']  = $val['pos'];
              $lv3 = true;
              // break;
            }else{
              $dataUpdate['dir_name'] = $val['name'];
              $dataUpdate['dir_pos']  = $val['pos'];
            } 
            */
            $nb++;
          }
        }

        // $dataBank = [];
        // $nob = 0;
        // foreach ($vendorbank as $q => $valb) {
        //   if ($valb['vendorid'] != null) {
        //     $dataBank[$nob]['bank_id']      = $valb['bankid'];
        //     $dataBank[$nob]['account_name'] = $valb["nama"];
        //     $dataBank[$nob]['bank_name']    = $valb['bank'];
        //     $dataBank[$nob]['account_no']   = $valb['rek'];
        //     $dataBank[$nob]['bank_branch']  = $valb['cabang'];
        //     $dataBank[$nob]['currency']     = $valb['matauang'];
        //     $dataBank[$nob]['address']      = $valb['alamat'];
		    //   	$dataBank[$nob]['vendor_id']    = $valb['vendorid'];

        //     $nob++;
        //   }
        // }
        

        $getpos = $this->checkpos($v["listVndBoard"]);

        $dataUpdate['dir_name'] = $getpos['name'];
        $dataUpdate['dir_pos']  = $getpos['pos'];

        //insert to db
        $this->db->where('vendor_id', $v["vendorId"]);
        $headresult = $this->db->update('vnd_header', $dataUpdate);
        
        if (count($dataItem) > 0) {
          // update item vendor
          $this->db->where("vendor_id",$v["vendorId"]);
          $this->db->delete("vnd_product");
          $itemresult = $this->db->insert_batch('vnd_product', $dataItem);
        }

        if ($dataBoard > 0) {
          //update board item
          $this->db->where("vendor_id",$v["vendorId"]);
          $this->db->delete("vnd_board");
          $boardresult = $this->db->insert_batch('vnd_board', $dataBoard);          
        }

        // if ($dataBank > 0) {
        //   //update bank
        //   $this->db->where("vendor_id",$v["vendorId"]);
        //   $this->db->delete("vnd_bank");
        //   $bankresult = $this->db->insert_batch('vnd_bank', $dataBank);          
        // }
        //end 

            
          

      } else {
       
        $dataInsert = array(
          'vendor_id'                 => $v["vendorId"],
          'vendor_name'               => $v["vendorName"],
          'email_address'             => $v["emailAddress"].$emailsalt,
          'npwp_pkp'                  => strtoupper($v["npwpPkp"]),
          'creation_date'             => date("Y-m-d h:i:s",strtotime($v["creationDate"])),
          'modified_date'             => date("Y-m-d h:i:s",strtotime($v['modifiedDate'])),
          'fin_class'                 => $klasifikasi,
          'address_street'            => str_replace("'","", $v["addressStreet"]),
          'address_domisili_exp_date' => date("Y-m-d H:i:s",strtotime($v['addressDomisiliExpDate'])),
          'login_id'                  => $v["emailAddress"],
          'password'                  => $pass,
          'district_id'               => 0,
          'prefix'                    => $v["prefix"],
          'prefix_other'              => $v["prefixOther"],
          'suffix'                    => $v["suffix"],
          'suffix_other'              => $v["suffixOther"],
          'addres_prop'               => $v["addresProp"],
          'address_postcode'          => $v["addressPostcode"],
          'address_country'           => $v["addressCountry"],
          'address_phone_no'          => $v["addressPhoneNo"],
          'address_website'           => $v["addressWebsite"],
          'address_domisili_no'       => $v["addressDomisiliNo"],
          'address_domisili_date'     => date("Y-m-d H:i:s",strtotime($v['addressDomisiliDate'])),
          'contact_name'              => $v["contactName"], 
          'contact_pos'               => $v["contactPos"],
          'contact_phone_no'          => $v["contactPhoneNo"],
          'contact_email'             => $v["contactEmail"],
          'npwp_no'                   => $v["npwpNo"],
          'npwp_address'              => $v["npwpAddress"],
          'npwp_city'                 => $v["npwpCity"],
          'npwp_prop'                 => $v["npwpProp"],
          'npwp_postcode'             => $v["npwpPostcode"],
          'npwp_pkp_no'               => $v["npwpPkpNo"],
          'vendor_type'               => $v["vendorType"],
          'siup_iujk_type'            => $v["siupIujkType"],
          'siup_issued_by'            => $v["siupIssuedBy"],
          'siup_no'                   => $v["siupNo"],
          'siup_type'                 => $v["siupType"],
          'siup_from'                 => date("Y-m-d H:i:s",strtotime($v['siupFrom'])),
          'siup_to'                   => date("Y-m-d H:i:s",strtotime($v["siupTo"])),
          'tdp_issued_by'             => $v["tdpIssuedBy"],
          'tdp_no'                    => $v["tdpNo"],
          'tdp_from'                  => date("Y-m-d H:i:s",strtotime($v["tdpFrom"])),
          'tdp_to'                    => date("Y-m-d H:i:s",strtotime($v["tdpTo"])),
          'imp_issued_by'             => $v["impIssuedBy"],
          'imp_from'                  => $v["impFrom"],
          'imp_to'                    => $v["impTo"],
          'att_org'                   => $v["attOrg"],
          'fin_akta_mdl_dsr_curr'     => $v["finAktaMdlDsrCurr"],
          'fin_akta_mdl_dsr'          => $v["finAktaMdlDsr"],
          'fin_akta_mdl_str_curr'     => $v["finAktaMdlStrCurr"],
          'fin_akta_mdl_str'          => $v["finAktaMdlStr"],
          'fin_asset_mdl_dsr_cur'     => $v["finAssetMdlDsrCur"],
          'fin_asset_mdl_dsr'         => $v["finAssetMdlDsr"],
          'fin_rpt_currency'          => $v["finRptCurrency"],
          'fin_rpt_year'              => $v["finRptYear"],
          'fin_rpt_type'              => $v["finRptType"],
          'fin_rpt_asset_value'       => $v["finRptAssetValue"],
          'fin_rpt_hutang'            => $v["finRptHutang"],
          'fin_rpt_revenue'           => $v["finRptRevenue"],
          'fin_rpt_netincome'         => $v["finRptNetincome"],
          'smk_no'                    => $v["smkNo"],
          'smk_date'                  => $v["smkDate"],
          'smk_expired'               => $v["smkExpired"],
          'expiredfrom'               => $v["expiredfrom"],
          'expiredto'                 => $v["expiredto"],
          'expiredby'                 => $v["expiredby"],
          'modified_by'               => $v["modifiedBy"],
          'next_page'                 => $v["nextPage"],
          'reg_sessionid'             => $v["regSessionid"],
          'nib_no'                    => $v["nibNo"],
          'nib_from'                  => $v["nibFrom"],
          'nib_to'                    => $v["nibTo"],
          'sppkp_date'                => $v["sppkpDate"]

        );


        $dataItem = [];
        $no = 0;
        foreach ($v["product"] as $p => $v2) {
          if ($v2['productId'] != null) {
            $dataItem[$no]['vendor_id']            = $v["vendorId"];
            $dataItem[$no]['product_id']         = $v2['productId'];
            $dataItem[$no]['product_name']         = $v2['productName'];
            $dataItem[$no]['product_code']         = str_replace(".","",$v2['productCode']);
            $dataItem[$no]['product_description']  = $v2['productDescription'];
            $dataItem[$no]['brand']                = $v2['brand'];
            $dataItem[$no]['source']               = $v2['source'];
            $dataItem[$no]['type']                 = $v2['type'];
            $no++;
          }
        }


        //data board
        $dataBoard = [];
        $nb = 0;
        
        foreach ($v["listVndBoard"] as $ky => $val) {
          if ($val['boardId'] != null) {
            $dataBoard[$nb]['vendor_id']  = $v["vendorId"];
            $dataBoard[$nb]['board_id']   = $val["boardId"];
            $dataBoard[$nb]['email']      = $val['emailAddress'];
            $dataBoard[$nb]['ktp']        = $val['ktpNo'];
            $dataBoard[$nb]['name']       = $val['name'];
            $dataBoard[$nb]['npwp']       = $val['npwpNo'];
            $dataBoard[$nb]['position']   = $val['pos'];
            $dataBoard[$nb]['phone']      = $val['telephoneNo'];
            $dataBoard[$nb]['type']       = $val['type'];
            
            /*
            if ($val['pos'] == "DIREKTUR UTAMA") {
              $dataInsert['dir_name'] = $val['name'];
              $dataInsert['dir_pos']  = $val['pos'];
              $lv1 = true;
              // break;
            }else if ($val['pos'] == "PRESIDEN DIREKTUR" && !isset($lv1)) {
              $dataInsert['dir_name'] = $val['name'];
              $dataInsert['dir_pos']  = $val['pos'];
              $lv2 = true;
              // break;
            }else if ($val['pos'] == "DIREKTUR" && !isset($lv1) && !isset($lv2)){
              $dataInsert['dir_name'] = $val['name'];
              $dataInsert['dir_pos']  = $val['pos'];
              $lv3 = true;
              // break;
            }else{
              $dataInsert['dir_name'] = $val['name'];
              $dataInsert['dir_pos']  = $val['pos'];
            } 
            */

            $nb++;
          }
        }

        // $dataBank = [];
        // $nob = 0;
        // foreach ($vendorbank as $q => $valb) {
        //   if ($valb['vendorid'] != null) {
        //     $dataBank[$nob]['bank_id']      = $valb["bankid"];
        //     $dataBank[$nob]['account_name'] = $valb["nama"];
        //     $dataBank[$nob]['bank_name']    = $valb["bank"];
        //     $dataBank[$nob]['account_no']   = $valb["rek"];
        //     $dataBank[$nob]['bank_branch']  = $valb["cabang"];
        //     $dataBank[$nob]['currency']     = $valb["matauang"];
        //     $dataBank[$nob]['address']      = $valb["alamat"];
        //     $dataBank[$nob]['vendor_id']    = $valb["vendorid"];

        //     $nob++;
        //   }
        // }

        $getpos = $this->checkpos($v["listVndBoard"]);

        $dataInsert['dir_name'] = $getpos['name'];
        $dataInsert['dir_pos']  = $getpos['pos'];

        //insert to db 
        $headresult = $this->db->insert('vnd_header', $dataInsert);

        if ($dataItem > 0) {
          $itemresult = $this->db->insert_batch('vnd_product', $dataItem);
        }

        if ($dataBoard > 0) {
          $boardresult = $this->db->insert_batch('vnd_board', $dataBoard);
        }
		
        // if ($dataBank > 0) {
        //   // $this->db->select('vendor_id,account_no,bank_id');
        //   // $this->db->where('vendor_id', $v["vendorId"]);
        //   // $this->db->where('account_no', $valb["rek"]);
        //   // $this->db->where('bank_id', $valb["bankid"]);
        //   // $checkbank = $this->db->get('vnd_bank')->num_rows();	
          
        //   // if($checkbank < 0){
        //     $bankresult = $this->db->insert_batch('vnd_bank', $dataBank);
        //   // }
        // }
            //end 

      }

      ////////////////
    }

    if ($this->db->trans_status() === FALSE){

        $this->db->trans_rollback();
        return 'fail';
      } 
      else{

        $this->db->trans_commit();
        return 'success';
      }
    
  }

  private function checkpos($arr){
    
    $allData = [];

    foreach ($arr as $k => $v) {
      
      if ($v['pos'] == 'DIREKTUR UTAMA') {
        $allData['DIREKTUR UTAMA'][] = $v; 
      
      }else if ($v['pos'] == 'PRESIDEN DIREKTUR') {
        $allData['PRESIDEN DIREKTUR'][] = $v; 

      }else if ($v['pos'] == 'DIREKTUR') {
        $allData['DIREKTUR'][] = $v; 

      }else{
        $allData['ELSE'][] = $v; 
      }
    }


    if (!empty($allData['DIREKTUR UTAMA'])) {
      $data = $allData['DIREKTUR UTAMA'][0];

    }else if (!empty($allData['PRESIDEN DIREKTUR'])) {
      $data = $allData['PRESIDEN DIREKTUR'][0];

    }else if(!empty($allData['DIREKTUR'])){
      $data = $allData['DIREKTUR'][0];

    }else{
      $data = $allData['ELSE'][0];
    }

    return $ret = [
                    'name' => $data['name'],
                    'pos'  => $data['pos']
                  ];

  }

  public function getBankWs($vendor_id = ''){
		$url_ws = "http://vendor.pengadaan.com:8888/RESTSERVICE";
		$databank = json_decode(file_get_contents($url_ws."/vndbank.json?token=123456&vendorId=".$vendor_id."&act=1"), true);

		$cou = count($databank['listVndBank']);

		for ($i=0; $i < $cou; $i++) {

			$isbank = strpos($databank['listVndBank'][$i]['currency'], "IDR");

			if ($isbank !== FALSE) {
				$nama = $databank['listVndBank'][$i]['accountName'];
				$bank = $databank['listVndBank'][$i]['bankName'];
				$rek = $databank['listVndBank'][$i]['accountNo'];
				$alamat = $databank['listVndBank'][$i]['address'];
				$cabang = $databank['listVndBank'][$i]['bankBranch'];
				$bankid = $databank['listVndBank'][$i]['bankId'];
				$matauang = $databank['listVndBank'][$i]['currency'];
				$vendorid = $databank['listVndBank'][$i]['vndHeader'];
			}

			if (!isset($nama) || !isset($bank) || !isset($rek)) {
				$nama = $databank['listVndBank'][$i]['accountName'];
				$bank = $databank['listVndBank'][$i]['bankName'];
				$rek = $databank['listVndBank'][$i]['accountNo'];
				$alamat = $databank['listVndBank'][$i]['address'];
				$cabang = $databank['listVndBank'][$i]['bankBranch'];
				$bankid = $databank['listVndBank'][$i]['bankId'];
				$matauang = $databank['listVndBank'][$i]['currency'];
				$vendorid = $databank['listVndBank'][$i]['vndHeader'];
			}
		}

		$banks = [
			'nama' => isset($nama) ? $nama : NULL,
			'bank' => isset($bank) ? $bank : NULL,
			'rek' => isset($rek) ? $rek : NULL,
			'alamat' => isset($alamat) ? $alamat : NULL,
			'cabang' => isset($cabang) ? $cabang : NULL,
			'bankid' => isset($bankid) ? $bankid : NULL,
			'matauang' => isset($matauang) ? $matauang : NULL,
			'vendorid' => isset($vendorid) ? $vendorid : NULL
		];

		return $banks;
	}


}
     