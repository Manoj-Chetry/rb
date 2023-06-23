<?php
include "php/connection.php";
$id = $_GET['id'];
if ($id == "") {
    header("location: audio.php");
} else {
    $id = $_GET['id'];
}

$query = "select * from audio where id = '$id'";
$fquery = mysqli_query($con, $query);

$fetch = mysqli_fetch_assoc($fquery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/audio2.css">
    <link rel="stylesheet" href="css/player.css">
    <title>Document</title>
</head>

<body>
    <?php require "components/nav.php"; ?>
    <main>
        <div id="head">
            <img src="assets/images/audio.png ?>" alt="audio" id="head_img">
            <h1 id="head_txt">Audio/Podcasts</h1>
        </div>
        <div class="player">
            <div class="up">
                <div class="image">
                    <img src="assets/images/<?php echo "$fetch[cover]"; ?>" alt="">

                </div>
                <div class="right">
                    <span><?php echo "$fetch[audio]"; ?></span>
                    <span id="des"><?php echo "$fetch[Description]"; ?></span>

                </div>
            </div>
            <audio controls autoplay controlsList="nodownload">
                <source src="audio/<?php echo "$fetch[audio]"; ?>" type="audio/mpeg">
            </audio>
        </div>

        <div class="link">
            <input type="text" value="localhost/rb/player.php?id=<?php echo "$fetch[id]"; ?>" id="pod">
            <button onclick="copy()">Copy Link</button>
        </div>

        <section>
            <table>
                <tbody>

                    <?php
                    $query = "select * from audio where playlist='$fetch[playlist]'";
                    $fquery  = mysqli_query($con, $query);
                    $count = 1;
                    echo "<h1>Playlist: $fetch[playlist]</h1>";
                    while ($fdata = mysqli_fetch_assoc($fquery)) { ?>
                        <tr>
                            <td><a href="player.php?id=<?php echo "$fdata[id]"; ?>"><?php echo "$count";
                                                                                    $count++; ?>.</a></td>
                            <td class="title"><a href="player.php?id=<?php echo "$fdata[id]"; ?>"><?php echo "$fdata[Title]"; ?> </a></td>
                            <!-- <td><a href="player.php?id=<?php echo "$fdata[id]"; ?>"><?php echo "$fdata[Description]"; ?></a></td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section>
            <h1>Trending</h1>
            <div class="container">
                <?php
                $sql = "select distinct playlist from audio order by id desc";
                $faud = mysqli_query($con, $sql);
                $num = mysqli_num_rows($faud);
                $rank = 1;
                while ($num > 0) {
                    $data = mysqli_fetch_array($faud);
                    $q = "select * from audio where playlist = '$data[playlist]'";
                    $fq = mysqli_query($con, $q);
                    $dp = mysqli_fetch_assoc($fq); ?>
                    <a href="player.php?id=<?php echo "$dp[id]"; ?>">
                        <div class="card">
                            <div class="top">
                                <div class="rank">

                                </div>
                            </div>
                            <div class="bottom"></div>
                            <div class="center">
                                <img src="assets/images/<?php echo "$dp[cover]"; ?>" alt="">
                            </div>
                            <div class="play">
                                <img src="assets/images/play.png" alt="">
                            </div>
                        </div>
                    </a>
                <?php $num--;
                }


                ?>
            </div>
        </section>
    </main>

    <?php require "components/footer.php" ?>

    <script>
        function copy() {

            let copyText = document.getElementById("pod");

            copyText.select();
            copyText.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(copyText.value);

            alert("Copied the text: " + copyText.value);
        }
    </script>
</body>

</html>

<!-- [ फूलथुङ्गे रानी ] -->