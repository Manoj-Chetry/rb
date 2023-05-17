<?php
session_start();
include "../../../php/connection.php";

if(!isset($_SESSION['log']) || $_SESSION['log'] != true){
    header("location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="../../../css/admin css/edithome.css">
    <title>Edit About</title>
</head>

<body>
    <div class="container">
        <h1>Edit About Page</h1>
        <hr>
        <form method="post">
            <div class="section1 cont">
                <h3>Section 1</h3>
                <label for="img1">Image1</label>
                <input type="file" name="img1" id="img1" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img1" id="old_img1" value="">
                <textarea name="about1" id="about1" cols="30" rows="10" required></textarea>           
            </div>
            <div class="section2 cont">
                <h3>Section 2</h3>
                <label for="img2">Image2</label>
                <input type="file" name="img2" id="img2" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img2" id="old_img2" value="">
                <textarea name="about2" id="about2" cols="30" rows="10" required></textarea>           
            </div>
            <div class="section3 cont">
                <h3>Section 3</h3>
                <label for="img3">Image3</label>
                <input type="file" name="img3" id="img3" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img3" id="old_img3" value="">
                <textarea name="about3" id="about3" cols="30" rows="10" required></textarea>           
            </div>
            <div class="section4 cont">
                <h3>Section 4</h3>
                <label for="img4">Image4</label>
                <input type="file" name="img4" id="img4" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img4" id="old_img4" value="">
                <textarea name="about4" id="about4" cols="30" rows="10" required></textarea>           
            </div>

            <input type="submit" value="POST CHANGES" id="btn">
        </form>
    </div>






    <script>
        ClassicEditor
            .create( document.querySelector( '#about1' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#about2' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#about3' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#about4' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>