<?php
session_start();
// error_reporting(0);

$id = $_GET['id'];

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../login.php");
}

include "../../php/connection.php";

echo"$id";

    $query = "select * from blogs where id ='$id'";
    $iquery = mysqli_query($con,$query);

    $fdata = mysqli_fetch_array($iquery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script scr="../../ckeditor5-build-classic-37.0.1/ckeditor5-build-classic/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

    <link rel="stylesheet" href="../../../css/admin css/editblog.css">
    <title>Edit Blogs</title>
</head>
<body>
    <main class="container">
    <h1>Edit Blog</h1>
        <hr>
        <form action="" method="post">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?php echo"$fdata[title]"; ?>" required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="<?php echo"$fdata[description]"; ?>"required>

            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" required><?php echo"$fdata[content]"; ?></textarea>

            <label for="author">Author</label>
            <input type="text" id="author" name="author" value="<?php echo"$fdata[author]"; ?>" required>


            <label for="img">Blog Image</label>
            <input type="file" id="img" name="img" accept=".jpg, .jpeg, .png">
            <input type="hidden" name="old1" id="old1" value="<?php echo"$fdata[image]"; ?>">

            <input type="submit" value="POST" id="btn" name="submit" onclick="">

            <div style="color: black;">
                <?php

                if(isset($_POST['submit'])){
                    $title = $_POST['title'];
                    $desc = $_POST['description'];
                    $cont = $_POST['content'];
                    $auth = $_POST['author'];
                    $pic = $_FILES['img']['name'];

                    $query = "update blogs set title='$title', description='$desc', content='$cont', author='$auth', image='$pic' where id ='$id'";

                    $iquery = mysqli_query($con, $query);

                    if($iquery){
                        if($pic!=''){
                            move_uploaded_file($_FILES['img']['tmp_name'], "../assets/blogs/".$_FILES['img']['name']);
                        }


                        echo "
                        <script>
                            alert('Blog Updated Successfully');
                            location.replace('blogs.php');
                        </script>
                        
                        ";
                    }else{
                        echo"
                        <script>
                            alert('Failed to Update!');
                        </script>
                        ";
                    }

                    
                }

                ?>
            </div>
        </form>
    </main>

    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>

