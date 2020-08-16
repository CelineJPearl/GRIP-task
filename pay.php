<?php
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $amount=$_POST['amount'];
  $purpose='donation';

  include 'Instamojo/Instamojo.php';
  $api = new Instamojo\Instamojo('test_28b553cb92f909532e4ed10d0e4','test_b76d5ac9b2aff9a08b3350480c9','https://test.instamojo.com/api/1.1/');


  try {
    $response = $api->paymentRequestCreate(array(
      "purpose" => $purpose,
      "amount" => $amount,
      "send_email" => true,
      "email" => $email,
      "buyer_name" =>$name,
      "phone"=>$phone,
      "send_sms" => true,
      "allow_repeated_payments" =>false,
      "redirect_url" => "https://charifit.000webhostapp.com/redirect.php"
        ));
    //print_r($response);

    $pay_url=$response['longurl'];
    header("location: $pay_url");
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
?>
