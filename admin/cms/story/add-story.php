<?php
session_start();
// error_reporting(0);

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
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="../../../css/admin css/addblog.css">
    <title>Add-Blog</title>
</head>

<body>
    <div class="container">
        <h1>Add New Blog</h1>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" required>

            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" ></textarea>

            <label for="author">Author</label>
            <input type="text" id="author" name="author" required>


            <label for="img">Blog Image</label>
            <input type="file" id="img" name="img" required accept=".jpg, .jpeg, .png">

            <input type="submit" name="submit" id="submit" value="POST" class="btn">
            </form>
            <div style="color: black;">
                <?php

                if(isset($_POST['submit'])){
                    $title = $_POST['title'];
                    $desc = $_POST['description'];
                    $cont = $_POST['content'];
                    $auth = $_POST['author'];
                    $pic = $_FILES['img']['name'];
                    $er = $_FILES['img']['error'];

                    echo"$er";

                    move_uploaded_file($_FILES['img']['tmp_name'], "../../../assets/story/$pic"); 

                    $query = "insert into story (title, description, content, author, image, publish) values ('$title','$desc','$cont','$auth','$pic', 'false')";

                    
                    
                    $iquery = mysqli_query($con, $query);


                    if($iquery){
                    

                        echo "
                        <script>
                            alert('Story Posted Successfully');
                            location.replace('edit-story.php');
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
        
    </div>



    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>

</html>