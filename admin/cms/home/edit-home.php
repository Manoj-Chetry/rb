<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/admin css/edithome.css">
    <title>Add-User</title>
</head>

<body>
    <div class="container">
        <h1>Edit Home Page</h1>
        <hr>
        <form method="post">
            <div class="carousel cont">
                <h3>Carousel Images</h3>
                <label for="img1">Image1</label>
                <input type="file" name="img1" id="img1" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img1" id="old_img1" value="">

                <label for="img1">Image2</label>
                <input type="file" name="img1" id="img1" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img1" id="old_img1" value="">

                <label for="img1">Image3</label>
                <input type="file" name="img1" id="img1" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img1" id="old_img1" value="">
                
                <label for="img1">Image4</label>
                <input type="file" name="img1" id="img1" accept=".jpg, .png, .jpeg">
                <input type="hidden" name="old_img1" id="old_img1" value="">
            </div>

            <div class="about cont">
                <h3>About Us Section</h3>
                <textarea name="about" id="about" cols="30" rows="10" required></textarea>
            </div>


            <input type="submit" value="POST CHANGES" id="btn">
        </form>
    </div>
</body>