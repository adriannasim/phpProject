<?php
    session_start();
    include ("config/config.php");
    $UserID = "adrianna";
    //$UserID = $_SESSION['UserID'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product</title>
        <link href="css/m1.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
        <div class="logo">
            <img src="img/header/logo.png" alt="" width="100%"/>
        </div>
        <h1>Product</h1>
        <div class="slide-container">
            <span id="slider-img1"></span>
            <span id="slider-img2"></span>
            <div class="img-container">
                <img src="img/merch/m1-front.jpg" class="slider-img"/>
                <img src="img/merch/m1-back.jpg" class="slider-img"/>
            </div>
        </div>
        <div class="btn-container">
            <a href="#slider-img1" class="slider-btn">◀</a>
            <a href="#slider-img2" class="slider-btn">▶</a>
        </div>
        <div class="product">
            <section class="prod-title">
                <h2>GAMING CONTROLLER T-SHIRT</h2>
            </section>
            <div class="prod-specs">
                <div class="prod-price">
                    <h3>RM 50</h3>
                </div>
                <div class="prod-details">
                    <p>Specifications<br>Material: Cotton<br>Color: Black<br>Style: Casual<br>Fit Type: Oversized </p>
                </div>
            </div>
            <div class="prod-select">
                <div class="select-size">
                    <h4>Please select your size</h4>
                </div>
                <form action="" method="post">
                    <div class="size-btn">
                        <button class="size">S</button>
                        <button class="size">M</button>
                        <button class="size">L</button>
                        <button class="size">XL</button><br/><br/>
                    </div>
                    <span class="prod-qty">
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty" value="1" min="1" max="30">
                    </span>
                    <div class="prod-btn">
                        <a href="merch.php"><button type="button" class="prodbtn"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Back</button></a>
                        <button type="submit" onclick="addedFunc()" class="prodbtn" id="prodbtn2">Add To Cart&nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i></button>  
                    </div>
                </form>
            </div>
        </div>
        <script src="javascripts/payment.js"></script>
        <script src="javascripts/merch.js"></script>
    </body>
</html>
