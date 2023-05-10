<?php
session_start();
include("config/config.php");
$UserID = "adrianna";
//$UserID = $_SESSION['UserID'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E-sports Events</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link href="css/event.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "headerUser.php"
        $sql = "SELECT * FROM event";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($record = $result->fetch_object()) {
                printf("
                <div class='content'>
                    <img src='img/merch/%s.jpg'  alt='%s' />
                    <h3>%s</h3>
                    <h5>RM %s</h5>
                    <a href='merchBuy.php?id=%s'><button class='buy1'>Buy Now</button></a>
                </div>",
                $record->MerchID, $record->MerchDesc, $record->MerchDesc, $record->MerchPrice, $record->MerchID
                );
            }  
        } 
        ?>
        <div class="ebanner">
            <figure>
                <a href="homepage.php"><img src="img/event/b1.png" id="b1"></a>
                <a href='#mlbb'><img src="img/event/b2.png" id="b2"></a>
                <a href='#valorant'><img src="img/event/b3.png" id="b3"></a>
                <a href='#warzone'><img src="img/event/b4.png" id="b4"></a>
                <a href="ticket.php"><img src="img/event/b5.png" id="b5"></a>
                <img src="img/event/b6.png" id="b6"/>
                <a href="merch.php"><img src="img/merch/merch-banner.png" alt="alt" id="b7"/></a>
                <img src="img/event/b1.png" id="b1"/>
            </figure>
        </div>
        <h1>Events</h1>
        <div class="browseEvent">
            <div class="searchEvent">
                <form action="" method="get">
                    <input type="text" name="search" placeholder="Browse for Events"/>
                    <button class="searchbtn">Search  <i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="filterEvent">
                <button class="filter">All</button>
                <button class="filter">Single Player</button>
                <button class="filter">Multiplayer</button>
                <button class="filter">Non-gamers</button>
                <button class="filter">Ongoing</button>
            </div>
        </div>
        <div class="events">
            <div class="event-card">
                <div class="event-front" id="mlbb">
                    <img src="img/event/b2.png" width="100%">
                    <h2>MOBILE LEGENDS : BANG BANG GRAND FINALE</h2>
                    <img src="img/event/mlbb2.png" width="100%">
                </div>
                <div class="event-back">
                    <h2>MOBILE LEGENDS : BANG BANG GRAND FINALE</h2>
                    <div class="event-details">
                        <div class="event-desc">
                            <img src="img/event/mlbb.jpg">
                            <p>What awaits you is something like no other...Witness the final battle 
                                between the last 4 teams standing with a special guest appearance :
                                THE MPL MY/SG CHAMPION OF S2 RYNN !<br><br> Join us in Mobile Legends' Grand Finale
                            to meet a real professional gamer in real life !</p>
                        </div>
                        <div class="event-date">
                            <p> Date  : 28<sup>th</sup> April 2023<br>
                                Time  : 10 A.M - 4 P.M<br>
                                Venue : CA, TAR UMT<br></p>
                        </div>
                    </div>
                        <div class="event-btn">
                            <a href="ticket-mlbb.php"><button class="book">Book Now</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <?php include "footerUser.php"; ?>
    </body>
</html>
