<?php
include "../../../php/connection.php";

$id = $_GET['id'];

$query = "select * from audio where id ='$id'";
$iquery = mysqli_query($con, $query);

$fdata = mysqli_fetch_array($iquery);

$query = "Delete from audio where id = '$id'";
$delete = mysqli_query($con, $query);

if($delete){
    // unlink("../../assets/blogs/".$img);
    echo"
    <script>
        alert('Deleted Successfully');
        location.replace('edit-audio.php');
    </script>";
}


?>