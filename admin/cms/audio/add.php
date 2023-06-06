<?php
include '../../../php/connection.php';

$query = "select distinct playlist from audio";
$fquery = mysqli_query($con,$query);


$count = mysqli_num_rows($fquery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/admin css/addaudio.css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Add Audio/Podcasts</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="audio">Audio File</label>
            <input type="file" name="audio" id="audio" required accept=".mp3">

            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>

            <label for="description">Description</label>
            <input type="text" name="description" id="description" required>

            <div class="playlist">
                <label for="playlist">Playlist</label>
                <input type="text" name="playlist" id="playlist">
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

            <label for="cover">Cover</label>
            <input type="file" name="cover" id="cover" required accept=".jpg, .jpeg, .png">

            <input type="submit" name="submit" class="btn" value="Add">

            <div class="msg">
                <?php 
                    if(isset($_POST['submit'])){
                        $file = $_FILES['audio']['name'];
                        $title = $_POST['title'];
                        $desc = $_POST['description'];
                        $playlist = $_POST['playlist'];
                        $cover = $_FILES['cover']['name'];

                        move_uploaded_file($_FILES['cover']['tmp_name'], "../../../assets/podcasts/$cover"); 
                        move_uploaded_file($_FILES['audio']['tmp_name'], "../../../audio/$file"); 

                        $sql = "insert into audio (audio, Title, Description, playlist, cover) values ('$file','$title','$desc','$playlist','$cover')";

                    
                    
                    $isql = mysqli_query($con, $sql);


                    if($isql){
                    

                        echo "
                        <script>
                            alert('Podcast Posted Successfully');
                            location.replace('add.php');
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
</body>
</html>
