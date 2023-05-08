
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Ticketing System</title>
        <link href="css/event_ticket.css" rel="stylesheet" text="text/css">
    </head>
    <body>
        <?php include "headerAdmin.php"?>
        <h1>Event List</h1>
        <br>
        <div class="list">
            <table>
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Seat Type</th>
                        <th>Price (RM) </th>
                        <th>Seats Available</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                session_start();
                include ("config/config.php");
                $sqlEvent = "SELECT * FROM event 
                    JOIN ticket_info ON event.EventID = ticket_info.EventID 
                    ORDER BY EventDate;";
                $result = mysqli_query($connection, $sqlEvent);
                if (mysqli_num_rows($result) > 0) {
                    while($record = $result->fetch_object()) {
                        printf("<tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            </tr>",
                            $record->EventName, $record->EventDate, $record->EventTime, $record->TicketType, $record->TicketPrice, $record->TicketQty, "<a href='seating_plan.php'>View</a>"
                        );
                    }  
                } 
                ?>
                </tbody>
            </table>
        </div>
        <br>
        <div class="add">
        <a href="eventAdd.php">Add </a>
        </div>
        <?php ?>
    </body>
</html>
