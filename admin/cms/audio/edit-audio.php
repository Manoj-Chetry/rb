<?php
session_start();

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../../../login.php");
}

include "../../../php/connection.php";

$query = "select * from audio order by id desc";
$iquery = mysqli_query($con,$query);

$count = mysqli_num_rows($iquery);
$slno = 0;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/admin css/edit-blog.css">
    <title>Podcasts</title>
</head>
<body>
    <h1 id="header">Podcasts - Update and Delete</h1>

    <a class="delete" href="add.php">Add Podcast</a>

    <main class="container">
    <table id="table">
                <thead>
                    <th>Sl. no</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Audio</th>
                    <th>Playlist</th>
                    <th>Banner</th>
                    <th>Actions</th>
                </thead>
    
                <tbody>
                <?php 
    if($count){
        while($fdata = mysqli_fetch_assoc($iquery)){
            $slno++;?>
                    <tr>
                        <td><?php echo"$slno"; ?></td>
                        <td><h2><?php echo"$fdata[Title]"; ?></h2></td>
                        <td><span><?php echo"$fdata[Description]"; ?></span></td>
                        <td id="content"><?php echo"$fdata[audio]"; ?></td>
                        <td id="playlist"><?php echo"$fdata[playlist]"; ?></td>

                        <td><img class="image" src="../../../assets/podcasts/<?php echo"$fdata[cover]"; ?>" alt="#"></td>

                        <td>
                            <div class="btns">
                                <!-- <a class="edit" href="editaudio.php?id=<?php //echo"$fdata[id]"; ?>">Edit</a> -->
                                <!-- <?php 
                                    if($fdata['publish']==true){?>
                                        <a class="publish" href="publish.php?id=<?php //echo"$fdata[id]"; ?>">Un-Publish</a>
                                <?php }
                                    else{?>
                                        <a class="publish" href="publish.php?id=<?php //echo"$fdata[id]"; ?>">Publish</a>
                                <?php   }
                                ?> -->

                                
                                


                                <a class="delete" href="delete-audio.php?id=<?php echo"$fdata[id]"; ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php $count--; }
    }
    ?>
                </tbody>
            
                
        
    
    </table> 
        
    </main>
</body>
</html>