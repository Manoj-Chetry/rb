<?php
session_start();

$id = $_GET['id'];

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../../../login.php");
}

include "../../../php/connection.php";

    $query = "select * from audio where id ='$id'";
    $iquery = mysqli_query($con,$query);
    $fdata = mysqli_fetch_array($iquery);

    $sql = "select distinct playlist from audio";
    $fquery = mysqli_query($con,$sql);
    $count = mysqli_num_rows($fquery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

    <link rel="stylesheet" href="../../../css/admin css/editblog.css">
    <title>Edit Podcast</title>
</head>
<body>
    <main class="container">
    <h1>Edit Podcast</h1>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?php echo"$fdata[Title]"; ?>" required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="<?php echo"$fdata[Description]"; ?>"required>

            <div class="playlist">
                <label for="playlist">Playlist</label>
                <input type="text" name="playlist" id="playlist" >
                <div class="button" onclick="change()">Select Playlist</div>
            </div>

            <div class="drop">
            <label for="playlist">Playlist</label>
                <select name="playlist" id="playlist">
                    
                    <?php
                        while($count>0){
                            $getdata = mysqli_fetch_assoc($fquery);?>
                            <option value="<?php echo"$getdata[playlist]"; ?>"><?php echo"$getdata[playlist]"; ?></option>
                        <?php $count--;}
                    ?>
                </select>
                <div class="button" onclick="change()">Create Playlist</div>
            </div>

            <label for="audio">Audio File</label>
            <input type="file" id="audio" name="audio" accept=".mp3">
            <input type="text" name="old2" id="old2" value="<?php echo"$fdata[audio]"; ?>">


            <label for="img">Banner</label>
            <input type="file" id="img" name="img" accept=".jpg, .jpeg, .png">
            <input type="text" name="old1" id="old1" value="<?php echo"$fdata[cover]"; ?>">

            <input type="submit" value="POST" id="btn" name="submit" onclick="">

            <div style="color: black;">
                <?php

                if(isset($_POST['submit'])){
                    $title = $_POST['title'];
                    $desc = $_POST['description'];
                    $playlist = $_POST['playlist'];
                    $audio = $_FILES['audio']['name'];
                    $pic = $_FILES['img']['name'];


                    

                    if($iquery){
                        if($pic!=''){
                            move_uploaded_file($_FILES['img']['tmp_name'], "../assets/podcasts/".$_FILES['img']['name']);
                            unlink("../../../assets/podcasts/".$old1);
                            $updateimg = $pic;
                        }else{
                            $updateimg = $old1;
                        }


                        if($audio!=''){
                            move_uploaded_file($_FILES['audio']['tmp_name'], "../audio/".$_FILES['audio']['name']);
                            unlink("../../../audio/".$old2);
                            $updateaudio = $audio;
                        }else{
                            $updateaudio = $old2;
                        }



                        $query = "update audio set Title='$title', Description='$desc', audio='$updateaudio', playlist='$playlist', cover='$updateimg' where id ='$id'";

                        $iquery = mysqli_query($con, $query);


                        echo "
                        <script>
                            alert('Audio Updated Successfully');
                            location.replace('edit-audio.php');
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
        let set = 1;
        function change(){
            let d1 =document.querySelector(".playlist");
            let d2 =document.querySelector(".drop");
            if(set===1){
                d1.style.display="block";
                d2.style.display="none";
                set=0;
            }else{
                d2.style.display="block";
                d1.style.display="none";
                set=1;
            }
        }
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>