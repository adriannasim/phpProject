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
    <title>Edit Merch</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    include "adminHelper.php";
    include "headerAdmin.php";
    global $hideForm;
    ?>

    <div class="edit-header">
        <h1>Edit Merch</h1>
    </div>
    <div class="editEvent-form">
        <form action="" method="post">
            <div class="edit-form">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            (isset($_GET["id"])) ? $id = $_GET["id"] : $id = "";

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
                $hideForm = false;
            } else {
                echo "<div class='error'>Record not found !<a href='merchManage.php'>Back to Manage Merch</a></div>";
                $hideForm = true;
            }
        }
        if (!empty($_POST)) {
            $id = trim($_POST["hiddenid"]);
            $name = trim($_POST["name"]);
            $price = trim($_POST["price"]);
            $material = trim($_POST["material"]);
            $color = trim($_POST["color"]);
            $style = trim($_POST["style"]);
            $fitType = trim($_POST["fitType"]);
            $category = trim($_POST["category"]);
            $size = trim($_POST["size"]);
            $qty = trim($_POST["qty"]);

            $error = array();
            $error['name'] = checkProdName($name);
            $error['price'] = checkProdPrice($price);
            $error['material'] = checkProdMaterial($material);
            $error['color'] = checkProdColor($color);
            $error['style'] = checkProdStyle($style);
            $error['fitType'] = checkProdFittype($fitType);
            $error['category'] = checkProdCategory($category);
            $error['size'] = checkProdSize($size);
            $error['qty'] = checkProdQty($qty);
            $error = array_filter($error);
            if (empty($error)) {
                $sql = "UPDATE merch_info SET MerchPrice = ?, MerchDesc = ?, Material = ?, Color = ?, Style = ?, FitType = ?, Category = ?, Size = ?, MerchQty = ? WHERE MerchID = ?";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("ssssssssss", $price, $name, $material, $color, $style, $fitType, $category, $size, $qty, $id);
                if ($stmt->execute()) {
                    echo "<script>alert('Merch Data Updated !');
                            window.location.href = 'merchManage.php';
                        </script>";
                }
            } else {
                echo '<ul class="error">';
                printf("<li>%s</li>", implode("<li></li>", $error));
                echo '</ul>';
            }
        }
        ?>
        <?php if ($hideForm == false): ?>
            
                
                    <table class="edit-form-table">
                        <tr class="addMerch-form-group">
                            <td><label for="prod-id">Product ID</label></td>
                            <input type="text" name="hiddenid" id="hiddenid" value="<?php echo $id; ?>" hidden />
                            <td><input type="text" name="id" id="id" value="<?php echo $id; ?>" disabled /></td>
                        </tr>
                        <tr class="addMerch-form-group">
                            <td><label for="prod-name">Product Name</label></td>
                            <td><input type="text" name="name" id="name" value="<?php echo $name; ?>" /></td>
                        </tr>
                        <tr class="addMerch-form-group">
                            <td><label for="prod-price">Product Price (RM)</label></td>
                            <td><input type="text" name="price" id="price" value="<?php echo $price; ?>" /></td>
                        </tr>
                        <tr class="addMerch-form-group">
                            <td><label for="prod-desc1">Product Material</label></td>
                            <td><input type="text" name="material" id="material" value="<?php echo $material; ?>" /></td>
                        </tr>
                        <tr class="addMerch-form-group">
                            <td><label for="prod-desc2">Product Color</label></td>
                            <td><input type="text" name="color" id="color" value="<?php echo $color; ?>" /></td>
                        </tr>
                        <tr class="addMerch-form-group">
                            <td><label for="prod-desc3">Product Style</label></td>
                            <td><input type="text" name="style" id="style" value="<?php echo $style; ?>" /></td>
                        </tr>
                        <tr class="addMerch-form-group">
                            <td><label for="prod-desc4">Product Fit Type</label></td>
                            <td><input type="text" name="fitType" id="fitType" value="<?php echo $fitType; ?>" /></td>
                        </tr>
                        <tr class="addMerch-form-group">
                            <td><label for="prod-desc4">Product Quantity</label></td>
                            <td><input type="text" name="qty" id="qty" value="<?php echo $qty; ?>" /></td>
                        </tr>
                    </table>
                    <div class="addMerch-form-group-rd">
                    <label for="prod-desc4">Product Category</label><br/>
                    <?php 
                    $category = (isset($category))? $category: "";
                    $categoryArray = array('T-Shirt', 'Hoodie/Sweater', 'Hats', 'Totebags');
                    $sizeArray = array('FreeSize', 'UniSize');
                    foreach ($categoryArray as $value) {
                        echo '<input type="radio" name="category" id="' . $value . '" value="' . $value . '"';
                        if ($category == $value) {
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
                    <label for="prod-desc4">Product Size</label><br/>
                    <?php
                    $size = (isset($size))?  $size: "";
                    foreach ($sizeArray as $value) {
                        echo '<input type="radio" name="size" id="' . $value . '" value="' . $value . '"';
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

                    <div class="edit-form-btn">
                        <input type="button" value="Cancel" onclick="location = 'merchManage.php'">
                        <input type="submit" value="Submit" name="edit-form-submit">
                    </div>
                </div>

        </div>
        </form>
    <?php endif; ?>
</body>

</html>