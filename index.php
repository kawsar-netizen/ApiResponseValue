<?php

//paramettar setup
$sender_acc_name = 'Nur-E-Alam';
$sender_mail = 'nuralam.siddique@meghnabank.com.bd'; //mgbl will provied the email
$rec_ac_no = '11812012398';
$rec_ac_name = 'Nur';
$rec_br_code = '060263629'; 
$rec_mail = 'nur.alam811@gmail.com';
$rec_mb = '01965274074';
$amt = '110';
$remarks = 'test transaction';


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://172.30.33.9:8088/beftn/createOtherBankTxn',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
"userName": "remittance",
"password": "remittance@123",
"fromAccNo": "110112200000902",
"fromAccName": "Nur-E-Alam",
"fromEmail": "nuralam.siddique@meghnabank.com.bd",
"toAccNo": "11812012398",
"toAccName": "Nur",
"toBranchCode": "060263629",
"toEmail": "nur.alam811@gmail.com",
"toMobileNo": "01965274074",
"amount": "110",
"remarks": "test transaction"
}
',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response   = curl_exec($curl);
// print_r(explode(" ",$response));
// die();
$beftn_res  = $response;
$res        = explode(" ",$beftn_res);
$array1     = $res[1];
$array2     = $res[2];
$res_success = 'EFT'." ". $array1." ".$array2;
echo $res_success;
die();

