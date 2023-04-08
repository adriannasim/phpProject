<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
<head>
    <title>Buy Ticket</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="ticket.css">
</head>

<body>
    <?php include "headerUser.php"?>
    <br>

    <h1 style="text-align: center; text-shadow: 5px 5px 5px #27C7C5;">Upcoming Events</h1>

    <br><br>

      <div class="ticket-container">
          <img src="img/ticket/b2.png" alt="MLBB" class="ticket-container-image">
          <div class="ticket-overlay">
              <h2>MLBB Tournament Grand Finale</h2>
              <div class="ticket-overlay1">
                <button class="ticket-button" onclick="window.location.href = 'ticket-mlbb.php'">Register Now !</button>
              </div>
          </div> 
      </div>

    <br><br><br><br>

      <div class="ticket-container">
          <img src="img/ticket/b3.png" alt="Valorant" class="ticket-container-image">
          <div class="ticket-overlay">
              <h2>VALORANT: Battle Of The Ace</h2>
              <div class="ticket-overlay1">
                <button class="ticket-button">Register Now !</button>
              </div>
            </div> 
      </div>

      <br><br><br><br>

      <div class="ticket-container">
          <img src="img/ticket/b4.png" alt="War Zone" class="ticket-container-image">
          <div class="ticket-overlay">
              <h2>War Zone S2</h2>
              <div class="ticket-overlay1">
                <button class="ticket-button">Register Now !</button>
              </div>
          </div> 
      </div>

    <br><br>  

    <?php include "footerUser.php"?>        
</body>
</html>
