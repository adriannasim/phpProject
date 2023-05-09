<?php 
    session_start();
    include ("config/config.php");
    $UserID = "admin";
    //$UserID = $_SESSION['UserID'];
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Events</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    include "adminHelper.php";
    include "headerAdmin.php";
    global $hideForm;
    ?>

    <div class="edit-header">
        <h1>Edit Events</h1>
    </div>
    <div class="editEvent-form">
        <?php
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
                $qty = $record->MerchQty;
                $hideForm = false;
            } else {
                echo "<div class='error'>Record not found !<a href='merchManage.php'>Back to Manage Merch</a></div>";
                $hideForm = true;
            }
        }    
        if(!empty($_POST)){
            $id = trim($_POST["id"]);
            $name = trim($_POST["name"]);
            $price = trim($_POST["price"]);
            $material = trim($_POST["material"]);
            $color = trim($_POST["color"]);
            $style = trim($_POST["style"]);
            $fitType = trim($_POST["fittype"]);
            $qty = trim($_POST["qty"]);

            $error = array();
            $error['name'] = checkProdName($name);
            $error['price'] = checkProdPrice($price);
            $error['material'] = checkProdMaterial($material);
            $error['color'] = checkProdColor($color);
            $error['style'] = checkProdStyle($style);
            $error['fitType'] = checkProdFittype($fitType);
            $error['pCategory'] = checkProdCategory($pCategory);
            $error['size'] = checkProdSize($size);
            $error = array_filter($error);
            if (empty($error)) {
                $sql = "UPDATE merch_info SET MerchPrice = ?, MerchDesc = ?, Material = ?, Color = ?, Style = ?, FitType = ?, MerchQty = ? WHERE MerchID = ?";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("ssssssss", $price, $name, $material, $color, $style, $fitType, $qty, $id);
                if ($stmt->execute()) {
                    echo "<script>alert('Merch Data Updated !');
                            window.location.href = 'merchManage.php';
                        </script>";
                } else {
                    echo '<ul class="error">';
                    printf("<li>%s</li>", implode("<li></li>", $error));
                    echo '</ul>';
                }
            }
        }
        ?>
        <?php if ($hideForm == false) : ?>
        <form action="" method="post">
            <div class="edit-form">
                <table class="edit-form-table">
                <div class="addMerch-form-group">
                <label for="prod-id">Product ID</label>
                <input type="text" name="prod-id" id="prod-id" value="<?php echo (isset($id))? $id: "";?>"/>
            </div>
            <div class="addMerch-form-group">
                <label for="prod-name">Product Name</label>
                <input type="text" name="prod-name" id="prod-name" value="<?php echo (isset($name))? $name: "";?>" />
            </div>
            <div class="addMerch-form-group">
                <label for="prod-price">Product Price (RM)</label>
                <input type="text" name="prod-price" id="prod-price"  placeholder="E.g 50" value="<?php echo (isset($price))? $price: "";?>"/>
            </div>
            <div class="addMerch-form-group">
                <label for="prod-desc1">Product Material</label>
                <input type="text" name="prod-desc1" id="prod-desc1" placeholder="E.g cotton" value="<?php echo (isset($material))? $material: "";?>" />
            </div>
            <div class="addMerch-form-group">
                <label for="prod-desc2">Product Color</label>
                <input type="text" name="prod-desc2" id="prod-desc2" placeholder="E.g white" value="<?php echo (isset($color))? $color: "";?>" />
            </div>
            <div class="addMerch-form-group">
                <label for="prod-desc3">Product Style</label>
                <input type="text" name="prod-desc3" id="prod-desc3" placeholder="E.g casual" value="<?php echo (isset($style))? $style: "";?>" />
            </div>
            <div class="addMerch-form-group">
                <label for="prod-desc4">Product Fit Type</label>
                <input type="text" name="prod-desc4" id="prod-desc4" placeholder="E.g oversized" value="<?php echo (isset($fitType))? $fitType: "";?>" />
            </div>
            <div class="addMerch-form-group-rd">
                <label for="prod-cat">Product Category</label>
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
                <label for="prod-size">Product Size</label>
                <input type="radio" name="prod-size" id="freesize" value="FreeSize" />
                <label for="freesize">Free Size</label>
                <input type="radio" name="prod-size" id="unisize" value="Unisize" />
                <label for="unisize">Unisize (S-XL)</label><br />
            </div>
                </table>
                <div class="edit-form-btn">
                    <input type="button" value="Cancel" onclick="location = 'eventManage.php'">
                    <input type="submit" value="Submit" name="edit-form-submit">
                </div>
            </div>
        </form>
        <?php endif;  ?>
        <div>

</body>

</html>