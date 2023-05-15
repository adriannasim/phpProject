<!DOCTYPE html>
<html>
<?php
session_start();
include("config/config.php");
$UserID = "admin";
//$UserID = $_SESSION['UserID'];
?>

<head>
    <meta charset="UTF-8">
    <style></style>
    <title>Add event seat</title>
</head>
<style>
    form {
        background-color: lightskyblue;
        margin-top: 10px;
        padding: 10px;
        color: black;
    }

    h1 {
        text-align: center;

    }

    .event {
        text-align: center;
        font-size: 200%;
        color: black;
        padding: 25px;
    }

    .seattype {
        text-align: center;
        font-size: 200%;
        color: black;
        padding: 25px;
    }

    .seat,
    .seattypeID,
    .status,
    .ticketID {
        text-align: center;
        font-size: 200%;
        color: black;
        padding: 25px;
    }

    .submit {
        text-align: center;
    }
</style>

<body>
    <?php
    include "headerAdmin.php";
    require_once "seat_helper.php";
    ?>
    <h1>Create event seat</h1>
    <?php
    // Get data from database
    $sql = "SELECT * FROM event GROUP BY EventID";
    $result = $connection->query($sql);

    if (!empty($_POST)) {
        // Retrieve input from the form
        $id = trim($_POST['typeID']);
        $seatID = trim($_POST['seatID']);
        $event = trim($_POST['event']);
        $ticketID = trim($_POST['ticketID']);
        $status = trim($_POST['status']);

        // Check for validation errors
        $error["seatID"] = checkseatID($seatID);
        $error = array_filter($error);
        if ($seatID == null){
            $error['seatID'] ='error';
        }
        if (empty($error)) {
            // create connection
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // prepare SQL statement with placeholders
            $add = "INSERT INTO seat VALUES (?, ?, ?, ?)";
            $stmt = $con->prepare($add);

            // bind parameters to the statement
            $stmt->bind_param('ssss',  $seatID, $id, $ticketID, $status);

            // execute the statement
            $stmt->execute();
            
            // check if the statement was successful
            if ($stmt->affected_rows > 0) {
                printf("Seat added!!");
            } else {
                echo "Seat failed to add!!";
            }

            // close the statement and connection
            $stmt->close();
            $con->close();
        } else {
            echo "<div class='addEvent-form-error'>";
            printf("<p>
                        %s
                        </p>", implode("</p><p>", $error));
            echo "</div>";
        }


    }
    ?>
    <form action="" method="POST">
        <div class="form">
            <div class="event">
                <label for="event">Choose an event:</label>
                <select name="event" id="event">
                    <?php
                    $allEvent = getAllevent();
                    (isset($event)) ? $event = $event : $event = "";
                    foreach ($allEvent as $key => $value) {
                        printf("<option value = '%s' %s>%s</option>", $key, ($event == $key) ? "selected" : "", $value);
                    } ?>
                </select>
            </div>
            <div class="ticketID">
                <label for="ticketID">Choose an Ticket Type:</label>
                <select name="ticketID" id="ticketID">
                    <?php
                    $allticketID = getAllticketID();
                    (isset($ticketID)) ? $ticketID = $ticketID : $ticketID = "";
                    foreach ($allticketID as $key => $value) {
                        printf("<option value = '%s' %s>%s</option>", $key, ($ticketID == $key) ? "selected" : "", $value);
                    } ?>
                </select>
            </div>
            <div class="seattypeID">
                <label for="typeID">Enter Seat Type ID :</label>
                <input type="text" name="typeID" value="<?php echo (isset($id)) ? $id : ""; ?>" />
            </div>

            <div class="seat">
                <label for="seatID">Enter Seat ID :</label>
                <input type="text" name="seatID" value="<?php echo (isset($seatID)) ? $seatID : ""; ?>" />
            </div>
            <div class="status">
                <label for="seatID">Enter status:</label>
                <input type="text" name="status" value="<?php echo (isset($status)) ? $status : ""; ?>" />
            </div>
            <div class="submit">
                <input type="submit" value="Add" name="submit">
            </div>
        </div>
    </form>
</body>

</html>