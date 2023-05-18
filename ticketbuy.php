<?php
session_start();
include("config/config.php");

// Check if the event ID is set in the URL
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    // Retrieve event details based on the event ID
    $sql = "SELECT * FROM event WHERE EventID = '$event_id'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $event_name = $row['EventName'];
        $event_date = $row['EventDate'];
    } else {
        // Display an error message if the event is not found
        echo "Unknown event.";
        exit;
    }
} else {
    // Display an error message if the event ID is not provided
    echo "Event ID is missing.";
    exit;
}

$show_total_price = false;
$total_price = 0.00;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_type = isset($_POST['ticket_type']) ? $_POST['ticket_type'] : '';
    $ticket_qty = isset($_POST['ticket_qty']) ? $_POST['ticket_qty'] : '';

    // Calculate total price
    $ticket_price = ($ticket_type == 'VIP') ? 40.00 : 20.00;
    $total_price = $ticket_price * $ticket_qty;
    $show_total_price = true;
}
?>

<html>
<head>
    <title>Buy Tickets</title>
    <meta charset="UTF-8">
    
</head>

<body>
    <?php include "headerUser.php"?>
    <br>

    <h1 style="text-align: center; text-shadow: 5px 5px 5px #27C7C5;">Buy Tickets</h1>

    <br>
    <br>

    <div class="ticket-container">
        <h2><?php echo $event_name; ?></h2>
        <div class="ticket-overlay1">
            <form action="" method="POST">
                <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
                <table>
                    <tr>
                        <td><b>Event Date</b></td> 
                        <td>: <?php echo $event_date; ?></td>
                    </tr>
                    <?php if (!$show_total_price): ?>
                    <tr>
                        <td><b>Ticket Type</b></td>
                        <td>:
                            <select name="ticket_type">
                                <option value="Standard">Standard</option>
                                <option value="VIP">VIP</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Quantity</b></td>
                        <td>: <input type="number" name="ticket_qty" min="1" required></td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($show_total_price): ?>
                    <tr>
                        <td><b>Ticket Type</b></td>
                        <td>: <?php echo $ticket_type; ?></td>
                    </tr>
                    <tr>
                        <td><b>Quantity</b></td>
                        <td>: <?php echo $ticket_qty; ?></td>
                    </tr>
                    <tr>
                        <td><b>Total Price</b></td>
                        <td>: RM<?php echo number_format($total_price, 2); ?></td>
                    </tr>
                    <?php endif; ?>
                </table>
                <br>
                <?php if (!$show_total_price): ?>
                <button type="submit">Calculate Total Price</button>
                <?php else: ?>
                <button type="submit">Confirm</button>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <br><br>

    <?php include "footerUser.php"?>        
    </body>
</html>
