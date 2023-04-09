<html>
    <head>
        <meta charset="UTF-8">
        <title>Product</title>
        <link href="css/m2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="logo">
            <img src="img/merch/logo.png" alt="" width="100%"/>
        </div>
        <h1>Product</h1>
        <div class="slide-container">
            <span id="slider-img1"></span>
            <span id="slider-img2"></span>
            <div class="img-container">
                <img src="img/merch/m2-front.jpg" class="slider-img"/>
                <img src="img/merch/m2-back.jpg" class="slider-img"/>
            </div>

        </div>
        <div class="btn-container">
            <a href="#slider-img1" class="slider-btn">◀</a>
            <a href="#slider-img2" class="slider-btn">▶</a>
        </div>
        <div class="product">
            <section class="prod-title">
                <h2>TYPICAL GAMER BASEBALL CAP</h2>
            </section>
            <div class="prod-specs">

                <div class="prod-price">
                    <h3>RM 40</h3>
                </div>
                <div class="prod-details">
                    <p>Specifications<br>Material: Fabric<br>Color: White<br>Style: Trendy<br>Type: Baseball Cap</p>
                </div>
            </div>
            <div class="prod-select">
                <form action="" method="post">
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