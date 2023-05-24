<?php
session_start();

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../../login.php");
}

include "../../../php/connection.php";

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
    <link rel="stylesheet" href="../../../css/admin css/blogs.css">
    <title>Videos</title>
    <style>
        iframe{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <h1 id="header">Videos</h1>

    <main class="container">

    <?php 
    if($count){
        while($fdata = mysqli_fetch_assoc($iquery)){
            if($fdata['publish'] == true){?>
                <div class="audio-card">
                    <?php echo"$fdata[link]"; ?>
                </div>
          <?php  }
     $count--; }
    }
    ?>
        
        
    </main>
</body>
</html>


