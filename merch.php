<html>
    <head>
        <meta charset="UTF-8">
        <title>Merch</title>
        <link href="css/merch.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="logo">
            <img src="img/merch/logo.png" alt="" width="100%"/>
        </div>
        <div class="mbanner">
            <img src="img/merch/merch-banner.png" />
        </div>
        <h1>Merch</h1>
        <div class="merchfeature">
            <table class="merchfunc">
                <tr>
                    <td><a href="cart.php"><button class="cart">Cart</button></a></td>
                     <td><a href="mHistory.php"><button class="history">History</button></a></td>
                    <td><button class="filter" onclick="showHideFilter()">Filter<p>&#9660;</p></button></td>
                </tr>
            </table>
            <section class="hidden">
                <table>
                    <tr>
                        <td><button class="all" >All</button></td>
                        <td><button class="tshirt" >T-Shirt</button></td>
                        <td><button class="hoodie" >Hoodie/Sweater</button></td>
                        <td><button class="hats" >Hats</button></td>
                        <td><button class="totebag" >Tote Bags</button></td>
                    </tr>
                </table>             
            </section>
        </div>
        <div class="merch">
            <div class="content" >
                <img src="img/merch/m1-front.jpg"  alt="" />
                <h3>Gaming Controller T-Shirt</h3>
                <h5>RM 50</h5>
                <a href="m1.php"><button class="buy1">Buy Now</button></a>
            </div>
            <div class="content" >
                <img src="img/merch/m2-front.jpg"  alt="" />
                <h3>Typical Gamer Baseball Cap</h3>
                <h5>RM 40</h5>
                <a href="m2.php"><button class="buy2">Buy Now</button></a>
            </div>
            <div class="content" >
                <img src="img/merch/m3-front.jpg"  alt="" />
                <h3>Saving the World by Levels Tote Bag</h3>
                <h5>RM 35</h5>
                <a href="m3.php"><button class="buy3">Buy Now</button></a>
            </div>
            <div class="content" >
                <img src="img/merch/m4-front.jpg"  alt="" />
                <h3>I Paused My Game Tote Bag</h3>
                <h5>RM 35</h5>
                <a href="m4.php"><button class="buy3">Buy Now</button></a>
            </div>
            <div class="content" >
                <img src="img/merch/m5-back.jpg"  alt="" />
                <h3>Typical Gamer Hoodie</h3>
                <h5>RM 80</h5>
                <a href="m5.php"><button class="buy3">Buy Now</button></a>
            </div>
            <div class="content" >
                <img src="img/merch/m6-front.jpg"  alt="" />
                <h3>Typical Gamer Sweater</h3>
                <h5>RM 75</h5>
                <a href="m6.php"><button class="buy3">Buy Now</button></a>
            </div>
            <div class="content" >
                <img src="img/merch/m7-front.jpg"  alt="" />
                <h3>Hipster T-Shirt</h3>
                <h5>RM 50</h5>
                <a href="m7.php"><button class="buy3">Buy Now</button></a>
            </div>
            <div class="content" >
                <img src="img/merch/m8-front.jpg"  alt="" />
                <h3>Air Force Gaming Baseball Cap</h3>
                <h5>RM 40</h5>
                <a href="m8.php"><button class="buy3">Buy Now</button></a>
            </div>
        </div>
        <script src="merch.js"></script>
    </body>
</html>
