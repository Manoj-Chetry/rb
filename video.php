<?php
session_start();

include "php/connection.php";

$page;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$srm = "select * from video where publish = '1'";
$run = mysqli_query($con, $srm);
$count = mysqli_num_rows($run);

$per_page = 30;

$num_pages = ceil($count / $per_page);
$start = ($page - 1) * 30;
$query = "select * from video order by id desc limit $start,$per_page";
$iquery = mysqli_query($con, $query);

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
            if ($count) {
                while ($fdata = mysqli_fetch_assoc($iquery)) {
                    if ($fdata['publish'] == 1) { ?>
                        <div class="card">
                            <?php echo "$fdata[link]"; ?>
                            <div class="card-btm">
                                <div class="btn-log">MOST WATCHED</div>
                                <a href=""><?php echo "$fdata[description]"; ?></a>
                            </div>
                        </div>
            <?php  }
                    $count--;
                }
            }
            ?>
        </div>

        <div class="pagination">
            <h3>Pages</h3>
            <?php
            for ($i = 1; $i <= $num_pages; $i++) {
                echo "<a href='video.php?page=" . $i . "'>" . $i . "</a>";
            } ?>
        </div>
    </main>


    <?php require "components/footer.php"; ?>

</body>

</html>