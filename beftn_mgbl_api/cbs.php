                <?php

                $arrayData=
                [
                  
                    "userName"  => "remittance",
                    "password"  => "remittance@123",
                    "fromAcc"   => "110112200000902",
                    "toAcc"     => "110112200001495",
                    "amount"    => "2",
                    "currency"  => "BDT",
                    "remarks"  => "fund transfer"
                ];

                $arraryJson = json_encode($arrayData);

                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => 'http://172.30.33.9:8088/transaction/createFundTransfer',
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'POST',
                  CURLOPT_POSTFIELDS => $arraryJson,
                  CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                  ),
                ));

                $response   = curl_exec($curl);
                // file_put_contents("test.txt",$arraryJson.$response);
                $res_data = json_decode($response, true);
                $resCode = $res_data['resCode'];
              
                if($resCode == 000){
                    echo "Transction Sucessfully Uploaded";
                }else{
                    echo "Go Back";
                }
