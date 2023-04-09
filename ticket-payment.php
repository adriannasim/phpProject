<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="css/ticket.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body> 
<?php include "headerUser.php"?>
            <br>
            <h1 style="text-align: center; text-shadow: 5px 5px 5px #27C7C5;">Billing and Payment</h1>
            <br>
                <div class="ticket-payment">
                    <form action="" method="post">
                        <div class="contact-details">
                            <br>
                            <p>Name:<p>
                            <input type="text" id="name" name="name" placeholder="  Enter your name" size="50" style="height:40px" required><br><br>
                            <p>Email Address:</p>
                            <input type="email" id="email" name="email" placeholder="  eg. example@example.com" size="50" style="height:40px" required> <br><br>
                            <p>Phone Number:</p>
                            <input type="tel" id="phone" name="phone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{7}" placeholder="  eg. 012-3456789" size="50" style="height:40px" required><br><br>
                        </div>
                        <hr>
                        <p>Select payment method</p>
                        <div class="paymentmethod">
                            <input type="radio" id="mastercard" name="method" value="mastercard" required>
                            <label for="mastercard"><img src="img/merch/mastercard.png"></label>
                            <input type="radio" id="visa" name="method" value="visa">
                            <label for="visa"><img src="img/merch/visa.png"></label>
                            <input type="radio" id="paypal" name="method" value="paypal">
                            <label for="paypal"><img src="img/merch/paypal.png"></label>
                            <input type="radio" id="amex" name="method" value="amex">
                            <label for="amex"><img src="img/merch/amex.png"></label>
                        </div>
                        <br><hr>
                        <div class="carddetails">
                            <p>Card Owner:</p>
                            <input type="text" name="txtowner" placeholder="  Name on card" size="50" style="height:40px" required/>
                            <p>Card Number:</p>
                            <input type="text" name="txtcardnum" placeholder="  1111-1111-1111-1111" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" size="50" style="height:40px" required/>
                            <p>Exp Month:</p>
                            <input type="text" name="txtexpmonth" placeholder="  e.g Jan" size="50" style="height:40px" required/>
                            <p>Exp Year:</p>
                            <input type="text" name="txtexpyear" placeholder="  e.g 2024" size="50" style="height:40px" required/>
                            <p>CVV:</p>
                            <input type="password" name="txtcvv" placeholder="  CVV" pattern="[0-9]{3}" size="50" style="height:40px" required/>
                        </div>
                        <br><br>
                            <button type="submit" class="ticket-confirmPayment" >Confirm Payment</button> 
                        <br><br><br>
                    </form>
                </div>
                <br><br>
        <?php include "footerUser.php"?> 
</body>
</html>