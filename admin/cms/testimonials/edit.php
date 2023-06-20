<?php
session_start();

$id = $_GET['id'];

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../../../login.php");
}

include "../../../php/connection.php";


    $query = "select * from testimonials where id ='$id'";
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
    <title>Edit Blogs</title>
</head>
<body>
    <main class="container">
    <h1>Edit Blog</h1>
        <hr>
        <form method="post" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo"$fdata[name]"; ?>" required>


            <label for="msg">Message</label>
            <textarea name="msg" id="msg" cols="30" rows="10" required><?php echo"$fdata[message]"; ?></textarea>


            <label for="img">Image</label>
            <input type="file" id="img" name="img" accept=".jpg, .jpeg, .png">
            <input type="text" name="old1" id="old1" value="<?php echo"$fdata[image]"; ?>">

            <input type="submit" value="POST" id="btn" name="submit" onclick="">

            <div style="color: black;">
                <?php

                if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $msg = $_POST['msg'];
                    $old = $_POST['old1'];
                    $img = $_FILES['img']['name'];

                    if($img!=''){
                        $pic = $img;
                    }else{
                        $pic = $old;
                    }

                    $query = "update testimonials set name='$name', message='$msg', image='$pic' where id ='$id'";

                    $iquery = mysqli_query($con, $query);

                    if($iquery){
                        if($pic!=''){
                            move_uploaded_file($_FILES['img']['tmp_name'], "../../../testimonials/".$_FILES['img']['name']);
                        }


                        echo "
                        <script>
                            alert('Blog Updated Successfully');
                            location.replace('manage.php');
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
</body>
</html>