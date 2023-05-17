<?php 
include "php/connection.php";


$query = "select * from logo where id = '1'";
$fquery = mysqli_query($con, $query);

$fdata = mysqli_fetch_array($fquery);

$img = $fdata['img']; 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/utility.css">

</head>

<body>
    <nav>
        <div class="logo">
            <a href="../rb/index.php">
                <img src="assets/logo/<?php echo$img ?>" alt="logo">
                <h1 class="brand-name">Radio Brahmaputra</h1>
            </a>
        </div>

        <div class="nav-menu" id="nav-menu">
            <a class="nav-links" href="../rb/index.php">Home</a>
            <a class="nav-links" href="../rb/about.php">About-Us</a>
            <a class="nav-links" href="blogs.php">Blogs</a>
            <a class="nav-links" href="../rb/audio.php">Podcasts</a>
            <a class="nav-links" href="../rb/video.php">Videos</a>
            <a class="nav-links" href="../rb/contact.php">Contact-Us</a>
        </div>

        <div class="hamburger">
            <div class="ham-bars"></div>
            <div class="ham-bars"></div>
            <div class="ham-bars"></div>
        </div>
    </nav>
</body>
</html>