<?php
session_start();
include "config/config.php";
$UserID = $_SESSION['UserID'];

if ($UserID == '') {
    header("location: index.php");
}

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

/*
// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_type = $_POST['ticket_type'];
    $ticket_qty = $_POST['ticket_qty'];

    // Insert ticket data into the database
    $ticket_price = ($ticket_type == 'VIP') ? 40.00 : 20.00;
    $total_price = $ticket_price * $ticket_qty;

    $cart_id = $_SESSION['CartID'];
    $tbuy_qty = mysqli_real_escape_string($connection, $ticket_qty);

    $sql_insert = "INSERT INTO ticket_buy (CartID, TicketType, TbuyQty) VALUES ('$cart_id', '$ticket_type', '$tbuy_qty')";
    mysqli_query($connection, $sql_insert);

    // Display a success message
    echo "Ticket added to cart successfully!";
}
*/
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
                </table>
                <br>
                <button type="submit">Add to cart</button>
            </form>
        </div>
    </div>

    <br><br>

    <?php include "footerUser.php"?>
</body>
</html>


