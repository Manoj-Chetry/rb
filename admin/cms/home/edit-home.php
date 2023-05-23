<?php
session_start();
include "../../../php/connection.php";

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../login.php");
}

$query = "select * from home where id='1'";
$fetch = mysqli_query($con, $query);

$fdata = mysqli_fetch_array($fetch);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="../../../css/admin css/edithome.css">
    <title>Edit Home</title>
</head>

<body>
    <div class="container">
        <h1>Edit Home Page</h1>
        <hr>
        <form method="post" enctype="multipart/form-data">
            <div class="carousel cont">
                <h3>Carousel Images</h3>
                <label for="img1">Image1</label>
                <input type="file" name="img1" id="img1" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img1" id="old_img1" value="<?php echo"$fdata[image1]" ?>">

                <label for="img2">Image2</label>
                <input type="file" name="img2" id="img2" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img2" id="old_img2" value="<?php echo"$fdata[image2]" ?>">

                <label for="img3">Image3</label>
                <input type="file" name="img3" id="img3" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img3" id="old_img3" value="<?php echo"$fdata[image3]" ?>">
                
                <label for="img4">Image4</label>
                <input type="file" name="img4" id="img4" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img4" id="old_img4" value="<?php echo"$fdata[image4]" ?>">
            </div>

            <div class="about cont">
                <h3>About Us Section</h3>
                <textarea name="about" id="about" cols="30" rows="10" required><?php echo"$fdata[about]" ?></textarea>
            </div>


            <input type="submit" value="POST CHANGES" id="btn" name="submit">

            <div>
                <?php 
                    if(isset($_POST['submit'])){
                        $new1 = $_FILES['img1']['name'];
                        $old1 = $_POST['old_img1'];
                        $new2 = $_FILES['img2']['name'];
                        $old2 = $_POST['old_img2'];
                        $new3 = $_FILES['img3']['name'];
                        $old3 = $_POST['old_img3'];
                        $new4 = $_FILES['img4']['name'];
                        $old4 = $_POST['old_img4'];

                        $about = $_POST['about'];


                        if($new1!=''){
                            move_uploaded_file($_FILES['img1']['tmp_name'], "../../../assets/gallery/".$new1);
                            unlink("../../../assets/gallery/".$old1);
                            $update1 = $new1;
                        }else{
                            $update1 = $old1;
                        }
                        if($new2!=''){
                            move_uploaded_file($_FILES['img2']['tmp_name'], "../../../assets/gallery/".$new2);
                            unlink("../../../assets/gallery/".$old2);
                            $update2 = $new2;
                        }else{
                            $update2 = $old2;
                        }
                        if($new3!=''){
                            move_uploaded_file($_FILES['img3']['tmp_name'], "../../../assets/gallery/".$new3);
                            unlink("../../../assets/gallery/".$old3);
                            $update3 = $new3;
                        }else{
                            $update3 = $old3;
                        }
                        if($new4!=''){
                            move_uploaded_file($_FILES['img4']['tmp_name'], "../../../assets/gallery/".$new4);
                            unlink("../../../assets/gallery/".$old4);
                            $update4 = $new4;
                        }else{
                            $update4 = $old4;
                        }



                        $sql = "update home set image1 = '$update1', image2 ='$update2', image3 = '$update3', image4 = '$update4', about = '$about' where id = '1'";
                        $update = mysqli_query($con,$sql);

                        if($update){
                            echo"
                            <script>
                                alert('Updated Successfully');
                            </script>
                            ";
                        }else{
                            echo"
                            <script>
                                alert('Failed to Update');
                            </script>
                            ";
                        }
                    }
                ?>
            </div>
        </form>

        
    </div>






    <script>
        ClassicEditor
            .create( document.querySelector( '#about' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>