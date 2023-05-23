<?php

error_reporting(0);
include "php/connection.php";

$query = "select * from blogs";
$iquery = mysqli_query($con,$query);

$count = 3;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Home</title>
</head>

<body>
    <?php require "components/nav.php"; ?>


    <?php require "components/sticky.php" ?>

    <div class="popup" id="popup">
        <div class="popup-txt">
            <h1>Audio</h1>
            <p>Playing now audio file!</p>
            <button onclick="closepop()">Close</button>
        </div>
        <img src="assets/podcasts/p1.avif" alt="">
    </div>

    <div class="container" id="container">
        <main>
            <?php 
                $sql = "select * from home where id = '1'";
                $isql = mysqli_query($con,$sql);
                $fetch = mysqli_fetch_array($isql);
            ?>
            <div class="carousel">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="assets/gallery/<?php echo"$fetch[image1]"; ?>" alt=""></div>
                        <div class="swiper-slide"><img src="assets/gallery/<?php echo"$fetch[image2]"; ?>" alt=""></div>
                        <div class="swiper-slide"><img src="assets/gallery/<?php echo"$fetch[image3]"; ?>" alt=""></div>
                        <div class="swiper-slide"><img src="assets/gallery/<?php echo"$fetch[image4]"; ?>" alt=""></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </main>
        <section class="podcasts">
            <div class="lead">
                <h1 class="title">Top Audio Podcasts</h1>
                <a href="audio.php" class="view-link">View All</a>
            </div>

            
            <div class="thumb-cont">
                <div class="audio-card">
                <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/7KA4W4McWYRpgf0fWsJZWB?utm_source=generator" width="100%" height="260px" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </div>
                <div class="audio-card">
                    <button onclick="openpop()" class="m-0"><img class="audio-thumbnail" src="assets/podcasts/p1.avif" alt=""></button>
                </div>
                <div class="audio-card">
                    <button onclick="openpop()" class="m-0"><img class="audio-thumbnail" src="assets/podcasts/p1.avif" alt=""></button>
                </div>
                <div class="audio-card">
                    <button onclick="openpop()" class="m-0"><img class="audio-thumbnail" src="assets/podcasts/p1.avif" alt=""></button>
                </div>
                <div class="audio-card">
                    <button onclick="openpop()" class="m-0"><img class="audio-thumbnail" src="assets/podcasts/p1.avif" alt=""></button>
                </div>
                <div class="audio-card">
                    <button onclick="openpop()" class="m-0"><img class="audio-thumbnail" src="assets/podcasts/p1.avif" alt=""></button>
                </div>
                
            </div>
        </section>

        <section class="podcasts">
            <div class="lead">
                <h1 class="title">Videos</h1>
                <a href="video.php" class="view-link">View All</a>
            </div>
            <div class="thumb-cont">
                <div class="audio-card">
                    <iframe class="audio-thumbnail" width="560" height="315"
                        src="https://www.youtube.com/embed/zU2l4HKT0nc" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="audio-card">
                    <iframe class="audio-thumbnail" width="560" height="315"
                        src="https://www.youtube.com/embed/xxkDLvS5MTY" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="audio-card">
                    <iframe class="audio-thumbnail" width="560" height="315"
                        src="https://www.youtube.com/embed/hVEZYEYctSc" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="audio-card">
                    <iframe class="audio-thumbnail" width="560" height="315"
                        src="https://www.youtube.com/embed/iA1ndcZls4Y" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="audio-card">
                    <iframe class="audio-thumbnail" width="560" height="315"
                        src="https://www.youtube.com/embed/M-dutzdupbs" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="audio-card">
                    <iframe class="audio-thumbnail" width="560" height="315"
                        src="https://www.youtube.com/embed/fqF9M92jzUo" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </section>

        
        <section class="about">
            <div class="lead">
                <h1 class="title">About-Us</h1>
                <a href="about.php" class="view-link">View All</a>
            </div>
            <p class="content">
                <?php echo"$fetch[about]"; ?> 
            </p>
            <a href="#" class="support-btn">Support-Us</a>
        </section>

        <section class="work">
            <div class="lead">
                <h1 class="title">Our Works/Stories</h1>
                <a href="#" class="view-link">View All</a>
            </div>
            <div class="blog-container">
                <div class="box">
                    <img src="assets/blogs/t.jpg" alt="Image 1">
                    <h2>Title</h2>
                    <span class="blog-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi repudiandae, id tempore vero
                        voluptatesveniam tempora esse repellat repellendus eaque perspiciatis laudantium error veritatis
                        provident    
                    </span>
                    <a class="more-link" href="#">(More)</a>
                </div>
                <div class="box">
                    <img src="assets/blogs/t.jpg" alt="Image 1">
                    <h2>Title</h2>
                    <span class="blog-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi repudiandae, id tempore vero
                        voluptatesveniam tempora esse repellat repellendus eaque perspiciatis laudantium error veritatis
                        provident    
                    </span>
                    <a class="more-link" href="#">(More)</a>
                </div>
                <div class="box">
                    <img src="assets/blogs/t.jpg" alt="Image 1">
                    <h2>Title</h2>
                    <span class="blog-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi repudiandae, id tempore vero
                        voluptatesveniam tempora esse repellat repellendus eaque perspiciatis laudantium error veritatis
                        provident    
                    </span>
                    <a class="more-link" href="#">(More)</a>
                </div>
                
            </div>
        </section>

        <section class="blogs">
            <div class="lead">
                <h1 class="title">Blogs</h1>
                <a href="blogs.php" class="view-link">View All</a>
            </div>
            <div class="blog-container">
            <?php
                while($count>0){?>
                <?php $fdata = mysqli_fetch_assoc($iquery); ?>
                <div class="box">
                    <img src="assets/blogs/t.jpg" alt="Image 1">
                    <h2><?php echo"$fdata[title]"; ?></h2>
                    <span class="blog-text">
                        <?php echo"$fdata[description]"; ?>    
                    </span>
                    <div class="btns">
                        <a class="edit" href="#">Read More</a>
                    </div>
                </div>
                <?php $count--; }
                ?>
                
            </div>
        </section>

        <section id="partners-section">
            <div class="lead">
                <h1 class="title">Our Partners</h1>
            </div>
            <div class="autoplay">
                <img src="assets/partners/logo1.png" alt="">
                <img src="assets/partners/logo2.png" alt="">
                <img src="assets/partners/logo3.png" alt="">
                <img src="assets/partners/logo4.png" alt="">
            </div>

        </section>

        <div class="joinus"></div>

    </div>




    <?php require "components/footer.php"; ?>







    <script>
        function openpop(){
            const container = document.getElementsById("container");
            let popup = document.getElementsById("popup");

            container.classList.add("container-blur");
            popup.classList.add("popup-open");
        }


    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script>
        const hamburger = docoment.querySelector(".hamburger");
        const navMenu = docoment.querySelector(".nav-menu");

        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        })

        document.querySelectorAll(".nav-links").forEach(n => n.addEventListener("click", () => {
            hamburger.classList.remove("active");
            navMenu.classList.remove("active");
        }))
    </script>





    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script type="text/javascript">
        $('.autoplay').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

    </script>

    


</body>

</html>