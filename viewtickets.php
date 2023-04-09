<!DOCTYPE html>
<html>
<head>
    <title>View tickets</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/viewticket.css">
</head>

<body>
    <?php include "headerUser.php"?>
    <br>
    <div class="viewTicketTable">
        <h1 style="text-align:center">Booked Tickets</h1>
        <br>
        <table>
            <tr>
                <th>Event</th>
                <th>Ticket Type</th>
                <th>Fee</th>
                <th>Time</th>
                <th>Venue</th>
                <th>Seat</th>
            </tr>
            <tr>
                <td>MLBB Tournament</td>
                <td>VIP</td>
                <td>RM50</td>
                <td>10AM - 4PM</td>
                <td>CA, TAR UMT</td>
                <td><b>Row:</b> A<br><b>Column:</b> 7</td>
            </tr>
            <tr>
                <td>Valorant</td>
                <td>Standard</td>
                <td>RM40</td>
                <td>10AM - 4PM</td>
                <td>FOYER, TAR UMT</td>
                <td><b>Row:</b> C<br><b>Column:</b> 9</td>
            </tr>
        </table>
    </div>
    <br><br>
    <?php include "footerUser.php"?> 
</body>
</html>