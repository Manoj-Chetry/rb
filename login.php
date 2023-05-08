<?php
    include 'connection.php';

    if(isset($_POST['submit'])){
        $email = mysqli_escape_string($con, $_POST['email']);
        $pswd = mysqli_escape_string($con, $_POST['pswd']);
    
        $query = 'select * from users where email = "$email"';
        $emailquery = mysqli_query($con, $query);
    
        $email_count = mysqli_num_rows($emailquery);
        if($email_count>0){
            echo "User exist";
        }else{
            echo "User not found";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body>

    <main>
        <div class="container">
            <form method="post">
                <img src="user.png" alt="">
                <h2 id="header">Sign In</h2>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="abc@example.com">
                <label for="pswd">Password</label>
                <input type="password" name="pswd" id="pswd" required placeholder="password">
                <input type="submit" value="Login" id="login-btn">
            </form>
        </div>
    </main>



    <script type="text/javascript" src="login.js"></script>
</body>

</html>