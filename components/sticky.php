

<?php 
include "php/connection.php";


$query = "select * from logo where id = '1'";
$fquery = mysqli_query($con, $query);

$fdata = mysqli_fetch_array($fquery);

$img = $fdata['img']; 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/utility.css">

</head>

<body>




    <div class="sticky_menu">
        <a href="https://facebook.com" class="sticky_links">
            <img src="assets/logo/social media/facebook.png" alt="">
        </a>
        <a href="https://twitter.com" class="sticky_links">
            <img src="assets/logo/social media/twitter.png" alt="">
        </a>
        <a href="https://instagram.com" class="sticky_links">
            <img src="assets/logo/social media/instagram.png" alt="">
        </a>
        <a href="https://wa.me/6003238501" class="sticky_links">
            <img src="assets/logo/social media/whatsapp.png" alt="">
        </a>
        <a href="https://www.youtube.com/@RadioBrahmaputraCRS" class="sticky_links">
            <img src="assets/logo/social media/youtube.png" alt="">
        </a>
    </div>

</body>
</html>