<?php
  $insert = false;
  if(isset($_POST['contact-message'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "rb";
  
    $con = mysqli_connect($server, $username, $password, $db);
  
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
  
    // echo "Success connecting to the db"; 

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];



    $sql = "INSERT INTO contactus (`name`,`email`,`message`) VALUES ('$name','$email','$message');";

    $result = mysqli_query($con, $sql);

      if($result){
      $insert = true;
      header("Location:contact.php");
    }
    else{
      echo "ERROR: $sql <br> $con->error";
      header("Location:contact.php");
    }
    $con->close();
  }
?>

