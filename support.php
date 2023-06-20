<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/utility.css">
  <link rel="stylesheet" href="css/support.css">
  <title>Support Us</title>
</head>

<body>
  <?php require "components/nav.php" ?>
  <?php require "components/sticky.php" ?>

  <main>
    <div id="head">
      <img src="assets/icons/donation.png" id="head_img" style="width: 50px; margin-right: 20px;">
      <h1>Support-Us</h1>
    </div>
    <div class="container">
      <form action="" method="post">

        <div class="row">

          <div class="col">

            <h3 class="title">billing details</h3>

            <div class="inputBox">
              <span>Full name :</span>
              <input type="text" placeholder="john deo">
            </div>
            <div class="inputBox">
              <span>Email :</span>
              <input type="email" placeholder="johndeo@example.com">
            </div>
            <div class="inputBox">
              <span>Address :</span>
              <input type="text" placeholder="Enter your address">
            </div>
            <div class="inputBox">
              <span>Phone No</span>
              <input type="tel" placeholder="Phone Number">
            </div>
            <div class="inputBox">
              <span>Amount</span>
              <input type="text" placeholder="Enter Donation Amount">
            </div>


          </div>
        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn">

      </form>

    </div>
  </main>
  <?php require "components/footer.php" ?>
</body>

</html>