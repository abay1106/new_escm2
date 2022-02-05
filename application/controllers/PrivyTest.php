<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class PrivyTest extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(array("Procrfq_m", "Vendor_m", "Procedure_m", "Comment_m", "Procpanitia_m", "Contract_m"));
        $this->load->config('privy');

    }


    public function index()
    {
        
    }

    public function test_upload($rfqId)
    {
        
        # code...
        $timestamp = date("c",strtotime(date('Y-m-d H:i:s')));

        $URL =  $this->config->item('URL_DEV_HASH').'document/upload';
        $config['MERCHANT_KEY'] = $this->config->item('MERCHANT_KEY');
		$config['USERNAME'] = $this->config->item('USERNAME');
        $config['PASSWORD'] = $this->config->item('PASSWORD');
        $config['MERCHANT_KEY'] = $this->config->item('MERCHANT_KEY');
        $config['CLIENT_ID'] = $this->config->item('CLIENT_ID');
        $config['CLIENT_SECRET'] = $this->config->item('CLIENT_SECRET');

        //base64 imaage
        $getDataUskep = $this->Procrfq_m->getUskepData($rfqId)->row_array();
        $path = base_url()."uploads/".$getDataUskep['filename'];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        
        $dataUploadPrivy['title'] = "testupload123";
        $dataUploadPrivy['document'] = $base64;

        $dataUploadPrivy['recipients']['identifier'] = "DEVOK3079";
        $dataUploadPrivy['recipients']['type'] = "signer";
        $dataUploadPrivy['recipients']['pos_x'] = "184";
        $dataUploadPrivy['recipients']['pos_y'] = "184";
        $dataUploadPrivy['recipients']['page'] = "2";
        
        $signature = $this->signature($dataUploadPrivy,'POST');

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $URL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataUploadPrivy),
        CURLOPT_HTTPHEADER => array(
        'X-Authorization-Signature : '.$signature,
        'X-Authorization-Timestamp: '.$timestamp,
        'X-Flow-Process: stepping',,
        'Content-Type: application/json',
        'Merchant-Key:'.$config['MERCHANT_KEY']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }

    public function signature($jsonBody,$method)
    {
        # code...
        $timestamp = date("c",strtotime(date('Y-m-d H:i:s')));
        $clientId = $this->config->item('CLIENT_ID');
        $clientSecret = $this->config->item('CLIENT_SECRET');
        $bodyMD5 = md5(json_encode($jsonBody));
        $bodyMD5 = base64_encode($bodyMD5);
        
        $hmac_signature = $timestamp.":".$clientId.":".$method.":".$bodyMD5;
        $hmac = hash_hmac('sha256',$hmac_signature,$clientSecret);
        $hmac_base64 = base64_encode($hmac);

        $signature = "#".$clientId.":#".$hmac_base64;
        $signature = base64_encode($signature);

        return $signature;

    }

    public function hook_upload()
    {
        # code...
        print_r($_POST);
        print_r($_GET);
        exit;


    }

}

/* End of file PrivyTest.php */


?>