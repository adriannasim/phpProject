<?php
    session_start();
    include "config/config.php";
    $UserID = $_SESSION['UserID'];

    if ($UserID == '') {
        header("location: index.php");
    }
    global $hideForm;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Event Ticket</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'adminHelper.php'; include "headerAdmin.php"; ?>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            (isset($_GET["id"])) ? $id = $_GET["id"]: $id = "";

            $sql = "SELECT EventID, EventName FROM event WHERE EventID = '$id'";
            $result = $connection->query($sql);
            if ($record = $result->fetch_object()) {
                $id = $record->EventID;
                $name = $record->EventName;
                printf("
                <div class='addEvent'>
                    <div class='addEvent-header'>
                        <h1>Add Event Ticket for %s</h1>
                    </div>", $name
                );
            } else {
                echo "<div class='error'>Record not found !<a href='eventTicketManage.php'>Back to Manage Events</a></div>";
                $hideForm = true;
            }
        }
        ?>
        <?php
        if(!empty($_POST)){
            $id = trim($_POST["id"]);
            $name = trim($_POST["name"]);
            $ticketID = trim($_POST["ticketID"]);
            $price = trim($_POST["price"]);
            $type = trim($_POST["type"]);
            $qty = trim($_POST["qty"]);
            $error = array();

            $sqlCheck = "SELECT TicketID FROM ticket_info WHERE TicketID = '$ticketID'";
            $result = mysqli_query($connection, $sqlCheck);
            if (mysqli_num_rows($result) == 1) {
                $chkID = $ticketID;
            } 
            else {
                $chkID = "";
            }

            $error['ticketID'] = checkTicketID($ticketID, $chkID);
            $error['price'] = checkTicketPrice($price);
            $error['qty'] = checkQty($qty);
            $error['type'] = checkType($type);
            $error = array_filter($error);
            if (empty($error)) {
                $sql = "INSERT INTO ticket_info VALUES (?, ?, ?, ?, ?)";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("sssss", $ticketID, $id, $price, $type, $qty);
                if ($stmt->execute()) {
                    echo "<script>alert('Event Ticket Data Added !');
                            window.location.href = 'eventTicketManage.php';
                        </script>";
                }
            } else {
                echo "<div class='addEvent-form-error'>";
                printf("<p>
                        %s
                        </p>", implode("</p><p>",$error));
                echo "</div>";
            }
        }
        ?>
            <div class="addEvent-form">
                <?php if ($hideForm == false) : ?>
                <form action="" method="post">
                    <input type="text" name="id" id="id" value="<?php echo $id;?>" hidden/>
                    <input type="text" name="name" id="name" value="<?php echo $name;?>" hidden/>
                    <div class="addEvent-form-group">
                        <label for="ticketID">Event TicketID</label><br/>
                        <input type="text" name="ticketID" id="ticketID" value="<?php echo (isset($ticketID))? $ticketID: "";?>"/>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="price">Event Ticket Price</label><br/>
                        <input type="text" name="price" id="price" value="<?php echo (isset($price))? $price: "";?>"/>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="type">Event Ticket Type</label><br/>
                        <input type="text" name="type" id="type" value="<?php echo isset($_POST['type']) ? $_POST['type'] : '';?>"/>
                    </div>
                    <div class="addEvent-form-group">
                        <label for="qty">Event Ticket Quantity</label><br/>
                        <input type="text" name="qty" id="qty" value="<?php echo isset($_POST['qty']) ? $_POST['qty'] : '';?>"/>
                    </div>
                    <div class="addEvent-form-btn">
                        <input type="reset"/>
                        <input type="submit" value="Add" name="addEvent-form-submit"/>
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>   
    </body>
</html>