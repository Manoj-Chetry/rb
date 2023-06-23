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
    <meta name="keywords" content="Radio Brahmaputra, Brahmaputra Community Radio Station, Radio Station in Assam, Radio Station in Dibrugarh, Community Radio, Community Radio in Assam, Community Radio in India, Radio station, Online radio, Live streaming, Music radio, Internet radio, Radio broadcasting, Listen live, Radio shows, Popular songs, Music playlist, Local radio, Radio programs, Radio frequency, Entertainment radio, Podcasts, Radio station events, Radio Brahmaputra, Community radio Dibrugarh, Assamese music radio, Local radio station, Assam community radio, Dibrugarh radio shows, Assamese cultural programs, Folk music radio, Assamese radio broadcasting, Community radio initiatives, Radio programs in Dibrugarh, Assamese language radio, Traditional music shows, Local news updates, Radio for social awareness, Assam community development, Dibrugarh radio frequency, Folklore and storytelling, Assamese radio DJs, Community engagement events, Assamese radio programs, Sadri language radio shows, Hajong community radio, Deori dialect programs, Tiwa language radio station, Mishing cultural shows, Multilingual radio broadcasts, Assamese music and talk shows, Local language entertainment, Assamese folk music programs, Hajong traditional storytelling, Cultural diversity radio, Assamese news updates, Sadri language folk songs, Tiwa dialect radio station, Mishing community programs, Assamese language preservation, Diverse linguistic content, Language and cultural heritage, Assamese radio personalities, Health:, Health tips, Wellness programs, Health education, Disease prevention, Healthy living, Nutrition:, Balanced diet, Nutritional guidelines, Healthy eating habits, Nutrient-rich foods, Dietary recommendations, Women's health:, Women's reproductive health, Women's wellness, Women's healthcare, Maternal health, Women's health issues, Child health:, Pediatric care, Child development, Child nutrition, Immunization, Early childhood health, Maternal health:, Prenatal care, Postnatal care, Maternal nutrition, Maternal well-being, Maternity services, Parenting:, Parenting advice, Parenting tips, Childcare guidance, Parenting resources, Parenting support, Child nutrition:, Healthy eating for kids, Child-friendly recipes, Nutritional needs of children, Balanced meals for children, Feeding tips for kids, Women and child wellness:, Women's well-being, Child wellness programs, Women and child healthcare, Wellness activities for women and children, Holistic wellness for women and children, Health awareness:, Health campaigns, Health awareness programs, Health education initiatives, Public health promotion, Community health awareness, Preventive healthcare:, Preventive medicine, Preventive health tips, Preventive care strategies, Health screenings, Preventive healthcare information">
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
                    <?php $wdata = mysqli_fetch_assoc($wfetch);
                    if ($wdata['publish'] == true) { ?>
                        <div class="box">
                            <img src="assets/story/<?php echo "$wdata[image]"; ?>" alt="Image 1">
                            <div class="bottom">
                                <a href="read-story.php?id=<?php echo "$wdata[id]"; ?>">Read More</a>
                                <span>
                                    <?php echo "$wdata[title]"; ?>
                                </span>
                            </div>

                        </div>
                <?php }
                    $c--;
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
                <h1 class="title">We Featured In</h1>
            </div>
            <div class="autoplay">
                <a href="https://mailchi.mp/3b05f6233eb2/behaviour-change-matters-5045477"><img src="assets/partners/1 UNICEF_logo_2016.png" alt=""></a>
                <a href="https://www.thehindu.com/society/community-radio-as-a-phenomenon-winning-hertz/article22835066.ece"><img src="assets/partners/2 The Hindu.png" alt=""></a>
                <a href="https://timesofindia.indiatimes.com/city/guwahati/radio-brahmaputra-creates-waves/articleshow/48350286.cms"><img src="assets/partners/3 TOI.png" alt=""></a>
                <a href="https://blogs.dw.com/womentalkonline/index.html%3Fp=8877.html"><img src="assets/partners/4 DW.png" alt=""></a>
                <a href="https://www.telegraphindia.com/north-east/voice-of-the-assam-people-combats-coronavirus-fear/cid/1763265"><img src="assets/partners/5 The_Telegraph_India.png" alt=""></a>
                <a href="https://www.deccanherald.com/national/east-and-northeast/covid-19-awareness-radio-and-whatsapp-breaking-language-barriers-in-assam-tea-gardens-riverine-villages-818721.html"><img src="assets/partners/6 Deccan Herald.jpg" alt=""></a>
                <a href="https://lifestyle.livemint.com/news/talking-point/the-sound-waves-of-change-111641399878744.html"><img src="assets/partners/7 Mint lounge-logo.png" alt=""></a>
                <a href="https://www.firstpost.com/health/community-radio-stations-across-india-brave-lockdown-severe-fund-crunch-to-ensure-last-mile-awareness-on-covid-19-8288841.html"><img src="assets/partners/8 First Post.png" alt=""></a>
                <a href="https://www.ideasforindia.in/topics/poverty-inequality/assams-brahmaputra-community-radio-station-innovation-in-health-communication.html"><img src="assets/partners/9 Idea for India.png" alt=""></a>
                <a href="https://www.theweekendleader.com/Culture/1903/voice-of-dibrugarh.html"><img src="assets/partners/10 The Weekend Leader.jpg" alt=""></a>
                <a href="http://kxsd.org/index.php?option=com_resources&task=details&id=1264&Itemid=106"><img src="assets/partners/11 Teri.png" alt=""></a>
                <a href="https://www.thecitizen.in/index.php/en/NewsDetail/index/9/19134/Talk-the-Covid-19-Talk-With-Community-Radio--"><img src="assets/partners/12 The Citizen.png" alt=""></a>
                <a href="https://www.youthkiawaaz.com/2019/06/community-media-brahmaputra-community-radio-station/"><img src="assets/partners/13 Youth ki Awaz.png" alt=""></a>
                <a href="https://www.apc.org/sites/default/files/final_community_radio_report.pdf"><img src="assets/partners/14 APC.png" alt=""></a>
                <a href="https://link.springer.com/referenceworkentry/10.1007/978-981-10-7035-8_9-1"><img src="assets/partners/15 The Spinger.png" alt=""></a>
                <a href="https://www.iosrjournals.org/iosr-jhss/papers/Vol.27-Issue11/Ser-6/A2711060104.pdf"><img src="assets/partners/16 IOSR.png" alt=""></a>
                <a href="https://www.researchgate.net/publication/354523215_A_Grassroots_radio_initiative_knits_together_the_Hajongs"><img src="assets/partners/17 researchgate-logo.png" alt=""></a>
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