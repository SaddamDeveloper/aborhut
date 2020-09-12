<?php
if(isset($_POST['loginsubmit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    $id = $_POST['id'];
    include('src/instamojo.php');
  $api = new Instamojo\Instamojo("test_381a100475a919749fd03c0e7c6", "test_b1fd253c6f2fe501d75c6cb9a1d","https://test.instamojo.com/api/1.1/");
  try {
    $response = $api->paymentRequestCreate(array(
      "purpose" => "BILL  #".$id,
      "amount" => $amount,
      "buyer_name" => $name,
      "send_email" => true,
      "email" => $email,
      "phone" => $phone,
      "redirect_url" =>"http://localhost/aborhut/success.php"
      ));
      header('Location: ' . $response['longurl']);
      exit();
  
  }
  catch (Exception $e) {
    print('Error: ' . $e->getMessage());
  }
}