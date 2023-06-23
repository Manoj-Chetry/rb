<?php

include "php/connection.php";

$page;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$srm = "select * from story where publish = '1'";
$run = mysqli_query($con, $srm);
$count = mysqli_num_rows($run);

$per_page = 3;

$num_pages = ceil($count / $per_page);
$start = ($page - 1) * 3;
$query = "select * from story order by id desc limit $start,$per_page";
$iquery = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/story.css">
    <title>Our Work/Story</title>
</head>

<body>
    <?php require "components/nav.php"; ?>
    <?php require "components/sticky.php"; ?>
    <main>
        <div class="head">
            <img src="assets/icons/story.png" alt="">
            <a href="#home">
                <h1>Our Stories</h1>
            </a>
        </div>

        <div class="content">
            <?php
            if ($count) {
                while ($fdata = mysqli_fetch_assoc($iquery)) {
                    if ($fdata['publish'] == 1) { ?>
                        <a href="read-story.php?id=<?php echo "$fdata[id]"; ?>">
                            <div class="card">
                                <img src="assets/story/<?php echo "$fdata[image]" ?>" alt="#">
                                <div class="card-cont">
                                    <h4><?php echo "$fdata[title]"; ?></h4>
                                    <div>
                                        <p><?php echo "$fdata[description]"; ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
            <?php }
                    $count--;
                }
            }
            ?>

            <div class="pagination">
                <h3>Pages</h3>
                <?php
                for ($i = 1; $i <= $num_pages; $i++) {
                    echo "<a href='story.php?page=" . $i . "'>" . $i . "</a>";
                } ?>
            </div>

    </main>
    <?php require "components/footer.php"; ?>
</body>

</html>