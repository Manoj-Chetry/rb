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
    
        <div id="head">
            <img src="assets/icons/operator.png" id="head_img" alt="">
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
                <form action="">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="" required>
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="" required>
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="" id="" cols="30" rows="10" required></textarea>
                        <span>Type your Message</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="" value="Send">
                    </div>
                </form>
            </div>
        </div>
</main>


    <?php require "components/footer.php"; ?>
</body>

</html>