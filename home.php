<?php
session_start();
include("config/config.php");
$UserID = $_SESSION['UserID'];

if ($UserID == '') {
    header("location: index.php");
}
?>

<HTML>

<head>
    <title>HomePage</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include "headerUser.php";
    ?>
    <div class="home-banner">
        <img src="img/event/b1.png" width="100%">
    </div>
    <div class="event-div">
        <div class="home-events">
            <h2>Upcoming Events</h2>
            <div class="event-box">
                <h3>MLBB</h3>
                <a href="eventUser.php?"><img src="/img/home/mlbb-home.jpg" width="100%"></a>
                <button class="home-events-btn">Buy Tickets</button>
            </div>
            <div class="event-box">
                <h3>Valorant</h3>
                <a href="eventUser.php?"><img src="/img/home/val-home.jpg" width="100%"></a>
                <button class="home-events-btn">Buy Tickets</button>
            </div>
            <div class="event-box">
                <h3>Warzone</h3>
                <a href="eventUser.php?"><img src="/img/home/war-home.jpg" width="100%"></a>
                <button class="home-events-btn">Buy Tickets</button>
            </div>
        </div>
    </div>
    <div class="home-merch">
        <h2>Recommended Products</h2>
        <div class="merch-box">
            <h3>Merch Name</h3>
            <img src="/img/merch/M0001.jpg">
            <a href="merchBuy.php?"><button class="home-merch-btn">Get Yours Now</button></a>
        </div>
        <div class="merch-box">
            <h3>Merch Name</h3>
            <img src="/img/merch/M0002.jpg">
            <a href="merchBuy.php?"><button class="home-merch-btn">Get Yours Now</button></a>
        </div>
        <div class="merch-box">
            <h3>Merch Name</h3>
            <img src="/img/merch/M0003.jpg">
            <a href="merchBuy.php?"><button class="home-merch-btn">Get Yours Now</button></a>
        </div>
        <div class="ranking">
            <img src="/img/home/second.jpg" id="second">
            <img src="/img/home/first.jpg" id="first">
            <img src="/img/home/third.jpg" id="third">
        </div>
    </div>


    <?php include "footerUser.php" ?>

    <body>

</HTML>