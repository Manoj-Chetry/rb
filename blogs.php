<?php

include "php/connection.php";

$query = "select * from blogs";
$iquery = mysqli_query($con,$query);

$count = mysqli_num_rows($iquery);


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/admin css/blogs.css">
    <title>Blogs</title>
</head>
<body>

<?php include "components/nav.php"; ?>
<?php require "components/sticky.php"; ?>
    <h1 id="header">Blogs - Update and Delete Blogs</h1>

    <main class="container">

    <?php 
    if($count){
        while($fdata = mysqli_fetch_assoc($iquery)){?>
            <div class="card">
                <img src="assets/blogs/t.jpg" alt="#">
                <h2><?php echo"$fdata[title]"; ?></h2>
                <span><?php echo"$fdata[description]"; ?></span>
                <div class="btns">
                    <a class="edit" href="#">Read More</a>
                    
                </div>
            </div>
    <?php $count--; }
    }
    ?>
        
        
    </main>
</body>
</html>