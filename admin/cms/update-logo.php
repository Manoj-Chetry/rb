<?php
session_start();

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../../login.php");
}

include "../../php/connection.php";

$id = 1;


$query = "select * from logo where id = '$id'";
$fquery = mysqli_query($con, $query);

$fdata = mysqli_fetch_array($fquery);
 

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin css/updatelogo.css">
    <title>Update-Logo</title>
</head>
<body>
    <h1>Change Logo</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <img src="../../assets/logo/<?php echo$fdata['img'] ?>" alt="logo"><br>

        <input type="file" name="img" accept=".jpg, .png, .jpeg"><br>
        <input type="hidden" value="<?php echo$fdata['img']; ?>" name="old_img"><br>
        
        <input type="submit" name="submit" id="btn">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $new_img = $_FILES['img']['name'];
        $old_img = $_POST['old_img'];

        if($new_img!=''){
            $update_img = $new_img;
        }else{
            $update_img = $old_img;
        }

        if(file_exists("../../assets/logo/".$new_img)){
            $name = $new_img;
            echo"
            <script>
                alert('Image already exists');
            </script>";
        }
        else{
            $query = "update logo set img = '$update_img' where id='$id'";
            $updatequery = mysqli_query($con, $query);

            if($updatequery){
                if($new_img!=''){
                    move_uploaded_file($_FILES['img']['tmp_name'], "../../assets/logo/".$new_img);
                    unlink("../../assets/logo/".$old_img);
                }
                echo "Image Uploaded and Updated successfully";
                header("location: update-logo.php");
            }else{
                echo"
            <script>
                alert('Update Failed');
            </script>";
            }
        }
    }

    ?>
</body>
</html>