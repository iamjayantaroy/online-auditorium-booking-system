<?php
include("inc/razorpay-php-2.8.7/Razorpay.php");

use Razorpay\Api\Api;
use Monolog\SignalHandler;
use Razorpay\Api\Errors\SignatureVerificationError;

$con=mysqli_connect("localhost","root","","auditorium");
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $price = $_POST['price'];
    $price = $price *100;
}

$api = new Api('rzp_test_ZzObXAeC2YmkGr', 'rZEXS9k6RizSWOXNIZebuj8s');
$orderData = [
    'receipt'         => 'rcptid_11',
    'amount'          => $price, // 39900 rupees in paise
    'currency'        => 'INR'
];

$razorpayOrder = $api->order->create($orderData);
$id=$razorpayOrder['id'];
$amount=$razorpayOrder['amount'];

$ins="INSERT INTO payment SET order_id='$id',amount='$_POST[price]',`userid`='$_POST[user]',`auditoriumid`='$_POST[id]',`date`='$_POST[bday]'";
$con->query($ins);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<main class="main">
    <div class="container tex-center mx-auto"
        style="text-align: center;border:2px solid grey; margin-top:5%;padding:3%">
        <div style="text-align: center">
            <img src="https://www.ecommerce-nation.com/wp-content/uploads/2019/02/razorpay.webp" alt="" width="200px"
                style="display: block;
                    margin-left: auto;
                    margin-right: auto;">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Pay With RazorPay
            </label>
        </div>
        <form action="pay.php" method="POST" class="text-center mx-auto mt-5">
            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_ZzObXAeC2YmkGr"
                data-amount="<?php echo $amount ?>" data-currency="INR" data-order_id="<?php echo $id ?>"
                data-buttontext="Pay with Razorpay" data-name="Bookly" data-description="Test transaction"
                data-theme.color="#252b48">
            </script>
            <input type="hidden" custom="Hidden Element" name="hidden">
        </form>
    </div>
</main>

