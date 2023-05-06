<html>

<head>
    <meta charset="UTF-8">
    <title>Merch Admin</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include "adminHelper.php"; include "headerAdmin.php"; ?>
    <div class="merchAdmin-header">
        <h1>Merch Admin</h1>
    </div>
    <table class="merchfunc-admin">
        <tr>
            <td><a href="merchAdd.php"><button class="merch-add">Add Products</button></a></td>
            <td><a href="merchView.php"><button class="merch-view">View Orders</button></a></td>
        </tr>
    </table>
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
            if (isset($_FILES['prod-imgfile'])) {
                $file = $_FILES('prod-imgfile');
                if ($file['error'] > 0) {
                    switch ($file['error']) {
                        case UPLOAD_ERR_NO_FILE:
                            $error = "⚠ Please upload the product image";
                            break;
                        case UPLOAD_ERR_FORM_SIZE:
                            $error = "⚠ File uploaded is too large. Maximum 1MB allowed!";
                            break;
                        default:
                            $error = "⚠ There is an error when uploading the file!";
                            break;
                    }
                } else if ($file['size'] > 1048576) {
                    $error = "⚠ File uploaded is too large. Max 1MB allowed!";
                } else {
                    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                    if (
                        $ext != 'jpg' &&
                        $ext != 'jpeg' &&
                        $ext != 'gif' &&
                        $ext != 'png'
                    ) {
                        $error = "⚠ Only JPG, JPEG, GIF and PNG images are allowed";
                    } else {
                        $newFileName = uniqid() . '.' . $ext;
                        move_uploaded_file($file['tmp_name'], 'uploads/' . $newFileName);
                    }
                }
            }
            $error = array();
            $error['id'] = checkProdID($id);
            $error['name'] = checkProdName($name);
            $error['price'] = checkProdPrice($price);
            $error['material'] = checkProdMaterial($material);
            $error['color'] = checkProdColor($color);
            $error['style'] = checkProdStyle($style);
            $error['fitType'] = checkProdFittype($fitType);
            $error['pCategory'] = checkProdCategory($pCategory);
            $error['size'] = checkProdSize($size);

            if ((empty($error))) {
                echo "<div class='addMerch-form-success'>";
                printf("<p>
                                Product Added Successfully !
                                </p>");
                echo "</div>";
            } else {
                echo "<div class='addMerch-form-error'>";
                printf("<p>
                                %s
                                </p>", implode("</p><p>", $error));
                echo "</div>";
            }
        }
        ?>
        <form action="" method="post" >
            <h2>Add Products</h2>
            <div class="addMerch-form-group">
                <label for="prod-id">Product ID</label>
                <input type="text" name="prod-id" id="prod-id" placeholder="E.g P0001" value="<?php echo (isset($id))? $id: "";?>"/>
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
            <div class="addMerch-form-group-file">
                <label for="prod-imgfile">Insert Product Image</label><br />
                <input type="file" name="prod-imgfile" id="prod-imgfile"  />
                <input type="hidden" name="MAX_FILE SIZE" value="1048576" />
            </div>
            <div class="addMerch-form-btn">
                <input type="reset" onclick="location = 'merchAdd.php'"/>
                <input type="submit" value="Add" name="addMerch-form-submit" />
            </div>
        </form>
    </div>
</body>

</html>