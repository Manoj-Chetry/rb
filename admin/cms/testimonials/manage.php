<?php
session_start();
include "../../../php/connection.php";

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../login.php");
}

$query = "select * from testimonials order by id desc";
$fquery = mysqli_query($con, $query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/admin css/edit-blog.css">
    <link rel="stylesheet" href="../../cp.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    </style>
    <title>Manage Testimonials</title>
</head>
<?php require "../../cp.php"; ?>
<body>
    <h1 id="header">Manage Testimonials</h1>

    <a class="delete" href="add.php">Add Testimonials</a>
    
    <main class="container">
        <table id="table">
            <thead>
                <th>Sl. no</th>
                <th>Name</th>
                <th>Message</th>
                <th>Image</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                $count=1;
                while($fdata = mysqli_fetch_array($fquery)){?>
                    <tr>
                        <td><?php echo"$count"; ?></td>
                        <td><h2><?php echo"$fdata[name]"; ?></h2></td>
                        <td><span><?php echo"$fdata[message]"; ?></span></td>
                        <td><img class="image" src="../../../testimonials/<?php echo"$fdata[image]"; ?>" alt="#"></td>

                        <td>
                            <div class="btns">
                                <a class="edit" href="edit.php?id=<?php echo"$fdata[id]"; ?>">Edit</a>
                                <?php 
                                    if($fdata['view']==true){?>
                                        <a class="publish" href="publish.php?id=<?php echo"$fdata[id]"; ?>">Un-Publish</a>
                                <?php }
                                    else{?>
                                        <a class="publish" href="publish.php?id=<?php echo"$fdata[id]"; ?>">Publish</a>
                                <?php   }
                                ?>
                              
                                <a class="delete" href="delete.php?id=<?php echo"$fdata[id]"; ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php $count++; }
                ?>
            </tbody>
    </table>
</body>
</html>