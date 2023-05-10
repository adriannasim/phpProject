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
    .seattypeID {
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
    $sql = "SELECT * FROM event GROUP BY EventName";
    $result = $connection->query($sql);
    $sql1 = "SELECT * FROM ticket_info GROUP BY TicketID";
    $result1 = $connection->query($sql1);
    $result2 = $connection->query($sql1);

    if (!empty($_POST)) {
        //YES,user clicked on the button
        //retrieve input from the form
        $id = trim($_POST['typeID']);
        $type = trim($_POST['type']);
        $sqlCheck = "SELECT SeatTypeID FROM seat_type WHERE SeatTypeID ='$id'";
        $result = mysqli_query($connection, $sqlCheck);
        if (mysqli_num_rows($result) == 1) {
            $chkTypeID = $id;
        } else {
            $chkTypeID = "";
        }
        //check/validate the user inputs
        $error["id"] = isTypeIDExist($id, $chkTypeID);
        $error = array_filter($error);
        if ((empty($error))) {
            $add = "INSERT INTO seat_type VALUES('$id','$type');";
            if (($connection->prepare($add))->execute()) {
            }
        }
    }

    ?>
    <form action="" method="POST">
        <div class="form">
            <div class="event">
                <label for="event">Choose an event:</label>
                <select name="event" id="event" value="<?php echo (isset($row['EventID']))? $row['EventID']: "";?>">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['EventID']; ?>" <?php if (isset($_POST['EventID']) && $_POST['EventID']==$row['EventID']) echo "selected";?>><?php echo $row['EventName'];
                    } ?></option>
                </select>
            </div>

            <div class="seattypeID">
                <label for="typeID">Enter Seat Type ID :<label>
                        <input type="text" name="typeID" value=<?php echo (isset($id)) ? $id : ""; ?> />
            </div>
            <div class="seattype">
                <label for="type">Enter type of seat:<label>
                        <input type="text" name="type" value=<?php echo (isset($type)) ? $type : ""; ?> />
            </div>
            <div class="seat">
                <label for="amount">Choose amount of seat:<label>
                        <select name="amount" id="amount">
                            <?php while ($row = $result2->fetch_assoc()) { ?>
                                <option value="<?php echo $row['TicketID']; ?>"><?php echo $row['TicketQty'];
                            } ?></option>
                        </select>
            </div>
            <div class="submit">
                <input type="submit" value="Add" onclick="location:dasdas.php">
            </div>

        </div>
    </form>
</body>

</html>