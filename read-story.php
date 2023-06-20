<?php
include "php/connection.php";
$id = "";
if ($_GET['id'] == "") {
    header("location: index.php");
} else {
    $id = $_GET['id'];
}
?>

<?php
$query = "select * from story where id = '$id'";
$fquery = mysqli_query($con, $query);
$fdata = mysqli_fetch_array($fquery); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/read-story.css">
    <title><?php echo "$fdata[title]"; ?></title>
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
            $fquery = mysqli_query($con, $query);
            $fdata = mysqli_fetch_array($fquery); ?>
            <img src="assets/story/<?php echo "$fdata[image]"; ?>" alt="">
            <h1 class="title">
                <?php echo "$fdata[title]"; ?>
            </h1>
            <h4 class="desc"><?php echo "$fdata[description]"; ?></h4>
            <div class="content">
                <p>
                    <?php echo "$fdata[content]"; ?>
                </p>
            </div>
        </main>
        <aside>
            <div class="case">
                <h3>Recent Stories</h3>
            </div>
            <div class="aside-cont">
                <?php
                $sql = "select * from story where publish = 1 order by id desc";
                $fql = mysqli_query($con, $sql);
                $count = 1;
                while ($count <= 3) {
                    $fget = mysqli_fetch_array($fql); ?>

                    <div class="box" style="color: black; text-align: justify;">
                        <img src="assets/story/<?php echo "$fget[image]"; ?>" alt="">
                        <a href="read-story.php?id=<?php echo "$fget[id]"; ?>"></a>
                        <span><?php echo "$fget[description]"; ?></span>

                        <div class="read">Read Story</div>
                    </div>

                <?php $count++;
                }
                ?>


            </div>
        </aside>
    </div>

    <?php require "components/footer.php"; ?>
</body>

</html>