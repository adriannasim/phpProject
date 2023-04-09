<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/ticket.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body> 
<?php include "headerUser.php"?>
    <h2><i>Payment</i></h2>
    <label for="fname">Accepted Cards</label>
                
    <i class="fa fa-cc-visa" style="color:navy;"></i>
    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                
    <label for="cname">Name on Card</label>
    <input type="text" id="cname" name="cardname" placeholder="John More Doe">
    <label for="ccnum">Credit card number</label>
    <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
    <label for="expmonth">Exp Month</label>
    <input type="text" id="expmonth" name="expmonth" placeholder="September">

                
    <label for="expyear">Exp Year</label>
    <input type="text" id="expyear" name="expyear" placeholder="2018">
                
    <label for="cvv">CVV</label>
    <input type="text" id="cvv" name="cvv" placeholder="352">
<?php include "footerUser.php"?>  
</body>
</html>