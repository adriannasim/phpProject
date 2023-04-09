<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<style>
input[type=text]{
  width: 100%;
  padding: 15px 20px;
  margin: 10px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
select{
    width: fit-content;
    padding: 5px;
}
</style>
    <head>
        <meta charset="UTF-8">
        <title>Add New Event Details</title>
        <link href="css/event_ticket.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <?php include "headerAdmin.php"?>
        <h1>Add New Event Details</h1>
        <br>
        <form action="/create-event" method="post">
            <div class="form">
                <table><tr>
                        <td>
                        <label for="Ename">Event Name :</label>
                        <input type="text" id="eName" name="eName" placeholder="Event name.." required>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="event-date">Event Date:</label>
                            <input type="date" id="event-date" name="event-date" min="2023-01-01" max="2023-12-31" required></td>
                    </tr>

                    <tr>
                        <td>
                            <label for="event-time">Event Time:</label>
                            <input type="time" id="event-time" name="event-time" required></td>
                    </tr>

                    <tr>
                        <td>
                            <label for="event-ticket-type">Event Ticket Type :</label>
                            <input type="radio" name="tickettype" value="seattype"/>Standard
                            <input type="radio" name="tickettype" value="seattype" />VIP
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="event-seat-amount">Event Seat Amount :</label>
                            <select name="Seat Amount">
                                 <option>50</option>
                                 <option>60</option>
                                 <option>70</option>
                                 <option>80</option>
                                 <option>90</option>
                                 <option>100</option>
                                 <option>110</option>
                                 <option>120</option>
                                 <option>130</option>
                                 <option>140</option>
                                 <option>150</option>
                             </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Event Ticket Price">Ticket Price</label>
                            <input type="text" id="tPrice" name="tprice" placeholder="Insert Price">
                            <h3>OR CHOOSE FROM BELOW</h3>
                            <input type="checkbox" id="option1" name="choices" value="option1">
                            <label for="option1">RM20</label>
                            <input type="checkbox" id="option2" name="choices" value="option2">
                            <label for="option2">RM30</label>
                            <input type="checkbox" id="option3" name="choices" value="option3">
                            <label for="option3">RM40</label>
                            <input type="checkbox" id="option3" name="choices" value="option3">
                            <label for="option3">RM50</label>
                            <input type="checkbox" id="option3" name="choices" value="option3">
                            <label for="option3">RM60</label>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <button input type="submit" value="Create Event" name="Create Event">Create Event</button>
            <div class="back">
            <a href="Event_List.php">Back</a>
        </div>
    </form>

</body>
</html>
