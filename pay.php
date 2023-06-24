<?php

require('config.php');
require('razorpay-php/Razorpay.php');
session_start();
// create the razorpay order

if (isset($_POST['donate'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $ph = $_POST['ph_no'];
    $amoun = $_POST['amount'];

    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['address'] = $address;
    $_SESSION['ph'] = $ph;
    $_SESSION['amount'] = $amoun;
}

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

$orderData = [
    'receipt'         => 'rcptid_11',
    'amount'          => $_SESSION['amount'] * 100,
    'currency'        => 'INR'
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR') {
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);
    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}
$checkout = 'automatic';
if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true)) {
    $checkout = $_GET['checkout'];
}
$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Radio Brahmaputra",
    "description"       => "Radio Brahmaputra",
    "image"             => "https://radiobrahmaputra.org/wp-content/uploads/2019/04/logo.png",
    "prefill"           => [
        "name"              => $name,
        "email"             => $email,
        "contact"           => $ph,
    ],
    "notes"             => [
        "address"           => $address,
        "merchant_order_id" => "32564258",
    ],
    "theme"             => [
        "color"             => "#CD192A"
    ],
    "order_id"          => $razorpayOrderId,
];
if ($displayCurrency !== 'INR') {
    $data['display_currency'] = $displayCurrency;
    $data['displayAmount'] = $displayAmount;
}
$json = json_encode($data);
require("checkout/manual.php");
