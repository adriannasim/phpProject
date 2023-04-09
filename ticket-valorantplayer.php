<!DOCTYPE html>
<html>
<head>
    <title>VALORANT Registration Form</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/ticket.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body> 
    <?php include "headerUser.php"?>
    <br>
    <h1 style="text-align: center; text-shadow: 5px 5px 5px #27C7C5;">PARTICIPANTS</h1>
    <br>
    <div class="ticket-valorant-form">
        <form>
            <div class="ticket-mlbb-contacttable">

            <h2>Group Name:</h2>
            <input type="text" id="groupname" name="groupname" placeholder="Enter your group name" size="50" style="height:30px" required>
            <br><br><hr>
            <h2>Player 1:</h2>
                <table>
                    <tr>
                        <td><label for="name"><i class="fa fa-user"><b> Full Name:</b></label></td>
                        <td><input type="text" id="name" name="name" placeholder="Enter your name" size="50" style="height:30px" required></td>
                    </tr>
                    <tr>
                        <td><label for="email"><i class="fa fa-envelope"><b> Email:</b></label></td>
                        <td><input type="email" id="email" name="email" placeholder="Enter your email address" size="50" style="height:30px" required> <br><small>Format: example@example.com</small></td>
                    </tr>
                    <tr>
                        <td><label for="phone"><i class="fa fa-phone"></i><b> Contact Number:</b></label></td>
                        <td><input type="tel" id="phone" name="phone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{7}" placeholder="Enter your phone number" size="50" style="height:30px" required> <br><small>Format: 012-3456789</small></td>
                    </tr>
                </table>
                <hr>
                <h2>Player 2:</h2>
                <table>
                    <tr>
                        <td><label for="name"><i class="fa fa-user"><b> Full Name:</b></label></td>
                        <td><input type="text" id="name" name="name" placeholder="Enter your name" size="50" style="height:30px" required></td>
                    </tr>
                    <tr>
                        <td><label for="email"><i class="fa fa-envelope"><b> Email:</b></label></td>
                        <td><input type="email" id="email" name="email" placeholder="Enter your email address" size="50" style="height:30px" required> <br><small>Format: example@example.com</small></td>
                    </tr>
                    <tr>
                        <td><label for="phone"><i class="fa fa-phone"></i><b> Contact Number:</b></label></td>
                        <td><input type="tel" id="phone" name="phone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{7}" placeholder="Enter your phone number" size="50" style="height:30px" required> <br><small>Format: 012-3456789</small></td>
                    </tr>
                </table>
                <hr>
                <h2>Player 3:</h2>
                <table>
                    <tr>
                        <td><label for="name"><i class="fa fa-user"><b> Full Name:</b></label></td>
                        <td><input type="text" id="name" name="name" placeholder="Enter your name" size="50" style="height:30px" required></td>
                    </tr>
                    <tr>
                        <td><label for="email"><i class="fa fa-envelope"><b> Email:</b></label></td>
                        <td><input type="email" id="email" name="email" placeholder="Enter your email address" size="50" style="height:30px" required> <br><small>Format: example@example.com</small></td>
                    </tr>
                    <tr>
                        <td><label for="phone"><i class="fa fa-phone"></i><b> Contact Number:</b></label></td>
                        <td><input type="tel" id="phone" name="phone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{7}" placeholder="Enter your phone number" size="50" style="height:30px" required> <br><small>Format: 012-3456789</small></td>
                    </tr>
                </table>
                <hr>
                <h2>Player 4:</h2>
                <table>
                    <tr>
                        <td><label for="name"><i class="fa fa-user"><b> Full Name:</b></label></td>
                        <td><input type="text" id="name" name="name" placeholder="Enter your name" size="50" style="height:30px" required></td>
                    </tr>
                    <tr>
                        <td><label for="email"><i class="fa fa-envelope"><b> Email:</b></label></td>
                        <td><input type="email" id="email" name="email" placeholder="Enter your email address" size="50" style="height:30px" required> <br><small>Format: example@example.com</small></td>
                    </tr>
                    <tr>
                        <td><label for="phone"><i class="fa fa-phone"></i><b> Contact Number:</b></label></td>
                        <td><input type="tel" id="phone" name="phone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{7}" placeholder="Enter your phone number" size="50" style="height:30px" required> <br><small>Format: 012-3456789</small></td>
                    </tr>
                </table>
                <hr>
                <h2>Player 5:</h2>
                <table>
                    <tr>
                        <td><label for="name"><i class="fa fa-user"><b> Full Name:</b></label></td>
                        <td><input type="text" id="name" name="name" placeholder="Enter your name" size="50" style="height:30px" required></td>
                    </tr>
                    <tr>
                        <td><label for="email"><i class="fa fa-envelope"><b> Email:</b></label></td>
                        <td><input type="email" id="email" name="email" placeholder="Enter your email address" size="50" style="height:30px" required> <br><small>Format: example@example.com</small></td>
                    </tr>
                    <tr>
                        <td><label for="phone"><i class="fa fa-phone"></i><b> Contact Number:</b></label></td>
                        <td><input type="tel" id="phone" name="phone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{7}" placeholder="Enter your phone number" size="50" style="height:30px" required> <br><small>Format: 012-3456789</small></td>
                    </tr>
                </table>
            </div>
            <br>
            <input type="reset" value="Reset" class="ticket-reset">  
            <input type="submit" value="Pay Now" class="ticket-paynow" onclick="window.location.href = 'ticket-payment.php'">
        </form>
    </div>
    <br>
    <?php include "footerUser.php"?>  
</body>
</html>
