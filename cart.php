<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping Cart</title>
        <link href="css/cart.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
        <div class="logo">
            <img src="img/merch/logo.png" alt="" width="100%"/>
        </div>
        <h1>Cart</h1>
        <div class="controlbtn">
            <a href="merch.php"><button>Back to Merch &#10558;</button></a>
            <a href="mHistory.php"><button id="controlbtn2">Purchase History &#10559;</button></a>
        </div>
        <div class="wrapper">
            <div class="cart-section">
                <div class="cart-details">
                    <div class="prod-box">
                        <img src="img/merch/m1-front.jpg" alt="alt"/>
                        <div class="box-content">
                            <h3>Gaming Controller T-Shirt</h3>
                            <h4>Price: RM 50</h4>
                            <p class="units">Quantity: <input type="text" disabled> <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i></p>
                            <button class="remove"><i class="fa fa-trash"></i>
                                <span class="removebtn">Remove</span></button>
                        </div>
                    </div>
                    <div class="prod-box">
                        <img src="img/merch/m2-front.jpg" alt="alt"/>
                        <div class="box-content">
                            <h3>Typical Gamer Baseball Cap</h3>
                            <h4>Price: RM 40</h4>
                            <p class="units">Quantity: <input type="text" disabled> <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i></p>
                            <button class="remove"><i class="fa fa-trash"></i>
                                <span class="removebtn">Remove</span></button>
                        </div>
                    </div>
                    <div class="prod-box">
                        <img src="img/merch/m3-front.jpg" alt="alt"/>
                        <div class="box-content">
                            <h3>Saving the World by Levels Tote Bag</h3>
                            <h4>Price: RM 35</h4>
                            <p class="units">Quantity: <input type="text" disabled> <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i></p>
                            <button class="remove"><i class="fa fa-trash"></i>
                                <span class="removebtn">Remove</span></button>
                        </div>
                    </div>
                    <div class="prod-box">
                        <img src="img/merch/m4-front.jpg" alt="alt"/>
                        <div class="box-content">
                            <h3>I Paused My Game Tote Bag</h3>
                            <h4>Price: RM 35</h4>
                            <p class="units">Quantity: <input type="text" disabled> <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i></p>
                            <button class="remove"><i class="fa fa-trash"></i>
                                <span class="removebtn">Remove</span></button>
                        </div>
                    </div>
                    <div class="prod-box">
                        <img src="img/merch/m5-back.jpg" alt="alt"/>
                        <div class="box-content">
                            <h3>Typical Gamer Hoodie</h3>
                            <h4>Price: RM 80</h4>
                            <p class="units">Quantity: <input type="text" disabled> <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i></p>
                            <button class="remove"><i class="fa fa-trash"></i>
                                <span class="removebtn">Remove</span></button>
                        </div>
                    </div>
                    <div class="prod-box">
                        <img src="img/merch/m6-front.jpg" alt="alt"/>
                        <div class="box-content">
                            <h3>Typical Gamer Sweater</h3>
                            <h4>Price: RM 75</h4>
                            <p class="units">Quantity: <input type="text" disabled> <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i></p>
                            <button class="remove"><i class="fa fa-trash"></i>
                                <span class="removebtn">Remove</span></button>
                        </div>
                    </div>
                    <div class="prod-box">
                        <img src="img/merch/m7-front.jpg" alt="alt"/>
                        <div class="box-content">
                            <h3>Hipster T-Shirt</h3>
                            <h4>Price: RM 50</h4>
                            <p class="units">Quantity: <input type="text" disabled> <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i></p>
                            <button class="remove"><i class="fa fa-trash"></i>
                                <span class="removebtn">Remove</span></button>
                        </div>
                    </div>
                    <div class="prod-box">
                        <img src="img/merch/m8-front.jpg" alt="alt"/>
                        <div class="box-content">
                            <h3>Air Force Gaming Baseball Cap</h3>
                            <h4>Price: RM 40</h4>
                            <p class="units">Quantity: <input type="text" disabled> <i class="fa fa-plus-square"></i> <i class="fa fa-minus-square"></i></p>
                            <button class="remove"><i class="fa fa-trash"></i>
                                <span class="removebtn">Remove</span></button>
                        </div>
                    </div>
                </div>
                <div class="side-bar">
                    <h3>Receipt Summary</h3>
                    <hr>
                    <p><span>Total Items (QTY)</span><br><input type="text" name="itemUnit" disabled></p>
                    <hr>
                    <p><span>Total Amount (RM)</span><br><input type="text" name="subtotal" disabled></p>
                    <hr>
                    <a href="#payment"><button class="checkout" onclick="showHidePayment()">Check Out</button></a>
                </div>
            </div>
        </div>
        <div class="hide-payment">
            <h3 id="payment">Billing and Payment</h3>
            <div class="hidden-payment">
                <div class="payment-details">
                    <form action="" method="post">
                        <div class="contact-details">
                            <p>Name<p>
                                <input type="text" name="txtname" size="50" placeholder="Enter your name" /><br><br>
                            <p>Email Address</p>
                            <input type="text" name="txtemail" placeholder="example@gmail.com"/><br><br>
                            <p>Phone Number</p>
                            <input type="text" name="txtphone" placeholder="E.g: 012-3456789"/><br><br>
                        </div>
                        <h4>Select payment method</h4>
                        <div class="payment-img">
                            <img src="img/merch/mastercard.png">
                            <img src="img/merch/visa.png">
                            <img src="img/merch/paypal.png">
                            <img src="img/merch/amex.png">
                        </div>
                        <div class="card-details">
                            <p>Card Owner</p>
                            <input type="text" name="txtowner" placeholder="Name on card"/>
                            <p>Card Number</p>
                            <input type="text" name="txtcardnum" placeholder="1111-1111-1111-1111" />
                            <p>Exp Month</p>
                            <input type="text" name="txtexpmonth" placeholder="e.g Jan" />
                            <p>Exp Year</p>
                            <input type="text" name="txtexpyear" placeholder="e.g 2024" />
                            <p>CVV</p>
                            <input type="password" name="txtcvv" placeholder="CVV" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="pay-btn">
                <button type="submit" class="paybtn">Confirm Payment</button>
            </div>
        </div>
        <script src="javascripts/payment.js"></script>
    </body>
</html>
