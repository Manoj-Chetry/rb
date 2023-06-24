<?php
include "php/connection.php";
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];
$ph = $_SESSION['ph'];
$amount = $_SESSION['amount'];

$sql = "insert into payment (name, email, address, phone, amount) values ('$name', '$email','$address','$ph','$amount')";

$q = mysqli_query($con, $sql);

if ($q) {
    echo "
    <script>
    alert('Successfully Paid');
    location.replace('index.php');
    </script>
    ";
}
