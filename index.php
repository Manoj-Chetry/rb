<?php

error_reporting(0);

include "php/connection.php";

$query = "select * from blogs order by id desc";
$iquery = mysqli_query($con, $query);

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


    <div class="container" id="container">
        <main>
            <?php
            $sql = "select * from home where id = '1'";
            $isql = mysqli_query($con, $sql);
            $fetch = mysqli_fetch_array($isql);
            ?>
            <div class="carousel">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="assets/gallery/<?php echo "$fetch[image1]"; ?>" alt=""></div>
                        <div class="swiper-slide"><img src="assets/gallery/<?php echo "$fetch[image2]"; ?>" alt=""></div>
                        <div class="swiper-slide"><img src="assets/gallery/<?php echo "$fetch[image3]"; ?>" alt=""></div>
                        <div class="swiper-slide"><img src="assets/gallery/<?php echo "$fetch[image4]"; ?>" alt=""></div>
                        <div class="swiper-slide"><img src="assets/gallery/<?php echo "$fetch[image5]"; ?>" alt=""></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </main>
        <section class="podcasts pod1">
            <div class="lead">
                <h1 class="title">Top Audio Podcasts</h1>
                <a href="audio.php" class="view-link">View All</a>
            </div>


            <div class="acontainer thumb-cont">

                <?php
                $sql = "select distinct playlist from audio order by id desc";
                $faud = mysqli_query($con, $sql);
                $num = mysqli_num_rows($faud);
                $rank = 1;
                while ($num > 0) {
                    $data = mysqli_fetch_array($faud);
                    $q = "select * from audio where playlist = '$data[playlist]'";
                    $fq = mysqli_query($con, $q);
                    $dp = mysqli_fetch_assoc($fq); ?>
                    <a href="player.php?id=<?php echo "$dp[id]"; ?>">
                        <div class="acard">
                            <div class="top"></div>
                            <div class="bottom"></div>
                            <div class="center">
                                <img class="aimg" src="assets/images/<?php echo "$dp[cover]"; ?>" alt="">
                            </div>
                            <div class="play">
                                <img src="assets/images/play.png" alt="">
                            </div>
                        </div>
                    </a>
                <?php $num--;
                }


                ?>

            </div>
        </section>

        <section class="podcasts">
            <div class="lead">
                <h1 class="title">Videos</h1>
                <a href="video.php" class="view-link">View All</a>
            </div>
            <div class="thumb-cont">
                <?php
                $vsql = "select * from video order by id desc";
                $vfetch = mysqli_query($con, $vsql);
                $vdata = 6;
                while ($vdata > 0) {
                    $vget = mysqli_fetch_array($vfetch); ?>
                    <div class="audio-card">
                        <?php echo "$vget[link]" ?>
                    </div>
                <?php $vdata--;
                } ?>

            </div>
        </section>


        <section class="about">
            <div class="lead">
                <h1 class="title">About-Us</h1>
                <a href="about.php" class="view-link">View All</a>
            </div>
            <p class="content">
                <?php echo "$fetch[about]"; ?>
            </p>
            <a href="support.php" class="support-btn">Support-Us</a>
        </section>

        <section class="addvertisements"></section>

        <section class="work">
            <div class="lead">
                <h1 class="title">Our Works/Stories</h1>
                <a href="story.php" class="view-link">View All</a>
            </div>
            <div class="blog-container">

                <?php
                $wquery = "select * from story order by id desc";
                $wfetch = mysqli_query($con, $wquery);

                $c = 3;
                while ($c > 0) { ?>
                    <?php $wdata = mysqli_fetch_assoc($wfetch); ?>
                    <div class="box">
                        <img src="assets/story/<?php echo "$wdata[image]"; ?>" alt="Image 1">
                        <div class="bottom">
                            <a href="read-story.php?id=<?php echo "$wdata[id]"; ?>">Read More</a>
                            <span>
                                <?php echo "$wdata[title]"; ?>
                            </span>
                        </div>

                    </div>
                <?php $c--;
                } ?>
            </div>
        </section>

        <section class="blogs">
            <div class="lead">
                <h1 class="title">Blogs</h1>
                <a href="blogs.php" class="view-link">View All</a>
            </div>
            <div class="blog-container">
                <?php
                while ($count > 0) { ?>
                    <?php $fdata = mysqli_fetch_assoc($iquery);
                    if ($fdata['publish'] == true) { ?>
                        <div class="box">
                            <img src="assets/blogs/<?php echo "$fdata[image]"; ?>" alt="Image">
                            <div class="bottom">
                                <a href="read-blog.php?id=<?php echo "$fdata[id]"; ?>">
                                    Read Blog
                                </a>
                                <span>
                                    <?php echo "$fdata[title]"; ?>
                                </span>
                            </div>
                        </div>
                <?php }
                    $count--;
                }
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


        <section id="testimonials">
            <div class="lead">
                <h1 class="title">Testimonials</h1>
            </div>
            <div class="line">
                <img src="assets/icons/quote.png" alt="">
            </div>
            <div class="test-cont">

                <?php
                $tquery = "select * from testimonials order by id desc";
                $tes = mysqli_query($con, $tquery);

                $no = 3;
                while ($no > 0) {
                    $tdata = mysqli_fetch_assoc($tes);
                    if ($tdata['view'] == true) { ?>
                        <span class="tcard">
                            <img src="testimonials/<?php echo "$tdata[image]"; ?>" alt="">
                            <span><?php echo "$tdata[message]"; ?></span>

                            <span class="author"><?php echo "$tdata[name]"; ?></span>
                        </span>
                <?php } else {
                        $no--;
                        continue;
                    }
                    $no--;
                }
                ?>

            </div>
            <div class="line"></div>

        </section>



    </div>




    <?php require "components/footer.php"; ?>








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





    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

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