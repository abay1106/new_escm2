<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Test extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model(array("Procrfq_m"));
			$this->load->config('privy');
		}

		public function upload($rfqId)
    	{
            # code...
            $timestamp = date("c", strtotime(date('Y-m-d H:i:s')));

            $URL =  $this->config->item('URL_DEV_HASH') . '/document/upload';
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
            $base64 = 'data:application/' . $type . ';base64,' . base64_encode($data);

            $dataUploadPrivy['title'] = "Test Document Upload and Share 13";
            $dataUploadPrivy['document'] = $base64;

            $recipients = [
                [
                    'identifier' => 'DEVOK3079',
                    'type' => 'signer',
                    'pos_x' => 60,
                    'pos_y' => 440,
                    'page' => 1
                ],
                [
                    'identifier' => 'DEVPA2079',
                    'type' => 'signer',
                    'pos_x' => 455,
                    'pos_y' => 440,
                    'page' => 1
                ]
            ];

            $dataUploadPrivy['recipients'] = $recipients;

            $test = [$dataUploadPrivy];

            $signature = $this->signature($test, 'POST', $timestamp);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $URL,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_POST => 1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($test),
                CURLOPT_HTTPHEADER => array(
                    'X-Authorization-Signature: ' . $signature,
                    'X-Authorization-Timestamp: ' . $timestamp,
                    'X-Flow-Process: default',
                    'cache-control: no-cache',
                    'Content-Type: application/json',
                    'Merchant-Key:' . $config['MERCHANT_KEY'],
                    'User-Agent: wika/1.0'
                ),
            ));


            $response = curl_exec($curl);
            $response2 = curl_getinfo($curl);
            
            curl_close($curl);

            echo($response);
        }

        public function signature($jsonBody, $method, $timestamp)
        {
            # code...
            $clientId = $this->config->item('CLIENT_ID');
            $clientSecret = $this->config->item('CLIENT_SECRET');
            $jsonBody2 = json_encode($jsonBody);
            $jsonBody2 = trim(preg_replace('/\s/', '', $jsonBody2));
            $jsonBody2 = trim(preg_replace('/\n/', '', $jsonBody2));
            $jsonBody2 = trim(str_replace('\\', '', $jsonBody2));
            $bodyMD5 = md5($jsonBody2, true);
            $bodyMD5 = base64_encode($bodyMD5);

            $hmac_signature = $timestamp . ":" . $clientId . ":" . $method . ":" . $bodyMD5;
            $hmac = hash_hmac('sha256', $hmac_signature, $clientSecret, true);
            $hmac_base64 = base64_encode($hmac);

            $signature = "#" . $clientId . ":#" . base64_encode($hmac);
            $signature = base64_encode($signature);

            return $signature;
        }

	}

	/* End of file PrivyTest.php */


?>