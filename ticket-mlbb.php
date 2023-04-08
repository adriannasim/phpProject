<!DOCTYPE html>
<html>
<head>
    <title>MLBB Tournament Registration Form</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="ticket.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body> 
    <?php include "headerUser.php"?>
    <br>
    <img src="img/ticket/b2.png" alt="MLBB" class="ticket-mlbb-image">
    <h1 style="text-align: center; text-shadow: 5px 5px 5px #27C7C5;">MLBB Tournament - Grand Finale</h1>
    
    <br>
    <div class="ticket-mlbb-form">
    <form>
    <div class="ticket-mlbb-table">
    <table>
        <tr>
            <td><label for="name"><i class="fa fa-user"> Full Name:</label></td>
            <td><input type="text" id="name" name="name" placeholder="Enter your name" size="50" required></td>
        </tr>
        <tr>
            <td><label for="email"><i class="fa fa-envelope"> Email:</label></td>
            <td><input type="email" id="email" name="email" placeholder="Enter your email address" size="50" required> <br><small>Format: example@example.com</small></td>
        </tr>
        <tr>
            <td><label for="phone"><i class="fa fa-phone"></i> Contact Number:</label></td>
            <td><input type="tel" id="phone" name="phone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{7}" placeholder="Enter your phone number" size="50" required> <br><small>Format: 012-3456789</small></td>
        </tr>
        <tr>
            <td>Choose your seat</td>
        </tr>
    </table>
    </div>
    <input type="submit" value="Register">
    </form>
    </div>
    <br>
    <?php include "footerUser.php"?>  
</body>
</html>