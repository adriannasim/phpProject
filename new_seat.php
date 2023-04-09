<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Event Details</title>
        <link href="css/event_ticket.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Add New Event Details</h1>
        <br>
        <form action="/create-event" method="post">
            <div class="form">
                <table><tr>
                        <td>
                            <label for="event-name">Event Name:</label>
                            <input type="text" id="event-name" name="event-name" required></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="event-date">Event Date:</label>
                            <input type="date" id="event-date" name="event-date" required></td>
                    </tr>

                    <tr>
                        <td>
                            <label for="event-time">Event Time:</label>
                            <input type="time" id="event-time" name="event-time" required></td>
                    </tr>

                    <tr>
                        <td>
                            <label for="event-seat-type">Event Seat Type</label>
                            <input type="radio" name="seattype" value="seattype"/>Standard
                            <input type="radio" name="seattype" value="seattype" />VIP
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="price" value="price" />RM20
                            <input type="radio" name="price" value="price" />RM40</td>
                    </tr>
                </table>
            </div>
            <br>
            <button input type="submit" value="Create Event" name="Create Event"/>Create Event</button>
        <a href="Eticket_list.php">Back</a>
    </form>

</body>
</html>
