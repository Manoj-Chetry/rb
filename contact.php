<?php
  $insert = false;
  if(isset($_POST['contact-message'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "forms";
  
    $con = mysqli_connect($server, $username, $password, $db);
  
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
  
    // echo "Success connecting to the db"; 

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];



    $sql = "INSERT INTO contactUS (`name`,`email`,`message`) VALUES ('$name','$email','$message');";

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/ContactUs.css">
    <link rel="stylesheet" href="css/utility.css">
    <title>Contact Us</title>
</head>

<body>

<?php require "components/nav.php"; ?>


    <?php require "components/sticky.php" ?>
    
        <div id="head" style="display: flex; align-items: center; margin: 20px auto 0 auto; width: 85vw;">
            <img src="assets/icons/operator.png" id="head_img" style="width: 50px; margin-right: 20px;">
            <h1>Contact Us</h1>
        </div>
    <main class="contact">
        <div class="container">
            <div class="contactinfo">
                <div class="contactusbox">
                    <div class="icon">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="text">
                            <h3>Address</h3>
                            <p>
                                Radio Brahmaputra Dibrugarh<br>Dibrugarh,Assam <br>123456
                            </p>
                        </div>
                    </div>
                </div>
                <div class="contactusbox">
                    <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>9876543210</p>
                        </div>
                    </div>
                </div>
                <div class="contactusbox">
                    <div class="icon">
                        <i class="fa-solid fa-envelope"></i>
                        <div class="text">
                            <h3>Email</h3>
                            <p>radiobrahmaputra@dibru.in</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form method="post">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="name" required>
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" required>
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                        <span>Type your Message</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="submit" value="Send">
                    </div>
                </form>
            </div>
        </div>
</main>


    <?php require "components/footer.php"; ?>
</body>

</html>