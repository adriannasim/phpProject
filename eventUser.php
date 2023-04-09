<html>
    <head>
        <meta charset="UTF-8">
        <title>E-sports Events</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link href="css/event.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include "headerUser.php"?>
        <div class="ebanner">
            <figure>
                <img src="img/event/b1.png" id="b1">
                <a href='#mlbb'><img src="img/event/b2.png" id="b2"></a>
                <a href='#valorant'><img src="img/event/b3.png" id="b3"></a>
                <a href='#warzone'><img src="img/event/b4.png" id="b4"></a>
                <img src="img/event/b5.png" id="b5">
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
                    <button class="searchbtn">Search<span><b> &#8594;</b></span></button>
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
                            to meet a real professional gamer in real life !<br><br></p>
                        </div>
                        <div class="event-date">
                            <p> Date  : 28<sup>th</sup> April 2023<br>
                                Time  : 10 A.M - 4 P.M<br>
                                Venue : CA, TAR UMT<br></p>
                        </div>
                        <div class="event-btn">
                            <button class="book">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-card">
                <div class="event-front" id="valorant">
                    <img src="img/event/b3.png" width="100%">
                    <h2>VALORANT : BATTLE OF THE ACE</h2>
                    <img src="img/event/val2.png" width="100%">
                </div>
                <div class="event-back">
                    <h2>VALORANT : BATTLE OF THE ACE</h2>
                    <div class="event-details">
                        <div class="event-desc">
                            <img src="img/event/val.jpg">
                            <p>Ever dream of fighting side-by-side with your best buddies in an
                            E-Sports gaming event? This could be your battle. Assemble all your
                            comrades because it's showtime!<br><br>
                            NOTE : Participants are required to register together in a TEAM OF 5 <br><br>
                            For NON-Gamers : FEAR NOT! You can also witness the ultimate victory of your 
                            friends. What are you waiting for? Grab your tickets NOW!</p>
                        </div>
                        <div class="event-date">
                            <p> Date  : 25<sup>th</sup> May 2023<br>
                                Time  : 10 A.M - 4 P.M<br>
                                Venue : FOYER, TAR UMT<br></p>
                        </div>
                        <div class="event-btn">
                            <button class="book">Join Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-card">
                <div class="event-front" id="warzone">
                    <img src="img/event/b4.png" width="100%">
                    <h2>WARZONE S2 : GAMING FUN CAMP</h2>
                    <img src="img/event/warzone2.png" width="100%">
                </div>
                <div class="event-back">
                    <h2>WARZONE S2 : GAMING FUN CAMP</h2>
                    <div class="event-details">
                        <div class="event-desc">
                            <img src="img/event/warzone.png">
                            <p>Join us in War Zone S2 where you can participate in team building, gaming 
                                tournaments and workshops to expand your social circle and test your
                            gaming potential!</p>
                        </div>
                        <div class="event-date">
                            <p> Date  : 12<sup>th</sup> June 2023 - 16<sup>th</sup> June 2023<br>
                                Time  : To Be Confirmed<br>
                                Venue : CA, TAR UMT<br></p>
                        </div>
                        <div class="event-btn">
                            <button class="book">Join Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <?php include "footerUser.php"; ?>
    </body>
</html>
