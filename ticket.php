<?php
session_start();
include("config/config.php");
$UserID = "adrianna";
//$UserID = $_SESSION['UserID'];
?>
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
    <?php
// Assuming you have already established a database connection
$sql = "SELECT * FROM ticket_info";
$result = mysqli_query($connection, $sql);

// check if query was successful
if (mysqli_num_rows($result) > 0) {
    // fetch data from result set
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['TicketID'] == 'AU002') {
            $vip_price = $row['TicketPrice'];
        } else if ($row['TicketID'] == 'AU001') {
            $standard_price = $row['TicketPrice'];
        }
    }
}

?>
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
                    <td>: RM<?php echo $vip_price; ?> per pax</td>
                </tr>
                <tr>
                    <td>Standard</td>
                    <td>: RM<?php echo $standard_price; ?> per pax</td>
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
                    <td>VIP</td>
                    <td>: RM<?php echo $vip_price; ?> per pax</td>
                </tr>
                <tr>
                    <td>Standard</td>
                    <td>: RM<?php echo $standard_price; ?> per pax</td>
                </tr>
            </table>
            <br>
        </div>
        <button class="ticket-button" onclick="window.location.href = 'ticket-mlbb.php'">Register Now !</button>
      </div> 
  </div>

      <br><br><br><br>

      <div class="ticket-container">
          <img src="img/ticket/b4.png" alt="War Zone" class="ticket-container-image">
          <div class="ticket-overlay">
              <h2>War Zone S2</h2>
              <div class="ticket-overlay1">
              <table>
                <tr>
                    <td><b>Fee</b></td> 
                    <td></td>
                </tr>
                <tr>
                    <td>VIP</td>
                    <td>: RM<?php echo $vip_price; ?> per pax</td>
                </tr>
                <tr>
                    <td>Standard</td>
                    <td>: RM<?php echo $standard_price; ?> per pax</td>
                </tr>
            </table>
            <br>
        </div>
        <button class="ticket-button" onclick="window.location.href = 'ticket-mlbb.php'">Register Now !</button>
      </div> 
  </div>
    <br><br>  

    <?php include "footerUser.php"?>        
</body>
</html>
