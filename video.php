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
    <link rel="stylesheet" href="css/audio.css">
    <link rel="stylesheet" href="css/utility.css">
    <title>Videos</title>
</head>

<body>
    <?php require "components/nav.php"; ?>


    <?php require "components/sticky.php" ?>




    

    <main>
        <div id="head">
            <img src="assets/icons/video.png" alt="">
            <h1>Videos</h1>
        </div>
        <div class="container">
            <?php 
            if($count){
                while($fdata = mysqli_fetch_assoc($iquery)){
                    if($fdata['publish'] == true){?>
                        <div class="card">
                            <?php echo"$fdata[link]"; ?>
                            <div class="card-btm">
                                <div class="btn-log">MOST WATCHED</div>
                                <a href=""><?php echo"$fdata[description]"; ?></a>
                            </div>
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