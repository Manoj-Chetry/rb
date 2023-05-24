<?php
session_start();

include "php/connection.php";

$query = "select * from video order by id desc";
$iquery = mysqli_query($con,$query);

$count = mysqli_num_rows($iquery);

?>

    
        


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/audio.css">
    <link rel="stylesheet" href="css/utility.css">
    <title>Videos</title>
    <style>
        iframe{
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <?php require "components/nav.php"; ?>


    <?php require "components/sticky.php" ?>




    <main class="container">
        <h1 class="header">VIDEOS</h1>
        <div class="card-cont">

        <?php 
        if($count){
            while($fdata = mysqli_fetch_assoc($iquery)){
                if($fdata['publish'] == true){?>
                    <div class="card">
                    <?php echo"$fdata[link]"; ?>
                </div>
          <?php  }
            $count--; }
        }
        ?>
        </div>
    </main>


    <?php require "components/footer.php"; ?>

</body>

</html>