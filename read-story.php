<?php
include "php/connection.php";
$id="";
if($_GET['id']==""){
    header("location: index.php");
}else{
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/read-story.css">
    <title>Read Story</title>
</head>

<body>
    <?php require "components/nav.php"; ?>
    <?php require "components/sticky.php"; ?>
    <div class="head">
        <h1>
        </h1>
    </div>
    <div class="container">
        <main>
        <?php 
                $query = "select * from story where id = '$id'";
                $fquery = mysqli_query($con,$query);
                $fdata = mysqli_fetch_array($fquery);?>
            <img src="assets/story/<?php echo"$fdata[image]";?>" alt="">
            <h1 class="title">
            <?php echo"$fdata[title]";?>
            </h1>
            <h4 class="desc"><?php echo"$fdata[description]";?></h4>
            <div class="content">
                <p>
                <?php echo"$fdata[content]";?>
                </p>
            </div>
        </main>
        <aside>
            <div class="case"></div>
            <div class="box">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum quae totam magnam temporibus sit non
                deserunt nisi aliquam culpa. Sint reiciendis expedita saepe rem est voluptatum, vero suscipit magnam
                nemo
                ullam deleniti quos id corporis nam, sed tempore quaerat quas!
            </div>
            <div class="box">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum quae totam magnam temporibus sit non
                deserunt nisi aliquam culpa. Sint reiciendis expedita saepe rem est voluptatum, vero suscipit magnam
                nemo
                ullam deleniti quos id corporis nam, sed tempore quaerat quas!
            </div>
            <div class="box">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum quae totam magnam temporibus sit non
                deserunt nisi aliquam culpa. Sint reiciendis expedita saepe rem est voluptatum, vero suscipit magnam
                nemo
                ullam deleniti quos id corporis nam, sed tempore quaerat quas!
            </div>
        </aside>
    </div>
    <?php require "components/sticky.php"; ?>
</body>

</html>