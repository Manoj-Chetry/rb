<?php
session_start();

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../../../login.php");
}

$id = $_GET['id'];

include "../../../php/connection.php";

echo"$id";

    $query = "select * from video where id ='$id'";
    $iquery = mysqli_query($con,$query);

    $fdata = mysqli_fetch_array($iquery);

    if($fdata['publish'] == true){
        $query = "update video set publish='0' where id='$id'";
        $uq = mysqli_query($con, $query);
        if($uq){
            echo"
            <script>
                alert('Removed from publish');
                location.replace('edit-video.php');
            </script>
            ";
        }
    }else{
        $query = "update video set publish='1' where id='$id'";
        $uq = mysqli_query($con, $query);
        if($uq){
            echo"
            <script>
                alert('Published Successfully');
                location.replace('edit-video.php');
            </script>
            ";
        }
    }


?>