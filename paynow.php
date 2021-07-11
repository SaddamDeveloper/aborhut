<?php
if(isset($_POST['loginsubmit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    $id = $_POST['id'];
    include('src/instamojo.php');
  // $api = new Instamojo\Instamojo("test_381a100475a919749fd03c0e7c6", "test_b1fd253c6f2fe501d75c6cb9a1d","https://test.instamojo.com/api/1.1/");
  try {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
    array("X-Api-Key:test_381a100475a919749fd03c0e7c6",
    "X-Auth-Token:test_b1fd253c6f2fe501d75c6cb9a1d"));

    $payload = Array(
      "purpose" => "BILL  #".$id,
      "amount" => $amount,
      "buyer_name" => $name,
      "send_email" => true,
      "email" => $email,
      "phone" => $phone,
      "redirect_url" =>"http://localhost/aborhut/success.php"
      );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);
    curl_close($ch); 
    $data = json_decode($response,true);
    // var_dump($data);
    $site=$data["payment_request"]["longurl"];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location:'.$site); 
      exit();
  
  }
  catch (Exception $e) {
    print('Error: ' . $e->getMessage());
  }
}