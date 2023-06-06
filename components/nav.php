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
            <a class="nav-links" href="story.php">Our Works/Stories</a>
            <a class="nav-links" href="../rb/audio.php">Podcasts</a>
            <a class="nav-links" href="../rb/video.php">Videos</a>
            <a class="nav-links" href="../rb/contact.php">Contact-Us</a>
        </div>
        <div class="nav-menu-hidden" id="nav-menu-hidden">
            <a class="nav-links" href="../rb/index.php">Home</a>
            <a class="nav-links" href="../rb/about.php">About-Us</a>
            <a class="nav-links" href="blogs.php">Blogs</a>
            <a class="nav-links" href="story.php">Our Works/Stories</a>
            <a class="nav-links" href="../rb/audio.php">Podcasts</a>
            <a class="nav-links" href="../rb/video.php">Videos</a>
            <a class="nav-links" href="../rb/contact.php">Contact-Us</a>
        </div>

        <div class="hamburger" onclick="f()">
            <div class="ham-bars" id="bar1"></div>
            <div class="ham-bars" id="bar2"></div>
            <div class="ham-bars" id="bar3"></div>
        </div>
    </nav>



    <script>
        let b = 0;
        function f() {

            let b1 = document.querySelector("#bar1");
            let b2 = document.querySelector("#bar2");
            let b3 = document.querySelector("#bar3");

            let nav = document.querySelector(".nav-menu-hidden");

            if (b > 0) {
                b1.classList.remove("bar1after");
                b2.classList.remove("bar2after");
                b3.classList.remove("bar3after");

                nav.style.left = "-100%";

                b = 0;
                console.log(b);
            } else {
                b1.classList.add("bar1after");
                b2.classList.add("bar2after");
                b3.classList.add("bar3after");

                nav.style.left = "0%";

                b = 1;
                console.log(b);
            }
        }
    </script>
</body>
</html>