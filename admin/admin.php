<?php
session_start();
include "../php/connection.php";

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../login.php");
}

$query = "select * from logo where id = '1'";
$fquery = mysqli_query($con, $query);

$fdata = mysqli_fetch_array($fquery);

$img = $fdata['img']; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin css/admin.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    </style>
    <title>Admin-Portal</title>
</head>

<body>
    <div class="container">
        <aside>
            <div class="aside-head">
                <img id="logo" src="../assets/logo/<?php echo$img ?>" alt="logo">
                <h2>Radio Brahmaputra</h2>
            </div>
            <hr style="width: 100%; margin-bottom: 20px;">
            <div class="links">
                <ul>
                    <button id="admin-btn" onclick="drop1()">
                        <li id="admin-drop"><span>Admin</span> <span>&or;</span></li>
                    </button>
                    <button id="cms-btn" onclick="drop2()">
                        <li id="cms-drop"><span>CMS</span> <span>&or;</span></li>
                    </button>

                    <a href="../php/logout.php" id="logout-btn">Logout</a>
                </ul>
            </div>
        </aside>
        <main>
            <div class="main-head">
                <h1>Welcome, <?php echo $_SESSION['user']; ?> <img src="../assets/logo/admin-logo/confetti.png" alt=""></h1>
                <p>This is your dashboard</p>
            </div>
            <section class="main">
                <div class="view">
                    <div class="admin card">
                        <img src="../assets/logo/admin-logo/admin.png" alt="">
                        <h4>ADMIN</h4>
                        <h3>10</h3>
                        <p>Users having access to Admin Panel</p>
                    </div>
                    <div class="card">
                        <img src="" alt="">
                        <h4></h4>
                    </div>
                    <div class="card">
                        <img src="" alt="">
                        <h4></h4>
                    </div>
                </div>
                <div class="donations">
                    <div class="card">
                        <img src="../assets/logo/admin-logo/donation.png" alt="">
                        <h4>DONATIONS</h4>
                        <h3>$ 12,000</h3>
                        <p>Total donations collected</p>
                    </div>
                </div>
            </section>

            <section class="dashboard">
                <div class="admin-cont" id="admin-cont">
                    <a href="cms/add-blog.php">
                        <div class="col">Add Blogs</div>
                    </a>
                    <a href="cms/blogs.php">
                        <div class="col">Manage Blogs</div>
                    </a>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                <div class="cms-cont" id="cms-cont">
                    <a href="cms/update-logo.php?id=1"><div class="col">Change Logo</div></a>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </section>
        </main>
    </div>








    <script>
        function drop1() {
            const adminBtn = document.getElementById('admin-btn');
            const cmsBtn = document.getElementById('cms-btn');
            const admin = document.getElementById('admin-cont');
            const cms = document.getElementById('cms-cont');

            admin.style.display = "flex";
            cms.style.display = "none";
            adminBtn.style.background = "black";
            cmsBtn.style.background = "none";
        }
        function drop2() {
            const adminBtn = document.getElementById('admin-btn');
            const cmsBtn = document.getElementById('cms-btn');
            const cms = document.getElementById('cms-cont');
            const admin = document.getElementById('admin-cont');

            cms.style.display = "flex";
            admin.style.display = "none";
            adminBtn.style.background = "none";
            cmsBtn.style.background = "black";
        }
    </script>
</body>

</html>