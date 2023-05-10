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
    <?php
    $header = array(
        'MbuyID' => 'Order ID',
        'MerchID' => 'Product ID',
        'CartID' => 'Cart ID',
        'MbuyQty' => 'Quantity'
    );
    ?>
    <div class="merchAdmin-header">
        <h1>Merch Admin</h1>
    </div>
    <div class="merchfunc-admin">
        <a href="merchAdd.php"><button class="merch-add">Add Products</button></a>
        <a href="merchManage.php"><button class="merch-manage">Manage Products</button></a>
        <a href="merchView.php"><button class="merch-view">View Orders</button></a>
    </div>
    <form action='' method='post'>
        <table class="order-info">
        <?php
        $sql = "SELECT * FROM merch_buy mb JOIN cart c ON mb.CartID = c.CartID GROUP BY MbuyID";
        foreach ($header as $value) {
            printf("
            <th>%s</th>
            ", $value);
        }
        if (isset($_POST['viewMerch-update'])) {
            if (isset($_POST['status'])) {
                $CartID = $_POST['status'];
                $update = "UPDATE cart SET checkout = '1' WHERE cart.CartID = '$CartID'";
                $stmt = $connection->prepare($update);
                if ($stmt->execute()) {
                    echo "<script>alert('Orders Updated !');
                            window.location.href = 'merchView.php';
                        </script>";
                }
            }
        }
        ?>
        <th>Status</th>
        <th>Update Status</th>
        <?php
        if ($result = $connection->query($sql)) {
            while ($record = $result->fetch_object()) {
                if (($record->checkout) == 1) {
                    $status = "Completed";
                } else {
                    $status = "Pending";
                }
                printf("
                        <tr class='order-details'>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td><input type='checkbox' value='%s' name='status'><span class='chkbox'></span></td>
                        </tr>
                    ", $record->MbuyID, $record->MerchID, $record->CartID, $record->MbuyQty, $status, $record->MbuyID);
            }
        }
        $result->free();
        $connection->close();
        ?>
        </table>
        <div class="viewMerch-btn">
            <input type="reset" value="Reset" onclick="location = 'merchView.php'" />
            <input type="submit" value="Update" name="viewMerch-update" />
        </div>
    </form>
</body>

</html>