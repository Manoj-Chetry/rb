<?php
session_start();
// error_reporting(0);

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../../login.php");
}

include "../../../php/connection.php";

$query = "select * from story order by id desc";
$iquery = mysqli_query($con,$query);

$count = mysqli_num_rows($iquery);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/utility.css">
    <link rel="stylesheet" href="../../../css/story.css">
    <title>Our Work/Story</title>
</head>

<body>
    <main>
        <div class="head">
            <img src="../../../assets/icons/story.png" alt="">
            <a href="#home">
                <h1>Our Stories</h1>
            </a>
        </div>
        <div class="btns">
            <a href="add-story.php">Add New Story</a>
            <a href="edit-story.php">Edit Stories</a>
        </div>
        <div class="content">
        <?php 
    if($count){
        while($fdata = mysqli_fetch_assoc($iquery)){
            if($fdata['publish'] == true){?>
                <a href="read-story.php?id=<?php echo"$fdata[id]"; ?>">
                <div class="card">
                    <img src="../../../assets/story/<?php echo"$fdata[image]"; ?>" alt="#">
                    <div class="card-cont">
                        <h4><?php echo"$fdata[title]"; ?></h4>
                        <div>
                            <p><?php echo"$fdata[content]"; ?></p>
                        </div>
                    </div>
                </div>
            </a>
          <?php  }
     $count--; }
    }
    ?>
    </main>
</body>

</html>