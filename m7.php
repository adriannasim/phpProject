<html>
    <head>
        <meta charset="UTF-8">
        <title>Product</title>
        <link href="css/m1.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="logo">
            <img src="img/logo.png" alt="" width="100%"/>
        </div>
        <h1>Product</h1>
        <div class="slide-container">
            <span id="slider-img1"></span>
            <span id="slider-img2"></span>
            <div class="img-container">
                <img src="img/m7-front.jpg" class="slider-img" width="50%"/>
                <img src="img/m7-back.jpg" class="slider-img" width="50%"/>
            </div>

        </div>
        <div class="btn-container">
            <a href="#slider-img1" class="slider-btn">◀</a>
            <a href="#slider-img2" class="slider-btn">▶</a>
        </div>
        <div class="product">
            <section class="prod-title">
                <h2>HIPSTER T-SHIRT</h2>
            </section>
            <div class="prod-specs">

                <div class="prod-price">
                    <h3>RM 50</h3>
                </div>
                <div class="prod-details">
                    <p>Specifications<br>Material: Cotton<br>Color: Black<br>Style: Casual<br>Fit Type: Regular Fit </p>
                </div>
            </div>
            <div class="prod-select">
                <div class="select-size">
                    <h4>Please select your size</h4>
                </div>

                <form action="" method="post">
                    <div class="size-btn">
                        <button class="size">S</button>
                        <button class="size">M</button>
                        <button class="size">L</button>
                        <button class="size">XL</button><br/><br/>
                    </div>
                    <span class="prod-qty">
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty" value="1" min="1" max="30">
                    </span>
                </form>

            </div>
            <div class="prod-btn">
                <a href="merch.php"><button type="button" class="prodbtn" >&#8678; Back </button></a>
                <button type="button" class="prodbtn" >Add To Cart &#128722;</button>  
            </div>
        </div>
    </body>
</html>