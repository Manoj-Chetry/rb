<?php
session_start();
// error_reporting(0);

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../../../login.php");
}

include "../../../php/connection.php";

$query = "select * from blogs order by id desc";
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
    <link rel="stylesheet" href="edit-blog.css">
    <title>Blogs</title>
</head>
<body>
    <h1 id="header">Blogs - Update and Delete Blogs</h1>

    <a class="delete" href="blogs.php">Blogs</a>
    <a class="delete" href="add-blog.php">Add Blogs</a>
    <a href="/rb/admin/admin.php" class="delete">Admin-Panel</a>

    <main class="container">
    <table id="table">
                <thead>
                    <th>Sl. no</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Actions</th>
                </thead>
    
                <tbody>
                <?php 
    if($count){
        while($fdata = mysqli_fetch_assoc($iquery)){
            $slno++;?>
                    <tr>
                        <td><?php echo"$slno"; ?></td>
                        <td><h2><?php echo"$fdata[title]"; ?></h2></td>
                        <td><span><?php echo"$fdata[description]"; ?></span></td>
                        <td id="content"><?php echo"$fdata[content]"; ?></td>

                        <td><img class="image" src="../../../assets/blogs/<?php echo"$fdata[image]"; ?>" alt="#"></td>

                        <td>
                            <div class="btns">
                                <a class="edit" href="editblog.php?id=<?php echo"$fdata[id]"; ?>">Edit</a>
                                <?php 
                                    if($fdata['publish']==true){?>
                                        <a class="publish" href="publish.php?id=<?php echo"$fdata[id]"; ?>">Un-Publish</a>
                                <?php }
                                    else{?>
                                        <a class="publish" href="publish.php?id=<?php echo"$fdata[id]"; ?>">Publish</a>
                                <?php   }
                                ?>
                              
                                <a class="delete" href="delete-blog.php?id=<?php echo"$fdata[id]"; ?>">Delete</a>
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