<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Footer</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');

    /* Footer Section */

    .footer-container {
        max-width: 1170px;
        margin: auto;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    .footer {
        background-color: #24262b;
        padding: 15px 0;
    }

    .footer-col {
        width: 23%;
        padding: 0 10px;
    }

    .footer-col h4 {
        font-size: 18px;
        color: #ffffff;
        text-transform: capitalize;
        margin-bottom: 35px;
        font-weight: 500;
        position: relative;
    }

    .footer-col h4::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        background-color: #e91e63;
        height: 2px;
        box-sizing: border-box;
        width: 50px;
    }

    .footer-col ul li:not(:last-child) {
        margin-bottom: 10px;
    }

    .footer-col ul li a {
        font-size: 16px;
        text-transform: capitalize;
        color: #ffffff;
        text-decoration: none;
        font-weight: 300;
        color: #bbbbbb;
        display: block;
        transition: all 0.3s ease;
    }

    .footer-col ul li a:hover {
        color: #ffffff;
        padding-left: 8px;
    }

    .footer-col .social-links a {
        display: inline-block;
        height: 40px;
        width: 40px;
        background-color: rgba(255, 255, 255, 0.2);
        margin: 0 10px 10px 0;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        color: #ffffff;
        transition: all 0.5s ease;
    }

    .footer-col .social-links a:hover {
        color: #24262b;
        background-color: #ffffff;
    }

    .footer-col p {
        text-align: justify;
        font-size: 14px;
        font-weight: bold;
        color: #bbbbbb;
        margin-top: 10px;
    }

    .footer-col h5 {
        color: #bbbbbb;
        font-size: 12px;
        padding: 0 15px 0 0;
    }

    /*responsive 767*/
    @media(max-width: 912px) {
        .footer-col {
            width: 50%;
            margin-bottom: 30px;
        }
    }

    @media(max-width: 574px) {
        .footer-col {
            width: 100%;
        }
    }

    /* Form Style  */

    .headdiv h2,
    p {
        text-align: center;
        margin: 10px auto;
    }

    .headdiv img {
        display: block;
        margin: auto;
    }

    .formcontainer {
        max-width: 80%;
        padding: 28px;
        margin: 0 auto;
    }

    .content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 20px 0;
    }

    .input-box {
        display: flex;
        flex-wrap: wrap;
        width: 45%;
        padding-bottom: 15px;
    }

    .address-box {
        display: flex;
        flex-wrap: wrap;
        width: 45%;
        padding-bottom: 15px;
        margin-top: 28px;
    }

    .address-box input {
        height: 40px;
        width: 95%;
        padding: 0 10px;
        border-radius: 23px;
        border: 1px solid #ccc;
        outline: none;
    }

    .address-box:nth-child(2n) {
        justify-content: end;
    }

    .address-box input:is(:focus, :valid) {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
    }

    .input-box:nth-child(2n) {
        justify-content: end;
    }

    .input-box label,
    .gendertitle {
        width: 95%;
        color: black;
        font-weight: bold;
        margin: 5px 0;
    }

    .gendertitle {
        font-size: 16px;
        display: inline;
    }

    .input-box input,
    select {
        height: 40px;
        width: 100%;
        padding: 0 10px;
        border-radius: 23px;
        border: 1px solid #ccc;
        outline: none;
    }

    .input-box #district {
        margin-bottom: 70px;
    }

    textarea {
        height: 100px;
        width: 100%;
        padding: 0 10px;
        border-radius: 23px;
        border: 1px solid #ccc;
        outline: none;
    }

    .input-box input [type=tel] {
        height: 20px;
    }

    .input-box input:is(:focus, :valid) {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
    }

    .gender-category {
        color: black;
        width: 42%;
        color: black;
        font-weight: bold;
        margin: 5px 0;
    }

    .gender-category label {
        padding: 0 20px 0 5px;
        font-size: 14px;
    }

    .gender-category label,
    .gender-category input {
        cursor: pointer;
    }

    .btn-container {
        margin: 15px 0;
    }

    .btn-container button {
        width: 100%;
        margin-top: 10px;
        padding: 10px;
        display: block;
        font-size: 20px;
        color: #fff;
        border: none;
        border-radius: 23px;
        background-color: blue;
    }

    .btn-container button:hover {
        background-color: blueviolet;
    }

    @media(max-width:600px) {
        .content {
            max-height: 380px;
            overflow: auto;
        }

        .input-box {
            margin-bottom: 12px;
            width: 100%;
        }

        .input-box:nth-child(2n) {
            justify-content: space-between;
        }

        .gender-category {
            display: flex;
            justify-content: space-between;
            width: 60%;
        }
    }

    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 5;
        padding-top: 30px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 5;
        /* Sit on top */
        padding-top: 30px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100vh;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 45%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    /* The Close Button */
    .close {
        color: rgb(245, 12, 12);
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        height: 30px;
        padding: 2px 16px;
        color: rgb(197, 9, 9);
    }

    .modal-body {
        padding: 2px 16px;
    }

    .box1 {
        display: block;
        padding: 15px;
    }

    .box1 img {
        width: 750px;
        height: 300px;
        display: block;
        margin: auto;
    }

    .box1 p {
        width: 100%;
        margin: 30px 0;
        text-align: justify;
    }

    .box1 h3 {
        font-size: 23px;
        color: red;
        text-align: center;
        margin: 25px auto;
    }

    @media screen and (max-width:920px) {
        .modal-content {
            width: 100%;
        }

        .box1 img {
            width: 100%;
        }
    }
