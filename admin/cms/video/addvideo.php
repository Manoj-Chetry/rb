<?php
session_start();

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../../../login.php");
}

include "../../../php/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/admin css/addblog.css">
    <title>Add-Video</title>
</head>

<body>
    <div class="container">
        <h1>Add New Video</h1>
        <hr>
        <form action="" method="post">
            <label for="link">Link</label>
            <textarea name="link" id="link" cols="30" rows="8" required placeholder="Enter the iframe that can be obtained from the youtube video while sharing under the embed option"></textarea>

            <label for="description">Description</label>
            <input type="text" id="description" name="description">

            <input type="submit" name="submit" class="btn" value="POST">

            <div style="color: black;">
                <?php

                if(isset($_POST['submit'])){
                    $link = $_POST['link'];
                    $desc = $_POST['description'];

                    $query = "insert into video (link, description) values ('$link','$desc')";
                    
                    $iquery = mysqli_query($con, $query);

                    if($iquery){
                        echo "
                        <script>
                            alert('Video Posted Successfully');
                            location.replace('edit-video.php');
                        </script>
                        ";
                    }else{
                        echo"
                        <script>
                            alert('Failed to Post!');
                        </script>
                        ";
                    }
                }    
                ?>
            </div>
        </form>
    </div>
</body>
</html>