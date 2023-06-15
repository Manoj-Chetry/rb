<?php
include "php/connection.php";
$id="";
if($_GET['id']==""){
    header("location: index.php");
}else{
    $id = $_GET['id'];
}

 $count=1;


?>

<?php 
                $query = "select * from blogs where id = '$id'";
                $fquery = mysqli_query($con,$query);
                $fdata = mysqli_fetch_array($fquery);
            ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/read-blog.css">
    <link rel="stylesheet" href="css/utility.css">
    <title><?php echo"$fdata[title]" ?> </title>
</head>

<body>
    <?php require"components/nav.php"; ?>
    <?php require"components/sticky.php"; ?>
    <div class="container">

        <main>
        <?php 
                $query = "select * from blogs where id = '$id'";
                $fquery = mysqli_query($con,$query);
                $fdata = mysqli_fetch_array($fquery);
            ?>
            <div class="img">
                <img src="assets/blogs/<?php echo "$fdata[image]"; ?>" alt="">
            </div>
            <div class="title">
            
            
                <h1><?php echo "$fdata[title]"; ?></h1>
            </div>
            <div class="des">
                <h3><?php echo "$fdata[description]"; ?></h3>
            </div>
            <div class="content">
                <?php echo"$fdata[content]"; ?>
            </div>
        </main>
        <aside>
            <h2>Top-Blogs</h2>
            <?php 
            $query1 = "select * from blogs where publish = '1' order by id desc";
            $fquery1 = mysqli_query($con,$query1);
            
                while($count<=3){
                    $fdata1 = mysqli_fetch_array($fquery1);?>
                    <div class="blog-card">
                        <img src="assets/blogs/<?php echo "$fdata1[image]"; ?>" alt="">
                        <a href="read-blog.php?id=<?php echo"$fdata1[id]"; ?>">
                            <div class="pop bottom">
                                <h4>Read More</h4>
                            </div>
                        </a>
                        <div class="desc">
                            <span><?php echo "$fdata1[description]"; ?></span>
                        </div>
                    </div>
                   <?php $count++;
                }
            ?>
            <!-- <div class="blog-card">

                <img src="assets/blogs/ai.jpg" alt="">
                <a href="read-blog.php?id=">
                    <div class="pop bottom">
                        <h4>Read More</h4>
                    </div>
                </a>
                <div class="desc">
                    <span>The Future is getting conqurred by AI day by day. Everything is done by machines</span>
                </div>
            </div>
            <div class="blog-card">

                <img src="assets/blogs/ai.jpg" alt="">
                <a href="read-blog.php?id=">
                    <div class="pop bottom">
                        <h4>Read More</h4>
                    </div>
                </a>
                <div class="desc">
                    <span>The Future is getting conqurred by AI day by day. Everything is done by machines</span>
                </div>
            </div> -->

        </aside>

    </div>
    <footer></footer>
</body>

</html>