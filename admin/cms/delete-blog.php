<?php
include "../../php/connection.php";

$id = $_GET['id'];

$query = "select * from blogs where id ='$id'";

echo"$id";


?>