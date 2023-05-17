<?php
include "../../php/connection.php";

$id = $_GET['id'];

$query = "select * from blogs where id ='$id'";
$iquery = mysqli_query($con, $query);

$fdata = mysqli_fetch_array($iquery);

$img = $fdata['image'];

$query = "Delete from blogs where id = '$id'";
$delete = mysqli_query($con, $query);

if($delete){
    // unlink("../../assets/blogs/".$img);
    echo"
    <script>
        alert('Deleted Successfully');
        location.replace('blogs.php');
    </script>";
}



?>