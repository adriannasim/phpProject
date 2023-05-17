<?php
    session_start();
    include "config/config.php";
    $UserID = $_SESSION['UserID'];

    if ($UserID == '') {
        header("location: index.php");
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Event Ticket</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    include "adminHelper.php";
    include "headerAdmin.php";
    global $hideForm;

    ?>

    <div class="edit-header">
        <h1>Edit Event Ticket</h1>
    </div>
    <div class="editEvent-form">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            (isset($_GET["id"])) ?
                $ticketID = $_GET["id"]: $ticketID = "";

            $sql = "SELECT e.EventID, e.EventName, ti.TicketID, ti.TicketPrice, ti.TicketType, ti.TicketQty FROM event e JOIN ticket_info ti ON e.EventID = ti.EventID WHERE ti.TicketID = '$ticketID'";
            $result = $connection->query($sql);
            if ($record = $result->fetch_object()) {
                $id = $record->EventID;
                $ticketID = $record->TicketID;
                $name = $record->EventName;
                $price = $record->TicketPrice;
                $type = $record->TicketType;
                $qty = $record->TicketQty;
            } else {
                echo "<div class='error'>Record not found !<a href='eventTicketManage.php'>Back to Manage Events</a></div>";
                $hideForm = true;
            }
        } else if(!empty($_POST)){
            $id = trim($_POST["id"]);
            $name = trim($_POST["name"]);
            $ticketID = trim($_POST["ticketID"]);
            $price = trim($_POST["price"]);
            $type = trim($_POST["type"]);
            $qty = trim($_POST["qty"]);

            $error['price'] = checkTicketPrice($price);
            $error['qty'] = checkQty($qty);
            $error['type'] = checkType($type);
            $error = array_filter($error);
            if (empty($error)) {
                $sql = "UPDATE ticket_info SET TicketPrice = ?, TicketType = ?, TicketQty = ? WHERE TicketID = ?";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("ssss", $price, $type, $qty, $ticketID);
                if ($stmt->execute()) {
                    echo "<div class='correct'> Event Ticket Data Updated !<br/><a href='eventTicketManage.php'>Back to Manage Event Tickets</a></div>";
                }
            } else {
                echo '<ul class="error">';
                printf("<p>%s</p>", implode("<p></p>", $error));
                echo '</ul>';
            }
        }
        ?>
        <?php if ($hideForm == false) : ?>
        <form action="" method="post">
            <div class="edit-form">
            <table class="edit-form-table">
                <tr>
                    <th>Event ID : </th>
                    <td><?php echo $id;?><input type="text" name="id" id="id" value="<?php echo $id;?>" hidden/></td>
                </tr>
                <tr>
                    <th>Event Name : </th>
                    <td><?php echo $name;?><input type="text" name="name" id="name" value="<?php echo $name;?>" hidden/></td>
                </tr>
                <tr>
                    <th>Event TicketID : </th>
                    <td><?php echo $ticketID;?><input type="text" name="ticketID" id="ticketID" value="<?php echo $ticketID;?>" hidden/></td>
                </tr>
                <tr>
                    <th>Event Ticket Price : </th>
                    <td><input type="text" name="price" value="<?php echo $price;?>"></td>
                <tr>
                <tr>
                    <th>Event Ticket Type : </th>
                    <td><input type="text" name="type" value="<?php echo $type;?>"></td>
                </tr>
                <tr>
                    <th>Event Ticket Quantity : </th>
                    <td><input type="text" name="qty" value="<?php echo $qty;?>"/></td>
                </tr>
            </table>
            <div class="edit-form-btn">
            <input type="button" value="Cancel" onclick="location = 'eventTicketManage.php'">
            <input type="submit" value="Submit" name="edit-form-submit">
            </div>
        </div>
        </form>
        <?php endif; ?>
        <div>

</body>

</html>