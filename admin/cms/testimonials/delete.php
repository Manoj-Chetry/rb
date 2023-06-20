<?php
include "../../../php/connection.php";

$id = $_GET['id'];

$query = "select * from testimonials where id ='$id'";
$iquery = mysqli_query($con, $query);

$fdata = mysqli_fetch_array($iquery);

$img = $fdata['image'];

$query = "Delete from testimonials where id = '$id'";
$delete = mysqli_query($con, $query);

if($delete){
    unlink("../../../testimonials/".$img);
    echo"
    <script>
        alert('Deleted Successfully');
        location.replace('manage.php');
    </script>";
}


?>