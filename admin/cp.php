<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="cp.css">
</head>

<body>
    <div class="cp" onclick="cp()">
        <div class="bar b1"></div>
        <div class="bar b2"></div>
        <div class="bar b3"></div>
    </div>

    <div class="menu">
        <a href="../../admin.php" class="link">
            Admin-Panel
        </a>
        <a href="../../update-logo.php" class="link">
            Logo
        </a>
        <a href="/rb/admin/cms/home/edit-home.php" class="link">
            Home
        </a>
        <a href="/rb/admin/cms/testimonials/manage.php" class="link">
            Testimonial
        </a>
        <a href="/rb/admin/cms/audio/edit-audio.php" class="link">
            Podcast
        </a>
        <a href="/rb/admin/cms/video/edit-video.php" class="link">
            Video
        </a>
        <a href="/rb/admin/cms/blog/edit-blog.php" class="link">
            Blogs
        </a>
        <a href="/rb/admin/cms/story/edit-story.php" class="link">
            Stories
        </a>
    </div>



    <script>
        let menu = document.querySelector(".menu");
        let p = 0;
        function cp() {
            if (p == 0) {
                menu.classList.add("view");
                p = 1;
            } else if (p != 0) {
                menu.classList.remove("view")
                p = 0;
            }
        }
    </script>
</body>

</html>