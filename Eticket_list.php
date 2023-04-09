<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Ticketing System</title>
        <link href="css/event_ticket.css" rel="stylesheet" text="text/css">

    </head>
    <body>
        <?php ?>
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
                    <tr>
                        <td>MLBB GRAND FINALE</td>
                        <td>28/04/2023</td>
                        <td>10AM - 4PM</td>
                        <td>Standard</td>
                        <td>20</td>
                        <td>120</td>
                        <td><a href="seating_plan.php">View</a></td>

                    </tr>
                    <tr>
                        <td>MLBB GRAND FINALE</td>
                        <td>28/04/2023</td>
                        <td>10AM - 4PM</td>
                        <td>VIP</td>
                        <td>40</td>
                        <td>50</td>
                        <td><a href="seating_plan.php">View</a></td>
                    </tr>
                    <tr>
                        <td>VALORANT </td>
                        <td>20/05/2023</td>
                        <td>10AM - 4PM</td>
                        <td>Standard</td>
                        <td>20</td>
                        <td>120</td>
                        <td><a href="seating_plan.php">View</a></td>
                    </tr>
                    <tr>
                        <td>VALORANT </td>
                        <td>20/05/2023</td>
                        <td>10AM - 4PM</td>
                        <td>VIP</td>
                        <td>40</td>
                        <td>50</td>
                        <td><a href="seating_plan.php">View</a></td>
                    </tr>
                    <tr>
                        <td>WARZONE S2</td>
                        <td>12/6/2023 - 16/6/2023</td>
                        <td>TO BE SPECIFED</td>
                        <td>Standard</td>
                        <td>20</td>
                        <td>120</td>
                        <td><a href="seating_plan.php">View</a></td>
                    </tr>
                    <tr>
                        <td>WARZONE S2</td>
                        <td>12/6/2023 - 16/6/2023</td>
                        <td>TO BE SPECIFED</td>
                        <td>VIP</td>
                        <td>40</td>
                        <td>50</td>
                        <td><a href="seating_plan.php">View</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <a href="new_seat.php">Add </a>
        <?php ?>
    </body>
</html>
