<?php
include("inc/razorpay-php-2.8.7/Razorpay.php");
use Razorpay\Api\Api;
use Monolog\SignalHandler;
use Razorpay\Api\Errors\SignatureVerificationError;

$con=mysqli_connect("localhost","root","","auditorium");
$data = $_POST;
print_r($data);
$razorpay_id=$data['razorpay_payment_id'];
$order_id=$data['razorpay_order_id'];

$upd="UPDATE payment SET is_success='1',razorpay_id='$razorpay_id' WHERE order_id='$order_id'";

$api = new Api('rzp_test_ZzObXAeC2YmkGr', 'rZEXS9k6RizSWOXNIZebuj8s');

try{
$attributes = array(
     'razorpay_signature' => $data['razorpay_signature'],
     'razorpay_payment_id' => $data['razorpay_payment_id'],
     'razorpay_order_id' => $data['razorpay_order_id']
);
$order = $api->utility->verifyPaymentSignature($attributes);
$success = true;
}catch(SignatureVerificationError $e){

$success = false;
}


if($success){
$con->query($upd);
header('location:success.php');
}else{

return header('location:failed.php');
}   



?>