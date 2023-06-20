<?php
  $insert = false;
  if(isset($_POST['insertintern'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "forms";
  
    $con = mysqli_connect($server, $username, $password, $db);
  
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
  
    // echo "Success connecting to the db"; 

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $ph_no = $_POST['ph_no'];
    $Dob = $_POST['Dob'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $address = $_POST['address'];
    $file = $_FILES['file'];
    $gender = $_POST['gender'];

    if(isset($_FILES['file'])){
      $file_name = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];

      //Check if uploaded file is pdf
      $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
      $allowed_ext = array("pdf");

      if(in_array($file_ext,$allowed_ext) && $file_type ==='application/pdf'){
        if(move_uploaded_file($file_tmp,"upload/internship/". $file_name)){
          echo "Sucessfully uploaded";
        }
        else{ 
          echo "Couldn't uploaded";
        }
      }
      else{
        echo "Only PDF files are allowed";

        if(!in_array($file_ext, $allowed_ext)){
          echo "Invalid file..Please upload a pdf file.";
        }
      }
    }

    $sql = "INSERT INTO internship (`fname`,`lname`,`email`, `ph_no`,`Dob`, `state`,`district`,`address`,`file`, `gender`) VALUES ('$fname','$lname','$email','$ph_no','$Dob', '$state','$district','$address','$file_name','$gender');";

    $result = mysqli_query($con, $sql);

      if($result){
      $insert = true;
      header("Location:footer.php");
    }
    else{
      echo "ERROR: $sql <br> $con->error";
      header("Location:footer.php");
    }
    $con->close();
  }
?>

