<?php
session_start();
include "php/connection.php";

$query = "select * from about";
$fetch = mysqli_query($con, $query);


$query = "select * from about where id = '5'";
$lquery = mysqli_query($con,$query);

$location = mysqli_fetch_array($lquery);

$count = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/utility.css">
    <title>About Us</title>
</head>

<body>
    <?php require "components/nav.php"; ?>


    <?php require "components/sticky.php" ?>



    <main class="container">
        <div class="header">
            <h1>About-Us</h1>
        </div>
        <?php
        while($count<=4){
            $fdata = mysqli_fetch_array($fetch);
            if($count%2==1){?>
                <div class="row">
                    <div class="col txt-col">
                        <p>
                            <?php echo"$fdata[section]"; ?>
                        </p><br>
                    </div>
                    <div class="col img-col">
                        <img src="assets/about/<?php echo"$fdata[image]" ?>" alt="">
                    </div>
                </div>
            <?php }else{?>
                <div class="row">
                    <div class="col img-col">
                            <img src="assets/gallery/g3.jpg" alt="">
                    </div>
                    <div class="col txt-col">
                            <p>
                                <?php echo"$fdata[section]"; ?>
                            </p><br>
                    </div>
                </div>
        <?php } $count++; }?>
                <div class="row">
                    <div class="col txt-col">
                            <p>
                                <?php echo"$location[section]"; ?>
                            </p><br>
                    </div>
                    <div class="mapouter1">
                    <div class="gmap_canvas1"><iframe width="650" height="500" id="gmap_canvas1"
                            src="https://maps.google.com/maps?q=Radio%20Brahmaputra,%20Dibrugarh&t=&z=17&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                            href="https://123movies-i.net"></a><br>
                        <style>
                            .mapouter1 {
                                position: relative;
                                text-align: right;
                                height: 500px;
                                width: 650px;
                            }
                        </style><a href="https://www.embedgooglemap.net"></a>
                        <style>
                            .gmap_canvas1 {
                                overflow: hidden;
                                background: none !important;
                                height: 500px;
                                width: 650px;
                            }
                        </style>
                    </div>
                </div>
                </div>
    </main>


    <?php require "components/footer.php"; ?>

</body>

</html>