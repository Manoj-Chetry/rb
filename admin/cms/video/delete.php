<?php
include "../../../php/connection.php";

$id = $_GET['id'];

$query = "select * from video where id ='$id'";
$iquery = mysqli_query($con, $query);

$fdata = mysqli_fetch_array($iquery);

$img = $fdata['image'];

$query = "Delete from video where id = '$id'";
$delete = mysqli_query($con, $query);

if($delete){
    echo"
    <script>
        alert('Deleted Successfully');
        location.replace('edit-video.php');
    </script>";
}


?>