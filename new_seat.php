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

    .seat {
        text-align: center;
        font-size: 200%;
        color: black;
        padding: 25px;
    }
</style>

<body>
    <?php
    include "headerAdmin.php"
        ?>
    <h1>Create event seat</h1>
    <?php
    // Get data from database
    $sql = "SELECT * FROM event GROUP BY EventName";
    $result = $connection->query($sql);
    $sql1 = "SELECT * FROM ticket_info GROUP BY TicketID";
    $result1 = $connection->query($sql1);
    $result2 = $connection->query($sql1);
    ?>
    <form action="" method="POST">
        <div class="form">
            <div class="event">
                <label for="event">Choose an event:</label>
                <select name="event" id="event">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['EventID']; ?>"><?php echo $row['EventName'];
                    } ?></option>
                </select>
            </div>
            <div class="seattype">
                <label for="type">Choose type of seat:<label>
                        <select name="type" id="type">
                            <?php while ($row = $result1->fetch_assoc()) { ?>
                                <option value="<?php echo $row['TicketID']; ?>"><?php echo $row['TicketType'];
                            } ?></option>
                        </select>
            </div>
            <div class="seat">
                <label for="amount">Choose amount of seat:<label>
                        <select name="amount" id="amount">
                            <?php while ($row = $result2->fetch_assoc()) { ?>
                                <option value="<?php echo $row['TicketID']; ?>"><?php echo $row['TicketQty'];
                            } ?></option>
                        </select>
            </div>

            <input type="submit" value="Submit">

        </div>
    </form>
</body>

</html>