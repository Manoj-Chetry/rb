<?php
session_start();
include "../../../php/connection.php";

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../login.php");
}

$query = "select * from about";
$fetch = mysqli_query($con, $query);

$query = "select * from about where id = '5'";
$lquery = mysqli_query($con,$query);

$location = mysqli_fetch_array($lquery);

$count = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="../../../css/admin css/edithome.css">
    <title>Edit About</title>
    <style>
        a{
            padding: 10px 20px;
            margin: 10px 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit About Page</h1>
        <hr>

        <a href="view.php" id="btn">About</a>
        <form method="post" enctype="multipart/form-data">

            <?php 
                while($count<=4){
                    $fdata = mysqli_fetch_array($fetch);?>
                    <div class="cont">
                        <h3>Section <?php echo"$count"; ?></h3>
                        <label for="img<?php echo"$count"; ?>">Image<?php echo"$count"; ?></label>
                        <input type="file" name="img<?php echo"$count"; ?>" id="img<?php echo"$count"; ?>" accept=".jpg, .png, .jpeg">
                        <input type="hidden" name="old_img<?php echo"$count"; ?>" id="old_img<?php echo"$count"; ?>" value="<?php echo"$fdata[image]"; ?>">
                        <textarea name="about<?php echo"$count"; ?>" id="about<?php echo"$count"; ?>" cols="30" rows="10" required><?php echo"$fdata[section]"; ?></textarea>           
                    </div>
            <?php   $count++; } $count=1;
            ?>
                <div class="cont">
                        <h3>Location Section</h3>
                        <textarea name="about5" id="about5" cols="30" rows="10" required><?php echo"$location[section]"; ?></textarea>           
                </div>
            <div>
                <?php 
                if(isset($_POST['submit'])){
                    $about1 = $_POST['about1'];
                    $about2 = $_POST['about2'];
                    $about3 = $_POST['about3'];
                    $about4 = $_POST['about4'];
                    $about5 = $_POST['about5'];


                    $new1 = $_FILES['img1']['name'];
                    $old1 = $_POST['old_img1'];
                    $new2 = $_FILES['img2']['name'];
                    $old2 = $_POST['old_img2'];
                    $new3 = $_FILES['img3']['name'];
                    $old3 = $_POST['old_img3'];
                    $new4 = $_FILES['img4']['name'];
                    $old4 = $_POST['old_img4'];


                    if($new1!=''){
                        move_uploaded_file($_FILES['img1']['tmp_name'], "../../../assets/about/".$new1);
                        unlink("../../../assets/about/".$old1);
                    }
                    if($new2!=''){
                        move_uploaded_file($_FILES['img2']['tmp_name'], "../../../assets/about/".$new2);
                        unlink("../../../assets/about/".$old2);
                    }
                    if($new3!=''){
                        move_uploaded_file($_FILES['img3']['tmp_name'], "../../../assets/about/".$new3);
                        unlink("../../../assets/about/".$old3);
                    }
                    if($new4!=''){
                        move_uploaded_file($_FILES['img4']['tmp_name'], "../../../assets/about/".$new4);
                        unlink("../../../assets/about/".$old4);
                    }

                   
                    $query = "update about set section = '$about1', image = '$new1' where id = '1'";
                    $update1 = mysqli_query($con , $query);
                    $query = "update about set section = '$about2', image = '$new2' where id = '2'";
                    $update2 = mysqli_query($con , $query);
                    $query = "update about set section = '$about3',image = '$new3' where id = '3'";
                    $update3 = mysqli_query($con , $query);
                    $query = "update about set section = '$about4', image = '$new3' where id = '4'";
                    $update4 = mysqli_query($con , $query);
                    $query = "update about set section = '$about5', image = '$new4' where id = '5'";
                    $update5 = mysqli_query($con , $query);

                    if($update1&&$update2&&$update3&&$update4&&$update5){
                        echo"
                        <script>
                            alert('Successfully Updated');
                        </script>
                        ";
                        header('location: view.php');
                    }else{
                        echo"
                        <script>
                            alert('Failed to Update');
                        </script>";
                    }
                    

                }
                ?>
            </div>
            

            <input type="submit" value="POST CHANGES" id="btn" name="submit">
        </form>
    </div>







    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#about1' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#about2' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#about3' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#about4' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#about5' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>