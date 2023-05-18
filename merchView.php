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
    <title>View Orders</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include "adminHelper.php";
    include "headerAdmin.php"; ?>
    <?php
    $header = array(
        'Order ID',
        'Product ID',
        'Cart ID',
        'Quantity'
    );
    ?>
    <div class="merchAdmin-header">
        <h1>View Orders</h1>
    </div>
    <form action='' method='post'>
        <table class="order-info">
        <?php
        $sql = "SELECT * FROM merch_buy mb JOIN cart c ON mb.CartID = c.CartID JOIN purchase p ON c.CartID = p.CartID GROUP BY MbuyID";
        foreach ($header as $value) {
            printf("
            <th>%s</th>
            ", $value);
        }
        if (isset($_POST['viewMerch-update'])) {
            if (isset($_POST['status'])) {
                $CartID = $_POST['status'];
                $update = "UPDATE purchase SET Status = 'Completed' WHERE CartID = '$CartID'";
                $stmt = $connection->prepare($update);
                if ($stmt->execute()) {
                    echo "<script>alert('Orders Updated !');
                            window.location.href = 'merchView.php';
                        </script>";
                }
            }
            else if (isset($_POST['revert'])) {
                $CartID = $_POST['revert'];
                $update = "UPDATE purchase SET Status = 'Pending' WHERE CartID = '$CartID'";
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
        <th>Revert Status</th>
        <?php
        if ($result = $connection->query($sql)) {
            while ($record = $result->fetch_object()) {
                printf("
                        <tr class='order-details'>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td><input type='checkbox' value='%s' name='status'><span class='chkbox'></span></td>
                        <td><input type='checkbox' value='%s' name='revert'><span class='chkbox'></span></td>
                        </tr>
                    ", $record->MbuyID, $record->MerchID, $record->CartID, $record->MbuyQty, $record->Status, $record->CartID, $record->CartID);
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