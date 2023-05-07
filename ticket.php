<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
<head>
    <title>Buy Tickets</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/ticket.css">
</head>

<body>
    <?php include "headerUser.php"?>
    <br>

    <h1 style="text-align: center; text-shadow: 5px 5px 5px #27C7C5;">Upcoming Events</h1>

    <br>
    <br>

      <div class="ticket-container">
          <img src="img/ticket/b2.png" alt="MLBB" class="ticket-container-image">
          <div class="ticket-overlay">
              <h2>MLBB Tournament Grand Finale</h2>
              <div class="ticket-overlay1">
              <table>
                    <tr>
                      <td><b>Fee</b></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>VIP</td>
                      <td>: RM50 per pax</td>
                    </tr>
                    <tr>
                      <td>Standard</td>
                      <td>: RM40 per pax</td>
                    </tr>
              </table>
              <br>
              </div>
                <button class="ticket-button" onclick="window.location.href = 'ticket-mlbb.php'">Register Now !</button>
          </div> 
      </div>

    <br><br><br><br>

      <div class="ticket-container">
          <img src="img/ticket/b3.png" alt="Valorant" class="ticket-container-image">
          <div class="ticket-overlay">
              <h2>VALORANT: Battle Of The Ace</h2>
              <div class="ticket-overlay1">
              <table>
                    <tr>
                      <td><b>Fee</b></td> 
                      <td></td>
                    </tr>
                    <tr>
                      <td>Participation Fee</td>
                      <td>: RM20 per team (5 pax)</td>
                    </tr>
                    <tr>
                      <td>Spectator Fee</td>
                      <td>: (VIP) RM50 per pax | (Standard) RM40 per pax</td>
                    </tr>
              </table>
              <br>
              </div>
                <button class="ticket-button" onclick="window.location.href = 'ticket-valorant.php'">Register Now !</button>
              
            </div> 
      </div>

      <br><br><br><br>

      <div class="ticket-container">
          <img src="img/ticket/b4.png" alt="War Zone" class="ticket-container-image">
          <div class="ticket-overlay">
              <h2>War Zone S2</h2>
              <p style="text-align: left"><b>Fee </b>: RM10 per pax</p>
              <div class="ticket-overlay1">
                <button class="ticket-button" onclick="window.location.href = 'ticket-warzone.php'">Register Now !</button>
              </div>
          </div> 
      </div>

    <br><br>  

    <?php include "footerUser.php"?>        
</body>
</html>
