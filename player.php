<?php 
include "php/connection.php";
$id = $_GET['id'];
if($id == ""){
    header("location: audio.php");
}else{
    $id = $_GET['id'];
}

$query = "select * from audio where id = '$id'";
$fquery = mysqli_query($con,$query);

$fetch = mysqli_fetch_assoc($fquery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="image">
                <img src="assets/images/<?php echo"$fetch[cover]"; ?>" alt="">
            </div>
            <span><?php echo"$fetch[audio]";?></span>
            <audio controls autoplay>
                <source src="audio/<?php echo"$fetch[audio]";?>" type="audio/mpeg">
            </audio>
        </div>

        <section>
            <table>
                <tbody>
                    
                    <?php
                    $query = "select * from audio where playlist='$fetch[playlist]'";
                    $fquery  = mysqli_query($con,$query);
                    $count = 1;
                    echo "<h1>Playlist: $fetch[playlist]</h1>";
                    while($fdata = mysqli_fetch_assoc($fquery)){?>
                    <tr>
                        <td><a href="player.php?id=<?php echo"$fdata[id]"; ?>"><?php echo"$count"; $count++;?>.</a></td>
                        <td class="title"><a href="player.php?id=<?php echo"$fdata[id]"; ?>"><?php echo"$fdata[Title]"; ?> </a></td>
                        <td><a href="player.php?id=<?php echo"$fdata[id]"; ?>"><?php echo"$fdata[Description]"; ?></a></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>

<!-- [ फूलथुङ्गे रानी ] -->