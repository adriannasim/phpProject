<html>

<head>
    <meta charset="UTF-8">
    <title>View Orders</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include "adminHelper.php";
    include "headerAdmin.php"; ?>
    <?php
    $header = array(
        'MbuyID' => 'Order ID',
        'MerchID' => 'Product ID',
        'CartID' => 'Cart ID',
        'MbuyQty' => 'Quantity'
    );
    ?>
    <div class="merchAdmin-header">
        <h1>View Orders</h1>
    </div>
    <table class="order-info">
        <?php
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM merch_buy GROUP BY MbuyID";
        foreach ($header as $value) {
            printf("
            <th>%s</th>
            ", $value);
        }
        $status = "Pending";
        if (isset($_POST['viewMerch-update'])) {
            if (isset($_POST['status'])) {
                $status = isset($status) ? $status = "Complete" : $status = "Pending";
            } else {
                $status = "Pending";
            }
        }
        ?>
        <th>Status</th>
        <th>Update Status</th>
        <?php
        if ($result = $con->query($sql)) {
            while ($record = $result->fetch_object()) {
                printf("
                        <tr class='order-details'>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td><form action= '' method='post'><input type='checkbox' name='status'><span class='chkbox'></span></form></td>
                        </tr>
                    ", $record->MbuyID, $record->MerchID, $record->CartID, $record->MbuyQty, $status);
            }
        }
        $result->free();
        $con->close();
        ?>

    </table>
    <form action='' method='post'>
        <div class="viewMerch-btn">
            <input type="reset" value="Reset" onclick="location = 'merchView.php'" />
            <input type="submit" value="Update" name="viewMerch-update" />
        </div>
    </form>
</body>

</html>