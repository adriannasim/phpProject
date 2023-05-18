<?php
session_start();
include("config/config.php");
$UserID = $_SESSION['UserID'];

if ($UserID == '') {
    header("location: index.php");
}
?>

<html>
  <head>
    <title>Feedback Form</title>
    <link rel="stylesheet" href="css/feedback.css">
</head>

<body>
    <?php
        include "headerUser.php";  
    ?>
    <br><br>
    <div class="feedback">
    
    <h4 style="text-align:center;">Please rate your service experience for the following parameters</h4>
    <br>
    <form method="post" action="feedback2.php">
    <label>1. Your overall experience with us?</label><br>
    <div class="star-rating">
        <input type="radio" id="star5" name="starrating" value="5" required>
        <label for="star5"></label>
        <input type="radio" id="star4" name="starrating" value="4">
        <label for="star4"></label>
        <input type="radio" id="star3" name="starrating" value="3">
        <label for="star3"></label>
        <input type="radio" id="star2" name="starrating" value="2">
        <label for="star2"></label>
        <input type="radio" id="star1" name="starrating" value="1">
        <label for="star1"></label>
    </div>
    <br>
    <hr class="divider-hr">
    <br>
    <label>2. On a scale of 1 to 10, how likely are you to recommend our club to others?</label><br><br/>
    <div style="color:grey">
        <span style="float:left">
        Unlikely
        </span>
        <span style="float:right">
        Very likely
        </span>
    </div>
    <span class="scale-rating">
        <label value="1">
            <input type="radio" name="rating"  value="1" id="rating-1" required>
            <label style="width:100%;"></label>
        </label>
        <label value="2">
            <input type="radio" name="rating" value="2"  id="rating-2">
            <label style="width:100%;"></label>
        </label>
        <label value="3">
            <input type="radio" name="rating" value="3"  id="rating-3">
            <label style="width:100%;"></label>
        </label>
        <label value="4">
            <input type="radio" name="rating" value="4"  id="rating-4">
            <label style="width:100%;"></label>
        </label>
        <label value="5">
            <input type="radio" name="rating" value="5"  id="rating-5">
            <label style="width:100%;"></label>
        </label>
        <label value="6">
            <input type="radio" name="rating" value="6" id="rating-6">
            <label style="width:100%;"></label>
        </label>
        <label value="7">
            <input type="radio" name="rating" value="7" id="rating-7">
            <label style="width:100%;"></label>
        </label>
        <label value="8">
            <input type="radio" name="rating" value="8" id="rating-8">
            <label style="width:100%;"></label>
        </label>
        <label value="9">
            <input type="radio" name="rating" value="9" id="rating-9">
            <label style="width:100%;"></label>
        </label>
        <label value="10">
            <input type="radio" name="rating" value="10" id="rating-10">
            <label style="width:100%;"></label>
        </label>
    </span>

    <hr class="divider-hr"> 
    <br>

    <label for="comment">3. Comments:</label><br/><br/>
    <textarea cols="75" name="comment" rows="5" style="100%" required></textarea><br>
    <br>
    <div class="clear"></div> 
    <br>
    <input type="submit" value="Submit your review"> 
    </form>
    </div>
    <br>
    <?php include "footerUser.php"?>
</body>  
</html>