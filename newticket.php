<?php
session_start();
include("config/config.php");
$UserID = $_SESSION['UserID'];

?>

<html>
<head>
  <title>Buy Tickets</title>
  <link rel="stylesheet" href="css/newticket.css">
</head>
<body>
<?php include "headerUser.php";?>
<br>

<?php
  $display_form = true;
  $total_price = 0;
  $error_message = "";

  // Process form submission
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get number of standard tickets and calculate total price
    $standard_ticket_price = 20.00;
    $standard_ticket_quantity = isset($_POST['standard_ticket_quantity']) ? $_POST['standard_ticket_quantity'] : 0;
    $standard_ticket_total_price = $standard_ticket_price * $standard_ticket_quantity;

    // Get number of VIP tickets and calculate total price
    $vip_ticket_price = 40.00;
    $vip_ticket_quantity = isset($_POST['vip_ticket_quantity']) ? $_POST['vip_ticket_quantity'] : 0;
    $vip_ticket_total_price = $vip_ticket_price * $vip_ticket_quantity;

    // Check if any ticket quantity is provided
    if ($standard_ticket_quantity == 0 && $vip_ticket_quantity == 0) {
      $error_message = "<b>Please select at least one ticket quantity!</b>";
        
    } else {
      // Calculate total price
      $total_price = $standard_ticket_total_price + $vip_ticket_total_price;

      // Hide the form and display total price
      $display_form = false;
      if (isset($total_price) && $total_price > 0) {
        $ticket_name = "";
        (isset($_GET["id"])) ? $id = $_GET["id"] : $id = "";
        if ($id == 1) {
          $ticket_name = "MLBB Tournament - Grand Finale";
        } else if ($id == 2) {
          $ticket_name = "VALORANT: Battle Of The Ace";
        } else {
          $ticket_name = "War Zone S2: Gaming Event";
        }
        
        echo '<div class="ticket-details">';
        echo '<h2>You have chosen:</h2>';
        echo '<p>Ticket for<b> '.$ticket_name.'</b></p>';
        echo '<p><b>Standard Ticket Quantity</b>: '.$standard_ticket_quantity.'</p>';
        echo '<p><b>VIP Ticket Quantity</b>: '.$vip_ticket_quantity.'</p>';
        echo '<p><b>Total Price</b>: <i>RM '.number_format($total_price, 2).'</i></p>';
        echo '</div>';
          ?><br><button type="submit" class="CnP" name="addcart">Confirm and Pay</button><?php
      }
    }
  }
?>

<?php if ($display_form) { ?>
  <div class="form-container">
    <form method="post">
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            (isset($_GET["id"])) ? $id = $_GET["id"] : $id = "";
            if ($id == 1) { ?>
                <div class="ticket">
                    <img src="img/ticket/b2.png" alt="MLBB" class="ticket-mlbb-image" >
                    <h1 class="ticket-heading">MLBB Tournament - Grand Finale</h1>
                </div>
            <?php } else if ($id == 2) { ?>
                <div class="ticket">
                    <img src="img/ticket/b3.png" alt="valorant" class="ticket-valorant-image" >
                    <h1 class="ticket-heading">VALORANT: Battle Of The Ace</h1>
                </div>
            <?php } else { ?>
                <div class="ticket">
                    <img src="img/ticket/b4.png" alt="warzone" class="ticket-warzone-image" >
                    <h1 class="ticket-heading">War Zone S2: Gaming Event</h1>
                </div>
            <?php }
        }
    ?>

    <?php if (!empty($error_message)) { ?>
      <div class="error-message"><?php echo $error_message; ?></div>
    <?php } ?>

    <p>
        <a href="user_seat.php">
        Click here to see available seats
        </a>
    </p>
    <br>
        <div class="ticket-type">
            <label for="standard_ticket_quantity">Standard Ticket (RM20.00)</label>
            <input type="number" id="basic_ticket_quantity" name="standard_ticket_quantity" min="0"
                   value="<?php echo isset($_POST['standard_ticket_quantity']) ? $_POST['standard_ticket_quantity'] : '0'; ?>">
            <br><br>
            <label for="vip_ticket_quantity">VIP Ticket (RM40.00)</label>
            <input type="number" id="vip_ticket_quantity" name="vip_ticket_quantity" min="0"
                   value="<?php echo isset($_POST['vip_ticket_quantity']) ? $_POST['vip_ticket_quantity'] : '0'; ?>">
        </div>
        <div class="button-group">
            <input type="submit" value="Confirm" class="confirmButton">
            <input type="reset" value="Reset" class="resetButton">
        </div>
    </form>
  </div>
<?php } ?>

<br>
<?php include "footerUser.php";?>        
</body>
</html>