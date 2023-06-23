<?php
include 'php/connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/audio2.css">
    <title>Document</title>
</head>

<body>
    <?php include "components/nav.php"; ?>
    <?php require "components/sticky.php"; ?>
    <main>
        <div id="head">
            <img src="assets/images/audio.png" alt="audio" id="head_img">
            <h1 id="head_txt">Audio/Podcasts</h1>
        </div>

        <div class="section">
            <div class="header_section">
                <div class="group">
                    <div class="left-line"></div>
                    <h2 class="header">New Releases</h2>
                </div>
                <a href="n.html">
                    <h4>View All</h4>
                </a>
            </div>
            <div class="container">
                <?php
                $query = "select * from audio order by id desc";
                $fquery = mysqli_query($con, $query);

                $count = mysqli_num_rows($fquery);

                while ($count > 0) {
                    $fetch = mysqli_fetch_assoc($fquery);
                ?>
                    <a href="player.php?id=<?php echo "$fetch[id]"; ?>">
                        <div class="card">
                            <div class="top"></div>
                            <div class="bottom"></div>
                            <div class="center">
                                <img src="assets/images/<?php echo "$fetch[cover]"; ?>" alt="">
                            </div>
                            <div class="play">
                                <img src="assets/images/play.png" alt="">
                            </div>
                        </div>
                    </a>
                <?php
                    $count--;
                }
                ?>




            </div>
        </div>



    </main>

    <?php require "components/footer.php"; ?>+



</body>

</html>