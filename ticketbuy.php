<?php
session_start();
include "config/config.php";

$UserID = $_SESSION['UserID'];

if (empty($UserID)) {
    header("location: index.php");
    exit;
}

// Check if the event ID is set in the URL
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    // Retrieve event details based on the event ID
    $sql = "SELECT * FROM event WHERE EventID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
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

// Retrieve available seat IDs
$sql_seats = "SELECT SeatID FROM seat WHERE Status = 0";
$result_seats = mysqli_query($connection, $sql_seats);
$available_seats = mysqli_fetch_all($result_seats, MYSQLI_ASSOC);
$seat_options = array_column($available_seats, 'SeatID');

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_type = $_POST['ticket_type'];
    $ticket_qty = $_POST['ticket_qty'];
    $selected_seats = $_POST['seat_id'];

    // Validate selected seats
    if (count($selected_seats) != $ticket_qty) {
        echo "Please select $ticket_qty seat(s).";
        exit;
    }

    // Insert ticket data into the database
    $ticket_price = ($ticket_type == 'VIP') ? 40.00 : 20.00;
    $total_price = $ticket_price * $ticket_qty;

    $stmt_insert = $connection->prepare("INSERT INTO ticket_buy (TicketID, TbuyQty) VALUES (?, ?)");
    $stmt_update = $connection->prepare("UPDATE seat SET Status = 1, TicketID = ? WHERE SeatID = ?");

    // Generate the ticket ID (AU001)
    $ticket_id = 'AU001';

    foreach ($selected_seats as $seat) {
        $stmt_insert->bind_param("si", $ticket_id, $ticket_qty);
        $stmt_insert->execute();

        // Update the seat status and associate it with the ticket ID
        $stmt_update->bind_param("si", $ticket_id, $seat);
        $stmt_update->execute();
    }

    $stmt_insert->close();
    $stmt_update->close();

    // Update the status of unselected seats to 0
    $unselected_seats = array_diff($seat_options, $selected_seats);
    $stmt_update_unselected = $connection->prepare("UPDATE seat SET Status = 0 WHERE SeatID = ?");
    foreach ($unselected_seats as $seat) {
        $stmt_update_unselected->bind_param("s", $seat);
        $stmt_update_unselected->execute();
    }
    $stmt_update_unselected->close();

    echo '<script>alert("Ticket added successfully!"); window.location.href = "ticket.php";</script>';

}
?>

<html>
<head>
    <title>Buy Tickets</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/ticketbuy.css">
</head>

<body class="ticketfont">
    <?php include "headerUser.php"?>
    <br>

    <h1 style="text-align: center; text-shadow: 5px 5px 5px #27C7C5;color:white;">Buy Tickets</h1>

    <br>
    <br>

    <div class="ticketBuy">
        <h2><?php echo $event_name; ?></h2>
        <div class="ticketBuy2">
            <form action="" method="POST">
                <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
                <table>
                    <tr>
                        <td><b>Event Date</b></td>
                        <td>: <?php echo $event_date; ?></td>
                    </tr>
                    <tr><td colspan="2"><a href="user_seat.php?event_id=CA001">Preview the seats</a></td></tr>
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
                    <tr>
                        <td><b>Seat ID(s)</b></td>
                        <td>
                            <?php
                            $seats_by_alphabet = array();
                            foreach ($seat_options as $seat) {
                                $first_alphabet = strtoupper(substr($seat, 0, 1));
                                $seats_by_alphabet[$first_alphabet][] = $seat;
                            }

                            foreach ($seats_by_alphabet as $first_alphabet => $seats) {
                                echo "<b>$first_alphabet:</b> ";
                                foreach ($seats as $seat) {
                                    ?>
                                    <input type="checkbox" name="seat_id[]" value="<?php echo $seat; ?>">
                                    <?php echo $seat; ?>&nbsp;&nbsp;
                                    <?php
                                }
                                echo "<br>";
                            }
                            ?>
                        </td>

                    </tr>
                </table>
                <br>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>

    <br><br>

    <?php include "footerUser.php"?>
</body>
</html>
