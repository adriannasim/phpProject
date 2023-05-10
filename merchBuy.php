<?php
    session_start();
    include ("config/config.php");
    $UserID = "adrianna";
    //$UserID = $_SESSION['UserID'];

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        (isset($_GET["id"])) ? $id = $_GET["id"]: $id = "";
        $sql = "SELECT * FROM merch_info WHERE MerchID = '$id'";
        $result = $connection->query($sql);
        if ($record = $result->fetch_object()) {
            $id = $record->MerchID;
            $name = $record->MerchDesc;
            $price = $record->MerchPrice;
            $material = $record->Material;
            $color = $record->Color;
            $style = $record->Style;
            $fitType = $record->FitType;
            $category = $record->Category;
            $size = $record->Size;
            $qty = $record->MerchQty;
        } else {
            header('Location: merch.php');
        }
    }
    if (isset($_POST['buy'])) {
        $id = ($_POST['id']);
        $buyQty = trim($_POST['qty']);
        //find if user has an existing cart that have not checked out
        $cart = "SELECT CartID FROM cart WHERE UserID = '$UserID' AND checkout = 0";
        $cartFound = mysqli_query($connection, $cart);
        if (mysqli_num_rows($cartFound) > 0) {
            while($row = mysqli_fetch_assoc($cartFound)) {
                // Use existing cart
                $cartID = $row['CartID'];
            }
            //check if user already has the item in cart
            $checkCart = "SELECT MbuyID FROM merch_buy WHERE MerchID = '$id' AND CartID = '$cartID'";
            $merchFound = mysqli_query($connection, $checkCart);
            if (mysqli_num_rows($merchFound) > 0) {
                //product is already in cart
                while($row1 = mysqli_fetch_assoc($merchFound)) {
                    // Use existing cart
                    $MbuyID = $row1['MbuyID'];
                }
                $sql1 = "UPDATE merch_buy SET MbuyQty = MbuyQty + $buyQty WHERE MbuyID = '$MbuyID'";
                $stmt = $connection->prepare($sql1);
                if ($stmt->execute()) {
                    echo "<script>alert('Product added to cart.');
                        window.location = 'merch.php'</script>";
                }
            } else {
                //no existing product in cart
                $sql1 = "INSERT INTO merch_buy (MerchID, CartID, MbuyQty) VALUES (?, ?, ?)";
                $stmt = $connection->prepare($sql1);
                $stmt->bind_param("sss", $id, $cartID, $buyQty);
                if ($stmt->execute()) {
                    echo "<script>alert('Product added to cart.');
                        window.location = 'merch.php'</script>";
                }
            }
        } else {
            // Create new cart 
            $sql1 = "INSERT INTO cart (UserID, checkout) VALUES (?, 0)";
            $stmt = $connection->prepare($sql1);
            $stmt->bind_param("s", $UserID);

            if ($stmt->execute()) {
                $sql2 = "INSERT INTO merch_buy (MerchID, CartID, MbuyQty) VALUES (?, (SELECT CartID FROM cart WHERE UserID = '$UserID' AND checkout = 0), ?)";
                $stmt2 = $connection->prepare($sql2);
                $stmt2->bind_param("ss", $id, $buyQty);
                if ($stmt2->execute()) {
                    echo "<script>alert('Product added to cart.');
                        window.location = 'merch.php'</script>";
                }
            }   
        }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product</title>
        <link href="css/m1.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
        <?php
        include "headerUser.php";
        ?>
        <h1>Product</h1>
        <?php
        printf("
        <div class='slide-container'>
            <span id='slider-img1'></span>
            <span id='slider-img2'></span>
            <div class='img-container'>
                <img src='img/merch/%s.jpg' class='slider-img'/>
                <img src='img/merch/%s-back.jpg' class='slider-img'/>
            </div>
        </div>
        <div class='btn-container'>
            <a href='#slider-img1' class='slider-btn'>◀</a>
            <a href='#slider-img2' class='slider-btn'>▶</a>
        </div>
        <div class='product'>
            <section class='prod-title'>
                <h2>%s</h2>
            </section>
            <div class='prod-specs'>
                <div class='prod-price'>
                    <h3>RM %s</h3>
                </div>
                <div class='prod-details'>
                    <p>Specifications<br>Material: %s<br>Color: %s<br>Style: %s<br>Fit Type: %s </p>
                </div>
            </div>
        ", $id, $id, $name, $price, $material, $color, $style, $fitType);
        ?>
            <div class="prod-select">
                <form action="" method="post">
                <input type="text" name="id" value="<?php echo $id?>" hidden/>
                    <span class="prod-qty">
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty" value="1" min="1" max="30">
                    </span>
                    <div class="prod-btn">
                        <a href="merch.php"><button type="button" class="prodbtn"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Back</button></a>
                        <button type="submit" name="buy" class="prodbtn" id="prodbtn2">Add To Cart&nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i></button>  
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
