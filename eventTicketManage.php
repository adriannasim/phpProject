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
    <title>Manage Event Tickets</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include "adminHelper.php";
    include "headerAdmin.php";
    ?>
    <?php
    $header = array(
        "EventID" => "Event ID",
        "EventName" => "Event Name",
        "TicketID" => "Ticket ID",
        "TicketPrice" => "Ticket Price",
        "TicketType" => "Ticket Type",
        "TicketQty" => "Ticket Quantity"
    );
    $header2 = array(
        "EventID" => "Event ID",
        "EventName" => "Event Name",
    );
    ?>
    <div class="editEvents">
        <div class="editEvents-header">
            <h1>Manage Event Tickets</h1>
        </div>
        <div class="editEvents-form">
            <table class="event-details">
            <div class="editEvents-header">
                <h4 id="with-hd">Edit Event Ticket</h4>
            </div>
            <?php
            if (isset($_GET['search'])) {
                $search = mysqli_real_escape_string($connection, (trim($_GET['eventName'])));
                $sql = "SELECT e.EventID, e.EventName, ti.TicketID, ti.TicketPrice, ti.TicketType, ti.TicketQty FROM event e JOIN ticket_info ti ON e.EventID = ti.EventID WHERE EventName LIKE '%$search%';";
                $sql2 = "SELECT e.EventID, e.EventName FROM event e WHERE e.EventID NOT IN (SELECT ti.EventID from ticket_info ti) AND EventName LIKE '%$search%';";
            } else {
                $sql = "SELECT e.EventID, e.EventName, ti.TicketID, ti.TicketPrice, ti.TicketType, ti.TicketQty FROM event e JOIN ticket_info ti ON e.EventID = ti.EventID";
                $sql2 = "SELECT e.EventID, e.EventName FROM event e WHERE e.EventID NOT IN (SELECT ti.EventID from ticket_info ti);";
            }
            $result = $connection->query($sql);
            $result2 = $connection->query($sql2);
            foreach ($header as $value) {
                printf("<th>%s</th>", $value);
            }
            printf("<th>Action</th>");
            while ($record = $result->fetch_object()) {
                printf("
                <tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>
                        <button id='add'><a href='eventTicketAdd.php?id=$record->EventID'>Add Ticket</a></button>
                        <button id='edit'><a href='eventTicket.php?id=$record->TicketID'>Edit</a></button>
                        <button id='delete'><a href='eventTicketDelete.php?id=$record->TicketID'>Delete</a></button>
                    </td>
                </tr>"
                ,$record->EventID, $record->EventName, $record->TicketID, $record->TicketPrice, $record->TicketType, $record->TicketQty
                );
            }
            ?>
            </table>
            <br/>
            <hr />
            <table class="event-details">
            <div class="editEvents-header">
                <h4 id="without-hd">Events Without Tickets</h4>
            </div>
            <?php
            foreach ($header2 as $value) {
                printf("<th>%s</th>", $value);
            }
            printf("<th>Action</th>");
            while ($record2 = $result2->fetch_object()) {
                printf("
                <tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>
                        <button id='add-no-ticket'><a href='eventTicketAdd.php?id=$record2->EventID'>Add Ticket</a></button>
                    </td>
                </tr>"
                ,$record2->EventID, $record2->EventName
                );
            }
            ?>
            </table>
        </div>
    </div>
</body>

</html>