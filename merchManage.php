<html>

<head>
    <meta charset="UTF-8">
    <title>Merch Admin</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php include "adminHelper.php"; include "headerAdmin.php"; ?>
    <?php
    $header = array(
        'MerchID' => 'Product ID',
        'MerchDesc' => 'Product Name',
        'MerchPrice' => 'Product Price',
        'MerchQty' => 'Product Quantity'
    );
    ?>
    <div class="merchAdmin-header">
        <h1>Merch Admin</h1>
    </div>
<<<<<<< Updated upstream
    <table class="merchfunc-admin">
        <tr>
            <td><a href="merchAdd.php"><button class="merch-add">Add Products</button></a></td>
            <td><a href="merchView.php"><button class="merch-view">View Orders</button></a></td>
        </tr>
    </table>
=======
    <div class="merchfunc-admin">
        
            <a href="merchAdd.php"><button class="merch-add">Add Products</button></a>
            <a href="merchManage.php"><button class="merch-manage">Manage Products</button></a>
            <a href="merchView.php"><button class="merch-view">View Orders</button></a>
        
</div>
>>>>>>> Stashed changes
    <form method="get">
        <table class="editEvents-searchBar">
            <tr>
                <td class="editEvents-searchBar-label">Merch Name:</td>
            </tr>
            <tr>
                <td class="editEvents-searchBar-input">
                    <input type="text" name="merchName" id="merchName" placeholder="E.g Valorant" />
                </td>
                <td colspan="2" style="text-align:center;">
                    <button type="submit" class="editEvents-searchBtn" name="search">Search <i class="fa fa-search"></i></button>
                </td>
            </tr>
        </table>
    </form>
    <table class="order-info">
        <?php
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (isset($_GET['search'])) {
            $search = mysqli_real_escape_string($con, (trim($_GET['merchName'])));
            $sql = "SELECT * FROM merch_info WHERE MerchDesc LIKE '%$search%' GROUP BY MerchID;";
        } else {
            $sql = "SELECT * FROM merch_info GROUP BY MerchID";
        }
        foreach ($header as $value) {
            printf("
            <th>%s</th>
            ", $value);
        }
        ?>
        <th>Action</th>
        <?php
        if ($result = $con->query($sql)) {
            while ($record = $result->fetch_object()) {
                printf("
                        <tr class='order-details'>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>
                                <button id='edit'><a href='editMerch.php?id=$record->MerchID'>Edit</a></button>
                                <button id='delete'><a href='deleteMerch.php?id=$record->MerchID'>Delete</a></button>
                            </td>
                        </tr>
                    ", $record->MerchID, $record->MerchDesc, $record->MerchPrice, $record->MerchQty);
            }
        }
        $result->free();
        $con->close();
        ?>

    </table>
</body>

</html>