</style>

<body>
    <!-- Site footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="row">

                <div class="footer-col">
                    <h4>Out Networks</h4>
                    <ul>
                        <li><a href="about.php">About us</a></li>
                        <li><a href="support.php">Support Us</a></li>
                        <li><a href="audio.php">Podcasts</a></li>
                        <li><a href="video.php">Videos</a></li>
                        <li><a href="blogs.php">Blogs</a></li>
                        <li><a href="story.php">Our Works/Stories</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Join Us</h4>
                    <ul>
                        <li><a href="#" id="vbutton" class="vbutton">Volunteer</a></li>
                        <li><a href="#" id="ibutton" class="ibutton">Internship</a></li>
                        <li><a href="#" id="rbutton" class="rbutton">Resource Person</a></li>
                        <li><a href="#">Advertise with us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/Radiobrahmaputra90.4FM"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/RadioBrahmaput1"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/radiobrahmaputra90.4fm/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@RadioBrahmaputraCRS"><i class="fab fa-youtube"></i></a>
                        <a href="https://wa.me/+919954489439"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Modal -->

    <div id="myModal5" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="formcontainer">
                    <div class="headdiv">
                        <img src="images/DU_logo.jpeg" alt="logo" class="center">
                        <h2>Volunteer form</h2>
                        <p>Enter Your Details</p>
                    </div>

                    <form action="admin/Check/volunteer.php" method="post" enctype="multipart/form-data">
                        <div class="content">
                            <div class="input-box">
                                <label for="fname">First name</label>
                                <input type="text" name="fname" placeholder="Enter your first name..." required>
                            </div>
                            <div class="input-box">
                                <label for="lname">Last name</label>
                                <input type="text" name="lname" placeholder="Enter your last name..." required>
                            </div>
                            <div class="input-box">
                                <label for="email">Email</label>
                                <input type="text" name="email" placeholder="Enter your email address..." required>
                            </div>
                            <div class="input-box">
                                <label for="ph_no">Phone Number</label>
                                <input type="tel" name="ph_no" placeholder="Enter your phone no" minlength="10" maxlength="10" required> <br>
                            </div>
                            <div class="input-box">
                                <Label for="">Date of birth</Label>
                                <input type="date" required name="Dob" id="">
                            </div>

                            <div class="input-box">
                                <label for="state">&nbsp State</label>
                                <input type="text" name="state" placeholder="Enter your STATE name..." required>
                            </div>

                            <div class="input-box">
                                <label for="district">District</label>
                                <input type="text" name="district" placeholder="Enter your District name..." required>
                            </div>

                            <div class="input-box">
                                <label for="">Address</label>
                                <textarea name="address" id="address" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="input-box">
                                <label for="">Why are you interested?</label>
                                <textarea name="interest" id="interest" cols="30" rows="10" required></textarea>
                            </div>

                            <div class="input-box">
                                <label for="myfile">Attach File (Pdf only)</label>
                                <input type="file" id="file" name="file">
                            </div>

                            <label class="gendertitle">Gender</label>
                            <div class="gender-category">
                                <input type="radio" name="gender" value="male" id="male" required>
                                <label for="gender">Male</label>
                                <input type="radio" name="gender" value="female" id="female">
                                <label for="gender">Female</label>
                                <input type="radio" name="gender" value="others" id="others">
                                <label for="gender">Others</label>
                            </div>


                        </div>
                        <div class="btn-container">
                            <button type="submit" name="insertdata">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal6" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="formcontainer">
                    <div class="headdiv">
                        <img src="images/DU_logo.jpeg" alt="logo" class="center">
                        <h2>Internship form</h2>
                        <p>Enter Your Details</p>
                    </div>

                    <form action="admin/Check/internship.php" method="post" enctype="multipart/form-data">
                        <div class="content">
                            <div class="input-box">
                                <label for="fname">First name</label>
                                <input type="text" name="fname" placeholder="Enter your first name..." required>
                            </div>
                            <div class="input-box">
                                <label for="lname">Last name</label>
                                <input type="text" name="lname" placeholder="Enter your last name..." required>
                            </div>
                            <div class="input-box">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Enter your email address..." required>
                            </div>
                            <div class="input-box">
                                <label for="ph_no">Phone Number</label>
                                <input type="tel" name="ph_no" placeholder="Enter your phone no" minlength="10" maxlength="10" required> <br>
                            </div>

                            <div class="input-box">
                                <Label for="">Date of birth</Label>
                                <input type="date" required name="Dob" id="">
                            </div>

                            <div class="input-box">
                                <label for="state">&nbsp State</label>
                                <input type="text" name="state" placeholder="Enter your STATE name..." required>
                            </div>

                            <div class="input-box">
                                <label for="district">District</label>
                                <input type="text" name="district" placeholder="Enter your District name..." required>
                            </div>

                            <div class="input-box">
                                <label for="">Address</label>
                                <textarea name="address" id="address" cols="30" rows="10" required></textarea>
                            </div>

                            <div class="input-box">
                                <label for="myfile">Education Qualification (Pdf only)</label>
                                <input type="file" id="file" name="file" required>
                            </div>

                            <label class="gendertitle">Gender</label>
                            <div class="gender-category">
                                <input type="radio" name="gender" value="male" id="male" required>
                                <label for="gender">Male</label>
                                <input type="radio" name="gender" value="female" id="female">
                                <label for="gender">Female</label>
                                <input type="radio" name="gender" value="others" id="others">
                                <label for="gender">Others</label>
                            </div>

                        </div>
                        <div class="btn-container">
                            <button type="submit" name="insertintern">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal7" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="formcontainer">
                    <div class="headdiv">
                        <img src="images/DU_logo.jpeg" alt="logo" class="center">
                        <h2>Resource Person</h2>
                        <p>Enter Your Details</p>
                    </div>

                    <form action="admin/Check/resource_person.php" method="post" enctype="multipart/form-data">
                        <div class="content">
                            <div class="input-box">
                                <label for="fname">First name</label>
                                <input type="text" name="fname" placeholder="Enter your first name..." required>
                            </div>
                            <div class="input-box">
                                <label for="lname">Last name</label>
                                <input type="text" name="lname" placeholder="Enter your last name..." required>
                            </div>
                            <div class="input-box">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Enter your email address..." required>
                            </div>
                            <div class="input-box">
                                <label for="ph_no">Phone Number</label>
                                <input type="tel" name="ph_no" placeholder="Enter your phone no" minlength="10" maxlength="10" required> <br>
                            </div>

                            <div class="input-box">
                                <label for="">Address</label>
                                <textarea name="address" id="address" cols="30" rows="10" required></textarea>
                            </div>

                            <div class="input-box">
                                <Label for="">Date of birth</Label>
                                <input type="date" required name="Dob" id="">
                            </div>

                            <div class="input-box">
                                <label for="">Domain Area</label>
                                <textarea name="domainarea" id="" cols="30" rows="10" required></textarea>
                            </div>

                            <div class="input-box">
                                <label for="myfile">Attach File (pdf only)</label>
                                <input type="file" id="file" name="file">
                            </div>

                            <label class="gendertitle">Gender</label>
                            <div class="gender-category">
                                <input type="radio" name="gender" value="male" id="male" required>
                                <label for="gender">Male</label>
                                <input type="radio" name="gender" value="female" id="female">
                                <label for="gender">Female</label>
                                <input type="radio" name="gender" value="others" id="others">
                                <label for="gender">Others</label>
                            </div>


                        </div>
                        <div class="btn-container">
                            <button type="submit" name="insertresource">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get the modal elements
        const modal5 = document.getElementById("myModal5");
        const modal6 = document.getElementById("myModal6");
        const modal7 = document.getElementById("myModal7");

        // Get the button elements
        const modal5Btn = document.getElementById("vbutton");
        const modal6Btn = document.getElementById("ibutton");
        const modal7Btn = document.getElementById("rbutton");

        // Get the close button elements
        const closeBtns = document.querySelectorAll(".close");

        // Add event listeners to the buttons

        modal5Btn.addEventListener("click", () => {
            modal5.style.display = "block";
        });
        modal6Btn.addEventListener("click", () => {
            modal6.style.display = "block";
        });
        modal7Btn.addEventListener("click", () => {
            modal7.style.display = "block";
        });

        // Add event listeners to the close buttons
        closeBtns.forEach((closeBtn) => {
            closeBtn.addEventListener("click", () => {
                modal5.style.display = "none";
                modal6.style.display = "none";
                modal7.style.display = "none";
            });
        });

        // Close the modal when the user clicks outside of it
        window.addEventListener("click", (event) => {
            if (event.target === modal5 || event.target === modal6) {
                modal5.style.display = "none";
                modal6.style.display = "none";
            } else if (event.target === modal7) {
                modal7.style.display = "none";
            }
        });
    </script>

</body>

</html>