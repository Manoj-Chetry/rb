<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin css/adduser.css">
    <title>Add-User</title>
</head>

<body>
    <div class="container">
        <h1>Add New User</h1>
        <form action="adduser.php" method="post">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" placeholder="John" required>


            <input type="submit" value="Add-User" id="btn">
        </form>
    </div>
</body>