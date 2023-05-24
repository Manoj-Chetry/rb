<?php
session_start();
include "../../../php/connection.php";

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../login.php");
}

$query = "select * from video order by id desc";
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
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="../../../css/admin css/edit-blog.css">
    <title>Edit Video</title>
    <style>
        .slno{
            width: 40px;
        }
        .action{
            width: 200px;
            padding: 0 40px;
        }
        iframe{
            height: 200px;
            width: 400px;
        }
    </style>
</head>
<body>
<h1 id="header">Videos - Update and Delete Videos</h1>

<a class="delete" href="view.php">Videos</a>
<a class="delete" href="addvideo.php">Add Videos</a>

<main class="container">
<table id="table">
            <thead>
                <th class="slno">Sl. no</th>
                <th>Link</th>
                
                <th class="action">Actions</th>
            </thead>

            <tbody>
            <?php 
if($count){
    while($fdata = mysqli_fetch_assoc($iquery)){
        $slno++;?>
                <tr>
                    <td class="slno"><?php echo"$slno"; ?></td>
                    <td><?php echo"$fdata[link]"; ?></td>

                    <td class="action">
                        <div class="btns">
                            <a class="edit" href="editvideo.php?id=<?php echo"$fdata[id]"; ?>">Edit</a>
                            <?php 
                                if($fdata['publish']==true){?>
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
                <?php $count--; }
}
?>
            </tbody>
        
            
    

</table> 
    
</main>
</body>
</html>