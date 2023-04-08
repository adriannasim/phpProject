<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
<head>
    <title>Ticket Site</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="ticket.css">
  </head>
  
  <body>
    <?php include "headerUser.php"?>
      <h1>Ticket Site</h1>
      <h2>Upcoming Events</h2>
      
        <div class="ticket-container">
            <img src="img/ticket/b2.png" alt="MLBB" class="ticket-container-image">
            <div class="ticket-overlay">
                <h3>MLBB Tournament Grand Finale</h3>
                <p><b>Date:</b> April 28, 2023</p>
                <p><b>Venue:</b> CA, TAR UMT</b></p>
                <p><b>Ticket Price:</b> RM40 per pax</b></p>
                <button>Buy Ticket</button>
            </div> 
        </div>
      <br><br>
        <div class="ticket-container">
            <img src="img/ticket/b3.png" alt="Valorant" class="ticket-container-image">
            <div class="ticket-overlay">
                <h3>VALORANT: Battle Of The Ace</h3>
                <div class="overlay2">
                <p><b>Date:</b> May 20, 2023</p>
                <p><b>Venue:</b> Foyer, TAR UMT</b></p>
                <p><b>Participation Fee:</b> RM20 per pax</b></p>
                <p><b>Spectator Fee:</b> RM40 per pax</b></p>
                <button>Register Now</button>
                </div>
            </div> 
        </div>
      <br><br>
        <div class="ticket-container">
            <img src="img/ticket/b4.png" alt="War Zone" class="ticket-container-image">
            <div class="ticket-overlay">
                <h3>War Zone S2</h3>
                <p><b>Date:</b> June 12, 2023 (MON) - June 16, 2023 (FRI)</p>
                <p><b>Venue:</b> CA, TAR UMT</b></p>
                <p><b>Fee:</b> RM10 per pax</b></p>
                <button>Register Now</button>
            </div> 
        </div>
        <?php include "footerUser.php"?>        
  </body>
</html>
