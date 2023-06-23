<?php
session_start();
// error_reporting(0);

if (!isset($_SESSION['log']) || $_SESSION['log'] != true) {
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
    <title>Add-Testimonials</title>
</head>

<body>
    <div class="container">
        <h1>Add New Testimonial</h1>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>


            <label for="msg">Message</label>
            <textarea name="msg" id="msg" cols="30" rows="10" required></textarea>


            <label for="img">Image</label>
            <input type="file" id="img" name="img" required accept=".jpg, .jpeg, .png">

            <input type="submit" name="submit" id="btn" value="POST" class="btn">
        </form>
        <div style="color: black;">
            <?php

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $msg = mysqli_escape_string($con, $_POST['msg']);
                $img = $_FILES['img']['name'];


                move_uploaded_file($_FILES['img']['tmp_name'], "../../../testimonials/$img");

                $query = "insert into testimonials (name, message, image, view) values ('$name','$msg','$img','0')";


                $iquery = mysqli_query($con, $query);


                if ($iquery) {

                    echo "
                        <script>
                            alert('Posted Successfully');
                            location.replace('manage.php');
                        </script>
                        ";
                } else {
                    echo "
                        <script>
                            alert('Failed to Post!');
                        </script>
                        ";
                }
            }

            ?>
        </div>

    </div>


</body>

</html>