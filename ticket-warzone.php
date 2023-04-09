<!DOCTYPE html>
<html>
<head>
    <title>War Zone S2 Registration Form</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/ticket.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body> 
    <?php include "headerUser.php"?>
    <img src="img/ticket/b4.png" alt="warzone" class="ticket-mlbb-image">
    <h1 style="text-align: center; text-shadow: 5px 5px 5px #27C7C5;">War Zone S2: Gaming Event</h1>
    <br>
    <div class="ticket-mlbb-form">
        <form action="ticket-payment.php">
            <div class="ticket-mlbb-contacttable">
                <h2><i>Contact Information</i></h2>
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
            <input type="submit" value="Pay Now" class="ticket-paynow">
        </form>
    </div>
    <br><br>
    <?php include "footerUser.php"?>  
</body>
</html>