<html>

<head>
    <meta charset="UTF-8">
    <title>Merch Admin</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "tw");
?>

<body>
    <?php include "headerAdmin.php"; ?>
    <?php
    $header = array(
        'MbuyID' => 'Order ID',
        'MbuyTotal' => 'Total Amount',
        'MbuyQty' => 'Quantity',
        'MerchID' => 'Product ID'
    );
    ?>
    <div class="merchAdmin-header">
        <h1>Merch Admin</h1>
    </div>
    <table class="merchfunc-admin">
        <tr>
            <td><a href="merchAdd.php"><button class="merch-add">Add Products</button></a></td>
            <td><a href="merchView.php"><button class="merch-view">View Orders</button></a></td>
        </tr>
    </table>
    <table class="order-info">
        <?php
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM merch_buy GROUP BY MbuyID";
        foreach ($header as $value) {
            printf("
            <th>%s</th>
            ", $value);
        }
        if(isset($_POST['viewMerch-update'])){
            $status = isset($status) ? "Complete" : "Pending";
        }else{
            $status = "Pending";
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
                    ", $record->MbuyID, $record->MbuyTotal, $record->MbuyQty, $record->MerchID, $status);
            }
        }
        $result->free();
        $con->close();
        ?>

    </table>
    <form action= '' method='post'>
    <div class="viewMerch-btn">
        <input type="reset" value="Cancel" />
        <input type="submit" value="Update" name="viewMerch-update" />
    </div>
    </form>
</body>

</html>