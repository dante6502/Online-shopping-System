<?php
  $amount= ['amount'];
  $phone= ['phone'];
  $consumer_key= '2sh2YA1fTzQwrZJthIrwLMoiOi3nhhal';
  $consumer_secret='CKaCnw224K4Lc56w';
  $BusinessShortCode=  '175379';//Your paybil number
  $LipaNaMpesaPassKey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
  $TransactionType= 'customerPaybillOnline';//use this for paybill
  $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';//sandbox url
  $phone= $phone;//the phone number is an MSIDSN
  $lipaOnlineUrl='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';//sandbox url
  $amount='1';
  $callBackURL = 'https://ea7e067137df.ngrok.io/api/stk/push/callback/url';//url from ngrok server
  $timestamp = date("Ymdhis");
  $password = base64_encode($BusinessShortCode . $LipaNaMpesaPassKey . $timestamp);

  //Generate the auth token
  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $access_token_url);
  $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials));
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  $curls_response = curl_exec($curl);
  $token = json_decode($curl_response)->access_token;

  //echo $token
  //initiatethe STK PUSH
  $curl2 = curl_init();
  curl_setopt($curl2, CURLOPT_URL, $lipaOnlineUrl);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '. $token));
  $curl2_post_data = [
    'BusinessShortCode' =>$BusinessShortCode,
    'Password' => $password,
    'Timestamp' => $timestamp,
    'TransactionType' => $TransactionType,
    'Amount' => $amount,
    'PartyA' => $phone,
    'PartyB' =>$BusinessShortCode,
    'PhoneNumber' =>$phone, 
    'CallBackURL' => 'https://ea7e067137df.ngrok.io/api/stk/push/callback/url',
    'AccountReference' => "TUK ONLINE SHOPPING",
    'TransactionDesc' => "Payment for goods"
  ];
  $data2_string = json_encode($curl2_post_data);

  curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl2, CURLOPT_POST, transliterator_create_from_rules);
  curl_setopt($curl2, CURLOPT_POSTFIELDS, $data2_string);
  curl_setopt($curl2, CURLOPT_HEADER, false);
  //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  $curl2_response = json_decode(curl_exec($curl2));

  //echo json_encode($curl2_response, JSON_PRETTY_PRINT);

  $code= $curl2_response-> ResponseCode;

  if($code=="0"){
      $RequestID = $curl2_response-> CheckoutRequestID;
      $MerchantRequestID = $curl2_response-> MerchantRequestID;
      $ResultDesc = $curl2_response-> esultDescription;

      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "finalproject";
      $conn = new mysqli($servername, $username, $password, $database);

      $sql = "INSERT INTO callback_push(MerchantRequestID,CheckoutRequestID,ResultCode, ResultDesc, Amount, MpesaReceiptNumber,Balance,TransactionDate, PhoneNumber)
      values('$MerchantRequestID', '$RequestID', '$code', '$ResultDesc', '$amount', 'Null', 'Null', '$timestamp', $phone)";

      if (!mysqli_query($conn,$sql)){
          echo "<div class='alert bg-info'>Something went wrong</div>";
      } else {
          //unset($_SESSION['amount']);
          //unset($_SESSION['phone']);
          echo "<div class='alert success'>follow the steps in the mpesa popup to continue with payment</div>";
      }
  }
  else{
    echo "<div class='alert primary'>Request could not be processed.Try again</div>";
  }

?>