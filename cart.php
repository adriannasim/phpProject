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
                                <input type="text" name="txtname" maxlength="50" placeholder="Enter your name" required/><br><br>
                            <p>Email Address</p>
                            <input type="email" name="txtemail" placeholder="example@gmail.com" required/><br><br>
                            <p>Phone Number</p>
                            <input type="tel" name="txtphone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{7}" placeholder="E.g: 012-3456789" required/><br><br>
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
                            <button type="submit" class="paybtn" >Confirm Payment</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include "footerUser.php"?>
        <script src="javascripts/payment.js"></script>
    </body>
</html>
