<?php
session_start();
// error_reporting(0);

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../login.php");
}

include "../../php/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin css/adduser.css">
    <title>Add-User</title>
</head>

<body>
    <div class="container">
        <h1>Add New Blog</h1>
        <hr>
        <form action="" method="post">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" required>

            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" required></textarea>

            <label for="author">Author</label>
            <input type="text" id="author" name="author" required>


            <label for="img">Blog Image</label>
            <input type="file" id="img" name="img" required accept=".jpg, .jpeg, .png">

            <input type="submit" value="POST" id="btn" name="submit" onclick="">

            <div style="color: black;">
                <?php

                if(isset($_POST['submit'])){
                    $title = $_POST['title'];
                    $desc = $_POST['description'];
                    $cont = $_POST['content'];
                    $auth = $_POST['author'];
                    $pic = $_FILES['img']['name'];

                    $query = "insert into blogs (title, description, content, author, image) values ('$title','$desc','$cont','$auth','$pic')";

                    $iquery = mysqli_query($con, $query);

                    if($iquery){
                        if($pic!=''){
                            move_uploaded_file($_FILES['img']['tmp_name'], "../assets/blogs/".$_FILES['img']['name']);
                        }


                        echo "
                        <script>
                            alert('Blog Posted Successfully');
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



    <script>
        
    </script>
</body>

</html>