<?php
session_start();
include("config/config.php");
$UserID = "admin";
//$UserID = $_SESSION['UserID'];
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Merch Admin</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include "adminHelper.php";
    include "headerAdmin.php"; ?>
    <div class="merchAdmin-header">
        <h1>Merch Admin</h1>
    </div>
    <div class="merchfunc-admin">
        <a href="merchAdd.php"><button class="merch-add">Add Products</button></a>
        <a href="merchManage.php"><button class="merch-manage">Manage Products</button></a>
        <a href="merchView.php"><button class="merch-view">View Orders</button></a>
    </div>
    <div class="addMerch-form">
        <?php
        if (!empty($_POST)) {
            $id = trim($_POST['prod-id']);
            $name = trim($_POST['prod-name']);
            $price = trim($_POST['prod-price']);
            $material = trim($_POST['prod-desc1']);
            $color = trim($_POST['prod-desc2']);
            $style = trim($_POST['prod-desc3']);
            $fitType = trim($_POST['prod-desc4']);
            $qty = trim($_POST['prod-desc5']);
            if (isset($_POST['prod-cat'])) {
                $pCategory = trim($_POST['prod-cat']);
            } else {
                $pCategory = "";
            }
            if (isset($_POST['prod-size'])) {
                $size = trim($_POST['prod-size']);
            } else {
                $size = "";
            }
            $error = array();
            $error['id'] = checkProdID($id);
            $error['name'] = checkProdName($name);
            $error['price'] = checkProdPrice($price);
            $error['material'] = checkProdMaterial($material);
            $error['color'] = checkProdColor($color);
            $error['style'] = checkProdStyle($style);
            $error['fitType'] = checkProdFittype($fitType);
            $error['qty'] = checkProdQty($qty);
            $error['pCategory'] = checkProdCategory($pCategory);
            $error['size'] = checkProdSize($size);
            $error = array_filter($error);

            if ((empty($error))) {
                $sql = "INSERT INTO products (MerchID, MerchPrice, MerchDesc, Material, Color, Style, FitType, Category, Size, MerchQty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("ssssssssss", $id, $price, $name, $material, $color, $style, $fitType, $pCategory, $size, $qty);
                if ($stmt->execute()) {
                    echo "<div class='addMerch-form-success'>";
                    printf("<p>Product Added Successfully !</p>");
                    echo "</div>";
                }
            } else {
                    echo "<div class='addMerch-form-error'>";
                    printf("<p>%s </p>", implode("</p><p>", $error));
                    echo "</div>";
            }
        }
        ?>
        <form action="" method="post">
            <h2>Add Products</h2>
            <table class="addMerch-form-table">
                <tr class="addMerch-form-group">
                    <td><label for="prod-id">Product ID</label></td>
                    <td><input type="text" name="prod-id" id="prod-id" placeholder="E.g M0001"
                            value="<?php echo (isset($id)) ? $id : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-name">Product Name</label></td>
                    <td><input type="text" name="prod-name" id="prod-name"
                            value="<?php echo (isset($name)) ? $name : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-price">Product Price (RM)</label></td>
                    <td><input type="text" name="prod-price" id="prod-price" placeholder="E.g 50"
                            value="<?php echo (isset($price)) ? $price : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-desc1">Product Material</label></td>
                    <td><input type="text" name="prod-desc1" id="prod-desc1" placeholder="E.g cotton"
                            value="<?php echo (isset($material)) ? $material : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-desc2">Product Color</label></td>
                    <td><input type="text" name="prod-desc2" id="prod-desc2" placeholder="E.g white"
                            value="<?php echo (isset($color)) ? $color : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-desc3">Product Style</label></td>
                    <td> <input type="text" name="prod-desc3" id="prod-desc3" placeholder="E.g casual"
                            value="<?php echo (isset($style)) ? $style : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-desc4">Product Fit Type</label></td>
                    <td><input type="text" name="prod-desc4" id="prod-desc4" placeholder="E.g oversized"
                            value="<?php echo (isset($fitType)) ? $fitType : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-desc5">Product Quantity</label></td>
                    <td><input type="text" name="prod-desc5" id="prod-desc5" placeholder="E.g 50"
                            value="<?php echo (isset($qty)) ? $qty : ""; ?>" /></td>
                </tr>
            </table>
            <div class="addMerch-form-group-rd">
                <label for="prod-cat">Product Category</label><br>
                <input type="radio" name="prod-cat" id="tshirt" value="T-Shirt">
                <label for="tshirt">T-Shirt</label>
                <input type="radio" name="prod-cat" id="hoodie" value="Hoodie/Sweater">
                <label for="hoodie">Hoodie/Sweater</label>
                <input type="radio" name="prod-cat" id="hats" value="Hats">
                <label for="hats">Hats</label>
                <input type="radio" name="prod-cat" id="totebags" value="Totebags">
                <label for="totebags">Totebags</label><br />
            </div>
            <div class="addMerch-form-group-rd">
                <label for="prod-size">Product Size</label><br>
                <input type="radio" name="prod-size" id="freesize" value="FreeSize" />
                <label for="freesize">Free Size</label>
                <input type="radio" name="prod-size" id="unisize" value="UniSize" />
                <label for="unisize">Unisize (S-XL)</label><br />
            </div>
            <div class="addMerch-form-btn">
                <input type="reset" onclick="location = 'merchAdd.php'" />
                <input type="submit" value="Add" name="addMerch-form-submit" />
            </div>
        </form>
    </div>
</body>

</html>