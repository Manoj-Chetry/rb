<?php
session_start();

$id = $_GET['id'];

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../../../login.php");
}

include "../../../php/connection.php";


    $query = "select * from video where id ='$id'";
    $iquery = mysqli_query($con,$query);

    $fdata = mysqli_fetch_array($iquery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/admin css/editblog.css">
    <title>Edit Video</title>
</head>
<body>
    <main class="container">
    <h1>Edit Video</h1>
        <hr>
        <form action="" method="post">
            <label for="link">Link</label>
            <textarea name="link" id="link" cols="30" rows="8" required><?php print$fdata['link'];?></textarea>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="<?php echo"$fdata[description]"; ?>"required>

            <input type="submit" value="POST" id="btn" name="submit">


            <div style="color: black;">
                <?php

                if(isset($_POST['submit'])){
                    $link = $_POST['link'];
                    $desc = $_POST['description'];


                    $query = "update video set link='$link', description='$desc' where id ='$id'";

                    $iquery = mysqli_query($con, $query);

                    if($iquery){
                        echo "
                        <script>
                            alert('Link Updated Successfully');
                            location.replace('view.php');
                        </script>
                        
                        ";
                    }else{
                        echo"
                        <script>
                            alert('Failed to Update!');
                        </script>
                        ";
                    }
                    
                }?>

            </div>
        </form>
    </main>
</body>
</html>