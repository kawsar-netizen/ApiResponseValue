<?php

//paramettar setup

 $arrayData=
[
  
  "userName" =>  "remittance",
  "password" =>  "remittance@123",
  "fromAccNo" =>  "",
  "fromAccName" => "senderName",
  "fromEmail" =>  "nuralam.siddique@meghnabank.com.bd",
  "toAccNo" =>  "11812012398",
  "toAccName" =>  "rcvName",
  "toBranchCode" =>  "060263629",
  "toEmail" =>  "",
  "toMobileNo" =>  "",
  "amount" =>  "110",
  "remarks" =>  "test transaction"
];

$arraryJson = json_encode($arrayData);
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
  CURLOPT_POSTFIELDS =>$arraryJson,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response   = curl_exec($curl);
$beftn_res  = $response;
$res        = explode(" ",$beftn_res);
$array1     = $res[1];
$array2     = $res[2];
echo '<br/>';

if($array2 == "Successful"){
  echo "Hello World!";
}
else{
  echo "GO Back ";
}

