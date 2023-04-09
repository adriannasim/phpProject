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
                <th>Seat</th>
            </tr>
            <tr>
                <td>MLBB Tournament</td>
                <td>VIP</td>
                <td>RM50</td>
                <td>Row: A<br>Column: 7</td>
            </tr>
            <tr>
                <td>Valorant</td>
                <td>Standard</td>
                <td>RM40</td>
                <td>Row: C<br>Column: 9</td>
            </tr>
        </table>
    </div>
    <br><br>
    <?php include "footerUser.php"?> 
</body>
</html>