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
    <title>Manage Products</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <?php include "adminHelper.php";
    include "headerAdmin.php"; ?>
    <?php
    $header = array(
        'MerchID' => 'Product ID',
        'MerchDesc' => 'Product Name',
        'MerchPrice' => 'Product Price (RM)',
        'MerchQty' => 'Product Quantity'
    );
    ?>
    <div class="merchAdmin-header">
        <h1>Manage Products</h1>
    </div>
    <form method="get">
        <div class="editMerch-searchBar">
            <input type="text" name="merchName" id="merchName" placeholder="Enter Merch Name" />
            <button type="submit" class="editEvents-searchBtn" name="search">Search <i
                    class="fa fa-search"></i></button>
        </div>
    </form>
    <table class="order-info">
        <?php
        if (isset($_GET['search'])) {
            $search = mysqli_real_escape_string($connection, (trim($_GET['merchName'])));
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
        if ($result = $connection->query($sql)) {
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
        ?>

    </table>
</body>

</html>