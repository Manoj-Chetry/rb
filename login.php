<?php

include 'php/connection.php';

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
                <img src="assets/icons/user.png" alt="">
                <h2 id="header">Sign In</h2>
                <label for="name">User Name</label>
                <input type="text" name="name" id="name" required placeholder="John">
                <label for="pswd">Password</label>
                <input type="password" name="pswd" id="pswd" required placeholder="password">

                <div class="message">
                    <?php
                    if (isset($_POST['submit'])) {
                        $name = mysqli_escape_string($con, $_POST['name']);
                        $pswd = mysqli_escape_string($con, $_POST['pswd']);


                        $query = "select * from users where fname = '$name'";
                        $namequery = mysqli_query($con, $query);

                        $user_count = mysqli_num_rows($namequery);
                        $pass = mysqli_fetch_array($namequery);
                        if ($user_count != 0) {

                            $pswd_check = password_verify($pswd, $pass['pswd']);
                            if ($pswd_check) {
                                session_start();
                                $_SESSION['log'] = true;
                                $_SESSION['user'] = $pass['fname'];
                    ?>
                                <script>
                                    location.replace("admin/admin.php");
                                </script>
                    <?php
                            } else {
                                echo "<br>Incorrect Password";
                            }
                        } elseif ($user_count == 0) {

                            echo "User does not exist";
                        }
                    } ?>
                </div>

                <input type="submit" value="Login" id="login-btn" name="submit">
            </form>
        </div>
    </main>



    <script type="text/javascript" src="login.js"></script>
</body>

</html>