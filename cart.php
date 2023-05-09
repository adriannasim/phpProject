<?php
    session_start();
    include ("config/config.php");
    $UserID = "adrianna";
    //$UserID = $_SESSION['UserID'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping Cart</title>
        <link href="css/cart.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
        <?php include "headerUser.php"?>
        <h1>Cart</h1>
        <div class="controlbtn">
            <a href="merch.php"><button>Back to Merch &#10558;</button></a>
            <a href="mHistory.php"><button id="controlbtn2">Purchase History &#10559;</button></a>
        </div>
        <div class="wrapper">
            <div class="cart-section">
                <div class="cart-details">
                    <?php 
                    $totalqty = 0;
                    $totalamount = 0;
                    //Show Merch
                    $sqlMerch = "SELECT * FROM merch_info mi
                        JOIN merch_buy mb ON mi.MerchID = mb.MerchID
                        JOIN cart c ON mb.CartID = c.CartID
                        WHERE c.UserID = '$UserID' AND c.checkout = 0;";
                    if ($merchResult = $connection -> query($sqlMerch)) {
                        while($merchRec = $merchResult->fetch_object()) {
                            printf("
                                <div class='prod-box'>
                                <img src='img/merch/%s.jpg' alt='alt'/>
                                    <div class='box-content'>
                                        <h3>%s</h3>
                                        <h4>Price: RM %s</h4>
                                        <p class='units'>Quantity: <input type='text' value='%s' disabled>
                                        <form method='post'>
                                        <input type='hidden' name='mbuy_id' value='%s'>
                                        <button type='submit' name='remove' class='remove'>
                                            <i class='fa fa-trash'></i>
                                            <span class='removebtn'>Remove</span>
                                        </button>
                                        </div>
                                        </div>
                                    </form>
                            ",$merchRec->MerchID, $merchRec->MerchDesc, $merchRec->MerchPrice, $merchRec->MbuyQty, $merchRec->MbuyID);
                            $totalqty += $merchRec->MbuyQty;
                            $totalamount += $merchRec->MbuyQty * $merchRec->MerchPrice;

                            //get cartID
                            $CartID = $merchRec->CartID;
                        }
                    }
                    //remove button
                    if (isset($_POST['remove'])) {
                        $MerchBuyID = $_POST['mbuy_id'];
                        $sqlRemove = "DELETE FROM merch_buy WHERE MbuyID = '$MerchBuyID';";
                        if (($connection->prepare($sqlRemove))->execute()) {
                            echo "<script>alert('Item Removed');
                                window.location = 'cart.php'</script>";
                        }
                    }
                    
                    //Show Ticket
                    $sqlTicket = "SELECT * FROM ticket_info ti
                        JOIN ticket_buy tb ON ti.TicketID = tb.TicketID
                        JOIN event e ON ti.EventID = e.EventID
                        JOIN cart c ON tb.CartID = c.CartID
                        WHERE c.UserID = '$UserID' AND c.checkout = 0;";
                    if ($ticketResult = $connection -> query($sqlTicket)) {
                        while($ticketRec = $ticketResult->fetch_object()) {
                            printf("
                                <div class='prod-box'>
                                    <div class='box-content'>
                                        <h3>Ticket: %s</h3>
                                        <h4>Price: RM %s</h4>
                                        <p class='units'>Quantity: <input type='text' value='%s' disabled>
                                        <form method='post'>
                                        <input type='hidden' name='mbuy_id' value='%s'>
                                        <button type='submit' name='remove' class='remove'>
                                            <i class='fa fa-trash'></i>
                                            <span class='removebtn'>Remove</span>
                                        </button>
                                        </div>
                                        </div>
                                    </form>
                            ", $ticketRec->EventName, $ticketRec->TicketPrice, $ticketRec->TbuyQty, $ticketRec->TbuyID);
                            $totalqty += $ticketRec->TbuyQty;
                            $totalamount += $ticketRec->TbuyQty * $ticketRec->TicketPrice;
                        }
                    }
                    //remove button
                    if (isset($_POST['remove'])) {
                        $MerchBuyID = $_POST['mbuy_id'];
                        $sqlRemove = "DELETE FROM merch_buy WHERE MbuyID = '$MerchBuyID';";
                        if (($connection->prepare($sqlRemove))->execute()) {
                            echo "<script>alert('Item Removed');
                                window.location = 'cart.php'</script>";
                        }
                    }
                    ?>
                </div>
                <div class="side-bar">
                    <h3>Receipt Summary</h3>
                    <hr>
                    <p><span>Total Items (QTY)</span><br><input type="text" name="itemUnit" value="<?php echo $totalqty ?>" disabled></p>
                    <hr>
                    <p><span>Total Amount (RM)</span><br><input type="text" name="subtotal" value="<?php echo $totalamount ?>" disabled></p>
                    <hr>
                    <a href="#payment"><button class="checkout" onclick="showHidePayment()">Check Out</button></a>
                </div>
            </div>
        </div>
        <div class="hide-payment">
        <?php
            $sqlPayment = "SELECT * FROM user u
                WHERE u.UserID = '$UserID';";
            if ($paymentResult = $connection -> query($sqlPayment)) {
                while($paymentRec = $paymentResult->fetch_object()) {
                    $name = $paymentRec->Name;
                    $email = $paymentRec->Email;
                    $tel = $paymentRec->Tel;
                }
            }
        ?>
            <h3 id="payment">Billing and Payment</h3>
            <div class="hidden-payment">
                <div class="payment-details">
                    <form action="" method="post">
                        <div class="contact-details">
                            <p>Name<p>
                                <input type="text" name="txtname" maxlength="50" placeholder="Enter your name" value="<?php echo $name ?>" required/><br><br>
                            <p>Email Address</p>
                            <input type="email" name="txtemail" placeholder="example@gmail.com" value="<?php echo $email ?>" required/><br><br>
                            <p>Phone Number</p>
                            <input type="tel" name="txtphone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{7}" placeholder="E.g: 012-3456789" value="<?php echo $tel ?>" required/><br><br>
                        </div>
                        <h4>Select payment method</h4>
                        <div class="payment-img">
                            <input type="radio" name="rbpayment" value="mastercard" checked><img src="img/merch/mastercard.png"></label>
                            <input type="radio" name="rbpayment" value="visa"><img src="img/merch/visa.png">
                            <input type="radio" name="rbpayment" value="paypal"><img src="img/merch/paypal.png">
                            <input type="radio" name="rbpayment" value="amex"><img src="img/merch/amex.png">
                        </div>
                        <div class="card-details">
                            <p>Card Owner</p>
                            <input type="text" name="txtowner" maxlength="50" placeholder="Name on card" required/>
                            <p>Card Number</p>
                            <input type="text" name="txtcardnum" maxlength="19" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" placeholder="1111-1111-1111-1111" required/>
                            <p>Exp Month</p>
                            <select name="by-month" class="expdate">
                        <option selected="selected" disabled>By Month</option>
                        <option>Jan</option>
                        <option>Feb</option>
                        <option>Mar</option>
                        <option>Apr</option>
                        <option>May</option>
                        <option>Jun</option>
                        <option>Jul</option>
                        <option>Aug</option>
                        <option>Sep</option>
                        <option>Oct</option>
                        <option>Nov</option>
                        <option>Dec</option>
                    </select>
                            <p>Exp Year</p>
                            <select name="by-year" class="expdate">
                        <option selected="selected" disabled>By Year</option>
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                        <option>2026</option>
                    </select>
                            <p>CVV</p>
                            <input type="password" name="txtcvv" maxlength="3" placeholder="CVV" required/>
                        </div>
                        <div class="pay-btn">
                            <button type="submit" name="payment" class="paybtn" >Confirm Payment</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include "footerUser.php"?>
        <script src="javascripts/payment.js"></script>
    </body>
</html>
<?php
   if (isset($_POST['payment'])) {
    $PaymentMethod = $_POST['rbpayment'];
    $sqlPayment = "UPDATE user u JOIN cart c 
        SET u.PaymentID = (SELECT PaymentID FROM payment WHERE PaymentType = '$PaymentMethod'),
            c.checkout = 1 
            WHERE u.UserID = '$UserID';";
    $sqlPayment2 = "INSERT INTO purchase (UserID, CartID, Status) VALUES ('$UserID', $CartID, 'Processing');";

    if (($connection->prepare($sqlPayment))->execute()) {
        if (($connection->prepare($sqlPayment2))->execute()) {
            echo "<script>alert('Order Received. Please check your purchase history for updates.');
                window.location = 'mHistory.php'</script>";
        }
    }
}
?>