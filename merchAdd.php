<?php
    session_start();
    include "config/config.php";
    $UserID = $_SESSION['UserID'];

    if ($UserID == '') {
        header("location: index.php");
    }
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Add Products</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include "adminHelper.php";
    include "headerAdmin.php"; ?>
    <div class="merchAdmin-header">
        <h1>Add Products</h1>
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

            $sqlCheck = "SELECT MerchID FROM merch_info WHERE MerchID = '$id'";
            $result = mysqli_query($connection, $sqlCheck);
            if (mysqli_num_rows($result) == 1) {
                $chkID = $id;
            } 
            else {
                $chkID = "";
            }

            $error['id'] = checkProdID($id, $chkID);
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
                $sql = "INSERT INTO merch_info (MerchID, MerchPrice, MerchDesc, Material, Color, Style, FitType, Category, Size, MerchQty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
            <table class="addMerch-form-table">
                <tr class="addMerch-form-group">
                    <td><label for="prod-id">Product ID</label></td>
                    <td><input type="text" name="prod-id" id="prod-id" placeholder="E.g M0001"
                            value="<?php echo (isset($id)) ? $id : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-name">Product Name</label></td>
                    <td><input type="text" name="prod-name" id="prod-name" placeholder="E.g Gaming T-Shirt"
                            value="<?php echo (isset($name)) ? $name : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-price">Product Price (RM)</label></td>
                    <td><input type="text" name="prod-price" id="prod-price" placeholder="E.g 50"
                            value="<?php echo (isset($price)) ? $price : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-desc1">Product Material</label></td>
                    <td><input type="text" name="prod-desc1" id="prod-desc1" placeholder="E.g Cotton"
                            value="<?php echo (isset($material)) ? $material : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-desc2">Product Color</label></td>
                    <td><input type="text" name="prod-desc2" id="prod-desc2" placeholder="E.g White"
                            value="<?php echo (isset($color)) ? $color : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-desc3">Product Style</label></td>
                    <td> <input type="text" name="prod-desc3" id="prod-desc3" placeholder="E.g Casual"
                            value="<?php echo (isset($style)) ? $style : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-desc4">Product Fit Type</label></td>
                    <td><input type="text" name="prod-desc4" id="prod-desc4" placeholder="E.g Oversized"
                            value="<?php echo (isset($fitType)) ? $fitType : ""; ?>" /></td>
                </tr>
                <tr class="addMerch-form-group">
                    <td><label for="prod-desc5">Product Quantity</label></td>
                    <td><input type="text" name="prod-desc5" id="prod-desc5" placeholder="E.g 50"
                            value="<?php echo (isset($qty)) ? $qty : ""; ?>" /></td>
                </tr>
            </table>
            <div class="addMerch-form-group-rd">
                    <label for="prod-cat">Product Category</label><br/>
                    <?php 
                    $pCategory = (isset($pCategory))? $pCategory: "";
                    $categoryArray = array('T-Shirt', 'Hoodie/Sweater', 'Hats', 'Totebags');
                    foreach ($categoryArray as $value) {
                        echo '<input type="radio" name="prod-cat" id="' . $value . '" value="' . $value . '"';
                        if ($pCategory == $value) {
                            echo ' checked';
                        } else {
                            echo '';
                        }
                        echo '>';
                        echo '<label for="'.$value.'">' . $value . '</label>';
                    }
                    ?>
                    </div>
                    <div class="addMerch-form-group-rd">
                    <label for="prod-size">Product Size</label><br/>
                    <?php
                    $size = (isset($size))?  $size: "";
                    $sizeArray = array('FreeSize', 'UniSize');
                    foreach ($sizeArray as $value) {
                        echo '<input type="radio" name="prod-size" id="' . $value . '" value="' . $value . '"';
                        if ($size == $value) {
                            echo ' checked';
                        } else {
                            echo '';
                        }
                        echo '>';
                        echo '<label for="'.$value.'">' . $value . '</label>';
                    }
                    ?>
                    </div>
            <div class="addMerch-form-btn">
                <input type="reset"/>
                <input type="submit" value="Add" name="addMerch-form-submit" />
            </div>
        </form>
    </div>
</body>

</html>